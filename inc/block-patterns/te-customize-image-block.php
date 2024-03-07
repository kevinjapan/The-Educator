<?php

function te_customize_image_block($wp_customize) {

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



}



function te_customize_image_block_styles() {

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
   
}



