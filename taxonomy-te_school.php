<?php get_header(); ?>


<div class="show_page_name">taxonomy-te_school.php</div>



<!-- taxonomy-te_school.php -->





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
         <h1><?php __( single_cat_title(),'te'); ?></h1>
         <p><?php __( single_cat_title(),'te'); ?></p> <!-- to do : get description here -->
      </div>

</section>

<?php



// if school has departments (child schools) - display them here
//
if(count($children) > 0) {
   ?>
      <section class="feature_tiles fade_in" style="display:flex;border:solid 3px navy;max-width:100%;">
         <ul>
            <?php 
            foreach($children as $child) {
               $term = get_term_by('id',$child,$tax_name);
               $image = get_term_meta($child, 'category_image', true);
               ?>
               <li>
                  <img src="<?php echo $image;?>" />
                  <h6>Department of</h6>
                  <h3><a href="<?php echo get_term_link($child,$tax_name);?>"><?php echo $term->name;?></a></h3>
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
?>
   <section class="feature_tiles fade_in" style="display:flex;border:solid 1px navy;">
      <ul>
         <?php 
            if(have_posts()) {
               while(have_posts()) {
                  the_post();?>
                  <li class="te_card">
                     <h6>course</h6>
                     <h4><?php the_title();?></h4>
                     <?php if(has_post_thumbnail()):?>
                        <img src="<?php echo the_post_thumbnail_url('large'); ?>"/>
                     <?php endif;?>
                     <?php the_excerpt();?>
                     <a style="float:right;" href="<?php the_permalink(); ?>">read more</a>
                  </li>
                  <?php
               } 
            }
         ?>
      </ul>
   </section>
<?php
}

?>





<?php get_footer(); ?>