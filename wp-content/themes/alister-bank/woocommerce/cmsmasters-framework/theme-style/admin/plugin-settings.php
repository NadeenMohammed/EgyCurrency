<?php
/**
 * @package 	WordPress
 * @subpackage 	Alister Bank
 * @version 	1.0.7
 *
 * CMSMasters WooCommerce Admin Settings
 * Created by CMSMasters
 *
 */


/* Single Settings */
function alister_bank_woocommerce_options_general_fields($options, $tab) {
	$defaults = alister_bank_settings_general_defaults();

	if ($tab == 'header') {
		$options[] = array(
			'section' => 'header_section',
			'id' => 'alister-bank' . '_woocommerce_cart_dropdown',
			'title' => esc_html__('Disable WooCommerce Cart', 'alister-bank'),
			'desc' => '',
			'type' => 'checkbox',
			'std' => $defaults[$tab]['alister-bank' . '_woocommerce_cart_dropdown']
		);
	}

	return $options;
}

add_filter('cmsmasters_options_general_fields_filter', 'alister_bank_woocommerce_options_general_fields', 10, 2);

