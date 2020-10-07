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
    // will only exist if activated in backend
    register_nav_menus(
      array(
        // why is it better to use esc_html__ ???
        'cgr-awpt-header-menu' => esc_html__( 'Header Menu', $Text_Domain = 'cgr-awpt' ),
        'cgr-awpt-footer-menu' => esc_html__( 'Footer Menu', 'cgr-awpt' )
       )
     );
  }

  public function get_menu_id( $location ) {
    // return all currently set locations = ['primary',...]
    $locations = get_nav_menu_locations();  
    // get menu object id by assoc key
    $menu_id = $locations[$location]; 
    // if !empty return 
    return ! empty($menu_id) ? $menu_id : '';   
  }

  public function get_child_menu_items( $menu_array, $parent_id) {
    // store child menus
    $child_menus = [];   
    // error handling
    if ( !empty ($menu_array) && is_array($menu_array)) {
      // loop through header menu again
      foreach ($menu_array as $menu) {
        // prev error on frontend === $menu->$menu_item_parent - never threw php error because it found the object
        // intval - force int. get all the menus that are children of this parent.
        if(intval( $menu->menu_item_parent) === $parent_id) {
          //
          array_push( $child_menus, $menu);
        }
      }
    }
  
    return $child_menus;
  }
}