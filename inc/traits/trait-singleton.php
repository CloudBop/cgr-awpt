<?php
//
namespace CGR_AWPT\Inc\Traits;
// - cannot instantiate a trait directly, use within class
trait Singleton {
  public function __construct() {

  }

  public function __clone(){
    // prevents obj cloning
  }

  // final === stop override from other class
  final public static function get_instance() {
    // store called 
    static $instance = [];
    // 
    $called_class = get_called_class();
    //
    if ( !isset( $instance[$called_class] ) ) {
      $instance[ $called_class ] = new $called_class();

      // register hook with wordpress
      do_action( sprintf($tag='cgr_awpt_singleton_init%s', $called_class));
    }

    return $instance[ $called_class ];
  }


}