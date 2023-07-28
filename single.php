<?php get_header(); ?>

<div class="show_page_name">single.php</div>

<?php while ( have_posts() ) : the_post(); ?>


<section class="front_page cover_block bg_navy fade_in">
      <?php if(has_post_thumbnail()):?>
         <img class="bg_img" src="<?php the_post_thumbnail_url('cover'); ?>"/>
      <?php endif;?>
      <div class="overlay">
         <h2><?php the_title(); ?></h2>
         <p><?php echo get_post_meta( get_the_ID(), 'te_course_teacher', true ); ?></p>
      </div>
</section>

<?php the_content();?>


<?php endwhile; ?>

   <div style="display:flex;gap:2rem;">
      <div><?php next_post_link('&laquo; %link', 'prev post' ); ?></div>
      <div><?php previous_post_link( ' %link &raquo;', 'next post' ); ?></div>
   </div>

<?php get_footer(); ?>

