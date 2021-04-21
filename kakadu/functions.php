<?php

load_theme_textdomain( 'kakadu', get_template_directory() . '/languages' );

// ADDING CSS AND JS

function kakadu_setup(){
   
    wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), 'all');
    wp_enqueue_style('glider', 'https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css');
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;0,900;1,400;1,600;1,700;1,900&display=swap');
    wp_enqueue_style('andbank', get_theme_file_uri( '/css/andbank.css' ), NULL, microtime(), 'all');
    wp_enqueue_script('main', get_theme_file_uri( '/js/main.js' ), NULL, microtime(), true);
    
    
}

add_action( 'wp_enqueue_scripts', 'kakadu_setup');

// ADDING THEME SUPPORT

function kakadu_init() {
    add_theme_support( 'post-thumbnails');
    add_theme_support( 'title-tag');
    add_theme_support( 'html5',
    array('comment-list', 'comment-form', 'search-form')    
    );
}

add_action( 'after_setup_theme', 'kakadu_init');

//LOGO MARKUP

function kakadu_custom_logo_setup() {
 $defaults = array(
 'height'      => 50,
 'width'       => 104,
 'flex-height' => true,
 'flex-width'  => true,
 'header-text' => array( 'site-title', 'site-description' ),
'unlink-homepage-logo' => true, 
 );
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'kakadu_custom_logo_setup' );

// ADDING CUSTOM MENU

function kakadu_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' ),
      'footer-menu' => __( 'Footer Menu' )
     )
   );
 }
 add_action( 'init', 'kakadu_menus' );

function kakadu_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "&copy; " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}