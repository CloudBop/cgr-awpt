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
    Menus::get_instance();
    Meta_Boxes::get_instance();
    Sidebars::get_instance();
    Clock_Widget::get_instance();

    $this->setup_hooks();
  }

  protected function setup_hooks() {

    /**
     * Actions
     */
    add_action('after_setup_theme', [$this, 'setup_theme'], $priority, $accepted_args);

  }

  // - https://developer.wordpress.org/reference/functions/add_theme_support/
  public function setup_theme() {
    // todo load-theme-text-domain - internationalisation
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
    
    //
    // adds body.custom-background selector to body - wp-includes/class-wp-rest-themes-controller
    add_theme_support('custom-background', [
      'default-color' => '#654687',
      // 'default-image' => 
      'default-repeat' => 'no-repeat'
    ]);

    // featured-image
    add_theme_support('post-thumbnails');

    // register image sizes
    add_theme_support( 'featured-thumbnail', 350, 233, $crop_from_center=true );

    // https://make.wordpress.org/core/2016/03/22/implementing-selective-refresh-support-for-widgets/
    add_theme_support('customize-selective-refresh-widgets');

    // - head meta
    add_theme_support('automatic-feed-links');

    // - html5 standards in default markup
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

    // - custom css to tinymice 
    // add_editor_style( $default = 'editor.style.css' || $custom_path )

    //
    // 
    add_theme_support('wp-block-styles');
    // align-wide and full-width imgs in gutenberg
    add_theme_support('align-wide');

    // set wordpress global width 
    global $content_width;
    if( ! isset( $content_width ) ) {
        // px
        $content_width = 1240;
    }
  }
}