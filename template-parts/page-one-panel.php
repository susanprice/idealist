<?php
/** 
 * Template Name: One Panel Template
 *
 * For pages and posts using a single panel layout
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Idealist
*/

get_header(); ?>

<!-- MAIN CONTENT
================================================== -->
<div class="container">
    <div class="row" id="primary">

        <div class="col-sm-1 col-md-3"></div>

        <main id="content" class="col-sm-10 col-md-6" role="main">
            <article class="post">
                <header>
                    <h2 class="page-title"><?php the_title(); ?></h2>
                </header>

                <section class="main-content">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>    
                </section>
            </article>    
        </main>

        <div class="col-sm-1 col-md-3"></div>

    </div>
</div>

<?php get_footer(); ?>    