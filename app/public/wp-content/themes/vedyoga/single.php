<?php
  get_header();
?>
  <?php
    while (have_posts()) {
      the_post();
      $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
  ?>

    <section class="single-page-wrapper">
      <p>texttttt</p>
    </section>




<?php
    }
  get_footer();
?>
