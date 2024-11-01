<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <?php if(isset($_REQUEST['settings-updated']) && $_REQUEST['settings-updated']== true): ?>
    <div class="notice notice-success is-dismissible">
        <p><?php _e( 'settings saved successfully', 'themefarmer-woocommerce-quick-view' ); ?></p>
    </div>
    <?php endif; ?>
    <div class="themefarmer-wcaqv-left">
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "wporg_options"
            settings_fields('themefarmer-wcaqv-options');
            // output setting sections and their fields
            // (sections are registered for "wporg", each field is registered to a specific section)
            do_settings_sections('themefarmer-wcaqv-options');
            $options = get_option('ThemeFarmer_WCAQV_Options');
            $button_text = (isset($options['button_text']) && !empty($options['button_text']))?$options['button_text']:__('Quick View', 'themefarmer-woocommerce-quick-view');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php _e('Button Text', 'themefarmer-woocommerce-quick-view'); ?></th>
                    <td><input type="text" name="ThemeFarmer_WCAQV_Options[button_text]" value="<?php echo esc_attr( $button_text ); ?>" /></td>
                </tr>
            </table>
            <div class="submit-button-container">
                <?php 
                    // output save settings button
                    submit_button('Save Settings');
                ?>
            </div>
        </form>
    </div>
</div>