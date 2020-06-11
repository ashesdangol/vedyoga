<?php
  get_header();
?>

<div class="page-wrapper blog-page-wrapper">
  <!-- PageBanner -->
  <?php
  $image=get_field('page_banner_background_image', 23);
    pageBanner(array(
        'title'=> 'Search Results',
        'subtitle'=>'You Searched for &ldquo;'.esc_html(get_search_query(false)).'&rdquo;',
        'photo'=>$image['sizes']['pageBanner']
    ));

   ?>


  <div class="blog-main-wrapper side-paddings">
    <div class="blog-section">
      <?php
      if (have_posts()) {
        while (have_posts()) {
          the_post();
          get_template_part('search-template-parts/content',get_post_type());
          }
          echo '<div class="pagination--styling">';
          echo paginate_links();
          echo '</div>';
      }else{
        echo "<h2 class='header__title--one'>No results match that search</h2>";
      }

      ?>
      <!-- pagination -->

      <!-- end of pagination -->
    </div>
    <!-- en d of blof section -->

  </div>
  <!-- end of blog main wrapper -->


</div>
<!-- end of page-wrapper -->


<?php
  get_footer();
?>
