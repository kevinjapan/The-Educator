<?php

// Register Theme Customizer Settings and Controls
//
function te_customize_theme_typography($wp_customize) {
      
   // Custom Fonts

   /* Title & Tagline Custom Fonts */
   $wp_customize->add_setting( 'te_title_fonts',
      array('default'    => 'Roboto', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field') 
   );
   $wp_customize->add_control( 'te_title_fonts', 
      array(
         'type' => 'text',
         'priority' => 10,
         'section' => 'te_typography',
         'label' => esc_html__( 'Site Title','the-educator'),
         'settings'   => 'te_title_fonts', 
         'input_attrs' => array('style' => 'width: 50%;')) 
   );
   $wp_customize->add_setting( 'te_tagline_fonts',
      array('default'    => 'Festive', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field') 
   );
   $wp_customize->add_control( 'te_tagline_fonts', 
      array(
         'type' => 'text',
         'priority' => 10,
         'section' => 'te_typography',
         'label' => esc_html__( 'Site Tagline','the-educator'),
         'settings'   => 'te_tagline_fonts',
         'input_attrs' => array('style' => 'width: 50%;'))  
   );
   
   /* Hero Custom Fonts */
   $wp_customize->add_setting( 'te_hero_fonts',
      array('default'    => 'Century Gothic', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field') 
   );
   $wp_customize->add_control( 'te_hero_fonts', 
      array(
         'type' => 'text',
         'priority' => 10,
         'section' => 'te_typography',
         'label' => esc_html__( 'Hero Text','the-educator'),
         'settings'   => 'te_hero_fonts', 
         'input_attrs' => array('style' => 'width: 50%;')) 
   );
   
   /* Nav Custom Fonts */
   $wp_customize->add_setting( 'te_nav_fonts',
      array('default'    => 'Courier', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field') 
   );
   $wp_customize->add_control( 'te_nav_fonts', 
      array('type' => 'text',
            'priority' => 10,
            'section' => 'te_typography',
            'label' => esc_html__( 'Navigation Text','the-educator'),
            'settings'   => 'te_nav_fonts', 
            'input_attrs' => array('style' => 'width: 50%;')) 
   );
   
   /* Headings Custom Fonts */
   $wp_customize->add_setting( 'te_headings_fonts',
      array('default'    => 'Verdana', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field') 
   );
   $wp_customize->add_control( 'te_headings_fonts', 
      array(
         'type' => 'text',
         'priority' => 10,
         'section' => 'te_typography',
         'label' => esc_html__( 'Headings','the-educator'),
         'settings'   => 'te_headings_fonts', 
         'input_attrs' => array('style' => 'width: 50%;')) 
   );

   /* Text Custom Fonts */
   $wp_customize->add_setting( 'te_body_fonts',
      array('default'    => 'Sans Serif', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field') 
   );
   $wp_customize->add_control( 'te_body_fonts', 
      array('type' => 'text',
            'priority' => 10,
            'section' => 'te_typography',
            'label' => esc_html__( 'Text','the-educator'),
            'settings'   => 'te_body_fonts',
            'input_attrs' => array('style' => 'width: 50%;')) 
   );     
}


// Output Custom Block Pattern CSS to frontend (utilising Block Customizer Settings and Controls above)
//
function te_customize_theme_typography_styles() {

   /* custom fonts - ensure order is maintained */
   // $fallback_fonts = ',serif,verdana';  /* fallback system fonts */
   // te_generate_css_rule('body',
   //    ['style' => 'font-family','setting' => 'te_body_fonts',  'prefix'  => '',  'postfix' => $fallback_fonts]);
   // te_generate_css_rule('.evolutiondesuka-navigation',
   //    ['style' => 'font-family','setting' => 'te_nav_fonts',  'prefix'  => '',  'postfix' => $fallback_fonts]);
   // te_generate_css_rule('h1:not(.te_title_heading),h2:not(.te_title_heading),h3:not(.te_title_heading),h4:not(.te_title_heading),h5,h6',
   //    ['style' => 'font-family','setting' => 'te_headings_fonts',  'prefix'  => '',  'postfix' => $fallback_fonts]);
   // te_generate_css_rule('.te_title_heading',
   //    ['style' => 'font-family','setting' => 'te_tagline_fonts',  'prefix'  => '',  'postfix' => $fallback_fonts]);
   // te_generate_css_rule('h1.te_title_heading,h2.te_title_heading,h3.te_title_heading',
   //    ['style' => 'font-family','setting' => 'te_title_fonts',  'prefix'  => '',  'postfix' => $fallback_fonts]);

}


