<?php 
/**
 * @package 	WordPress
 * @subpackage 	Alister Bank
 * @version 	1.1.6
 * 
 * Admin Panel Element Options
 * Created by CMSMasters
 * 
 */


function alister_bank_options_element_tabs() {
	$tabs = array();
	
	$tabs['sidebar'] = esc_attr__('Sidebars', 'alister-bank');
	
	if (class_exists('Cmsmasters_Content_Composer')) {
		$tabs['icon'] = esc_attr__('Social Icons', 'alister-bank');
	}
	
	$tabs['lightbox'] = esc_attr__('Lightbox', 'alister-bank');
	$tabs['sitemap'] = esc_attr__('Sitemap', 'alister-bank');
	$tabs['error'] = esc_attr__('404', 'alister-bank');
	$tabs['code'] = esc_attr__('Custom Codes', 'alister-bank');
	
	if (class_exists('Cmsmasters_Form_Builder')) {
		$tabs['recaptcha'] = esc_attr__('reCAPTCHA', 'alister-bank');
	}
	
	return apply_filters('cmsmasters_options_element_tabs_filter', $tabs);
}


function alister_bank_options_element_sections() {
	$tab = alister_bank_get_the_tab();
	
	switch ($tab) {
	case 'sidebar':
		$sections = array();
		
		$sections['sidebar_section'] = esc_attr__('Custom Sidebars', 'alister-bank');
		
		break;
	case 'icon':
		$sections = array();
		
		$sections['icon_section'] = esc_attr__('Social Icons', 'alister-bank');
		
		break;
	case 'lightbox':
		$sections = array();
		
		$sections['lightbox_section'] = esc_attr__('Theme Lightbox Options', 'alister-bank');
		
		break;
	case 'sitemap':
		$sections = array();
		
		$sections['sitemap_section'] = esc_attr__('Sitemap Page Options', 'alister-bank');
		
		break;
	case 'error':
		$sections = array();
		
		$sections['error_section'] = esc_attr__('404 Error Page Options', 'alister-bank');
		
		break;
	case 'code':
		$sections = array();
		
		$sections['code_section'] = esc_attr__('Custom Codes', 'alister-bank');
		
		break;
	case 'recaptcha':
		$sections = array();
		
		$sections['recaptcha_section'] = esc_attr__('Form Builder Plugin reCAPTCHA Keys', 'alister-bank');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_element_sections_filter', $sections, $tab);	
} 


function alister_bank_options_element_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = alister_bank_get_the_tab();
	}
	
	
	$options = array();
	
	
	$defaults = alister_bank_settings_element_defaults();
	
	
	switch ($tab) {
	case 'sidebar':
		$options[] = array( 
			'section' => 'sidebar_section', 
			'id' => 'alister-bank' . '_sidebar', 
			'title' => esc_html__('Custom Sidebars', 'alister-bank'), 
			'desc' => '', 
			'type' => 'sidebar', 
			'std' => $defaults[$tab]['alister-bank' . '_sidebar'] 
		);
		
		break;
	case 'icon':
		$options[] = array( 
			'section' => 'icon_section', 
			'id' => 'alister-bank' . '_social_icons', 
			'title' => esc_html__('Social Icons', 'alister-bank'), 
			'desc' => '', 
			'type' => 'social', 
			'std' => $defaults[$tab]['alister-bank' . '_social_icons'] 
		);
		
		break;
	case 'lightbox':
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_skin', 
			'title' => esc_html__('Skin', 'alister-bank'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_skin'], 
			'choices' => array( 
				esc_html__('Dark', 'alister-bank') . '|dark', 
				esc_html__('Light', 'alister-bank') . '|light', 
				esc_html__('Mac', 'alister-bank') . '|mac', 
				esc_html__('Metro Black', 'alister-bank') . '|metro-black', 
				esc_html__('Metro White', 'alister-bank') . '|metro-white', 
				esc_html__('Parade', 'alister-bank') . '|parade', 
				esc_html__('Smooth', 'alister-bank') . '|smooth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_path', 
			'title' => esc_html__('Path', 'alister-bank'), 
			'desc' => esc_html__('Sets path for switching windows', 'alister-bank'), 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_path'], 
			'choices' => array( 
				esc_html__('Vertical', 'alister-bank') . '|vertical', 
				esc_html__('Horizontal', 'alister-bank') . '|horizontal' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_infinite', 
			'title' => esc_html__('Infinite', 'alister-bank'), 
			'desc' => esc_html__('Sets the ability to infinite the group', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_infinite'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_aspect_ratio', 
			'title' => esc_html__('Keep Aspect Ratio', 'alister-bank'), 
			'desc' => esc_html__('Sets the resizing method used to keep aspect ratio within the viewport', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_aspect_ratio'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_mobile_optimizer', 
			'title' => esc_html__('Mobile Optimizer', 'alister-bank'), 
			'desc' => esc_html__('Make lightboxes optimized for giving better experience with mobile devices', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_mobile_optimizer'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_max_scale', 
			'title' => esc_html__('Max Scale', 'alister-bank'), 
			'desc' => esc_html__('Sets the maximum viewport scale of the content', 'alister-bank'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_max_scale'], 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_min_scale', 
			'title' => esc_html__('Min Scale', 'alister-bank'), 
			'desc' => esc_html__('Sets the minimum viewport scale of the content', 'alister-bank'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_min_scale'], 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_inner_toolbar', 
			'title' => esc_html__('Inner Toolbar', 'alister-bank'), 
			'desc' => esc_html__('Bring buttons into windows, or let them be over the overlay', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_inner_toolbar'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_smart_recognition', 
			'title' => esc_html__('Smart Recognition', 'alister-bank'), 
			'desc' => esc_html__('Sets content auto recognize from web pages', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_smart_recognition'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_fullscreen_one_slide', 
			'title' => esc_html__('Fullscreen One Slide', 'alister-bank'), 
			'desc' => esc_html__('Decide to fullscreen only one slide or hole gallery the fullscreen mode', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_fullscreen_one_slide'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_fullscreen_viewport', 
			'title' => esc_html__('Fullscreen Viewport', 'alister-bank'), 
			'desc' => esc_html__('Sets the resizing method used to fit content within the fullscreen mode', 'alister-bank'), 
			'type' => 'select', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_fullscreen_viewport'], 
			'choices' => array( 
				esc_html__('Center', 'alister-bank') . '|center', 
				esc_html__('Fit', 'alister-bank') . '|fit', 
				esc_html__('Fill', 'alister-bank') . '|fill', 
				esc_html__('Stretch', 'alister-bank') . '|stretch' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_controls_toolbar', 
			'title' => esc_html__('Toolbar Controls', 'alister-bank'), 
			'desc' => esc_html__('Sets buttons be available or not', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_controls_toolbar'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_controls_arrows', 
			'title' => esc_html__('Arrow Controls', 'alister-bank'), 
			'desc' => esc_html__('Enable the arrow buttons', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_controls_arrows'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_controls_fullscreen', 
			'title' => esc_html__('Fullscreen Controls', 'alister-bank'), 
			'desc' => esc_html__('Sets the fullscreen button', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_controls_fullscreen'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_controls_thumbnail', 
			'title' => esc_html__('Thumbnails Controls', 'alister-bank'), 
			'desc' => esc_html__('Sets the thumbnail navigation', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_controls_thumbnail'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_controls_keyboard', 
			'title' => esc_html__('Keyboard Controls', 'alister-bank'), 
			'desc' => esc_html__('Sets the keyboard navigation', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_controls_keyboard'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_controls_mousewheel', 
			'title' => esc_html__('Mouse Wheel Controls', 'alister-bank'), 
			'desc' => esc_html__('Sets the mousewheel navigation', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_controls_mousewheel'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_controls_swipe', 
			'title' => esc_html__('Swipe Controls', 'alister-bank'), 
			'desc' => esc_html__('Sets the swipe navigation', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_controls_swipe'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'alister-bank' . '_ilightbox_controls_slideshow', 
			'title' => esc_html__('Slideshow Controls', 'alister-bank'), 
			'desc' => esc_html__('Enable the slideshow feature and button', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_ilightbox_controls_slideshow'] 
		);
		
		break;
	case 'sitemap':
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'alister-bank' . '_sitemap_nav', 
			'title' => esc_html__('Website Pages', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_sitemap_nav'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'alister-bank' . '_sitemap_categs', 
			'title' => esc_html__('Blog Archives by Categories', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_sitemap_categs'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'alister-bank' . '_sitemap_tags', 
			'title' => esc_html__('Blog Archives by Tags', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_sitemap_tags'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'alister-bank' . '_sitemap_month', 
			'title' => esc_html__('Blog Archives by Month', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_sitemap_month'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'alister-bank' . '_sitemap_pj_categs', 
			'title' => esc_html__('Portfolio Archives by Categories', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_sitemap_pj_categs'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'alister-bank' . '_sitemap_pj_tags', 
			'title' => esc_html__('Portfolio Archives by Tags', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_sitemap_pj_tags'] 
		);
		
		break;
	case 'error':
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'alister-bank' . '_error_color', 
			'title' => esc_html__('Text Color', 'alister-bank'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['alister-bank' . '_error_color'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'alister-bank' . '_error_bg_color', 
			'title' => esc_html__('Background Color', 'alister-bank'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['alister-bank' . '_error_bg_color'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'alister-bank' . '_error_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_error_bg_img_enable'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'alister-bank' . '_error_bg_image', 
			'title' => esc_html__('Background Image', 'alister-bank'), 
			'desc' => esc_html__('Choose your custom error page background image.', 'alister-bank'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['alister-bank' . '_error_bg_image'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'alister-bank' . '_error_bg_rep', 
			'title' => esc_html__('Background Repeat', 'alister-bank'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_error_bg_rep'], 
			'choices' => array( 
				esc_html__('No Repeat', 'alister-bank') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'alister-bank') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'alister-bank') . '|repeat-y', 
				esc_html__('Repeat', 'alister-bank') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'alister-bank' . '_error_bg_pos', 
			'title' => esc_html__('Background Position', 'alister-bank'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['alister-bank' . '_error_bg_pos'], 
			'choices' => array( 
				esc_html__('Top Left', 'alister-bank') . '|top left', 
				esc_html__('Top Center', 'alister-bank') . '|top center', 
				esc_html__('Top Right', 'alister-bank') . '|top right', 
				esc_html__('Center Left', 'alister-bank') . '|center left', 
				esc_html__('Center Center', 'alister-bank') . '|center center', 
				esc_html__('Center Right', 'alister-bank') . '|center right', 
				esc_html__('Bottom Left', 'alister-bank') . '|bottom left', 
				esc_html__('Bottom Center', 'alister-bank') . '|bottom center', 
				esc_html__('Bottom Right', 'alister-bank') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'alister-bank' . '_error_bg_att', 
			'title' => esc_html__('Background Attachment', 'alister-bank'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_error_bg_att'], 
			'choices' => array( 
				esc_html__('Scroll', 'alister-bank') . '|scroll', 
				esc_html__('Fixed', 'alister-bank') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'alister-bank' . '_error_bg_size', 
			'title' => esc_html__('Background Size', 'alister-bank'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_error_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'alister-bank') . '|auto', 
				esc_html__('Cover', 'alister-bank') . '|cover', 
				esc_html__('Contain', 'alister-bank') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'alister-bank' . '_error_search', 
			'title' => esc_html__('Search Line', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_error_search'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'alister-bank' . '_error_sitemap_button', 
			'title' => esc_html__('Sitemap Button', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_error_sitemap_button'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'alister-bank' . '_error_sitemap_link', 
			'title' => esc_html__('Sitemap Page URL', 'alister-bank'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['alister-bank' . '_error_sitemap_link'], 
			'class' => '' 
		);
		
		break;
	case 'code':
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'alister-bank' . '_custom_css', 
			'title' => esc_html__('Custom CSS', 'alister-bank'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['alister-bank' . '_custom_css'], 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'alister-bank' . '_custom_js', 
			'title' => esc_html__('Custom JavaScript', 'alister-bank'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['alister-bank' . '_custom_js'], 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'alister-bank' . '_gmap_api_key', 
			'title' => esc_html__('Google Maps API key', 'alister-bank'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['alister-bank' . '_gmap_api_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'alister-bank' . '_twitter_access_token', 
			'title' => esc_html__('Twitter Access Token', 'alister-bank'), 
			'desc' => sprintf(
				/* translators: Twitter access token. %s: Link to twitter access token generator */
				esc_html__( 'Generate %s and paste Access Token to this field.', 'alister-bank' ),
				'<a href="' . esc_url( 'https://api.cmsmasters.net/wp-json/cmsmasters-api/v1/twitter-request-token' ) . '" target="_blank">' .
					esc_html__( 'twitter access token', 'alister-bank' ) .
				'</a>'
			), 
			'type' => 'text', 
			'std' => $defaults[$tab]['alister-bank' . '_twitter_access_token'], 
			'class' => '' 
		);
		
		break;
	case 'recaptcha':
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'alister-bank' . '_recaptcha_public_key', 
			'title' => esc_html__('reCAPTCHA Public Key', 'alister-bank'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['alister-bank' . '_recaptcha_public_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'alister-bank' . '_recaptcha_private_key', 
			'title' => esc_html__('reCAPTCHA Private Key', 'alister-bank'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['alister-bank' . '_recaptcha_private_key'], 
			'class' => '' 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_element_fields_filter', $options, $tab);	
}

