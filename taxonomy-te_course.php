<?php get_header(); ?>


<div style="color:lightgrey;margin-top:2rem;margin-bottom:2rem;">taxonomy-te_course.php test 43</div>

<h1 class="fade_in"><?php __( single_cat_title(),'te'); ?></h1>


<?php

$term_id = get_queried_object()->term_id;
$tax_name = 'te_school';
$children = get_term_children($term_id,$tax_name);


//
// to do : review and improve - crude, currently, we just assume no child taxonomy, then we are at lowest level..
//
if(count($children) > 0) {
   echo '<ul>';

   foreach($children as $child) {
      $term = get_term_by('id',$child,$tax_name);
      echo '<li><a href="' . get_term_link($child,$tax_name) . '">' . $term->name  . '</a></li>';
   }

   echo '</ul>';
}
else {


?>
<section class="fade_in" style="display:flex;border:solid 1px navy;">
   <ul>
   <?php 
      if(have_posts()) {
         while(have_posts()) {
            the_post();?>
            
            <li class="te_card">
               <h4><?php the_title();?></h4>
               <?php if(has_post_thumbnail()):?>
                  <img src="<?php the_post_thumbnail_url('large'); ?>"/>
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


<!-- <section class="feature_tiles">
   <ul>
      <?php 
      // 
      // get list of terms for 'te_school' taxonomy
      // rather this than a menu - since menu requires manual configuration.
      //
      $terms = get_terms( array( 
         'taxonomy' => 'te_school',    // exclude all non 'school' taxonomies.
         // 'parent'   => 0,              // top-level only
         'hide_empty' => false         // show all regardless
   ) );

      foreach($terms as $term) {
         ?>
         <li>
            <h3>
               <a href="<?php echo get_term_link($term->name,'te_school'); ?>"><?php echo $term->name;?></a>
            </h3>

            <img src="<?php the_post_thumbnail_url('large'); ?>"/>

         </li>
         <?php
      }
      ?>
   </ul>
</section> -->






<!-- <section class="feed_list fade_in">
   <ul>
   <?php 
      if(have_posts()) {
         while(have_posts()) {
            the_post();?>
            
            <li>inside
               <!-- <h4><?php the_title();?></h4>
               <?php if(has_post_thumbnail()):?>
                  <img src="<?php the_post_thumbnail_url('large'); ?>"/>
               <?php endif;?>
               <?php the_excerpt();?>
               <a style="float:right;" href="<?php the_permalink(); ?>">read more</a> -->
            </li>
            <?php
         } 
      }
   ?>
   </ul>
</section> -->
below the bit



<?php get_footer(); ?>