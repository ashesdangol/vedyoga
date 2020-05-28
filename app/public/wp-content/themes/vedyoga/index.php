<?php
  get_header();
?>

<div class="page-wrapper blog-page-wrapper">
  <div class="page-banner blog-page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/img/8.jpg') ?>);"></div>
    <div class="page-banner__content side-paddings--double">
      <h1 class="page-banner__title">Blog</h1>
      <div class="page-banner__intro">
        <p>What's in your mind?</p>
      </div>
    </div>
  </div>

  <div class="blog-main-wrapper side-paddings">
    <div class="blog-section">
      <?php
        while (have_posts()) {
          the_post();
      ?>
    <?php include('partials/blog-card.php') ?>
      <?php
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
           <?php
              $instafeed = new WP_Query(array(
                'posts_per_page'=> 1,
                'post_type'=>'Instagram'
              ));
              while($instafeed->have_posts()){
                $instafeed->the_post();
                the_content();
              }
              wp_reset_postdata();
            ?>
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
