<?php
  get_header();
?>

<h1>this is single page</h1>

  <?php
    while (have_posts()) {
      the_post();
      echo the_title();
  ?>
    <p><?php echo the_content() ?></p>


<?php
    }
  get_footer();
?>
