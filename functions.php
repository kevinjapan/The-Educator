<?php

// to do : replace screenshot.png


if ( ! function_exists('te_theme_setup') ) {
	// theme defaults and support for WordPress features.
   function te_theme_setup() {
      add_theme_support('menus');
      add_theme_support('post-thumbnails');
      add_theme_support('custom-logo');
      add_theme_support('widgets');
   }
}
add_action( 'after_setup_theme', 'te_theme_setup' );



function te_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'te_custom_excerpt_length', 999 );



// Set the main WordPress query to include our custom post types
//
// The type of posts you include will influence the template hierarchy selection.
// There are three conflicting requirements in our case:
// 1. agricultural school - taxonomy-te_school.php - has no sub-schools
//    we want courses on the top level school - but only works if we enable pre_get_posts with 'te_course'
// 2. all courses
//    defaults to 'archive.php' if we have 'post' enabled and we have 'posts' mixed in with our 'courses'
//    exclude 'post' and it resolves to archive-te_course.php correctly.
// 3. news category
//    requires 'post' in the $query->set() call or shows nothing.
//
// we have a working solution (see below) but this needs further reading!
// note - we need 'page' to make homepage work.
//
function te_enable_query_post_types( $query ) {

   // enable 'te_course' custom post type in results *if* we are not accessing a 'te_course' archive page,
   // otherwise let that custom post type archive page handle it's own business.
   if ($query->is_main_query() && !is_admin() && !$query->is_post_type_archive('te_course') && !$query->is_post_type_archive('te_job') ) {
      $query->set( 'post_type', array('te_course','post','page','te_job' ) );
   }

   // Order courses by title
   if($query->is_post_type_archive('te_course')) {
      $query->set( 'orderby', 'post_title' );
      $query->set( 'order', 'ASC');
   }

}
add_action( 'pre_get_posts', 'te_enable_query_post_types' );


function te_load_stylesheets() {
   wp_register_style('outline',get_template_directory_uri() . '/css/outline.css',array(),1,'all');
   wp_enqueue_style('outline');
   wp_register_style('outline_custom_props',get_template_directory_uri() . '/css/outline-custom-props.css',array(),1,'all');
   wp_enqueue_style('outline_custom_props');
   wp_register_style('outline_layouts',get_template_directory_uri() . '/css/outline-layouts.css',array(),1,'all');
   wp_enqueue_style('outline_layouts');
   wp_register_style('outline_utilities',get_template_directory_uri() . '/css/outline-utilities.css',array(),1,'all');
   wp_enqueue_style('outline_utilities');
   wp_register_style('te_stylesheet',get_template_directory_uri() . '/css/the-educator.css',array(),1,'all');
   wp_enqueue_style('te_stylesheet');
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



/* 
 * widget sidebars
 */
function te_sidebars_init() {
   register_sidebar(
      array(
         'name' => esc_html__('Page Sidebar','the-educator'),
			'description' => esc_html__( 'Add widgets here to appear alongside your pages.', 'the-educator' ),
         'id' => 'page-sidebar',
         'before_widget' => '<div class="site_sidebar">',
         'after_widget' => '</div>',
         'before_title' => '<h4 class="">',
         'after_title' => '</h4>'
      )
   );
   register_sidebar(
      array(
         'name' => esc_html__('Post Sidebar','the-educator'),
			'description' => esc_html__( 'Add widgets here to appear alongside your posts.', 'the-educator' ),
         'id' => 'post-sidebar',
         'before_widget' => '<div class="site_sidebar">',
         'after_widget' => '</div>',
         'before_title' => '<h4 class="">',
         'after_title' => '</h4>'
      )
   );
   register_sidebar(
      array(
         'name' => esc_html__('Footer Sidebar','the-educator'),
			'description' => esc_html__( 'Add widgets here to appear in your footer.', 'the-educator' ),
         'id' => 'footer-sidebar',
         'before_title' => '<h4 class="footer_widget_title">',
         'after_title' => '</h4>'
      )
   );
}
add_action( 'widgets_init', 'te_sidebars_init' );




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

