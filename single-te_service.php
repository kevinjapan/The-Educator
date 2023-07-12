<?php get_header(); ?>


   <?php while ( have_posts() ) : the_post(); ?>
 
      <h1><?php the_title(); ?></h1>
      <?php if(has_post_thumbnail()):?>
         <img src="<?php the_post_thumbnail_url('medium'); ?>"/>
      <?php endif;?>
      <?php the_content();?>


   <?php endwhile; ?>
   
            
   <div style="display:flex;gap:2rem;">
      <div><?php next_post_link('&laquo; %link', '%title' ); ?></div>
      <div><?php previous_post_link( ' %link &raquo;', '%title' ); ?></div>
   </div>

<?php get_footer(); ?>