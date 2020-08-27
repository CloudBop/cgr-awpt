<?php
/**
 * register metaboxes
 * 
 * @package cgr-awpt
 */
// theme namespace
namespace CGR_AWPT\Inc;
// import singleton functionality for autoloading
use CGR_AWPT\Inc\Traits\Singleton;
//
class Meta_Boxes {
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
    add_action( 'add_meta_boxes', [$this, 'add_custom_metabox' ] );
    add_action( 'save_post', [$this, 'save_post_meta_data' ] );

  }

  public function add_custom_metabox($post) {
    $screens = [ 'post' ];

    foreach ($screens as $screen) {
      add_meta_box(
        $id = 'hide-page-title', 
        $title = __('hide-title', 'cgr-awpt'), 
        $callback = [$this, 'custom_meta_box_html'], // content cb, must be type callable 
        $screen, // post-type
        $context = 'side', // place in gutenberg document sidebar 
        $priority, // high || low
        $callback_args);
    }
  }

  public function custom_meta_box_html($post) {
    // pluiginbase name === action name === Applications/LocalByFlywheel/../inc/classes/class-meta-boxes.php
    wp_nonce_field(
      $action=plugin_basename(__FILE__), 
      $name  ='cgr_awpt__hide_title_field_nonce', 
      // $referer, 
      // $echo
    );

    $value = get_post_meta($post->ID, '_hide_page_title', true);
    ?>
    <label for="cgr-awpt-field"> <?php esc_html_e('Hide the page title', 'cgr-awpt'); ?></label>
    <select name="cgr_awpt__hide_title_field" id="cgr-awpt-field" class="postbox">
        <option value=""> <?php esc_html_e('Select', 'cgr-awpt'); ?> </option>
        <option value="yes" <?php selected($value, 'yes'); ?>>
          <?php esc_html_e('Yes', 'cgr-awpt'); ?>
        </option>
        <option value="no" <?php selected($value, 'no'); ?>> 
          <?php esc_html_e('No', 'cgr-awpt'); ?>
        </option>
    </select>
    <?php
  /* 
  Note there are no submit buttons in meta boxes. The meta box HTML is included inside the edit screen’s form tags, all the post data including meta box values are transfered via POST when the user clicks on the Publish or Update buttons.
  */
  }

  public function save_post_meta_data ($post_id) {

    /**
     * when post is saved || updated check $_POST for nonce, if available
     */

    if ( ! current_user_can( 'edit_post', $post_id) ) {
      return;
    }

    if(
      // updated check $_POST for nonce, if available
      ! isset( $_POST['cgr_awpt__hide_title_field_nonce'] )
      // only veryify if exists on $_POST
      || ! wp_verify_nonce( 
        $nonce = $_POST['cgr_awpt__hide_title_field_nonce'], 
        $action = plugin_basename(__FILE__))
    ){
      // failed to verify nonce
      return;
      
    } else{
      if (array_key_exists('cgr_awpt__hide_title_field', $_POST)) {
        // nonce verified
        update_post_meta(
            $post_id,
            $_wporg_meta_key='_hide_page_title',
            $_POST['cgr_awpt__hide_title_field']
        );
      }
    }
  }
}