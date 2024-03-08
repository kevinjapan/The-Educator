<?php

// Register Theme Customizer Settings and Controls
//
function te_customize_theme_frontpage($wp_customize) {

   /*
      * Header Images 
      * frontpage uses 'Custom Header Image' while other pages override w/ their own 'Featured Image' if present
      */

   /* FrontPage Header Image Is Fixed */
   // $wp_customize->add_setting( 'te_is_header_img_fixed',
   // array('default'    => false, 
   //       'type'       => 'theme_mod',
   //       'capability' => 'edit_theme_options',
   //       'transport'  => 'postMessage',
   //       'sanitize_callback' => 'te_sanitize_checkbox') 
   // );

   // $wp_customize->add_control( 'te_is_header_img_fixed', 
   //    array('type' => 'checkbox',
   //          'priority' => 10,
   //          'section' => 'te_header_img',
   //          'settings'   => 'te_is_header_img_fixed', 
   //          'input_attrs' => array( 'style' => 'width:100%;' ),
   //          'description' => esc_html__( 'Header images are in fixed positions.','the-educator'))
   // );

   /* FrontPage Header Height */
   $wp_customize->add_setting( 'frontpage_header_height', 
      array('default'    => '100', 
            'type'       => 'theme_mod', 
            'capability' => 'edit_theme_options', 
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_frontpage_header_height', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_header_img',
            'label' => esc_html__( 'Image Height','the-educator'),
            'settings'   => 'frontpage_header_height', 
            'description' => esc_html__( 'set the % height of the header image','the-educator'),
            'input_attrs' => array( 'min' => 20, 'max' => 100, 'style' => 'width: 80px;', 'step'	=> 5 )) 
   );

   /* Site Header BG Color - used in sm viewports / rqrd for hero text contrast */
   $wp_customize->add_setting( 'frontpage_header_bg_color',
      array('default'    => '#000080',
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color') 
   );
   $wp_customize->add_control( new WP_Customize_Color_Control(
      $wp_customize, 
      'frontpage_header_bg_color',
      array('label'      => esc_html__( 'Background color', 'the-educator' ),
            'description' => esc_html__( 'Your image may not cover the full height in mobile screens - use a background color to display your hero text.','the-educator'), 
            'settings'   => 'frontpage_header_bg_color', 
            'priority'   => 10,
            'section'    => 'te_header_img') 
   ));
}


// Output Custom Block Pattern CSS to frontend (utilising Block Customizer Settings and Controls above)
//
function te_customize_theme_frontpage_styles() {

   /* site header */
   if(get_theme_mod('te_is_header_img_fixed') === true) {?>.evolutiondesuka-site-header-bg {position:fixed;}
   <?php
   }?>
   <?php 
   // te_generate_css_rule('.te_frontpage .evolutiondesuka-site-header',
   //    ['style' => 'height','setting' => 'frontpage_header_height',  'prefix'  => '',  'postfix' => 'vh']);
   // te_generate_css_rule('.evolutiondesuka-site-header',
   //    ['style' => 'height','setting' => 'header_height',  'prefix'  => '',  'postfix' => 'vh']);
   
   
   // te_generate_css_rule('.te_frontpage .evolutiondesuka-site-header::before',
   //    ['style' => 'background-color','setting' => 'frontpage_header_bg_color',  'prefix'  => '',  'postfix' => '']);
}


