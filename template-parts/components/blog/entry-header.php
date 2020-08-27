<?php
/**
 * template for entry-header (featured-image)
 * 
 * @package cgr-awpt
 */

// inside of loop

$the_post_id = get_the_ID();
$hide_title = get_post_meta( $the_post_id, '_hide_page_title', true);
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
  ?>
</header>