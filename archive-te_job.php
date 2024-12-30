<?php

// Archive Page for Jobs Custom Post Types 
// 

get_header();
?>

<!-- The Educator Theme : Jobs Archive -->


<section class="feed_list fade_in">

   <h3 style="margin-top:2rem;">Current Vacancies</h3>

   <ul>
      <?php 
         if(have_posts()) :
            while(have_posts()) :
               the_post();
               $features = (array) get_post_meta(get_the_ID(),'_features_meta_key',true);
               ?>
               <li class="te_job_teaser"  style="padding-bottom:2rem;">
                        <?php if(has_post_thumbnail()):?>
                           <img src="<?php the_post_thumbnail_url('large'); ?>"/>
                        <?php endif;?>
                     <div style="background:white;">

                        <h3><?php echo the_title();?></h3>

                        <?php
                        the_excerpt();
                        ?>

                        <div class="wp-block-button te_button" style="margin-top:2rem;margin-bottom:0;">
                           <a class="wp-block-button__link wp-element-button" href="<?php the_permalink(); ?>">read more</a>
                        </div>

                     </div>
                  </li>
               <?php
            endwhile; 
         endif;
      ?>
   </ul>
</section>

<?php
wp_link_pages();
?>

<?php get_footer(); ?>