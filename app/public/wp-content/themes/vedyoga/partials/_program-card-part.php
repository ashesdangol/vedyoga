<?php
  $relatedPrograms = get_field('related_programs');

  if ( $relatedPrograms) {
    $relatedTypeName =  get_post_type();
    $relatedTypeName = ucwords($relatedTypeName);
    echo "<h2 class='heading__title header__title--one'>Related Programs with this ".$relatedTypeName."</h2>";
    echo "<ul>";
    foreach ($relatedPrograms as $program) {
?>
<li class="list__items">
  <div class="blog-card">
    <div class="blog-card__post-item">
      <div class="blog-card__date-thumbnail">
        <picture class="blog-card__thumbnail">
          <source class="blog-card__image" media="(min-width:1020px)" srcset="<?php echo get_the_post_thumbnail_url($program, 'featuredImage__portrait--xl'); ?>" alt="Meditation Group Available Programs">
          <source class="blog-card__image" media="(min-width:500px)" srcset="<?php echo get_the_post_thumbnail_url($program, 'featuredImage__portrait'); ?>" alt="Meditation Group Available Programs">
          <img class="blog-card__image" src="<?php echo get_the_post_thumbnail_url($program, 'featuredImage__landscape'); ?>" alt="Meditation Group Available Programs" />

          <!-- <source media="(max-width:500px)" srcset="<?php echo get_the_post_thumbnail_url($program, 'blog-card-img__Small') ?>">
          <img src="<?php echo get_the_post_thumbnail_url($program, 'blog-card-img__Medium') ?>" alt="" /> -->
        </picture>

      </div>
      <div class="blog-card__details">
        <div class="blog-card__title-auth-contents">
          <div class="blog-card__title">
             <a class="blog-card__title--fontstyle" href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a>
          </div>
          <div class="blog-card__contents">
            <?php
            $excerpt = $program->post_excerpt;
            $acfProgramId = $program->ID;

            if($excerpt){
                echo $excerpt;
              }else{
               echo wp_trim_words(get_field('main_body_content', $acfProgramId), 18);
              }

             ?>
            <p> <a class="conti-read--color arrow__pointForward" href="<?php echo get_the_permalink($program); ?>">Continue reading <i class="fa fa-long-arrow-right arrow__pointForward--hoverThis" aria-hidden="true"></i></a> </p>
          </div>
        </div>

      </div>

    </div>
  </div>


</li>
<?php
  }
    echo "</ul>";
  }
 ?>
