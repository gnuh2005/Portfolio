<?php
/**
 * functions.php – Portfolio Theme: Nguyễn Ngọc Hùng
 */

// ── Thiết lập theme ──────────────────────────────────────────────
function nnh_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script',
    ] );
    register_nav_menus( [
        'primary' => __( 'Menu chính', 'nnh-portfolio' ),
    ] );
}
add_action( 'after_setup_theme', 'nnh_theme_setup' );


// ── Enqueue CSS & JS ─────────────────────────────────────────────
function nnh_enqueue_assets() {
    $main_js_path = get_template_directory() . '/assets/js/main.js';
    $main_js_ver  = file_exists( $main_js_path ) ? filemtime( $main_js_path ) : wp_get_theme()->get( 'Version' );

    wp_enqueue_style(
        'nnh-google-fonts',
        'https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=Cormorant+Garamond:ital,wght@0,600;0,700;1,600&display=swap',
        [], null
    );

    wp_enqueue_style(
        'nnh-style',
        get_stylesheet_uri(),
        [ 'nnh-google-fonts' ],
        wp_get_theme()->get( 'Version' )
    );

    wp_enqueue_script(
        'nnh-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        $main_js_ver,
        true
    );

}
add_action( 'wp_enqueue_scripts', 'nnh_enqueue_assets' );
