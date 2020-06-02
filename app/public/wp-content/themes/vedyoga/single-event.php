<?php
  get_header();
?>
  <?php
    while (have_posts()) {
      the_post();
      $featuredImage = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );

  ?>
  <div class="page-wrapper blog-page-wrapper">
    <!-- the banner -->
    <div class="page-banner blog-page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo $featuredImage ?>);"></div>
      <div class="page-banner__content side-paddings">
        <h1 class="page-banner__title mobile-page-banner__title--smFont"><?php echo the_title(); ?></h1>
        <div class="page-banner__intro mobile-page-banner__intro--smFont">
          <p>Cheackout what's happening!</p>
        </div>
      </div>
    </div>
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
           <?php echo get_the_content(); ?>
        </div>
        <div class="blog-category-type">
          <p>Category : <span><?php echo get_the_category_list(' ,'); ?></span></p>
        </div>
        <div class="blog__link blog__link-program">
          <?php
            $relatedPrograms = get_field('related_programs');

            if ( $relatedPrograms) {
              echo "<h2 class='heading__title'>Related Programs with the Event</h2>";
              echo "<ul>";
              foreach ($relatedPrograms as $program) {
          ?>
          <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
          <?php
            }
              echo "</ul>";
            }
           ?>

        </div>
      </div>
      <div class="blog-right-navigation side-paddings">
       <div class="blog-right-navigation--wrapper">
         <div class="blog-right-navigation-searchbox">
           <div class="blog-searchbox blog-boxes">
             <p>searchbox</p>

           </div>
         </div>
         <div class="blog-right-navigation-categories ">
           <div class="blog-categorybox blog-boxes">
             <?php include('partials/categories_list.php'); ?>

           </div>

         </div>
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
