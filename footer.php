<footer>

   <ul>
      <li>
         <a href="<?php echo get_site_url(); ?>">
            <h5><?php echo get_bloginfo('name');?></h5>
         </a>
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