<?php get_header(); ?>

   <?php while ( have_posts() ) : 
      the_post(); 
      $features = (array) get_post_meta(get_the_ID(),'_features_meta_key',true);
      ?>
         <h1><?php the_title(); ?></h1>
      <?php if(has_post_thumbnail()):?>
         <img src="<?php the_post_thumbnail_url('medium'); ?>"/>
      <?php endif;?>
            
         <ul style="list-style:circle;">
            <?php
               foreach ($features as $feature) {
                  ?><li><?php echo $feature;?></li><?php
               }
            ?>
         </ul>
               
         <?php the_content();?>
          
   <?php endwhile; ?>

              
   <div style="display:flex;gap:2rem;">
      <div><?php next_post_link('&laquo; %link', '%title' ); ?></div>
      <div><?php previous_post_link( ' %link &raquo;', '%title' ); ?></div>
   </div>
 
<?php get_footer(); ?>