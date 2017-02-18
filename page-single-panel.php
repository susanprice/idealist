<?php
/* 
 * Template Name: Single Panel Template 
 *
 * For placing content inside a bordered panel for readability
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Idealist
 * @since 1.0
 * @version 1.1
*/

get_header(); ?>

<!-- MAIN CONTENT
================================================== -->
<div class="container">
    <div class="row" id="primary">
        <div class="col-md-2"></div>
        <div id="content" class="col-md-8 panel">
            <header>
                <h2 class="page-title"><?php the_title(); ?></h2>
            </header>
            <section class="main-content">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; // end of the loop ?>    
            </section>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php get_footer(); ?>  