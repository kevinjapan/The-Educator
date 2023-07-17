<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php echo get_bloginfo('name');?></title>
        <?php wp_head(); ?>

    </head>


<body <?php body_class();?>>

<nav class="nav">
   
   <div class="logo_block">
      <a href="<?php echo get_site_url(); ?>" style="text-decoration:none;">
         <?php 
         if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
         } 
         ?>
         <?php echo get_bloginfo('name');?>
      </a>
   </div>

   <div class="nav_toggle_wrap">
      <div class="nav_toggle">
         <div class="toggle_bar"></div>
         <div class="toggle_bar"></div>
         <div class="toggle_bar"></div>
      </div>
   </div>

   <?php wp_nav_menu(
      array(
         'theme_location' => 'top-menu'
      )
   ); ?>

</nav>