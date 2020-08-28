<?php
/**
 * registers sidebars
 * 
 * @package cgr-awpt
 */
// theme namespace
namespace CGR_AWPT\Inc;
// import singleton functionality for autoloading
use CGR_AWPT\Inc\Traits\Singleton;
//
class Sidebars {
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
    add_action( 'widgets_init', [$this, 'register_sidebars']);
    add_action( 'widgets_init', [$this, 'register_clock_widget']);


  }

  public function register_sidebars(){
    //
    register_sidebar(array(
      'name'          => esc_html__( 'Sidebar', 'cgr-awpt'),
      'id'            => 'sidebar-1',
      'description'   => __( 'Main Sidebar', 'cgr-awpt'),
      'before_widget' => '<div id="%1$s class="widget widget-sidebar %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ));

    register_sidebar(array(
      'name'          => esc_html__( 'Footer sb', 'cgr-awpt'),
      'id'            => 'sidebar-2',
      'description'   => __( 'Footer Sidebar', 'cgr-awpt'),
      'before_widget' => '<div id="%1$s class="widget widget-footer cell column %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ));
  }


  public function register_clock_widget() {
    register_widget('CGR_AWPT\Inc\Clock_Widget');
  }
}