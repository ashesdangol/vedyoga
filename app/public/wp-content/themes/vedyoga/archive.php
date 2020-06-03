<?php
  get_header();


?>

<div class="page-wrapper blog-page-wrapper">
  <!-- Page Banner -->
  <?php
    pageBanner(array(
        'title'=> get_the_archive_title(),
        'subtitle' => get_the_archive_description()
    ));
   ?>

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
           <?php include('partials/categories_list.php'); ?>

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
