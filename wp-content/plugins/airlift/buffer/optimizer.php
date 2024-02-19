<?php
require_once dirname(__FILE__) . '/helper.php';
require_once dirname(__FILE__) . './../wp_db.php';

if (!class_exists('ALOptimizer')) :

	class ALOptimizer {
		public static $airlift_stats_table = 'airlift_stats';
		public static $airlift_config_table = 'airlift_config';
		public $config;
		public $db;

		public function __construct($config) {
			$this->config = $config;
			$this->db = new ALWPDb();
		}

		public function addOptimizationInfo($template_config_id) {
			$values = array(
				"path" => ALCacheHelper::getRequestURIBase(),
				"query_string" => ALCacheHelper::getQueryString(),
				"time" => time(),
				"template_config_id" => $template_config_id
			);
			$this->db->replaceIntoBVTable(self::$airlift_stats_table, $values);
		}

		public function getHtmlDataToReplace($template_config) {
			if (array_key_exists('html_contents_to_replace', $template_config) && !empty($template_config['html_contents_to_replace'])) {
				return $template_config['html_contents_to_replace'];
			}
			return array();
		}

		public function matchingUrlConfig($rows) {
			global $wp;
			foreach($rows as $row) {
				if (home_url($wp->request) == $row['url']) {
					return json_decode($row['config'], true);
				}
			}
			return false;
		}

		public function getTemplateforSimilarPosts($configs) {
			$post_id = get_the_ID();
			foreach ($configs as $row) {
				$similar_post_ids = json_decode($row['similar_post_ids']);
				if (!is_array($similar_post_ids)) continue;
				foreach ($similar_post_ids as $similar_post_id) {
					if ($post_id === $similar_post_id) {
						$_config = json_decode($row['config'], true);
						if (array_key_exists("enable_used_css_on_similar_posts", $this->config) && true == $this->config["enable_used_css_on_similar_posts"]) {
							$_config["apply_used_css_on_similar_posts"] = true;
						}
						return $_config;
					}
				}
			}
			return false;
		}

		public function IsAggregatedStyleTagsMd5Matching($buffer, $config) {
			if (array_key_exists('agg_style_tags_md5', $config)) {
				$matched_style_tags = preg_match_all('/<style\b[^>]*>(.*?)<\/style>/is', $buffer, $style_tags);
				$matched_link_tags = preg_match_all('/<link[^>]*rel\s*=\s*["\']\s*stylesheet\s*["\'][^>]*>/iU', $buffer, $link_tags);
				$agg_style_tags_md5 = $config['agg_style_tags_md5'];
				$agg_css_hash = [];
				if ($matched_style_tags) {
					foreach ($style_tags[0] as $style) {
						$agg_css_hash[] = array($style, strpos($buffer, $style));
					}
				}
				if ($matched_link_tags) {
					foreach ($link_tags[0] as $link) {
						$agg_css_hash[] = array($link, strpos($buffer, $link));
					}
				}
				if(empty($agg_css_hash)) {
					return true;
				}
				usort($agg_css_hash, function($a, $b) { return $a[1] <=> $b[1]; });
				$agg_css_array = [];
				foreach ($agg_css_hash as $css) {
					$agg_css_array[] = $css[0];
				}
				$agg_css_array = implode($agg_css_array);
				$aggStyleMd5Hash = md5($agg_css_array);
				return ($agg_style_tags_md5 == $aggStyleMd5Hash);
			}
			return false;
		}

		public function IsAggregatedScriptTagsMd5Matching($buffer, $config) {
			if (array_key_exists('agg_script_tags_md5', $config)) {
				$matched_script_tags = preg_match_all('/<script[^>]*>[\s\S]*?<\/script>/is', $buffer, $scripts);
				if (!$matched_script_tags) {
					return true;
				}
				$agg_script_string = implode($scripts[0]);
				$aggScriptMd5Hash = md5($agg_script_string);
				$agg_script_tags_md5 = $config['agg_script_tags_md5'];
				return $aggScriptMd5Hash == $agg_script_tags_md5;
			}
			return false;
		}

		public function getDefaultConfig($configs) {
			if (!$this->config['disable_default_template_optimization']) {
				foreach ($configs as $row) {
					if (array_key_exists('config', $row) && !empty($row['config'])) {
						$config = json_decode($row['config'], true);
						if (is_array($config) && $config['is_default_type']) {
							return json_decode($row['config'], true);
						}
					}
				}
			}
			return false;
		}

		public function findTemplateConfig() {
			$table = $this->db->getBVTable(self::$airlift_config_table);
			$rows = $this->db->getTableContent($table);
			if (!is_array($rows) || empty($rows)) {
				return false;
			}
			$_config = $this->matchingUrlConfig($rows);
			if ($_config) {
				$_config["url_matched"] = true;
				return $_config;
			}
			if (array_key_exists("apply_non_template_optimization", $this->config) && false === $this->config["apply_non_template_optimization"]) {
				return null;
			}

			$_config = $this->getTemplateforSimilarPosts($rows);
			if ($_config) return $_config;
			$_config = $this->getDefaultConfig($rows);
			if ($_config) {
				$_config['is_default_config'] = true;
			}
			return $_config;
		}

		public function optimizeBuffer($buffer) {
			$template_config = $this->findTemplateConfig();
			if (is_array($template_config) && !empty($template_config)) {
				$buffer = preg_replace( '/<!--(.*)-->/Uis', '', $buffer);
				$buffer = preg_replace( '#<noscript>.*?</noscript>#ism', '', $buffer );
				$html_data_to_replace = $this->getHtmlDataToReplace($template_config);
				$url_matched = null;
				$is_default_config = false;
				if (array_key_exists('is_default_config', $template_config) && true == $template_config['is_default_config']) {
					$is_default_config = true;
				}
				$apply_used_css_on_similar_posts = null;
				if (array_key_exists('url_matched', $template_config) && $template_config['url_matched']) {
					$url_matched = $template_config['url_matched'];
				}
				if ($url_matched && array_key_exists('optimized_buffer', $template_config) && $template_config['optimized_buffer']) {
					$buffer = $template_config['optimized_buffer'];
				}
				if (array_key_exists('apply_used_css_on_similar_posts', $template_config) && $template_config['apply_used_css_on_similar_posts']) {
					$apply_used_css_on_similar_posts = $template_config['apply_used_css_on_similar_posts'];
				}
				if (array_key_exists("javascript", $template_config)) {
					if (false == $is_default_config || (true == $is_default_config && true == $this->IsAggregatedScriptTagsMd5Matching($buffer, $template_config))) {
						$buffer = $this->handleJavascript($buffer, $template_config["javascript"]);
					}
				}
				if (array_key_exists("javascripts_to_add", $template_config)) {
					$buffer = $this->addJavascripts($buffer, $template_config["javascripts_to_add"]);
				}
				if (array_key_exists('used_css', $template_config) && ($url_matched || $apply_used_css_on_similar_posts)) {
					$buffer = $this->handleUsedCss($buffer, $template_config['used_css'], $template_config['used_css_replace_rules']);
				} else {
					if (false == $is_default_config || (true == $is_default_config && true == $this->IsAggregatedStyleTagsMd5Matching($buffer, $template_config))) {
						if (array_key_exists('critical_css', $template_config)) {
							$buffer = $this->addCriticalCss($buffer, $template_config["critical_css"]);
							if (array_key_exists("stylesheet", $template_config)) {
								$buffer = $this->handleStylesheet($buffer, $template_config["stylesheet"]);
							}
						}
					}
				}
				if (array_key_exists("preloaded_assets", $html_data_to_replace) && is_array($html_data_to_replace["preloaded_assets"])) {
					$buffer = $this->doSearchAndReplace($buffer, $html_data_to_replace["preloaded_assets"]);
				}
				if (array_key_exists("font", $template_config)) {
					$buffer = $this->handleFonts($buffer, $template_config["font"]);
				}
				if (array_key_exists("image", $template_config)) {
					$buffer = $this->handleImages($buffer, $template_config["image"], $url_matched);
				}
				if (array_key_exists("iframe", $template_config)) {
					$buffer = $this->handleIframes($buffer, $template_config["iframe"]);
				}
				if (array_key_exists("video", $template_config)) {
					$buffer = $this->doSearchAndReplace($buffer, $template_config["video"]);
				}
				if (array_key_exists("meta", $html_data_to_replace) && is_array($html_data_to_replace["meta"])) {
					$buffer = $this->doSearchAndReplace($buffer, $html_data_to_replace['meta']);
				}
				if (array_key_exists("search_and_replace_in_html", $this->config) && is_array($this->config['search_and_replace_in_html'])) {
					$buffer = $this->doSearchAndReplace($buffer, $this->config['search_and_replace_in_html']);
				}
				if (array_key_exists("id", $template_config)) {
					$this->addOptimizationInfo($template_config["id"]);
				}
				if (array_key_exists("footer_message", $template_config)) {
					$currentTime = gmdate("Y-m-d H:i:s");
					$buffer = $buffer . '<!-- ' . $template_config["footer_message"] . ', Cached Timestamp: ' . $currentTime . ' UTC -->';
				}
			}
			return $buffer;
		}

		public function handleIframes($buffer, $iframe_config) {

			if (!array_key_exists("has_iframe", $iframe_config) || $iframe_config["has_iframe"] != TRUE) {
				return $buffer;
			}

			$iframes_matched = preg_match_all('#<iframe(?<attrs>\s.+)>.*</iframe>#iUs', $buffer, $iframes, PREG_SET_ORDER);
			if (!$iframes_matched) {
				return $buffer;
			}

			foreach($iframes as $iframe) {
				$src_matched = ALHelper::safePregMatch('#\ssrc\s*=\s*(\'|")(?<src>.*)\1#iUs', $iframe['attrs'], $attrs);
				if (!$src_matched) {
					continue;
				}
				
				if ($this->hasExcludedIframeAttrs($iframe)){
					continue;
				}
				$iframe['src'] = trim($attrs['src']);
				if ($iframe['src'] === '') {
					continue;
				}

				if (esc_url($iframe['src']) === '') {
					continue;
				}
				$lazyloaded_iframe = $iframe[0];
				$lazyloaded_iframe = $this->lazyloadIframe($iframe, $lazyloaded_iframe);
				$lazyloaded_iframe = $this->addBvClass($lazyloaded_iframe, 'bv-lazyload-iframe');
				$lazyloaded_iframe .= '<noscript>' . $iframe[0] . '</noscript>';

				$buffer = str_replace($iframe[0], $lazyloaded_iframe, $buffer);
			}

			return $buffer;
		}

		public function lazyloadIframe($iframe, $lazyloaded_iframe) {
			$final_attrs = str_replace($iframe['src'], 'about:blank', $iframe['attrs']);
			$lazyloaded_iframe = str_replace($iframe['attrs'], $final_attrs . ' bv-data-src="' . esc_url($iframe['src'])  . '" ', $lazyloaded_iframe);
			return $lazyloaded_iframe;
		}

		public function doSearchAndReplace($buffer, $search_and_replace_info) {
			foreach ($search_and_replace_info as $config) {
				if (array_key_exists("search_for", $config) && array_key_exists("replace_with", $config)) {
					$buffer = str_replace($config["search_for"], $config["replace_with"], $buffer);
				}
			}
			return $buffer;
		}

		public function addCriticalCss($buffer, $critical_css) {
			if (ALHelper::safePregMatch('/<head\b[^>]*>/iU', $buffer, $matches)) {
				$buffer = str_replace($matches[0], $matches[0] . "\n<style id='bv-critical-css'>" . $critical_css . "</style>\n", $buffer);
			}
			return $buffer;
		}

		public function addUsedCss($buffer, $used_css) {
			if (ALHelper::safePregMatch('/<head\b[^>]*>/iU', $buffer, $matches)) {
				$buffer = str_replace($matches[0], $matches[0] . "\n" . $used_css . "\n", $buffer);
			}
			return $buffer;
		}

		public function preloadImages($buffer, $preload_images) {
			$head_matched = ALHelper::safePregMatch('/<head\b[^>]*>/iU', $buffer, $matches);
			if ($head_matched) {
				foreach ($preload_images as $image_to_preload) {
					$buffer = str_replace($matches[0], $matches[0] . "\n" . $image_to_preload , $buffer);
				}
			}
			return $buffer;
		}

		private function hasEmbeddedImage($image) {
			return strpos($image, 'data:image') !== false;
		}

		public function hasNoActionAttribute($element) {
			if (!array_key_exists('no_action_attributes', $this->config) && !is_array($this->config['no_action_attributes'])) {
				return false;
			}

			foreach ($this->config['no_action_attributes'] as $excluded_attr) {
				if (strpos($element, $excluded_attr) !== false) {
					return true;
				}
			}

			return false;
		}

		private function hasIgnoredAttribute($image) {
			return strpos($image, 'data:image') !== false;
		}

		public function handleUsedCss($buffer, $used_css, $used_css_replace_rules) {
			if (isset($used_css) && !empty($used_css)) {
				$buffer = $this->addUsedCss($buffer, $used_css);
				$buffer = $this->doSearchAndReplace($buffer, $used_css_replace_rules);
			}
			return $buffer;
		}

		public function handleJavascript($buffer, $js_config) {
			if (!is_array($js_config) || empty($js_config)) {
				return $buffer;
			}
			$buffer = $this->doSearchAndReplace($buffer, $js_config);
			return $buffer;
		}

		public function addJavascripts($buffer, $js_to_add_config) {
			if (!is_array($js_to_add_config) || empty($js_to_add_config)) {
				return $buffer;
			}
			foreach ($js_to_add_config as $config) {
				if (is_array($config) && !empty($config)) {
					if (array_key_exists("search_for", $config) && array_key_exists("replace_with", $config)) {
						if (strpos($buffer, $config['search_for']) !== false) {
							$buffer = str_replace($config["search_for"], $config["replace_with"], $buffer);
						} else if(array_key_exists("tag_name", $config)) {
							if (ALHelper::safePregMatch('/<'.$config["tag_name"].'\b[^>]*>/iU', $buffer, $matches)) {
								$buffer = str_replace($matches[0], $config['replace_with'], $buffer);
							}
						}
					}
				}
			}
			return $buffer;
		}

		public function handleStylesheet($buffer, $style_config) {
			if (!is_array($style_config) || empty($style_config)) {
				return $buffer;
			}
			$buffer = $this->doSearchAndReplace($buffer, $style_config);
			return $buffer;
		}

		public function handleFonts($buffer, $font_config) {
			if (!is_array($font_config) || empty($font_config)) {
				return $buffer;
			}

			foreach ($font_config as $config) {
				if (is_array($config) && !empty($config)) {
					if (array_key_exists("search_for", $config) && array_key_exists("replace_with", $config)) {
						$buffer = str_replace($config["search_for"], $config["replace_with"], $buffer);
					}
				}
			}

			return $buffer;
		}

		public function sanitize_cdn_url($url) {
			$url = sanitize_text_field($url);

			if (!$url || !ALHelper::safePregMatch('@^https?://.+\.[^.]+@i', $url)) {
				// Not an URL.
				return '';
			}

			return trailingslashit($url);
		}

		public function getParsedUrlInfo() {
			$info = array();
			$info['scheme'] = ($_SERVER['HTTPS']) ? "https://" : "http://";
			$info['path'] = dirname($_SERVER['REQUEST_URI']);
			$info['host'] = $_SERVER['HTTP_HOST'];
			return $info;
		}

		public function hasExcludedSource($url) {
			if (!array_key_exists('image_excluded_src_attributes', $this->config) && !is_array($this->config['image_excluded_src_attributes'])) {
				return false;
			}

			foreach ($this->config['image_excluded_src_attributes'] as $attr) {
				if (strpos($url, $attr) !== false) {
					return true;
				}
			}

			return false;
		}

		public function hasExcludedIframeAttrs($iframe) {
			if (!array_key_exists('iframe_excluded_attrs', $this->config) && !is_array($this->config['iframe_excluded_attrs'])) {
				return false;
			}

			foreach ($this->config['iframe_excluded_attrs'] as $excluded_attr) {
				if (strpos($iframe[0], $excluded_attr) !== false) {
					return true;
				}
			}
			return false;
		}

		public function hasExcludedAttributes($element) {
			if (!array_key_exists('image_excluded_attributes', $this->config) && !is_array($this->config['image_excluded_attributes'])) {
				return false;
			}

			foreach ($this->config['image_excluded_attributes'] as $excluded_attr) {
				if (strpos($element, $excluded_attr) !== false) {
					return true;
				}
			}

			return false;
		}

		public function canLazyload($image, $image_config) {
			if ($this->hasExcludedAttributes($image)) {
				return false;
			}
			if (!ALHelper::safePregMatch('#\ssrc\s*=\s*(\'|")(?<src>.*)\1#Uis', $image, $attrs)) {
				return false;
			}

			$img_src = trim($attrs['src']);

			if ( '' === $img_src ) {
				return false;
			}

			if (isset($image_config['images_not_to_lazyload']) && is_array($image_config['images_not_to_lazyload'])) {
				foreach ($image_config['images_not_to_lazyload'] as $image_not_to_lazyload) {
					$image_not_to_lazyload = $this->getImageCdnUrl($image_not_to_lazyload, $image_config['replace_urls']);
					if (strpos($img_src, $image_not_to_lazyload) !== false) {
						return false;
					}
				}
			}

			return $image;
		}



		public function url_relative_to_full($url, $scheme, $host, $path) {
			$final_url = "";
			if (strpos($url, './') === 0 && !empty($path)) {
				$final_url = $scheme . $host . rtrim($path, '/') . '/' . ltrim($url, './');
			} elseif (strpos($url, '/') === 0 && strpos($url, '//') !== 0) {
				$final_url = $scheme . $host . $url;
			} else {
				$final_url = $url;
			}
			return $final_url;
		}

		public function replace_host_with_cdn($replace_urls, $url){
			foreach($replace_urls as $replace_url) {
				if (array_key_exists("search_for", $replace_url) && array_key_exists("replace_with", $replace_url)) {
					if (strpos($url, $replace_url["search_for"]) !== false) {
						return str_replace($replace_url["search_for"], $replace_url["replace_with"], $url);
					}
				}
			}
			$new_url = $this->convertThirdPartyUrlToCdnUrl($url);
			return $new_url;
		}
		public function isThirdPartyUrl($url) {
			$current_domain = $_SERVER['HTTP_HOST'];
			$image_domain = parse_url($url, PHP_URL_HOST);
			return ($image_domain !== $current_domain);
		}
		public function convertThirdPartyUrlToCdnUrl($image_url) {
			if ($this->isThirdPartyUrl($image_url)) {
				$image_domain = parse_url($image_url, PHP_URL_HOST);
				$cdn_host = parse_url($this->config['cdn_url'], PHP_URL_HOST);
				return str_replace($image_domain, $cdn_host, $image_url);
			}
			return $image_url;
		}
		public function imageUrlHostParam($image_url) {
			$parsed_url = parse_url($image_url);
			$host_param = "bv_host=" . $parsed_url['host'];
			return $host_param;
		}
		public function getImageCdnUrl($image_url, $replace_urls) {
			if (isset($this->config['image_excluded_src_attributes']) && is_array($this->config['image_excluded_src_attributes'])) {
				foreach ($this->config['image_excluded_src_attributes'] as $attrs) {
					if (strpos($image_url, $attrs) !== false) {
						return $image_url;
					}
				}
			}
			$parsed_url_info = $this->getParsedUrlInfo();
			$image_url = $this->url_relative_to_full($image_url, $parsed_url_info['scheme'], $parsed_url_info['host'], $parsed_url_info['path']);
			$host_param = $this->imageUrlHostParam($image_url);
			$new_image_url = $this->replace_host_with_cdn($replace_urls, $image_url);
			$query_string = parse_url($image_url, PHP_URL_QUERY);
			$new_image_url = $new_image_url . ($query_string ? "&" . $host_param : "?" . $host_param);
			return $new_image_url;
		}

		public function getUrlsFromAttributes($image_tag) {
			$image_urls = array();
			if (array_key_exists('image_src_attributes', $this->config) && is_array($this->config['image_src_attributes'])) {
				$attrs = implode('|', $this->config['image_src_attributes']);
				if (preg_match_all('#\s(' . $attrs . ')\s*=\s*(\'|")(?<values>.*?)\2#is', $image_tag, $matches)) {
					foreach ($matches['values'] as $values) {
						$values = trim($values);
						if ($this->hasEmbeddedImage($values)) continue;
						$values = explode(',', $values);
						foreach ($values as $src) {
							$src = preg_split('/\s+/', trim($src));
							array_push($image_urls, $src[0]);
						}
					}
				}
				return $image_urls;
			}
			return array();
		}


		public function replaceSrcAndSrcsetImages($element, $replace_urls, $class_name = "") {
			$urls_to_handle = array();
			$image_urls = $this->getUrlsFromAttributes($element);
			$image_urls = array_unique($image_urls, SORT_REGULAR);
			if (empty($image_urls)) {
				return $element;
			}
			if (!empty($class_name)) $element = $this->addBvClass($element, $class_name);
			foreach ($image_urls as $url) {
				array_push($urls_to_handle, $url);
			}

			foreach ($urls_to_handle as $url) {
				$final_url = $this->getImageCdnUrl($url, $replace_urls);
				if ($final_url) $element = str_replace($url, $final_url, $element);
			}
			return $element;
		}

		public function handlePictureTags($buffer, $image_config, $url_matched) {
			if (!preg_match_all('#<picture(?:.*)?>(?<sources>.*)</picture>#iUs', $buffer, $pictures, PREG_SET_ORDER)) {
				return $buffer;
			}
			$index = 0;
			foreach ($pictures as $picture) {
				$index += 1;
				$updated_picture = NULL;
				if (isset($image_config['picture_tags_not_to_lazyload']) && is_array($image_config['picture_tags_not_to_lazyload']) && $url_matched) {
					if (in_array($index, $image_config['picture_tags_not_to_lazyload'])) {
						$updated_picture = str_replace('<picture', '<picture data-bvlazyload="false"', $picture[0]);
						$buffer = str_replace($picture[0], $updated_picture, $buffer);
					}
				}
				if (is_null($updated_picture) && $this->hasExcludedAttributes($picture[0])){
					$updated_picture = str_replace('<picture', '<picture data-bvlazyload="false"', $picture[0]);
					$buffer = str_replace($picture[0], $updated_picture, $buffer);
				}

			}
			if (!preg_match_all('#<picture(?:.*)?>(?<sources>.*)</picture>#iUs', $buffer, $pictures, PREG_SET_ORDER)) {
				return $buffer;
			}
			$pictures = array_unique($pictures, SORT_REGULAR);
			foreach ($pictures as $picture) {
				$lazyload_picture = $this->config["lazyload_existing_picture_tags"];
				$updated_picture = $picture[0];
				if (strpos($picture[0], 'data-bvlazyload') !== false) {
					$lazyload_picture = false;
				}
				if ($lazyload_picture) {
					$updated_picture = $this->addLazyloadClassToPicture($picture[0]);
				}
				if (preg_match_all('#<source(?<atts>\s.+)>#iUs', $picture['sources'], $sources, PREG_SET_ORDER)) {
					$sources = array_unique($sources, SORT_REGULAR);

					foreach ($sources as $source) {
						$final_source = $source;
						$final_source[0] = $this->replaceSrcAndSrcsetImages($final_source[0], $image_config['replace_urls']);
						if ($lazyload_picture) {
							$final_source[0] = preg_replace('/([\s"\'])srcset/i', '\1bv-data-srcset', $final_source[0]);
						}
						$updated_picture = str_replace($source[0], $final_source[0], $updated_picture);
					}
				}
				if (preg_match_all('#<img\s.+\s?/?>#Uis', $picture[0], $image, PREG_SET_ORDER)) {
					$final_image = $image[0];
					$final_image[0] = $this->replaceSrcAndSrcsetImages($final_image[0], $image_config['replace_urls']);
					if ($lazyload_picture) {
						$final_image[0] = $this->lazyloadImage($final_image[0], $image_config, false);
					}
					$updated_picture = str_replace($image[0][0], $final_image[0], $updated_picture);
				}
				$buffer = str_replace($picture[0], $updated_picture, $buffer);
			}
			return $buffer;
		}

		public function imageHeight($image_tag) {
			if (ALHelper::safePregMatch('#\sheight\s*=\s*(\'|")(?<height>.*?)(\'|")#iUs', $image_tag, $matches)) {
				return absint($matches['height']);
			}
			return 0;
		}

		public function imageWidth($image_tag) {
			if (ALHelper::safePregMatch('#\swidth\s*=\s*(\'|")(?<width>.*?)(\'|")#iUs', $image_tag, $matches)) {
				return absint($matches['width']);
			}
			return 0;
		}

		public function getSvgSource($width = 0, $height = 0) {
			$new_src = str_replace( ' ', '%20', "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 $width $height'%3E%3C/svg%3E" );
			return $new_src;
		}

		public function getCleanUrl($url) {
			$clean_url = html_entity_decode($url, ENT_QUOTES|ENT_HTML5);
			$clean_url = strip_tags($clean_url, '\'" ');
			$clean_url = trim($clean_url, "\"' ");
			$clean_url = esc_url($clean_url);
			return $clean_url;
		}

		public function lazyloadTagImages($buffer, $image_config) {
			if (isset($image_config['html_tag_bg_style_lazyload'])) {
				$html_tags_with_styles = preg_match_all('#<(?<tag>div|figure|section|span|li|a|article|label)\s+(?<before>[^>]+[\'"\s])?style\s*=\s*([\'"])(?<styles>.*?)\3(?<after>[^>]*)>#is', $buffer, $html_elements, PREG_SET_ORDER);
				if($html_tags_with_styles) {
					foreach($html_elements as $html_element) {
						$tag_with_bg_img = ALHelper::safePregMatch('#background-image\s*:.*(?<attr>\s*url\s*\((?<url>[^)]+)\))\s*;?#is', $html_element['styles'], $url);
						if ($tag_with_bg_img) {
							if ($this->hasExcludedAttributes($html_element[0])) {
								continue;
							}
							$url['url'] = $this->getCleanUrl($url['url']);

							if (isset($image_config['images_not_to_lazyload']) && is_array($image_config['images_not_to_lazyload'])) {
								foreach ( $image_config['images_not_to_lazyload'] as $image_not_to_lazyload) {
									$image_not_to_lazyload = $this->getImageCdnUrl($image_not_to_lazyload, $image_config['replace_urls']);
									if (strpos($url['url'], $image_not_to_lazyload) !== false) {
										continue;
									}
								}
							}
							$lazy_tag = $this->addBvClass($html_element[0], 'bv-lazyload-bg-style');
							$lazy_tag = str_replace($html_element['styles'], '', $lazy_tag);
							$lazy_tag = str_replace('<' . $html_element['tag'], '<' . $html_element['tag'] . ' bv-data-style="' . $html_element['styles'] . '" ', $lazy_tag);
							$buffer = str_replace($html_element[0], $lazy_tag, $buffer);
						}
					}
				}
			}
			return $buffer;
		}

		public function addLazyloadClassToPicture($element) {
			ALHelper::safePregMatch('#<picture.*>#Uis', $element, $open_tag);
			$new_open_tag = $open_tag[0];
			$lazyload_class = "bv-lazyload-picture";
			$element_with_class = ALHelper::safePregMatch('#\sclass\s*=\s*(?<classes>["\'].*?["\']|[^\s]+)#is', $open_tag[0], $class_attr);
			if (!$element_with_class || empty($class_attr)) {
				$new_open_tag = str_replace('<picture', '<picture class="' . $lazyload_class . '"', $new_open_tag);
			} else {
				$classes = trim($class_attr['classes'], '\'" ');
				if (empty($classes)) {
					$new_open_tag =  str_replace($class_attr[0], ' class="' . $lazyload_class . '" ', $new_open_tag);
				} else {
					$classes .= ' ' . $lazyload_class;
					$new_open_tag = str_replace($class_attr[0], ' class="' . $classes . '" ', $new_open_tag);
				}
			}
			return str_replace($open_tag[0], $new_open_tag, $element);
		}

		public function addBvClass($element, $lazyload_class) {
			$element_with_class = ALHelper::safePregMatch('#\sclass\s*=\s*(?<classes>["\'].*?["\']|[^\s]+)#is', $element, $class_attr);
			if (!$element_with_class || empty($class_attr)) {
				return preg_replace('#<(img|div|figure|section|li|span|a|iframe)([^>]*)>#is', '<\1 class="' . $lazyload_class . '"\2>', $element);
			}

			$classes = trim($class_attr['classes'], '\'" ');
			if (empty($classes)) {
				return str_replace($class_attr[0], ' class="' . $lazyload_class . '" ', $element);
			}

			$classes .= ' ' . $lazyload_class;
			return str_replace($class_attr[0], ' class="' . $classes . '" ', $element);
		}

		public function lazyloadImage($image, $image_config, $add_bv_class = true) {
			$final_image = $image;
			if ($this->canLazyload($image, $image_config)) {
				if ($add_bv_class) {
					$final_image = $this->addBvClass($image, 'bv-lazyload-tag-img');
				}
				if (ALHelper::safePregMatch('#\ssrc\s*=\s*(\'|")(?<src>.*)\1#Uis', $image, $matches)) {
					if (!empty($matches['src'])) {
						$width = $this->imageWidth($image);
						$height = $this->imageHeight($image);
						$final_image = str_replace('<img', '<img bv-data-src="' . esc_attr($matches['src']) . '" ', $final_image);
						$final_image = str_replace($matches[0], ' src="' . $this->getSvgSource($width, $height) . '"', $final_image);
					}
				}
				if (ALHelper::safePregMatch('#\ssrcset\s*=\s*(\'|")(?<srcset>.*)\1#Uis', $image, $srcset)) {
					if (!empty($srcset['srcset'])) {
						$final_image = str_replace($srcset[0], ' bv-data-srcset="' . $srcset['srcset'] . '" ', $final_image);
					}
				}
			}
			return $final_image;
		}

		public function get_src_image_url($image_tag) {
			if (ALHelper::safePregMatch('#\ssrc\s*=\s*(\'|")(?<src>.*)\1#Uis', $image_tag, $attrs)) {
				return trim($attrs['src']);
			}
			return "";
		}

		private function addImageAttr($image, $image_config) {
			$img_src = $this->get_src_image_url($image);
			if (!empty($img_src)) {
				if (isset($image_config['viewport_images_info']['mobile'][$img_src])) {
					$height = $image_config['viewport_images_info']['mobile'][$img_src]['height'];
					$width = $image_config['viewport_images_info']['mobile'][$img_src]['width'];
					if (isset($height) && isset($width)) {
						if (ALHelper::safePregMatch('#\sstyle\s*=\s*(?<styles>("|\').*\2)#is', $image, $style)) {
							$new_style = trim($style['styles'], '\'" ');
							if (strpos($new_style, "min-width") === false && strpos($new_style, "min-height") === false) {
								$new_style = "min-width:$width" . "px;" . " min-height:$height" . "px; " . $new_style;
								$image = str_replace($style[0], 'style="' . $new_style . '"', $image);
							}
						}
						else {
							$image = str_replace('<img', '<img style="min-height:' . $height . 'px; min-width:' . $width . 'px;"', $image);
						}
					}
				}
			}
			return $image;

		}
		public function handleImgTags($buffer, $image_config) {
			if (isset($image_config['picture_tags']) && is_array($image_config['picture_tags'])) {
				$buffer = $this->doSearchAndReplace($buffer, $image_config['picture_tags']);
			}
			$html_without_picture_tag = preg_replace('/<picture[^>]*>.*?<\/picture\s*>/mis', '', $buffer);
			if (preg_match_all('#<img\s.+\s?/?>#Uis', $html_without_picture_tag, $images, PREG_SET_ORDER)) {
				foreach ($images as $image) {
					if ($this->hasNoActionAttribute($image[0])) continue;
					$final_image = $image;
					$lazyload_image = true;
					if (array_key_exists('replace_images', $image_config) && !empty($image_config['replace_images'])) {
						$final_image[0] = $this->doSearchAndReplace($final_image[0], $image_config['replace_images']);
						if ($final_image[0] !== $image[0]) $lazyload_image = false;
					}
					if (array_key_exists('viewport_images_info', $image_config) && array_key_exists('add_image_attributes', $image_config) && $image_config['add_image_attributes']) {
						$final_image[0] = $this->addImageAttr($final_image[0], $image_config);
					}
					$final_image[0] = $this->replaceSrcAndSrcsetImages($final_image[0], $image_config['replace_urls'], 'bv-tag-attr-replace');
					if ($lazyload_image && $this->config["lazyload_non_viewport_img_tags"]) {
						$final_image[0] = $this->lazyloadImage($final_image[0], $image_config);
					}
					$buffer = str_replace($image[0], $final_image[0], $buffer);
				}
			}
			return $buffer;
		}

		public function replaceStyleAttributeImages($element, $replace_urls, $tag) {
			if (ALHelper::safePregMatch('#\sstyle\s*=\s*(\'|").*?\1#is', $element, $styles)) {
				if (ALHelper::safePregMatch('#background-image\s*:.*(?<attr>\s*url\s*\((?<url>[^)]+)\))\s*;?#is', $styles[0], $url)) {
					$element = $this->addBvClass($element, 'bv-style-attr-replace');
					$url['url'] = $this->getCleanUrl($url['url']);
					$cdn_image_url = $this->getImageCdnUrl($url['url'], $replace_urls);
					$element = str_replace('<' . $tag, '<' . $tag . ' bv-style-url=' . '"' . $cdn_image_url . '" ', $element);
					$element = str_replace($url['url'], $cdn_image_url, $element);
				}
			}
			return $element;
		}

		public function handleOtherTagImages($buffer, $image_config) {
			if (preg_match_all('/(<(?<tag_name>div|figure|section|span|li|a|article|label)\s+([^>]+[\'"\s])?(style\s*=\s*([\'\"])(.*?)\4)?([^>]*)>)/',$buffer, $elements, PREG_SET_ORDER)) {
				foreach ($elements as $element) {
					$final_element = $element;
					if ($this->hasEmbeddedImage($element[0])) continue;
					$final_element[0] = $this->replaceStyleAttributeImages($final_element[0], $image_config['replace_urls'], $element["tag_name"]);
					$final_element[0] = $this->replaceSrcAndSrcsetImages($final_element[0], $image_config['replace_urls'], 'bv-tag-attr-replace');
					$buffer = str_replace($element[0], $final_element[0], $buffer);
				}
			}
			$buffer = $this->lazyloadTagImages($buffer, $image_config);
			return $buffer;
		}

		public function handleImages($buffer, $image_config, $url_matched) {
			if (!is_array($image_config) || empty($image_config)) {
				return $buffer;
			}
			$buffer = $this->handlePictureTags($buffer, $image_config, $url_matched);
			$buffer = $this->handleImgTags($buffer, $image_config);
			if ($this->config["optimize_embed_style_tag_images"]) {
				$buffer = $this->handleOtherTagImages($buffer, $image_config);
			}

			if ($url_matched && isset($image_config['preload_images']) && is_array($image_config['preload_images'])) {
				$buffer = $this->preloadImages($buffer, $image_config['preload_images']);
			}
			return $buffer;
		}
	}
endif;