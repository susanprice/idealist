<?php
/**
 * The template for the contact page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Idealist
 */

get_header(); ?>

	<div class="container-fluid">
		<div class="row" id="primary">
			
			<div class="col-sm-1 col-md-3"></div>
	
			<main id="content" class="col-sm-10 col-md-6" role="main">
			<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>

					<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'page' );
					endwhile; // End of the loop.
				endif;	
				?>
			</main>

			<div class="col-sm-1 col-md-3"></div>

		</div><!-- #primary -->
	</div>	

<?php get_footer(); ?>
