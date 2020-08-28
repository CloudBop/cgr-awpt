<?php
/**
 * Footer - template
 * 
 * @package cgr-awpt
 * 
 */
?>

<footer>

  <h3>footer</h3>

  <?php
    if (is_active_sidebar('sidebar-2' ) ) {
    ?>
      <aside>
        <?php dynamic_sidebar('sidebar-2') ?>
      </aside>
    <?php
    }
    ?>

</footer>

</div> <!-- end #content.site-content -->
</div> <!-- end #page.site -->
<?php wp_footer(); ?>
</body>
</html>