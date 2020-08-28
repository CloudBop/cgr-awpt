<?php
/**
 * single template
 * 
 * 
 * @package cgr-awpt
 */
?>

<?php get_header();?>

<div id="primary">
  <main id="main" class="site-main mt-5" role="main">
    <?php if ( have_posts() ) : ?>
      <div class="container">

        <?php if( is_home() && ! is_front_page() ) { ?>
          <header class="mb-5">
              <h1 class="page-title screen-reader-text">
                <?php single_post_title(); ?>
              </h1>
          </header>
        <?php } // endif

          while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content');
          endwhile;
          ?>
      </div>  <!-- end container -->

    <?php else : 
      get_template_part('template-parts/content-none');
      endif;
    ?>

    <div class="container">
      <?php
        previous_post_link();
        next_post_link();
      ?>
    </div>
  </main>
</div>

<?php 
get_footer();
