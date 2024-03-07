<?php



// Register Theme Customizer Block Pattern Settings and Controls
//
function te_customize_cover_block($wp_customize) {

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
         te_generate_css_rule('.te-cover',
            ['style' => 'width','setting' => 'te_cover_x_width','prefix'  => '','postfix' => '%'],);
         te_generate_css_rule('.te-cover',
            ['style' => 'margin-top','setting' => 'te_cover_y_margins','prefix'  => '','postfix' => 'vh'],
            ['style' => 'margin-bottom','setting' => 'te_cover_y_margins','prefix'  => '','postfix' => 'vh']);
      ?>
   }
   <?php
}