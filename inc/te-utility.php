<?php

/*
 * utility funcs
 * @since Web Dev Agent 1.0
 */



if ( ! function_exists( 'te_is_general_page' ) ) :
   function te_is_general_page() {
      return !is_front_page() && !is_category('blog');
   }
endif;

if ( ! function_exists( 'te_sanitize_checkbox' ) ) :
   function te_sanitize_checkbox( $checked ) {
      return ((isset($checked) && true === $checked) ? true : false);
   }
endif;

if ( ! function_exists( 'te_is_blog_archive_page' ) ) :
   function te_is_blog_archive_page() {
      return is_category('blog');
   }
endif;


//
// Generate front-end css selector with rule(s) from our theme mods.
// These rules will not appear in the front-end until you have 'published' in the Customizer.
//
if ( ! function_exists( 'te_generate_css_rule' ) ) :

   function te_generate_css_rule($selector,...$rules) {

      $mod = null;
      $css = '';
      $css_inners = '';
      if(is_array($rules)) {
         foreach ($rules as $rule) {
            $mod = get_theme_mod($rule['setting']);
            if ( ! empty($mod) || $mod === "0" ) {
               $css_inners.= sprintf('%s:%s;',$rule['style'],$rule['prefix'].$mod.$rule['postfix']);
            }
         }
      }
      if($css_inners !== '') {
         $css = $selector . '{';
         $css.= $css_inners;
         $css.= '}';
         echo $css . "\n";
      }
   }

endif;


//
// Generate front-end css selector with rule(s) from our theme mods.
// Handle complex single-properties - eg "background-position: {top 20px right -10px};"
//
if ( ! function_exists( 'te_generate_complex_css_rule' ) ) :

   function te_generate_complex_css_rule( $selector, $style, $mod_names, $prefixes=array(), $postfixes=array() ) {
      $mod = null;
      $index = 0;
      if(is_array($mod_names)) {
         foreach ($mod_names as $mod_name) {
            $mod.= " " . $prefixes[$index] . get_theme_mod($mod_name) . $postfixes[$index++];
         }
      }
      // $prefix ?
      // if ( ! empty( $mod ) ) sprintf('%s{%s:%s;}',$selector,$style,$prefix.$mod.$postfix) . "\n";
   } 

endif;