<?php

// display list of Course Cards
//

?>

<section class="feature_tiles fade_in">
   
   <h2>Our Courses</h2>

   <ul>
      <?php 
         if(have_posts()) :
            while(have_posts()) :
               the_post();
               $features = (array) get_post_meta(get_the_ID(),'_features_meta_key',true);
               ?>
               <li style="border:none;margin-bottom:3rem;">
                  
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

                     <div>

                        <h3><?php echo the_title();?></h3>
                        <!-- <ul>
                           <?php
                              foreach ($features as $feature) {
                                 ?><li><?php echo $feature;?></li><?php
                              }
                           ?>
                        </ul> -->

                        <?php
                        $excerpt = get_the_excerpt(); 
                        $excerpt = substr($excerpt, 0, 240);
                        $result = substr($excerpt, 0, strrpos($excerpt, ' '));
                        echo $result . ' . .';
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