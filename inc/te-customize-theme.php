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
                  'priority' => 25,
                  'title' => esc_html__( 'The Educator','the-educator'),
                  'description' => esc_html__('Customize your The Educator theme here.', 'the-educator'))
            );
         }
      }

      // to do : review all prev. sections / combos 

      //
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
      // $wp_customize->add_section( 'te_nav', 
      //    array('title'       => esc_html( 'Top Navigation', 'the-educator' ),
      //          'priority'    => 20,
      //          'capability'  => 'edit_theme_options',
      //          'description' => esc_html('You can customize the top navigation menu here.', 'the-educator'),
      //          'panel' => 'te_layout_panel'
      //    ) 
      // );
      // $wp_customize->add_section( 'te_header', 
      //    array('title'       => esc_html( 'Title and Tagline', 'the-educator' ),
      //          'priority'    => 30,
      //          'capability'  => 'edit_theme_options',
      //          'description' => esc_html('You can customize the display of your Site Identity here.', 'the-educator'),
      //          'panel' => 'te_layout_panel') 
      // );
      $wp_customize->add_section( 'te_header_img', 
         array('title'       => esc_html( 'FrontPage Header Image', 'the-educator' ),
               'priority'    => 40,
               'capability'  => 'edit_theme_options',
               'description' => esc_html('You can modify some aspects of the frontpage Header Image here. To change the image itself, go to \'Header Image\' at the top level of this menu.', 'the-educator'),
               'panel' => 'te_layout_panel',
               'active_callback' => 'is_front_page',) 
      );
      // $wp_customize->add_section( 'te_page_header_img', 
      //    array('title'       => esc_html( 'Pages Header Image', 'the-educator' ),
      //          'priority'    => 40,
      //          'capability'  => 'edit_theme_options',
      //          'description' => esc_html('You can modify some aspects of the page Header Image here for all pages other than the frontpage. To change the individual images themselves, select a \'Featured Image\' for each page in the Page Editor. If no Featured Image is selected, pages will default to the site \'Header Image\' as used by the frontpage.', 'the-educator'),
      //          'panel' => 'te_layout_panel',
      //          'active_callback' => 'te_is_general_page') 
      // );
      // $wp_customize->add_section( 'te_blog_header_img', 
      //    array('title'       => esc_html( 'Blog Header Image', 'the-educator' ),
      //          'priority'    => 40,
      //          'capability'  => 'edit_theme_options',
      //          'description' => esc_html__('The Educator Blog Header Image customizations.', 'the-educator'),
      //          'panel' => 'te_layout_panel',
      //          'active_callback' => 'te_is_blog_archive_page') 
      // );
      // $wp_customize->add_section( 'te_hero', 
      //    array('title'       => esc_html__( 'Hero Text', 'the-educator' ),
      //          'priority'    => 50,
      //          'capability'  => 'edit_theme_options',
      //          'description' => esc_html__('You can customize a hero text to overlay your frontpage header image here.', 'the-educator'),
      //          'panel' => 'te_layout_panel',
      //          'active_callback' => 'is_front_page',) 
      // );
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

      
      //
      // Theme Sections Settings/Controls combos
      //
      te_customize_theme_copyright($wp_customize);
      te_customize_theme_typography($wp_customize);
      te_customize_theme_frontpage($wp_customize);
      te_customize_theme_posts($wp_customize);



      /*
      // Top Navigation
       */
      // $wp_customize->add_setting( 'te_is_nav_sticky',
      // array('default'    => false, 
      //       'type'       => 'theme_mod',
      //       'capability' => 'edit_theme_options',
      //       'transport'  => 'postMessage',
      //       'sanitize_callback' => 'te_sanitize_checkbox') 
      // );
      // $wp_customize->add_control( 'te_is_nav_sticky', 
      //    array('type' => 'checkbox',
      //          'priority' => 10,
      //          'section' => 'te_nav',
      //          'settings'   => 'te_is_nav_sticky', 
      //          'input_attrs' => array( 'style' => 'width:100%;' ),
      //          'description' => esc_html__( 'Navigation always visible.','the-educator' ))
      // );
      

      /* Nav Text Color */
      // $wp_customize->add_setting( 'nav_color',
      //    array('default'    => '#ffffff', 
      //          'type'       => 'theme_mod',
      //          'capability' => 'edit_theme_options',
      //          'transport'  => 'postMessage',
      //          'sanitize_callback' => 'sanitize_hex_color') 
      // );
      // $wp_customize->add_control( new WP_Customize_Color_Control(
      //    $wp_customize, 
      //    'nav_color',
      //    array('label'      => esc_html__( 'Top Navigation Bar', 'the-educator' ), 
      //          'description' => esc_html__( 'text color' ,'the-educator'),
      //          'settings'   => 'nav_color', 
      //          'priority'   => 10,
      //          'section'    => 'te_nav') 
      // ));

      /* Nav BG Color */
      // $wp_customize->add_setting('nav_bg_color',
      //    array('capability' => 'edit_theme_options',
      //          'type'       => 'theme_mod',
      //          'default'    => '#000080',
      //          'transport'  => 'postMessage',
      //          'sanitize_callback' => 'sanitize_hex_color')
      // );
      // $wp_customize->add_control( new WP_Customize_Color_Control(
      //    $wp_customize, 
      //    'nav_bg_color',
      //    array('description' => esc_html__( 'background color' ,'the-educator'),
      //          'settings'   => 'nav_bg_color', 
      //          'priority'   => 10,
      //          'section'    => 'te_nav') 
      // ));

      /* Nav BG Opacity */
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

      /* Nav Dropdown Text Color */
      // $wp_customize->add_setting( 'nav_dropdown_color',
      //    array('default'    => '#000', 
      //          'type'       => 'theme_mod',
      //          'capability' => 'edit_theme_options',
      //          'transport'  => 'postMessage',
      //          'sanitize_callback' => 'sanitize_hex_color') 
      // );
      // $wp_customize->add_control( new WP_Customize_Color_Control(
      //    $wp_customize, 
      //    'nav_dropdown_color',
      //    array('label'      => esc_html__( 'Dropdown Sub-menu', 'the-educator' ), 
      //          'description' => esc_html__( 'text color' ,'the-educator'),
      //          'settings'   => 'nav_dropdown_color', 
      //          'priority'   => 10,
      //          'section'    => 'te_nav') 
      // ));
      
      /* Nav Dropdown BG Color */
      // $wp_customize->add_setting('nav_dropdown_bg_color',
      //    array('capability' => 'edit_theme_options',
      //          'type'       => 'theme_mod',
      //          'default'    => '#fff',
      //          'transport'  => 'postMessage',
      //          'sanitize_callback' => 'sanitize_hex_color')
      // );
      // $wp_customize->add_control( new WP_Customize_Color_Control(
      //    $wp_customize, 
      //    'nav_dropdown_bg_color',
      //    array('description' => esc_html__( 'background color' ,'the-educator'),
      //          'settings'   => 'nav_dropdown_bg_color', 
      //          'priority'   => 10,
      //          'section'    => 'te_nav') 
      // ));

      /* Nav Dropdown BG Opacity */
      // $wp_customize->add_setting( 'nav_dropdown_bg_opacity',
      //    array('default'    => '1', 
      //          'type'       => 'theme_mod',
      //          'capability' => 'edit_theme_options',
      //          'transport'  => 'postMessage',
      //          'sanitize_callback' => 'te_sanitize_number_range') 
      // );
      // /*$wp_customize->add_control( 'nav_dropdown_bg_opacity', 
      //    array('type' => 'number',
      //          'priority' => 10,
      //          'section' => 'te_nav',
      //          'settings'   => 'nav_dropdown_bg_opacity', 
      //          'description' => esc_html__( 'backround opacity','the-educator' ),
      //          'input_attrs' => array( 'min' => 0, 'max' => 1, 'style' => 'width: 80px;', 'step'	=> .1 ))
      // ); */

 
   

      // Hero Text & Layout
      

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
      
      /* Hero % screen width */
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
      
      /* Hero Text Alignment */
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
      
      /* Hero Alignment */
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
      

      /*
       * Title & Tagline Text & Layout
       */

      /* Title Text Color */
      // $wp_customize->add_setting( 'site_title_color',
      //    array('default'    => '#ffffff', 
      //          'type'       => 'theme_mod',
      //          'capability' => 'edit_theme_options',
      //          'transport'  => 'postMessage',
      //          'sanitize_callback' => 'sanitize_hex_color') 
      // );
      // $wp_customize->add_control( new WP_Customize_Color_Control(
      //    $wp_customize, 
      //    'site_title_color',
      //    array('label'      => esc_html__( 'Title and Tagline Text Color', 'the-educator' ), 
      //          'settings'   => 'site_title_color', 
      //          'priority'   => 10,
      //          'section'    => 'te_header') 
      // ));
      
      /* Title BG Color */
      // $wp_customize->add_setting( 'site_title_bg_color',
      //    array('default'    => '#000080',
      //          'type'       => 'theme_mod',
      //          'capability' => 'edit_theme_options',
      //          'transport'  => 'postMessage',
      //          'sanitize_callback' => 'sanitize_hex_color') 
      // );
      // $wp_customize->add_control( new WP_Customize_Color_Control(
      //    $wp_customize, 
      //    'site_title_bg_color',
      //    array('label'      => esc_html__( 'Title', 'the-educator' ), 
      //          'description' => esc_html__( 'background color','the-educator'),
      //          'settings'   => 'site_title_bg_color', 
      //          'priority'   => 10,
      //          'section'    => 'te_header') 
      // ));
      
      /* Title BG Opacity */
      // $wp_customize->add_setting( 'site_title_bg_opacity',
      //    array('default'    => '.5', 
      //          'type'       => 'theme_mod',
      //          'capability' => 'edit_theme_options',
      //          'transport'  => 'postMessage',
      //          'sanitize_callback' => 'te_sanitize_number_range') 
      // );
      // $wp_customize->add_control( 'site_title_bg_opacity', 
      //    array('type' => 'number',
      //          'priority' => 10,
      //          'section' => 'te_header',
      //          'settings'   => 'site_title_bg_opacity', 
      //          'description' => esc_html__( 'background opacity','the-educator'),
      //          'input_attrs' => array( 'min' => 0, 'max' => 1, 'style' => 'width: 80px;', 'step'	=> .1 )) 
      // );

      /* Tagline BG Color */
      // $wp_customize->add_setting( 'site_tagline_bg_color',
      //    array('default'    => '#000080',
      //          'type'       => 'theme_mod',
      //          'capability' => 'edit_theme_options',
      //          'transport'  => 'postMessage',
      //          'sanitize_callback' => 'sanitize_hex_color') 
      // );
      // $wp_customize->add_control( new WP_Customize_Color_Control(
      //    $wp_customize, 
      //    'site_tagline_bg_color',
      //    array('label'      => esc_html__( 'Tagline', 'the-educator' ),
      //          'description' => esc_html__( 'background color','the-educator'), 
      //          'settings'   => 'site_tagline_bg_color', 
      //          'priority'   => 10,
      //          'section'    => 'te_header') 
      // ));
      
      /* Tagline BG Opacity */
      // $wp_customize->add_setting( 'site_tagline_bg_opacity',
      //    array('default'    => '.5', 
      //          'type'       => 'theme_mod',
      //          'capability' => 'edit_theme_options',
      //          'transport'  => 'postMessage',
      //          'sanitize_callback' => 'te_sanitize_number_range') 
      // );
      // $wp_customize->add_control( 'site_tagline_bg_opacity', 
      //    array('type' => 'number',
      //          'priority' => 10,
      //          'section' => 'te_header',
      //          'settings'   => 'site_tagline_bg_opacity', 
      //          'description' => esc_html__( 'background opacity','the-educator'),
      //          'input_attrs' => array( 'min' => 0, 'max' => 1, 'style' => 'width: 80px;', 'step'	=> .1 )) 
      // );



      
      /* Header Height */
      // $wp_customize->add_setting( 'header_height', 
      //    array('default'    => '60', 
      //          'type'       => 'theme_mod', 
      //          'capability' => 'edit_theme_options', 
      //          'transport'  => 'postMessage',
      //          'sanitize_callback' => 'te_sanitize_number_range'
      //    ) 
      // );
      // $wp_customize->add_control( 'te_header_height', 
      //    array('type' => 'number',
      //          'priority' => 10,
      //          'section' => 'te_page_header_img',
      //          'label' => esc_html__( 'Image Height','the-educator'),
      //          'settings'   => 'header_height', 
      //          'description' => esc_html__( 'set the % height of the header image','the-educator'),
      //          'input_attrs' => array( 'min' => 20, 'max' => 100, 'style' => 'width: 80px;', 'step'	=> 5))
      // );


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


//
// setup theme customizer settings and controls
//
add_action( 'customize_register', array( 'TheEducatorThemeCustomizer' , 'register' ) );


//
// output custom css to frontend
//
add_action('wp_head', array( 'TheEducatorThemeCustomizer' , 'te_customizer_theme_styles' ) );

