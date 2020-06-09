<?php
add_action('rest_api_init','registerSearch');

function registerSearch(){
  // namespace , route-ending part of the link, array describe what should happen
  register_rest_route('yoga/v1','search',array(
    // methods is crud\
    // WP_REST_SERVER::READABLE IS GET METHOD
    'methods'=>WP_REST_SERVER::READABLE,
    'callback'=>'registerSearchResults'
  ));

}

function registerSearchResults($data){
  $mainQuery =new WP_Query(array(
    'post_type' => array('event','program','shop','page','post','contact'),
    's' => sanitize_text_field($data['term'])
  ));

  $mainResults = array(
    'generalInfo' => array(),
    'programs' => array(),
    'events' => array(),
    'shop' => array(),
    'contact' => array()


  );

  while ($mainQuery->have_posts()) {
    $mainQuery->the_post();

    if(get_post_type() == 'post' OR get_post_type() == 'page'){
      array_push($mainResults['generalInfo'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'subtitle' => get_field('page_banner_subtitle')
      ));
    }
    if(get_post_type() == 'program'){
      array_push($mainResults['programs'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'subtitle' => get_field('page_banner_subtitle')
      ));
    }
    if(get_post_type() == 'event'){
      array_push($mainResults['events'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'subtitle' => get_field('page_banner_subtitle')
      ));
    }
    if(get_post_type() == 'shop'){
      array_push($mainResults['shop'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'subtitle' => get_field('page_banner_subtitle')
      ));
    }
    if(get_post_type() == 'contact'){
      array_push($mainResults['contact'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'subtitle' => get_field('page_banner_subtitle')
      ));
    }

  }
  return $mainResults;
  // $mainQuery =new WP_Query(array(
  //   'post_type'=>'program',
  //   's'=>sanitize_text_field($data['term'])
  // ));

  // while ($mainQuery->have_posts()) {
  //   $mainQuery->the_post();
  //   return "helo"
  //
  // }


}



 ?>
