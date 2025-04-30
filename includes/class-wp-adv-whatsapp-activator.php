<?php
class WP_Adv_Whatsapp_Activator {
    public static function activate() {
        // Basic settings
        if (!get_option('wp-adv-whatsapp_phone')) {
            update_option('wp-adv-whatsapp_phone', '');
        }
        
        if (!get_option('wp-adv-whatsapp_name')) {
            update_option('wp-adv-whatsapp_name', __('Jane Doe', 'wp-adv-whatsapp'));
        }
        
        if (!get_option('wp-adv-whatsapp_welcome_message')) {
            update_option('wp-adv-whatsapp_welcome_message', 'Hi there 👋<br>How can I help you?');
        }
        
        if (!get_option('wp-adv-whatsapp_pre_filled_message')) {
            update_option('wp-adv-whatsapp_pre_filled_message', __('Hi there! How can I help you?', 'wp-adv-whatsapp'));
        }
        
        // Button settings
        if (!get_option('wp-adv-whatsapp_button_position')) {
            update_option('wp-adv-whatsapp_button_position', 'bottom-right');
        }
        
        if (!get_option('wp-adv-whatsapp_button_layout')) {
            update_option('wp-adv-whatsapp_button_layout', 'icon-only');
        }
        
        if (!get_option('wp-adv-whatsapp_rounded_corners')) {
            update_option('wp-adv-whatsapp_rounded_corners', 1);
        }
        
        if (!get_option('wp-adv-whatsapp_bubble_text')) {
            update_option('wp-adv-whatsapp_bubble_text', __('Need help? Chat with us', 'wp-adv-whatsapp'));
        }
        
        // Display settings
        if (!get_option('wp-adv-whatsapp_display_mobile')) {
            update_option('wp-adv-whatsapp_display_mobile', 1);
        }
        
        if (!get_option('wp-adv-whatsapp_display_desktop')) {
            update_option('wp-adv-whatsapp_display_desktop', 1);
        }
        
        // Appearance - Header
        if (!get_option('wp-adv-whatsapp_header_bg_color')) {
            update_option('wp-adv-whatsapp_header_bg_color', '#007f69');
        }
        
        if (!get_option('wp-adv-whatsapp_header_text_color')) {
            update_option('wp-adv-whatsapp_header_text_color', '#FFFFFF');
        }
        
        // Appearance - Body
        if (!get_option('wp-adv-whatsapp_body_bg_type')) {
            update_option('wp-adv-whatsapp_body_bg_type', 'image');
        }
        
        if (!get_option('wp-adv-whatsapp_body_bg_color')) {
            update_option('wp-adv-whatsapp_body_bg_color', '#e5ddd5');
        }
        
        if (!get_option('wp-adv-whatsapp_body_bg_image')) {
            update_option('wp-adv-whatsapp_body_bg_image', 'default');
        }
        
        if (!get_option('wp-adv-whatsapp_custom_bg_image_url')) {
            update_option('wp-adv-whatsapp_custom_bg_image_url', 'https://static.elfsight.com/apps/all-in-one-chat/patterns/background-whatsapp.jpg');
        }
        
        // Appearance - Chat Bubbles
        if (!get_option('wp-adv-whatsapp_bubble_bg_color')) {
            update_option('wp-adv-whatsapp_bubble_bg_color', '#FFFFFF');
        }
        
        if (!get_option('wp-adv-whatsapp_bubble_text_color')) {
            update_option('wp-adv-whatsapp_bubble_text_color', '#303030');
        }
        
        // Appearance - Footer
        if (!get_option('wp-adv-whatsapp_footer_bg_color')) {
            update_option('wp-adv-whatsapp_footer_bg_color', '#f0f0f0');
        }
        
        if (!get_option('wp-adv-whatsapp_input_placeholder')) {
            update_option('wp-adv-whatsapp_input_placeholder', __('Type a message', 'wp-adv-whatsapp'));
        }
        
        // Appearance - Button
        if (!get_option('wp-adv-whatsapp_button_color')) {
            update_option('wp-adv-whatsapp_button_color', '#25D366');
        }
        
        if (!get_option('wp-adv-whatsapp_text_color')) {
            update_option('wp-adv-whatsapp_text_color', '#FFFFFF');
        }
        
        // Behavior
        if (!get_option('wp-adv-whatsapp_auto_open_chat')) {
            update_option('wp-adv-whatsapp_auto_open_chat', 0);
        }
        
        if (!get_option('wp-adv-whatsapp_hide_after_close')) {
            update_option('wp-adv-whatsapp_hide_after_close', 0);
        }
        
        if (!get_option('wp-adv-whatsapp_show_bubble_initially')) {
            update_option('wp-adv-whatsapp_show_bubble_initially', 1);
        }
        
        // Profile
        if (!get_option('wp-adv-whatsapp_designation')) {
            update_option('wp-adv-whatsapp_designation', __('Online', 'wp-adv-whatsapp'));
        }
    }
    
}
