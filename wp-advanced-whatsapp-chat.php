<?php
/**
 * Plugin Name: WP Advanced WhatsApp Chat
 * Plugin URI: https://www.pixelsmedialab.com/contact
 * Description: A professional, modular WhatsApp Chat Plugin for WordPress with advanced features, admin panel control, and elegant frontend with animation effects.
 * Version: 1.0.0
 * Author: Hariharan Gandhimani
 * Author URI:  https://www.pixelsmedialab.com/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: wp-adv-whatsapp
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Plugin version
define('WP_ADV_WHATSAPP_VERSION', '1.0.0');
define('WP_ADV_WHATSAPP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WP_ADV_WHATSAPP_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * The code that runs during plugin activation.
 */
function activate_wp_adv_whatsapp() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-wp-adv-whatsapp-activator.php';
    WP_Adv_Whatsapp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_wp_adv_whatsapp() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-wp-adv-whatsapp-deactivator.php';
    WP_Adv_Whatsapp_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_wp_adv_whatsapp');
register_deactivation_hook(__FILE__, 'deactivate_wp_adv_whatsapp');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-wp-adv-whatsapp.php';

/**
 * Begins execution of the plugin.
 */
function run_wp_adv_whatsapp() {
    $plugin = new WP_Adv_Whatsapp();
    $plugin->run();
}
run_wp_adv_whatsapp();
