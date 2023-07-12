<?php get_header(); ?>
<!-- archive template 2 -->


<div style="border:solid 1px lightgrey;color:lightgrey;">archive.php</div>
<?php 
   if(have_posts()) :
      while(have_posts()) :
         the_post();?>
         <div style="background:white;margin-block:2rem;">
         
            <?php if(has_post_thumbnail()):?>
               <img src="<?php the_post_thumbnail_url('large'); ?>"/>
            <?php endif;?>

            <?php
            the_title();
            the_excerpt();
            ?>

            <a href="<?php the_permalink(); ?>">read more</a>

         </div>
         <?php
      endwhile; 
   endif;
?>
<!-- wp_link_pages() -->

<?php get_footer(); ?>