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
      <li>
         <div class="footer_copyright"><?php echo esc_html(get_theme_mod('te_copyright'));?></div>
      </li>
   </ul>

</footer>

<?php // load all enqueqed assets ?>
<?php  wp_footer(); ?>

</body>
</html>