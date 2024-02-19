<?php 
/**
 * @package 	WordPress
 * @subpackage 	Alister Bank
 * @version		1.0.0
 * 
 * Admin Panel Fonts Options
 * Created by CMSMasters
 * 
 */


function alister_bank_options_font_tabs() {
	$tabs = array();
	
	$tabs['content'] = esc_attr__('Content', 'alister-bank');
	$tabs['link'] = esc_attr__('Links', 'alister-bank');
	$tabs['nav'] = esc_attr__('Navigation', 'alister-bank');
	$tabs['heading'] = esc_attr__('Heading', 'alister-bank');
	$tabs['other'] = esc_attr__('Other', 'alister-bank');
	$tabs['google'] = esc_attr__('Google Fonts', 'alister-bank');
	
	return apply_filters('cmsmasters_options_font_tabs_filter', $tabs);
}


function alister_bank_options_font_sections() {
	$tab = alister_bank_get_the_tab();
	
	switch ($tab) {
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_html__('Content Font Options', 'alister-bank');
		
		break;
	case 'link':
		$sections = array();
		
		$sections['link_section'] = esc_html__('Links Font Options', 'alister-bank');
		
		break;
	case 'nav':
		$sections = array();
		
		$sections['nav_section'] = esc_html__('Navigation Font Options', 'alister-bank');
		
		break;
	case 'heading':
		$sections = array();
		
		$sections['heading_section'] = esc_html__('Headings Font Options', 'alister-bank');
		
		break;
	case 'other':
		$sections = array();
		
		$sections['other_section'] = esc_html__('Other Fonts Options', 'alister-bank');
		
		break;
	case 'google':
		$sections = array();
		
		$sections['google_section'] = esc_html__('Serving Google Fonts from CDN', 'alister-bank');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_font_sections_filter', $sections, $tab);
} 


function alister_bank_options_font_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = alister_bank_get_the_tab();
	}
	
	
	$options = array();
	
	
	$defaults = alister_bank_settings_font_defaults();
	
	
	switch ($tab) {
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'alister-bank' . '_content_font', 
			'title' => esc_html__('Main Content Font', 'alister-bank'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['alister-bank' . '_content_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;
	case 'link':
		$options[] = array( 
			'section' => 'link_section', 
			'id' => 'alister-bank' . '_link_font', 
			'title' => esc_html__('Links Font', 'alister-bank'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['alister-bank' . '_link_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'link_section', 
			'id' => 'alister-bank' . '_link_hover_decoration', 
			'title' => esc_html__('Links Hover Text Decoration', 'alister-bank'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['alister-bank' . '_link_hover_decoration'], 
			'choices' => alister_bank_text_decoration_list() 
		);
		
		break;
	case 'nav':
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => 'alister-bank' . '_nav_title_font', 
			'title' => esc_html__('Navigation Title Font', 'alister-bank'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['alister-bank' . '_nav_title_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => 'alister-bank' . '_nav_dropdown_font', 
			'title' => esc_html__('Navigation Dropdown Font', 'alister-bank'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['alister-bank' . '_nav_dropdown_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		break;
	case 'heading':
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'alister-bank' . '_h1_font', 
			'title' => esc_html__('H1 Tag Font', 'alister-bank'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['alister-bank' . '_h1_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'alister-bank' . '_h2_font', 
			'title' => esc_html__('H2 Tag Font', 'alister-bank'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['alister-bank' . '_h2_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'alister-bank' . '_h3_font', 
			'title' => esc_html__('H3 Tag Font', 'alister-bank'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['alister-bank' . '_h3_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'alister-bank' . '_h4_font', 
			'title' => esc_html__('H4 Tag Font', 'alister-bank'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['alister-bank' . '_h4_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'alister-bank' . '_h5_font', 
			'title' => esc_html__('H5 Tag Font', 'alister-bank'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['alister-bank' . '_h5_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'alister-bank' . '_h6_font', 
			'title' => esc_html__('H6 Tag Font', 'alister-bank'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['alister-bank' . '_h6_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		break;
	case 'other':
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'alister-bank' . '_button_font', 
			'title' => esc_html__('Button Font', 'alister-bank'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['alister-bank' . '_button_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'alister-bank' . '_small_font', 
			'title' => esc_html__('Small Tag Font', 'alister-bank'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['alister-bank' . '_small_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'alister-bank' . '_input_font', 
			'title' => esc_html__('Text Fields Font', 'alister-bank'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['alister-bank' . '_input_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'alister-bank' . '_quote_font', 
			'title' => esc_html__('Blockquote Font', 'alister-bank'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['alister-bank' . '_quote_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;

	case 'google':
		$options[] = array( 
			'section' => 'google_section', 
			'id' => 'alister-bank' . '_google_web_fonts', 
			'title' => esc_html__('Google Fonts', 'alister-bank'), 
			'desc' => '', 
			'type' => 'google_web_fonts', 
			'std' => $defaults[$tab]['alister-bank' . '_google_web_fonts']
		);
		
		$options[] = array( 
			'section' => 'google_section', 
			'id' => 'alister-bank' . '_google_web_fonts_subset', 
			'title' => esc_html__('Google Fonts Subset', 'alister-bank'), 
			'desc' => '', 
			'type' => 'select_multiple', 
			'std' => '', 
			'choices' => array( 
				esc_html__('Latin Extended', 'alister-bank') . '|' . 'latin-ext', 
				esc_html__('Arabic', 'alister-bank') . '|' . 'arabic', 
				esc_html__('Cyrillic', 'alister-bank') . '|' . 'cyrillic', 
				esc_html__('Cyrillic Extended', 'alister-bank') . '|' . 'cyrillic-ext', 
				esc_html__('Greek', 'alister-bank') . '|' . 'greek', 
				esc_html__('Greek Extended', 'alister-bank') . '|' . 'greek-ext', 
				esc_html__('Vietnamese', 'alister-bank') . '|' . 'vietnamese', 
				esc_html__('Japanese', 'alister-bank') . '|' . 'japanese', 
				esc_html__('Korean', 'alister-bank') . '|' . 'korean', 
				esc_html__('Thai', 'alister-bank') . '|' . 'thai', 
				esc_html__('Bengali', 'alister-bank') . '|' . 'bengali', 
				esc_html__('Devanagari', 'alister-bank') . '|' . 'devanagari', 
				esc_html__('Gujarati', 'alister-bank') . '|' . 'gujarati', 
				esc_html__('Gurmukhi', 'alister-bank') . '|' . 'gurmukhi', 
				esc_html__('Hebrew', 'alister-bank') . '|' . 'hebrew', 
				esc_html__('Kannada', 'alister-bank') . '|' . 'kannada', 
				esc_html__('Khmer', 'alister-bank') . '|' . 'khmer', 
				esc_html__('Malayalam', 'alister-bank') . '|' . 'malayalam', 
				esc_html__('Myanmar', 'alister-bank') . '|' . 'myanmar', 
				esc_html__('Oriya', 'alister-bank') . '|' . 'oriya', 
				esc_html__('Sinhala', 'alister-bank') . '|' . 'sinhala', 
				esc_html__('Tamil', 'alister-bank') . '|' . 'tamil', 
				esc_html__('Telugu', 'alister-bank') . '|' . 'telugu' 
			) 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_font_fields_filter', $options, $tab);	
}

