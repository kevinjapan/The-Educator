<?php

// Single Page for Course Custom Post Type
//

get_header();
?>

<!-- The Educator Theme : Course Page -->


<section class="te_course_content">
   <?php while ( have_posts() ) : 
      the_post(); 
      
      $details= (array) get_post_meta( get_the_ID(),'_te_course_details_meta_key', true );
      ?>
      
      <h1><?php the_title(); ?></h1>

      <?php if(has_post_thumbnail()):?>
         <img src="<?php the_post_thumbnail_url('medium'); ?>"/>
      <?php endif;?>
          
      <h5>
         <?php echo isset($details['tagline']) ? $details['tagline'] : '';?>
      </h5>  
      
      <div class="te_form_fields">

         <div class="te_form_field">
            <div>UCAS Code</div>
            <div><?php echo isset($details['ucas_code']) ? $details['ucas_code'] : '';?></div>
         </div>
         <div class="te_form_field">
            <div>Duration</div>
            <div><?php echo isset($details['duration']) ? $details['duration'] : '';?></div>
         </div>
         <div class="te_form_field">
            <div>Study Mode</div>
            <div><?php echo isset($details['study_mode']) ? $details['study_mode'] : '';?></div>
         </div>

         <div class="te_form_field">
            <div>Start Month</div>
            <div><?php echo isset($details['start_month']) ? $details['start_month'] : '';?></div>
         </div>
         <div class="te_form_field">
            <div>Learning Mode</div>
            <div><?php echo isset($details['learning_mode']) ? $details['learning_mode'] : '';?></div>
         </div>
         

      </div>
         <?php the_content();?>

          
   <?php endwhile; ?>

           
      </section>   
   <?php
   // future : limit this to the current school
   ?>
   <!-- <div style="display:flex;gap:2rem;">
      <div><?php next_post_link('&laquo; %link', '%title' ); ?></div>
      <div><?php previous_post_link( ' %link &raquo;', '%title' ); ?></div>
   </div> -->
 
<?php get_footer(); ?>