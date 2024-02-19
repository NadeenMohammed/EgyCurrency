<?php

if (!defined('ABSPATH')) exit;
require_once dirname(__FILE__) . '/optimizer.php';
require_once dirname(__FILE__) . '/validator.php';
require_once dirname(__FILE__) . '/helper.php';
require_once dirname(__FILE__) . './../wp_settings.php';

if (!class_exists('ALCache')) :

	class ALCache {
		public $optimizer;
		public $validator;
		public $cache_filepath;
		public $cache_filepath_gzip;
		public $alsettings;
		public static $cacheconfig = "alcacheconfig";

		public function __construct() {
			$this->cache_filepath = $this->getCachePath();
			$this->cache_filepath_gzip = $this->cache_filepath . '_gzip';
			$this->alsettings = new ALWPSettings();
		}

		public function resetLowerCase($matches) {
			return strtolower($matches[0]);
		}

		public function getCachePath() {
			$request_uri_path = ALCacheHelper::getRequestCachePath();
			$filename = 'index';
			if (is_ssl()) {
				$filename .= '-https';
			}
			$request_uri_path = preg_replace_callback('/%[0-9A-F]{2}/', array($this, 'resetLowerCase'), $request_uri_path);
			$request_uri_path = str_replace('?', '#', $request_uri_path);
			$request_uri_path .= '/' . $filename . '.html';
			return $request_uri_path;
		}

		public function getIfModifiedSince() {
			if (function_exists('apache_request_headers')) {
				$headers = apache_request_headers();
				return isset($headers['If-Modified-Since']) ? $headers['If-Modified-Since'] : '';
			}
			return $_SERVER['HTTP_IF_MODIFIED_SINCE'];
		}

		public function serveCacheFile($read_from_gzip) {
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($this->cache_filepath)) . ' GMT');
			$if_modified_since = $this->getIfModifiedSince();
			if ($if_modified_since && (strtotime($if_modified_since) === @filemtime($this->cache_filepath))) {
				header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified', true, 304);
				header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');
				header('Cache-Control: no-cache, must-revalidate');
				exit;
			}
			$read_from_gzip ? readgzfile($this->cache_filepath_gzip) : readfile($this->cache_filepath);
			exit;
		}

		public function sanitizeBuffer($buffer, $is_gzip_buffer) {
			$sanitized_buffer = $buffer;
			if ($is_gzip_buffer) {
				$sanitized_buffer = gzdecode($sanitized_buffer);
			}
			return $sanitized_buffer;
		}

		public function startCaching() {
			if (array_key_exists('bv_print_buffer', $_GET)) {
				ob_start([$this, 'serveBuffer']);
				return;
			}
			if ($this->canPerformPageCaching()) {
				$accept_encoding = null;
				if (array_key_exists('HTTP_ACCEPT_ENCODING', $_SERVER)) {
					$accept_encoding = $_SERVER['HTTP_ACCEPT_ENCODING'];
				}
				$read_from_gzip = $accept_encoding && false !== strpos($accept_encoding, 'gzip');
				if ($read_from_gzip && is_readable($this->cache_filepath_gzip)) {
					$this->serveCacheFile($read_from_gzip);
				}
				if (is_readable($this->cache_filepath)) {
					$this->serveCacheFile($read_from_gzip);
				}
				ob_start([$this, 'optimizePageAndSaveCache']);
			} else {
				ob_start([$this, 'optimizePage']);
			}
		}

		public function isBufferInGzipFormat($buffer) {
			$magic_number = substr($buffer, 0, 2);
			return ($magic_number === "\x1f\x8b") ? true : false;
		}

		public function serveBuffer($buffer) {
			$original_buffer = $buffer;
			$is_gzip_buffer = $this->isBufferInGzipFormat($buffer);
			if ($is_gzip_buffer) {
				$buffer = $this->sanitizeBuffer($buffer, $is_gzip_buffer);
				if ($buffer === false) {
					return $original_buffer;
				}
			}
			if (isset($_GET['fname']) && !empty($_GET['fname'])) {
				$fname = md5($_GET['fname']);
				$fullpath = ALCacheHelper::getCacheBasePath() . 'buffer/';
				if ((file_exists($fullpath) && is_writable($fullpath)) || mkdir($fullpath, 0755, true)) {
					file_put_contents($fullpath . $fname, $buffer);
				}
			}
			if ($is_gzip_buffer) {
				$buffer = gzencode($buffer, 6);
			}
			return $buffer;
		}

		public function writeCacheFile($content) {
			file_put_contents($this->cache_filepath, $content);
			if (function_exists('gzencode')) {
				file_put_contents($this->cache_filepath_gzip, gzencode($content, 6));
			}
		}

		public function canPerformPageCaching() {
			if (array_key_exists('al_cache_skip_cookies', $GLOBALS) && is_array($GLOBALS['al_cache_skip_cookies']) && is_array($_COOKIE)) {
				$cookie_keys = array_keys($_COOKIE);
				foreach ($cookie_keys as $cookie) {
					if (in_array($cookie, $GLOBALS['al_cache_skip_cookies'], true)) {
						return false;
					}
				}
			}

			return true;
		}

		public function optimizePage($buffer) {
			$original_buffer = $buffer;
			$is_gzip_buffer = $this->isBufferInGzipFormat($buffer);
			if ($is_gzip_buffer) {
				$buffer = $this->sanitizeBuffer($buffer, $is_gzip_buffer);
				if ($buffer === false) {
					return $original_buffer;
				}
			}
			$config = $this->alsettings->getOption(self::$cacheconfig);
			if ($config == false) {
				return $buffer;
			}

			$this->validator = new ALValidator($config);
			$this->optimizer = new ALOptimizer($config);
			if (!$this->validator->canCacheBuffer($buffer) || !$this->validator->canCachePage()) {
				return $buffer;
			}

			$buffer = $this->optimizer->optimizeBuffer($buffer);
			if ($is_gzip_buffer) {
				$buffer = gzencode($buffer, 6);
			}
			return $buffer;
		}

		public function optimizePageAndSaveCache($buffer) {
			$original_buffer = $buffer;
			$is_gzip_buffer = $this->isBufferInGzipFormat($buffer);
			if ($is_gzip_buffer) {
				$buffer = $this->sanitizeBuffer($buffer, $is_gzip_buffer);
				if ($buffer === false) {
					return $original_buffer;
				}
			}
			$config = $this->alsettings->getOption(self::$cacheconfig);
			if ($config == false) {
				return $buffer;
			}

			$this->validator = new ALValidator($config);
			$this->optimizer = new ALOptimizer($config);
			if (!$this->validator->canCacheBuffer($buffer) || !$this->validator->canCachePage()) {
				return $buffer;
			}

			$buffer = $this->optimizer->optimizeBuffer($buffer);

			$cache_dir_path = dirname($this->cache_filepath);
			if ((file_exists($cache_dir_path) && is_writable($cache_dir_path)) || mkdir($cache_dir_path, 0755, true)) {
				$this->writeCacheFile($buffer);
			}
			if ($is_gzip_buffer) {
				$buffer = gzencode($buffer, 6);
			}
			return $buffer;
		}
	}
endif;