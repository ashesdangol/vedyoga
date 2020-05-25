<?php
  get_header();
?>

<div class="page-wrapper blog-page-wrapper">
  <div class="page-banner blog-page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/img/7.jpg') ?>);"></div>
    <div class="page-banner__content side-paddings">
      <h1 class="page-banner__title mobile-page-banner__title--smFont">
        <?php
          the_archive_title();
        ?>
      </h1>
      <div class="page-banner__intro mobile-page-banner__intro--smFont">
        <p><?php the_archive_description(); ?></p>
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
      <!-- pagination -->
      <div class="pagination--styling">
        <?php
          echo paginate_links();
         ?>
      </div>
      <!-- end of pagination -->
    </div>
    <!-- en d of blof section -->
    <div class="blog-right-navigation side-paddings">
     <div class="blog-right-navigation--wrapper">
       <div class="blog-right-navigation-searchbox">
         <div class="blog-searchbox blog-boxes">
           <p>searchbox</p>
         </div>
       </div>
       <div class="blog-right-navigation-categories ">
         <div class="blog-categorybox blog-boxes">
           <?php include('partials/categories_list.php'); ?>
         </div>

       </div>
       <div class="blog-right-navigation-popular-article">
         <div class="blog-articlebox blog-boxes">
           <p>popular articles</p>
         </div>

       </div>

     </div>
    </div>
  </div>
  <!-- end of blog main wrapper -->


</div>
<!-- end of page-wrapper -->


<?php
  get_footer();
?>
