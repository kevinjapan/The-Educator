<?php

   
// Register Theme Customizer Block Pattern Settings and Controls
//
function te_customize_gallery_block($wp_customize) {

   // te-gallery block pattern : 
   // wrap wp-block-image to enable our margin and padding applied across all gallery blocks 
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
}



// Output Custom Block Pattern CSS to frontend (utilising Block Customizer Settings and Controls above)
//
function te_customize_gallery_block_styles() {

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
}


