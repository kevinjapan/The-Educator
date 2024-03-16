<?php

// Register Theme Block Pattern Templates
//
function te_register_title_lead_blocks_templates($site_uri) {

   // Big Title & Lead Text Block Template
	register_block_pattern('te-big-title-lead', [
		'title' => __('Big Title And Lead Text', 'the-educator'),
      'description' => _x( 'You can style all block patterns of this type in the customizer.', 'The big title and lead text block.', 'the-educator' ),            
		'keywords' => ['big,title,lead,text'],
		'categories' => ['te-texts'],
		'viewportWidth' => 1000,
		'content' =>  
         '<!-- wp:group {"className":"te-big-title-lead"} -->
         <div class="wp-block-group te-big-title-lead">

            <!-- wp:heading {"textAlign":"center","level":2} -->
               <h2 class="te-big-title-lead__title has-text-align-center">Big Title & Lead Text</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">
               Lorem ipsum dolor sit amet consectetur adipisicing elit.         
               <br>You can customize the layout of this block pattern in the Dashboard menu:
               <br> Appearance \ Customize \ The Educator Block Patterns \ The Educator Texts 
            </p>
            <!-- /wp:paragraph -->
         
         </div>
         <!-- /wp:group -->'
   ]);
 
   // Title & Lead Text Block Template
	register_block_pattern('te-title-lead', [
		'title' => __('Title And Lead Text', 'the-educator'),
      'description' => _x( 'You can style all block patterns of this type in the customizer.', 'A title and lead text block.', 'the-educator' ),            
		'keywords' => ['title,lead,text'],
		'categories' => ['te-texts'],
		'viewportWidth' => 1000,
		'content' =>  
         '<!-- wp:group {"className":"te-title-lead"} -->
         <div class="wp-block-group te-title-lead">

            <!-- wp:heading {"textAlign":"center","level":2} -->
               <h2 class="te-title-lead__title has-text-align-center">Title & Lead Text</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">
               Lorem ipsum dolor sit amet consectetur adipisicing elit.         
               <br>You can customize the layout of this block pattern in the Dashboard menu:
               <br> Appearance \ Customize \ The Educator Block Patterns \ The Educator Texts
            </p>
            <!-- /wp:paragraph -->

         </div>
         <!-- /wp:group -->'
   ]);

}