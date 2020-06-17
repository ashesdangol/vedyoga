<?php
  get_header();
?>
  <?php
    $eventDate = new DateTime(get_field('event_date'));
    while (have_posts()) {
      the_post();
      // $featuredImage = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );

  ?>
  <div class="page-wrapper blog-page-wrapper">
    <!-- the banner -->
    <?php
      pageBanner(
        array(
          'title'=>'  '
        )
      );
     ?>
    <!-- the contents -->
    <div class="element element__flex-center element__marginTop--high">
      <h2 class="header__title--one"><?php the_title() ?></h2>
      <div class="likes element__flex-center">
        <?php
          $likeCount = new WP_Query(array(
            'post_type' => 'like',
            'meta_query' => array(
              array(
                'key'=>'liked_instructor_id',
                'compare'=>'=',
                'value'=>get_the_ID()
              )
            )
          ));

          $existStatus = 'no';
          if(is_user_logged_in()){
            $existQuery = new WP_Query(array(
              'author'=>get_current_user_id(),
              'post_type' => 'like',
              'meta_query' => array(
                array(
                  'key'=>'liked_instructor_id',
                  'compare'=>'=',
                  'value'=>get_the_ID()
                )
              )
            ));
            if ($existQuery->found_posts) {
              $existStatus = 'yes';
            }

          }


        ?>
        <span class="like-box" data-instructor="<?php the_ID(); ?>" data-exists="<?php echo $existStatus; ?>">
          <i class="fa fa-heart-o" aria-hidden="true"></i>
          <i class="fa fa-heart" aria-hidden="true"></i>
          <span class="like-count"><?php echo $likeCount->found_posts; ?></span>
        </span>
      </div>
    </div>

    <div class="single-blog-main-wrapper side-paddings columnLayout instructor">
      <div class="blog-section columnLayout__medium-8">
        <div class="blog-generic-contents instructor__inner-contents">
          <picture>
              <source srcset="<?php the_post_thumbnail_url('full'); ?>" media="(min-width:1920px)" >
            <source srcset="<?php the_post_thumbnail_url('large'); ?>" media="(min-width:1028px)" >
            <source srcset="<?php the_post_thumbnail_url('medium_large'); ?>" media="(min-width:400px)" >
            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="">
          </picture>
          <p> <?php the_field('main_body_content'); ?></p>

        </div>
        <div class="blog__link blog__link-program">
          <?php get_template_part('partials/_program-card-part') ?>
        </div>
      </div>
      <div class="columnLayout__medium-4">
        <div class="blog-right-navigation--wrapper">
         <?php get_template_part('partials/blog-search-category_part'); ?>
         <div class="blog-right-navigation-popular-article">
           <div class="blog-articlebox blog-boxes">
             <p>popular articles</p>
           </div>

         </div>
       </div>
      </div>
    </div>

  </div>



<?php
    }
  get_footer();
?>
