<div class="blog-card">
  <div class="blog-card__post-item">
    <div class="blog-card__date-thumbnail">

      <!-- the_post_thumbnail_url -->
      <picture class="blog-card__thumbnail">
        <source class="blog-card__image" media="(min-width:1020px)" srcset="<?php the_post_thumbnail_url('featuredImage__portrait--xl'); ?>" alt="Meditation Group Blog post">
        <source class="blog-card__image" media="(min-width:500px)" srcset="<?php the_post_thumbnail_url('featuredImage__portrait'); ?>" alt="Meditation Group Blog post">
        <img class="blog-card__image" src="<?php the_post_thumbnail_url('featuredImage__landscape'); ?>" alt="Meditation Group Blog post" />
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
