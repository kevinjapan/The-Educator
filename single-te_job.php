<?php
/*
Single Page for Job Custom Post Type
*/

get_header(); ?>

<div class="show_page_name">single-te_job.php</div>

   <?php 
   
   
   $details= (array) get_post_meta( get_the_ID(),'_te_job_details_meta_key', true );

   while ( have_posts() ) : the_post(); ?>
 
      <h1><?php the_title(); ?></h1>

      <?php if(has_post_thumbnail()):?>
         <img src="<?php the_post_thumbnail_url('medium'); ?>"/>
      <?php endif;?>
                     
      <div class="te_form_fields">
         <div class="te_form_field">
            <div>School/Section</div>
            <div><?php echo isset($details['school_or_section']) ? $details['school_or_section'] : '';?></div>
         </div>
         <div class="te_form_field">
            <div>Staff Category</div>
            <div><?php echo isset($details['staff_category']) ? $details['staff_category'] : '';?></div>
         </div>
         <div class="te_form_field">
            <div>Position Type</div>
            <div><?php echo isset($details['position_type']) ? $details['position_type'] : '';?></div>
         </div>
         <div class="te_form_field">
            <div>Duration</div>
            <div><?php echo isset($details['duration']) ? $details['duration'] : '';?></div>
         </div>
         <div class="te_form_field">
            <div>Grade</div>
            <div><?php echo isset($details['grade']) ? $details['grade'] : '';?></div>
         </div>
         <div class="te_form_field">
            <div>Salary</div>
            <div><?php echo isset($details['salary']) ? $details['salary'] : '';?></div>
         </div>
         <div class="te_form_field">
            <div>Location</div>
            <div><?php echo isset($details['location']) ? $details['location'] : '';?></div>
         </div>
         <div class="te_form_field">
            <div>Ref</div>
            <div><?php echo isset($details['ref']) ? $details['ref'] : '';?></div>
         </div>
         <div class="te_form_field">
            <div>Cosing Date</div>
            <div><?php echo isset($details['closing_date']) ? $details['closing_date'] : '';?></div>
         </div>
      </div>

      <?php the_content();?>

   <?php endwhile; ?>
       
   <!-- <div style="display:flex;gap:2rem;">
      <div><?php next_post_link('&laquo; %link', '%title' ); ?></div>
      <div><?php previous_post_link( ' %link &raquo;', '%title' ); ?></div>
   </div> -->

<?php get_footer(); ?>