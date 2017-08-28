<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Idealist
 */

get_header(); ?>

		<?php
		if ( have_posts() ) : ?>
			<section class="feature-image feature-image-default-alt img-responive" data-type="background" data-speed="2">

			<div class="archive-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</div>	

			</section>

			<div class="container">
				<div class="row">
					<main id="content" class="col-sm-8">

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', get_post_format() );
						endwhile;

						the_posts_navigation();

						else :

						get_template_part( 'template-parts/content', 'none' );

						endif; ?>

					</main><!-- #main -->

					<!-- SIDEBAR
		    		================================================== -->
					<aside class="col-sm-4">
					<?php get_sidebar(); ?>
					</aside>

				</div --><!-- #primary -->
			</div><!-- #container -->
<?php
get_footer();
