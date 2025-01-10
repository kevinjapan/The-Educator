<?php

// Register Theme Block Pattern Templates
//
function te_register_cover_blocks_templates($site_uri) {

   // Hero Cover Block Template
	register_block_pattern('te-hero-cover', [
		'title' => __('Hero Cover Block', 'the-educator'),
      'description' => _x( 'Hero Cover Block.', 'Hero Cover Block.', 'the-educator' ),            
		'keywords' => ['single,cover'],
		'categories' => ['te-cover-blocks'],
		'viewportWidth' => 1000,
		'content' =>  
         '<!-- wp:cover {"url":"' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg","id":287,"dimRatio":50,"layout":{"type":"constrained"}} -->
         <div class="wp-block-cover te-hero fade_in">
            <span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span>
            <img class="wp-block-cover__image-background wp-image-287" alt="" 
               src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" data-object-fit="cover"/>

            <div class="wp-block-cover__inner-container">
            
               <!-- wp:heading {"textAlign":"left","level":1} -->
               <h1 class="wp-block-heading has-text-align-left">This is main heading</h1>
               <!-- /wp:heading -->
               
               <!-- wp:heading {"level":3} -->
               <h3 class="wp-block-heading">adfa sd fdsafa adfd</h3>
               <!-- /wp:heading -->

               <!-- wp:buttons -->
               <div class="wp-block-buttons te_buttons">            
                  <!-- wp:button -->
                  <div class="wp-block-button te_button over_img"><a class="wp-block-button__link">read more</a></div>
                  <!-- /wp:button -->
               </div>
               <!-- /wp:buttons -->

            </div>         
         </div>
         <!-- /wp:cover -->'
	]);

   // Cover Block Template
   // to do : integrate Outline CSS into my block patterns.
   // - first make sure I understand how my current cover_block etc are being styled w/out it !!! 
	register_block_pattern('te-cover', [
		'title' => __('Cover Block', 'the-educator'),
      'description' => _x( 'Cover Block.', 'A Cover block with a single feature.', 'the-educator' ),            
		'keywords' => ['cover'],
		'categories' => ['te-cover-blocks'],
		'viewportWidth' => 1000,
		'content' =>  
         '<!-- wp:cover {"url":"' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg","id":248,"dimRatio":50,"className":"cover_block te-cover"} -->
         <div class="wp-block-cover has-text-color has-background-dim te-cover">

            <img class="wp-block-cover__image-background wp-image-248" 
               alt="image of columns" 
               src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" data-object-fit="cover"/>
            
            <div class="wp-block-cover__inner-container">

               <!-- wp:columns -->
               <div class="wp-block-columns">
            
                  <!-- wp:column -->
                  <div class="wp-block-column">
                     <!-- wp:heading -->
                     <h2>Introducing the The Educator Cover Block.</h2>
                     <!-- /wp:heading -->
                  </div>
                  <!-- /wp:column --> 

                  <!-- wp:column -->
                  <div class="wp-block-column">
                     <!-- wp:paragraph -->
                     <p>
                        Cover Blocks with Latitude!<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis metus sed enim ullamcorper tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ac nibh ut elit condimentum tempor sit amet sed risus.<br>
                        <br>You can customize the layout of this block pattern in the Dashboard menu:
                        <br>- Appearance 
                        <br>- - Customize
                        <br>- - - The Educator Block Patterns 
                        <br>- - - - The Educator Covers.
                     </p>
                     <!-- /wp:paragraph -->

                     <!-- wp:buttons -->
                     <div class="wp-block-buttons te_buttons">            
                        <!-- wp:button -->
                        <div class="wp-block-button te_button over_img"><a class="wp-block-button__link">read more</a></div>
                        <!-- /wp:button -->
                     </div>
                     <!-- /wp:buttons -->
               
                  </div>
                  <!-- /wp:column -->
               </div>
               <!-- /wp:columns -->
            </div>
         </div>
         <!-- /wp:cover -->'
	]);

   // Custom Cover Block
   // non-WordPress blocks - using Outline CSS 
   // to do : review custom html solution - does it work in WordPress editor?
   //         we are trying to bring in Outline CSS custom html solution but it must work w/ WordPress editing
   //         (we know it will work on UI front-end)
   //         just use same te- css classes for styling - will customize same for both versions of blocks
   register_block_pattern('te-cover', [
		'title' => __('Custom Cover Block', 'the-educator'),
      'description' => _x( 'Cover Block.', 'A Custom Cover block with a single feature.', 'the-educator' ),            
		'keywords' => ['cover'],
		'categories' => ['te-cover-blocks'],
		'viewportWidth' => 1000,
		'content' =>  
         '<section class="cover_block bg_navy fade_in darken_img_4" style="margin-bottom:1rem;">
            <img class="bg_img" src="../assets/imgs/susan-q-yin-2JIvboGLeho-unsplash.jpg" />
            <div class="text_overlay">
               <h1>Custom Cover Block - does it work in editor?</h1>
               <p>Start your academic journey with your first step today</p>
               <button>Find out more ></button>
            </div>
         </section>'
	]);
}


