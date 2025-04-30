<?php
class WP_Adv_Whatsapp_i18n {
    public function load_plugin_textdomain() {
        load_plugin_textdomain(
            'wp-adv-whatsapp',
            false,
            dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );
    }
}
