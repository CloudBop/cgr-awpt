<?php
/**
 * don't need to escape string when used as template.
 * e re-usuable pattern
 */

 $cover_style = sprintf(
  "background-image:url(%s); min-height:640px",
  esc_url(CGR_AWPT_BUILD_IMG_URI.'/patterns/cover.jpg')
 );
 //
 $test="background-image:url(http://dummycontent.local/wp-content/uploads/2020/08/9c81d4c5-9971-3585-9698-4a6c912ffdfd.jpg)";
?>
<!-- wp:cover {"url":"<?php echo esc_url(CGR_AWPT_BUILD_IMG_URI.'/patterns/cover1.jpg'); ?>","id":34} -->
<div class="wp-block-cover has-background-dim" style="background-image:url(<?php echo esc_url(CGR_AWPT_BUILD_IMG_URI.'/patterns/cover1.jpg') ?>);", ><div class="wp-block-cover__inner-container"><!-- wp:heading {"align":"center"} -->
<h2 class="has-text-align-center">Sample Cover</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Testing Testing Testing Testing Testing Testing Testing TestingTesting Testing Testing Testing</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"align":"center"} -->
<div class="wp-block-buttons aligncenter"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link">An Action Button </a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->