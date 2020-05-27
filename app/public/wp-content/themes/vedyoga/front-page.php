<?php
  get_header();
?>
<section class="video-banner__wrapper">
  <div class="video-banner__bg">
    <video autoplay="" loop="" muted="" poster="<?php echo get_theme_file_uri('img/1.jpg'); ?>">
      <source src="<?php echo get_theme_file_uri('video/video.mp4') ?>" type="video/mp4">
      <source src="<?php echo get_theme_file_uri('video/video.webm') ?>" type="video/webm">
    </video>
  </div>
  <div class="video-banner__contents video-banner__contents--centered">
    <h1 class="video-banner__title">Welcome to VedYoga, We will help you to find inner peace.</h1>
    <div class="video-banner__search-box">

    </div>
  </div>
</section>

<section class="home__events-and-blogs--section">
  <div class="generic-two-cols">
    <div class="generic-two-col generic-two-col__1 gentle-box-shadow">
      <h1 class="header__title--one">Upcoming Events</h1>
      <div class="home__blog-event">

        <?php
          $homeBlogpost = new WP_Query(array(
            'posts_per_page'=>2
          ));

          while ($homeBlogpost->have_posts()) {
            $homeBlogpost->the_post();
        ?>
        <?php include('partials/blog-card.php') ?>
        <?php
            }
            // end of while loop
        ?>
      </div>
      <div class="btn__rt">
          <a href="<?php echo site_url('/blog'); ?>" class="hvr-icon-buzz">View More</a>
      </div>
    </div>
    <div class="generic-two-col generic-two-col__2 gentle-box-shadow">
      <h1 class="header__title--one">Our Latest Blogs</h1>
      <div class="home__blog-event">
        <?php
          $homeBlogpost = new WP_Query(array(
            'posts_per_page'=>2
          ));

          while ($homeBlogpost->have_posts()) {
            $homeBlogpost->the_post();
        ?>
        <?php include('partials/blog-card.php') ?>
        <?php
            }
            // end of while loop
        ?>
      </div>
      <div class="btn__rt">
          <a href="<?php echo site_url('/blog'); ?>" class="hvr-icon-buzz">View More</a>
      </div>
    </div>

  </div>
</section>

<?php
  get_footer();
?>
