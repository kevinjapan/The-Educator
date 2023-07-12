<?php
/*
 * Web Dev Agent Block Patterns
 * @package WordPress
 * @subpackage WebDevAgent
 * @since WebDevAgent 1.0
 */

//
// Web Dev Agent Block Patterns
// Registers Patterns in 'block inserter' in editor.
// 

//
// Adapting previous block patterns from edk theme (early learning theme development) for use in Wed Dev Agent theme.
// I generated these block patterns by building the pattern in editor then copying the html (use code editor mode - 'serialized block')
// and inserting that into my calls to register_block_pattern().content below.
// For now, will stick with these to get this up and running - so currently minimal use of outlinecss
// 
// future : research correct way to generate these blocks and implement..  theme.json? or somesuch..
//



//
// Register Block Pattern Categories
//
function te_register_block_pattern_categories() { 
	register_block_pattern_category('te-cover-blocks', ['label' => __('Web Dev Agent Covers', 'te')]);
	register_block_pattern_category('te-column-blocks', ['label' => __('Web Dev Agent Columns', 'te')]);  
	register_block_pattern_category('te-texts', ['label' => __('Web Dev Agent Texts', 'te')]); 
	register_block_pattern_category('te-images', ['label' => __('Web Dev Agent Images', 'te')]); 
	register_block_pattern_category('te-buttons', ['label' => __('Web Dev Agent Buttons', 'te')]);   
}
add_action( 'init', 'te_register_block_pattern_categories' );


function te_register_block_patterns() {

   $site_uri = get_template_directory_uri();
   

   // 
   // single feature cover block
   //
	register_block_pattern('te-single-feature-cover', [
		'title' => __('Single Feature Cover', 'te'),
      'description' => _x( 'Single Feature Cover.', 'A Cover block with a single feature.', 'te' ),            
		'keywords' => ['single,cover'],
		'categories' => ['te-cover-blocks'],
		'viewportWidth' => 1000,
		'content' =>  
         '<!-- wp:cover {"url":"' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg","id":248,"dimRatio":50,"isDark":false,"className":"te-cover"} -->
         <div class="wp-block-cover has-background-dim te-cover">
         <img class="wp-block-cover__image-background wp-image-248" alt="image of columns" 
         src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" data-object-fit="cover"/>
         <div class="wp-block-cover__inner-container">
         <!-- wp:columns -->
         <div class="wp-block-columns"><!-- wp:column -->
         <div class="wp-block-column"><!-- wp:heading -->
         <h2>Introducing the Web Dev Agent Cover Block.</h2>
         <!-- /wp:heading --></div>
         <!-- /wp:column -->         
         <!-- wp:column -->
         <div class="wp-block-column">
            <!-- wp:paragraph -->
            <p>Cover Blocks with Latitude!<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis metus sed enim ullamcorper tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ac nibh ut elit condimentum tempor sit amet sed risus.<br>
            <br>You can customize the layout of this block pattern in the Dashboard menu:
            <br>- Appearance 
            <br>- - Customize
            <br>- - - Web Dev Agent Block Patterns 
            <br>- - - - Web Dev Agent Covers.</p>
            <!-- /wp:paragraph -->
         </div>
         <!-- /wp:column --></div>
         <!-- /wp:columns -->
         
         </div></div>
         <!-- /wp:cover -->'
	]);


   //
   // two feature cover block
   //
   // register_block_pattern('te-two-feature-cover', [
	// 	'title' => __('Two Feature Cover', 'te'),
   //    'description' => _x( 'Two Feature Cover.', 'A Cover block with two features columns.', 'te' ),            
	// 	'keywords' => ['two,cover'],
	// 	'categories' => ['te-cover-blocks'],
	// 	'viewportWidth' => 1000,
	// 	'content' =>   
   //       '<!-- wp:cover {"className":"te-cover te-two-feature-cover"} -->
   //       <div class="wp-block-cover has-background-dim te-cover te-two-feature-cover">
   //       <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":2} -->
   //       <h2 class="has-text-align-center">Some interesting projects may require a longer title to project the gist of the thing</h2>
   //       <!-- /wp:heading -->
   //       <!-- wp:columns -->
   //       <div class="wp-block-columns"><!-- wp:column -->
   //       <div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":3} -->
   //       <h3 class="has-text-align-center">discover projects</h3>
   //       <!-- /wp:heading -->
   //       <!-- wp:paragraph {"align":"center"} -->
   //       <p class="has-text-align-center"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate autem 
   //       voluptatem deserunt ea odio quae odit molestiae provident similique id totam neque et dolorum explicabo, architecto itaque? 
   //       Quas, eos quam? </p>
   //       <!-- /wp:paragraph -->
   //       <!-- wp:paragraph {"align":"center"} -->
   //       <p class="has-text-align-center">discover projects</p>
   //       <!-- /wp:paragraph --></div>
   //       <!-- /wp:column --> 
   //       <!-- wp:column -->
   //       <div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":3} -->
   //       <h3 class="has-text-align-center">align your layouts</h3>
   //       <!-- /wp:heading -->
   //       <!-- wp:paragraph {"align":"center"} -->
   //       <p class="has-text-align-center"> You can customize the layout of this block pattern 
   //       in Appearance \ Customize \ Web Dev Agent Block Patterns \ Web Dev Agent Covers.. </p>
   //       <!-- /wp:paragraph -->
   //       <!-- wp:button -->
   //      <button>read more link</button>
   //       <!-- /wp:button --></div>
   //       <!-- /wp:column --></div>
   //       <!-- /wp:columns -->
   //      </div></div>
   //       <!-- /wp:cover -->',
	// ]);

   //
   // three feature cover block  
   // 
	// register_block_pattern('te-three-feature-cover', [
	// 	'title' => __('Three Feature Cover', 'te'),
   //    'description' => _x( 'Three Feature Cover.', 'A Cover block with three features columns.', 'te' ),            
	// 	'keywords' => ['three,cover'],
	// 	'categories' => ['te-cover-blocks'],
	// 	'viewportWidth' => 1000,
	// 	'content' =>  
   //         '<!-- wp:cover {"className":"te-cover te-three-feature-cover"} -->
   //         <div class="wp-block-cover has-background-dim te-cover te-three-feature-cover">
   //         <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center"} -->
   //         <h2 class="has-text-align-center">three feature cover block pattern</h2>
   //         <!-- /wp:heading -->
   //         <!-- wp:heading {"textAlign":"center","level":3} -->
   //         <h3 class="has-text-align-center">this is a useful block pattern for services</h3>
   //         <!-- /wp:heading -->
   //         <!-- wp:columns -->
   //         <div class="wp-block-columns"><!-- wp:column {"className":"te_opaque_bg"} -->
   //         <div class="wp-block-column te_opaque_bg"><!-- wp:heading {"textAlign":"center","level":3} -->
   //         <h3 class="has-text-align-center">service #1</h3>
   //         <!-- /wp:heading -->
   //         <!-- wp:paragraph {"align":"center"} -->
   //         <p class="has-text-align-center"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate autem voluptatem 
   //         deserunt ea odio quae odit molestiae provident similique id totam neque et dolorum explicabo, architecto itaque? Quas, eos quam? </p>
   //         <!-- /wp:paragraph -->
            // <!-- wp:buttons -->
            // <div class="wp-block-buttons te_buttons">            
            // <!-- wp:button -->
            // <div class="wp-block-button te_button"><a class="wp-block-button__link">read more</a></div>
            // <!-- /wp:button -->
            // </div>
            // <!-- /wp:buttons -->
   //         </div>
   //         <!-- /wp:column -->
   //         <!-- wp:column {"className":"te_opaque_bg"} -->
   //         <div class="wp-block-column te_opaque_bg"><!-- wp:heading {"textAlign":"center","level":3} -->
   //         <h3 class="has-text-align-center">service #2</h3>
   //         <!-- /wp:heading -->
   //         <!-- wp:paragraph {"align":"center"} -->
   //         <p class="has-text-align-center"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate autem voluptatem 
   //         deserunt ea odio quae odit molestiae provident similique id totam neque et dolorum explicabo, architecto itaque? Quas, eos quam? </p>
   //         <!-- /wp:paragraph -->
   //         <!-- wp:paragraph {"align":"center"} -->
   //         <p class="has-text-align-center">explore projects</p>
   //         <!-- /wp:paragraph --></div>
   //         <!-- /wp:column -->
   //         <!-- wp:column {"className":"te_opaque_bg"} -->
   //         <div class="wp-block-column te_opaque_bg"><!-- wp:heading {"textAlign":"center","level":3} -->
   //         <h3 class="has-text-align-center">service #3</h3>
   //         <!-- /wp:heading -->
   //         <!-- wp:paragraph {"align":"center"} -->
   //         <p class="has-text-align-center"> You can customize the layout of this block pattern 
   //         in Appearance \ Customize \ Web Dev Agent Block Patterns \ Web Dev Agent Covers... </p>
   //         <!-- /wp:paragraph --> 
   //         <!-- wp:paragraph {"align":"center"} -->
   //         <p class="has-text-align-center">continue</p>
   //         <!-- /wp:paragraph --></div>
   //         <!-- /wp:column --></div>
   //         <!-- /wp:columns --></div></div>
   //         <!-- /wp:cover -->',
	// ]);



   // future : should we rename this 'single feature block' - since it is 
   //         neither technically nor visually a column.

   //
   // single feature columns block
   // we use wp-block-media-text instead of wp-columms since it already has desired styling in two column pattern w/out additionals
   //
   register_block_pattern('te-single-feature-column', [
   'title' => __('Single Feature Column', 'te'),
   'description' => _x( 'Single Feature Column.', 'A Column block with a single feature.', 'te' ),            
   'keywords' => ['single,column'],
   'categories' => ['te-column-blocks'],
   'viewportWidth' => 1000,
   'content' => 
         '<!-- wp:media-text {"mediaLink":"' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg","mediaType":"image"} -->
         <div class="wp-block-media-text alignwide is-stacked-on-mobile te-columns te-single-feature-columns">
         <figure class="wp-block-media-text__media">
         <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns" />
         </figure>
         <div class="wp-block-media-text__content">
         <!-- wp:paragraph {"placeholder":"Content…","fontSize":"large"} -->
         <p class="has-large-font-size">Introducing the single feature column.</p>
         <!-- /wp:paragraph -->
         <!-- wp:paragraph -->
         <p>You can customize the layout of this block pattern in the Dashboard menu:
         <br>- Appearance 
         <br>- - Customize
         <br>- - - Web Dev Agent Block Patterns 
         <br>- - - - Web Dev Agent Columns</p>
         <!-- /wp:paragraph -->
         <!-- wp:buttons -->
         <div class="wp-block-buttons te_buttons">            
         <!-- wp:button -->
         <div class="wp-block-button te_button"><a class="wp-block-button__link">read more</a></div>
         <!-- /wp:button -->
         </div>
         <!-- /wp:buttons -->
         </div>
         </div>
         <!-- /wp:media-text -->'
	]);
   

   //
   // two feature columns block
   //
	register_block_pattern('te-two-feature-columns', [
		'title' => __('Two Feature Columns', 'te'),
      'description' => _x( 'Two Feature Clolumns.', 'A Columns block with two features.', 'te' ),            
		'keywords' => ['two,columns'],
		'categories' => ['te-column-blocks'],
		'viewportWidth' => 1000,
		'content' => 
         '<!-- wp:columns {"className":"te-columns te-two-feature-columns"} -->
         <div class="wp-block-columns te-columns te-two-feature-columns"> 
         <!-- wp:column -->
         <div class="wp-block-column">
         <!-- wp:image {"sizeSlug":"medium","linkDestination":"none"} -->
         <figure class="wp-block-image size-medium">
         <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns" /></figure>
         <!-- /wp:image -->
         <!-- wp:heading  {"align":"center"} -->
         <h2 class="has-text-align-center">two feature column</h2>
         <!-- /wp:heading -->
         <!-- wp:paragraph  {"align":"center"} -->
         <p class="has-text-align-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate autem voluptatem 
         deserunt ea odio quae odit molestiae provident similique id totam neque et dolorum explicabo, architecto itaque? Quas, eos quam?</p>
         <!-- /wp:paragraph -->
         <!-- wp:buttons -->
         <div class="wp-block-buttons te_buttons">
         <!-- wp:button -->
         <div class="wp-block-button te_button"><a class="wp-block-button__link">read more</a></div>
         <!-- /wp:button -->
         </div>
         <!-- /wp:buttons -->
         </div>
         <!-- /wp:column -->
         <!-- wp:column -->
         <div class="wp-block-column"> 
         <!-- wp:image {"sizeSlug":"medium","linkDestination":"none"} -->
         <figure class="wp-block-image size-medium">
         <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns" /></figure>
         <!-- /wp:image -->
         <!-- wp:heading  {"align":"center"} -->
         <h2 class="has-text-align-center">title here</h2>
         <!-- /wp:heading -->
         <!-- wp:paragraph  {"align":"center"} -->
         <p class="has-text-align-center">You can customize the layout of this block pattern in the Dashboard menu: Appearance \ Customize \ Web Dev Agent Block Patterns \ Web Dev Agent Columns</p>
         <!-- /wp:paragraph -->
         <!-- wp:buttons -->
         <div class="wp-block-buttons te_buttons">
         <!-- wp:button -->
         <div class="wp-block-button te_button"><a class="wp-block-button__link">read more</a></div>
         <!-- /wp:button -->
         </div>
         <!-- /wp:buttons -->
         </div>
         <!-- /wp:column -->
         </div>
         <!-- /wp:columns -->',
	]);


   //
   // three feature columns block   
   //
	register_block_pattern('te-three-feature-columns', [
		'title' => __('Three Feature Columns', 'te'),
      'description' => _x( 'Three Feature Columns.', 'A Columns block with three features.', 'te' ),            
		'keywords' => ['three,keywords'],
		'categories' => ['te-column-blocks'],
		'viewportWidth' => 1000,
		'content' =>  
            '<!-- wp:columns {"className":"te-columns te-three-feature-columns"} -->
            <div class="wp-block-columns te-columns te-three-feature-columns">
            <!-- wp:column {"className":"te_center_content"} -->
            <div class="wp-block-column te_center_content">
            <!-- wp:image {"sizeSlug":"medium","linkDestination":"none","className":"fill_width"} -->
            <figure class="wp-block-image size-medium fill_width">
            <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns"/></figure>
            <!-- /wp:image -->
            <!-- wp:heading -->
            <h2 class="has-text-align-center">three</h2>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate autem voluptatem deserunt ea odio quae 
            odit molestiae provident similique id totam neque et dolorum explicabo, architecto itaque? Quas, eos quam?</p>
            <!-- /wp:paragraph -->
            <!-- wp:buttons -->
            <div class="wp-block-buttons te_buttons">            
            <!-- wp:button -->
            <div class="wp-block-button te_button"><a class="wp-block-button__link">read more</a></div>
            <!-- /wp:button -->
            </div>
            <!-- /wp:buttons --></div>
            <!-- /wp:column -->        
            <!-- wp:column {"className":"te_center_content"} -->
            <div class="wp-block-column te_center_content">
            <!-- wp:image {"sizeSlug":"medium","linkDestination":"none","className":"fill_width"} -->
            <figure class="wp-block-image size-medium fill_width">
            <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns"/></figure>
            <!-- /wp:image -->
            <!-- wp:heading {"textAlign":"center"} -->
            <h2 class="has-text-align-center">feature</h2>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate autem voluptatem 
            deserunt ea odio quae odit molestiae provident similique id totam neque et dolorum explicabo, architecto itaque? Quas, eos quam?</p>
            <!-- /wp:paragraph -->
            <!-- wp:buttons -->
            <div class="wp-block-buttons te_buttons">            
            <!-- wp:button -->
            <div class="wp-block-button te_button"><a class="wp-block-button__link">read more</a></div>
            <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
            </div>
            <!-- /wp:column -->
            <!-- wp:column {"className":"te_center_content"} -->
            <div class="wp-block-column te_center_content">
            <!-- wp:image {"sizeSlug":"medium","linkDestination":"none","className":"fill_width"} -->
            <figure class="wp-block-image size-medium fill_width">
            <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns"/></figure>
            <!-- /wp:image -->
            <!-- wp:heading -->
            <h2 class="has-text-align-center">columns</h2>
            <!-- /wp:heading -->  
            <!-- wp:paragraph  {"align":"center"} -->
            <p class="has-text-align-center">You can customize the layout of this block pattern in the Dashboard menu: Appearance \ Customize \ Web Dev Agent Block Patterns \ Web Dev Agent Columns</p>
            <!-- /wp:paragraph -->
            <!-- wp:buttons -->
            <div class="wp-block-buttons te_buttons">            
            <!-- wp:button -->
            <div class="wp-block-button te_button"><a class="wp-block-button__link">read more</a></div>
            <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
            </div>
            <!-- /wp:column --></div>
            <!-- /wp:columns -->',
	]);


   //
   // six feature columns block
   //
   register_block_pattern('te-six-feature-column', [
      'title' => __('Six Feature Columns', 'te'),
      'description' => _x( 'Six Feature Columns.', 'A Columns block with six features.', 'te' ),            
      'keywords' => ['six,columns'],
      'categories' => ['te-column-blocks'],
      'viewportWidth' => 1000,
      'content' =>  
         '<!-- wp:columns {"className":"te-columns te-six-feature-columns"} -->
         <div class="wp-block-columns te-columns te-six-feature-columns">
         <!-- wp:column {"className":"te_center_content"} -->
         <div class="wp-block-column te_center_content">
         <!-- wp:image {"linkDestination":"none"} -->
         <figure class="wp-block-image">
         <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns" /></figure>
         <!-- /wp:image --></div>
         <!-- /wp:column -->
         <!-- wp:column {"className":"te_center_content"} -->
         <div class="wp-block-column te_center_content">
         <!-- wp:image {"linkDestination":"none"} -->
         <figure class="wp-block-image">
         <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns"/></figure>
         <!-- /wp:image --></div>
         <!-- /wp:column -->
         <!-- wp:column {"className":"te_center_content"} -->
         <div class="wp-block-column te_center_content">
         <!-- wp:image {"linkDestination":"none"} -->
         <figure class="wp-block-image">
         <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns"/></figure>
         <!-- /wp:image --></div>
         <!-- /wp:column -->
         <!-- wp:column {"className":"te_center_content"} -->
         <div class="wp-block-column te_center_content">
         <!-- wp:image {"linkDestination":"none"} -->
         <figure class="wp-block-image">
         <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns"/></figure>
         <!-- /wp:image --></div>
         <!-- /wp:column -->
         <!-- wp:column {"className":"te_center_content"} -->
         <div class="wp-block-column te_center_content">
         <!-- wp:image {"linkDestination":"none"} -->
         <figure class="wp-block-image">
         <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns"/></figure>
         <!-- /wp:image --></div>
         <!-- /wp:column -->
         <!-- wp:column {"className":"te_center_content"} -->
         <div class="wp-block-column te_center_content">
         <!-- wp:image {"linkDestination":"none"} -->
         <figure class="wp-block-image">
         <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns"/></figure>
         <!-- /wp:image --></div>
         <!-- /wp:column -->
         </div><!-- /wp:columns -->',
   ]);


   // 
   // three feature cover-columns block
   //
   //  register_block_pattern('te-three-feature-cover-columns', [
	// 	'title' => __('Three Feature Cover-Columns', 'te'),
   //    'description' => _x( 'Three Feature Cover Columns.', 'Combining three feature columns over a cover block.', 'te' ),            
	// 	'keywords' => ['three,cover-column'],
	// 	'categories' => ['te-cover-column-blocks'],
	// 	'viewportWidth' => 1000,
	// 	'content' =>  
   //          '<!-- wp:columns {"className":"te-cover-columns te-three-feature-cover-columns"} -->
   //          <div class="wp-block-columns te-cover-columns te-three-feature-cover-columns"><!-- wp:column -->
   //          <div class="wp-block-column">
   //          <!-- wp:cover  -->
   //          <div class="wp-block-cover has-background-dim">
   //          <div class="wp-block-cover__inner-container">
   //          <!-- wp:heading {"textAlign":"center","level":2,"fontSize":"large"} -->
   //          <h2 class="has-text-align-center">Dynamic</h2>
   //          <!-- /wp:heading -->
   //          <!-- wp:paragraph  {"textAlign":"center"} -->
   //          <p class="has-text-align-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate autem voluptatem 
   //          deserunt ea odio quae odit molestiae provident similique id totam neque et dolorum explicabo, architecto itaque? Quas, eos quam?</p>
   //          <!-- /wp:paragraph -->
            // <!-- wp:buttons -->
            // <div class="wp-block-buttons te_buttons">            
            // <!-- wp:button -->
            // <div class="wp-block-button te_button"><a class="wp-block-button__link">read more</a></div>
            // <!-- /wp:button -->
            // </div>
            // <!-- /wp:buttons -->
   // </div></div>
   //          <!-- /wp:cover --></div>
   //          <!-- /wp:column -->
   //          <!-- wp:column -->
   //          <div class="wp-block-column">
   //          <!-- wp:cover {} -->
   //          <div class="wp-block-cover has-background-dim">
   //          <div class="wp-block-cover__inner-container">                     
   //          <!-- wp:heading {"textAlign":"center","level":2,"fontSize":"large"} -->
   //          <h2 class="has-text-align-center">Cover</h2>
   //          <!-- /wp:heading -->
   //          <!-- wp:paragraph  {"textAlign":"center"} -->
   //          <p class="has-text-align-center">mouse over to highlight this feature</p>
   //          <!-- /wp:paragraph -->
   //          <!-- wp:paragraph  {"textAlign":"center"} -->
   //          <p class="has-text-align-center">explore</p>
   //          <!-- /wp:paragraph --></div></div>
   //          <!-- /wp:cover --></div>
   //          <!-- /wp:column -->
   //          <!-- wp:column -->
   //          <div class="wp-block-column">
   //          <!-- wp:cover {} -->
   //          <div class="wp-block-cover has-background-dim">
   //          <div class="wp-block-cover__inner-container">                     
   //          <!-- wp:heading {"textAlign":"center","level":2,"fontSize":"large"} -->
   //          <h2 class="has-text-align-center">Columns</h2>
   //          <!-- /wp:heading -->
   //          <!-- wp:paragraph  {"textAlign":"center"} -->
   //          <p class="has-text-align-center">You can customize the layout of this block pattern 
   //          in Appearance \ Customize \ Web Dev Agent Block Patterns \ Web Dev Agent Cover-Columns...</p>
   //          <!-- /wp:paragraph -->
   //          <!-- wp:paragraph {"textAlign":"center"} -->
   //          <p class="has-text-align-center">learn more</p>
   //          <!-- /wp:paragraph --></div></div>
   //          <!-- /wp:cover --></div>
   //          <!-- /wp:column --></div>
   //          <!-- /wp:columns -->'
   // ]);


   // future :
   // want 'fade_in' on all Block Patterns - ideally configurable.
   // but we can't load in <style> at top of page since it is a class - we really need to apply here.
   // try eg  
   //            get_theme_mod('te_title_lead_fade_in')       // contains string 'fade_in' or '' 
   //
   // to insert 'fade_in' in 'div.te-title-lead' below

   //
   // title & lead text
   //
	register_block_pattern('te-title-lead', [
		'title' => __('Title And Lead Text', 'te'),
      'description' => _x( 'You can style all block patterns of this type in the customizer.', 'A title and lead text block.', 'te' ),            
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
         <p class="has-text-align-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.         
         <br>You can customize the layout of this block pattern in the Dashboard menu:
         <br> Appearance \ Customize \ Web Dev Agent Block Patterns \ Web Dev Agent Texts </p>
         <!-- /wp:paragraph -->
         </div>
         <!-- /wp:group -->'
   ]);
 
   
   //
   // simple text
   //
	register_block_pattern('te-simple-text', [
		'title' => __('Simple Text', 'te'),
      'description' => _x( 'Simple Text.', 'A simple text block.', 'te' ),            
		'keywords' => ['text'],
		'categories' => ['te-texts'],
		'viewportWidth' => 1000,
		'content' =>  
         '<!-- wp:group {"className":"te-text te-simple-text"} -->
         <div class="wp-block-group te-text te-simple-text">
         <!-- wp:paragraph -->
         <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate autem voluptatem deserunt ea odio quae odit molestiae provident similique id totam neque et dolorum explicabo, architecto itaque? Quas, eos quam?</p>
         <!-- /wp:paragraph -->
         <!-- wp:paragraph -->
         <p>You can customize the layout of this block pattern in the Dashboard menu:
         <br> Appearance \ Customize \ Web Dev Agent Block Patterns \ Web Dev Agent Texts </p>
         <!-- /wp:paragraph --></div>
         <!-- /wp:group -->'
	]);


   //
   // te-columns-text : future release
   //
	// register_block_pattern('te-columns-text', [
	// 	'title' => __('Columns Text', 'te'),
   //    'description' => _x( 'Columns Text.', 'A title and text block supporting columns on wider screens.', 'te' ),            
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
   //       in Appearance \ Customize \ Web Dev Agent Block Patterns \ Web Dev Agent Texts.</p>
   //       <!-- /wp:paragraph -->
   //       </div>
   //       <!-- /wp:group -->'
	// ]);


   //
   // te-image
   //
    register_block_pattern('te-image', [
		'title' => __('Web Dev Agent Image', 'te'),
      'description' => _x( 'Web Dev Agent Image.', 'An image block with Web Dev Agent customization.', 'te' ),            
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



   //
   // te-gallery
   //
    register_block_pattern('te-gallery', [
		'title' => __('Web Dev Agent Gallery', 'te'),
      'description' => _x( 'Web Dev Agent Gallery.', 'An image gallery block with Web Dev Agent customization.', 'te' ),            
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
         </figure></li>
         <li class="blocks-gallery-item">
         <figure>
         <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns"/>
         </figure></li>
         <li class="blocks-gallery-item">
         <figure>
         <img src="' . $site_uri .'/imgs/kae-anderson-7KLv5TOKOrM-unsplash.jpg" alt="image of columns"/>
         </figure></li>
         </ul>
         </figure>
         <!-- /wp:gallery -->'
   ]);



   // 
   // te-buttons
   //
   register_block_pattern('te-buttons', [
		'title' => __('Web Dev Agent Buttons', 'te'),
      'description' => _x( 'Web Dev Agent Buttons.', 'A Web Dev Agent button block.', 'te' ),            
		'keywords' => ['button'],
		'categories' => ['te-buttons'],
		'viewportWidth' => 1000,
		'content' =>  '<!-- wp:buttons  {"className":"te-buttons"} -->
                     <div class="wp-block-buttons te-buttons"><!-- wp:button -->
                     <div class="wp-block-button"><a class="wp-block-button__link">explore our projects</a></div>
                     <!-- /wp:button --></div>
                     <!-- /wp:buttons -->'
   ]);

}

add_action( 'init', 'te_register_block_patterns' );

?>