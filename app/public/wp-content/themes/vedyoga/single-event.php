<?php
  get_header();
?>
  <?php
    $eventDate = new DateTime(get_field('event_date'));
    while (have_posts()) {
      the_post();
      // $featuredImage = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );

  ?>
  <div class="page-wrapper blog-page-wrapper">
    <!-- the banner -->
    <?php
      pageBanner(array(
        'title'=> $eventDate->format('d M Y'),
        'subtitle' => $eventDate->format('g:i a')
      ));
     ?>
    <!-- the contents -->
    <div class="single-blog-main-wrapper layoutType">
      <div class="blog-section metabox--relative layoutType--col-8 yesPadding--all">
        <div class="metabox metabox--position-up metabox--with-home-link">
          <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Events Home</a>
            <span class="metabox__main"><?php the_title(); ?></span>
          </p>
        </div>
        <div class="blog-generic-contents">
          <h2><?php echo the_title(); ?></h2>
           <?php echo the_field('main_body_content'); ?>
        </div>
        <div class="blog-category-type">
          <p>Category : <span><?php echo get_the_category_list(' ,'); ?></span></p>
        </div>
        <div class="blog__link blog__link-program">
          <?php get_template_part('partials/_program-card-part') ?>
        </div>
      </div>
      <div class="layoutType--col-4 yesPadding--med-lg margin-top--all">
       <div class="blog-right-navigation--wrapper">
         <?php get_template_part('partials/blog-search-category_part') ?>
       </div>
      </div>
    </div>
  </div>



<?php
    }
  get_footer();
?>
