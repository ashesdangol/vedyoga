<?php
  function custom_post_types(){
    register_post_type('banner_slider', array(
      'capability_type' => 'banner_slider',
      'map_meta_cap'=>true,
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
      'capability_type' => 'instagram',
      'map_meta_cap'=>true,
      'public'=>true,
      'labels'=>array(
        'name'=> 'Instagram',
        'add_new_item' => 'Add Instagrams shortcode',
        'edit_item' => 'Edit Instagrams shortcode',
        'all_items' => 'Add/Edit Instagram',

      ),
      'menu_icon'=>'dashicons-slides'
    ));
    // Event post type
    register_post_type('event', array(
      'capability_type' => 'event',
      'map_meta_cap'=>true,
      'supports' => array('title', 'excerpt','post-thumbnails','title-tag','custom-fields','thumbnail'),
      'taxonomies' => array('category'),
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

    // Location post type Google map not working
    register_post_type('contact', array(
      'capability_type' => 'contact',
      'map_meta_cap'=>true,
      'supports' => array('title','editor', 'excerpt'),
      'rewrite' => array('slug' => 'contacts'),
      'has_archive' => true,
      'public'=>true,
      'labels'=>array(
        'name'=> 'Contact Us',
        'add_new_item' => 'Add Contact Us',
        'edit_item' => 'Edit Contact Us',
        'all_items' => 'Add/Edit Contact',
        'singular_name'=> 'contact'
      ),
      'menu_icon'=>'dashicons-location-alt'
    ));

    // Program post type
    register_post_type('program', array(
      'capability_type' => 'program',
      'map_meta_cap'=>true,
      'supports' => array('title','excerpt','post-thumbnails','thumbnail'),
      'taxonomies' => array('category'),
      'rewrite' => array('slug' => 'programs'),
      'has_archive' => true,
      'public'=>true,
      'labels'=>array(
        'name'=> 'Programs',
        'add_new_item' => 'Add New Program',
        'edit_item' => 'Edit Program',
        'all_items' => 'Add/Edit Programs',
        'singular_name'=> 'Program'
      ),
      'menu_icon'=>'dashicons-awards'
    ));

    // Instructor post type
    register_post_type('instructor', array(
      'capability_type' => 'instructor',
      'map_meta_cap'=>true,
      'supports' => array('title','excerpt','thumbnail','post-thumbnails'),
      'public'=>true,
      'labels'=>array(
        'name'=> 'Instructors',
        'add_new_item' => 'Add New Instructor',
        'edit_item' => 'Edit Instructor',
        'all_items' => 'Add/Edit Instructors',
        'singular_name'=> 'Instructor'
      ),
      'menu_icon'=>'dashicons-welcome-learn-more'
    ));


    // My notes post type
    register_post_type('note', array(
      'capability_type' => 'note',
      'map_meta_cap' => true,
      'show_in_rest' => true,
      'supports' => array('title','editor'),
      'public'=>false,
      'show_ui'=>true,
      'labels'=>array(
        'name'=> 'Notes',
        'add_new_item' => 'Add New Note',
        'edit_item' => 'Edit Note',
        'all_items' => 'Add/Edit Notes',
        'singular_name'=> 'Note'
      ),
      'menu_icon'=>'dashicons-welcome-write-blog'
    ));

    // Likes post type
    register_post_type('like', array(
      'supports' => array('title'),
      'public'=>false,
      'show_ui'=>true,
      'labels'=>array(
        'name'=> 'Likes',
        'add_new_item' => 'Add New Like',
        'edit_item' => 'Edit Like',
        'all_items' => 'All Likes',
        'singular_name'=> 'Like'
      ),
      'menu_icon'=>'dashicons-heart'
    ));

  }

  add_action('init', 'custom_post_types');
  add_post_type_support( 'themes', 'thumbnail' );

 ?>
