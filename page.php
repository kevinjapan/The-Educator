<?php get_header(); ?>


<div class="show_page_name">page.php</div>


<?php
   // this is the default page template.
   // cf. with template-test.php
?>

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