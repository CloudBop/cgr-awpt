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
   <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8- col-sm-12">
        <?php if ( have_posts() ) : ?>
          <div class="post-wrap">

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
          </div>  <!-- end post-wrap -->

        <?php else : 
          get_template_part('template-parts/content-none');
          endif;
        ?>

        <div class="prev-link">
          <?php previous_post_link(); ?>
        </div>
        <div class="next-link">
          <?php next_post_link(); ?>
        </div>
        
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12">
          <?php 
          // from sidebar.php
          get_sidebar(); ?>
      </div>
    </div> <!-- end row -->
   </div> <!-- end container -->
  </main>
</div>

<?php 
get_footer();
