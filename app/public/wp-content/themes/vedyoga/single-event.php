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
      pageBanner(array(
        'title'=> $eventDate->format('d M Y'),
        'subtitle' => $eventDate->format('g:i a')
      ));
     ?>
    <!-- the contents -->
    <div class="single-blog-main-wrapper side-paddings">
      <div class="blog-section metabox--relative">
        <div class="metabox metabox--position-up metabox--with-home-link">
          <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Events Home</a>
            <span class="metabox__main"><?php the_title(); ?></span>
          </p>
        </div>
        <div class="blog-generic-contents">
          <h2><?php echo the_title(); ?></h2>
           <?php echo the_field('main_body_content'); ?>
        </div>
        <div class="blog-category-type">
          <p>Category : <span><?php echo get_the_category_list(' ,'); ?></span></p>
        </div>
        <div class="blog__link blog__link-program">
          <?php
            $relatedPrograms = get_field('related_programs');

            if ( $relatedPrograms) {
              echo "<h2 class='heading__title header__title--one'>Related Programs with this Event</h2>";
              echo "<ul>";
              foreach ($relatedPrograms as $program) {
          ?>
          <li class="list__items"><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
          <?php
            }
              echo "</ul>";
            }
           ?>

        </div>
      </div>
      <div class="blog-right-navigation side-paddings">
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
