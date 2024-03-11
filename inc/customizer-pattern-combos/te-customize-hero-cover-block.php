<?php

// to do : move into te-customize-cover-blocks.php

// Register Theme Customizer Block Pattern Settings and Controls
//
function te_customize_hero_cover_block($wp_customize) {

   // cover block patterns
   //

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

   $wp_customize->add_setting( 'te_hero_x_width',
      array('default'    => '100', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_hero_x_width', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_hero_patterns',
            'label' => __( 'Hero Cover Blocks','the-educator'),
            'settings'   => 'te_hero_x_width', 
            'description' => __( '% width for Covers.','the-educator'),
            'input_attrs' => array( 'min' => 60, 'max' => 100, 'style' => 'width: 80px;', 'step'	=> 5 )) 
   );
   $wp_customize->add_setting( 'te_hero_y_margins',
      array('default'    => '0', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_hero_y_margins', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_hero_patterns',
            'label' => __( '','the-educator'),
            'settings'   => 'te_hero_y_margins', 
            'description' => __( '% above and below Hero Covers.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 1 )) 
   );
   // to do : margins etc only below hero cover
}


// Output Custom Block Pattern CSS to frontend (utilising Block Customizer Settings and Controls above)
//
function te_customize_hero_cover_block_styles() {
   
   // te-hero
   //
   ?>
   @media screen and (min-width: 768px) { 
      <?php 
         // te-hero - md/lg 
         te_generate_css_rule('.te-hero',
            ['style' => 'width','setting' => 'te_hero_x_width','prefix'  => '','postfix' => '%'],);
         te_generate_css_rule('.te-hero',
            ['style' => 'margin-top','setting' => 'te_hero_y_margins','prefix'  => '','postfix' => 'vh'],
            ['style' => 'margin-bottom','setting' => 'te_hero_y_margins','prefix'  => '','postfix' => 'vh']);
      ?>
   }
   <?php
}