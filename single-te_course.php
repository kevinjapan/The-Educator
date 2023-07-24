<?php get_header(); ?>

<div class="show_page_name">single-te_course.php</div>

   <?php while ( have_posts() ) : 
      the_post(); 
      
      $details= (array) get_post_meta( get_the_ID(),'_te_course_details_meta_key', true );

      ?>
         <h1><?php the_title(); ?></h1>
      <?php if(has_post_thumbnail()):?>
         <img src="<?php the_post_thumbnail_url('medium'); ?>"/>
      <?php endif;?>
            
   
         <?php the_content();?>

         <?php echo isset($details['tagline']) ? $details['tagline'] : '';?>
         <?php echo isset($details['topics']) ? $details['topics'] : '';?>

          
   <?php endwhile; ?>

              
   <?php
   // to do : we have to limit this to the current school
   ?>
   <!-- <div style="display:flex;gap:2rem;">
      <div><?php next_post_link('&laquo; %link', '%title' ); ?></div>
      <div><?php previous_post_link( ' %link &raquo;', '%title' ); ?></div>
   </div> -->
 
<?php get_footer(); ?>