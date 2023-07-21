<?php get_header(); ?>


<?php
// to do :
// currently this cover_block is hardcoded into layout - fine
// but it uses site_title - inflexible
?>

<section class="front_page cover_block bg_navy fade_in ">
      <?php if(has_post_thumbnail()):?>
         <img class="bg_img" src="<?php the_post_thumbnail_url('cover'); ?>"/>
      <?php endif;?>

      <div class="overlay">
         <h1><?php echo get_bloginfo('name'); ?></h1>
         <p><?php echo get_bloginfo('description'); ?></p>
      </div>
</section>



<?php 
   // from here we are inserting wp- or te_ blocks, so we are loading <sections> or equivalent 
   // - so no wrap on this.
   if(have_posts()) :
      while(have_posts()) :

         the_post();
         the_content();

      endwhile; 
   endif;
?>

<?php get_footer(); ?>