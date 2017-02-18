<?php
/** 
 * Template Name: Full Width Template 
 *
 * For pages and posts using full width
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
        <div id="content" class="col-md-12">
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