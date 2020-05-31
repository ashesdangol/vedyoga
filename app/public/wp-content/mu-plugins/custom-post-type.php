<?php
  function custom_post_types(){
    register_post_type('banner_slider', array(
      'public'=>true,
      'labels'=>array(
        'name'=> 'Sliders',
        'add_new_item' => 'Add Images',
        'edit_item' => 'Edit Images',
        'all_items' => 'Add/Edit Slider',
        'singular_name'=> 'Slider'

      ),
      'menu_icon'=>'dashicons-slides'
    ));
    register_post_type('instagram', array(
      'public'=>true,
      'labels'=>array(
        'name'=> 'Instagram',
        'add_new_item' => 'Add Instagrams shortcode',
        'edit_item' => 'Edit Instagrams shortcode',
        'all_items' => 'Add/Edit Instagram',

      ),
      'menu_icon'=>'dashicons-slides'
    ));
    register_post_type('event', array(
      'supports' => array('title','editor', 'excerpt','post-thumbnails','title-tag','custom-fields'),
      'rewrite' => array('slug' => 'events'),
      'has_archive' => true,
      'public'=>true,
      'labels'=>array(
        'name'=> 'Events',
        'add_new_item' => 'Add Event',
        'edit_item' => 'Edit Event',
        'all_items' => 'Add/Edit Events',
        'singular_name'=> 'event'
      ),
      'menu_icon'=>'dashicons-calendar'
    ));
  }
  add_action('init', 'custom_post_types');
 ?>
