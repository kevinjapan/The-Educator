<?php 

// Default Single Page for Taxonomy (Term)
//

get_header();
?>

<!-- The Educator Theme : Default Single Taxonomy Term -->

<?php 
   $taxonomies = get_taxonomies(); 
   foreach ( $taxonomies as $taxonomy ) {
      if($taxonomy = 'portfolio_category'){
         $terms['taxonomy_terms'] = get_terms($taxonomy, array('hide_empty'=> false, 
                                                   'taxonomy'=> 'portfolio_category',
                                                   'title_li'=> __( 'Categories' )));
      }
   }
   foreach ($terms['taxonomy_terms'] as $term){
      $query = new WP_Query(
         array(
            'post_type' => 'course',
            'tax_query' => array(
                     array(
                        'taxonomy' => 'taxonomy',
                        'field'    => 'school',
                        'terms'    => 'engineering',
                     ),
                  ),
         )
      );
      if($query->have_posts()):
         while($query->have_posts()):$query->the_post(); ?>
         <h1><?php the_title(); ?></h1>
         <?php
        endwhile;
      endif;
      wp_reset_postdata(); 
   }
   ?>


<?php get_footer(); ?>