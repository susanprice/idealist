<?php
/**
 * Idealist header
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package idealist
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'idealist' ); ?></a>


 		<!-- HEADER
        ================================================== -->
        <header id="masthead" class="site-header">
            <div class="navbar-wrapper">
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->

                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <!-- mobile menu -->
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.html">IDEALIST</a>
                            <input type="text" id="search-entry" class="form-control" placeholder="search">
                        </div>

						<div class="collapse navbar-collapse" id="main-navbar-collapse-1">
						    <ul class="nav navbar-nav">
								<!-- If the menu location is not set in the Admin, 
								then by default all pages will appear in menu  -->
								 <?php
						            wp_nav_menu( array(
						                'menu'              => 'primary',
						                'theme_location'    => 'primary',
						                'depth'             => 2,
						                'container'         => 'div',
						                'container_class'   => 'collapse navbar-collapse',
						        		'container_id'      => 'bs-example-navbar-collapse-1',
						                'menu_class'        => 'nav navbar-nav',
						                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						                'walker'            => new wp_bootstrap_navwalker())
						            );
						        ?>
  							</ul>
			      
                            <div class="nav navbar-nav navbar-right">
                                <button type="button" class="btn btn-default" onclick="showSearchInput()">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
					    </div><!-- /.navbar-collapse -->
                    </div>
                </nav>
            </div>
        </header>










	<?php
	// If a regular post or page, and not the front page, show the featured image.
	if ( has_post_thumbnail() && ( is_single() || ( is_page() && !is_frontpage() ) ) ) :
		echo '<div class="single-featured-image-header">';
		the_post_thumbnail();
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>

	<div id="content" class="site-content">
