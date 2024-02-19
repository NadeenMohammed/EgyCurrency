<?php 
/**
 * @package 	WordPress
 * @subpackage 	Alister Bank
 * @version		1.0.0
 * 
 * Theme Admin Settings
 * Created by CMSMasters
 * 
 */

 /* General Settings */
function alister_bank_theme_options_general_fields($options, $tab) {
	if ($tab == 'header') {
		$options_new = array();
		
		foreach ($options as $option) {
			if ($option['id'] == 'alister-bank' . '_header_top_line_add_cont') {
				// remove this field
				
				$options_new[] = array( 
					'section' => 'header_section', 
					'id' => 'alister-bank' . '_header_top_social', 
					'title' => esc_html__('Top Line Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'alister-bank'), 
					'desc' => esc_html__('show', 'alister-bank'), 
					'type' => 'checkbox', 
					'std' => 1 
				);
				
				$options_new[] = array( 
					'section' => 'header_section', 
					'id' => 'alister-bank' . '_header_top_nav', 
					'title' => esc_html__('Top Line Navigation', 'alister-bank'), 
					'desc' => esc_html__('show', 'alister-bank'), 
					'type' => 'checkbox', 
					'std' => 1
				);
			} else {
				$options_new[] = $option;
			}
		}		
		
		$options = $options_new;
	}

	return $options;
}

add_filter('cmsmasters_options_general_fields_filter', 'alister_bank_theme_options_general_fields', 10, 2);

/* Color Settings */
function alister_bank_theme_options_color_fields($options, $tab) {
	$defaults = alister_bank_color_schemes_defaults();
	
	
	if ($tab != 'header' && $tab != 'navigation' && $tab != 'header_top') {
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => 'alister-bank' . '_' . $tab . '_secondary', 
			'title' => esc_html__('Secondary Color', 'alister-bank'), 
			'desc' => esc_html__('Secondary color for some elements', 'alister-bank'), 
			'type' => 'rgba', 
			'std' => (isset($defaults[$tab])) ? $defaults[$tab]['secondary'] : $defaults['default']['secondary'] 
		);
	}	
	
	return $options;
}

add_filter('cmsmasters_options_color_fields_filter', 'alister_bank_theme_options_color_fields', 10, 2);



