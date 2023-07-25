<?php
/*
Template Name: Parent Page
*/

// Top level page in the nav
// To enable access to child pages in mobile (where there is no sub-menu dropdown),
// these pages must have links to sub-pages inside the page itself.
// Extract child pages from the 'top-menu' navigation and displays links to each.
//

?>

<?php get_header(); ?>

<div class="show_page_name">template-parent-page.php</div>


<h1><?php the_title(); ?></h1>



<section class="te_template_parent_page">

   <?php
   //
   // left-side spacing
   //
   ?>
   <div>
      <?php if(has_post_thumbnail()):?>
         <img src="<?php the_post_thumbnail_url('medium'); ?>"/>
      <?php endif;?></div>


   <?php
   //
   // the page itself
   //
   ?>
   <div>
      <?php 
         if(have_posts()) :
            while(have_posts()) :
               the_post();
               the_content();
            endwhile; 
         endif;
      ?>
   </div>


   <?php
   //
   // links to page's menu children
   //
   ?>
   <div>

      <?php

      // we display all menu sub-pages for the current selected page
      //
      $menu = wp_get_nav_menu_items('top-menu'); 

      // 'object_id' is the current post item - in our case 'page'
      $page_object_id = get_queried_object_id();

      // non-page objects (eg taxonomies) in the menu are not in page hierarchy 
      // they have no 'post_parent' relationship inside the menu
      // so we have to resolve our starting parent object to it's menu id.

      // get current page object from menu
      $single_menu_item_in_array = array_filter($menu, function($v) use ($page_object_id)  {
         return $v->object_id == $page_object_id;
      });

      $parent_menu_id = 0;

      if($single_menu_item_in_array) {

         // get menu id for current page object
         // assosiative array - so can't access via [0] - and we don't know key..
         $parent_menu_id = $single_menu_item_in_array[array_key_first($single_menu_item_in_array)]->ID;

         if($parent_menu_id) {

            // get all children
            $child_menu_items = array_filter($menu, function($v) use ($parent_menu_id) {
               return $v->menu_item_parent == $parent_menu_id;
            });
            ?>

            <ul>
               <?php
               foreach($child_menu_items as $child_menu_item) {
                  ?>
                  <li>
                     <a href="<?php echo $child_menu_item->url; ?>">
                        <?php echo $child_menu_item->title;?>
                     </a>
                  </li>
                  <?php
               }
               ?>
            </ul>

            <?php
         }
      }
      ?>
   </div>


</section>

<?php get_footer(); ?>