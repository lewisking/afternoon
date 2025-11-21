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
        get_template_directory_uri() . '/style.min.css',
        array(),
        filemtime(get_template_directory() . '/style.min.css')
    );
}
add_action('wp_enqueue_scripts', 'afternoon_enqueue_assets');

/**
 * Remove WordPress block library CSS
 */
function afternoon_remove_block_css() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style');
    wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'afternoon_remove_block_css', 100);

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
        'secondary' => __('Secondary Menu', 'afternoon'),
    ));
}
add_action('after_setup_theme', 'afternoon_setup');

/**
 * Add hover class to menu links and prepend home URL to hash links
 */
function afternoon_add_menu_link_class($atts, $item, $args) {
    $atts['class'] = 'hover:text-brand-orange focus:outline-none focus:text-brand-orange';

    // Prepend home URL to hash links
    if (isset($atts['href']) && strpos($atts['href'], '#') === 0) {
        $atts['href'] = home_url('/') . $atts['href'];
    }

    return $atts;
}
add_filter('nav_menu_link_attributes', 'afternoon_add_menu_link_class', 10, 3);

/**
 * Button Class Helpers
 */
function afternoon_button_classes() {
    // Base classes shared by most buttons
    $base = 'px-4 md:px-8 py-4 h-[42px] md:h-[60px] flex items-center justify-center font-bold md:text-xl rounded-full focus:outline-none';

    return [
        'primary' => 'px-4 md:px-10 py-4 h-[42px] md:h-[60px] flex items-center justify-center font-semibold text-base md:text-xl text-white bg-brand-orange rounded-full ring-1 ring-inset ring-brand-orange hover:bg-brand-orange-hover focus:outline-none focus:bg-brand-orange-active',
        'secondary' => 'px-4 md:px-9 py-4 h-[42px] md:h-[60px] flex items-center justify-center font-semibold text-base md:text-xl text-brand-orange rounded-full ring-6 ring-inset ring-brand-orange hover:bg-brand-orange hover:text-white focus:outline-none focus:bg-brand-orange-active focus:ring-brand-orange-active focus:text-white',
        'pricing-primary' => $base . ' text-brand-orange bg-white ring-6 ring-inset ring-brand-orange hover:bg-brand-orange hover:text-white focus:text-white focus:bg-brand-orange-active focus:ring-brand-orange-active',
        'pricing-secondary' => $base . ' text-brand-orange bg-white hover:text-brand-orange hover:bg-brand-white-hover focus:text-brand-orange-active focus:bg-white',
        'about-primary' => $base . ' text-brand-orange bg-white hover:text-brand-orange hover:bg-brand-white-hover focus:text-brand-orange-active focus:bg-white',
        'about-secondary' => $base . ' text-base text-white ring-6 ring-inset ring-white hover:ring-brand-white-hover focus:ring-brand-grey',
        'team-navigation' => 'px-6 py-4 h-[48px] flex items-center justify-center font-semibold text-xl text-brand-orange bg-white rounded-full ring-6 ring-inset ring-brand-orange focus:outline-none hover:bg-brand-orange hover:text-white focus:bg-brand-orange focus:text-white',
    ];
}

function afternoon_get_button_class($type = 'primary') {
    $classes = afternoon_button_classes();
    return isset($classes[$type]) ? $classes[$type] : $classes['primary'];
}

/**
 * ACF Field Helpers with null checks
 */
function afternoon_get_acf_field($field_path, $default = '') {
    $value = get_field($field_path);
    return $value !== false && $value !== null ? $value : $default;
}

function afternoon_get_acf_nested($field_path, $nested_key, $default = '') {
    $field = get_field($field_path);
    if ($field && is_array($field) && isset($field[$nested_key])) {
        return $field[$nested_key];
    }
    return $default;
}

/**
 * Render ACF Link Button
 */
function afternoon_render_button($link_array, $button_type = 'primary', $additional_classes = '') {
    if (empty($link_array) || !is_array($link_array)) {
        return '';
    }

    $url = isset($link_array['url']) ? esc_url($link_array['url']) : '';
    $title = isset($link_array['title']) ? esc_html($link_array['title']) : '';
    $target = isset($link_array['target']) ? esc_attr($link_array['target']) : '_self';

    if (empty($url) || empty($title)) {
        return '';
    }

    $class = afternoon_get_button_class($button_type);
    if (!empty($additional_classes)) {
        $class .= ' ' . esc_attr($additional_classes);
    }

    return sprintf(
        '<a href="%s" target="%s" class="%s">%s</a>',
        $url,
        $target,
        $class,
        $title
    );
}

/**
 * Get image URI helper
 */
function afternoon_image_uri($path = '') {
    return get_template_directory_uri() . '/images/' . ltrim($path, '/');
}

/**
 * Render SVG icon
 *
 * @param string $name SVG component name (without .php extension)
 * @param string $classes Additional CSS classes
 * @param array $args Additional arguments to pass to the SVG template
 * @param bool $echo Whether to echo or return the output
 * @return string|void
 */
function afternoon_svg($name, $classes = '', $args = [], $echo = true) {
    $svg_file = get_template_directory() . '/template-parts/svg/' . $name . '.php';

    if (!file_exists($svg_file)) {
        return $echo ? '' : '';
    }

    // Make classes and args available to the template
    $svg_classes = $classes;
    $svg_args = $args;

    ob_start();
    include $svg_file;
    $output = ob_get_clean();

    if ($echo) {
        echo $output;
        return;
    }

    return $output;
}
