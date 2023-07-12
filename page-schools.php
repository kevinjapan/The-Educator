<?php get_header(); ?>


<?php 

// we don't show title by default the_title();
// we provide page for 'schools' here
?>



<section class="feature_tiles">
   <ul>
      <?php 
      // 
      // get list of terms for 'te_school' taxonomy
      // rather this than a menu - since menu requires manual configuration.
      //
      $terms = get_terms( array( 
         'taxonomy' => 'te_school',    // exclude all non 'school' taxonomies.
         'parent'   => 0,              // top-level only
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
</section>

<?php 
   if(have_posts()) :
      while(have_posts()) :

         the_post();
         the_content();

      endwhile; 
   endif;
?>


<?php get_footer(); ?>