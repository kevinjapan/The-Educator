<?php 

// Single Page for School Taxonomy (Term)
//

get_header(); 
?>

<!-- The Educator Theme : Single Taxonomy Term -->

<?php
// Information Architecture
// Generally, we assume a 2-level deep hierarchy of School\Department
// There are some differences in our organisation hierarchy eg:
// - Agriculture has no departments (sub-schools) - only courses (direct children of the school).
// - Arts & Humanities has departments - each of which contain courses.
// - Engineering school itself has no child courses.

$term = get_queried_object();
$display_term_type = $term->parent > 0 ? 'Department' : 'School';
$term_id = get_queried_object()->term_id;
$tax_name = 'te_school';
$children = get_term_children($term_id,$tax_name);

// Featured Image
$image = get_term_meta($term_id, 'school_image', true);

?>

<!-- The Educator Theme : Single Taxonomy Term -->

<section 
   id="te_cover_<?php echo get_the_id();?>" 
   class="wp-block-media-text alignwide is-stacked-on-mobile te-columns te-single-feature-columns bg_navy fade_in">

      <?php if($image):
         ?>
         <figure class="wp-block-media-text__media">
            <img src="<?php echo $image;?>"/>
         </figure>
      <?php endif;?>
      <div class="wp-block-media-text__content">
         <h3 style="margin:0;padding:0;"><?php echo $display_term_type;?> of</h3>
         <h1><?php __( single_cat_title(),'the-educator'); ?></h1>
      </div>

</section>

<?php

// if school has departments (child schools) - display here
if(count($children) > 0) {
   ?>
      <section class="feature_tiles fade_in">
         <ul>
            <?php 
            foreach($children as $child) {
               $term = get_term_by('id',$child,$tax_name);
               $image = get_term_meta($child, 'school_image', true);
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