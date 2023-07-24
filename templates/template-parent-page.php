<?php
/*
Template Name: Parent Page
*/

//
// this represents a top level page in the nav - allowing access to child pages in mobile
//

?>


<?php
   // cf. with page.php - the default page template
?>

<?php get_header(); ?>


<div class="show_page_name">template-parent-page.php</div>

<h5>this is template-test.php</h5>

<h3><?php the_title(); ?></h3>

<section style="display:flex;">

   <div style="background:lightblue;width:70%;">
      <?php 
         if(have_posts()) :
            while(have_posts()) :

               the_post();
               the_content();

            endwhile; 
         endif;
      ?>
   </div>


   <div style="background:lightgreen;width:20%;">

      <ul>
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
      </ul>
   </div>

</section>

<?php get_footer(); ?>