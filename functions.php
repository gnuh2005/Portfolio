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


// ── Widget / Sidebar (dự phòng) ──────────────────────────────────
function nnh_widgets_init() {
    register_sidebar( [
        'name'          => __( 'Sidebar Portfolio', 'nnh-portfolio' ),
        'id'            => 'sidebar-portfolio',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ] );
}
add_action( 'widgets_init', 'nnh_widgets_init' );


// ── Helper: lấy thông tin liên hệ từ Customizer ─────────────────
function nnh_get_contact( string $key, string $default = '' ): string {
    return esc_html( get_theme_mod( 'nnh_' . $key, $default ) );
}


// ── Customizer – thông tin cá nhân ──────────────────────────────
function nnh_customize_register( WP_Customize_Manager $wp_customize ): void {
    // Panel
    $wp_customize->add_panel( 'nnh_panel', [
        'title'    => 'Portfolio – Thông tin cá nhân',
        'priority' => 30,
    ] );

    // Section: Hero
    $wp_customize->add_section( 'nnh_hero', [
        'title' => 'Hero / Giới thiệu',
        'panel' => 'nnh_panel',
    ] );

    $hero_fields = [
        'hero_name'     => [ 'Họ tên', 'Nguyễn Ngọc Hùng' ],
        'hero_role'     => [ 'Vai trò', 'Frontend Developer' ],
        'hero_bio'      => [ 'Mô tả ngắn', 'Sinh viên Công nghệ Thông tin tại Trường Đại học Tây Nguyên.' ],
    ];
    foreach ( $hero_fields as $id => [ $label, $default ] ) {
        $wp_customize->add_setting( 'nnh_' . $id, [ 'default' => $default, 'sanitize_callback' => 'sanitize_text_field' ] );
        $wp_customize->add_control( 'nnh_' . $id, [ 'label' => $label, 'section' => 'nnh_hero', 'type' => 'text' ] );
    }

    // Section: Liên hệ
    $wp_customize->add_section( 'nnh_contact', [
        'title' => 'Thông tin liên hệ',
        'panel' => 'nnh_panel',
    ] );

    $contact_fields = [
        'email'    => [ 'Email', 'nnh08072005@gmail.com' ],
        'github'   => [ 'GitHub URL', 'https://github.com/gnuh2005' ],
        'facebook' => [ 'Facebook URL', 'https://www.facebook.com/gnuh.2005' ],
        'address'  => [ 'Địa chỉ', 'Buôn Ma Thuột, Đắk Lắk' ],
    ];
    foreach ( $contact_fields as $id => [ $label, $default ] ) {
        $wp_customize->add_setting( 'nnh_' . $id, [ 'default' => $default, 'sanitize_callback' => 'esc_url_raw' ] );
        $wp_customize->add_control( 'nnh_' . $id, [ 'label' => $label, 'section' => 'nnh_contact', 'type' => 'text' ] );
    }
}
add_action( 'customize_register', 'nnh_customize_register' );


// ── Xử lý form liên hệ (AJAX) ───────────────────────────────────
function nnh_handle_contact_form(): void {
    // Bảo mật nonce
    check_ajax_referer( 'nnh_contact_nonce', 'nonce' );

    $name    = sanitize_text_field( $_POST['name']    ?? '' );
    $email   = sanitize_email(      $_POST['email']   ?? '' );
    $subject = sanitize_text_field( $_POST['subject'] ?? '' );
    $message = sanitize_textarea_field( $_POST['message'] ?? '' );

    if ( ! $name || ! is_email( $email ) || ! $message ) {
        wp_send_json_error( [ 'msg' => 'Vui lòng điền đầy đủ thông tin.' ] );
    }

    $to      = get_option( 'admin_email' );
    $headers = [ 'Content-Type: text/plain; charset=UTF-8', "Reply-To: $name <$email>" ];

    $sent = wp_mail( $to, "[Portfolio] $subject", "Từ: $name <$email>\n\n$message", $headers );

    if ( $sent ) {
        wp_send_json_success( [ 'msg' => 'Đã gửi thành công!' ] );
    } else {
        wp_send_json_error( [ 'msg' => 'Gửi thất bại. Vui lòng thử lại.' ] );
    }
}
add_action( 'wp_ajax_nnh_contact',        'nnh_handle_contact_form' );
add_action( 'wp_ajax_nopriv_nnh_contact', 'nnh_handle_contact_form' );