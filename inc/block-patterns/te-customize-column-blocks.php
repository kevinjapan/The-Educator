<?php

function te_customize_column_blocks($wp_customize) {

   // future : Add bg color setting to block patterns
   // considerations: 
   // - padding, esp y-padding. 
   // - buttons need eg :hover rules for particular combos. 
   // - using WordPress editor, adding bg colors gets awkward and uncomfortable for 'normal' users. 
   //   (doesn't even update the editor view w/ the background color if using additional css class!)
   // - also te classes are exposed as 'additional css classes' - which means they can be mistakenly
   //   removed too easily. Hence, we don't want to encourage access to this control.
   // - if we tie into customizer, we can restrict or encourage choice from site color palette.
   //   while applying across site w/ single action.

   $wp_customize->add_setting( 'te_column_x_padding',
      array('default'    => '0', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_column_x_padding', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_column_patterns',
            'label' => __( 'Padding','the-educator'),
            'settings'   => 'te_column_x_padding', 
            'description' => __( '% horizontal padding for Columns.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 )) 
   );

   $wp_customize->add_setting( 'te_column_top_padding',
      array('default'    => '0', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_column_top_padding', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_column_patterns',
            'label' => __( '','the-educator'),
            'settings'   => 'te_column_top_padding', 
            'description' => __( '% top padding for Columns.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 )) 
   );

   $wp_customize->add_setting( 'te_column_bottom_padding',
      array('default'    => '0', 
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'te_sanitize_number_range') 
   );
   $wp_customize->add_control( 'te_column_bottom_padding', 
      array('type' => 'number',
            'priority' => 10,
            'section' => 'te_column_patterns',
            'label' => __( '','the-educator'),
            'settings'   => 'te_column_bottom_padding', 
            'description' => __( '% bottom padding for Columns.','the-educator'),
            'input_attrs' => array( 'min' => 0, 'max' => 25, 'style' => 'width: 80px;', 'step'	=> 5 )) 
   );
}


function te_customize_column_blocks_styles() {

   
      //
      // te-columns
      //
      te_generate_css_rule('.wp-block-media-text.te-columns,.wp-block-media-text.te-columns.has-background,.wp-block-columns.te-columns,.wp-block-columns.te-columns.has-background',
      ['style' => 'padding-top','setting' => 'te_column_top_padding','prefix'  => '','postfix' => 'vh'],
      ['style' => 'padding-bottom','setting' => 'te_column_bottom_padding','prefix'  => '','postfix' => 'vh']);
   te_generate_css_rule('.wp-block-media-text.te-columns.te-single-feature-columns,.wp-block-media-text.te-columns.has-background,.wp-block-columns.te-columns,.wp-block-columns.te-columns.has-background',
      ['style' => 'margin-top','setting' => 'te_column_y_margins','prefix'  => '','postfix' => 'vh !important'],
      ['style' => 'margin-bottom','setting' => 'te_column_y_margins','prefix'  => '','postfix' => 'vh !important']);
?>

<?php
   // future : refactor : we want to prevent empty media queries but efficiently!
   // $mod = get_theme_mod('te_column_x_padding');
   // if ( ! empty($mod) || $mod === "0" ) {?>
      @media screen and (min-width: 768px) { 
         <?php
            te_generate_css_rule(
               '.wp-block-media-text.te-columns,
               .wp-block-media-text.te-columns.has-background,
               .wp-block-columns.te-columns,
               .wp-block-columns.te-columns.has-background',
               ['style' => 'padding-left','setting' => 'te_column_x_padding','prefix'  => '','postfix' => '%'],
               ['style' => 'padding-right','setting' => 'te_column_x_padding','prefix'  => '','postfix' => '%']);
            te_generate_css_rule('.te-cover-columns, .te-cover-columns.has-background',
               ['style' => 'padding-left','setting' => 'te_cover_column_x_padding','prefix'  => '','postfix' => '%'],
               ['style' => 'padding-right','setting' => 'te_cover_column_x_padding','prefix'  => '','postfix' => '%']);
         ?>
      }
   <?php
   //}
   
}


