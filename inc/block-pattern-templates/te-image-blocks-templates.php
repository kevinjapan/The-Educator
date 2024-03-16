<?php

// Register Theme Block Pattern Templates
//
function te_register_image_blocks_templates($site_uri) {

   register_block_pattern('te-image', [
		'title' => __('The Educator Image', 'the-educator'),
      'description' => _x( 'The Educator Image.', 'An image block with The Educator customization.', 'the-educator' ),            
		'keywords' => ['image'],
		'categories' => ['te-images'],
		'viewportWidth' => 1000,
		'content' =>  
         '<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"te-image"} -->
         <figure class="wp-block-image size-large te-image">
            <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns"/>
         </figure>
         <!-- /wp:image -->'
   ]);

}