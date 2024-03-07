<?php

   
// Register Theme Customizer Block Pattern Settings and Controls
//
function te_customize_title_lead_block($wp_customize) {

   // big title & lead block pattern
   //
   $wp_customize->add_setting( 'te_big_title_lead_btwn_padding',
      array('default'    => '0', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_big_title_lead_btwn_padding', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_big_title_lead_patterns',
            'label' => __( 'Padding','the-educator'),
            'settings'   => 'te_big_title_lead_btwn_padding', 
            'description' => __( '% padding between Big Title & Lead.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 5, 'style' => 'width: 80px;', 'step'	=> 1 ))
   );
   // big title & lead-text box padding
   //
   $wp_customize->add_setting( 'te_big_title_lead_x_padding',
      array('default'    => '0', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_big_title_lead_x_padding', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_big_title_lead_patterns',
            'label' => __( '','the-educator'),
            'settings'   => 'te_big_title_lead_x_padding', 
            'description' => __( '% horizontal padding for Big Title & Lead.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
   );
   $wp_customize->add_setting( 'te_big_title_lead_top_padding',
      array('default'    => '0', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_big_title_lead_top_padding', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_big_title_lead_patterns',
            'label' => __( '','the-educator'),
            'settings'   => 'te_big_title_lead_top_padding', 
            'description' => __( '% padding above Big Title & Lead.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
   );
   $wp_customize->add_setting( 'te_big_title_lead_bottom_padding',
      array('default'    => '0', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_big_title_lead_bottom_padding', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_big_title_lead_patterns',
            'label' => __( '','the-educator'),
            'settings'   => 'te_big_title_lead_bottom_padding', 
            'description' => __( '% padding below for Big Title & Lead.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
   );
   // lead-text margins
   //
   $wp_customize->add_setting( 'te_big_title_lead_top_margin',
      array('default'    => '0', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_big_title_lead_top_margin', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_big_title_lead_patterns',
            'label' => __( 'Margins','the-educator'),
            'settings'   => 'te_big_title_lead_top_margin', 
            'description' => __( '% margin above Big Title & Lead.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
   );
   $wp_customize->add_setting( 'te_big_title_lead_bottom_margin',
      array('default'    => '0', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_big_title_lead_bottom_margin', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_big_title_lead_patterns',
            'label' => __( '','the-educator'),
            'settings'   => 'te_big_title_lead_bottom_margin', 
            'description' => __( '% margin below for Big Title & Lead.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
   );
   // title & lead block pattern
   //
   $wp_customize->add_setting( 'te_title_lead_btwn_padding',
      array('default'    => '0', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_title_lead_btwn_padding', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_title_lead_patterns',
            'label' => __( 'Padding','the-educator'),
            'settings'   => 'te_title_lead_btwn_padding', 
            'description' => __( '% padding between Title & Lead.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 5, 'style' => 'width: 80px;', 'step'	=> 1 ))
   );
   // lead-text box padding
   //
   $wp_customize->add_setting( 'te_title_lead_x_padding',
      array('default'    => '0', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_title_lead_x_padding', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_title_lead_patterns',
            'label' => __( '','the-educator'),
            'settings'   => 'te_title_lead_x_padding', 
            'description' => __( '% horizontal padding for Title & Lead.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
   );
   $wp_customize->add_setting( 'te_title_lead_top_padding',
      array('default'    => '0', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_title_lead_top_padding', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_title_lead_patterns',
            'label' => __( '','the-educator'),
            'settings'   => 'te_title_lead_top_padding', 
            'description' => __( '% padding above Title & Lead.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
   );
   $wp_customize->add_setting( 'te_title_lead_bottom_padding',
      array('default'    => '0', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_title_lead_bottom_padding', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_title_lead_patterns',
            'label' => __( '','the-educator'),
            'settings'   => 'te_title_lead_bottom_padding', 
            'description' => __( '% padding below for Title & Lead.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
   );
   // lead-text margins
   //
   $wp_customize->add_setting( 'te_title_lead_top_margin',
      array('default'    => '0', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_title_lead_top_margin', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_title_lead_patterns',
            'label' => __( 'Margins','the-educator'),
            'settings'   => 'te_title_lead_top_margin', 
            'description' => __( '% margin above Title & Lead.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
   );
   $wp_customize->add_setting( 'te_title_lead_bottom_margin',
      array('default'    => '0', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_title_lead_bottom_margin', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_title_lead_patterns',
            'label' => __( '','the-educator'),
            'settings'   => 'te_title_lead_bottom_margin', 
            'description' => __( '% margin below for Title & Lead.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 ))
   );
}



// Output Custom Block Pattern CSS to frontend (utilising Block Customizer Settings and Controls above)
//
function te_customize_title_lead_block_styles() {

   // big te-title-lead
   //
   te_generate_css_rule('.wp-block-group.te-big-title-lead',
      ['style' => 'margin-top','setting' => 'te_big_title_lead_top_margin','prefix'  => '','postfix' => 'vh'],
      ['style' => 'margin-bottom','setting' => 'te_big_title_lead_bottom_margin','prefix'  => '','postfix' => 'vh']);
   ?>
   @media screen and (min-width: 768px) { 
      <?php 
      te_generate_css_rule('.te-big-title-lead__title',
         ['style' => 'padding-bottom','setting' => 'te_big_title_lead_btwn_padding','prefix'  => '','postfix' => 'vw']);
      te_generate_css_rule(
         '.wp-block-group.te-big-title-lead,
         .wp-block-group.te-big-title-lead.has-background ',
         ['style' => 'padding-left','setting' => 'te_big_title_lead_x_padding','prefix'  => '','postfix' => '%'],
         ['style' => 'padding-right','setting' => 'te_big_title_lead_x_padding','prefix'  => '','postfix' => '%']);
      te_generate_css_rule('.wp-block-group.te-big-title-lead',
         ['style' => 'padding-top','setting' => 'te_big_title_lead_top_padding','prefix'  => '','postfix' => 'vh'],
         ['style' => 'padding-bottom','setting' => 'te_big_title_lead_bottom_padding','prefix'  => '','postfix' => 'vh']);
      ?>
   }
   <?php
   // te-title-lead
   //
   te_generate_css_rule('.wp-block-group.te-title-lead',
      ['style' => 'margin-top','setting' => 'te_title_lead_top_margin','prefix'  => '','postfix' => 'vh'],
      ['style' => 'margin-bottom','setting' => 'te_title_lead_bottom_margin','prefix'  => '','postfix' => 'vh']);
   ?>
   @media screen and (min-width: 768px) { 
      <?php 
      te_generate_css_rule('.te-title-lead__title',
         ['style' => 'padding-bottom','setting' => 'te_title_lead_btwn_padding','prefix'  => '','postfix' => 'vw']);
      te_generate_css_rule(
         '.wp-block-group.te-title-lead,
         .wp-block-group.te-title-lead.has-background ',
         ['style' => 'padding-left','setting' => 'te_title_lead_x_padding','prefix'  => '','postfix' => '%'],
         ['style' => 'padding-right','setting' => 'te_title_lead_x_padding','prefix'  => '','postfix' => '%']);
      te_generate_css_rule('.wp-block-group.te-title-lead',
         ['style' => 'padding-top','setting' => 'te_title_lead_top_padding','prefix'  => '','postfix' => 'vh'],
         ['style' => 'padding-bottom','setting' => 'te_title_lead_bottom_padding','prefix'  => '','postfix' => 'vh']);
      ?>
   }
   <?php
}