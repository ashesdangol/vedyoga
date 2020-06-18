<div class="blog-card">
  <div class="blog-card__post-item">
    <div class="blog-card__date-thumbnail">
      <div class="blog-card__date">
        <?php the_time('d') ?> <?php the_time('M'); ?>
      </div>

      <picture class="blog-card__thumbnail">
        <source class="blog-card__image" media="(min-width:1020px)" srcset="<?php the_post_thumbnail_url('featuredImage__portrait--xl'); ?>" alt="Meditation Group Blog post">
        <source class="blog-card__image" media="(min-width:500px)" srcset="<?php the_post_thumbnail_url('featuredImage__portrait'); ?>" alt="Meditation Group Blog post">
        <img class="blog-card__image" src="<?php the_post_thumbnail_url('featuredImage__landscape'); ?>" alt="Meditation Group Blog post" />
      </picture>

    </div>
    <div class="blog-card__details card__details">
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
          <p> <a class="conti-read--color arrow__pointForward" href="<?php the_permalink(); ?>">Continue reading <i class="fa fa-long-arrow-right arrow__pointForward--hoverThis" aria-hidden="true"></i></a> </p>
        </div>
      </div>
    </div>
  </div>
</div>
