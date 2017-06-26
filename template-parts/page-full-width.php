<?php
/** 
 * Template Name: Full Width Template 
 *
 * For pages and posts using full width
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Idealist
*/

get_header(); ?>

<!-- MAIN CONTENT
================================================== -->
<div class="container-fluid">
    <div class="row" id="primary">
        <header>
            <h2 class="page-title"><?php the_title(); ?></h2>
        </header>

        <section class="main-content">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        </section>
    </div>
</div>

<?php get_footer(); ?>    