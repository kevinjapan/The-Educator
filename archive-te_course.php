<?php
/*
Archive Page for Course Custom Post Type
*/

get_header(); ?>

<div class="show_page_name">archive-te_course.php</div>

<?php
require_once 'template-parts/course-cards/course-cards.php';
?>

<!-- wp_link_pages() -->

<section style="display:flex;">
   <?php posts_nav_link('&nbsp;&nbsp;','prev','next'); ?>
</section>


<?php get_footer(); ?>