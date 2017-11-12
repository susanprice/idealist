<?php
/**
 * Template Name: Two Panel Template
 * Template Post Type: page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Idealist
 */

get_header(); ?>

	<div class="container">
		<div class="row" id="primary">
        
			<!-- MAIN CONTENT
            ================================================== -->	
			<main id="content" class="col-sm-8" role="main">
			<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h2 class="page-title screen-reader-text"><?php single_post_title(); ?></h2>
						</header>

					<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'page' );
					endwhile; // End of the loop.
				endif;	
				?>
			</main><!-- #main -->

			<!-- SIDEBAR
			================================================== -->
			<aside class="col-sm-4">
			<!-- this is defined in Appearance > Widgets -->
			<!-- ?php get_sidebar( 'primary' ); ? -->

			<!-- this is a minimal, default sidebar if a sidebar is not defined in Appearance > Widgets -->
			<?php get_sidebar( ); ?>

			</aside>

		</div><!-- #primary -->
	</div>	
<?php
get_footer();
