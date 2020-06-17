<div class="blog-card">
  <div class="blog-card__post-item">
    <div class="blog-card__date-thumbnail">
      <div class="blog-card__date">
      <?php
      $eventDate = new DateTime(get_field('event_date'));
      echo $eventDate->format('d M Y');
       ?>

      </div>
      <!-- the_post_thumbnail_url -->
      <picture class="blog-card__thumbnail">
        <source media="(max-width:500px)" srcset="<?php the_post_thumbnail_url('large') ?>">
        <img src="<?php the_post_thumbnail_url('blog-card-img__Medium') ?>" alt="" />
      </picture>

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
              echo wp_trim_words(get_field('main_body_content'), 18);

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
