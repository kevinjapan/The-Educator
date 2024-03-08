<?php

// Register Theme Customizer Settings and Controls
//
function te_customize_theme_posts($wp_customize) {


   /*
   * Posts
   */

   /* te_posts */
   $wp_customize->add_setting( 'te_is_posts_sidebar',
   array('default'    => true, 
         'type'       => 'theme_mod',
         'capability' => 'edit_theme_options',
         'transport'  => 'postMessage',
         'sanitize_callback' => 'te_sanitize_checkbox') 
   );
   $wp_customize->add_control( 'te_is_posts_sidebar', 
      array('type' => 'checkbox',
            'priority' => 10,
            'section' => 'te_posts',
            'label' => esc_html__( 'posts sidebar','the-educator'),
            'settings'   => 'te_is_posts_sidebar', 
            'input_attrs' => array( 'style' => 'width:100%;' ),
            'description' => esc_html__( 
               'Posts pages have a sidebar (may require refresh).
                  You can place functional widgets in the Post Sidebar under Appearance - Widgets.','the-educator' ))
   );

}


// Output Custom Block Pattern CSS to frontend (utilising Block Customizer Settings and Controls above)
//
function te_customize_theme_posts_styles() {


}


