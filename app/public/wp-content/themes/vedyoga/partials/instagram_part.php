<section class="instagram side-paddings">
  <h2 class="header__title--one">Instagram</h2>
  <?php
     $instafeed = new WP_Query(array(
       'posts_per_page'=> 1,
       'post_type'=>'Instagram'
     ));
     while($instafeed->have_posts()){
       $instafeed->the_post();
       the_content();
     }
     wp_reset_postdata();
   ?>

</section>
