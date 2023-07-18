<?php get_header(); ?>

<div class="show_page_name">archive-te_course.php</div>


<section class="feature_tiles fade_in">
   <h3>Our Courses</h3>
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

                     <?php // to do : move styling to class rule ?>
                     <div style="background:white;padding:0 1.5rem 1.5rem 1.5rem;border:solid 1px lightgrey;border-radius:.25rem;">
                     

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