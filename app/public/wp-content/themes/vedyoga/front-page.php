<?php
  get_header();
?>
<section class="video-banner__wrapper">
  <div class="video-banner__bg">
    <video autoplay="" loop="" muted="" poster="<?php echo get_theme_file_uri('img/1.jpg'); ?>">
      <source src="<?php echo get_theme_file_uri('video/video.mp4') ?>" type="video/mp4">
      <source src="<?php echo get_theme_file_uri('video/video.webm') ?>" type="video/webm">
    </video>
  </div>
  <div class="video-banner__contents video-banner__contents--centered">
    <h1 class="video-banner__title">Welcome to VedYoga, We will help you to find inner peace.</h1>
    <div class="video-banner__search-box">

    </div>
  </div>

</section>

<?php
  get_footer();
?>
