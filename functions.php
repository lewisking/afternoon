<?php
/**
 * Afternoon Theme Functions
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue styles and scripts
 */
function afternoon_enqueue_assets() {
    // Enqueue the compiled Tailwind CSS
    wp_enqueue_style(
        'afternoon-styles',
        get_template_directory_uri() . '/dist/style.css',
        array(),
        filemtime(get_template_directory() . '/dist/style.css')
    );
}
add_action('wp_enqueue_scripts', 'afternoon_enqueue_assets');

/**
 * Theme setup
 */
function afternoon_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'afternoon'),
    ));
}
add_action('after_setup_theme', 'afternoon_setup');

/**
 * Add hover class to menu links
 */
function afternoon_add_menu_link_class($atts, $item, $args) {
    if ($args->theme_location == 'primary') {
        $atts['class'] = 'hover:text-brand-orange';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'afternoon_add_menu_link_class', 10, 3);
