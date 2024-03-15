<?php
require_once get_template_directory() . '/inc/te-sanitize.php';
require_once get_template_directory() . '/inc/te-utility.php';

// Block Patterns
require_once get_template_directory() . '/inc/customizer-pattern-combos/te-customize-cover-blocks.php';
require_once get_template_directory() . '/inc/customizer-pattern-combos/te-customize-column-blocks.php';
require_once get_template_directory() . '/inc/customizer-pattern-combos/te-customize-gallery-block.php';
require_once get_template_directory() . '/inc/customizer-pattern-combos/te-customize-image-block.php';
require_once get_template_directory() . '/inc/customizer-pattern-combos/te-customize-title-lead-block.php';
require_once get_template_directory() . '/inc/customizer-pattern-combos/te-customize-text-block.php';


//
// TheEducatorPatternsCustomizer - Populate the Customizer.
//
// Creates 'The Educator Block Patterns' in Customizer.
// Generates front-end CSS from the configured Settings.
//


class TheEducatorPatternsCustomizer {


   public static function register ( $wp_customize ) {

      // optional text on all labels
      $theme_title = '';               // 'The Educator ';

      //
      // Block Patterns panel
      //
      if ( class_exists( 'WP_Customize_Panel' ) ) {
         if ( ! $wp_customize->get_panel( 'te_patterns_panel' ) ) {
            $wp_customize->add_panel(
               'te_patterns_panel',
               array(
                  'priority' => 62,
                  'title' => __( 'The Educator Block Patterns', 'the-educator' ),
                  'description' => 
                     __('Apply customizations to The Educator Block Pattern types across the site.
                        <br>These changes will be applied to all instances
                        of the selected block pattern on your site,
                        thus ensuring consistency across your design.', 'the-educator'))
            );
         }
      }


      //
      // Block Pattern Sections
      //
      $wp_customize->add_section( 'te_hero_patterns', 
      array('title'       => __( $theme_title . 'Hero Cover Blocks', 'the-educator' ),
            'priority'    => 10,
            'capability'  => 'edit_theme_options',
            'description' => __('Customize all Hero Covers site-wide.', 'the-educator'),
            'panel' => 'te_patterns_panel',
            'active_callback' => '') 
      );   
      $wp_customize->add_section( 'te_cover_patterns', 
      array('title'       => __( $theme_title . 'Cover Blocks', 'the-educator' ),
            'priority'    => 20,
            'capability'  => 'edit_theme_options',
            'description' => __('Customize all Covers site-wide.', 'the-educator'),
            'panel' => 'te_patterns_panel',
            'active_callback' => '') 
      );   
      $wp_customize->add_section( 'te_column_patterns', 
         array('title'       => __( $theme_title . 'Columns', 'the-educator' ),
               'priority'    => 30,
               'capability'  => 'edit_theme_options',
               'description' => __('You can customize all ' . $theme_title . 'Columns across the site here.', 'the-educator'),
               'panel' => 'te_patterns_panel',
               'active_callback' => '') 
      );
      $wp_customize->add_section( 'te_big_title_lead_patterns', 
         array('title'       => __( $theme_title . 'Big Title & Lead', 'the-educator' ),
               'priority'    => 50,
               'capability'  => 'edit_theme_options',
               'description' => __('You can customize all ' . $theme_title . 'Big Title & Leads across the site here.', 'the-educator'),
               'panel' => 'te_patterns_panel',
               'active_callback' => '') 
      );
      $wp_customize->add_section( 'te_title_lead_patterns', 
         array('title'       => __( $theme_title . 'Title & Lead', 'the-educator' ),
               'priority'    => 50,
               'capability'  => 'edit_theme_options',
               'description' => __('You can customize all ' . $theme_title . 'Title & Leads across the site here.', 'the-educator'),
               'panel' => 'te_patterns_panel',
               'active_callback' => '') 
      );
      $wp_customize->add_section( 'te_text_patterns', 
         array('title'       => __( $theme_title . 'Texts', 'the-educator' ),
               'priority'    => 50,
               'capability'  => 'edit_theme_options',
               'description' => __('You can customize all ' . $theme_title . 'Texts across the site here.', 'the-educator'),
               'panel' => 'te_patterns_panel',
               'active_callback' => '') 
      );
      $wp_customize->add_section( 'te_image_patterns', 
         array('title'       => __( $theme_title . 'Images', 'the-educator' ),
               'priority'    => 60,
               'capability'  => 'edit_theme_options',
               'description' => __('You can customize all ' . $theme_title . 'Images and Galleries across the site here.', 'the-educator'),
               'panel' => 'te_patterns_panel',
               'active_callback' => '') 
      );
      $wp_customize->add_section( 'te_buttons_patterns', 
         array('title'       => __( $theme_title . 'Buttons', 'the-educator' ),
               'priority'    => 70,
               'capability'  => 'edit_theme_options',
               'description' => __('You can customize all ' . $theme_title . 'Buttons across the site here.', 'the-educator'),
               'panel' => 'te_patterns_panel',
               'active_callback' => '') 
      );

   
      //
      // Block Pattern Settings/Controls pairs
      //
      te_customize_cover_block($wp_customize);
      te_customize_column_blocks($wp_customize);
      te_customize_image_block($wp_customize);
      te_customize_gallery_block($wp_customize);
      te_customize_title_lead_block($wp_customize);
      te_customize_text_block($wp_customize);
   }


   public static function te_customizer_patterns_styles() {
      ?>
      <!-- The Educator Patterns Customizer CSS --> 
      <style id="te-custom-patterns" type="text/css">
      <?php 
      //
      // Block Pattern Styles
      //
      te_customize_cover_block_styles();
      te_customize_column_blocks_styles();
      te_customize_image_block_styles();
      te_customize_gallery_block_styles();
      te_customize_title_lead_block_styles();
      te_customize_text_block_styles();
      ?>   
      </style> 
      <!-- The Educator Patterns Customizer CSS -->
      <?php
   }
}



// Register Theme Customizer Settings and Controls
add_action( 'customize_register', array( 'TheEducatorPatternsCustomizer' , 'register' ) );


// Output Custom Block Pattern CSS to frontend (utilising Theme Customizer Settings and Controls)
add_action( 'wp_head', array( 'TheEducatorPatternsCustomizer' , 'te_customizer_patterns_styles' ) );


