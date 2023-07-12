<?php get_header(); ?>

   <?php while ( have_posts() ) : the_post(); ?>

      <section class="front_page cover_block bg_navy fade_in">
            <?php if(has_post_thumbnail()):?>
               <img class="bg_img" src="<?php the_post_thumbnail_url('cover'); ?>"/>
            <?php endif;?>
            <div class="overlay">
               <h1><?php the_title(); ?></h1>
               <p><?php echo get_post_meta( get_the_ID(), 'te_casestudy_tagline', true ); ?></p>
            </div>
      </section>

      <?php the_content();?>

   <?php endwhile;
   ?>

            
   <div style="display:flex;gap:2rem;">
      <div><?php next_post_link('&laquo; %link', 'prev project' ); ?></div>
      <div><?php previous_post_link( ' %link &raquo;', 'next project' ); ?></div>
   </div>



<?php get_footer(); ?>