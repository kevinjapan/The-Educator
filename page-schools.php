<?php get_header(); ?>


<div class="show_page_name">page-schools.php</div>


<section class="feature_tiles fade_in">
   <h3>Schools</h3>
   <ul>
      <?php 

      // get list of terms for 'te_school' taxonomy
      // rather this than a menu - since menu requires manual configuration.
      //
      $terms = get_terms( array( 
         'taxonomy' => 'te_school',    // exclude all non 'school' taxonomies.
         'parent'   => 0,              // top-level only
         'hide_empty' => false,         // show all regardless
      ));


      foreach($terms as $term) {
         $image = get_term_meta($term->term_id, 'category_image', true);
         ?>
         <li style="border:none;">
            <?php
               //echo get_term_meta( $term->term_id, 'te_text', true )

               if($image) {
                  ?>
                  <img style="border-radius:.25rem;" src="<?php echo $image; ?>"/>
                  <?php
               }
               else {
                  ?><p style="height:20px;"></p><?php
               }
               ?>

            <h3 style="text-align:center;">
               <a href="<?php echo get_term_link($term->name,'te_school'); ?>"><?php echo $term->name;?></a>
            </h3>

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