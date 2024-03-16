<?php

// Register Theme Block Pattern Templates
//
function te_register_text_blocks_templates($site_uri) {

	register_block_pattern('te-simple-text', [
		'title' => __('Simple Text', 'the-educator'),
      'description' => _x( 'Simple Text.', 'A simple text block.', 'the-educator' ),            
		'keywords' => ['text'],
		'categories' => ['te-texts'],
		'viewportWidth' => 1000,
		'content' =>  
         '<!-- wp:group {"className":"te-text te-simple-text"} -->
         <div class="wp-block-group te-text te-simple-text">

            <!-- wp:paragraph -->
            <p>
               Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate autem voluptatem deserunt ea odio quae odit molestiae provident similique id totam neque et dolorum explicabo, architecto itaque? Quas, eos quam?
            </p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph -->
            <p>
               You can customize the layout of this block pattern in the Dashboard menu:
               <br> Appearance \ Customize \ The Educator Block Patterns \ The Educator Texts
            </p>
            <!-- /wp:paragraph -->
         </div>
         <!-- /wp:group -->'
	]);

   //
   // te-columns-text : future release
   //
	// register_block_pattern('te-columns-text', [
	// 	'title' => __('Columns Text', 'the-educator'),
   //    'description' => _x( 'Columns Text.', 'A title and text block supporting columns on wider screens.', 'the-educator' ),            
	// 	'keywords' => ['text,columns'],
	// 	'categories' => ['te-texts'],
	// 	'viewportWidth' => 1000,
	// 	'content' =>  
   //       '<!-- wp:group {"className":"te-text te-columns-text"} -->
   //       <div class="wp-block-group te-text te-columns-text">
   //       <!-- wp:paragraph -->
   //       <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate autem voluptatem deserunt ea odio quae 
   //       odit molestiae provident similique id totam neque et dolorum explicabo, architecto itaque? Quas, eos quam?</p>
   //       <!-- /wp:paragraph -->
   //       <!-- wp:paragraph -->
   //       <p>You can customize the layout of this block pattern 
   //       in Appearance \ Customize \ The Educator Block Patterns \ The Educator Texts.</p>
   //       <!-- /wp:paragraph -->
   //       </div>
   //       <!-- /wp:group -->'
	// ]);
}