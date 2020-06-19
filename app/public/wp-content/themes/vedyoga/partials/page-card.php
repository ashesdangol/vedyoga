<div class="blog-card">
  <div class="blog-card__post-item">
    <div class="blog-card__details">
      <div class="blog-card__title-auth-contents">
        <div class="blog-card__title">
           <a class="blog-card__title--fontstyle" href="${item.permalink}"><?php the_title() ?></a>
        </div>
        <div class="blog-card__contents">
          <?php
          if(has_excerpt()){
              echo  get_the_excerpt();
            }else{
             echo wp_trim_words(get_the_content(), 18);
            }

           ?>
        <p> <a class="conti-read--color arrow__pointForward" href="<?php the_permalink(); ?>">Read <i class="fa fa-long-arrow-right arrow__pointForward--hoverThis" aria-hidden="true"></i></a> </p>
        </div>
      </div>
    </div>
  </div>
</div>
