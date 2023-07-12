<?php get_header(); ?>


<section class="animated_tiles fade_in">
   <h3>Our work</h3>
   <ul>
      <?php 
      if(have_posts()) :
         while(have_posts()) :
            the_post();?>
            <li>
                  <?php
                  if(has_post_thumbnail()):?>
                     <img src="<?php the_post_thumbnail_url('large'); ?>"/>
                  <?php endif;
                  ?>
                  <h3><?php echo get_the_title();?></h3>
                  <p><?php echo get_post_meta( get_the_ID(), 'te_casestudy_tagline', true );?></p>
                  <!-- <p><?php echo get_the_excerpt();?></p> -->
                  <button><a href="<?php echo get_permalink(get_the_ID()); ?>">project details</a></button>
                  ?>
            </li>
            <?php
         endwhile; 
      endif;
   ?>
</ul>
</section>

<!-- wp_link_pages() -->

<?php get_footer(); ?>