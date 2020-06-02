<?php

  function medi_files(){
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
  }
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
 ?>
