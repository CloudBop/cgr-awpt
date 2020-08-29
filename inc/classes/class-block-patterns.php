<?php
/**
 * Block Patterns
 * 
 * @package cgr-awpt
 */
// theme namespace
namespace CGR_AWPT\Inc;
use WP_Widget;
// import singleton functionality for autoloading
use CGR_AWPT\Inc\Traits\Singleton;

class Block_patterns extends WP_Widget {

	use Singleton;

	/**
	 * Register widget with WordPress.
	 */
	protected function __construct() {
    $this->setup_hooks();
  }
  
  protected function setup_hooks() {
    /**
     * Actions
     */
    add_action('init', [$this, 'register_block_patterns']);
    add_action('init', [$this, 'register_block_pattern_categories']);
  }

  public function register_block_patterns() {
    
    if (function_exists('register_block_pattern')){

      $cover_content = $this->get_pattern_content('template-parts/patterns/cover');

      register_block_pattern(
        $slug = 'cgr-awpt/cover',
        $rgs = [
          'title'       => __('Cover | cgr-awpt', 'cgr-awpt'),
          'description' => __('Cover block image and text| cgr-awpt', 'cgr-awpt'),
          'categories' => ['cover'],
          'content' => $cover_content 
        ]
      );
    }
  }

  public function get_pattern_content($template_path){
    // output buffering
    ob_start();
      // echos the template to buffer
      get_template_part($template_path);
      // save buffer content to variable : string
      $cover_pattern = ob_get_contents();
    ob_end();

    return $cover_pattern;
  }
  
  public function register_block_pattern_categories() {

    $pattern_categories = [
      'cover' => __('Cover', 'cgr-awpt'),
      'carousel' => __('Carousel', 'cgr-awpt')
    ];

    // defensive php
    if ( ! empty( $pattern_categories ) && is_array( $pattern_categories) ) {
      //
      foreach ( $pattern_categories as $pattern_category => $pattern_category_label ) {
        register_block_pattern_category(
          
            $pattern_category,
            array( 'label' => $pattern_category_label)
          
        );
      }
    }





  }
}