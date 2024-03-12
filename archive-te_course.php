<?php

// Archive Page for Courses Custom Post Types 
// 

get_header();
?>

<!-- The Educator Theme : Courses Arhive -->

<?php
// display Course Cards
require_once 'template-parts/course-cards/course-cards.php';
?>

<!-- wp_link_pages() -->

<section style="display:flex;">
   <?php posts_nav_link('&nbsp;&nbsp;','prev','next'); ?>
</section>


<?php get_footer(); ?>