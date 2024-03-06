<?php
/*
Template Name: Domain FrontPage
*/

//
// Site Domain FrontPage
// Corresponds to the top-level nav items - domains - on our site,
// providing functional layout for the frontpage of each site domain.
//
// Since touch and mobile don't have full menu exposed in dropdowns,
// we provide links to the sub-menu pages on the domain frontpage itself.
// We extract child pages from 'top-menu' nav and display as links.
// Not all domain frontpages may need to use this template.
//
// The line 'Template Name' above and the file name exposes this file as 
// a valid Template in the Page Editor - allowing users to select this as 
// a template for any given page.
//

?>

<?php get_header(); ?>
<h1><?php the_title(); ?></h1>

<section class="te_template_domain_frontpage">

   <?php
   // Featured Image
   //
   ?>
   <div>
      <?php if(has_post_thumbnail()):?>
         <img src="<?php the_post_thumbnail_url('medium'); ?>"/>
      <?php endif;?>
   </div>


   <?php
   // Content
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
   // Child Page Links
   //
   ?>
   <div>
      <?php
      $parent_menu_id = 0;

      // get the full top-menu
      $menu = wp_get_nav_menu_items('top-menu');

      // get of the current queried item - our current domain frontpage
      $page_object_id = get_queried_object_id();

      // Get the menu item for the current page.
      // non-page objects (eg taxonomies) in the menu are not in page hierarchy
      // we resolve our parent object to it's menu id
      $current_pages_menu_item = array_filter($menu, function($v) use ($page_object_id)  {
         return $v->object_id == $page_object_id;
      });

      if($current_pages_menu_item) {

         // Get menu id
         // assosiative array - so can't access via [0] - and we don't know key..
         $parent_menu_id = $current_pages_menu_item[array_key_first($current_pages_menu_item)]->ID;

         if($parent_menu_id) {

            // Display links to child menu items
            $child_menu_items = array_filter($menu, function($v) use ($parent_menu_id) {
               return $v->menu_item_parent == $parent_menu_id;
            });            
            ?>
            <ul>
               <?php
               foreach($child_menu_items as $child_menu_item) {?>
                  <li>
                     <a href="<?php echo $child_menu_item->url; ?>"><?php echo $child_menu_item->title;?></a>
                  </li>
                  <?php
               }?>
            </ul>
            <?php
         }
      }
      ?>
   </div>

</section>

<?php get_footer(); ?>