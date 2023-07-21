<?php
/*
Template Name: Test2
*/
?>


<?php
   // cf. with page.php - the default page template
?>

<?php get_header(); ?>


<div class="show_page_name">page.php</div>

<h5>this is template-test.php</h5>

<h3><?php the_title(); ?></h3>

<section style="display:flex;">
   <div style="background:lightblue;width:70%;">
      <?php 
         if(have_posts()) :
            while(have_posts()) :

               the_post();
               the_content();

            endwhile; 
         endif;
      ?>
   </div>
   <div style="background:lightgreen;width:20%;">
      <!-- to do : enable and make this worthwhile.. -->
      <?php if(is_active_sidebar('page-sidebar')):?>
         <?php dynamic_sidebar('page-sidebar');?>
      <?php endif;?>
   </div>
</section>

<?php get_footer(); ?>