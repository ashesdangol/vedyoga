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
    'post_type' => array('event','program','instructor','shop','page','post','contact'),
    's' => sanitize_text_field($data['term'])
  ));

  $mainResults = array(
    'generalInfo' => array(),
    'programs' => array(),
    'instructors' => array(),
    'events' => array(),
    'shop' => array(),
    'contact' => array()


  );
// General Query
  while ($mainQuery->have_posts()) {
    $mainQuery->the_post();
    if(get_post_type() == 'post' OR get_post_type() == 'page'){
      array_push($mainResults['generalInfo'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'postType' => get_post_type(),
        'subtitle' => get_field('page_banner_subtitle'),
        'authorName' =>get_the_author(),
        'authorLink' => get_the_author_posts_link(),
        'postFeaturedImage__Med'=>get_the_post_thumbnail_url(0,'featuredImage__portrait--xl'),
        'postFeaturedImage__Sm'=>get_the_post_thumbnail_url(0,'featuredImage__portrait'),
        'excerpt'=>get_the_excerpt(),
        'trimWords'=> wp_trim_words(get_the_content(), 2),
        'pageWords'=>  wp_trim_words(get_the_content(), 10),
        'postDate' => get_the_time('d M')


      ));
    }
    if(get_post_type() == 'program'){
      array_push($mainResults['programs'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'postType' => get_post_type(),
        'subtitle' => get_field('page_banner_subtitle'),
        'authorName' =>get_the_author(),
        'authorLink' => get_the_author_posts_link(),
        'postFeaturedImage__Med'=>get_the_post_thumbnail_url(0,'featuredImage__portrait--xl'),
        'postFeaturedImage__Sm'=>get_the_post_thumbnail_url(0,'featuredImage__portrait'),
        'excerpt'=>get_the_excerpt(),
        'trimWords'=> wp_trim_words(get_the_content(), 2),
        'pageWords'=>  wp_trim_words(get_the_content(), 10),
        'id'=> get_the_ID()

      ));
    }
    if(get_post_type() == 'instructor'){
      array_push($mainResults['instructors'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'postType' => get_post_type(),
        'postFeaturedImage__Med'=>get_the_post_thumbnail_url(0,'featuredImage__portrait--xl'),
        'postFeaturedImage__Sm'=>get_the_post_thumbnail_url(0,'featuredImage__portrait'),
      ));
    }
    if(get_post_type() == 'event'){
      if(has_excerpt()){
        $excerpt = get_the_excerpt();
      }
      else{
          // $excerpt = get_the_field('main_body_content');
          $excerpt = wp_trim_words(get_field('main_body_content'), 5);
      }
      $eventDate = new DateTime(get_field('event_date'));
      array_push($mainResults['events'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'postType' => get_post_type(),
        'authorLink' => get_the_author_posts_link(),
        'postFeaturedImage__Med'=>get_the_post_thumbnail_url(0,'featuredImage__portrait--xl'),
        'postFeaturedImage__Sm'=>get_the_post_thumbnail_url(0,'featuredImage__portrait'),
        // 'excerpt'=>get_the_excerpt(),
        'trimWords'=>$excerpt,
        'month'=>$eventDate->format('M'),
        'eventDate' => $eventDate->format('d M Y')
      ));
    }
    if(get_post_type() == 'shop'){
      array_push($mainResults['shop'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'postType' => get_post_type(),
        'subtitle' => get_field('page_banner_subtitle'),
        'authorName' =>get_the_author(),
        'authorLink' => get_the_author_posts_link(),
        'postFeaturedImage__Med'=>get_the_post_thumbnail_url(0,'featuredImage__portrait--xl'),
        'postFeaturedImage__Sm'=>get_the_post_thumbnail_url(0,'featuredImage__portrait'),
        'excerpt'=>get_the_excerpt(),
        'trimWords'=> wp_trim_words(get_the_content(), 2),
        'pageWords'=>  wp_trim_words(get_the_content(), 10)
      ));
    }
    if(get_post_type() == 'contact'){
      array_push($mainResults['contact'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'postType' => get_post_type(),
        'subtitle' => get_field('page_banner_subtitle'),
        'authorName' =>get_the_author(),
        'authorLink' => get_the_author_posts_link(),
        'postFeaturedImage__Med'=>get_the_post_thumbnail_url(0,'featuredImage__portrait--xl'),
        'postFeaturedImage__Sm'=>get_the_post_thumbnail_url(0,'featuredImage__portrait'),
        'excerpt'=>get_the_excerpt(),
        'trimWords'=> wp_trim_words(get_the_content(), 2),
        'pageWords'=>  wp_trim_words(get_the_content(), 10)
      ));
    }
  }

// Relation Query
  if ($mainResults['programs']) {
    $programsMetaQuery = array('relation'=>'OR');
    foreach ($mainResults['programs'] as $item) {
      array_push($programsMetaQuery,   array(
          'key'=>'related_programs',
          'compare'=> 'LIKE',
          'value'=> '"'.$item['id'].'"'
        ));
    }
    $programRelationshipQuery = new WP_Query(array(
        'post_type'=>array('event','instructor'),
        'meta_query'=>$programsMetaQuery
    ));
    while ($programRelationshipQuery->have_posts()) {
      $programRelationshipQuery->the_post();
      if(get_post_type() == 'event'){
        if(has_excerpt()){
          $excerpt = get_the_excerpt();
        }
        else{
            $excerpt = wp_trim_words(get_field('main_body_content'), 5);
        }
        $eventDate = new DateTime(get_field('event_date'));
        array_push($mainResults['events'], array(
          'title' => get_the_title(),
          'permalink' => get_the_permalink(),
          'postType' => get_post_type(),
          'authorLink' => get_the_author_posts_link(),
          'postFeaturedImage__Med'=>get_the_post_thumbnail_url(0,'featuredImage__portrait--xl'),
          'postFeaturedImage__Sm'=>get_the_post_thumbnail_url(0,'featuredImage__portrait'),
          'trimWords'=>$excerpt,
          'month'=>$eventDate->format('M'),
          'eventDate' => $eventDate->format('d M Y')
        ));
      }
      if(get_post_type() == 'instructor'){
        array_push($mainResults['instructors'], array(
          'title' => get_the_title(),
          'permalink' => get_the_permalink(),
          'postType' => get_post_type(),
          'postFeaturedImage__Med'=>get_the_post_thumbnail_url(0,'featuredImage__portrait--xl'),
          'postFeaturedImage__Sm'=>get_the_post_thumbnail_url(0,'featuredImage__portrait'),
        ));
      }
    }
    $mainResults['instructors'] = array_values(array_unique($mainResults['instructors'], SORT_REGULAR));
    $mainResults['programs'] = array_values(array_unique($mainResults['programs'], SORT_REGULAR));
  }

  return $mainResults;


}



 ?>
