<?php
/**
 * Template Name: Single Panel Template
 *   
 * For placing content inside panels for readability.
 * This template displays one panel width-wise
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Idealist
 */

get_header(); ?>

<!-- MAIN CONTENT
================================================== -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <article class="post">
            
                <header>
                    <h2 class="page-title"><?php the_title(); ?></h2>
                </header>

                <section class="main-content">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; // end of the loop ?>    
                </section>

            </article>
        </div>
    </div>
</div>

<?php get_footer(); ?>  