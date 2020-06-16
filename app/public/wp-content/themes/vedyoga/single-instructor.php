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
    <div class="element element__center element__marginTop--high">
      <h2 class="header__title--one"><?php the_title() ?></h2>
      <div class="likes">
        <span class="like-box ">
          <i class="fa fa-heart-o" aria-hidden="true"></i>
          <i class="fa fa-heart" aria-hidden="true"></i>
          <span class="like-count">3</span>
        </span>
      </div>
    </div>

    <div class="single-blog-main-wrapper side-paddings columnLayout">
      <div class="blog-section columnLayout__medium-8">
        <div class="blog-generic-contents">
          <picture>
            <source srcset="<?php the_post_thumbnail_url('large'); ?>" media="(min-width:1028px)" >
            <source srcset="<?php the_post_thumbnail_url('medium_large'); ?>" media="(min-width:400px)" >
            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="">
          </picture>
            <p> <?php the_field('main_body_content'); ?></p>

        </div>
        <div class="blog__link blog__link-program">
          <?php
            $relatedPrograms = get_field('related_programs');

            if ( $relatedPrograms) {
              echo "<h2 class='heading__title header__title--one'>Instructed Program(s)</h2>";
              echo "<ul>";
              foreach ($relatedPrograms as $program) {
          ?>
          <li class="list__items"><a href="<?php echo get_the_permalink($program); ?>">
            <?php echo get_the_title($program); ?></a>
          </li>
          <?php
            }
              echo "</ul>";
            }
           ?>

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
