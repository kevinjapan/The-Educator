<?php get_header(); ?>
<!-- category template -->

<?php
// we handle 'News' Posts here - our default.
// we handle generic Posts here (any custom category falling through template hierarchy)
?>

<div class="show_page_name">category.php</div>


<h1 class="fade_in"><?php single_cat_title();?></h1>

<section class="feature_tiles fade_in">
   <ul>
   <?php 
      if(have_posts()) {
         while(have_posts()) {
            the_post();?>
            
            <?php 
               // to do : news should have more text than cf course
            ?>
            <li class="news_tile">
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