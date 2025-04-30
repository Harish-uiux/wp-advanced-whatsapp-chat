<?php
// Admin settings page
?>
<div class="wrap wp-adv-whatsapp-admin">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    
    <form method="post" action="options.php">
        <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
        ?>
        
        <div class="nav-tab-wrapper">
            <a href="#general-settings" class="nav-tab nav-tab-active"><?php _e('General Settings', 'wp-adv-whatsapp'); ?></a>
            <a href="#button-settings" class="nav-tab"><?php _e('Button Settings', 'wp-adv-whatsapp'); ?></a>
            <a href="#display-settings" class="nav-tab"><?php _e('Display Settings', 'wp-adv-whatsapp'); ?></a>
            <a href="#appearance-settings" class="nav-tab"><?php _e('Appearance', 'wp-adv-whatsapp'); ?></a>
            <a href="#behavior-settings" class="nav-tab"><?php _e('Trigger Settings', 'wp-adv-whatsapp'); ?></a>
            <a href="#profile-settings" class="nav-tab"><?php _e('Profile Settings', 'wp-adv-whatsapp'); ?></a>
        </div>

        <div id="general-settings" class="tab-content active">
            <h2><?php _e('General Settings', 'wp-adv-whatsapp'); ?></h2>
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="<?php echo $this->plugin_name; ?>_phone"><?php _e('WhatsApp Number', 'wp-adv-whatsapp'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="<?php echo $this->plugin_name; ?>_phone" name="<?php echo $this->plugin_name; ?>_phone" value="<?php echo esc_attr(get_option($this->plugin_name . '_phone')); ?>" class="regular-text" placeholder="e.g., 15551234567" />
                        <p class="description"><?php _e('Enter your WhatsApp number with country code (no plus sign, spaces or dashes).', 'wp-adv-whatsapp'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="<?php echo $this->plugin_name; ?>_name"><?php _e('Display Name', 'wp-adv-whatsapp'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="<?php echo $this->plugin_name; ?>_name" name="<?php echo $this->plugin_name; ?>_name" value="<?php echo esc_attr(get_option($this->plugin_name . '_name')); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="<?php echo $this->plugin_name; ?>_welcome_message"><?php _e('Welcome Message', 'wp-adv-whatsapp'); ?></label>
                    </th>
                    <td>
                        <?php
                        $content = get_option($this->plugin_name . '_welcome_message', __('Hello! How can we help you today?', 'wp-adv-whatsapp'));
                        $settings = array(
                            'media_buttons' => false,
                            'textarea_name' => $this->plugin_name . '_welcome_message',
                            'textarea_rows' => 5,
                        );
                        wp_editor($content, $this->plugin_name . '_welcome_message', $settings);
                        ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="<?php echo $this->plugin_name; ?>_pre_filled_message"><?php _e('Pre-filled Message', 'wp-adv-whatsapp'); ?></label>
                    </th>
                    <td>
                        <textarea id="<?php echo $this->plugin_name; ?>_pre_filled_message" name="<?php echo $this->plugin_name; ?>_pre_filled_message" class="large-text" rows="3"><?php echo esc_textarea(get_option($this->plugin_name . '_pre_filled_message', __('Hi there! How can I help you?', 'wp-adv-whatsapp'))); ?></textarea>
                        <p class="description"><?php _e('This message will be pre-filled when the user starts the WhatsApp chat.', 'wp-adv-whatsapp'); ?></p>
                    </td>
                </tr>
            </table>
        </div>

        <div id="button-settings" class="tab-content">
    <h2><?php _e('Button Settings', 'wp-adv-whatsapp'); ?></h2>
    <table class="form-table">
        <tr>
            <th scope="row"><?php _e('Button Position', 'wp-adv-whatsapp'); ?></th>
            <td>
            <select name="<?php echo $this->plugin_name; ?>_button_position">
    <option value="bottom-right" <?php selected(get_option($this->plugin_name . '_button_position', 'bottom-right'), 'bottom-right'); ?>><?php _e('Bottom Right', 'wp-adv-whatsapp'); ?></option>
    <option value="bottom-left" <?php selected(get_option($this->plugin_name . '_button_position', 'bottom-left'), 'bottom-left'); ?>><?php _e('Bottom Left', 'wp-adv-whatsapp'); ?></option>
</select>

            </td>
        </tr>
                <tr>
                    <th scope="row"><?php _e('Button Layout', 'wp-adv-whatsapp'); ?></th>
                    <td>
                        <select name="<?php echo $this->plugin_name; ?>_button_layout">
                            <option value="icon-only" <?php selected(get_option($this->plugin_name . '_button_layout', 'icon-only'), 'icon-only'); ?>><?php _e('Icon Only', 'wp-adv-whatsapp'); ?></option>
                            <option value="icon-text" <?php selected(get_option($this->plugin_name . '_button_layout', 'icon-only'), 'icon-text'); ?>><?php _e('Icon with Text', 'wp-adv-whatsapp'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e('Rounded Corners', 'wp-adv-whatsapp'); ?></th>
                    <td>
                        <input type="checkbox" id="<?php echo $this->plugin_name; ?>_rounded_corners" name="<?php echo $this->plugin_name; ?>_rounded_corners" value="1" <?php checked(get_option($this->plugin_name . '_rounded_corners', 1), 1); ?> />
                        <label for="<?php echo $this->plugin_name; ?>_rounded_corners"><?php _e('Enable rounded corners for the button', 'wp-adv-whatsapp'); ?></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="<?php echo $this->plugin_name; ?>_bubble_text"><?php _e('Bubble Text', 'wp-adv-whatsapp'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="<?php echo $this->plugin_name; ?>_bubble_text" name="<?php echo $this->plugin_name; ?>_bubble_text" value="<?php echo esc_attr(get_option($this->plugin_name . '_bubble_text', __('Need help? Chat with us', 'wp-adv-whatsapp'))); ?>" class="regular-text" />
                        <p class="description"><?php _e('The text that appears in the speech bubble above the WhatsApp button.', 'wp-adv-whatsapp'); ?></p>
                    </td>
                </tr>
            </table>
        </div>

        <div id="display-settings" class="tab-content">
            <h2><?php _e('Display Conditions', 'wp-adv-whatsapp'); ?></h2>
            <table class="form-table">
                <tr>
                    <th scope="row"><?php _e('Display on Mobile', 'wp-adv-whatsapp'); ?></th>
                    <td>
                        <input type="checkbox" id="<?php echo $this->plugin_name; ?>_display_mobile" name="<?php echo $this->plugin_name; ?>_display_mobile" value="1" <?php checked(get_option($this->plugin_name . '_display_mobile', 1), 1); ?> />
                        <label for="<?php echo $this->plugin_name; ?>_display_mobile"><?php _e('Display WhatsApp button on mobile devices', 'wp-adv-whatsapp'); ?></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e('Display on Desktop', 'wp-adv-whatsapp'); ?></th>
                    <td>
                        <input type="checkbox" id="<?php echo $this->plugin_name; ?>_display_desktop" name="<?php echo $this->plugin_name; ?>_display_desktop" value="1" <?php checked(get_option($this->plugin_name . '_display_desktop', 1), 1); ?> />
                        <label for="<?php echo $this->plugin_name; ?>_display_desktop"><?php _e('Display WhatsApp button on desktop devices', 'wp-adv-whatsapp'); ?></label>
                    </td>
                </tr>
            </table>
        </div>

        <div id="appearance-settings" class="tab-content">
    <h2><?php _e('Appearance', 'wp-adv-whatsapp'); ?></h2>
    
    <h3><?php _e('Header Settings', 'wp-adv-whatsapp'); ?></h3>
    <table class="form-table">
        <tr>
            <th scope="row">
                <label for="<?php echo $this->plugin_name; ?>_header_bg_color"><?php _e('Header Background Color', 'wp-adv-whatsapp'); ?></label>
            </th>
            <td>
                <input type="text" id="<?php echo $this->plugin_name; ?>_header_bg_color" name="<?php echo $this->plugin_name; ?>_header_bg_color" value="<?php echo esc_attr(get_option($this->plugin_name . '_header_bg_color', '#007f69')); ?>" class="color-picker" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="<?php echo $this->plugin_name; ?>_header_text_color"><?php _e('Header Text Color', 'wp-adv-whatsapp'); ?></label>
            </th>
            <td>
                <input type="text" id="<?php echo $this->plugin_name; ?>_header_text_color" name="<?php echo $this->plugin_name; ?>_header_text_color" value="<?php echo esc_attr(get_option($this->plugin_name . '_header_text_color', '#FFFFFF')); ?>" class="color-picker" />
            </td>
        </tr>
    </table>
    
    <h3><?php _e('Chat Body Settings', 'wp-adv-whatsapp'); ?></h3>
    <table class="form-table">
        <tr>
            <th scope="row">
                <?php _e('Background Type', 'wp-adv-whatsapp'); ?>
            </th>
            <td>
                <select name="<?php echo $this->plugin_name; ?>_body_bg_type" id="<?php echo $this->plugin_name; ?>_body_bg_type">
                    <option value="color" <?php selected(get_option($this->plugin_name . '_body_bg_type', 'image'), 'color'); ?>><?php _e('Solid Color', 'wp-adv-whatsapp'); ?></option>
                    <option value="image" <?php selected(get_option($this->plugin_name . '_body_bg_type', 'image'), 'image'); ?>><?php _e('Background Image', 'wp-adv-whatsapp'); ?></option>
                </select>
            </td>
        </tr>
        <tr class="bg-type-option bg-type-color">
            <th scope="row">
                <label for="<?php echo $this->plugin_name; ?>_body_bg_color"><?php _e('Body Background Color', 'wp-adv-whatsapp'); ?></label>
            </th>
            <td>
                <input type="text" id="<?php echo $this->plugin_name; ?>_body_bg_color" name="<?php echo $this->plugin_name; ?>_body_bg_color" value="<?php echo esc_attr(get_option($this->plugin_name . '_body_bg_color', '#e5ddd5')); ?>" class="color-picker" />
            </td>
        </tr>
        <tr class="bg-type-option bg-type-image">
            <th scope="row">
                <label for="<?php echo $this->plugin_name; ?>_body_bg_image"><?php _e('Body Background Image', 'wp-adv-whatsapp'); ?></label>
            </th>
            <td>
                <select name="<?php echo $this->plugin_name; ?>_body_bg_image" id="<?php echo $this->plugin_name; ?>_body_bg_image">
                    <option value="default" <?php selected(get_option($this->plugin_name . '_body_bg_image', 'default'), 'default'); ?>><?php _e('Default WhatsApp Pattern', 'wp-adv-whatsapp'); ?></option>
                    <option value="custom" <?php selected(get_option($this->plugin_name . '_body_bg_image', 'default'), 'custom'); ?>><?php _e('Custom Image URL', 'wp-adv-whatsapp'); ?></option>
                </select>
                <div id="custom-bg-image-container" style="margin-top: 10px; <?php echo (get_option($this->plugin_name . '_body_bg_image', 'default') === 'custom') ? '' : 'display: none;'; ?>">
                    <input type="text" id="<?php echo $this->plugin_name; ?>_custom_bg_image_url" name="<?php echo $this->plugin_name; ?>_custom_bg_image_url" value="<?php echo esc_attr(get_option($this->plugin_name . '_custom_bg_image_url', 'https://static.elfsight.com/apps/all-in-one-chat/patterns/background-whatsapp.jpg')); ?>" class="regular-text" />
                    <input type="button" id="upload_custom_bg_image_button" class="button" value="<?php _e('Upload Image', 'wp-adv-whatsapp'); ?>" />
                </div>
            </td>
        </tr>
    </table>
    
    <h3><?php _e('Chat Bubble Settings', 'wp-adv-whatsapp'); ?></h3>
    <table class="form-table">
        <tr>
            <th scope="row">
                <label for="<?php echo $this->plugin_name; ?>_bubble_bg_color"><?php _e('Chat Bubble Background', 'wp-adv-whatsapp'); ?></label>
            </th>
            <td>
                <input type="text" id="<?php echo $this->plugin_name; ?>_bubble_bg_color" name="<?php echo $this->plugin_name; ?>_bubble_bg_color" value="<?php echo esc_attr(get_option($this->plugin_name . '_bubble_bg_color', '#FFFFFF')); ?>" class="color-picker" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="<?php echo $this->plugin_name; ?>_bubble_text_color"><?php _e('Chat Bubble Text Color', 'wp-adv-whatsapp'); ?></label>
            </th>
            <td>
                <input type="text" id="<?php echo $this->plugin_name; ?>_bubble_text_color" name="<?php echo $this->plugin_name; ?>_bubble_text_color" value="<?php echo esc_attr(get_option($this->plugin_name . '_bubble_text_color', '#303030')); ?>" class="color-picker" />
            </td>
        </tr>
    </table>
    
    <h3><?php _e('Chat Footer Settings', 'wp-adv-whatsapp'); ?></h3>
    <table class="form-table">
        <tr>
            <th scope="row">
                <label for="<?php echo $this->plugin_name; ?>_footer_bg_color"><?php _e('Footer Background Color', 'wp-adv-whatsapp'); ?></label>
            </th>
            <td>
                <input type="text" id="<?php echo $this->plugin_name; ?>_footer_bg_color" name="<?php echo $this->plugin_name; ?>_footer_bg_color" value="<?php echo esc_attr(get_option($this->plugin_name . '_footer_bg_color', '#f0f0f0')); ?>" class="color-picker" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="<?php echo $this->plugin_name; ?>_input_placeholder"><?php _e('Input Placeholder Text', 'wp-adv-whatsapp'); ?></label>
            </th>
            <td>
                <input type="text" id="<?php echo $this->plugin_name; ?>_input_placeholder" name="<?php echo $this->plugin_name; ?>_input_placeholder" value="<?php echo esc_attr(get_option($this->plugin_name . '_input_placeholder', 'Type a message')); ?>" class="regular-text" />
            </td>
        </tr>
    </table>
    
    <h3><?php _e('WhatsApp Button Settings', 'wp-adv-whatsapp'); ?></h3>
    <table class="form-table">
        <tr>
            <th scope="row">
                <label for="<?php echo $this->plugin_name; ?>_button_color"><?php _e('Button Background Color', 'wp-adv-whatsapp'); ?></label>
            </th>
            <td>
                <input type="text" id="<?php echo $this->plugin_name; ?>_button_color" name="<?php echo $this->plugin_name; ?>_button_color" value="<?php echo esc_attr(get_option($this->plugin_name . '_button_color', '#25D366')); ?>" class="color-picker" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="<?php echo $this->plugin_name; ?>_text_color"><?php _e('Button Icon Color', 'wp-adv-whatsapp'); ?></label>
            </th>
            <td>
                <input type="text" id="<?php echo $this->plugin_name; ?>_text_color" name="<?php echo $this->plugin_name; ?>_text_color" value="<?php echo esc_attr(get_option($this->plugin_name . '_text_color', '#FFFFFF')); ?>" class="color-picker" />
            </td>
        </tr>
    </table>
</div>


        <div id="behavior-settings" class="tab-content">
            <h2><?php _e('Trigger Settings', 'wp-adv-whatsapp'); ?></h2>
            <table class="form-table">
                <tr>
                    <th scope="row"><?php _e('Auto-Open Chat', 'wp-adv-whatsapp'); ?></th>
                    <td>
                        <input type="checkbox" id="<?php echo $this->plugin_name; ?>_auto_open_chat" name="<?php echo $this->plugin_name; ?>_auto_open_chat" value="1" <?php checked(get_option($this->plugin_name . '_auto_open_chat', 0), 1); ?> />
                        <label for="<?php echo $this->plugin_name; ?>_auto_open_chat"><?php _e('Automatically open the WhatsApp chat window when triggers are activated', 'wp-adv-whatsapp'); ?></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e('Hide After Close', 'wp-adv-whatsapp'); ?></th>
                    <td>
                        <input type="checkbox" id="<?php echo $this->plugin_name; ?>_hide_after_close" name="<?php echo $this->plugin_name; ?>_hide_after_close" value="1" <?php checked(get_option($this->plugin_name . '_hide_after_close', 0), 1); ?> />
                        <label for="<?php echo $this->plugin_name; ?>_hide_after_close"><?php _e('When the user closes the bubble, don\'t show it again during the current session', 'wp-adv-whatsapp'); ?></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e('Show Bubble Initially', 'wp-adv-whatsapp'); ?></th>
                    <td>
                        <input type="checkbox" id="<?php echo $this->plugin_name; ?>_show_bubble_initially" name="<?php echo $this->plugin_name; ?>_show_bubble_initially" value="1" <?php checked(get_option($this->plugin_name . '_show_bubble_initially', 1), 1); ?> />
                        <label for="<?php echo $this->plugin_name; ?>_show_bubble_initially"><?php _e('Show the speech bubble immediately when the button appears', 'wp-adv-whatsapp'); ?></label>
                    </td>
                </tr>
            </table>
        </div>

        <div id="profile-settings" class="tab-content">
    <h2><?php _e('Profile Settings', 'wp-adv-whatsapp'); ?></h2>
    <table class="form-table">
        <tr>
            <th scope="row">
                <label for="<?php echo $this->plugin_name; ?>_profile_image"><?php _e('Profile Image', 'wp-adv-whatsapp'); ?></label>
            </th>
            <td>
                <?php 
                $image_url = get_option($this->plugin_name . '_profile_image');
                $default_image = WP_ADV_WHATSAPP_PLUGIN_URL . 'public/images/default-profile.png';
                ?>
                <div class="image-preview-wrapper">
                    <img id="profile-image-preview" src="<?php echo esc_url($image_url ? $image_url : $default_image); ?>" 
                         data-default="<?php echo esc_url($default_image); ?>" alt="<?php _e('Profile Image', 'wp-adv-whatsapp'); ?>" 
                         style="max-width: 100px; max-height: 100px; border-radius: 50%;">
                </div>
                <input type="hidden" id="<?php echo $this->plugin_name; ?>_profile_image" name="<?php echo $this->plugin_name; ?>_profile_image" value="<?php echo esc_attr($image_url); ?>" />
                <div class="button-group">
                    <input type="button" id="upload_profile_image_button" class="button" value="<?php _e('Upload Image', 'wp-adv-whatsapp'); ?>" />
                    <input type="button" id="remove_profile_image_button" class="button" value="<?php _e('Remove Image', 'wp-adv-whatsapp'); ?>" style="<?php echo empty($image_url) ? 'display:none;' : ''; ?>" />
                </div>
                <p class="description"><?php _e('Upload a profile image for the WhatsApp chat header. Recommended size: 200x200 pixels.', 'wp-adv-whatsapp'); ?></p>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="<?php echo $this->plugin_name; ?>_designation"><?php _e('Designation/Role', 'wp-adv-whatsapp'); ?></label>
            </th>
            <td>
                <input type="text" id="<?php echo $this->plugin_name; ?>_designation" name="<?php echo $this->plugin_name; ?>_designation" value="<?php echo esc_attr(get_option($this->plugin_name . '_designation', 'Online')); ?>" class="regular-text" placeholder="<?php _e('e.g., Customer Support', 'wp-adv-whatsapp'); ?>" />
                <p class="description"><?php _e('This text appears below the name in the chat header.', 'wp-adv-whatsapp'); ?></p>
            </td>
        </tr>
    </table>
</div>



        <?php submit_button(); ?>
    </form>
</div>
