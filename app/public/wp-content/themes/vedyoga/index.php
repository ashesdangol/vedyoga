<?php
  get_header();
?>

<div class="page-wrapper blog-page-wrapper">
  <!-- PageBanner -->
  <?php
  $image=get_field('page_banner_background_image', 23);
    pageBanner(array(
        'title'=> get_the_title(23),
        'subtitle'=>get_field('page_banner_subtitle',23),
        'photo'=>$image['sizes']['pageBanner']
    ));

   ?>


  <div class="blog-main-wrapper side-paddings">
    <div class="blog-section">
      <?php
        while (have_posts()) {
          the_post();
          get_template_part('partials/blog-card');
          }
          // end of while loop
      ?>
      <!-- pagination -->
      <div class="pagination--styling">
        <?php
          echo paginate_links();
         ?>
      </div>
      <!-- end of pagination -->
    </div>
    <!-- en d of blof section -->
    <div class="blog-right-navigation side-paddings">
     <div class="blog-right-navigation--wrapper">
       <div class="blog-right-navigation-searchbox">
         <div class="blog-searchbox blog-boxes">
           <?php get_template_part('partials/search_part'); ?>
         </div>
       </div>
       <div class="blog-right-navigation-categories ">
         <div class="blog-categorybox blog-boxes">
            <?php get_template_part('partials/categories_list'); ?>
         </div>

       </div>
       <div class="blog-right-navigation-popular-article">
         <div class="blog-articlebox blog-boxes">
            <?php get_template_part('partials/instagram_part'); ?>
         </div>

       </div>

     </div>
    </div>
  </div>
  <!-- end of blog main wrapper -->


</div>
<!-- end of page-wrapper -->


<?php
  get_footer();
?>
