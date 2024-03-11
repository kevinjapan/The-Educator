<?php get_header(); ?>


<?php 
   // from here we are inserting wp- or te_ blocks, so we are loading <sections> or equivalent 
   // - so no wrap on this.
   if(have_posts()) :
      while(have_posts()) :

         the_post();
         the_content();

      endwhile; 
   endif;
?>

<?php get_footer(); ?>