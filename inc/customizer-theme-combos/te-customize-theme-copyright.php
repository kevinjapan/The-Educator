<?php

// Register Theme Customizer Settings and Controls
//
function te_customize_theme_copyright($wp_customize) {

   $wp_customize->add_setting( 'te_copyright',
   array('default'    => 'Copyright © ' . date("Y"), 
         'type'       => 'theme_mod',
         'capability' => 'edit_theme_options',
         'transport'  => 'postMessage',
         'sanitize_callback' => 'sanitize_text_field') 
   );
   $wp_customize->add_control( 'te_copyright', 
      array('type' => 'text',
            'priority' => 10,
            'section' => 'te_copyright',
            'settings'   => 'te_copyright', 
            'description' => esc_html__( 'The copyright notice with year of first publication','the-educator' ),
            'input_attrs' => array('style' => 'width: 96%;')) 
   );
   $wp_customize->add_setting( 'te_copyright_auto_complete',
      array('default'    => false, 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_checkbox') 
   );
   $wp_customize->add_control( 'te_copyright_auto_complete', 
      array('type' => 'checkbox',
            'priority' => 10,
            'section' => 'te_copyright',
            'label' => esc_html__( 'Always auto-complete with current year','the-educator'),
            'settings'   => 'te_copyright_auto_complete', 
            'description' => esc_html__( 'Expands copyright notice dates from year of first publication to current year','the-educator' ),
            'input_attrs' => array('style' => 'width: 96%;')) 
   );   
}


// Output Custom Block Pattern CSS to frontend (utilising Block Customizer Settings and Controls above)
//
function te_customize_theme_copyright_styles() {


}


