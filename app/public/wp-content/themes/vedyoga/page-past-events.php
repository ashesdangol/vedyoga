<?php
  get_header();
?>

<div class="page-wrapper blog-page-wrapper">
  <div class="page-banner blog-page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/img/7.jpg') ?>);"></div>
    <div class="page-banner__content side-paddings">
      <h1 class="page-banner__title mobile-page-banner__title--smFont">
        Past Events
      </h1>
      <div class="page-banner__intro mobile-page-banner__intro--smFont">
        <p>A recap of our past events</p>
      </div>
    </div>
  </div>

  <div class="blog-main-wrapper side-paddings">
    <div class="blog-section">
      <?php
      $today = date('Ymd');
        $pastEvents = new WP_Query(array(
          'paged' =>get_query_var('paged',1),
          // 'posts_per_page'=>1,
          'post_type'=>'event',
          'meta_key' => 'event_date',
          'orderby' => 'meta_value',
          'order' => 'DESC',
          'meta_query' => array(
            array(
              'key' => 'event_date',
              'compare' =>'<',
              'value' => $today,
              'type' => 'date'
            )
          )
        ));
        while ($pastEvents->have_posts()) {
          $pastEvents->the_post();
      ?>
      <?php include('partials/event_part.php') ?>
      <?php
          }
          // end of while loop
      ?>
      <!-- pagination -->
      <div class="pagination--styling">
        <?php
          echo paginate_links(array(
            'total' => $pastEvents->max_num_pages
          ));
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
