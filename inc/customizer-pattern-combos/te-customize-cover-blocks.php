<?php

// Adding Settings & Controls
// The WP add_control API is vague - eg $id can be simple id string or a WP_Customize_Control object,
// If an id string is give, a new WP_Customize_Control is created inside add_control()
// WP_Customize_Control( $this, $id, $args )
// '$args' is a config array inc. a 'Settings' item to list Settings' ids for this control.
// If 'Settings' is undefined, `$id` will be used, thus we *can* use the same id for Setting & Control
// or we can use 'Settings' for same or to expand to a list of ctrls (not sure of the scenario yet)
// Both are valid.


// Register Theme Customizer Block Pattern Settings and Controls
//
function te_customize_cover_block($wp_customize) {

   //
   // to do : future : review - align labels along-side controls 
   //         default doesn't do this - labels/desc sit above number ctrls
   //         (investigated using CSS only - not practical - html is too inflexible)
   //         perhaps create custom control wrappers to provide styling around a ctrl?
   //         see eg 
   //         https://www.tech-prastish.com/blog/create-custom-controls-for-theme-customizer-wordpress/
   //         https://themetrust.com/how-to-create-custom-controls-for-wordpress-theme-customizer/
   //         https://wpmudev.com/blog/creating-custom-controls-wordpress-theme-customizer/   
   //        

   
   // Hero Cover Block Patterns
   //
   $wp_customize->add_setting( 'te_hero_v_align',
      array('default'    => 'center', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_hero_v_align', 
      array('type' => 'select',
            'priority' => 10,
            'section' => 'te_hero_patterns',
            'label' => __( 'Hero Cover Blocks','the-educator'), 
            'description' => __( 'Align text vertically.','the-educator'),
            'choices' => array(
               'flex-start' => 'Top',
               'center' => 'Center',
               'flex-end' => 'Bottom',
            ))
   );
   $wp_customize->add_setting( 'te_hero_x_height',
      array('default'    => '100', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_hero_x_height', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_hero_patterns',
            'label' => __( 'Hero Cover Blocks','the-educator'), 
            'description' => __( '% height for Hero Covers.','the-educator'),
            'input_attrs' => array( 'min' => 50, 'max' => 100, 'style' => 'width: 80px;', 'step'	=> 5 )) 
   );
   $wp_customize->add_setting( 'te_hero_bottom_margin',
      array('default'    => '0', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_hero_bottom_margin', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_hero_patterns',
            'label' => __( '','the-educator'),
            'description' => __( '% margin below Hero Covers.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 )) 
   );


   // Cover Block Patterns
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
            'label' => __( 'Cover Blocks','the-educator'),
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
            'description' => __( '% above and below Covers.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 1 )) 
   );
}


// Output Custom Block Pattern CSS to frontend (utilising Block Customizer Settings and Controls above)
//
function te_customize_cover_block_styles() {
   
   // te-cover
   //
   ?>
   @media screen and (min-width: 768px) { 
      <?php 
         // Hero Cover Block 
         te_generate_css_rule('.te-hero',            
            ['style' => 'height','setting' => 'te_hero_x_height','prefix'  => '','postfix' => 'vh'],);
         te_generate_css_rule('.te-hero',            
            ['style' => 'margin-bottom','setting' => 'te_hero_bottom_margin','prefix'  => '','postfix' => '%'],);
            
            
         te_generate_css_rule('.te-hero',            
            ['style' => 'align-items','setting' => 'te_hero_v_align','prefix'  => '','postfix' => ''],);

         // Cover Block
         te_generate_css_rule('.te-cover',
            ['style' => 'width','setting' => 'te_cover_x_width','prefix'  => '','postfix' => '%'],);
         te_generate_css_rule('.te-cover',
            ['style' => 'margin-top','setting' => 'te_cover_y_margins','prefix'  => '','postfix' => 'vh'],
            ['style' => 'margin-bottom','setting' => 'te_cover_y_margins','prefix'  => '','postfix' => 'vh']);
      ?>
   }
   <?php
}