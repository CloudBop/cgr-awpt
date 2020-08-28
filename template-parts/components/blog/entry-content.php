<?php
/**
 * 
 * 
 * @package cgr-awpt
 */
?>


<div class="entry-content">
  <?php
  //
  if( is_single() ) {
    /**
     * if a single page || post
     */
    the_content(
      $more_link_text = sprintf(
        wp_kses(
          __( 'Continue reading %s <span class="meta-nav"> &rarr </span>', 'cgr-awpt'),
          [ // allow span with class attribute
            'span'=>[
              'class'=> []
            ]
          ]
        ),
        //
        $strip_teaser = the_title($before = '<span class="screen-reader-text">"', $after = '"</span>', $echo = false)
      )
    );
  } else {
    cgr_awpt_the_excerpt(50);
  }

  ?>
</div>

