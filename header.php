<!DOCTYPE html>
<html <?php language_attributes(); ?>">

<head>
  <meta charset=<?= bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri(); ?>/assets/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri(); ?>/assets/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/x-icon" sizes="16x16" href="<?= get_template_directory_uri(); ?>/assets/images/favicon/icon.ico">
  <link rel="mask-icon" href="<?= get_template_directory_uri(); ?>/assets/images/favicon/icon.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#1e0b0b">
  <title>HR|WP home</title>
  <?= wp_head(); ?>
</head>

<body class="body">
  <div class="wrapper">
    <header class="header">
      <div class="container">
        <div class="header__inner">
          <div class="header__logo">
            <div class="logo">
              <a class="logo__link" href="<?php echo home_url(); ?>">
                <svg class="logo__svg">
                  <use xlink:href="<?php bloginfo('template_url'); ?> . /assets/images/sprite.svg#icon-logoDark"></use>
                </svg>
              </a>
            </div>
          </div>
          <div class="address">
            <a class="address__link" href="tel:<?php the_field('mobile_phone_number', 6); ?>">
              <?php the_field('mobile_phone', 6); ?>
            </a>
            <a class="address__link" href="tel:<?php the_field('mobile_phone_number_2', 6); ?>">
              <?php the_field('mobile_phone_2', 6); ?>
            </a>
          </div>
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'header-soc',
              'menu_class'      => 'socials',
              'container' => NULL
            )
          );
          ?>
          
          <!-- <ul class="socials">
            <li class="socials__item">
              <a class="socials__link" href="<?php echo the_field('soc1'); ?>" target="_blanc">
                <svg class="socials__icon" width="12" height="11">
                  <use xlink:href="<?php bloginfo('template_url'); ?> . /assets/images/sprite.svg#icon-linkedin"></use>
                </svg>
              </a>
            </li>
            <li class="socials__item">
              <a class="socials__link" href="<?php the_field('soc2'); ?>" target="_blanc">
                <svg class="socials__icon" width="14" height="13">
                  <use xlink:href="<?php bloginfo('template_url'); ?> . /assets/images/sprite.svg#icon-telegramm"></use>
                </svg>
              </a>
            </li>
            <li class="socials__item">
              <a class="socials__link" href="<?php the_field('soc3'); ?>" target="_blanc">
                <svg class="socials__icon" width="15" height="12">
                  <use xlink:href="<?php bloginfo('template_url'); ?> . /assets/images/sprite.svg#icon-m"> </use>
                </svg>
              </a>
            </li>
          </ul> -->
        </div>
      </div>
    </header>