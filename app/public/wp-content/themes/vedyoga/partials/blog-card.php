<div class="blog-card">
  <div class="blog-card__post-item">
    <div class="blog-card__date-thumbnail">
      <div class="blog-card__date">
      <?php the_time('d') ?> <?php the_time('M'); ?>
      </div>
      <div class="blog-card__thumbnail">
        <?php
          if (get_the_post_thumbnail()) {
            the_post_thumbnail();
          }else{
            echo "<br><br><br>";
          }
        ?>

      </div>

    </div>
    <div class="blog-card__details">
      <div class="blog-card__title-auth-contents">
        <div class="blog-card__title">
           <a class="blog-card__title--fontstyle" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </div>
        <div class="blog-card__auth">
          <?php  echo "Posted by "; the_author_posts_link(); ?>
        </div>
        <div class="blog-card__contents">
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
