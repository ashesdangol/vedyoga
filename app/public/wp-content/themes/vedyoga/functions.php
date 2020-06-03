<?php
  function pageBanner($args = NULL){
    if (!$args['title']) {
      $args['title']=get_the_title();
    }
    if (!$args['subtitle']) {
      $args['subtitle']=get_field('page_banner_subtitle');
    }
    if (!$args['photo']) {
      if (get_field('page_banner_background_image')) {
        $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
      }else{
        $args['photo'] = get_theme_file_uri('/img/9.png');
      }
    }
?>
  <div class="page-banner blog-page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo'] ?>);"></div>
    <div class="page-banner__content side-paddings">
      <h1 class="page-banner__title mobile-page-banner__title--smFont"><?php echo $args['title']; ?></h1>
      <div class="page-banner__intro mobile-page-banner__intro--smFont">
        <p><?php echo $args['subtitle']; ?></p>
      </div>
    </div>
  </div>
<?php
  }

  function medi_files(){
     // for google map
    // wp_enqueue_script('googleMap', '//maps.google.apis.com/maps/api/js/key=youkeyhere', NULL, "1.0", true);
    wp_enqueue_script('b_jq', '//code.jquery.com/jquery-3.2.1.slim.min.js', NULL, "1.0", true);
    wp_enqueue_script('slick_js', get_theme_file_uri('/js/slick.js'), NULL, "1.0", true);
    wp_enqueue_script('load_custom_js', get_theme_file_uri('/js/custom.js'), NULL, "1.0", true);
    // wp_enqueue_script('b_ajaz', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', NULL, "1.0", true);
    // wp_enqueue_script('b_bmin', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', NULL, "1.0", true);
    // wp_enqueue_style('medi_b_styles','//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_enqueue_style('b_font_awes','//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('google_font','//fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;900&display=swap');
    wp_enqueue_style('slick_css',get_theme_file_uri('/css/slick.css'), NULL, microtime());
    wp_enqueue_style('medi_main_styles',get_stylesheet_uri(), NULL, microtime());
  }
  add_action('wp_enqueue_scripts','medi_files');

  function my_features(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('blog-card-img__Small',100,150,true);
    add_image_size('blog-card-img__Medium',200,200,true);
    add_image_size('pageBanner', 1500, 400, true);
  };
  add_action('after_setup_theme', 'my_features');

  function adjust_queries_for_customPost($query){
    if (!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {
      $query -> set('orderby','title');
      $query -> set('order','ASC');
      $query -> set('posts_per_page',-1);
    }

    if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
      $today = date('Ymd');
      $query -> set('meta_key','event_date');
      $query -> set('orderby','meta_value');
      $query -> set('order','ASC');
      $query -> set('meta_query', array(
        array(
          'key' => 'event_date',
          'compare' =>'>=',
          'value' => $today,
          'type' => 'date'
        )
      ));
    }
  }

  add_action('pre_get_posts', 'adjust_queries_for_customPost');
  //function for google map
  // function findusMapKey($api){
  //   $api['key'] = 'googleApikeyNeedsPaymentNow';
  //   return $api;
  // }
  //
  // add_filter('acf/fields/google_map/api', 'findusMapKey')
 ?>
