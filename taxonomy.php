<?php get_header(); ?>


<div style="color:grey;">taxonomy.php the default taxonomy page</div>
<?php 
 $taxonomies = get_taxonomies(); 
    foreach ( $taxonomies as $taxonomy ) {
        if($taxonomy = 'portfolio_category'){
            $terms['trm'] = get_terms($taxonomy, array('hide_empty'=> false, 
                                                       'taxonomy'=> 'portfolio_category',
                                                        'title_li'=> __( 'Categories' )));
        }
    }
    foreach ($terms['trm'] as $term){
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
        if($query->have_posts()):while($query->have_posts()):$query->the_post(); ?>
             <h1><?php the_title(); ?></h1> <!-- place html code here -->
   <?php

        endwhile;
        endif;
        wp_reset_postdata(); 
   }

   ?>



<?php get_footer(); ?>