<?php
/**
 * Header - template
 * 
 * @package cgr-awpt
 * 
 */

// Singleton - only instantiated once.
$menu_class = \CGR_AWPT\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id( 'cgr-awpt-header-menu' );

?>
<!DOCTYPE html>
<html lang="<?php language_attributes($doctype) ?>">
<head>
  <meta charset="<?php bloginfo($show)?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cgr-awpt WordPress Theme</title>

  <?php wp_head()?>  
</head>
<body <?php body_class(); ?>>

<?php 
  if ( function_exists('wp_body_open') ){
    // new in WP-5.2
    wp_body_open(); 
  }
?>
<div id="page" class="site">
  <header id="masthead" class="site-header" role="banner">
    <?php get_template_part( 'template-parts/header/nav' ); ?>
  </header>
  <div class="site-content" id="content">
  