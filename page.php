<?php get_header(); ?>


<div class="show_page_name">page.php</div>


<h3><?php the_title(); ?></h3>


<?php 
   if(have_posts()) :
      while(have_posts()) :

         the_post();
         the_content();

      endwhile; 
   endif;
?>


<?php get_footer(); ?>