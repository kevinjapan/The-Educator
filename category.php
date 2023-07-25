<?php get_header(); ?>
<!-- category template -->

<?php
// we handle 'News' Posts here - our default.
// we handle generic Posts here (any custom category falling through template hierarchy)
?>

<div class="show_page_name">category.php</div>


<h1 class="fade_in"><?php single_cat_title();?></h1>

<section class="feature_tiles stagger_tiles fade_in">
   <ul>
   <?php 
      if(have_posts()) {
         while(have_posts()) {
            the_post();?>
            <li class="news_tile" style="border:none;">
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