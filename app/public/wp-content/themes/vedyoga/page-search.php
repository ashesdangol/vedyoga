<?php
  get_header();

    while (have_posts()) {
      the_post();
?>
    <div class="page-wrapper ">
      <!-- Page Banner -->
      <?php
        pageBanner();
       ?>
      <div class="page-section  page-section--beige">
        <div class="side-paddings--double generic-content">
          <form class="" action="<?php echo esc_url(site_url('/')); ?>" method="get">
            <input type="search" name="s" value="">
            <input type="submit" name="" value="Search">
          </form>
        </div>

       </div>

    </div>

  <?php
    }
  get_footer();
?>
