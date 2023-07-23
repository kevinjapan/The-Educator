<?php get_header(); ?>
<!-- category template -->

<div class="show_page_name">category-research-news.php</div>

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
               <a style="float:right;" href="<?php the_permalink(); ?>">read more</a>
            </li>
            <?php
         } 
      }
   ?>
   </ul>
</section>



<?php get_footer(); ?>