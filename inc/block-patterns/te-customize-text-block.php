<?php

   
function te_customize_text_block($wp_customize) {

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



function te_customize_text_block_styles() {

   
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
   <?php

}

