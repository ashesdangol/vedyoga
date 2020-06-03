<?php
  get_header();
?>
  <?php
    while (have_posts()) {
      the_post();
      // $featuredImage = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );

  ?>
  <div class="page-wrapper blog-page-wrapper">
    <!-- the banner -->
    <?php
      pageBanner();

     ?>
    <!-- the contents -->
    <div class="single-blog-main-wrapper side-paddings">
      <div class="blog-section metabox--relative">
        <div class="metabox metabox--position-up metabox--with-home-link">
          <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog') ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a>
            <span class="metabox__main">posted by <?php the_author_posts_link(); ?> on <?php the_time('M d, Y') ?></span>
          </p>
        </div>
        <div class="blog-generic-contents">
          <h2><?php echo the_title(); ?></h2>
           <?php echo get_the_content(); ?>
        </div>
        <div class="blog-category-type">
          <p>Category : <span><?php echo get_the_category_list(' ,'); ?></span></p>
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
