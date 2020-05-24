<!DOCTYPE html>
<html <?php language_attributes();?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
    <title></title>
  </head>
  <body <?php body_class(); ?>>
    <div class="main-wrapper ">
      <header>
        <nav class="nav-all-wrap" id="top-nav">
          <div class="nav-main-wrapper side-paddings on-scroll-nav--change">
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
              <ul class="nav-items nav-close mobile-links">
                  <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('/about-us');?>">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/event');?>">Events</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/blog');?>">Blogs</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/shop');?>">Shop</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/meditation');?>">Meditation</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/contact-us');?>">Contact</a>
                  </li>

                </ul>
            </div>
          </div>

        </nav>
      </header>
