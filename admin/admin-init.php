<?php 
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function ThemeFarmer_WCAQV_admin_scripts() {
	wp_enqueue_style('themefarmer-wcaqv-admin-style', plugin_dir_url(__FILE__) . 'assets/css/wcaqv-admin-style.css');
}
add_action('admin_enqueue_scripts', 'ThemeFarmer_WCAQV_admin_scripts');


function ThemeFarmer_WCAQV_options_menu(){
    add_menu_page(
    	__('ThemeFarmer WooCommerce Quick View','themefarmer-woocommerce-quick-view'), 
    	__('Quick View','themefarmer-woocommerce-quick-view'), 
    	'manage_options', 
    	'themefarmer-woocommerce-quick-view', 
    	'ThemeFarmer_WCAQV_options_page', 
    	'dashicons-search', 
    	60
    );
}

function ThemeFarmer_WCAQV_options_page(){
    // check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
    require_once plugin_dir_path(__FILE__) . '/option-page.php';
}

if ( is_admin() ){ // admin actions
 
	add_action('admin_menu', 'ThemeFarmer_WCAQV_options_menu');
	add_action( 'admin_init', 'ThemeFarmer_WCAQV_register_settings' );
}

function ThemeFarmer_WCAQV_register_settings(){
	register_setting( 'themefarmer-wcaqv-options', 'ThemeFarmer_WCAQV_Options' );	
}


?>