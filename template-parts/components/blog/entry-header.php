<?php
/**
 * template for entry-header (featured-image)
 * 
 * @package cgr-awpt
 */

// inside of loop

$the_post_id = get_the_ID();
$hide_title = get_post_meta( $the_post_id, '_hide_page_title', true);
$heading_class = ! empty( $hide_title ) && 'yes' === $hide_title ? 'hide' : '';
$has_post_thumbnail = get_the_post_thumbnail($the_post_id);

?>


<header class="entry-header">
  <?php
    // featured image
    if ( $has_post_thumbnail ) {
      ?>
      <div class="entry-image mb3">
        <a href="<?php echo esc_url( get_permalink() ); ?>">
        <?php
          the_post_custom_thumbnail(
            $the_post_id,
            $size = "featured-thumbnail",
            [
              'sizes' => '(max-width: 350px) 350px, 233px',
              'class' => 'attachment-featured-thumbnail size-featured-image'
            ]
          )
        ?>
        </a>
      </div>
      <?php
    }


    // title - for single || page
    if ( is_single() || is_page() ){
      // interpolate strings
      printf(
        '<h1 class="page-title text-dark %1$s"> %2$s</h1>',
        // is hidden ?
        esc_attr( $heading_class ) ,
        // santize
        wp_kses( get_the_title() )
      );
      // - blog post list (home) or archives
    } else {
      
      printf(
        // link
        '<h2 class="entry-title mb-3"> 
          <a class="text-dark" href="%1$s"> %2$s test </a>
        </h2>',
        //
        esc_url( get_the_permalink() ) ,
        // santize
        wp_kses( get_the_title() )
      );
    }
  ?>

  
</header>