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
  // register styles
  wp_register_style($handle = 'style-css', get_stylesheet_uri(), [], $ver = filemtime($tmp_dir), $media= 'all');
  wp_register_style($handle = 'bootstrap-css', get_template_directory_uri().'/assets/src/library/css/bootstrap.min.css' , [], false, $media= 'all');
  
  // register scripts
  wp_register_script($handle = 'main-js', get_template_directory_uri().'/assets/main.js', [], $ver = filemtime($tmp2), $in_footer=true);
  wp_register_script($handle = 'bootstrap-js', get_template_directory_uri().'/assets/src/library/js/bootstrap.min.js' , ['jquery'], false, $in_footer=true);
  //
  // enqeue styles
  wp_enqueue_style($handle='bootstrap-css');
  wp_enqueue_style($handle='style-css');

  // enqueue scripts
  wp_enqueue_script($handle='main-js');
  wp_enqueue_script($handle='bootstrap-js');
}

 add_action('wp_enqueue_scripts', 'cgr_awpt');