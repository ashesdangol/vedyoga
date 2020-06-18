<?php
  get_header();
?>
  <?php
    while (have_posts()) {
      the_post();
      // $featuredImage = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
      // <div class="page-banner__bg-image" style="background-image: url(<?php echo $featuredImage


  ?>
  <div class="page-wrapper blog-page-wrapper">
    <!-- the banner -->
    <?php
    pageBanner();
     ?>
    <!-- the contents -->
    <div class="single-blog-main-wrapper layoutType">
      <div class="blog-section metabox--relative layoutType--col-8 yesPadding--all">
        <div class="metabox metabox--position-up metabox--with-home-link">
          <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Programs</a>
            <span class="metabox__main"><?php the_title(); ?></span>
          </p>
        </div>
        <div class="blog-generic-contents">
          <h2><?php echo the_title(); ?></h2>
           <?php the_field('main_body_content'); ?>
        </div>
        <div class="blog-category-type">
          <p>Category : <span><?php echo get_the_category_list(' ,'); ?></span></p>
        </div>
        <div class="blog__link blog__link-event">
          <div class="home__blog-event">
            <?php
            $relatedInstructor = new WP_Query(array(
              'posts_per_page'=>2,
              'post_type'=>'instructor',
              'orderby' => 'title',
              'order' => 'ASC',
              'meta_query' => array(
                array(
                  'key' => 'related_programs',
                  'compare' =>'LIKE',
                  'value' =>'"'.get_the_ID().'"'
                )
              )
            ));
            if ($relatedInstructor->have_posts()) {
              //
              echo '<h2 class="header__title--one">Instructor for '.get_the_title().'</h2>';
              while ($relatedInstructor->have_posts()) {
                $relatedInstructor->the_post();
                get_template_part('partials/instructor-card');
                }
                  wp_reset_postdata();
                // end of while loop
            //

          }


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
                  ),
                  array(
                    'key' => 'related_programs',
                    'compare' =>'LIKE',
                    'value' =>'"'.get_the_ID().'"'
                  )
                )
              ));
              if ($eventPost->have_posts()) {
                //
                echo '<h2 class="header__title--one">Upcoming Events for '.get_the_title().'</h2>';
                while ($eventPost->have_posts()) {
                  $eventPost->the_post();
                  get_template_part('partials/event_part');
                  }
                    wp_reset_postdata();
                  // end of while loop
              //
              ?>
              <div class="btn__rt">
                  <a href="<?php echo get_post_type_archive_link('event'); ?>" class="hvr-icon-buzz">View All Events</a>
              </div>
              <?php
              }
            ?>
          </div>


        </div>
      </div>
      <div class="layoutType--col-4 yesPadding--med-lg margin-top--all">
       <div class="blog-right-navigation--wrapper">
         <?php get_template_part('partials/blog-search-category_part') ?>
       </div>
      </div>
    </div>
  </div>



<?php
    }
  get_footer();
?>
