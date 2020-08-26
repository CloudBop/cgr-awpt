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
    
    // instantiate classes, using singleton trait + autoloader 

    Assets::get_instance();
    
    $this->setup_hooks();
  }

  protected function setup_hooks() {

    /**
     * Actions
     */
    add_action('after_setup_theme', [$this, 'setup_theme'], $priority, $accepted_args);

  }

  public function setup_theme() {
    // let WordPress manage title
    add_theme_support( 'title_tag' );

    add_theme_support( 'custom-logo', $defaults = array(
      // classnames 
      'header-text' => array( 'site-title', 'site-description' ),
      'height'      => 100,
      'width'       => 400,
      // add support for cropping image in WP-admin 
      'flex-height' => true,
      'flex-width'  => true,
    ));
    
  }
}