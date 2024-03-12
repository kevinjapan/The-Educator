<?php

// Archive Page for Courses Custom Post Type
// Our Posts are categorised into [News,Research News], so we are using categories to filter them, 
// thus allowing all similar blog-type items to be added as Posts but with separation on front-end.

get_header();
?>

<!-- The Educator Theme : Courses Archive -->

<h1 class="fade_in"><?php single_cat_title();?></h1>

<section class="feed_list fade_in">IN THIS
   <ul>
   <?php 
      if(have_posts()) {
         while(have_posts()) {
            the_post();?>
            
            <li>
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


<?php get_footer(); ?>