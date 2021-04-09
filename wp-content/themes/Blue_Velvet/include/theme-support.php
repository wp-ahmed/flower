<?php

//======================================================//
//Theme support
//======================================================//

add_theme_support("post-thumbnails");
add_theme_support("custom-header");
add_theme_support("custom-background");
add_theme_support("html5",array('search-form','comment-form','comment-list'));


//======================================================//
//Woocommerce Support
//======================================================//

add_action('after_setup_theme','blue_woocommerce_support');


function blue_woocommerce_support(){
    add_theme_support( 'woocommerce' );
}

//======================================================//
//Sidebar Activation
//======================================================//

function blue_activate_sidebar(){
    $args = array(
      'name'           => 'shop',
      'id'             => 'iatd-sidebar',
      'description'    => 'shop',
      'before_widget'  => '<aside class="side">',
      'after_widget'   => '</aside>',
      'before_title'   => '<h3 class="title-sidebar">',
      'after_title'    =>  '</h3>'
    );
    
    register_sidebar($args);
}

add_action('widgets_init','blue_activate_sidebar');

// add_theme_support( 'wc-product-gallery-zoom' );

add_theme_support( 'wc-product-gallery-slider');