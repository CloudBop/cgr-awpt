<?php
/**
 * Theme Functions
 * 
 * @package cgr-awpt
 * 
 */

 function cgr_awpt(){
  // - use this for timestamp, only changes if file is modified
  $tmp_dir = get_template_directory() . '/style.css';
  $tmp2 = get_template_directory() . '/assets/main.js';
  //
  // - register with WP :- can enqueue programatically, for page_template() || gutenberg || plugin 
  wp_register_style($handle = 'style-css', get_stylesheet_uri(), [], $ver = filemtime($tmp_dir), $media= 'all');
  wp_register_script($handle = 'main-js', get_template_directory_uri().'/assets/main.js', [], $ver = filemtime($tmp2), $in_footer=true);
  //
  // 
  wp_enqueue_style($handle='style-css');
  wp_enqueue_script($handle='main-js');
}

 add_action('wp_enqueue_scripts', 'cgr_awpt');