<?php
  get_header();
  $mp4=get_field('banner_video_mp4');
  $webm=get_field('banner_video_webm');
?>
<section class="video-banner__wrapper">
  <div class="video-banner__bg">
    <video playsinline autoplay="" loop="" muted="" poster="<?php echo get_theme_file_uri('/img/poster/poster__medium.jpg'); ?>">
      <source src="<?php echo $mp4; ?>" type="video/mp4">
      <source src="<?php echo $webm; ?>" type="video/webm">
    </video>
  </div>
  <div class="video-banner__contents video-banner__contents--centered">
    <h1 class="video-banner__title"><?php the_field('page_banner_subtitle'); ?></h1>
    <div class="video-banner__search-box">
      <?php   get_template_part('partials/search-btn_part'); ?>
    </div>
  </div>
</section>

<section class="home__events-and-blogs--section">
  <div class="generic-two-cols">
    <div class="generic-two-col generic-two-col__1 gentle-box-shadow">
      <h2 class="header__title--one">Upcoming Events</h2>
      <div class="home__blog-event">

        <?php
        $today = date('Ymd');
          $eventPost = new WP_Query(array(
            'posts_per_page'=>2,
            'post_type'=>'event',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'meta_query' => array(
              array(
                'key' => 'event_date',
                'compare' =>'>=',
                'value' => $today,
                'type' => 'date'
              )
            )
          ));

          while ($eventPost->have_posts()) {
            $eventPost->the_post();
            get_template_part('partials/event_part');
        ?>

        <?php
            }
              wp_reset_postdata();
            // end of while loop
        ?>
      </div>
      <div class="btn__rt">
          <a href="<?php echo get_post_type_archive_link('event'); ?>" class="hvr-icon-buzz">View All Events</a>
      </div>
    </div>
    <div class="generic-two-col generic-two-col__2 gentle-box-shadow">
      <h2 class="header__title--one">Our Latest Blogs</h2>
      <div class="home__blog-event">
        <?php
          $homeBlogpost = new WP_Query(array(
            'posts_per_page'=>2
          ));

          while ($homeBlogpost->have_posts()) {
            $homeBlogpost->the_post();
            get_template_part('partials/blog-card');
        ?>

        <?php
            }
            wp_reset_postdata();
            // end of while loop
        ?>
      </div>
      <div class="btn__rt">
          <a href="<?php echo site_url('/blog'); ?>" class="hvr-icon-buzz">View All Blog Posts</a>
      </div>
    </div>

  </div>
</section>

<?php
  get_footer();
?>
