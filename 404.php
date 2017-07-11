<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Idealist
 */

get_header(); ?>

<div class="container">
    <div class="row" id="primary">
        <div class="col-md-2"></div>
        <div id="content" class="col-md-8 panel">
            <header>
                <h2 class="page-title"><?php the_title(); ?></h2>
            </header>

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Yikes! That page can&rsquo;t be found.', 'idealist' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p class="not-found"><?php esc_html_e( 'Would you like to try searching for it?', 'idealist' ); ?></p>

                    <!--  display search form here only if we don't already have a sidebar containing a search widget -->
					<?php
						get_search_form();
					?>
				</div>
			</section>
		</div>
	</div>
</div>	

<?php
get_footer();
