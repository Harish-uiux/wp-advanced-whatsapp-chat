<?php
class WP_Adv_Whatsapp {
    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct() {
        if (defined('WP_ADV_WHATSAPP_VERSION')) {
            $this->version = WP_ADV_WHATSAPP_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'wp-adv-whatsapp';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-wp-adv-whatsapp-loader.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-wp-adv-whatsapp-i18n.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-wp-adv-whatsapp-admin.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-wp-adv-whatsapp-public.php';

        $this->loader = new WP_Adv_Whatsapp_Loader();
    }

    private function set_locale() {
        $plugin_i18n = new WP_Adv_Whatsapp_i18n();
        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
    }

    private function define_admin_hooks() {
        $plugin_admin = new WP_Adv_Whatsapp_Admin($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
        $this->loader->add_action('admin_menu', $plugin_admin, 'add_plugin_admin_menu');
        $this->loader->add_action('admin_init', $plugin_admin, 'register_settings');
    }

    private function define_public_hooks() {
        $plugin_public = new WP_Adv_Whatsapp_Public($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
        $this->loader->add_action('wp_footer', $plugin_public, 'display_whatsapp_chat');
    }

    public function run() {
        $this->loader->run();
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_loader() {
        return $this->loader;
    }

    public function get_version() {
        return $this->version;
    }
}
