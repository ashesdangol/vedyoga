<?php
  get_header();
?>

<div class="page-wrapper blog-page-wrapper">
  <!-- Page Banner -->
  <?php
  $image=get_field('page_banner_background_image', 54);
    pageBanner(array(
        'title'=>' Our Locations',
        'subtitle'=>'Find us in your locale'

    ));

   ?>

  <div class="blog-main-wrapper side-paddings">
    <div class="blog-section">
      <div class="acf__map">
      <?php
        while (have_posts()) {
          the_post();
          // $mapLocation = get_field('map_location');
          // fake long and lat
           $mapLocation = array(
             'lat'=>'40.78',
             'lng'=>'-73.977'

           );
          ?>
          <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng'] ?>">

          </div>

        <?php

          }
          // end of while loop
      ?>
    </div>
      <!-- pagination -->
      <div class="pagination--styling">
        <?php
          echo paginate_links();
         ?>
      </div>
      <!-- end of pagination -->

    </div>

  </div>
  <!-- end of blog main wrapper -->


</div>
<!-- end of page-wrapper -->


<?php
  get_footer();
?>
