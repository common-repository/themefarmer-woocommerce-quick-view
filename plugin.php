<?php
/*
Plugin Name: ThemeFarmer WooCommerce Quick View
Description: Awesome Woocommerce Advance Quick View Plugin
Version:     1.0
Author:      ThemeFarmer
Author URI:  https://www.themefarmer.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: themefarmer-woocommerce-quick-view
Domain Path: /languages

ThemeFarmer Woocommerce Quick View is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

ThemeFarmer Woocommerce Quick View is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with ThemeFarmer Woocommerce Quick View. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

define('THEMEFARMER_WCAQV', plugin_dir_path(__FILE__));
require_once THEMEFARMER_WCAQV.'/admin/admin-init.php';

function ThemeFarmer_WCAQV_scripts() {
	wp_enqueue_style('themefarmer-wcaqv-style', plugin_dir_url(__FILE__) . 'assets/css/wcaqv-style.css');
	wp_enqueue_script('themefarmer-wcaqv-script', plugin_dir_url(__FILE__) . 'assets/js/wcaqv-script.js', array('jquery'), null, true);
	wp_localize_script( 'themefarmer-wcaqv-script', 'themefarmer_aqv', array (
					'ajaxurl'           => admin_url( 'admin-ajax.php', 'relative' ),
				)
			);
}
add_action('wp_enqueue_scripts', 'ThemeFarmer_WCAQV_scripts');

function ThemeFarmer_WCAQV_button() {
	include THEMEFARMER_WCAQV.'/templates/advance-quick-view-button.php';
}
add_action('woocommerce_after_shop_loop_item', 'ThemeFarmer_WCAQV_button', 20);

function ThemeFarmer_WCAQV_model(){
	require_once THEMEFARMER_WCAQV.'/templates/advance-quick-view-model.php';
}
add_action('wp_footer','ThemeFarmer_WCAQV_model');




add_action( 'themefarmer_wcaqv_product_thumbnail', 'woocommerce_show_product_sale_flash', 10 );
add_action( 'themefarmer_wcaqv_product_thumbnail', 'woocommerce_show_product_images', 20 );
add_action( 'themefarmer_wcaqv_product_details', 'woocommerce_template_single_title', 10 );
add_action( 'themefarmer_wcaqv_product_details', 'woocommerce_template_single_rating', 20 );
add_action( 'themefarmer_wcaqv_product_details', 'woocommerce_template_single_price', 30 );
add_action( 'themefarmer_wcaqv_product_details', 'woocommerce_template_single_excerpt', 40 );
add_action( 'themefarmer_wcaqv_product_actions', 'woocommerce_template_single_add_to_cart', 10 );
add_action( 'themefarmer_wcaqv_product_actions', 'woocommerce_template_single_meta', 20 );

function ThemeFarmer_WCAQW_single_product(){
	global $wpdb; // this is how you get access to the database

	$product_id = intval( $_POST['product_id'] );
    if ($product_id > 0) :
		wp( 'p=' . $product_id . '&post_type=product' );
		remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
    	ob_start();
		wc_get_template( 'advance-quick-view-product-content.php', array(), '', THEMEFARMER_WCAQV . '/templates/' );
		echo ob_get_clean();
		
    endif;

	wp_die(); // this is required to terminate immediately and return a proper response
}
add_action( 'wp_ajax_ThemeFarmer_WCAQW_show_product', 'ThemeFarmer_WCAQW_single_product' );


function ThemeFarmer_WCAQV__install() {

}
register_activation_hook(__FILE__, 'ThemeFarmer_WCAQV__install');

function ThemeFarmer_WCAQV__uninstall() {

}
register_deactivation_hook(__FILE__, 'ThemeFarmer_WCAQV__uninstall');