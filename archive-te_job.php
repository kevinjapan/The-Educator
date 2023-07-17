<?php get_header(); ?>


<div class="show_page_name">archive-te_job.php</div>


<section class="feed_list fade_in">
   <ul>
      <?php 
         if(have_posts()) :
            while(have_posts()) :
               the_post();
               $features = (array) get_post_meta(get_the_ID(),'_features_meta_key',true);
               ?>
               <li>
                        <?php if(has_post_thumbnail()):?>
                           <img src="<?php the_post_thumbnail_url('large'); ?>"/>
                        <?php endif;?>
                     <div style="background:white;">
                     

                        <h3><?php echo the_title();?></h3>
                        
                        <?php
                        the_excerpt();
                        ?>

                        <a class="float_right" href="<?php the_permalink(); ?>">read more</a>

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