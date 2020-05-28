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
  }
  add_action('init', 'custom_post_types');
 ?>
