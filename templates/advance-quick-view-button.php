<?php 
	global $product, $post;
	$options = get_option('ThemeFarmer_WCAQV_Options');
	$button_text = (isset($options['button_text']) && !empty($options['button_text']))?$options['button_text']:__('Quick View', 'themefarmer-woocommerce-quick-view');
	?>
	<a href="#" class="button themefarmer-wcaqv-button" data-product_id="<?php the_ID(); ?>">
	<?php echo apply_filters('themefarmer_wcaqv_button_taxt', wp_kses_post($button_text)); ?>
	</a>
<?php
	