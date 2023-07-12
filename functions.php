<?php

// to do : replace screenshot.png

// to do : nav - multiple level menus w/ md/lg dropdown.

// to do : build plugin as a single plugin loading all custom post types etc.
//         research - complex plugin build.
//         create a single one first to get started..


if ( ! function_exists('te_theme_setup') ) {
	// theme defaults and support for WordPress features.
   function te_theme_setup() {
      add_theme_support('menus');
      add_theme_support('post-thumbnails');
      add_theme_support('custom-logo');
   }
}
add_action( 'after_setup_theme', 'te_theme_setup' );


// Set the main WordPress query to include our custom post types instead of only the default 'post' post type.
function te_enable_query_post_types( $query ) {
   if ($query->is_main_query() && !is_admin()) {
      $query->set( 'post_type', array( 'page','post','te_course' ) );
   }
}
add_action( 'pre_get_posts', 'te_enable_query_post_types' );


function te_load_stylesheets() {
   wp_register_style('te_stylesheet',get_template_directory_uri() . '/css/the-educator.css',array(),1,'all');
   wp_enqueue_style('te_stylesheet');
   wp_register_style('outline',get_template_directory_uri() . '/css/outline.css',array(),1,'all');
   wp_enqueue_style('outline');
   wp_register_style('outline_custom_props',get_template_directory_uri() . '/css/outline-custom-props.css',array(),1,'all');
   wp_enqueue_style('outline_custom_props');
   wp_register_style('outline_layouts',get_template_directory_uri() . '/css/outline-layouts.css',array(),1,'all');
   wp_enqueue_style('outline_layouts');
   wp_register_style('outline_utilities',get_template_directory_uri() . '/css/outline-utilities.css',array(),1,'all');
   wp_enqueue_style('outline_utilities');
}
add_action('wp_enqueue_scripts','te_load_stylesheets');


function te_load_jquery() {
   wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts','te_load_jquery');


function te_load_scripts() {
   wp_register_script('outlinecss_behaviour',get_template_directory_uri() . '/js/outlinecss_behaviour.js','',1,true);
   wp_enqueue_script('outlinecss_behaviour');
}
add_action('wp_enqueue_scripts','te_load_scripts');


// menu location
register_nav_menus(
   array(
      'top-menu' => __('Top Menu','theme'),
      'footer-menu' => __('Footer Menu','theme')
   )
);

// configure all uploaded images
add_image_size('cover',1920,600,true);
add_image_size('large',1200,630,true);
add_image_size('medium',600,305,true);
add_image_size('small',200,200,true);


require_once get_template_directory() . '/inc/te-block-patterns.php';

// add theme patterns to customizer - must be included last
require_once get_template_directory() . '/inc/te-customize-theme.php';
require_once get_template_directory() . '/inc/te-customize-patterns.php';


//
// enable live preview on customizer screen
//
function te_customizer_live_preview() {
	wp_enqueue_script( 
		  'te-themecustomizer',
		  get_template_directory_uri().'/js/te-customize.js',
		  array( 'jquery','customize-preview' ),
		  '',
		  true
	);
}
add_action( 'customize_preview_init', 'te_customizer_live_preview' );

