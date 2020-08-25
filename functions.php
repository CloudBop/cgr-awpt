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
   //
   wp_enqueue_style($handle = 'styles-css', get_stylesheet_uri(), [], $ver = filemtime($tmp_dir), $media= 'all');
   //
   $tmp2 = get_template_directory() . '/assets/main.js';
   wp_enqueue_script($handle = 'main-js', get_template_directory_uri().'/assets/main.js', [], $ver = filemtime($tmp2), $in_footer=true);
 
}

 add_action('wp_enqueue_scripts', 'cgr_awpt');