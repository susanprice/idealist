<?php
/**
 * Template Name: Two Panel Template
 * Template Post Type: post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Idealist
 */

get_header(); ?>

    <!-- BLOG CONTENT
    ================================================== -->
    <div class="container">
        <div class="row" id="primary">
            <main id="content" class="col-lg-8 col-md-8">       
            <?php
            while (have_posts()) :
                the_post();

                // display the entire post
                get_template_part('template-parts/content', get_post_format());

                the_post_navigation();

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
            endwhile; // End of the loop.
            ?>
            </main><!-- #content -->

            <!-- SIDEBAR
            ================================================== -->
            <aside class="col-sm-4">
                <?php get_sidebar(); ?>
            </aside>

        </div><!-- #primary -->
    </div><!-- #container -->

<?php get_footer(); ?>
            
