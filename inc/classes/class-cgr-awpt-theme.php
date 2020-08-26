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

  }  
}