=== ThemeFarmer WooCommerce Quick View ===
Contributors: ThemeFarmer
Tags: Free Quick View, Advance Quick View,products quick view, quick-view, single product, summary, woocommerce, woocommerce extension, WooCommerce Plugin, WooCommerce Quick View, Farmer, ThemeFarmer
Requires at least: 4.0
Tested up to: 4.6.1
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Awesome Woocommerce Advance Quick View Plugin by ThemeFarmer

== Description ==
ThemeFarmer WooCommerce Quick View is WooCommerce addon plugin which allows users to get quick look of products without opening the product page.
'''Awesome Plugin for theme developer.''' This plugin  allow to modify button text set Icon or any text for button.

== Installation ==
1. Upload the ThemeFarmer WooCommerce Quick View plugin  to the `/wp-content/plugins/` directory
2. Activate the plugin through the `\'Plugins\'` menu in WordPress
3. You can use filter to change button text. Place this code in theme's `functions.php` file
`function text_domain_change_button_text($text){
	return __('Button Text', 'text-domain');
}
add_filter('themefarmer_wcaqv_button_taxt', 'text_domain_change_button_text');`


== Screenshots ==
1. How quick view look on product page.


== Frequently Asked Questions ==
= Q.1 How to change quick view button text  =
Ans. You can use filter to change button text. Place this code in theme's `functions.php` file
`function text_domain_change_button_text($text){
	return __('Button Text', 'text-domain');
}
add_filter('themefarmer_wcaqv_button_taxt', 'text_domain_change_button_text');`


== Changelog ==
= 1.0 =
 * initial release

== Upgrade Notice ==
= 1.0 =
 * initial release