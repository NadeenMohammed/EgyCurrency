<?php 
/**
 * @package 	WordPress
 * @subpackage 	Alister Bank
 * @version		1.1.6
 * 
 * Theme Settings Defaults
 * Created by CMSMasters
 * 
 */


/* Theme Settings General Default Values */
if (!function_exists('alister_bank_settings_general_defaults')) {

function alister_bank_settings_general_defaults($id = false) {
	$settings = array( 
		'general' => array( 
			'alister-bank' . '_theme_layout' => 			'liquid', 
			'alister-bank' . '_logo_type' => 			'image', 
			'alister-bank' . '_logo_url' => 				'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo.png', 
			'alister-bank' . '_logo_url_retina' => 		'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_retina.png', 
			'alister-bank' . '_logo_title' => 			get_bloginfo('name') ? get_bloginfo('name') : 'Alister Bank', 
			'alister-bank' . '_logo_subtitle' => 		'', 
			'alister-bank' . '_logo_custom_color' => 	0, 
			'alister-bank' . '_logo_title_color' => 		'', 
			'alister-bank' . '_logo_subtitle_color' => 	'' 
		), 
		'bg' => array( 
			'alister-bank' . '_bg_col' => 			'#f5f5f6', 
			'alister-bank' . '_bg_img_enable' => 	1, 
			'alister-bank' . '_bg_img' => 			'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/boxed_bg.png', 
			'alister-bank' . '_bg_rep' => 			'no-repeat', 
			'alister-bank' . '_bg_pos' => 			'top center', 
			'alister-bank' . '_bg_att' => 			'scroll', 
			'alister-bank' . '_bg_size' => 			'cover' 
		), 
		'header' => array( 
			'alister-bank' . '_fixed_header' => 					1, 
			'alister-bank' . '_header_overlaps' => 				1, 
			'alister-bank' . '_header_top_line' => 				0, 
			'alister-bank' . '_header_top_height' => 			'40', 
			'alister-bank' . '_header_top_line_short_info' => 	'', 
			'alister-bank' . '_header_top_social' => 		1, 
			'alister-bank' . '_header_top_nav' => 			1, 
			'alister-bank' . '_header_top_line_add_cont' => 		0, 
			'alister-bank' . '_header_styles' => 				'l_nav', 
			'alister-bank' . '_header_mid_height' => 			'87', 
			'alister-bank' . '_header_bot_height' => 			'45', 
			'alister-bank' . '_header_search' => 				1, 
			'alister-bank' . '_header_add_cont' => 				'cust_html', 
			'alister-bank' . '_header_add_cont_cust_html' => 	'', 
			'alister-bank' . '_woocommerce_cart_dropdown' => 	0 
		), 
		'content' => array( 
			'alister-bank' . '_layout' => 					'r_sidebar', 
			'alister-bank' . '_archives_layout' => 			'r_sidebar', 
			'alister-bank' . '_search_layout' => 			'r_sidebar', 
			'alister-bank' . '_other_layout' => 				'r_sidebar', 
			'alister-bank' . '_heading_alignment' => 		'left', 
			'alister-bank' . '_heading_scheme' => 			'default', 
			'alister-bank' . '_heading_bg_image_enable' => 	0, 
			'alister-bank' . '_heading_bg_image' => 			'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/headline_bg.jpg', 
			'alister-bank' . '_heading_bg_repeat' => 		'no-repeat', 
			'alister-bank' . '_heading_bg_attachment' => 	'scroll', 
			'alister-bank' . '_heading_bg_size' => 			'cover', 
			'alister-bank' . '_heading_bg_color' => 			'#fcfcfc', 
			'alister-bank' . '_heading_height' => 			'180', 
			'alister-bank' . '_breadcrumbs' => 				1, 
			'alister-bank' . '_bottom_scheme' => 			'footer', 
			'alister-bank' . '_bottom_sidebar' => 			0, 
			'alister-bank' . '_bottom_sidebar_layout' => 	'14141414' 
		), 
		'footer' => array( 
			'alister-bank' . '_footer_scheme' => 				'footer', 
			'alister-bank' . '_footer_type' => 					'small', 
			'alister-bank' . '_footer_additional_content' => 	'nav', 
			'alister-bank' . '_footer_logo' => 					1, 
			'alister-bank' . '_footer_logo_url' => 				'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_footer.png', 
			'alister-bank' . '_footer_logo_url_retina' => 		'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_footer_retina.png', 
			'alister-bank' . '_footer_nav' => 					1, 
			'alister-bank' . '_footer_social' => 				1, 
			'alister-bank' . '_footer_html' => 					'', 
			'alister-bank' . '_footer_copyright' => 				'Alister Bank' . ' &copy; ' . date('Y') . ' / ' . esc_html__('All Rights Reserved', 'alister-bank')  
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



/* Theme Settings Fonts Default Values */
if (!function_exists('alister_bank_settings_font_defaults')) {

function alister_bank_settings_font_defaults($id = false) {
	$settings = array( 
		'content' => array( 
			'alister-bank' . '_content_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'15', 
				'line_height' => 		'24', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			) 
		), 
		'link' => array( 
			'alister-bank' . '_link_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'15', 
				'line_height' => 		'24', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'alister-bank' . '_link_hover_decoration' => 	'none' 
		), 
		'nav' => array( 
			'alister-bank' . '_nav_title_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'16', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'alister-bank' . '_nav_dropdown_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'15', 
				'line_height' => 		'22', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			) 
		), 
		'heading' => array( 
			'alister-bank' . '_h1_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'36', 
				'line_height' => 		'44', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'alister-bank' . '_h2_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'24', 
				'line_height' => 		'30', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'alister-bank' . '_h3_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'20', 
				'line_height' => 		'26', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'alister-bank' . '_h4_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'18', 
				'line_height' => 		'24', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'alister-bank' . '_h5_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'16', 
				'line_height' => 		'22', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'alister-bank' . '_h6_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'14', 
				'line_height' => 		'20', 
				'font_weight' => 		'400', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			) 
		), 
		'other' => array( 
			'alister-bank' . '_button_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'14', 
				'line_height' => 		'40', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'default' 
			), 
			'alister-bank' . '_small_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'12', 
				'line_height' => 		'22', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'alister-bank' . '_input_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'15', 
				'line_height' => 		'22', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal' 
			), 
			'alister-bank' . '_quote_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'24', 
				'line_height' => 		'36', 
				'font_weight' => 		'300', 
				'font_style' => 		'italic' 
			) 
		),
		'google' => array( 
			'alister-bank' . '_google_web_fonts' => array( 
				'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic|Roboto',
				'Roboto+Condensed:400,400italic,700,700italic|Roboto Condensed', 
				'Open+Sans:300,300italic,400,400italic,700,700italic|Open Sans', 
				'Open+Sans+Condensed:300,300italic,700|Open Sans Condensed', 
				'Droid+Sans:400,700|Droid Sans', 
				'Droid+Serif:400,400italic,700,700italic|Droid Serif', 
				'PT+Sans:400,400italic,700,700italic|PT Sans', 
				'PT+Sans+Caption:400,700|PT Sans Caption', 
				'PT+Sans+Narrow:400,700|PT Sans Narrow', 
				'PT+Serif:400,400italic,700,700italic|PT Serif', 
				'Ubuntu:400,400italic,700,700italic|Ubuntu', 
				'Ubuntu+Condensed|Ubuntu Condensed', 
				'Headland+One|Headland One', 
				'Source+Sans+Pro:300,300italic,400,400italic,700,700italic|Source Sans Pro', 
				'Lato:400,400italic,700,700italic|Lato', 
				'Cuprum:400,400italic,700,700italic|Cuprum', 
				'Oswald:300,400,700|Oswald', 
				'Yanone+Kaffeesatz:300,400,700|Yanone Kaffeesatz', 
				'Lobster|Lobster', 
				'Lobster+Two:400,400italic,700,700italic|Lobster Two', 
				'Questrial|Questrial', 
				'Raleway:300,400,500,600,700|Raleway', 
				'Dosis:300,400,500,700|Dosis', 
				'Cutive+Mono|Cutive Mono', 
				'Quicksand:300,400,700|Quicksand', 
				'Montserrat:400,700|Montserrat', 
				'Cookie|Cookie' 
			) 
		)  
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// WP Color Picker Palettes
if (!function_exists('cmsmasters_color_picker_palettes')) {

function cmsmasters_color_picker_palettes() {
	$palettes = array( 
		'#505050', 
		'#6a6a6a', 
		'#e53b24', 
		'#212121', 
		'#f7f7f7', 
		'#ffffff', 
		'#d2d2d8', 
		'#e53b24' 
	);
	
	
	return $palettes;
}

}



// Theme Settings Color Schemes Default Colors
if (!function_exists('alister_bank_color_schemes_defaults')) {

function alister_bank_color_schemes_defaults($id = false) {
	$settings = array( 
		'default' => array( // content default color scheme
			'color' => 		'#505050', 
			'link' => 		'#6a6a6a', 
			'hover' => 		'#e53b24', 
			'heading' => 	'#212121', 
			'bg' => 		'#f7f7f7', 
			'alternate' => 	'#ffffff', 
			'border' => 	'#d2d2d8', 
			'secondary' => 	'#e53b24' 
		), 
		'header' => array( // Header color scheme
			'mid_color' => 		'#212121', 
			'mid_link' => 		'#212121', 
			'mid_hover' => 		'#e53b24', 
			'mid_bg' => 		'#f7f7f7', 
			'mid_bg_scroll' => 	'#f7f7f7', 
			'mid_border' => 	'rgba(255,255,255,0)', 
			'bot_color' => 		'#212121', 
			'bot_link' => 		'#212121', 
			'bot_hover' => 		'#e53b24', 
			'bot_bg' => 		'#f7f7f7', 
			'bot_bg_scroll' => 	'#f7f7f7', 
			'bot_border' => 	'rgba(255,255,255,0.3)' 
		), 
		'navigation' => array( // Navigation color scheme
			'title_link' => 			'#212121', 
			'title_link_hover' => 		'#212121', 
			'title_link_current' => 	'#212121', 
			'title_link_subtitle' => 	'#5e5e5e', 
			'title_link_bg' => 			'#f7f7f7', 
			'title_link_bg_hover' => 	'#f7f7f7', 
			'title_link_bg_current' => 	'rgba(255,255,255,0)', 
			'title_link_border' => 		'rgba(255,255,255,0)', 
			'dropdown_text' => 			'#5e5e5e', 
			'dropdown_bg' => 			'#ffffff', 
			'dropdown_border' => 		'rgba(255,255,255,0)', 
			'dropdown_link' => 			'#212121', 
			'dropdown_link_hover' => 	'#e53b24', 
			'dropdown_link_subtitle' => '#5e5e5e', 
			'dropdown_link_highlight' => 'rgba(255,255,255,0)', 
			'dropdown_link_border' => 	'rgba(255,255,255,0)' 
		), 
		'header_top' => array( // Header Top color scheme
			'color' => 					'#818181', 
			'link' => 					'#c3c3c3', 
			'hover' => 					'#212121', 
			'bg' => 					'#ebebeb', 
			'border' => 				'#dadada', 
			'title_link' => 			'rgba(0,0,0,0.6)', 
			'title_link_hover' => 		'#212121', 
			'title_link_bg' => 			'rgba(255,255,255,0)', 
			'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
			'title_link_border' => 		'rgba(255,255,255,0)', 
			'dropdown_bg' => 			'#ffffff', 
			'dropdown_border' => 		'#ffffff', 
			'dropdown_link' => 			'#212121', 
			'dropdown_link_hover' => 	'#ffffff', 
			'dropdown_link_highlight' => '#f15039', 
			'dropdown_link_border' => 	'#ffffff' 
		), 
		'footer' => array( // Footer color scheme
			'color' => 		'#ffffff', 
			'link' => 		'rgba(255,255,255,0.5)', 
			'hover' => 		'#ffffff', 
			'heading' => 	'#ffffff', 
			'bg' => 		'#252525', 
			'alternate' => 	'#252525', 
			'border' => 	'rgba(255,255,255,0.1)', 
			'secondary' => 	'#f15039' 
		), 
		'first' => array( // custom color scheme 1
			'color' => 		'rgba(255,255,255,0.35)', 
			'link' => 		'rgba(255,255,255,0.35)', 
			'hover' => 		'#ffffff', 
			'heading' => 	'#ffffff', 
			'bg' => 		'#262626', 
			'alternate' => 	'#ffffff', 
			'border' => 	'rgba(255,255,255,0.2)', 
			'secondary' => 	'#f15039' 
		), 
		'second' => array( // custom color scheme 2
			'color' => 		'#ffffff', 
			'link' => 		'rgba(255,255,255,0.8)', 
			'hover' => 		'#e53b24', 
			'heading' => 	'#ffffff', 
			'bg' => 		'#f7f7f7', 
			'alternate' => 	'#ffffff', 
			'border' => 	'#d2d2d8', 
			'secondary' => 	'#e53b24' 
		), 
		'third' => array( // custom color scheme 3
			'color' => 		'#ededed', 
			'link' => 		'rgba(255,255,255,0.7)', 
			'hover' => 		'rgba(255,255,255,0.9)', 
			'heading' => 	'#ffffff', 
			'bg' => 		'#fbfbfb', 
			'alternate' => 	'#ffffff', 
			'border' => 	'#e4e4e4', 
			'secondary' => 	'#f15039' 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// Theme Settings Elements Default Values
if (!function_exists('alister_bank_settings_element_defaults')) {

function alister_bank_settings_element_defaults($id = false) {
	$settings = array( 
		'sidebar' => array( 
			'alister-bank' . '_sidebar' => 	'' 
		), 
		'icon' => array( 
			'alister-bank' . '_social_icons' => array( 
				'cmsmasters-icon-twitter|#|' . esc_html__('Twitter', 'alister-bank') . '|true||',
				'cmsmasters-icon-facebook-1|#|' . esc_html__('Facebook', 'alister-bank') . '|true||', 
				'cmsmasters-icon-youtube|#|' . esc_html__('YouTube', 'alister-bank') . '|true||',
				'cmsmasters-icon-instagram|#|' . esc_html__('Instagram', 'alister-bank') . '|true||', 
				'cmsmasters-icon-gplus-1|#|' . esc_html__('Google+', 'alister-bank') . '|true||'			 
			) 
		), 
		'lightbox' => array( 
			'alister-bank' . '_ilightbox_skin' => 					'dark', 
			'alister-bank' . '_ilightbox_path' => 					'vertical', 
			'alister-bank' . '_ilightbox_infinite' => 				0, 
			'alister-bank' . '_ilightbox_aspect_ratio' => 			1, 
			'alister-bank' . '_ilightbox_mobile_optimizer' => 		1, 
			'alister-bank' . '_ilightbox_max_scale' => 				1, 
			'alister-bank' . '_ilightbox_min_scale' => 				0.2, 
			'alister-bank' . '_ilightbox_inner_toolbar' => 			0, 
			'alister-bank' . '_ilightbox_smart_recognition' => 		0, 
			'alister-bank' . '_ilightbox_fullscreen_one_slide' => 	0, 
			'alister-bank' . '_ilightbox_fullscreen_viewport' => 	'center', 
			'alister-bank' . '_ilightbox_controls_toolbar' => 		1, 
			'alister-bank' . '_ilightbox_controls_arrows' => 		0, 
			'alister-bank' . '_ilightbox_controls_fullscreen' => 	1, 
			'alister-bank' . '_ilightbox_controls_thumbnail' => 		1, 
			'alister-bank' . '_ilightbox_controls_keyboard' => 		1, 
			'alister-bank' . '_ilightbox_controls_mousewheel' => 	1, 
			'alister-bank' . '_ilightbox_controls_swipe' => 			1, 
			'alister-bank' . '_ilightbox_controls_slideshow' => 		0 
		), 
		'sitemap' => array( 
			'alister-bank' . '_sitemap_nav' => 			1, 
			'alister-bank' . '_sitemap_categs' => 		1, 
			'alister-bank' . '_sitemap_tags' => 			1, 
			'alister-bank' . '_sitemap_month' => 		1, 
			'alister-bank' . '_sitemap_pj_categs' => 	1, 
			'alister-bank' . '_sitemap_pj_tags' => 		1 
		), 
		'error' => array( 
			'alister-bank' . '_error_color' => 				'#313131', 
			'alister-bank' . '_error_bg_color' => 			'#ffffff', 
			'alister-bank' . '_error_bg_img_enable' => 		0, 
			'alister-bank' . '_error_bg_image' => 			'', 
			'alister-bank' . '_error_bg_rep' => 				'no-repeat', 
			'alister-bank' . '_error_bg_pos' => 				'top center', 
			'alister-bank' . '_error_bg_att' => 				'scroll', 
			'alister-bank' . '_error_bg_size' => 			'cover', 
			'alister-bank' . '_error_search' => 				1, 
			'alister-bank' . '_error_sitemap_button' =>		1, 
			'alister-bank' . '_error_sitemap_link' => 		'' 
		), 
		'code' => array( 
			'alister-bank' . '_custom_css' => 			'', 
			'alister-bank' . '_custom_js' => 			'', 
			'alister-bank' . '_gmap_api_key' => 			'', 
			'alister-bank' . '_twitter_access_token' =>	''
		), 
		'recaptcha' => array( 
			'alister-bank' . '_recaptcha_public_key' => 		'', 
			'alister-bank' . '_recaptcha_private_key' => 	'' 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// Theme Settings Single Posts Default Values
if (!function_exists('alister_bank_settings_single_defaults')) {

function alister_bank_settings_single_defaults($id = false) {
	$settings = array( 
		'post' => array( 
			'alister-bank' . '_blog_post_layout' => 			'fullwidth', 
			'alister-bank' . '_blog_post_title' => 			1, 
			'alister-bank' . '_blog_post_date' => 			1, 
			'alister-bank' . '_blog_post_cat' => 			1, 
			'alister-bank' . '_blog_post_author' => 			1, 
			'alister-bank' . '_blog_post_comment' => 		1, 
			'alister-bank' . '_blog_post_tag' => 			1, 
			'alister-bank' . '_blog_post_like' => 			1, 
			'alister-bank' . '_blog_post_nav_box' => 		1, 
			'alister-bank' . '_blog_post_nav_order_cat' => 	0, 
			'alister-bank' . '_blog_post_share_box' => 		1, 
			'alister-bank' . '_blog_post_author_box' => 		1, 
			'alister-bank' . '_blog_more_posts_box' => 		'popular', 
			'alister-bank' . '_blog_more_posts_count' => 	'3', 
			'alister-bank' . '_blog_more_posts_pause' => 	'5' 
		), 
		'project' => array( 
			'alister-bank' . '_portfolio_project_title' => 			1, 
			'alister-bank' . '_portfolio_project_details_title' => 	esc_html__('Project details', 'alister-bank'), 
			'alister-bank' . '_portfolio_project_date' => 			1, 
			'alister-bank' . '_portfolio_project_cat' => 			1, 
			'alister-bank' . '_portfolio_project_author' => 			1, 
			'alister-bank' . '_portfolio_project_comment' => 		0, 
			'alister-bank' . '_portfolio_project_tag' => 			0, 
			'alister-bank' . '_portfolio_project_like' => 			1, 
			'alister-bank' . '_portfolio_project_link' => 			0, 
			'alister-bank' . '_portfolio_project_share_box' => 		1, 
			'alister-bank' . '_portfolio_project_nav_box' => 		1, 
			'alister-bank' . '_portfolio_project_nav_order_cat' => 	0, 
			'alister-bank' . '_portfolio_project_author_box' => 		1, 
			'alister-bank' . '_portfolio_more_projects_box' => 		'popular', 
			'alister-bank' . '_portfolio_more_projects_count' => 	'4', 
			'alister-bank' . '_portfolio_more_projects_pause' => 	'5', 
			'alister-bank' . '_portfolio_project_slug' => 			'project', 
			'alister-bank' . '_portfolio_pj_categs_slug' => 			'pj-categs', 
			'alister-bank' . '_portfolio_pj_tags_slug' => 			'pj-tags' 
		), 
		'profile' => array( 
			'alister-bank' . '_profile_post_title' => 			1, 
			'alister-bank' . '_profile_post_details_title' => 	esc_html__('Profile details', 'alister-bank'), 
			'alister-bank' . '_profile_post_cat' => 				1, 
			'alister-bank' . '_profile_post_comment' => 			1, 
			'alister-bank' . '_profile_post_like' => 			1, 
			'alister-bank' . '_profile_post_nav_box' => 			1, 
			'alister-bank' . '_profile_post_nav_order_cat' => 	0, 
			'alister-bank' . '_profile_post_share_box' => 		1, 
			'alister-bank' . '_profile_post_slug' => 			'profile', 
			'alister-bank' . '_profile_pl_categs_slug' => 		'pl-categs' 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



/* Project Puzzle Proportion */
if (!function_exists('alister_bank_project_puzzle_proportion')) {

function alister_bank_project_puzzle_proportion() {
	return 0.7069;
}

}



/* Project Puzzle Proportion */
if (!function_exists('alister_bank_project_puzzle_large_gar_parameters')) {

function alister_bank_project_puzzle_large_gar_parameters() {
	$parameter = array ( 
		'container_width' 		=> 1160, 
		'bottomStaticPadding' 	=> 2.6 
	);
	
	
	return $parameter;
}

}



/* Theme Image Thumbnails Size */
if (!function_exists('alister_bank_get_image_thumbnail_list')) {

function alister_bank_get_image_thumbnail_list() {
	$list = array( 
		'cmsmasters-small-thumb' => array( 
			'width' => 		75, 
			'height' => 	75, 
			'crop' => 		true 
		), 
		'cmsmasters-square-thumb' => array( 
			'width' => 		300, 
			'height' => 	300, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Square', 'alister-bank') 
		), 
		'cmsmasters-blog-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	366, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Masonry Blog', 'alister-bank') 
		), 
		'cmsmasters-project-thumb' => array( 
			'width' => 		580, 
			'height' => 	410, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Project', 'alister-bank') 
		), 
		'cmsmasters-project-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry Project', 'alister-bank') 
		), 
		'post-thumbnail' => array( 
			'width' => 		860, 
			'height' => 	575, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Featured', 'alister-bank') 
		), 
		'cmsmasters-masonry-thumb' => array( 
			'width' => 		860, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry', 'alister-bank') 
		), 
		'cmsmasters-full-thumb' => array( 
			'width' => 		1160, 
			'height' => 	770, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Full', 'alister-bank') 
		), 
		'cmsmasters-project-full-thumb' => array( 
			'width' => 		1160, 
			'height' => 	820, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Project Full', 'alister-bank') 
		), 
		'cmsmasters-full-masonry-thumb' => array( 
			'width' => 		1160, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry Full', 'alister-bank') 
		) 
	);
	
	
	return $list;
}

}



/* Project Post Type Registration Rename */
if (!function_exists('alister_bank_project_labels')) {

function alister_bank_project_labels() {
	return array( 
		'name' => 					esc_html__('Projects', 'alister-bank'), 
		'singular_name' => 			esc_html__('Project', 'alister-bank'), 
		'menu_name' => 				esc_html__('Projects', 'alister-bank'), 
		'all_items' => 				esc_html__('All Projects', 'alister-bank'), 
		'add_new' => 				esc_html__('Add New', 'alister-bank'), 
		'add_new_item' => 			esc_html__('Add New Project', 'alister-bank'), 
		'edit_item' => 				esc_html__('Edit Project', 'alister-bank'), 
		'new_item' => 				esc_html__('New Project', 'alister-bank'), 
		'view_item' => 				esc_html__('View Project', 'alister-bank'), 
		'search_items' => 			esc_html__('Search Projects', 'alister-bank'), 
		'not_found' => 				esc_html__('No projects found', 'alister-bank'), 
		'not_found_in_trash' => 	esc_html__('No projects found in Trash', 'alister-bank') 
	);
}

}

// add_filter('cmsmasters_project_labels_filter', 'alister_bank_project_labels');


if (!function_exists('alister_bank_pj_categs_labels')) {

function alister_bank_pj_categs_labels() {
	return array( 
		'name' => 					esc_html__('Project Categories', 'alister-bank'), 
		'singular_name' => 			esc_html__('Project Category', 'alister-bank') 
	);
}

}

// add_filter('cmsmasters_pj_categs_labels_filter', 'alister_bank_pj_categs_labels');


if (!function_exists('alister_bank_pj_tags_labels')) {

function alister_bank_pj_tags_labels() {
	return array( 
		'name' => 					esc_html__('Project Tags', 'alister-bank'), 
		'singular_name' => 			esc_html__('Project Tag', 'alister-bank') 
	);
}

}

// add_filter('cmsmasters_pj_tags_labels_filter', 'alister_bank_pj_tags_labels');



/* Profile Post Type Registration Rename */
if (!function_exists('alister_bank_profile_labels')) {

function alister_bank_profile_labels() {
	return array( 
		'name' => 					esc_html__('Profiles', 'alister-bank'), 
		'singular_name' => 			esc_html__('Profiles', 'alister-bank'), 
		'menu_name' => 				esc_html__('Profiles', 'alister-bank'), 
		'all_items' => 				esc_html__('All Profiles', 'alister-bank'), 
		'add_new' => 				esc_html__('Add New', 'alister-bank'), 
		'add_new_item' => 			esc_html__('Add New Profile', 'alister-bank'), 
		'edit_item' => 				esc_html__('Edit Profile', 'alister-bank'), 
		'new_item' => 				esc_html__('New Profile', 'alister-bank'), 
		'view_item' => 				esc_html__('View Profile', 'alister-bank'), 
		'search_items' => 			esc_html__('Search Profiles', 'alister-bank'), 
		'not_found' => 				esc_html__('No Profiles found', 'alister-bank'), 
		'not_found_in_trash' => 	esc_html__('No Profiles found in Trash', 'alister-bank') 
	);
}

}

// add_filter('cmsmasters_profile_labels_filter', 'alister_bank_profile_labels');


if (!function_exists('alister_bank_pl_categs_labels')) {

function alister_bank_pl_categs_labels() {
	return array( 
		'name' => 					esc_html__('Profile Categories', 'alister-bank'), 
		'singular_name' => 			esc_html__('Profile Category', 'alister-bank') 
	);
}

}

// add_filter('cmsmasters_pl_categs_labels_filter', 'alister_bank_pl_categs_labels');

