<?php
/**
 * The template for displaying all pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Idealist
 */

get_header(); ?>

    <div class="container">
        <div class="row" id="primary">
            <main id="content" class="col-sm-8" role="main">
            
                <?php
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content', 'page' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open( ) || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>
            </main><!-- #main -->

            <!-- SIDEBAR
            ================================================== -->
            <aside class="col-sm-4">
            <!-- this is defined in Appearance > Widgets -->
            <!-- ?php get_sidebar( 'primary' ); ? -->

            <!-- this is a minimal, default sidebar if a sidebar is not defined in Appearance > Widgets -->
            <?php get_sidebar( ); ?>
        </div><!-- #primary -->
    </div>    

<?php
get_sidebar();
get_footer();