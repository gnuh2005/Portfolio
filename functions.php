<?php
/**
 * functions.php – Portfolio Theme: Nguyễn Ngọc Hùng
 */

// ── Thiết lập theme ──────────────────────────────────────────────
function nnh_theme_setup() {
    // Hỗ trợ tiêu đề động
    add_theme_support( 'title-tag' );

    // Hỗ trợ ảnh đại diện bài viết
    add_theme_support( 'post-thumbnails' );

    // Hỗ trợ HTML5
    add_theme_support( 'html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ] );

    // Đăng ký vị trí menu (nếu cần mở rộng sau)
    register_nav_menus( [
        'primary' => __( 'Menu chính', 'nnh-portfolio' ),
    ] );
}
add_action( 'after_setup_theme', 'nnh_theme_setup' );


// ── Enqueue CSS & JS ─────────────────────────────────────────────
function nnh_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'nnh-google-fonts',
        'https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=Cormorant+Garamond:ital,wght@0,600;0,700;1,600&display=swap',
        [],
        null
    );

    // Style chính của theme
    wp_enqueue_style(
        'nnh-style',
        get_stylesheet_uri(),
        [ 'nnh-google-fonts' ],
        wp_get_theme()->get( 'Version' )
    );

    // Script chính (footer)
    wp_enqueue_script(
        'nnh-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        wp_get_theme()->get( 'Version' ),
        true   // load ở footer
    );
}
add_action( 'wp_enqueue_scripts', 'nnh_enqueue_assets' );


