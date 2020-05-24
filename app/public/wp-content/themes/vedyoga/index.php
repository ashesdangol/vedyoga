<?php
  get_header();
?>

<div class="page-wrapper blog-page-wrapper">
  <div class="page-banner blog-page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/img/8.jpg') ?>);"></div>
    <div class="page-banner__content side-paddings--double">
      <h1 class="page-banner__title">Blog</h1>
      <div class="page-banner__intro">
        <p>What's in your mind?</p>
      </div>
    </div>
  </div>

  <div class="blog-main-wrapper side-paddings">
    <div class="blog-section">
      <?php
        while (have_posts()) {
          the_post();
      ?>
      <div class="blog-card card-1">
        <div class="post-item">
          <div class="blog-date-feature-thumbnail--wrapper">
            <div class="blog-date">
              <h4><?php the_time('d') ?><br><?php the_time('M'); ?></h4>
            </div>
            <div class="blog-feature-thumbnail">
              <?php
                if (get_the_post_thumbnail()) {
                  the_post_thumbnail();
                }else{
                  echo "<br><br><br>";
                }
              ?>

            </div>

          </div>
          <div class="blog-details-wrapper">
            <div class="blog-title-auth-content-wrapper">
              <div class="blog-title">
                 <a class="blog-title--fontstyle" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </div>
              <div class="blog-auth">
                <?php  the_author_posts_link(); ?>
              </div>
              <div class="blog-content">
                <?php
                if(has_excerpt()){
                  	echo  get_the_excerpt();
                  }else{
                   echo wp_trim_words(get_the_content(), 18);
                  }

                 ?>
                <p> <a class="conti-read--color" href="<?php the_permalink(); ?>">Continue reading <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </p>
              </div>
            </div>
            <!-- <div class="blog-category metabox">
              <p>Category:</p>
              <?php echo get_the_category_list(' , '); ?>
            </div> -->
          </div>

        </div>
      </div>
      <?php
          }
          // end of while loop
      ?>
    </div>
    <!-- en d of blof section -->
    <div class="blog-right-navigation side-paddings">
      test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1 test 1   test 1
    </div>
  </div>
  <!-- end of blog main wrapper -->


</div>
<!-- end of page-wrapper -->
<div class="">
  tester tester tester tester tester testertester tester tester
  tester tester tester tester tester testertester tester tester
  tester tester tester tester tester testertester tester tester
  tester tester tester tester tester testertester tester tester
  tester tester tester tester tester testertester tester tester

</div>
<div class="side-paddings--double">
  <?php
    echo paginate_links();
   ?>
</div>
<?php
  get_footer();
?>
