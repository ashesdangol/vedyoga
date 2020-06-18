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


  <div class="blog-main-wrapper layoutType">
    <div class="blog-section layoutType--col-8 yesPadding--all">
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
    <div class="layoutType--col-4 yesPadding--med-lg margin-top--all">
     <div class="blog-right-navigation--wrapper">
       <?php get_template_part('partials/blog-search-category_part') ?>
     </div>
    </div>
  </div>
  <!-- end of blog main wrapper -->


</div>
<!-- end of page-wrapper -->


<?php
  get_footer();
?>
