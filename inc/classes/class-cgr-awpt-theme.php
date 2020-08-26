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
    wp_die($message="hello", $title, $args);
    $this->set_hooks();
  }

  protected function set_hooks() {

  }
}