<?php
/**
 * Header - template
 * 
 * @package cgr-awpt
 * 
 */
?>
<!DOCTYPE html>
<html lang="<?php language_attributes($doctype) ?>">
<head>
  <meta charset="<?php bloginfo($show)?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cgr-awpt WordPress Theme</title>

  <?php wp_head()?>  
</head>
<body>

<?php 
  // new in WP-5.2
  wp_body_open(); 
?>
<header class="main">
<h2>header</h2>
</header>