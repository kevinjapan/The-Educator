<?php
/*
 * The Educator Block Patterns
 * @package WordPress
 * @subpackage WebDevAgent
 * @since WebDevAgent 1.0
 */

// Block Pattern Templates
require_once get_template_directory() . '/inc/block-pattern-templates/te-column-blocks-templates.php';
require_once get_template_directory() . '/inc/block-pattern-templates/te-cover-blocks-templates.php';
require_once get_template_directory() . '/inc/block-pattern-templates/te-gallery-blocks-templates.php';
require_once get_template_directory() . '/inc/block-pattern-templates/te-image-blocks-templates.php';
require_once get_template_directory() . '/inc/block-pattern-templates/te-text-blocks-templates.php';
require_once get_template_directory() . '/inc/block-pattern-templates/te-title-lead-blocks-templates.php';
require_once get_template_directory() . '/inc/block-pattern-templates/te-button-blocks-templates.php';


//
// The Educator Block Patterns
// Registers Patterns in 'block inserter' in editor.
// Each pattern is an HTML template for the UI block.
// We generate these block patterns by building the pattern in editor then copying the html (use code editor mode - 'serialized block')
// and inserting that into my calls to register_block_pattern().content below.
//



//
// Register Block Pattern Categories
//
function te_register_block_pattern_categories() { 
	register_block_pattern_category('te-cover-blocks', ['label' => __('The Educator Covers', 'the-educator')]);
	register_block_pattern_category('te-column-blocks', ['label' => __('The Educator Columns', 'the-educator')]);  
	register_block_pattern_category('te-texts', ['label' => __('The Educator Texts', 'the-educator')]); 
	register_block_pattern_category('te-images', ['label' => __('The Educator Images', 'the-educator')]); 
	register_block_pattern_category('te-buttons', ['label' => __('The Educator Buttons', 'the-educator')]);   
}
add_action( 'init', 'te_register_block_pattern_categories' );






// Register block pattern templates
//
function te_register_block_patterns() {

   $site_uri = get_template_directory_uri();   

   // Cover Blocks Templates
   te_register_cover_blocks_templates($site_uri);

   // Column Blocks Templates
   te_register_column_blocks_templates($site_uri);

   // Title & Lead Blocks Templates
   te_register_title_lead_blocks_templates($site_uri);

   // Text Blocks Templates
   te_register_title_lead_blocks_templates($site_uri);

   // Simple Text Blocks Template
   te_register_text_blocks_templates($site_uri);

   // Image Blocks Template
   te_register_image_blocks_templates($site_uri);

   // Gallery Blocks Template
   te_register_gallery_blocks_templates($site_uri);

   // Button Blocks Templates
   te_register_button_blocks_templates($site_uri);

}
add_action( 'init', 'te_register_block_patterns' );

?>