<?php
/**
 * Theme Functions
 * 
 * @package cgr-awpt
 * 
 */

//
// Set constants
//
if ( !defined( 'CGR_AWPT_DIR_PATH') ) {
  // - get theme dir - app/public/wp-content/themes/cgr-awpt
  define( 'CGR_AWPT_DIR_PATH' , untrailingslashit( $string=get_template_directory() ) );
}

if ( !defined( 'CGR_AWPT_DIR_URI') ) {
  // - get_template_directory_uri 
  define( 'CGR_AWPT_DIR_URI' , untrailingslashit( $string=get_template_directory_uri() ) );
}

// autoload all classes
require_once CGR_AWPT_DIR_PATH .'/inc/helpers/autoloader.php';
//
function cgr_awpt_get_theme_instance() {
  \CGR_AWPT\Inc\CGR_AWPT_THEME::get_instance();
}
cgr_awpt_get_theme_instance();