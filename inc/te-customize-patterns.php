<?php
require_once get_template_directory() . '/inc/te-sanitize.php';


//
// WebDevAgentPatternsCustomizer
// Creates 'The Educator Block Patterns' in Customizer.
// Generates front-end CSS from the configured Settings.
//

class WebDevAgentPatternsCustomizer {

   public function __construct() {}

   public static function register ( $wp_customize ) {

      // optional text on all labels
      $theme_title = '';               // 'The Educator ';


      //
      // Wed Dev Agent Block Patterns panel
      //
      if ( class_exists( 'WP_Customize_Panel' ) ) {
         if ( ! $wp_customize->get_panel( 'te_patterns_panel' ) ) {
            $wp_customize->add_panel(
               'te_patterns_panel',
               array(
                  'priority' => 25,
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
      // sections
      //
      $wp_customize->add_section( 'te_cover_patterns', 
         array('title'       => __( $theme_title . 'Covers', 'the-educator' ),
               'priority'    => 10,
               'capability'  => 'edit_theme_options',
               'description' => __('You can customize all ' . $theme_title . 'Covers across the site here.', 'the-educator'),
               'panel' => 'te_patterns_panel',
               'active_callback' => '') 
      );
      $wp_customize->add_section( 'te_column_patterns', 
         array('title'       => __( $theme_title . 'Columns', 'the-educator' ),
               'priority'    => 20,
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

   

      // settings and control pairs


      
      // 
      // cover block patterns
      //
      $wp_customize->add_setting( 'te_cover_x_width',
         array('default'    => '100', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_cover_x_width', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_cover_patterns',
               'label' => __( 'Covers','the-educator'),
               'settings'   => 'te_cover_x_width', 
               'description' => __( '% width for Covers.','the-educator'),
               'input_attrs' => array( 'min' => 60, 'max' => 100, 'style' => 'width: 80px;', 'step'	=> 5 )) 
      );

      $wp_customize->add_setting( 'te_cover_y_margins',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_cover_y_margins', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_cover_patterns',
               'label' => __( '','the-educator'),
               'settings'   => 'te_cover_y_margins', 
               'description' => __( '% above and below Covers.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 1 )) 
      );



      //
      // column block patterns
      //

      // future : Add bg color setting to block patterns
      // considerations: 
      // - padding, esp y-padding. 
      // - buttons need eg :hover rules for particular combos. 
      // - using WordPress editor, adding bg colors gets awkward and uncomfortable for 'normal' users. 
      //   (doesn't even update the editor view w/ the background color if using additional css class!)
      // - also te classes are exposed as 'additional css classes' - which means they can be mistakenly
      //   removed too easily. Hence, we don't want to encourage access to this control.
      // - if we tie into customizer, we can restrict or encourage choice from site color palette.
      //   while applying across site w/ single action.

      $wp_customize->add_setting( 'te_column_x_padding',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_column_x_padding', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_column_patterns',
               'label' => __( 'Padding','the-educator'),
               'settings'   => 'te_column_x_padding', 
               'description' => __( '% horizontal padding for Columns.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 )) 
      );

      $wp_customize->add_setting( 'te_column_top_padding',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_column_top_padding', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_column_patterns',
               'label' => __( '','the-educator'),
               'settings'   => 'te_column_top_padding', 
               'description' => __( '% top padding for Columns.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 )) 
      );

      $wp_customize->add_setting( 'te_column_bottom_padding',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_column_bottom_padding', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_column_patterns',
               'label' => __( '','the-educator'),
               'settings'   => 'te_column_bottom_padding', 
               'description' => __( '% bottom padding for Columns.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 )) 
      );



      // 
      // te-image block pattern : 
      // wrap wp-block-image to enable our margin and padding applied across all te-image blocks 
      //      
      $wp_customize->add_setting( 'te_image_x_padding',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_image_x_padding', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_image_patterns',
               'label' => __( 'Images','the-educator'),
               'settings'   => 'te_image_x_padding', 
               'description' => __( '% horizontal padding for Images.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 )) 
      );

      $wp_customize->add_setting( 'te_image_y_margins',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_image_y_margins', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_image_patterns',
               'label' => __( '','the-educator'),
               'settings'   => 'te_image_y_margins', 
               'description' => __( '% vertical spacing for Images.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 )) 
      );



      //
      // te-gallery block pattern : 
      // wrap wp-block-image to enable our margin and padding applied across all gallery blocks 
      //
      $wp_customize->add_setting( 'te_gallery_x_padding',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_gallery_x_padding', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_image_patterns',
               'label' => __( 'Galleries','the-educator'),
               'settings'   => 'te_gallery_x_padding', 
               'description' => __( '% horizontal padding for Galleries.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 )) 
      );

      $wp_customize->add_setting( 'te_gallery_y_margins',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_gallery_y_margins', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_image_patterns',
               'label' => __( '','the-educator'),
               'settings'   => 'te_gallery_y_margins', 
               'description' => __( '% vertical spacing for Galleries.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
      );



      

      //
      // big title & lead block pattern
      //
      $wp_customize->add_setting( 'te_big_title_lead_btwn_padding',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_big_title_lead_btwn_padding', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_big_title_lead_patterns',
               'label' => __( 'Padding','the-educator'),
               'settings'   => 'te_big_title_lead_btwn_padding', 
               'description' => __( '% padding between Big Title & Lead.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 5, 'style' => 'width: 80px;', 'step'	=> 1 ))
      );



      // 
      // big title & lead-text box padding
      //
      $wp_customize->add_setting( 'te_big_title_lead_x_padding',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_big_title_lead_x_padding', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_big_title_lead_patterns',
               'label' => __( '','the-educator'),
               'settings'   => 'te_big_title_lead_x_padding', 
               'description' => __( '% horizontal padding for Big Title & Lead.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
      );

      $wp_customize->add_setting( 'te_big_title_lead_top_padding',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_big_title_lead_top_padding', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_big_title_lead_patterns',
               'label' => __( '','the-educator'),
               'settings'   => 'te_big_title_lead_top_padding', 
               'description' => __( '% padding above Big Title & Lead.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
      );

      $wp_customize->add_setting( 'te_big_title_lead_bottom_padding',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_big_title_lead_bottom_padding', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_big_title_lead_patterns',
               'label' => __( '','the-educator'),
               'settings'   => 'te_big_title_lead_bottom_padding', 
               'description' => __( '% padding below for Big Title & Lead.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
      );

      

      //
      // lead-text margins
      //
      $wp_customize->add_setting( 'te_big_title_lead_top_margin',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_big_title_lead_top_margin', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_big_title_lead_patterns',
               'label' => __( 'Margins','the-educator'),
               'settings'   => 'te_big_title_lead_top_margin', 
               'description' => __( '% margin above Big Title & Lead.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
      );

      $wp_customize->add_setting( 'te_big_title_lead_bottom_margin',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_big_title_lead_bottom_margin', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_big_title_lead_patterns',
               'label' => __( '','the-educator'),
               'settings'   => 'te_big_title_lead_bottom_margin', 
               'description' => __( '% margin below for Big Title & Lead.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
      );



      // ------------------------------------------------------------------------------------------------

      //
      // title & lead block pattern
      //
      $wp_customize->add_setting( 'te_title_lead_btwn_padding',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_title_lead_btwn_padding', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_title_lead_patterns',
               'label' => __( 'Padding','the-educator'),
               'settings'   => 'te_title_lead_btwn_padding', 
               'description' => __( '% padding between Title & Lead.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 5, 'style' => 'width: 80px;', 'step'	=> 1 ))
      );



      // 
      // lead-text box padding
      //
      $wp_customize->add_setting( 'te_title_lead_x_padding',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_title_lead_x_padding', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_title_lead_patterns',
               'label' => __( '','the-educator'),
               'settings'   => 'te_title_lead_x_padding', 
               'description' => __( '% horizontal padding for Title & Lead.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
      );

      $wp_customize->add_setting( 'te_title_lead_top_padding',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_title_lead_top_padding', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_title_lead_patterns',
               'label' => __( '','the-educator'),
               'settings'   => 'te_title_lead_top_padding', 
               'description' => __( '% padding above Title & Lead.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
      );

      $wp_customize->add_setting( 'te_title_lead_bottom_padding',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_title_lead_bottom_padding', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_title_lead_patterns',
               'label' => __( '','the-educator'),
               'settings'   => 'te_title_lead_bottom_padding', 
               'description' => __( '% padding below for Title & Lead.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
      );

      

      //
      // lead-text margins
      //
      $wp_customize->add_setting( 'te_title_lead_top_margin',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_title_lead_top_margin', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_title_lead_patterns',
               'label' => __( 'Margins','the-educator'),
               'settings'   => 'te_title_lead_top_margin', 
               'description' => __( '% margin above Title & Lead.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
      );

      $wp_customize->add_setting( 'te_title_lead_bottom_margin',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_title_lead_bottom_margin', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_title_lead_patterns',
               'label' => __( '','the-educator'),
               'settings'   => 'te_title_lead_bottom_margin', 
               'description' => __( '% margin below for Title & Lead.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
      );



      //
      // text block pattern   
      //  
      $wp_customize->add_setting( 'te_text_x_padding',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_text_x_padding', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_text_patterns',
               'label' => __( 'Simple Text','the-educator'),
               'settings'   => 'te_text_x_padding', 
               'description' => __( '% horizontal padding for Texts.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
      );

      $wp_customize->add_setting( 'te_text_y_margins',
         array('default'    => '0', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_text_y_margins', 
         array('type' => 'number',
               'priority' => 11,
               'section' => 'te_text_patterns',
               'label' => __( '','the-educator'),
               'settings'   => 'te_text_y_margins', 
               'description' => __( '% vertical spacing for Texts.','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 )) 
      );

      $wp_customize->add_setting('te_text_text_align',
         array('default'    => 'left', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_radio_buttons',) 
      );
      // WordPress forces 'Center' -> 'Centre' if 'UK English' set!
      $wp_customize->add_control('te_text_text_align', 
         array('type' => 'number',
               'priority' => 12,
               'type' => 'radio',
               'section' => 'te_text_patterns',
               'label' => __( '','the-educator'),
               'settings'   => 'te_text_text_align', 
               'description' => __( 'Set text alignment for Texts.','the-educator'),
               'choices' => array(
                 'left' => __( 'Left' ),
                 'center' => __( 'Center' ),
                 'right' => __( 'Right' )
               )
         )
      );
   }

   public static function te_customizer_patterns_styles() {

      ?><!-- The Educator Patterns Customizer CSS --> 
<style id="te-custom-patterns" type="text/css">
<?php 

   /* te-cover block */

      //
      // te-cover
      //
      ?>
      @media screen and (min-width: 768px) { 
         <?php 
            // te-cover - md/lg 
            te_generate_css_rule('.te-cover',
               ['style' => 'width','setting' => 'te_cover_x_width','prefix'  => '','postfix' => '%'],);
            te_generate_css_rule('.te-cover',
               ['style' => 'margin-top','setting' => 'te_cover_y_margins','prefix'  => '','postfix' => 'vh'],
               ['style' => 'margin-bottom','setting' => 'te_cover_y_margins','prefix'  => '','postfix' => 'vh']);
         ?>
      }
      <?php


      //
      // te-columns
      //
         te_generate_css_rule('.wp-block-media-text.te-columns,.wp-block-media-text.te-columns.has-background,.wp-block-columns.te-columns,.wp-block-columns.te-columns.has-background',
            ['style' => 'padding-top','setting' => 'te_column_top_padding','prefix'  => '','postfix' => 'vh'],
            ['style' => 'padding-bottom','setting' => 'te_column_bottom_padding','prefix'  => '','postfix' => 'vh']);
         te_generate_css_rule('.wp-block-media-text.te-columns.te-single-feature-columns,.wp-block-media-text.te-columns.has-background,.wp-block-columns.te-columns,.wp-block-columns.te-columns.has-background',
            ['style' => 'margin-top','setting' => 'te_column_y_margins','prefix'  => '','postfix' => 'vh !important'],
            ['style' => 'margin-bottom','setting' => 'te_column_y_margins','prefix'  => '','postfix' => 'vh !important']);
      ?>
      
      <?php
         // future : refactor : we want to prevent empty media queries but efficiently!
         // $mod = get_theme_mod('te_column_x_padding');
         // if ( ! empty($mod) || $mod === "0" ) {?>
            @media screen and (min-width: 768px) { 
               <?php
                  te_generate_css_rule(
                     '.wp-block-media-text.te-columns,
                     .wp-block-media-text.te-columns.has-background,
                     .wp-block-columns.te-columns,
                     .wp-block-columns.te-columns.has-background',
                     ['style' => 'padding-left','setting' => 'te_column_x_padding','prefix'  => '','postfix' => '%'],
                     ['style' => 'padding-right','setting' => 'te_column_x_padding','prefix'  => '','postfix' => '%']);
                  te_generate_css_rule('.te-cover-columns, .te-cover-columns.has-background',
                     ['style' => 'padding-left','setting' => 'te_cover_column_x_padding','prefix'  => '','postfix' => '%'],
                     ['style' => 'padding-right','setting' => 'te_cover_column_x_padding','prefix'  => '','postfix' => '%']);
               ?>
            }
         <?php
         //} 
      

      //
      // te-image
      //
      ?>
      @media screen and (min-width: 768px) { 
         <?php 
         te_generate_css_rule('article .entry-content figure.wp-block-image.te-image img',
            ['style' => 'padding-left','setting' => 'te_image_x_padding','prefix'  => '','postfix' => '%'],
            ['style' => 'padding-right','setting' => 'te_image_x_padding','prefix'  => '','postfix' => '%']);
         te_generate_css_rule('figure.wp-block-image.te-image',
            ['style' => 'padding-left','setting' => 'te_image_x_padding','prefix'  => '','postfix' => '%'],
            ['style' => 'padding-right','setting' => 'te_image_x_padding','prefix'  => '','postfix' => '%']);
         te_generate_css_rule('article .entry-content figure.wp-block-image.te-image img,article .entry-content figure.wp-block-image.te-image.has-background img',
            ['style' => 'margin-top','setting' => 'te_image_y_margins','prefix'  => '','postfix' => 'vh'],
            ['style' => 'margin-bottom','setting' => 'te_image_y_margins','prefix'  => '','postfix' => 'vh']);
         ?>
      }
      <?php

      
      //
      // te-gallery
      //
      ?>
      @media screen and (min-width: 768px) { 
         <?php 
         te_generate_css_rule('.te-gallery,.te-gallery.has-background',
            ['style' => 'padding-left','setting' => 'te_gallery_x_padding','prefix'  => '','postfix' => '%'],
            ['style' => 'padding-right','setting' => 'te_gallery_x_padding','prefix'  => '','postfix' => '%']);
         te_generate_css_rule('.te-gallery,.te-gallery.has-background',
            ['style' => 'margin-top','setting' => 'te_gallery_y_margins','prefix'  => '','postfix' => 'vh'],
            ['style' => 'margin-bottom','setting' => 'te_gallery_y_margins','prefix'  => '','postfix' => 'vh']);
         ?>
      }
      <?php
      //
      // big te-title-lead
      //
      te_generate_css_rule('.wp-block-group.te-big-title-lead',
         ['style' => 'margin-top','setting' => 'te_big_title_lead_top_margin','prefix'  => '','postfix' => 'vh'],
         ['style' => 'margin-bottom','setting' => 'te_big_title_lead_bottom_margin','prefix'  => '','postfix' => 'vh']);
      ?>
      @media screen and (min-width: 768px) { 
         <?php 
         te_generate_css_rule('.te-big-title-lead__title',
            ['style' => 'padding-bottom','setting' => 'te_big_title_lead_btwn_padding','prefix'  => '','postfix' => 'vw']);
         te_generate_css_rule(
            '.wp-block-group.te-big-title-lead,
            .wp-block-group.te-big-title-lead.has-background ',
            ['style' => 'padding-left','setting' => 'te_big_title_lead_x_padding','prefix'  => '','postfix' => '%'],
            ['style' => 'padding-right','setting' => 'te_big_title_lead_x_padding','prefix'  => '','postfix' => '%']);
         te_generate_css_rule('.wp-block-group.te-big-title-lead',
            ['style' => 'padding-top','setting' => 'te_big_title_lead_top_padding','prefix'  => '','postfix' => 'vh'],
            ['style' => 'padding-bottom','setting' => 'te_big_title_lead_bottom_padding','prefix'  => '','postfix' => 'vh']);
         ?>
      }
      <?php
      //
      // te-title-lead
      //
      te_generate_css_rule('.wp-block-group.te-title-lead',
         ['style' => 'margin-top','setting' => 'te_title_lead_top_margin','prefix'  => '','postfix' => 'vh'],
         ['style' => 'margin-bottom','setting' => 'te_title_lead_bottom_margin','prefix'  => '','postfix' => 'vh']);
      ?>
      @media screen and (min-width: 768px) { 
         <?php 
         te_generate_css_rule('.te-title-lead__title',
            ['style' => 'padding-bottom','setting' => 'te_title_lead_btwn_padding','prefix'  => '','postfix' => 'vw']);
         te_generate_css_rule(
            '.wp-block-group.te-title-lead,
            .wp-block-group.te-title-lead.has-background ',
            ['style' => 'padding-left','setting' => 'te_title_lead_x_padding','prefix'  => '','postfix' => '%'],
            ['style' => 'padding-right','setting' => 'te_title_lead_x_padding','prefix'  => '','postfix' => '%']);
         te_generate_css_rule('.wp-block-group.te-title-lead',
            ['style' => 'padding-top','setting' => 'te_title_lead_top_padding','prefix'  => '','postfix' => 'vh'],
            ['style' => 'padding-bottom','setting' => 'te_title_lead_bottom_padding','prefix'  => '','postfix' => 'vh']);
         ?>
      }
      <?php


      //
      // te-simple-text
      // 
      te_generate_css_rule('.wp-block-group.te-text.te-simple-text',
         ['style' => 'margin-top','setting' => 'te_text_y_margins','prefix'  => '','postfix' => 'vh'],
         ['style' => 'margin-bottom','setting' => 'te_text_y_margins','prefix'  => '','postfix' => 'vh']); 
      te_generate_css_rule('.wp-block-group.te-text.te-simple-text',
         ['style' => 'text-align','setting' => 'te_text_text_align','prefix'  => '','postfix' => '']); 
      ?>

      @media screen and (min-width: 768px) { 
         <?php 
         te_generate_css_rule('.te-text, .te-text.has-background ',
            ['style' => 'padding-left','setting' => 'te_text_x_padding','prefix'  => '','postfix' => '%'],
            ['style' => 'padding-right','setting' => 'te_text_x_padding','prefix'  => '','postfix' => '%']);
         ?>
      }
   
</style> 
<!--/ The Educator Patterns Customizer CSS -->
      <?php
   }
}


//
// setup theme customizer settings and controls
//
add_action( 'customize_register', array( 'WebDevAgentPatternsCustomizer' , 'register' ) );


//
// output custom css to frontend
//
add_action( 'wp_head', array( 'WebDevAgentPatternsCustomizer' , 'te_customizer_patterns_styles' ) );


