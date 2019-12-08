<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name');?> </title>
    <?php wp_head(); ?>
  </head>
  <body id="body" <?php body_class(); ?> >

    <header id="header" class="header">
      <div class="container">
        <div class="row">
          <a href="<?php bloginfo('url'); ?>" class="logo-wrapper col-6 col-sm-5 col-md-4 col-lg-3">
            <div class="logo-inner-wrapper">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/COV_Logo.png" class="cov-logo-img" alt="Club Of Vienna logo">
              <h1> Club </br>Of</br> Vienna</h1>
            </div>
          </a>
          <?php
          $header_menu = array(
            'container_id' => 'site-nav',
            'container_class' => 'site-nav ' . (is_search() ? 'open' : '') . ' col-7 col-lg-8',
            'theme_location' => 'header-menu');
          wp_nav_menu($header_menu);
          ?>
          <?php get_search_form(); ?>
          <button id="open-search-button" class="open-search-button <?php echo (is_search() ? 'open' : '');  ?> col-2 col-sm-4 col-md-4 col-lg-1">
            <img class="search-icon" src="<?php bloginfo( 'template_url' ); ?>/assets/img/search.png" alt="">
            <img class="close-icon" src="<?php bloginfo( 'template_url' ); ?>/assets/img/close_button.png" alt="">
          </button>
          <!-- Collapse button -->
          <div class="navbar-toggler-wrapper col-6 col-sm-7 col-md-8 col-lg-8">
            <div class="navbar-toggler-inner-wrapper">
              <button class="navbar-toggler second-button" type="button" data-toggle="collapse"
              data-target="#navbarSupportedContent23" aria-controls="navbarSupportedContent23" aria-expanded="false"
              aria-label="Toggle navigation">
                <div class="animated-icon"><span></span><span></span><span></span><span></span></div>
              </button>
            </div>
          </div>
        </div>
      </div>

    </header>

    <div id="mobile-menu-wrapper" class="mobile-menu-wrapper">
      <?php
        $mobile_menu = array(
          'container_id' => 'mobile-menu',
          'container_class' => 'mobile-menu',
          'theme_location' => 'mobile-menu');
        wp_nav_menu($mobile_menu);
        ?>
    </div>

    <div id="content" class="content">