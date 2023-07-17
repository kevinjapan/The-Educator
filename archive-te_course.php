<?php get_header(); ?>

<div class="show_page_name">archive-te_course.php</div>


<section class="feature_tiles fade_in">
   <ul>
      <?php 
         if(have_posts()) :
            while(have_posts()) :
               the_post();
               $features = (array) get_post_meta(get_the_ID(),'_features_meta_key',true);
               ?>
               <li>
                  
                     <?php 
                     if(has_post_thumbnail()) {
                        ?>
                        <img src="<?php the_post_thumbnail_url('large'); ?>"/>
                        <?php
                     }
                     else {
                        ?><p style="height:20px;"></p><?php
                     }
                     ?>
                     <div style="background:white;">
                     

                        <h3><?php echo the_title();?></h3>
                        <!-- <ul>
                           <?php
                              foreach ($features as $feature) {
                                 ?><li><?php echo $feature;?></li><?php
                              }
                           ?>
                        </ul> -->

                        
                        <?php
                        // to do : reduce len of excerpt.
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

<!-- wp_link_pages() -->

<section style="display:flex;">
   <?php posts_nav_link('&nbsp;&nbsp;','prev','next'); ?>
</section>


<?php get_footer(); ?>