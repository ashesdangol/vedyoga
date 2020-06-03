<?php
  get_header();
?>

<div class="page-wrapper blog-page-wrapper">
  <!-- PageBanner -->
  <?php
    pageBanner(array(
        'title'=> 'Past Events',
        'subtitle' => 'A recap of our past events'
    ));

   ?>


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
          get_template_part('partials/event_part');
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
