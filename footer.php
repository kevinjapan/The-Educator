<footer>

   <ul>
      <li>
         <?php 
         if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
         } 
         ?>
         <!-- <?php echo get_bloginfo('name');?> -->
      </li>
      <li>
         <?php wp_nav_menu(
            array(
               'theme_location' => 'footer-menu'
            )
         ); ?>     
      </li>
      <li></li>
   </ul>

   <ul class="footnote">
      <li class="flex fit_content">
         <div class="footer_copyright fit_content">
            <?php 
            echo esc_html(get_theme_mod('te_copyright'));
            ?>
         </div>
         <div class="footer_copyright_auto_complete fit_content">
            <?php
            $inc_auto_complete = get_theme_mod('te_copyright_auto_complete');
            if($inc_auto_complete) {
               echo esc_html(' - ' . date("Y"));
            }
            ?>
         </div>
      </li>
   </ul>

</footer>

<?php // load all enqueqed assets ?>
<?php  wp_footer(); ?>

</body>
</html>