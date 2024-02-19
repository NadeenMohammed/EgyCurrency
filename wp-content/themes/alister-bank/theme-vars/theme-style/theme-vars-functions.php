<?php
/**
 * @package 	WordPress
 * @subpackage 	Alister Bank
 * @version 	1.0.0
 * 
 * Theme Vars Functions
 * Created by CMSMasters
 * 
 */


/* Register CSS Styles */
function alister_bank_vars_register_css_styles() {
	wp_enqueue_style('alister-bank-theme-vars-style', get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/css/vars-style.css', array('alister-bank-retina'), '1.0.0', 'screen, print');
}

add_action('wp_enqueue_scripts', 'alister_bank_vars_register_css_styles');

