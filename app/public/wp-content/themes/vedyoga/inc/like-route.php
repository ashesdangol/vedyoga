<?php

add_action('rest_api_init', 'yogaLikeRoutes');

function yogaLikeRoutes(){
  register_rest_route('yoga/v1','manageLike', array(
    'methods' => 'POST',
    'callback' => 'createLike'
  ));

  register_rest_route('yoga/v1','manageLike', array(
    'methods' => 'DELETE',
    'callback' => 'deleteLike'
  ));

}

function createLike($data){
  if (is_user_logged_in()) {
    $instructor = sanitize_text_field($data['instructorId']);
    $existQuery = new WP_Query(array(
      'author'=>get_current_user_id(),
      'post_type' => 'like',
      'meta_query' => array(
        array(
          'key'=>'liked_instructor_id',
          'compare'=>'=',
          'value'=>$instructor
        )
      )
    ));
    if($existQuery->found_posts == 0 AND get_post_type($instructor) == 'instructor'){
      // create new like post
      return wp_insert_post(array(
        'post_type' => 'like',
        'post_status'=>'publish',
        'post_title' => 'our 2ndstd php test post',
        'meta_input' => array(
          'liked_instructor_id'=>$instructor
        )

      ));
    }else{
      die('Invalid instructor id');
    }
  }else{
    die("Only logged in users can create a like.");
  }

}
function deleteLike($data){
  $likeId = sanitize_text_field($data['like']);
  if(get_current_user_id() == get_post_field('post_author', $likeId) AND get_post_type($likeId) == 'like'){
    wp_delete_post($likeId, true);
    return 'Congrats like deleted';
  }else{
    die("You are not authorized to delete this.");
  }
}

 ?>
