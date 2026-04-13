<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nguyễn Ngọc Hùng – Frontend Developer</title>
  <link rel="icon" type="image/jpeg" href="<?php echo get_template_directory_uri(); ?>/images/logo.jpg">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ── SIDEBAR ── -->
<div class="sidebar">

  <a href="<?php echo home_url(); ?>" class="logo">NNH</a>

  <?php echo do_shortcode('[wp_dark_mode]'); ?>

  <a href="#home" class="nav-dot active">
    <svg viewBox="0 0 24 24">
      <path d="M3 9.5L12 3l9 6.5V20a1 1 0 01-1 1H4a1 1 0 01-1-1V9.5z"/>
    </svg>
    <span class="tip">Home</span>
  </a>

  <a href="#resume" class="nav-dot">
    <svg viewBox="0 0 24 24">
      <rect x="4" y="3" width="16" height="18" rx="2"/>
      <line x1="8" y1="9"  x2="16" y2="9"/>
      <line x1="8" y1="13" x2="16" y2="13"/>
      <line x1="8" y1="17" x2="12" y2="17"/>
    </svg>
    <span class="tip">Resume</span>
  </a>

  <a href="#projects" class="nav-dot">
    <svg viewBox="0 0 24 24">
      <rect x="3"  y="3"  width="8" height="8" rx="1"/>
      <rect x="13" y="3"  width="8" height="8" rx="1"/>
      <rect x="3"  y="13" width="8" height="8" rx="1"/>
      <rect x="13" y="13" width="8" height="8" rx="1"/>
    </svg>
    <span class="tip">Projects</span>
  </a>

  <a href="#contact" class="nav-dot">
    <svg viewBox="0 0 24 24">
      <path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z"/>
      <polyline points="22,6 12,13 2,6"/>
    </svg>
    <span class="tip">Contact</span>
  </a>

</div><!-- /.sidebar -->

<main>