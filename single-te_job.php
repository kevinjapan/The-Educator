<?php get_header(); ?>

<div class="show_page_name">single-te_job.php</div>

   <?php 
   
   
   $details= (array) get_post_meta( get_the_ID(),'_te_job_details_meta_key', true );

   while ( have_posts() ) : the_post(); ?>
 
      <h1><?php the_title(); ?></h1>
      <?php if(has_post_thumbnail()):?>
         <img src="<?php the_post_thumbnail_url('medium'); ?>"/>
      <?php endif;?>
                     
      <?php echo isset($details['school_or_section']) ? $details['school_or_section'] : '';?>

      <?php the_content();?>


   <?php endwhile; ?>
   
            
   <div style="display:flex;gap:2rem;">
      <div><?php next_post_link('&laquo; %link', '%title' ); ?></div>
      <div><?php previous_post_link( ' %link &raquo;', '%title' ); ?></div>
   </div>

<?php get_footer(); ?>