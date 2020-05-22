<!DOCTYPE html>
<html <?php language_attributes();?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
    <title></title>
  </head>
  <body <?php body_class(); ?>>
    <div class="main-wrapper">
      <header>
        <nav class="nav-all-wrap box-shadow">
          <div class="nav-main-wrapper side-paddings">
            <div class="nav-brand-wrapper">
              <a href="<?php echo site_url(); ?>" class="brand-link">
                <img src="<?php echo get_theme_file_uri('img/vedLogo.png') ?>" class="brand-img" alt="logo">
              </a>
              <button class="mobile-nav-btn btn-reset">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="nav-items-wrapper">
              <ul class="nav-items nav-close">
                  <li class="nav-item active hvr-sweep-to-right">
                    <a class="nav-link hvr-overline-from-left" href="<?php echo site_url('/about-us');
                     ?>">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Events</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Blogs</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Shop</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Meditation</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                  </li>

                </ul>
            </div>
          </div>

        </nav>
      </header>
