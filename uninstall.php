<?php
// If uninstall not called from WordPress, then exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Delete all options created by the plugin
$options = array(
    // General Settings
    'wp-adv-whatsapp_phone',
    'wp-adv-whatsapp_name',
    'wp-adv-whatsapp_welcome_message',
    'wp-adv-whatsapp_pre_filled_message',
    'wp-adv-whatsapp_position',
    
    // Button Settings
    'wp-adv-whatsapp_button_position',
    'wp-adv-whatsapp_button_layout',
    'wp-adv-whatsapp_rounded_corners',
    'wp-adv-whatsapp_bubble_text',
    
    // Display Settings
    'wp-adv-whatsapp_display_mobile',
    'wp-adv-whatsapp_display_desktop',
    
    // Appearance - Header
    'wp-adv-whatsapp_header_bg_color',
    'wp-adv-whatsapp_header_text_color',
    
    // Appearance - Body
    'wp-adv-whatsapp_body_bg_type',
    'wp-adv-whatsapp_body_bg_color',
    'wp-adv-whatsapp_body_bg_image',
    'wp-adv-whatsapp_custom_bg_image_url',
    
    // Appearance - Chat Bubbles
    'wp-adv-whatsapp_bubble_bg_color',
    'wp-adv-whatsapp_bubble_text_color',
    
    // Appearance - Footer
    'wp-adv-whatsapp_footer_bg_color',
    'wp-adv-whatsapp_input_placeholder',
    
    // Appearance - Button
    'wp-adv-whatsapp_button_color',
    'wp-adv-whatsapp_text_color',
    
    // Behavior
    'wp-adv-whatsapp_auto_open_chat',
    'wp-adv-whatsapp_hide_after_close',
    'wp-adv-whatsapp_show_bubble_initially',
    
    // Profile
    'wp-adv-whatsapp_profile_image',
    'wp-adv-whatsapp_designation'
);

foreach ($options as $option) {
    delete_option($option);
}
