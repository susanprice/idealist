<?php
/**
 * The main template file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Idealist
 */

get_header(); ?>

	<!-- BLOG CONTENT
	================================================== -->
	<div class="container">
		<div class="row" id="primary">
				
			<main id="content" class="col-sm-8" role="main">
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
						get_template_part( 'template-parts/content', get_post_format() );
					endwhile;

					the_posts_navigation();

				else :
					get_template_part( 'template-parts/content', 'none' );
				endif; ?>
			</main>


			<!-- SIDEBAR
			================================================== -->
			<aside class="col-sm-4">
			<!-- this is defined in Appearance > Widgets -->
			<!-- ?php get_sidebar( 'primary' ); ? -->

			<!-- this is a minimal, default sidebar if a sidebar is not defined in Appearance > Widgets -->
			<?php get_sidebar( ); ?>

			</aside>	
		</div>
	</div>

<?php get_footer(); ?>
