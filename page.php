<?php

// Default Page template
// All pages fallback on this if specific page is absent

get_header();
?>

<!-- The Educator Theme : Default Page -->



<h2><?php the_title(); ?></h2>

<?php 
   if(have_posts()) :
      while(have_posts()) :

         the_post();
         the_content();

      endwhile; 
   endif;
?>

<?php get_footer(); ?>