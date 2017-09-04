<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Idealist
 */

get_header(); ?>

	<section class="img-responive" data-type="background" data-speed="2">
		<!--  translators: displays search term entered -->
		<h1 class="page-title">
		<?php 			
		// translators: displays search term entered
		printf(	esc_html__( 'Search Results for: %s', 'idealist' ), 
		'<span>' . get_search_query() . '</span>' ); ?></h1>
	</section>	

	<div class="container">
		<div id="primary" class="row">
			<main id="content" class="col-sm-8">

				<?php
				if ( have_posts() ) : ?>
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'search' );
					endwhile;

					the_posts_navigation();

				else :
					get_template_part( 'template-parts/content', 'none' );
				endif; ?>
			</main><!-- #content -->
			<!-- SIDEBAR
		    ================================================== -->
			<aside class="col-sm-4">
			<?php get_sidebar(); ?>
			</aside>

		</div><!-- #primary -->
	</div><!-- .container -->	
<?php get_footer(); ?>
