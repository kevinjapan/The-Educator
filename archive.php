<?php

// Default Archive Page (currently un-used)
// 

get_header(); 
?>

<!-- The Educator Theme : Archive -->

<section class="feature_tiles fade_in">
   <ul>
   <?php 
      if(have_posts()) :
         while(have_posts()) :
            the_post();?>
            <li style="background:white;margin-block:2rem;">
            
               <?php if(has_post_thumbnail()) { 
                  ?>
                  <img src="<?php the_post_thumbnail_url('large'); ?>"/>
                  <?php
               }
               ?>

               <h3><?php echo the_title();?></h3>
               <p><?php echo the_excerpt();?></p>

               <a href="<?php the_permalink(); ?>">read more</a>

               </li>
            <?php
         endwhile; 
      endif;
   ?>
   </ul>
</section>

<section style="display:flex;">
   <?php posts_nav_link('&nbsp;&nbsp;','prev','next'); ?>
</section>

<!-- wp_link_pages() -->

<?php get_footer(); ?>