<?php
require_once get_template_directory() . '/inc/te-sanitize.php';


// Settings Control Combos
require_once get_template_directory() . '/inc/customizer-theme-combos/te-customize-theme-copyright.php';
require_once get_template_directory() . '/inc/customizer-theme-combos/te-customize-theme-typography.php';
require_once get_template_directory() . '/inc/customizer-theme-combos/te-customize-theme-posts.php';
require_once get_template_directory() . '/inc/customizer-theme-combos/te-customize-theme-frontpage.php';

//
// TheEducatorThemeCustomizer
// Creates 'The Educator' Theme Controls in Customizer.
// Generates front-end CSS from the configured Settings.
// 

class TheEducatorThemeCustomizer {

   public function __construct() {}

   public static function register ( $wp_customize ) {

      // $site_uri = get_template_directory_uri();
      $wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
      $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';


      //
      // The Educator Theme panel
      //
      if ( class_exists( 'WP_Customize_Panel' ) ) {
         if ( ! $wp_customize->get_panel( 'te_layout_panel' ) ) {
            $wp_customize->add_panel(
               'te_layout_panel',
               array(
                  'priority' => 60,
                  'title' => esc_html__( 'The Educator Theme','the-educator'),
                  'description' => esc_html__('Customize your The Educator theme here.', 'the-educator'))
            );
         }
      }


      // Theme Customizer Sections
      //
      $wp_customize->add_section( 'te_typography', 
         array('title'       => esc_html( 'Typography', 'the-educator' ),
               'priority'    => 10,
               'capability'  => 'edit_theme_options',
               'description' => esc_html('You can assign any custom font families you have included via a font plugin here.', 'the-educator'),
               'panel' => 'te_layout_panel',
               'active_callback' => ''
         ) 
      );
      $wp_customize->add_section( 'te_header_img', 
         array('title'       => esc_html( 'FrontPage Header Image', 'the-educator' ),
               'priority'    => 40,
               'capability'  => 'edit_theme_options',
               'description' => esc_html('You can modify some aspects of the frontpage Header Image here. To change the image itself, go to \'Header Image\' at the top level of this menu.', 'the-educator'),
               'panel' => 'te_layout_panel',
               'active_callback' => 'is_front_page',) 
      );
      $wp_customize->add_section( 'te_posts', 
         array('title'       => esc_html__( 'Posts', 'the-educator' ),
               'priority'    => 52,
               'capability'  => 'edit_theme_options',
               'description' => esc_html__('Customize the layout of your posts.', 'the-educator'),
               'panel' => 'te_layout_panel') 
      );
      $wp_customize->add_section( 'te_copyright', 
         array('title'       => esc_html__( 'Copyright', 'the-educator' ),
               'priority'    => 52,
               'capability'  => 'edit_theme_options',
               'description' => esc_html__('You can customize the site\'s footer Copyright Notice here.', 'the-educator'),
               'panel' => 'te_layout_panel') 
      );
      

      //
      // Add settings and controls inside the theme panel sections
      //
      
      // Theme Sections Settings/Controls combos
      //
      te_customize_theme_copyright($wp_customize);
      te_customize_theme_typography($wp_customize);
      te_customize_theme_frontpage($wp_customize);
      te_customize_theme_posts($wp_customize);

      // Nav BG Opacity 
      //
      $wp_customize->add_setting( 'nav_bg_opacity',
         array('default'    => '1', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'nav_bg_opacity', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_nav',
               'settings'   => 'nav_bg_opacity', 
               'description' => esc_html__( 'background opacity','the-educator' ),
               'input_attrs' => array( 'min' => 0, 'max' => 1, 'style' => 'width: 80px;', 'step'	=> .1 ))
      ); 


      // Hero Text & Layout
      //

      // Hero Text
      $wp_customize->add_setting( 'te_hero_text',
         array('default'    => 'hero text here!', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'sanitize_text_field') 
      );
      $wp_customize->add_control( 'te_hero_text', 
         array('type' => 'text',
               'priority' => 10,
               'section' => 'te_hero',
               'settings'   => 'te_hero_text', 
               'label'      => esc_html__( 'Hero Text','the-educator'), 
               'description' => esc_html__( 'the text','the-educator'),
               'input_attrs' => array('style' => 'width: 96%;')) 
      );
      

      // Hero Text Color
      //
      $wp_customize->add_setting( 'te_hero_text_color',
         array('default'    => '#ffffff', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'sanitize_hex_color') 
      );
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize, 
         'te_hero_text_color',
         array('description' => esc_html__( 'text color','the-educator'),
               'settings'   => 'te_hero_text_color', 
               'priority'   => 10,
               'section'    => 'te_hero') 
      ));
      
      // Hero Text BG Color
      $wp_customize->add_setting( 'te_hero_text_bg_color',
         array('default'    => '#000080',
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'sanitize_hex_color') 
      );
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize, 
         'te_hero_text_bg_color',
         array('label'      => esc_html__( 'Background', 'the-educator' ), 
               'description' => esc_html__( 'background color','the-educator'),
               'settings'   => 'te_hero_text_bg_color', 
               'priority'   => 10,
               'section'    => 'te_hero') 
      ));
      
      // Hero Text BG Opacity
      $wp_customize->add_setting( 'te_hero_text_bg_opacity',
         array('default'    => '.5', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'te_hero_text_bg_opacity', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_hero',
               'settings'   => 'te_hero_text_bg_opacity', 
               'description' => esc_html__( 'background opacity','the-educator'),
               'input_attrs' => array( 'min' => 0, 'max' => 1, 'style' => 'width: 80px;', 'step'	=> .1 ))
      );
      

      // Hero % screen width 
      //
      $wp_customize->add_setting( 'hero_x_width',
         array('default'    => '100', 
               'type'       => 'theme_mod',
               'capability' => 'edit_theme_options',
               'transport'  => 'postMessage',
               'sanitize_callback' => 'te_sanitize_number_range') 
      );
      $wp_customize->add_control( 'hero_x_width', 
         array('type' => 'number',
               'priority' => 10,
               'section' => 'te_hero',
               'label' => esc_html__( 'Width','the-educator'),
               'settings'   => 'hero_x_width', 
               'description' => esc_html__( '% screen width.','the-educator'),
               'input_attrs' => array( 'min' => 20, 'max' => 100, 'style' => 'width: 80px;', 'step'	=> 5 )) 
      );
      
      // Hero Text Alignment
      //
      $wp_customize->add_setting( 'te_hero_text_align', 
         array('default' 	        => 'Center',
               'transport'         => 'postMessage',
               'sanitize_callback' => 'sanitize_text_field'
      ) );
      $wp_customize->add_control( 'te_hero_text_align', 
         array('label'        => esc_html( 'Alignment', 'the-educator' ),
               'description' => esc_html( 'align hero text inside block','the-educator'),
               'section'      => 'te_hero',
               'type'         => 'select',
               'settings'     => 'te_hero_text_align', 
               'choices' 	  	=> array(		
                  'start'=> 'Start',
                  'center'   	=> 'Center',
                  'end'  => 'End'),	
               'input_attrs' => array( 'style' => 'width: 80px;' )) 
      );
      
      // Hero Alignment
      //
      $wp_customize->add_setting( 'te_hero_align', 
         array('default' 	        => 'Center',
               'transport'         => 'postMessage',
               'sanitize_callback' => 'sanitize_text_field') 
      );
      $wp_customize->add_control( 'te_hero_align', 
         array('label'        => esc_html( '', 'the-educator' ),
               'description' => esc_html__( 'align hero text block on page','the-educator'),
               'section'      => 'te_hero',
               'type'         => 'select',
               'settings'     => 'te_hero_align', 
               'choices' 	  	=> array(		
                  'flex-start'=> 'Start',
                  'center'   	=> 'Center',
                  'flex-end'  => 'End'),	
         'input_attrs' => array( 'style' => 'width: 80px;' )) 
      );
   
   }


   public static function te_customizer_theme_styles() {
      ?>
      <!-- The Educator Theme Customizer CSS --> 
      <style id="the-educator-custom-theme" type="text/css">
      <?php 
      //
      // Theme Customizer Styles
      //
      te_customize_theme_copyright_styles();
      te_customize_theme_typography_styles();
      te_customize_theme_posts_styles();
      te_customize_theme_frontpage_styles();
      ?>
      </style> 
      <!-- The Educator Theme Customizer -->
      <?php
   }

}


// Setup theme customizer settings and controls
//
add_action( 'customize_register', array( 'TheEducatorThemeCustomizer' , 'register' ) );


// output custom css to frontend
//
add_action('wp_head', array( 'TheEducatorThemeCustomizer' , 'te_customizer_theme_styles' ) );

