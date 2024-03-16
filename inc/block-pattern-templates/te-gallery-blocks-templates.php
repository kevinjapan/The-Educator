<?php

// Register Theme Block Pattern Templates
//
function te_register_gallery_blocks_templates($site_uri) {

   
   // nesting of <figure> is-as in WP
   register_block_pattern('te-gallery', [
		'title' => __('The Educator Gallery', 'the-educator'),
      'description' => _x( 'The Educator Gallery.', 'An image gallery block with The Educator customization.', 'the-educator' ),            
		'keywords' => ['gallery'],
		'categories' => ['te-images'],
		'viewportWidth' => 1000,
		'content' =>  
         '<!-- wp:gallery {"linkTo":"none"} -->
         <figure class="wp-block-gallery te-gallery columns-3 is-cropped">
            <ul class="blocks-gallery-grid">
               <li class="blocks-gallery-item">
                  <figure>
                     <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns"/>
                  </figure>
               </li>
               <li class="blocks-gallery-item">
                  <figure>
                     <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns"/>
                  </figure>
               </li>
               <li class="blocks-gallery-item">
                  <figure>
                     <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns"/>
                  </figure>
               </li>
            </ul>
         </figure>
         <!-- /wp:gallery -->'
   ]);

}