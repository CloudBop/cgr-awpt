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
class Menus {
  // only instantiate once
  use Singleton;

  protected function __construct() {
    //load class
    $this->setup_hooks();
  }

  protected function setup_hooks() {

    /**
     * Actions
     */
    add_action( 'init', [$this, 'register_menus' ] );
  }

  public function register_menus() {
    // set wordpress appearances/Menus
    register_nav_menus(
      array(
        // why is it better to use esc_html__ ???
        'cgr-awpt-header-menu' => esc_html__( 'Header Menu', $Text_Domain = 'cgr-awpt' ),
        'cgr-awpt-footer-menu' => __( 'footer Menu', 'cgr-awpt' )
       )
     );
  }

  public function get_menu_id( $location ) {
    // get all the locations = ['primary',...]
    $locations = get_nav_menu_locations();

    // get object id by assoc key
    $menu_id = $locations[$location]; 

    return ! empty($menu_id) ? $menu_id : '';   
  }
}