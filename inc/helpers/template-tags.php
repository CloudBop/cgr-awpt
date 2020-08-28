<?php

// invoked in The Loop.
function get_the_post_custom_thumbnail( $post_id, $size = 'featured-thumbnail', $additional_attributes = []){

  $custom_thumbnail = '';

  if( null === $post_id ) {
    $post_id = get_the_ID();
  }

  if ( has_post_thumbnail($post_id)) {
    // new browser functions for lazy loading - is default in wp-5.5
    $default_attributes = [
      'loading'=> 'lazy'
    ];
    $attributes = array_merge( $additional_attributes, $default_attributes );

    $custom_thumbnail = wp_get_attachment_image(
      get_post_thumbnail_id($post_id), 
      $size, 
      $icon=false, 
      $attr=$attributes
    );
  }

  return $custom_thumbnail;
}

function the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = []){
  //
  echo get_the_post_custom_thumbnail($post_id, $size, $additional_attributes);
}

function cgr_awpt_posted_on() {
  // using <time> better for screen readers
  $time_string = '<time class="entry-date published updated" datetime="%1$s"> %2$s </time>';

  // post is modified ( when post published time !== to post modified time )
  if ( get_the_time($d='U') !== get_the_modified_time($d='U' ) ) {
    $time_string = '<time class="entry-date published" datetime="%1$s"> %2$s </time>';
    // for better SEO
    $time_string .= '<time class="updated" datetime="%3$s"> %4$s </time>';
  }

  $time_string = sprintf( $time_string,
    // see time formats
    esc_attr( get_the_date( DATE_W3C ) ),
    esc_attr( get_the_date() ),
    esc_attr( get_the_modified_date( DATE_W3C ) ),
    esc_attr( get_the_modified_date() ),
  );

  $posted_on = sprintf(
    // $ctx = ctx info for translators

    //FIXME: $s doesn't work as interpolator.

    esc_html_x( 'Posted on %s', $ctx='post date', 'cgr-awpt' ),
    '<a href="'. esc_url( get_permalink() ) .'" rel="bookmark">'. $time_string .'</a>'
  );

  echo '<span class="posted-one text-secondary">'. $posted_on .'</span>';
}

function cgr_awpt_posted_by() {
  $byline = sprintf(
    // translate escape+user ctx
    esc_html_x( 'by %s', 'post author', 'cgr-awpt'),
    '<span class="author vcard"> 
      <a href="'. esc_url( get_author_posts_url($author_id = get_the_author_meta('ID') ) ) .'">'. esc_html( get_the_author() ) .'</a>
    </span>'
  );

  echo '<span class="byline text-secondary">' . $byline . '</span>';
}

function cgr_awpt_the_excerpt( $trim_charachter_count=0 ) {
  
  // if excerpt is set
  if ( ! has_excerpt() || 0 === $trim_charachter_count ) {
    // echos 
    the_excerpt();
    return;
  }

  // else use custom excerpt

  $excerpt = wp_strip_all_tags($string = get_the_excerpt(), $remove_breaks=null);
  $excerpt = substr( $excerpt, 0, $trim_charachter_count);
  // truncate @ space before last word - filter out final word in case it's incomplete
  $excerpt = substr( $excerpt, 0, strrpos( $excerpt, ' ' ));
  //  
  echo $excerpt . '[...]';
}


function cgr_awpt_excerpt_more() {
  // - don't need on single
  if ( ! is_single() ) {

    $more = sprintf(
      '<button class="mt-4 btn btn-info">
        <a class="cgr-awpt-read-more text-white" href="%1$s"> %2$s</a>
      </button>',
      get_permalink( get_the_ID() ),
      __( 'Read more', 'cgr-awpt')
    );

  }

  return $more;
}