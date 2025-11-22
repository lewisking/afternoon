<!DOCTYPE html>
<html <?php language_attributes(); ?> class="bg-brand-grey selection:bg-brand-orange selection:text-white scroll-smooth">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo('description'); ?>">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
  <meta property="og:title" content="<?php bloginfo('name'); ?>">
  <meta property="og:description" content="<?php bloginfo('description'); ?>">
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/og.jpg">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="<?php echo esc_url(home_url('/')); ?>">
  <meta property="twitter:title" content="<?php bloginfo('name'); ?>">
  <meta property="twitter:description" content="<?php bloginfo('description'); ?>">
  <meta property="twitter:image" content="<?php echo get_template_directory_uri(); ?>/images/og.jpg">

  <?php wp_head(); ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" media="print" onload="this.media='all'">
  <noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap">
  </noscript>


</head>

<body <?php body_class(); ?>>