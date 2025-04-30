<?php
class WP_Adv_Whatsapp_Admin {
    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles() {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/admin-style.css', array(), $this->version, 'all');
    }

    public function enqueue_scripts() {
        // Enqueue WordPress color picker
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        
        // Enqueue WordPress media uploader
        wp_enqueue_media();
        
        // Enqueue admin scripts
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/admin-script.js', array('jquery', 'wp-color-picker'), $this->version, false);
        
        // Pass variables to JavaScript
        wp_localize_script($this->plugin_name, 'wp_adv_whatsapp_admin', array(
            'default_image' => WP_ADV_WHATSAPP_PLUGIN_URL . 'public/images/default-profile.png',
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('wp-adv-whatsapp-admin-nonce')
        ));
    }
    

    public function add_plugin_admin_menu() {
        add_menu_page(
            __('WP Advanced WhatsApp', 'wp-adv-whatsapp'),
            __('WP WhatsApp', 'wp-adv-whatsapp'),
            'manage_options',
            $this->plugin_name,
            array($this, 'display_plugin_admin_page'),
            'dashicons-whatsapp', // Use an appropriate icon
            81
        );
    }

    public function display_plugin_admin_page() {
        include_once 'partials/admin-display.php';
    }

    public function register_settings() {
        // General Settings
        register_setting($this->plugin_name, $this->plugin_name . '_phone', 'sanitize_text_field');
        register_setting($this->plugin_name, $this->plugin_name . '_name', 'sanitize_text_field');
        register_setting($this->plugin_name, $this->plugin_name . '_position', 'sanitize_text_field');
        register_setting($this->plugin_name, $this->plugin_name . '_welcome_message', 'wp_kses_post');
        register_setting($this->plugin_name, $this->plugin_name . '_pre_filled_message', 'sanitize_textarea_field');
        
        // Button Settings
        register_setting($this->plugin_name, $this->plugin_name . '_button_position', 'sanitize_text_field');
        register_setting($this->plugin_name, $this->plugin_name . '_button_layout', 'sanitize_text_field');
        register_setting($this->plugin_name, $this->plugin_name . '_rounded_corners', 'intval');
        register_setting($this->plugin_name, $this->plugin_name . '_bubble_text', 'sanitize_text_field');
        
        // Display Conditions
        register_setting($this->plugin_name, $this->plugin_name . '_display_mobile', 'intval');
        register_setting($this->plugin_name, $this->plugin_name . '_display_desktop', 'intval');
        
        // Appearance - Header
        register_setting($this->plugin_name, $this->plugin_name . '_header_bg_color', 'sanitize_text_field');
        register_setting($this->plugin_name, $this->plugin_name . '_header_text_color', 'sanitize_text_field');
        
        // Appearance - Body
        register_setting($this->plugin_name, $this->plugin_name . '_body_bg_type', 'sanitize_text_field');
        register_setting($this->plugin_name, $this->plugin_name . '_body_bg_color', 'sanitize_text_field');
        register_setting($this->plugin_name, $this->plugin_name . '_body_bg_image', 'sanitize_text_field');
        register_setting($this->plugin_name, $this->plugin_name . '_custom_bg_image_url', 'esc_url_raw');
        
        // Appearance - Chat Bubbles
        register_setting($this->plugin_name, $this->plugin_name . '_bubble_bg_color', 'sanitize_text_field');
        register_setting($this->plugin_name, $this->plugin_name . '_bubble_text_color', 'sanitize_text_field');
        
        // Appearance - Footer
        register_setting($this->plugin_name, $this->plugin_name . '_footer_bg_color', 'sanitize_text_field');
        register_setting($this->plugin_name, $this->plugin_name . '_input_placeholder', 'sanitize_text_field');
        
        // Appearance - Button
        register_setting($this->plugin_name, $this->plugin_name . '_button_color', 'sanitize_text_field');
        register_setting($this->plugin_name, $this->plugin_name . '_text_color', 'sanitize_text_field');
        
        // Bubble Behavior
        register_setting($this->plugin_name, $this->plugin_name . '_auto_open_chat', 'intval');
        register_setting($this->plugin_name, $this->plugin_name . '_hide_after_close', 'intval');
        register_setting($this->plugin_name, $this->plugin_name . '_show_bubble_initially', 'intval');
        
        // Profile Settings
        register_setting($this->plugin_name, $this->plugin_name . '_profile_image', 'esc_url_raw');
        register_setting($this->plugin_name, $this->plugin_name . '_designation', 'sanitize_text_field');
    }
    /**
 * Register AJAX handlers
 */
public function register_ajax_handlers() {
    add_action('wp_ajax_wp_adv_whatsapp_remove_image', array($this, 'ajax_remove_image'));
}

/**
 * AJAX handler for removing images
 */
public function ajax_remove_image() {
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'wp-adv-whatsapp-admin-nonce')) {
        wp_send_json_error('Security check failed');
        exit;
    }
    
    // Check for image type
    if (!isset($_POST['image_type'])) {
        wp_send_json_error('Image type not specified');
        exit;
    }
    
    $image_type = sanitize_text_field($_POST['image_type']);
    
    // Handle different image types
    switch ($image_type) {
        case 'profile':
            update_option($this->plugin_name . '_profile_image', '');
            break;
        case 'custom_bg':
            update_option($this->plugin_name . '_custom_bg_image_url', '');
            break;
        default:
            wp_send_json_error('Invalid image type');
            exit;
    }
    
    wp_send_json_success(array(
        'message' => 'Image removed successfully',
        'default_image' => WP_ADV_WHATSAPP_PLUGIN_URL . 'public/images/background.jpg'
    ));
}

}
