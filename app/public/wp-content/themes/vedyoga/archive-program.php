<?php
  get_header();
?>

<div class="page-wrapper blog-page-wrapper">
  <!-- Page Banner -->
  <?php
  $image=get_field('page_banner_background_image', 54);
    pageBanner(array(
        'title'=> get_the_title(54),
        'subtitle'=>get_field('page_banner_subtitle',54),
        'photo'=>$image['sizes']['pageBanner']
    ));

   ?>

  <div class="blog-main-wrapper side-paddings">
    <div class="blog-section">
      <?php
        while (have_posts()) {
          the_post();
          get_template_part('partials/program_part');
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

      <div class="past-events__link-wrapper">
        <p>Looking for a recap of past events? <a href="<?php echo site_url('/past-events');?>" class="past-events__link--color">Check out our past events archive</a></p>
      </div>
    </div>
    <!-- en d of blof section -->
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
  <!-- end of blog main wrapper -->


</div>
<!-- end of page-wrapper -->


<?php
  get_footer();
?>
