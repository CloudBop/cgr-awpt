<?php
/**
 * bootsraps theme, entry-point for all classes
 * 
 * @package cgr-awpt
 */
?>
<?
namespace CGR_AWPT\Inc;
// import singleton functionality
use CGR_AWPT\Inc\Traits\Singleton;

class CGR_AWPT_THEME {
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
    $tmp_dir = get_template_directory() . '/style.css';
    // - register with WP :- can enqueue programatically, for page_template() || gutenberg || plugin 
    // register styles
    wp_register_style($handle = 'style-css', get_stylesheet_uri(), [], $ver = filemtime($tmp_dir), $media= 'all');
    wp_register_style($handle = 'bootstrap-css', get_template_directory_uri().'/assets/src/library/css/bootstrap.min.css' , [], false, $media= 'all');

    //
    // enqeue styles
    wp_enqueue_style($handle='bootstrap-css');
    wp_enqueue_style($handle='style-css');
  }

  public function register_scripts() {
    // register scripts
    $tmp2 = get_template_directory() . '/assets/main.js';
    wp_register_script($handle = 'main-js', get_template_directory_uri().'/assets/main.js', [], $ver = filemtime($tmp2), $in_footer=true);
    wp_register_script($handle = 'bootstrap-js', get_template_directory_uri().'/assets/src/library/js/bootstrap.min.js' , ['jquery'], false, $in_footer=true);
    
    wp_enqueue_script($handle='main-js');
    wp_enqueue_script($handle='bootstrap-js');
  }
}