<!DOCTYPE html>
<html <?php language_attributes(); ?> >
  <head>
    <title><?php bloginfo('name'); ?> &raquo; <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"> -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/header.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/single-notice.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <?php if( is_user_logged_in() ) : ?>
      <style>
        nav {
          margin-top: 32px;
        }
      </style>
    <?php endif; ?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header>
      <nav class="navbar navbar-dark navbar-expand-lg shadow p-4 fixed-top">
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>
        <ul class="navbar-nav ml-auto cart_logo">
          <li class="nav-item">
            <a href="" class="nav-link">カート</a>
          </li>
        </ul>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#a">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="a">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="" class="nav-link">お知らせ</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">オンライン注文</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">店舗情報</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link pr-4">商品検索</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
  <!-- <?php wp_nav_menu( array( 'header-menu' => 'header-menu' ) ); ?> -->