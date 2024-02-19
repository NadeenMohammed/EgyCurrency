<?php
/**
 * @package 	WordPress
 * @subpackage 	Alister Bank
 * @version 	1.1.3
 * 
 * Admin Panel Scripts & Styles
 * Created by CMSMasters
 * 
 */


function alister_bank_admin_register($hook) {
	global $pagenow;
	
	$screen = get_current_screen();
	
	
	wp_enqueue_style('wp-color-picker');
	
	wp_enqueue_script('wp-color-picker');

	wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', array(
		'clear' => 				esc_attr__('Clear', 'alister-bank'),
		'clearAriaLabel' => 	esc_attr__('Clear color', 'alister-bank'),
		'defaultLabel' => 		esc_attr__('Color value', 'alister-bank'),
		'defaultString' => 		esc_attr__('Default', 'alister-bank'),
		'defaultAriaLabel' => 	esc_attr__('Select default color', 'alister-bank'),
		'pick' => 				esc_attr__('Select Color', 'alister-bank'),
	) ); 
	
	wp_enqueue_script('wp-color-picker-alpha', get_template_directory_uri() . '/framework/admin/inc/js/wp-color-picker-alpha.js', array('jquery', 'wp-color-picker'), '2.1.4', true);
	
	
	wp_enqueue_style('alister-bank-admin-icons-font', get_template_directory_uri() . '/framework/admin/inc/css/admin-icons-font.css', array(), '1.0.0', 'screen');
	
	wp_enqueue_style('alister-bank-lightbox', get_template_directory_uri() . '/framework/admin/inc/css/jquery.cmsmastersLightbox.css', array(), '1.0.0', 'screen');
	
	if (is_rtl()) {
		wp_enqueue_style('alister-bank-lightbox-rtl', get_template_directory_uri() . '/framework/admin/inc/css/jquery.cmsmastersLightbox-rtl.css', array(), '1.0.0', 'screen');
	}
	
	
	wp_enqueue_script('alister-bank-uploader-js', get_template_directory_uri() . '/framework/admin/inc/js/jquery.cmsmastersUploader.js', array('jquery'), '1.0.0', true);
	
	wp_localize_script('alister-bank-uploader-js', 'cmsmasters_admin_uploader', array( 
		'choose' => 				esc_attr__('Choose image', 'alister-bank'), 
		'insert' => 				esc_attr__('Insert image', 'alister-bank'), 
		'remove' => 				esc_attr__('Remove', 'alister-bank'), 
		'edit_gallery' => 			esc_attr__('Edit gallery', 'alister-bank') 
	));
	
	
	wp_enqueue_script('alister-bank-lightbox-js', get_template_directory_uri() . '/framework/admin/inc/js/jquery.cmsmastersLightbox.js', array('jquery'), '1.0.0', true);
	
	wp_localize_script('alister-bank-lightbox-js', 'cmsmasters_admin_lightbox', array( 
		'cancel' => 				esc_attr__('Cancel', 'alister-bank'), 
		'insert' => 				esc_attr__('Insert', 'alister-bank'), 
		'deselect' => 				esc_attr__('Deselect', 'alister-bank'), 
		'choose_icon' => 			esc_attr__('Choose Icon', 'alister-bank'), 
		'find_icons' => 			esc_attr__('Find icons', 'alister-bank'), 
		'min_length' => 			esc_attr__('min 2 symbols', 'alister-bank'), 
		'choose_font' => 			esc_attr__('Choose icons font', 'alister-bank'), 
		'error_on_page' => 			esc_attr__("Error on page!\nReload page and try again.", 'alister-bank') 
	));
	
	
	if ( 
		$hook == 'post.php' || 
		$hook == 'post-new.php' || 
		$hook == 'widgets.php' || 
		$hook == 'term.php' || 
		$hook == 'edit-tags.php' || 
		$hook == 'nav-menus.php' || 
		str_replace('cmsmasters-settings-element', '', $screen->id) != $screen->id 
	) {
		wp_enqueue_style('alister-bank-icons', get_template_directory_uri() . '/css/fontello.css', array(), '1.0.0', 'screen');
		
		wp_enqueue_style('alister-bank-icons-custom', get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/css/fontello-custom.css', array(), '1.0.0', 'screen');
	}
	
	
	if ( 
		$hook == 'widgets.php' || 
		$hook == 'nav-menus.php' 
	) {
		wp_enqueue_media();
	}
	
	
	wp_enqueue_style('alister-bank-admin-styles', get_template_directory_uri() . '/framework/admin/inc/css/admin-theme-styles.css', array(), '1.0.0', 'screen');
	
	if (is_rtl()) {
		wp_enqueue_style('alister-bank-admin-styles-rtl', get_template_directory_uri() . '/framework/admin/inc/css/admin-theme-styles-rtl.css', array(), '1.0.0', 'screen');
	}
	
	
	wp_enqueue_script('alister-bank-admin-scripts', get_template_directory_uri() . '/framework/admin/inc/js/admin-theme-scripts.js', array('jquery'), '1.0.0', true);
	
	
	if ($hook == 'widgets.php') {
		wp_enqueue_style('alister-bank-widgets-styles', get_template_directory_uri() . '/framework/admin/inc/css/widgets-styles.css', array(), '1.0.0', 'screen');
		
		wp_enqueue_script('alister-bank-widgets-scripts', get_template_directory_uri() . '/framework/admin/inc/js/widgets-scripts.js', array('jquery'), '1.0.0', true);
	}
}

add_action('admin_enqueue_scripts', 'alister_bank_admin_register');

add_action('admin_enqueue_scripts', 'cmsmasters_composer_icons');

