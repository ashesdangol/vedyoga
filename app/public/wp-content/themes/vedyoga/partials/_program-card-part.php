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
          <source media="(max-width:500px)" srcset="<?php echo get_the_post_thumbnail_url($program, 'blog-card-img__Small') ?>">
          <img src="<?php echo get_the_post_thumbnail_url($program, 'blog-card-img__Medium') ?>" alt="" />
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
            <p> <a class="conti-read--color" href="<?php the_permalink(); ?>">Continue reading <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </p>
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
