<?php get_header(); ?>

<!-- this is the default page (non front-page) template -->

<?php // we don't show title by default the_title();?>

<?php 
   if(have_posts()) :
      while(have_posts()) :

         the_post();
         the_content();

      endwhile; 
   endif;
?>


<?php get_footer(); ?>