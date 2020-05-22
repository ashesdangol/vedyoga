<?php
  get_header();
?>

<div class="page-wrapper blog-page-wrapper">
  <div class="page-banner blog-page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/img/8.jpg') ?>);"></div>
    <div class="page-banner__content side-paddings--double">
      <h1 class="page-banner__title">Blog</h1>
      <div class="page-banner__intro">
        <p>What's in their mind?</p>
      </div>
    </div>
  </div>


  <?php
    while (have_posts()) {
      the_post();
  ?>
  <div class="page-section metabox--relative side-paddings--double">
    <div class="post-item">
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div class="metabox">
        <p>Posted by <?php  the_author_posts_link(); ?> on <?php the_time('d M'); ?> in <?php echo get_the_category_list(' , '); ?></p>
      </div>
      <div class="generic-content">
        <?php the_excerpt(); ?>
        <p> <a href="<?php the_permalink(); ?>">Continue reading &raquo;</a> </p>
      </div>
    </div>
  </div>


<?php
    }
?>
</div>
<div class="side-paddings--double">
  <?php
    echo paginate_links();
   ?>
</div>
<?php
  get_footer();
?>
