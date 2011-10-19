<?php

$content_width = 600;

add_action( 'after_setup_theme', 'infocards_setup' );

function infocards_setup(){
  remove_theme_support( 'post-formats' );
  add_theme_support( 'post-formats', array( 'link' ) );
  add_filter('request', 'filter_request_for_subpages');
}


function filter_request_for_subpages($query_string){
  if (isset($query_string['pagename'])){
    $path_parts = explode('/',$query_string['pagename']);
    if (count($path_parts) > 1){
      $parent_name = $path_parts[0];
      $parent_id = getPageId($parent_name);
      $child_name = $path_parts[count($path_parts) -1];
      $child_id = getPageId($child_name);
      header('Location: '.get_permalink($parent_id).'#post-'.$child_id);
      die();
    }
  }
  return $query_string;
}

function getPageId($slug){
  $args=array(
    'name' => $slug,
    'post_type' => 'page',
    'post_status' => 'publish',
    'showposts' => 1,
    'caller_get_posts'=> 1
  );
  $my_posts = get_posts($args);
  if( $my_posts ) { $result = $my_posts[0]->ID; }
  return $result;
}

?>