<?php
/**
 * main template
 * 
 * end of template heirarchy
 * https://developer.wordpress.org/themes/basics/template-hierarchy/
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
        
        <?php } // endif ?>

        <div class="row">
          <?php 

            $index=0;
            $no_of_columns=3;


            while ( have_posts() ) : the_post();

              if ( 0 === $index % $no_of_columns ) {
                ?>
                  <div class="col-lg-4 col-md-6 col-sm-12">
                  
                <?php
              }

              get_template_part( 'template-parts/content');

              $index++;
              if ( 0 !== $index && 0 === $index % $no_of_columns) {
                ?>
                  </div>

              <?php }
              
              endwhile;
              ?>
        </div>
      </div>  <!-- end container -->

      <?php 
        else : 
          get_template_part('template-parts/content-none');  
        endif;
      
        cgr_awpt_pagination();
      ?>

  </main>
</div>

<?php 
get_footer();
