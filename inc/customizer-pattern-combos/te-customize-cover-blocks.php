<?php



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

   
   // hero cover block patterns
   //
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
            'section' => 'te_cover_patterns',
            'label' => __( 'Hero Cover Blocks','the-educator'),
            'settings'   => 'te_hero_x_height', 
            'description' => __( '% height for Hero Covers.','the-educator'),
            'input_attrs' => array( 'min' => 50, 'max' => 100, 'style' => 'width: 80px;', 'step'	=> 5 )) 
   );


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
            'label' => __( 'Cover Blocks','the-educator'),
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
}


// Output Custom Block Pattern CSS to frontend (utilising Block Customizer Settings and Controls above)
//
function te_customize_cover_block_styles() {
   
   // te-cover
   //
   ?>
   @media screen and (min-width: 768px) { 
      <?php 
         // te-cover - md/lg 
         te_generate_css_rule('.te-hero',            
            ['style' => 'height','setting' => 'te_hero_x_height','prefix'  => '','postfix' => 'vh'],);
         te_generate_css_rule('.te-cover',
            ['style' => 'width','setting' => 'te_cover_x_width','prefix'  => '','postfix' => '%'],);
         te_generate_css_rule('.te-cover',
            ['style' => 'margin-top','setting' => 'te_cover_y_margins','prefix'  => '','postfix' => 'vh'],
            ['style' => 'margin-bottom','setting' => 'te_cover_y_margins','prefix'  => '','postfix' => 'vh']);
      ?>
   }
   <?php
}