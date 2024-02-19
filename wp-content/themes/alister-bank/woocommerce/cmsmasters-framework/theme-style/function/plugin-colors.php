<?php
/**
 * @package 	WordPress
 * @subpackage 	Alister Bank
 * @version 	1.0.2
 * 
 * WooCommerce Colors Rules
 * Created by CMSMasters
 * 
 */


function alister_bank_woocommerce_colors($custom_css) {
	$cmsmasters_option = alister_bank_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		$custom_css .= "
/***************** Start {$title} WooCommerce Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	{$rule}.cmsmasters_product .cmsmasters_product_cat a,
	{$rule}.cmsmasters_product .price,
	{$rule}.cmsmasters_product .cmsmasters_product_button,
	{$rule}.cmsmasters_product .cmsmasters_details_button,
	{$rule}.shop_table.woocommerce-checkout-review-order-table tbody tr *,
	{$rule}.shop_table.woocommerce-checkout-review-order-table tfoot tr *,
	{$rule}.select2-container .select2-choice, 
	{$rule}.select2-container.select2-drop-above .select2-choice, 
	{$rule}.select2-container.select2-container-active .select2-choice, 
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice, 
	{$rule}.select2-drop.select2-drop-active, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active,
	{$rule}ul.order_details strong,
	{$rule}.shop_table.order_details tbody tr *,
	{$rule}.shop_table.order_details tfoot tr *,
	{$rule}.woocommerce-MyAccount-content fieldset,
	{$rule}.woocommerce-MyAccount-content legend, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active,
	{$rule}.select2-container .select2-selection--single .select2-selection__rendered {
		" . cmsmasters_color_css('color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}.required,
	{$rule}.cmsmasters_single_product .product_meta .sku,
	{$rule}.shop_table .actions .coupon input[type=submit],
	{$rule}.woocommerce-MyAccount-navigation > ul > li > a,
	{$rule}.shop_table a:not(.button):hover,
	{$rule}.widget_layered_nav ul li a:hover, 
	{$rule}.widget_layered_nav ul li.chosen a, 
	{$rule}.widget_layered_nav_filters ul li a:hover, 
	{$rule}.widget_layered_nav_filters ul li.chosen a, 
	{$rule}.widget_product_categories ul li a:hover, 
	{$rule}.widget_product_categories ul li.current-cat a,
	{$rule}.woocommerce-breadcrumb,
	{$rule}.cmsmasters_product .price del,
	{$rule}.cmsmasters_single_product .price del,
	{$rule}.cmsmasters_single_product .cart .single_add_to_cart_button:hover,
	{$rule}.woocommerce-store-notice .woocommerce-store-notice__dismiss-link,
	{$rule}.cmsmasters_products .product.product-category .woocommerce-loop-category__title .count {
		" . cmsmasters_color_css('color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}#page .remove:before,
	{$rule}#page .remove:after,
	{$rule}.widget_price_filter .ui-slider-handle,
	{$rule}#main .cmsmasters_dynamic_cart_wrap:hover .cmsmasters_dynamic_cart_button,
	{$rule}.onsale,
	{$rule}.woocommerce-store-notice {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.select2-container.select2-container-active .select2-choice, 
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice, 
	{$rule}.select2-drop.select2-drop-active, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active,
	{$rule}.select2-container.select2-container--open .select2-selection--single,
	{$rule}.select2-container.select2-container--focus .select2-selection--single {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}.cmsmasters_products .product.product-category .woocommerce-loop-category__title:hover,
	{$rule}table.variations .reset_variations:hover,
	{$rule}.cmsmasters_product .cmsmasters_product_cat a:hover,
	{$rule}.cmsmasters_product .cmsmasters_product_button:hover,
	{$rule}.cmsmasters_product .cmsmasters_details_button:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}#page .remove:hover:before,
	{$rule}#page .remove:hover:after,
	{$rule}.cmsmasters_product .cmsmasters_product_sale_wrap .onsale,
	{$rule}.cmsmasters_single_product .cmsmasters_product_sale_wrap .onsale,
	{$rule}.cmsmasters_single_product .cart .single_add_to_cart_button {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}.link_hover_color,
	{$rule}.cmsmasters_single_product .cart .single_add_to_cart_button {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */	
	{$rule}.out-of-stock,
	{$rule}.stock,
	{$rule}.cmsmasters_single_product .price,
	{$rule}.quantity input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	{$rule}.shop_attributes th,
	{$rule}.widget_shopping_cart .total strong,
	{$rule}.widget_price_filter .price_slider_amount .price_label,
	{$rule}.cmsmasters_woo_wrap_result .woocommerce-result-count,
	{$rule}.shop_table a:not(.button), 
	{$rule}.cart_totals table,
	{$rule}.widget_layered_nav ul li, 
	{$rule}.widget_layered_nav ul li a, 
	{$rule}.widget_layered_nav_filters ul li, 
	{$rule}.widget_layered_nav_filters ul li a, 
	{$rule}.widget_product_categories ul li, 
	{$rule}.widget_product_categories ul li a {
		" . cmsmasters_color_css('color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_heading']) . "
	}

	{$rule}#main .cmsmasters_dynamic_cart_wrap .cmsmasters_dynamic_cart_button,
	{$rule}.cmsmasters_product .cmsmasters_product_sale_wrap .out-of-stock, 
	{$rule}.cmsmasters_single_product .cmsmasters_product_sale_wrap .out-of-stock {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}.woocommerce-store-notice, 
	{$rule}.woocommerce-store-notice p a, 
	{$rule}.woocommerce-store-notice p a:hover,
	{$rule}.shop_table .actions .coupon input[type=submit]:hover,
	{$rule}ul.order_details li,
	{$rule}.woocommerce-MyAccount-navigation > ul > li > a:hover,
	{$rule}.woocommerce-MyAccount-navigation > ul > li.is-active > a,
	{$rule}.onsale,
	{$rule}.cmsmasters_product .cmsmasters_product_sale_wrap .out-of-stock,
	{$rule}.cmsmasters_single_product .cmsmasters_product_sale_wrap .out-of-stock,
	{$rule}.cmsmasters_single_product .cart .single_add_to_cart_button {
		" . cmsmasters_color_css('color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.out-of-stock,
	{$rule}.stock,
	{$rule}.cmsmasters_product .cmsmasters_product_add_wrap,
	{$rule}.select2-container .select2-choice,
	{$rule}.select2-container.select2-drop-above .select2-choice,
	{$rule}.select2-container.select2-container-active .select2-choice,
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice,
	{$rule}.select2-results,
	{$rule}.input-checkbox + label:before,
	{$rule}.input-radio + label:before,
	{$rule}input.shipping_method + label:before,
	{$rule}.shop_table .actions .coupon input[type=submit],
	{$rule}ul.order_details strong,
	{$rule}.woocommerce-MyAccount-navigation > ul > li > a,
	{$rule}.woocommerce-MyAccount-content fieldset,
	{$rule}.woocommerce-MyAccount-content legend,
	{$rule}.select2-container .select2-selection--single,
	{$rule}.cmsmasters_single_product .cart .single_add_to_cart_button:hover,
	{$rule}.woocommerce-store-notice .woocommerce-store-notice__dismiss-link {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}.woocommerce-checkout-payment .payment_methods .payment_box,
	{$rule}.woocommerce-info,
	{$rule}.woocommerce-message,
	{$rule}.woocommerce-error {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_alternate']) . "
	}

	{$rule}#main .cmsmasters_dynamic_cart_wrap .cmsmasters_dynamic_cart_button span {
		" . cmsmasters_color_css('color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.woocommerce-checkout-payment .payment_methods .payment_box:after {
		" . cmsmasters_color_css('border-bottom-color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.widget_price_filter .price_slider {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsmasters_woo_comments .commentlist .comment,
	{$rule}.cmsmasters_woo_comments .commentlist .review,
	{$rule}div.products,
	{$rule}.input-checkbox + label:before,
	{$rule}.input-radio + label:before,
	{$rule}input.shipping_method + label:before,
	{$rule}.woocommerce-checkout-payment,
	{$rule}.woocommerce-checkout-payment .payment_methods .payment_box,
	{$rule}.woocommerce-info,
	{$rule}.woocommerce-message,
	{$rule}.woocommerce-error,
	{$rule}.shop_table .actions .coupon input[type=submit],
	{$rule}.select2-container .select2-choice,
	{$rule}.select2-container.select2-drop-above .select2-choice,
	{$rule}.cart_totals table th,
	{$rule}.cart_totals table td,
	{$rule}ul.order_details li strong,
	{$rule}.woocommerce-MyAccount-navigation > ul > li > a,
	{$rule}.shop_table .cart_item,
	{$rule}section.products,
	{$rule}.select2-dropdown,
	{$rule}.select2-container .select2-selection--single,
	{$rule}.cmsmasters_single_product .cart .single_add_to_cart_button:hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.select2-container.select2-container--open .select2-dropdown--below,
	{$rule}.select2-container.select2-container--focus .select2-dropdown--below {
		" . cmsmasters_color_css('border-top-color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.woocommerce-checkout-payment .payment_methods .payment_box:before,
	{$rule}.select2-container.select2-container--open .select2-dropdown--above,
	{$rule}.select2-container.select2-container--focus .select2-dropdown--above {
		" . cmsmasters_color_css('border-bottom-color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_border']) . "
	}

	/* Finish Borders Color */
	
	
	/* Start Secondary Color */
	{$rule}.cmsmasters_star_rating .cmsmasters_star_color_wrap,
	{$rule}.comment-form-rating .stars > span a:hover,
	{$rule}.comment-form-rating .stars > span a.active,
	{$rule}table.variations .reset_variations,
	{$rule}.cmsmasters_tabs.cmsmasters_woo_tabs .cmsmasters_tabs_list_item.current_tab > a,
	{$rule}.cmsmasters_tabs.cmsmasters_woo_tabs .cmsmasters_tabs_list_item.current_tab > a:hover,
	{$rule}.shop_table.woocommerce-checkout-review-order-table tfoot .order-total *,
	{$rule}.shop_table.order_details tfoot tr:last-child * {
		" . cmsmasters_color_css('color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_secondary']) . "
	}
	
	{$rule}.cmsmasters_star_rating .cmsmasters_star_trans_wrap, 
	{$rule}.comment-form-rating .stars > span {
		color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['alister-bank' . '_' . $scheme . '_secondary']) . ", .3);
	}
	
	{$rule}.input-checkbox + label:after,
	{$rule}.input-radio + label:after,
	{$rule}input.shipping_method + label:after,
	{$rule}.shop_table .actions .coupon input[type=submit]:hover,
	{$rule}ul.order_details li,
	{$rule}.woocommerce-MyAccount-navigation > ul > li > a:hover,
	{$rule}.woocommerce-MyAccount-navigation > ul > li.is-active > a,
	{$rule}.widget_price_filter .ui-slider-range {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_secondary']) . "
	}
	
	{$rule}.shop_table .actions .coupon input[type=submit]:hover,
	{$rule}.woocommerce-MyAccount-navigation > ul > li > a:hover,
	{$rule}.woocommerce-MyAccount-navigation > ul > li.is-active > a {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['alister-bank' . '_' . $scheme . '_secondary']) . "
	}
	
	/* Finish Secondary Color */
	
	/* Start Header Middle Rollover Color */
	{$rule}.header_mid .header_mid_inner .cmsmasters_header_cart_link.active {
		" . cmsmasters_color_css('color', $cmsmasters_option['alister-bank' . '_header_mid_hover']) . "
	}
	/* Finish Header Middle Rollover Color */

/***************** Finish {$title} WooCommerce Color Scheme Rules ******************/

";
	}
	
	
	return $custom_css;
}

add_filter('alister_bank_theme_colors_secondary_filter', 'alister_bank_woocommerce_colors');

