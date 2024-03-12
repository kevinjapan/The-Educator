<?php

// Archive Page for Research News Posts
// Our Posts are categorised into [News,Research News], so we are using categories to filter them, 
// thus allowing all similar blog-type items to be added as Posts but with separation on front-end.

get_header(); 
?>

<!-- The Educator Theme : Research News Archive -->

<h1 class="fade_in"><?php single_cat_title();?></h1>

<?php 
// future : improve layout of 'stagger_tiles'
// but ensure we retain underlying functionality - this remains a modification of 'feature_tiles'
?>

<section class="feature_tiles stagger_tiles fade_in">
   <ul>
   <?php 
      if(have_posts()) {
         while(have_posts()) {
            the_post();?>
            
            <li style="border:none;">
               <?php if(has_post_thumbnail()):?>
                  <img src="<?php the_post_thumbnail_url('large'); ?>"/>
               <?php endif;?>
               <h4><?php the_title();?></h4>
               <?php the_excerpt();?>
               
               <div class="wp-block-button te_button">
                  <a class="wp-block-button__link wp-element-button" href="<?php the_permalink(); ?>">read more</a>
               </div>
            </li>
            <?php
         } 
      }
   ?>
   </ul>
</section>



<?php get_footer(); ?>