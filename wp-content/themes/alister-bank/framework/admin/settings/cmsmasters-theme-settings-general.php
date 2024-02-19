<?php 
/**
 * @package 	WordPress
 * @subpackage 	Alister Bank
 * @version 	1.0.7
 * 
 * Admin Panel General Options
 * Created by CMSMasters
 * 
 */


function alister_bank_options_general_tabs() {
	$cmsmasters_option = alister_bank_get_global_options();
	
	$tabs = array();
	
	$tabs['general'] = esc_attr__('General', 'alister-bank');
	
	if ($cmsmasters_option['alister-bank' . '_theme_layout'] === 'boxed') {
		$tabs['bg'] = esc_attr__('Background', 'alister-bank');
	}
	
	if (CMSMASTERS_THEME_STYLE_COMPATIBILITY) {
		$tabs['theme_style'] = esc_attr__('Theme Style', 'alister-bank');
	}
	
	$tabs['header'] = esc_attr__('Header', 'alister-bank');
	$tabs['content'] = esc_attr__('Content', 'alister-bank');
	$tabs['footer'] = esc_attr__('Footer', 'alister-bank');
	
	return apply_filters('cmsmasters_options_general_tabs_filter', $tabs);
}


function alister_bank_options_general_sections() {
	$tab = alister_bank_get_the_tab();
	
	switch ($tab) {
	case 'general':
		$sections = array();
		
		$sections['general_section'] = esc_attr__('General Options', 'alister-bank');
		
		break;
	case 'bg':
		$sections = array();
		
		$sections['bg_section'] = esc_attr__('Background Options', 'alister-bank');
		
		break;
	case 'theme_style':
		$sections = array();
		
		$sections['theme_style_section'] = esc_attr__('Theme Design Style', 'alister-bank');
		
		break;
	case 'header':
		$sections = array();
		
		$sections['header_section'] = esc_attr__('Header Options', 'alister-bank');
		
		break;
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_attr__('Content Options', 'alister-bank');
		
		break;
	case 'footer':
		$sections = array();
		
		$sections['footer_section'] = esc_attr__('Footer Options', 'alister-bank');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_general_sections_filter', $sections, $tab);
} 


function alister_bank_options_general_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = alister_bank_get_the_tab();
	}
	
	$options = array();
	
	
	$defaults = alister_bank_settings_general_defaults();
	
	
	switch ($tab) {
	case 'general':
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'alister-bank' . '_theme_layout', 
			'title' => esc_html__('Theme Layout', 'alister-bank'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_theme_layout'], 
			'choices' => array( 
				esc_html__('Liquid', 'alister-bank') . '|liquid', 
				esc_html__('Boxed', 'alister-bank') . '|boxed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'alister-bank' . '_logo_type', 
			'title' => esc_html__('Logo Type', 'alister-bank'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_logo_type'], 
			'choices' => array( 
				esc_html__('Image', 'alister-bank') . '|image', 
				esc_html__('Text', 'alister-bank') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'alister-bank' . '_logo_url', 
			'title' => esc_html__('Logo Image', 'alister-bank'), 
			'desc' => esc_html__('Choose your website logo image.', 'alister-bank'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['alister-bank' . '_logo_url'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'alister-bank' . '_logo_url_retina', 
			'title' => esc_html__('Retina Logo Image', 'alister-bank'), 
			'desc' => esc_html__('Choose logo image for retina displays. Logo for Retina displays should be twice the size of the default one.', 'alister-bank'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['alister-bank' . '_logo_url_retina'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'alister-bank' . '_logo_title', 
			'title' => esc_html__('Logo Title', 'alister-bank'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['alister-bank' . '_logo_title'], 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'alister-bank' . '_logo_subtitle', 
			'title' => esc_html__('Logo Subtitle', 'alister-bank'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['alister-bank' . '_logo_subtitle'], 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'alister-bank' . '_logo_custom_color', 
			'title' => esc_html__('Custom Text Colors', 'alister-bank'), 
			'desc' => esc_html__('enable', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_logo_custom_color'] 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'alister-bank' . '_logo_title_color', 
			'title' => esc_html__('Logo Title Color', 'alister-bank'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['alister-bank' . '_logo_title_color'] 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'alister-bank' . '_logo_subtitle_color', 
			'title' => esc_html__('Logo Subtitle Color', 'alister-bank'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['alister-bank' . '_logo_subtitle_color'] 
		);
		
		break;
	case 'bg':
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'alister-bank' . '_bg_col', 
			'title' => esc_html__('Background Color', 'alister-bank'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => $defaults[$tab]['alister-bank' . '_bg_col'] 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'alister-bank' . '_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_bg_img_enable'] 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'alister-bank' . '_bg_img', 
			'title' => esc_html__('Background Image', 'alister-bank'), 
			'desc' => esc_html__('Choose your custom website background image url.', 'alister-bank'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['alister-bank' . '_bg_img'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'alister-bank' . '_bg_rep', 
			'title' => esc_html__('Background Repeat', 'alister-bank'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_bg_rep'], 
			'choices' => array( 
				esc_html__('No Repeat', 'alister-bank') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'alister-bank') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'alister-bank') . '|repeat-y', 
				esc_html__('Repeat', 'alister-bank') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'alister-bank' . '_bg_pos', 
			'title' => esc_html__('Background Position', 'alister-bank'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['alister-bank' . '_bg_pos'], 
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
			'section' => 'bg_section', 
			'id' => 'alister-bank' . '_bg_att', 
			'title' => esc_html__('Background Attachment', 'alister-bank'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_bg_att'], 
			'choices' => array( 
				esc_html__('Scroll', 'alister-bank') . '|scroll', 
				esc_html__('Fixed', 'alister-bank') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'alister-bank' . '_bg_size', 
			'title' => esc_html__('Background Size', 'alister-bank'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'alister-bank') . '|auto', 
				esc_html__('Cover', 'alister-bank') . '|cover', 
				esc_html__('Contain', 'alister-bank') . '|contain' 
			) 
		);
		
		break;
	case 'theme_style':
		$options[] = array( 
			'section' => 'theme_style_section', 
			'id' => 'alister-bank' . '_theme_style', 
			'title' => esc_html__('Choose Theme Style', 'alister-bank'), 
			'desc' => '', 
			'type' => 'select_theme_style', 
			'std' => '', 
			'choices' => alister_bank_all_theme_styles() 
		);
		
		break;
	case 'header':
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'alister-bank' . '_fixed_header', 
			'title' => esc_html__('Fixed Header', 'alister-bank'), 
			'desc' => esc_html__('enable', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_fixed_header'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'alister-bank' . '_header_overlaps', 
			'title' => esc_html__('Header Overlaps Content by Default', 'alister-bank'), 
			'desc' => esc_html__('enable', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_header_overlaps'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'alister-bank' . '_header_top_line', 
			'title' => esc_html__('Top Line', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_header_top_line'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'alister-bank' . '_header_top_height', 
			'title' => esc_html__('Top Height', 'alister-bank'), 
			'desc' => esc_html__('pixels', 'alister-bank'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['alister-bank' . '_header_top_height'], 
			'min' => '10' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'alister-bank' . '_header_top_line_short_info', 
			'title' => esc_html__('Top Short Info', 'alister-bank'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'alister-bank') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['alister-bank' . '_header_top_line_short_info'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'alister-bank' . '_header_top_line_add_cont', 
			'title' => esc_html__('Top Additional Content', 'alister-bank'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_header_top_line_add_cont'], 
			'choices' => array( 
				esc_html__('None', 'alister-bank') . '|none', 
				esc_html__('Top Line Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'alister-bank') . '|social', 
				esc_html__('Top Line Navigation (will be shown if set in Appearance - Menus tab)', 'alister-bank') . '|nav' 
			) 
		);		
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'alister-bank' . '_header_styles', 
			'title' => esc_html__('Header Styles', 'alister-bank'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_header_styles'], 
			'choices' => array( 
				esc_html__('Default Style', 'alister-bank') . '|default', 
				esc_html__('Compact Style Left Navigation', 'alister-bank') . '|l_nav', 
				esc_html__('Compact Style Right Navigation', 'alister-bank') . '|r_nav', 
				esc_html__('Compact Style Center Navigation', 'alister-bank') . '|c_nav'
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'alister-bank' . '_header_mid_height', 
			'title' => esc_html__('Header Middle Height', 'alister-bank'), 
			'desc' => esc_html__('pixels', 'alister-bank'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['alister-bank' . '_header_mid_height'], 
			'min' => '40' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'alister-bank' . '_header_bot_height', 
			'title' => esc_html__('Header Bottom Height', 'alister-bank'), 
			'desc' => esc_html__('pixels', 'alister-bank'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['alister-bank' . '_header_bot_height'], 
			'min' => '20' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'alister-bank' . '_header_search', 
			'title' => esc_html__('Header Search', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_header_search'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'alister-bank' . '_header_add_cont', 
			'title' => esc_html__('Header Additional Content', 'alister-bank'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_header_add_cont'], 
			'choices' => array( 
				esc_html__('None', 'alister-bank') . '|none', 
				esc_html__('Header Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'alister-bank') . '|social', 
				esc_html__('Header Custom HTML', 'alister-bank') . '|cust_html' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'alister-bank' . '_header_add_cont_cust_html', 
			'title' => esc_html__('Header Custom HTML', 'alister-bank'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'alister-bank') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['alister-bank' . '_header_add_cont_cust_html'], 
			'class' => '' 
		);
		
		break;
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_layout', 
			'title' => esc_html__('Layout Type by Default', 'alister-bank'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'alister-bank'), 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['alister-bank' . '_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'alister-bank') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'alister-bank') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'alister-bank') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_archives_layout', 
			'title' => esc_html__('Archives Layout Type', 'alister-bank'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Archive Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'alister-bank'), 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['alister-bank' . '_archives_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'alister-bank') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'alister-bank') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'alister-bank') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_search_layout', 
			'title' => esc_html__('Search Layout Type', 'alister-bank'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Search Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'alister-bank'), 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['alister-bank' . '_search_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'alister-bank') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'alister-bank') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'alister-bank') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_other_layout', 
			'title' => esc_html__('Other Layout Type', 'alister-bank'), 
			'desc' => esc_html__('Layout for pages of non-listed types. Choosing layout with a sidebar please make sure to add widgets to the Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'alister-bank'),
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['alister-bank' . '_other_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'alister-bank') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'alister-bank') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'alister-bank') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_heading_alignment', 
			'title' => esc_html__('Heading Alignment by Default', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank') . '<br><br>' . esc_html__('Please make sure to add widgets in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'alister-bank'), 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_heading_alignment'], 
			'choices' => array( 
				esc_html__('Left', 'alister-bank') . '|left', 
				esc_html__('Right', 'alister-bank') . '|right', 
				esc_html__('Center', 'alister-bank') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_heading_scheme', 
			'title' => esc_html__('Heading Color Scheme by Default', 'alister-bank'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['alister-bank' . '_heading_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_heading_bg_image_enable', 
			'title' => esc_html__('Heading Background Image Visibility by Default', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_heading_bg_image_enable'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_heading_bg_image', 
			'title' => esc_html__('Heading Background Image by Default', 'alister-bank'), 
			'desc' => esc_html__('Choose your custom heading background image by default.', 'alister-bank'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['alister-bank' . '_heading_bg_image'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_heading_bg_repeat', 
			'title' => esc_html__('Heading Background Repeat by Default', 'alister-bank'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_heading_bg_repeat'], 
			'choices' => array( 
				esc_html__('No Repeat', 'alister-bank') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'alister-bank') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'alister-bank') . '|repeat-y', 
				esc_html__('Repeat', 'alister-bank') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_heading_bg_attachment', 
			'title' => esc_html__('Heading Background Attachment by Default', 'alister-bank'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_heading_bg_attachment'], 
			'choices' => array( 
				esc_html__('Scroll', 'alister-bank') . '|scroll', 
				esc_html__('Fixed', 'alister-bank') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_heading_bg_size', 
			'title' => esc_html__('Heading Background Size by Default', 'alister-bank'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_heading_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'alister-bank') . '|auto', 
				esc_html__('Cover', 'alister-bank') . '|cover', 
				esc_html__('Contain', 'alister-bank') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_heading_bg_color', 
			'title' => esc_html__('Heading Background Color Overlay by Default', 'alister-bank'), 
			'desc' => '',  
			'type' => 'rgba', 
			'std' => $defaults[$tab]['alister-bank' . '_heading_bg_color'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_heading_height', 
			'title' => esc_html__('Heading Height by Default', 'alister-bank'), 
			'desc' => esc_html__('pixels', 'alister-bank'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['alister-bank' . '_heading_height'], 
			'min' => '0' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_breadcrumbs', 
			'title' => esc_html__('Breadcrumbs Visibility by Default', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_breadcrumbs'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_bottom_scheme', 
			'title' => esc_html__('Bottom Color Scheme', 'alister-bank'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['alister-bank' . '_bottom_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_bottom_sidebar', 
			'title' => esc_html__('Bottom Sidebar Visibility by Default', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_bottom_sidebar'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_bottom_sidebar_layout', 
			'title' => esc_html__('Bottom Sidebar Layout by Default', 'alister-bank'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['alister-bank' . '_bottom_sidebar_layout'], 
			'choices' => array( 
				'1/1|11', 
				'1/2 + 1/2|1212', 
				'1/3 + 2/3|1323', 
				'2/3 + 1/3|2313', 
				'1/4 + 3/4|1434', 
				'3/4 + 1/4|3414', 
				'1/3 + 1/3 + 1/3|131313', 
				'1/2 + 1/4 + 1/4|121414', 
				'1/4 + 1/2 + 1/4|141214', 
				'1/4 + 1/4 + 1/2|141412', 
				'1/4 + 1/4 + 1/4 + 1/4|14141414' 
			) 
		);
		
		break;
	case 'footer':
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'alister-bank' . '_footer_scheme', 
			'title' => esc_html__('Footer Color Scheme', 'alister-bank'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['alister-bank' . '_footer_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'alister-bank' . '_footer_type', 
			'title' => esc_html__('Footer Type', 'alister-bank'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_footer_type'], 
			'choices' => array( 
				esc_html__('Default', 'alister-bank') . '|default', 
				esc_html__('Small', 'alister-bank') . '|small' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'alister-bank' . '_footer_additional_content', 
			'title' => esc_html__('Footer Additional Content', 'alister-bank'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['alister-bank' . '_footer_additional_content'], 
			'choices' => array( 
				esc_html__('None', 'alister-bank') . '|none', 
				esc_html__('Footer Navigation (will be shown if set in Appearance - Menus tab)', 'alister-bank') . '|nav', 
				esc_html__('Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'alister-bank') . '|social', 
				esc_html__('Custom HTML', 'alister-bank') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'alister-bank' . '_footer_logo', 
			'title' => esc_html__('Footer Logo', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_footer_logo'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'alister-bank' . '_footer_logo_url', 
			'title' => esc_html__('Footer Logo', 'alister-bank'), 
			'desc' => esc_html__('Choose your website footer logo image.', 'alister-bank'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['alister-bank' . '_footer_logo_url'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'alister-bank' . '_footer_logo_url_retina', 
			'title' => esc_html__('Footer Logo for Retina', 'alister-bank'), 
			'desc' => esc_html__('Choose your website footer logo image for retina.', 'alister-bank'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['alister-bank' . '_footer_logo_url_retina'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'alister-bank' . '_footer_nav', 
			'title' => esc_html__('Footer Navigation', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_footer_nav'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'alister-bank' . '_footer_social', 
			'title' => esc_html__('Footer Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_footer_social'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'alister-bank' . '_footer_html', 
			'title' => esc_html__('Footer Custom HTML', 'alister-bank'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'alister-bank') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['alister-bank' . '_footer_html'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'alister-bank' . '_footer_copyright', 
			'title' => esc_html__('Copyright Text', 'alister-bank'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['alister-bank' . '_footer_copyright'], 
			'class' => '' 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_general_fields_filter', $options, $tab);
}

