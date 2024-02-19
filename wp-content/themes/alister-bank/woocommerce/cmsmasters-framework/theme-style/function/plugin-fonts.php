<?php
/**
 * @package 	WordPress
 * @subpackage 	Alister Bank
 * @version 	1.0.2
 * 
 * WooCommerce Fonts Rules
 * Created by CMSMasters
 * 
 */


function alister_bank_woocommerce_fonts($custom_css) {
	$cmsmasters_option = alister_bank_get_global_options();
	
	
	$custom_css .= "
/***************** Start WooCommerce Font Styles ******************/

	/* Start Content Font */
	.cart_totals table td strong,
	.shop_table.woocommerce-checkout-review-order-table tbody tr *,
	.shop_table.woocommerce-checkout-review-order-table tfoot tr *,
	ul.order_details strong,
	.shop_table.order_details tbody tr *,
	.shop_table.order_details tfoot tr * {
		font-family:" . alister_bank_get_google_font($cmsmasters_option['alister-bank' . '_content_font_google_font']) . $cmsmasters_option['alister-bank' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['alister-bank' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['alister-bank' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['alister-bank' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['alister-bank' . '_content_font_font_style'] . ";
	}

	.widget_product_search .search_bar_wrap input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]) {
		font-size:" . ((int) $cmsmasters_option['alister-bank' . '_content_font_font_size'] - 1) . "px;
	}
	
	.onsale,
	.out-of-stock,
	.stock {
		font-size:" . ((int) $cmsmasters_option['alister-bank' . '_content_font_font_size'] - 3) . "px;
		line-height:" . ((int) $cmsmasters_option['alister-bank' . '_content_font_line_height'] - 2) . "px;
	}
	
	.widget_shopping_cart .cart_list .quantity,
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list .quantity {
		font-size:" . ((int) $cmsmasters_option['alister-bank' . '_content_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['alister-bank' . '_content_font_line_height'] - 2) . "px;
	}
	/* Finish Content Font */
	
	
	/* Start Link Font */
	#page table.variations .reset_variations,
	#page table.variations tr td.label,
	.shop_table .product-name a,
	.widget_shopping_cart .total *,
	.widget > .product_list_widget .amount,
	.widget > .product_list_widget del .amount,
	.widget_price_filter .price_slider_amount .price_label,
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .total,
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .total strong {
		font-family:" . alister_bank_get_google_font($cmsmasters_option['alister-bank' . '_link_font_google_font']) . $cmsmasters_option['alister-bank' . '_link_font_system_font'] . ";
		font-size:" . $cmsmasters_option['alister-bank' . '_link_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['alister-bank' . '_link_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['alister-bank' . '_link_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['alister-bank' . '_link_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['alister-bank' . '_link_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['alister-bank' . '_link_font_text_decoration'] . ";
	}
	
	.widget_price_filter .price_slider_amount .price_label {
		font-size:" . ((int) $cmsmasters_option['alister-bank' . '_link_font_font_size'] - 2) . "px;
	}

	@media all and (max-width:950px) {
		.widget_price_filter .price_slider_amount .price_label {
			font-size:" . ((int) $cmsmasters_option['alister-bank' . '_link_font_font_size'] + 2) . "px;
		}
	}

	.widget_shopping_cart .total *,
	.widget > .product_list_widget .amount {
		font-size:" . ((int) $cmsmasters_option['alister-bank' . '_link_font_font_size'] - 1) . "px;
	}
	
	.widget > .product_list_widget del .amount {
		font-size:" . ((int) $cmsmasters_option['alister-bank' . '_link_font_font_size'] - 3) . "px;
	}
	/* Finish Link Font */
	
	
	/* Start H1 Font */
	/* Finish H1 Font */
	
	
	/* Start H2 Font */
	.cmsmasters_single_product .product_title,
	.cmsmasters_single_product .price {
		font-family:" . alister_bank_get_google_font($cmsmasters_option['alister-bank' . '_h2_font_google_font']) . $cmsmasters_option['alister-bank' . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option['alister-bank' . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['alister-bank' . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['alister-bank' . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['alister-bank' . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['alister-bank' . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['alister-bank' . '_h2_font_text_decoration'] . ";
	}
	
	.cmsmasters_single_product .price del {
		font-size:" . ((int) $cmsmasters_option['alister-bank' . '_h2_font_font_size'] - 8) . "px;
	}
	
	.cmsmasters_single_product .price ins:before {
		font-size:" . ((int) $cmsmasters_option['alister-bank' . '_h2_font_font_size'] - 6) . "px;
	}
	/* Finish H2 Font */
	
	
	/* Start H3 Font */
	.cmsmasters_products .product.product-category .woocommerce-loop-category__title,
	.cmsmasters_tabs.cmsmasters_woo_tabs .cmsmasters_tabs_list_item > a {
		font-family:" . alister_bank_get_google_font($cmsmasters_option['alister-bank' . '_h3_font_google_font']) . $cmsmasters_option['alister-bank' . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option['alister-bank' . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['alister-bank' . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['alister-bank' . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['alister-bank' . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['alister-bank' . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['alister-bank' . '_h3_font_text_decoration'] . ";
	}

	/* Finish H3 Font */
	
	
	/* Start H4 Font */
	.cmsmasters_product .price,
	.cmsmasters_product .cmsmasters_product_button,
	.cmsmasters_product .cmsmasters_details_button,
	.shop_table thead th,
	.cross-sells h2,
	.cart_totals > h2,
	.cart_totals table .cart-subtotal th,
	.cart_totals table .order-total th,
	ul.order_details {
		font-family:" . alister_bank_get_google_font($cmsmasters_option['alister-bank' . '_h4_font_google_font']) . $cmsmasters_option['alister-bank' . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option['alister-bank' . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['alister-bank' . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['alister-bank' . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['alister-bank' . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['alister-bank' . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['alister-bank' . '_h4_font_text_decoration'] . ";
	}

	.cmsmasters_product .cmsmasters_product_button,
	.cmsmasters_product .cmsmasters_details_button {
		font-size:" . ((int) $cmsmasters_option['alister-bank' . '_h4_font_font_size'] - 2) . "px;
	}
	
	.cmsmasters_product .price del {
		font-size:" . ((int) $cmsmasters_option['alister-bank' . '_h4_font_font_size'] - 4) . "px;
	}
	/* Finish H4 Font */
	
	
	/* Start H5 Font */
	.cmsmasters_woo_wrap_result .woocommerce-result-count, 
	.shop_attributes th, 
	.shipping-calculator-button,
	.widget_layered_nav ul li, 
	.widget_layered_nav ul li a, 
	.widget_layered_nav_filters ul li, 
	.widget_layered_nav_filters ul li a, 
	.widget_product_categories ul li, 
	.widget_product_categories ul li a {
		font-family:" . alister_bank_get_google_font($cmsmasters_option['alister-bank' . '_h5_font_google_font']) . $cmsmasters_option['alister-bank' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['alister-bank' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['alister-bank' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['alister-bank' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['alister-bank' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['alister-bank' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['alister-bank' . '_h5_font_text_decoration'] . ";
	}
	
	.shipping-calculator-button {
		font-size:" . ((int) $cmsmasters_option['alister-bank' . '_h5_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['alister-bank' . '_h5_font_line_height'] + 2) . "px;
	}
	/* Finish H5 Font */
	
	
	/* Start H6 Font */
	.cmsmasters_product .cmsmasters_product_cat,
	.cmsmasters_product .cmsmasters_product_cat a,
	.cmsmasters_woo_comments .commentlist .comment .cmsmasters_comment_item_cont_info .cmsmasters_comment_item_date,
	.cmsmasters_woo_comments .commentlist .comment .cmsmasters_comment_item_cont_info .star-rating,
	.widget_shopping_cart .cart_list a,
	.widget > .product_list_widget a,
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list a {
		font-family:" . alister_bank_get_google_font($cmsmasters_option['alister-bank' . '_h6_font_google_font']) . $cmsmasters_option['alister-bank' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['alister-bank' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['alister-bank' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['alister-bank' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['alister-bank' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['alister-bank' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['alister-bank' . '_h6_font_text_decoration'] . ";
	}
	
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	.woocommerce-MyAccount-navigation > ul > li > a {
		font-family:" . alister_bank_get_google_font($cmsmasters_option['alister-bank' . '_button_font_google_font']) . $cmsmasters_option['alister-bank' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['alister-bank' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['alister-bank' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['alister-bank' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['alister-bank' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['alister-bank' . '_button_font_text_transform'] . ";
	}
	
	.widget_shopping_cart .buttons .button,
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .buttons .button {
		line-height:" . ((int) $cmsmasters_option['alister-bank' . '_button_font_line_height'] - 4) . "px;
	}
	/* Finish Button Font */
	
	
	/* Start Text Fields Font */
	.select2-dropdown {
		font-family:" . alister_bank_get_google_font($cmsmasters_option['alister-bank' . '_input_font_google_font']) . $cmsmasters_option['alister-bank' . '_input_font_system_font'] . ";
		font-size:" . $cmsmasters_option['alister-bank' . '_input_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['alister-bank' . '_input_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['alister-bank' . '_input_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['alister-bank' . '_input_font_font_style'] . ";
	}
	/* Finish Text Fields Font */
	
	
	/* Start Small Text Font */
	/* Finish Small Text Font */

/***************** Finish WooCommerce Font Styles ******************/

";
	
	
	return $custom_css;
}

add_filter('alister_bank_theme_fonts_filter', 'alister_bank_woocommerce_fonts');

