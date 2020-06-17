<div class="blog-card">
  <div class="blog-card__post-item">
    <div class="blog-card__date-thumbnail">

      <!-- the_post_thumbnail_url -->
      <picture class="blog-card__thumbnail">
          <source media="(min-width:1024px)" srcset="<?php the_post_thumbnail_url('full') ?>">
        <source media="(min-width:768px)" srcset="<?php the_post_thumbnail_url('medium') ?>">
        <img src="<?php the_post_thumbnail_url('thumbnail') ?>" alt="" />
      </picture>

    </div>
    <div class="blog-card__details">
      <div class="blog-card__title-auth-contents">
        <div class="blog-card__title">
           <a class="blog-card__title--fontstyle" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </div>

      </div>
    </div>

  </div>
</div>
