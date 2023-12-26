<?php
/*
Plugin Name: Custom Editor Plugin
Description: A simple custom editor plugin.
Version: 1.0
Author: Sekh Aslam Ali
*/

// Activation hook
register_activation_hook(__FILE__, 'custom_editor_plugin_activate');

// Deactivation hook
register_deactivation_hook(__FILE__, 'custom_editor_plugin_deactivate');

// Function to run during activation
function custom_editor_plugin_activate() {
    // Your activation code here
    // For example, you can create tables, set default options, etc.
    // Example: update_option('custom_editor_version', '1.0');
}

// Function to run during deactivation
function custom_editor_plugin_deactivate() {
    // Your deactivation code here
    // Example: delete_option('custom_editor_version');
}

// Enqueue scripts and styles for the editor
function custom_editor_enqueue_assets() {
    wp_enqueue_script(
        'custom-editor-script',
        plugin_dir_url(__FILE__) . 'editor.js',
        array('wp-blocks', 'wp-editor', 'wp-components', 'wp-i18n', 'wp-element'),
        true
    );
}
add_action('enqueue_block_editor_assets', 'custom_editor_enqueue_assets');
