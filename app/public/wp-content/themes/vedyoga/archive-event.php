<?php
  get_header();
?>

<div class="page-wrapper blog-page-wrapper">
  <!-- PageBanner -->
  <?php
    pageBanner(array(
        'title'=> 'All Events',
        'subtitle' => 'All subtitles'
    ));

   ?>

  <div class="blog-main-wrapper side-paddings">
    <div class="blog-section">
      <?php
        while (have_posts()) {
          the_post();
          get_template_part('partials/event_part');
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
        <p class="list__items">Looking for a recap of past events? <a href="<?php echo site_url('/past-events');?>" class="past-events__link--color">Check out our past events archive</a></p>
      </div>
    </div>
    <!-- en d of blof section -->
    <div class="blog-right-navigation side-paddings">
     <div class="blog-right-navigation--wrapper">
       <div class="blog-right-navigation-searchbox">
         <div class="blog-searchbox blog-boxes">
           <p>searchbox</p>
         </div>
       </div>
       <div class="blog-right-navigation-categories ">
           <?php get_template_part('partials/categories_list'); ?>

       </div>
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
