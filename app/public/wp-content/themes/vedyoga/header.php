<!DOCTYPE html>
<html <?php language_attributes();?>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
    <title></title>
  </head>
  <body <?php body_class(); ?> class="main-wrapper">

      <header id="main__header">
        <nav class="nav-all-wrap" id="top-nav">
          <div class="nav-main-wrapper side-paddings on-scroll-nav--change">
            <div class="nav-brand-wrapper">
              <a href="<?php echo site_url(); ?>" class="brand-link">
                <picture class="logo">
                  <img class="logo__img" src="<?php echo get_theme_file_uri('img/meditation_logo.png') ?>"  alt="logo">
                </picture>

              </a>
              <button class="mobile-nav-btn btn-reset">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="nav-items-wrapper">
              <ul class="nav-items nav-close mobile-links header-menu__lists">
                  <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('/about-us');?>">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo get_post_type_archive_link('event');?>">Events</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/blog');?>">Blogs</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/shop');?>">Shop</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo get_post_type_archive_link('program');?>">Programs</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/contacts');?>">Contact</a>
                  </li>
                  <div class="site-header__util general-btn__wrapper">
                    <?php
                      if (is_user_logged_in()) {
                    ?>
                    <div class="general-btn__item include-sweep login__style">
                      <a href="<?php echo esc_url(site_url('/my-notes')); ?>" class="nav-link login__notes general-btn include-sweep__color"> My Notes</a>
                    </div>

                      <div class="general-btn__item include-sweep login__style">
                          <a href="<?php echo wp_logout_url() ;?>" class="nav-link general-btn include-sweep__color btn--with-photo">
                            <span class="site-header__avatar"><?php echo get_avatar(get_current_user_id(), 30); ?></span>
                            <span class="site-header__btn-text">Log Out</span>
                          </a>
                      </div>
                      <?php
                      }else{
                      ?>
                        <div class="general-btn__item include-sweep">
                          <a href="<?php echo wp_login_url(); ?>" class="nav-link general-btn include-sweep__color"> Login</a>
                        </div>
                        <div class="general-btn__item include-sweep">
                            <a href="<?php echo wp_registration_url();?>" class="nav-link general-btn include-sweep__color">Sign Up</a>
                        </div>
                    <?php
                      }
                     ?>



                  </div>

                </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="body__contents">
