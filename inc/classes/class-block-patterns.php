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
  }

  public function register_block_patterns() {
    
    if (function_exists('register_block_pattern')){
      register_block_pattern(
        $slug = 'cgr-awpt/cover',
        $rgs = [
          'title'       => __('Cover | cgr-awpt', 'cgr-awpt'),
          'description' => __('Cover block image and text| cgr-awpt', 'cgr-awpt'),
          'content' => "<!-- wp:cover {\"url\":\"http://dummycontent.local/wp-content/uploads/2020/08/9c81d4c5-9971-3585-9698-4a6c912ffdfd.jpg\",\"id\":34} -->
          <div class=\"wp-block-cover has-background-dim\" style=\"background-image:url(http://dummycontent.local/wp-content/uploads/2020/08/9c81d4c5-9971-3585-9698-4a6c912ffdfd.jpg)\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->
          <h2 class=\"has-text-align-center\">Sample Cover</h2>
          <!-- /wp:heading -->
          
          <!-- wp:paragraph {\"align\":\"center\"} -->
          <p class=\"has-text-align-center\">Testing Testing Testing Testing Testing Testing Testing TestingTesting Testing Testing Testing</p>
          <!-- /wp:paragraph -->
          
          <!-- wp:buttons {\"align\":\"center\"} -->
          <div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->
          <div class=\"wp-block-button\"><a class=\"wp-block-button__link\">An Action Button </a></div>
          <!-- /wp:button --></div>
          <!-- /wp:buttons --></div></div>
          <!-- /wp:cover -->"
        ]
      );
    }
  }	
}