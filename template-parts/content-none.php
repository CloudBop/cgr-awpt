<?php
/**
 * content none
 * 
 * 
 * @package cgr-awpt
 */
?>
<section class="no-result not-found">
  <header class="page-header">
    <h1 class="page-title"><?php esc_html_e('No posts found.', 'cgr-awpt') ?> </h1>
  </header>

  <div class="page-content">
    <?php
      if (is_home() && current_user_can( 'publish_posts' )) {
        ?>
          <p>
            <?php
              printf(
                // print string with allowed html
                wp_kses(
                  $string = __('Ready to publish your first post?  <a href="%s"> Get started here </a> ', 'cgr-awpt' ),
                  [
                      // allowed tags
                      'a' => [
                        // allowed attributes
                        'href'
                      ]
                  ]
                ),
                esc_url( admin_url( 'post-new.php') )
              )
            ?>
          </p>
        <?
      } elseif( is_search() ) {
        ?>
        <p> <?php esc_html_e( 'Sorry but nothing matched this search term. Please try another search term', 'cgr-awpt') ?></p>
        <?php
        //
        get_search_form();
      } else {
        ?>
        <p> <?php esc_html_e( 'It seems we cannot find what you are looking for. Perhaps a search will help.', 'cgr-awpt') ?></p>
        <?php
        //
        get_search_form();
      }
    ?>
  </div>
</section>