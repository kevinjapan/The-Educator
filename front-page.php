<?php get_header(); ?>

<section class="front_page cover_block bg_navy fade_in">

      <?php if(has_post_thumbnail()):?>
         <img class="bg_img" src="<?php the_post_thumbnail_url('cover'); ?>"/>
      <?php endif;?>

      <div class="overlay">
         <h1><?php echo get_bloginfo('name'); ?></h1>
         <p><?php echo get_bloginfo('description'); ?></p>
      </div>

</section>

<?php // we don't show title by default the_title();?>

<section>
<?php 


   if(have_posts()) :
      while(have_posts()) :

         the_post();
         the_content();

      endwhile; 
   endif;
?>
</section>

<?php get_footer(); ?>