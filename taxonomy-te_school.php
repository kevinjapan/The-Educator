<?php get_header(); ?>


<div class="show_page_name">taxonomy-te_school.php</div>


<?php

//
// Information Architecture
//
// There are some differences in organisation eg:
// - Agriculture has no departments (sub-schools) - only courses (direct children of the school).
// - Engineering has departments - Mechanical & Structural - each of which contain courses.
//   Engineering school itself has no child courses.
//

$term_id = get_queried_object()->term_id;
$tax_name = 'te_school';
$children = get_term_children($term_id,$tax_name);


// school header & feature image
//
$image = get_term_meta($term_id, 'category_image', true);
?>

<section class="front_page cover_block bg_navy fade_in">

      <?php if($image):?>
         <img class="bg_img" src="<?php echo $image; ?>"/>
      <?php endif;?>

      <div class="overlay">
         <h4 style="margin:0;padding:0;">School of</h4>
         <h1><?php __( single_cat_title(),'the-educator'); ?></h1>
      </div>

</section>

<?php

// if school has departments (child schools) - display here
//
if(count($children) > 0) {
   ?>
      <section class="feature_tiles fade_in">
         <ul>
            <?php 
            foreach($children as $child) {
               $term = get_term_by('id',$child,$tax_name);
               $image = get_term_meta($child, 'category_image', true);
               ?>
               <li style="border:none;">
                  <img src="<?php echo $image;?>" style="border-radius:.25rem;" />
                  <h6 style="display:inline;padding:.5rem 1rem .5rem .5rem;background:white;border-radius:0 .25rem 0 0;">Department of</h6>
                  <h4 style="padding:0;padding-left:1rem;margin-top:0;">
                     <a href="<?php echo get_term_link($child,$tax_name);?>"><?php echo $term->name;?></a>
                  </h4>
               </li>
               <?php
            }
            ?>
         </ul>
      </section>
   <?php
}

// if school has no departments - display courses here
//
else {
   require_once 'template-parts/course-cards/course-cards.php';
}

?>





<?php get_footer(); ?>