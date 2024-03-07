<?php
require_once get_template_directory() . '/inc/te-sanitize.php';



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

      //
      // Add theme panel sections
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
      // $wp_customize->add_section( 'te_header_img', 
      //    array('title'       => esc_html( 'FrontPage Header Image', 'the-educator' ),
      //          'priority'    => 40,
      //          'capability'  => 'edit_theme_options',
      //          'description' => esc_html('You can modify some aspects of the frontpage Header Image here. To change the image itself, go to \'Header Image\' at the top level of this menu.', 'the-educator'),
      //          'panel' => 'te_layout_panel',
      //          'active_callback' => 'is_front_page',) 
      // );
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
               'description' => esc_html__('You can customize the site\'s Copyright Footer Notice here.', 'the-educator'),
               'panel' => 'te_layout_panel') 
      );
      


      //
      // Add settings and controls inside the theme panel sections
      //

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
      // $wp_customize->add_setting( 'frontpage_header_height', 
      //    array('default'    => '100', 
      //          'type'       => 'theme_mod', 
      //          'capability' => 'edit_theme_options', 
      //          'transport'  => 'postMessage',
      //          'sanitize_callback' => 'te_sanitize_number_range') 
      // );
      // $wp_customize->add_control( 'te_frontpage_header_height', 
      //    array('type' => 'number',
      //          'priority' => 10,
      //          'section' => 'te_header_img',
      //          'label' => esc_html__( 'Image Height','the-educator'),
      //          'settings'   => 'frontpage_header_height', 
      //          'description' => esc_html__( 'set the % height of the header image','the-educator'),
      //          'input_attrs' => array( 'min' => 20, 'max' => 100, 'style' => 'width: 80px;', 'step'	=> 5 )) 
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

      /* Site Header BG Color - used in sm viewports / rqrd for hero text contrast */
      // $wp_customize->add_setting( 'frontpage_header_bg_color',
      //    array('default'    => '#000080',
      //          'type'       => 'theme_mod',
      //          'capability' => 'edit_theme_options',
      //          'transport'  => 'postMessage',
      //          'sanitize_callback' => 'sanitize_hex_color') 
      // );
      // $wp_customize->add_control( new WP_Customize_Color_Control(
      //    $wp_customize, 
      //    'frontpage_header_bg_color',
      //    array('label'      => esc_html__( 'Background color', 'the-educator' ),
      //          'description' => esc_html__( 'Your image may not cover the full height in mobile screens - use a background color to display your hero text.','the-educator'), 
      //          'settings'   => 'frontpage_header_bg_color', 
      //          'priority'   => 10,
      //          'section'    => 'te_header_img') 
      // ));

      /* Blog Archive (Category) Header Img */
      // $wp_customize->add_setting( 'blog_header_img', 
      //    array('default'    => '', 
      //          'type'       => 'theme_mod', 
      //          'capability' => 'edit_theme_options', 
      //          'transport'  => 'postMessage',
      //          'sanitize_callback' => 'esc_url_raw') 
      // );
      // $wp_customize->add_control(
      //    new WP_Customize_Image_Control(
      //       $wp_customize,
      //       'blog_header_img',
      //       array('label' => esc_html__( 'Blog Archive Header Image','the-educator' ),
      //             'description' => esc_html__( 'Select the Header Image for the Blog Archive page. If no image is selected here, the page will default to the site \'Header Image\' as used by the frontpage.' ,'the-educator'),
      //             'section' => 'te_blog_header_img',
      //             'settings' => 'blog_header_img',
      //             'active_callback' => 'te_is_blog_archive_page'))
      // );

      /* Header Alignment */
      // $wp_customize->add_setting( 'te_header_align', 
      //    array('default' 	        => 'Center',
      //          'transport'         => 'postMessage',
      //          'sanitize_callback' => 'sanitize_text_field') 
      // );
      // $wp_customize->add_control( 'te_header_align', 
      //    array('label'        => esc_html( 'Alignment', 'the-educator' ),
      //          'description'  => esc_html__( 'title & tagline block','the-educator'),
      //          'section'      => 'te_header',
      //          'type'         => 'select',
      //          'settings'     => 'te_header_align', 
      //          'choices' 	   => array(		
      //             'flex-start'=> 'Start',
      //             'center'   	=> 'Center',
      //             'flex-end'  => 'End'),	
      //          'input_attrs' => array( 'style' => 'width: 80px;' )) 
      // );

      /* Header Text Alignment */
      // $wp_customize->add_setting( 'te_header_text_align', 
      //    array('default' 	        => 'Center',
      //          'transport'         => 'postMessage',
      //          'sanitize_callback' => 'sanitize_text_field'
      // ) );
      // $wp_customize->add_control( 'te_header_text_align', 
      //    array('label'        => esc_html( '', 'the-educator' ),
      //          'description' => esc_html( 'text inside block (applicable when text wraps)','the-educator'),
      //          'section'      => 'te_header',
      //          'type'         => 'select',
      //          'settings'     => 'te_header_text_align', 
      //          'choices' 	  	=> array(		
      //             'start'=> 'Start',
      //             'center'   	=> 'Center',
      //             'end'  => 'End'),	
      //          'input_attrs' => array( 'style' => 'width: 80px;' )) 
      // );
      

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
      

      /*
       * Footer
       */
      
      /* Copyright Notice */
      $wp_customize->add_setting( 'te_copyright',
         array('default'    => 'Copyright © ...', 
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
               'description' => esc_html__( 'the copyright notice','the-educator' ),
               'input_attrs' => array('style' => 'width: 96%;')) 
      );

   }


   // future: 
   // re-use some of these from edk theme

   //
   // frontend inline theme styles
   // 
   public static function te_customizer_theme_styles() {

      ?><!-- Theme Customizer CSS --> 
      <style id="the-educator-custom-theme" type="text/css">
      <?php 

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
      
      /* title and tagline overlay in header */
      // te_generate_css_rule('.te_titles',
      //    ['style' => 'align-self','setting' => 'te_header_align',  'prefix'  => '',  'postfix' => ''],
      //    ['style' => 'text-align','setting' => 'te_header_text_align',  'prefix'  => '',  'postfix' => '']);
      // te_generate_css_rule('.te_titles,.te_titles a',
      //    ['style' => 'color','setting' => 'site_title_color',  'prefix'  => '',  'postfix' => '']);
      // te_generate_css_rule('.te_titles__title,.te_titles__title.evolutiondesuka--tagline,.te_titles__title.evolutiondesuka--tagline h3',
      //    ['style' => 'align-self','setting' => 'te_header_align',  'prefix'  => '',  'postfix' => ''],
      //    ['style' => 'text-align','setting' => 'te_header_text_align',  'prefix'  => '',  'postfix' => '']);
      // te_generate_css_rule('.te_titles__bg',
      //    ['style' => 'background-color','setting' => 'site_title_bg_color',  'prefix'  => '',  'postfix' => ''],
      //    ['style' => 'filter',  'setting' => 'site_title_bg_opacity','prefix'  => 'opacity(','postfix' => ')']);
      // te_generate_css_rule('.te_titles--tagline_bg',
      //    ['style' => 'background-color','setting' => 'site_tagline_bg_color',  'prefix'  => '',  'postfix' => ''],
      //    ['style' => 'filter',  'setting' => 'site_tagline_bg_opacity','prefix'  => 'opacity(','postfix' => ')']);
      
      /* hero text overlay in frontpage header */
      // te_generate_css_rule('.te_hero_text',
      //    ['style' => 'width','setting' => 'hero_x_width','prefix'  => '','postfix' => 'vw'],
      //    ['style' => 'align-self','setting' => 'te_hero_align',  'prefix'  => '',  'postfix' => ''],
      //    ['style' => 'text-align','setting' => 'te_hero_text_align',  'prefix'  => '',  'postfix' => '']);
      // te_generate_css_rule('.te_hero_text h1,.te_hero_text h2,.te_hero_text h3',
      //    ['style' => 'font-family','setting' => 'te_hero_fonts',  'prefix'  => '',  'postfix' => $fallback_fonts]
      // );
      ?>
      /* @media screen and (max-width: 768px) {.te_hero_text {width:93vw;}} */
<?php
      // te_generate_css_rule('.te_hero_text,.te_hero_text h1,.te_hero_text h2,.te_hero_text h3',
      //    ['style' => 'color','setting' => 'te_hero_text_color',  'prefix'  => '',  'postfix' => '']);
      // te_generate_css_rule('.te_hero_text_bg',
      //    ['style' => 'background-color','setting' => 'te_hero_text_bg_color',  'prefix'  => '',  'postfix' => ''],
      //    ['style' => 'filter',  'setting' => 'te_hero_text_bg_opacity','prefix'  => 'opacity(','postfix' => ')']);

      /* evolutiondesuka-navigation */
      // te_generate_css_rule('.evolutiondesuka-navigation .te_dropdown .menu > .menu-item > a',
      //    ['style' => 'color','setting' => 'nav_color',  'prefix'  => '',  'postfix' => '']);
      // te_generate_css_rule('.evolutiondesuka-navigation_bg',
      //    ['style' => 'background-color','setting' => 'nav_bg_color',  'prefix'  => '',  'postfix' => ''],
      //    ['style' => 'filter',          'setting' => 'nav_bg_opacity','prefix'  => 'opacity(','postfix' => ')']);
      // te_generate_css_rule('.evolutiondesuka-navigation .te_dropdown .menu .sub-menu a, .te_dropdown__close',
      //    ['style' => 'color','setting' => 'nav_dropdown_color',  'prefix'  => '',  'postfix' => '']);
      // ?>@media screen and (min-width: 992px){
<?php
      // te_generate_css_rule('.te_dropdown .menu > .menu-item.menu-item-has-children:hover > a,.te_dropdown .menu > .menu-item:hover > a',
      //   ['style' => 'border','setting' => 'nav_color',  'prefix'  => 'solid 1px ',  'postfix' => '']);
      // te_generate_css_rule('.te_dropdown .menu > ul > .page_item.page_item_has_children:hover > a',
      //   ['style' => 'border','setting' => 'nav_color',  'prefix'  => 'solid 1px ',  'postfix' => '']);
      ?>
      // }
<?php
//       te_generate_css_rule('.evolutiondesuka-navigation .te_dropdown .sub-menu, .te_dropdown__close',
//          ['style' => 'background-color','setting' => 'nav_dropdown_bg_color',  'prefix'  => '',  'postfix' => '']      );
//       // if no user-created menu - handle WP default page evolutiondesuka-navigation
//       te_generate_css_rule('.evolutiondesuka-navigation .te_dropdown .children, .te_dropdown__close',
//          ['style' => 'background-color','setting' => 'nav_dropdown_bg_color',  'prefix'  => '',  'postfix' => '']);
// 
?>
/* @media screen and (max-width: 992px) { */
<?php
//       te_generate_css_rule('.evolutiondesuka-navigation .te_dropdown .te_dropdown__menu  .menu > .menu-item > a',
//          ['style' => 'color','setting' => 'nav_dropdown_color',  'prefix'  => '',  'postfix' => '']);
//       te_generate_css_rule('.evolutiondesuka-navigation .te_dropdown .te_dropdown__menu .menu .menu-item a',
//          ['style' => 'color','setting' => 'nav_dropdown_color',  'prefix'  => '',  'postfix' => ''] );
//       te_generate_css_rule('.evolutiondesuka-navigation .te_dropdown .te_dropdown__menu',
//          ['style' => 'background-color','setting' => 'nav_dropdown_bg_color',  'prefix'  => '',  'postfix' => '']);
//       
?>
/* } */
// @media screen and (hover:none)  {
<?php
      // te_generate_css_rule('.evolutiondesuka-navigation .te_dropdown .te_dropdown__menu  .menu > .menu-item > a',
      //    ['style' => 'color','setting' => 'nav_dropdown_color',  'prefix'  => '',  'postfix' => '']);
      // te_generate_css_rule('.evolutiondesuka-navigation .te_dropdown .te_dropdown__menu .menu .menu-item a',
      //    ['style' => 'color','setting' => 'nav_dropdown_color',  'prefix'  => '',  'postfix' => ''] );
      // te_generate_css_rule('.evolutiondesuka-navigation .te_dropdown .te_dropdown__menu',
      //    ['style' => 'background-color','setting' => 'nav_dropdown_bg_color',  'prefix'  => '',  'postfix' => '']);
      
      // te_generate_css_rule('.te_dropdown_bg',
      //    ['style' => 'background-color','setting' => 'nav_dropdown_bg_color',  'prefix'  => '',  'postfix' => '']);
      // 
      ?>
      /* } */
</style> 
<!--/ Theme Customizer -->
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

