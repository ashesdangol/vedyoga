<?php
  get_header();
?>

<h1>Blog</h1>

  <?php
  the_post_thumbnail('thumbnail');
    while (have_posts()) {
      the_post();
      echo the_title();
  ?>
    <p><?php echo the_content() ?></p>


<?php
    }
  get_footer();
?>
