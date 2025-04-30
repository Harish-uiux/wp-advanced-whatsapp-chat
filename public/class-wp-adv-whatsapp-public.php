<?php
class WP_Adv_Whatsapp_Public {
    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles() {
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/public-style.css', array(), $this->version, 'all');
        
        // Font Awesome for icons
        wp_enqueue_style($this->plugin_name . '-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4', 'all');
    }

    public function enqueue_scripts() {
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/public-script.js', array('jquery'), $this->version, true);
        
        // Pass data to JavaScript
        wp_localize_script($this->plugin_name, 'wpAdvWhatsAppParams', array(
            'phoneNumber' => get_option($this->plugin_name . '_phone', ''),
            'preFilledMessage' => get_option($this->plugin_name . '_pre_filled_message', __('Hi there! How can I help you?', 'wp-adv-whatsapp')),
            'autoOpenChat' => get_option($this->plugin_name . '_auto_open_chat', 0),
            'hideAfterClose' => get_option($this->plugin_name . '_hide_after_close', 0),
            'showBubbleInitially' => get_option($this->plugin_name . '_show_bubble_initially', 1)
        ));
    }

    public function display_whatsapp_chat() {
         // Check display conditions
    $display_mobile = get_option($this->plugin_name . '_display_mobile', 1);
    $display_desktop = get_option($this->plugin_name . '_display_desktop', 1);
    
    // Exit if we shouldn't display on this device
    if ((!$display_mobile && wp_is_mobile()) || (!$display_desktop && !wp_is_mobile())) {
        return;
    }

    // Get general settings
    $phone_number = get_option($this->plugin_name . '_phone', '');
    $name = get_option($this->plugin_name . '_name', __('Jane Doe', 'wp-adv-whatsapp'));
    $welcome_message = get_option($this->plugin_name . '_welcome_message', 'Hi there 👋<br>How can I help you?');
    $profile_image = get_option($this->plugin_name . '_profile_image', WP_ADV_WHATSAPP_PLUGIN_URL . 'public/images/default-profile.png');
    $designation = get_option($this->plugin_name . '_designation', __('Online', 'wp-adv-whatsapp'));
    $input_placeholder = get_option($this->plugin_name . '_input_placeholder', __('Type a message', 'wp-adv-whatsapp'));
    
    // Important: Make sure we're getting the correct button position
    $button_position = get_option($this->plugin_name . '_button_position', 'bottom-right');
    
    // Add logging to debug
    error_log('Button position: ' . $button_position);
        
        // Get appearance settings
        $header_bg_color = get_option($this->plugin_name . '_header_bg_color', '#007f69');
        $header_text_color = get_option($this->plugin_name . '_header_text_color', '#FFFFFF');
        $body_bg_type = get_option($this->plugin_name . '_body_bg_type', 'image');
        $body_bg_color = get_option($this->plugin_name . '_body_bg_color', '#e5ddd5');
        $body_bg_image_type = get_option($this->plugin_name . '_body_bg_image', 'default');
        $custom_bg_image_url = get_option($this->plugin_name . '_custom_bg_image_url', 'https://static.elfsight.com/apps/all-in-one-chat/patterns/background-whatsapp.jpg');
        $bubble_bg_color = get_option($this->plugin_name . '_bubble_bg_color', '#FFFFFF');
        $bubble_text_color = get_option($this->plugin_name . '_bubble_text_color', '#303030');
        $footer_bg_color = get_option($this->plugin_name . '_footer_bg_color', '#f0f0f0');
        $button_color = get_option($this->plugin_name . '_button_color', '#25D366');
        $text_color = get_option($this->plugin_name . '_text_color', '#FFFFFF');
        
        // Determine background image URL based on settings
        $bg_image_url = 'https://static.elfsight.com/apps/all-in-one-chat/patterns/background-whatsapp.jpg';
        if ($body_bg_image_type === 'custom' && !empty($custom_bg_image_url)) {
            $bg_image_url = $custom_bg_image_url;
        }
        
        // Use custom inline styles for dynamic colors
        $custom_styles = "
            <style>
                /* Header Styles */
                .wp-adv-whatsapp-chat-header {
                    background-color: {$header_bg_color};
                    color: {$header_text_color};
                }
                .wp-adv-whatsapp-online-indicator {
                    border-color: {$header_bg_color};
                }
                
                /* Body Styles */
                .wp-adv-whatsapp-chat-body {";
        
        if ($body_bg_type === 'color') {
            $custom_styles .= "
                    background: {$body_bg_color};
                    background-image: none;";
        } else {
            $custom_styles .= "
                    background: #e5ddd5;
                    background-image: url('{$bg_image_url}');";
        }
        
        $custom_styles .= "
                }
                
                /* Chat Bubble Styles */
                .wp-adv-whatsapp-chat-message {
                    background-color: {$bubble_bg_color};
                }
                .wp-adv-whatsapp-chat-message p {
                    color: {$bubble_text_color};
                }
                
                /* Footer Styles */
                .wp-adv-whatsapp-chat-footer {
                    background-color: {$footer_bg_color};
                }
                
                /* Button Styles */
                .wp-adv-whatsapp-button {
                    background-color: {$button_color};
                }
                .wp-adv-whatsapp-button:hover {
                    background-color: " . $this->adjustBrightness($button_color, -10) . ";
                }
                .wp-adv-whatsapp-send-btn {
                    background-color: {$button_color};
                }
                .wp-adv-whatsapp-send-btn:hover {
                    background-color: " . $this->adjustBrightness($button_color, -10) . ";
                }
                .wp-adv-whatsapp-notification-indicator {
                    border-color: {$button_color};
                }
                .wp-adv-whatsapp-icon {
                    fill: {$text_color};
                }
            </style>
        ";
        echo $custom_styles;
    
        // Include the template
        include_once 'partials/chat-window.php';
    }
    
    
    
    /**
     * Helper function to darken or lighten colors
     */
    private function adjustBrightness($hex, $steps) {
        // Steps should be between -255 and 255. Negative = darker, positive = lighter
        $steps = max(-255, min(255, $steps));
    
        // Format the hex color string
        $hex = str_replace('#', '', $hex);
        if (strlen($hex) == 3) {
            $hex = str_repeat(substr($hex, 0, 1), 2) . str_repeat(substr($hex, 1, 1), 2) . str_repeat(substr($hex, 2, 1), 2);
        }
    
        // Get decimal values
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    
        // Adjust
        $r = max(0, min(255, $r + $steps));
        $g = max(0, min(255, $g + $steps));
        $b = max(0, min(255, $b + $steps));
    
        // Convert to hex
        $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
        $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
        $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);
    
        return '#' . $r_hex . $g_hex . $b_hex;
    }
    
}
