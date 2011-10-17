<?php

$content_width = 600;

add_action( 'after_setup_theme', 'infocards_setup' );

function infocards_setup(){
  remove_theme_support( 'post-formats' );
  add_theme_support( 'post-formats', array( 'link' ) );
}
?>