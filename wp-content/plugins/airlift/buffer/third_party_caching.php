<?php

if (!defined('ABSPATH')) exit;

if (!class_exists('ALThirdPartyCache')) :
	class ALThirdPartyCache {
		function start_third_party_host_caching() {
			$cache_fname = dirname( __FILE__ ) . "/cache.php";

			if (file_exists($cache_fname)) {
				require_once $cache_fname;
				$socache = new ALCache();
				if (array_key_exists('bv_print_buffer', $_GET)) {
					ob_start([$socache, 'serveBuffer']);
				}
				else {
					ob_start([$socache, 'optimizePage']);
				}
			}
		}
	}
endif;