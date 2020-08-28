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

if ( !defined( 'CGR_AWPT_BUILD_URI') ) {
  // - get build folder 
  define( 'CGR_AWPT_BUILD_URI' , untrailingslashit( $string=get_template_directory_uri() ) . '/assets/build' );
}
if ( !defined( 'CGR_AWPT_BUILD_JS_URI') ) {
  // - get build folder 
  define( 'CGR_AWPT_BUILD_JS_URI' , untrailingslashit( $string=get_template_directory_uri() ) . '/assets/build/js' );
}
if ( !defined( 'CGR_AWPT_BUILD_JS_DIR_PATH') ) {
  // - get build folder 
  define( 'CGR_AWPT_BUILD_JS_DIR_PATH' , untrailingslashit( $string=get_template_directory() ) . '/assets/build/js' );
}
if ( !defined( 'CGR_AWPT_BUILD_CSS_URI') ) {
  // - get build folder 
  define( 'CGR_AWPT_BUILD_CSS_URI' , untrailingslashit( $string=get_template_directory_uri() ) . '/assets/build/css' );
}
if ( !defined( 'CGR_AWPT_BUILD_CSS_DIR_PATH') ) {
  // - get build folder 
  define( 'CGR_AWPT_BUILD_CSS_DIR_PATH' , untrailingslashit( $string=get_template_directory() ) . '/assets/build/css' );
}
if ( !defined( 'CGR_AWPT_BUILD_IMG_URI') ) {
  // - get build folder 
  define( 'CGR_AWPT_BUILD_IMG_URI' , untrailingslashit( $string=get_template_directory_uri() ) . '/assets/build/src/img' );
}

// autoload all classes
require_once CGR_AWPT_DIR_PATH .'/inc/helpers/autoloader.php';

// template tags
require_once CGR_AWPT_DIR_PATH .'/inc/helpers/template-tags.php';


//
function cgr_awpt_get_theme_instance() {
  \CGR_AWPT\Inc\CGR_AWPT_THEME::get_instance();
}
cgr_awpt_get_theme_instance();