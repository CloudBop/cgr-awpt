<?php
/**
 * Enqueue theme assets
 * 
 * @package cgr-awpt
 */
// theme namespace
namespace CGR_AWPT\Inc;
// import singleton functionality for autoloading
use CGR_AWPT\Inc\Traits\Singleton;
//
class Assets {
  // only instantiate once
  use Singleton;

  protected function __construct() {
    //load class
    //wp_die($message="hello", $title, $args);
    $this->setup_hooks();
  }

  protected function setup_hooks() {

    /**
     * Actions
     */
    add_action('wp_enqueue_scripts', [$this, 'register_styles']);
    add_action('wp_enqueue_scripts', [$this, 'register_scripts']);

  }

  public function register_styles() {
    // - use this for timestamp, only changes if file is modified
    // - register with WP :- can enqueue programatically, for page_template() || gutenberg || plugin 
    // register styles
    // $tmp_dir = CGR_AWPT_DIR_PATH . '/style.css';
    // wp_register_style($handle = 'style-css', get_stylesheet_uri(), [], $ver = filemtime($tmp_dir), $media= 'all');
    wp_register_style($handle = 'bootstrap-css', CGR_AWPT_DIR_URI.'/assets/src/library/css/bootstrap.min.css' , [], false, $media= 'all');
    wp_register_style($handle = 'main-css', CGR_AWPT_BUILD_CSS_URI . '/main.css' , ['bootstrap-css'], filemtime(CGR_AWPT_BUILD_CSS_DIR_PATH . '/main.css'), $media= 'all');
  
    // -create google font set - https://google-webfonts-helper.herokuapp.com/fonts
    wp_register_style($handle = 'fonts-css', CGR_AWPT_DIR_URI.'/assets/src/library/fonts/fonts.css' , [], false, $media= 'all');
    //
    // enqeue styles
    wp_enqueue_style($handle='bootstrap-css');
    wp_enqueue_style($handle='main-css');
  }

  public function register_scripts() {
    
    // register scripts
    $tmp2 = CGR_AWPT_BUILD_JS_DIR_PATH . '/main.js';
    wp_register_script($handle = 'main-js', CGR_AWPT_BUILD_JS_URI . '/main.js', ['jquery'], $ver = filemtime($tmp2), $in_footer=true);
    wp_register_script($handle = 'bootstrap-js', CGR_AWPT_DIR_URI.'/assets/src/library/js/bootstrap.min.js' , ['jquery'], false, $in_footer=true);
    
    //
    wp_enqueue_script($handle='main-js');
    wp_enqueue_script($handle='bootstrap-js');
  }

}