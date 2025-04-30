<?php
$structure = [
    'wp-advanced-whatsapp-chat/admin/css/admin-style.css',
    'wp-advanced-whatsapp-chat/admin/js/admin-script.js',
    'wp-advanced-whatsapp-chat/admin/class-wp-adv-whatsapp-admin.php',
    'wp-advanced-whatsapp-chat/admin/partials/admin-display.php',
    
    'wp-advanced-whatsapp-chat/includes/class-wp-adv-whatsapp.php',
    'wp-advanced-whatsapp-chat/includes/class-wp-adv-whatsapp-loader.php',
    'wp-advanced-whatsapp-chat/includes/class-wp-adv-whatsapp-i18n.php',
    'wp-advanced-whatsapp-chat/includes/class-wp-adv-whatsapp-deactivator.php',
    
    'wp-advanced-whatsapp-chat/public/css/public-style.css',
    'wp-advanced-whatsapp-chat/public/js/public-script.js',
    'wp-advanced-whatsapp-chat/public/class-wp-adv-whatsapp-public.php',
    'wp-advanced-whatsapp-chat/public/partials/chat-bubble.php',
    'wp-advanced-whatsapp-chat/public/partials/chat-window.php',
    
    'wp-advanced-whatsapp-chat/languages/wp-advanced-whatsapp-chat.pot',
    'wp-advanced-whatsapp-chat/wp-advanced-whatsapp-chat.php',
    'wp-advanced-whatsapp-chat/uninstall.php',
    'wp-advanced-whatsapp-chat/README.txt',
];

foreach ($structure as $path) {
    $dir = dirname($path);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
        echo "Created directory: $dir\n";
    }

    if (!file_exists($path)) {
        touch($path);
        echo "Created file: $path\n";
    }
}
