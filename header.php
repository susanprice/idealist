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
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'idealist' ); ?></a>

<!-- HEADER
================================================== -->
<header id="masthead" class="site-header">
    <div class="navbar-wrapper">
        <nav class="navbar" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#main-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <!-- mobile menu -->
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Display Site Title -->
                    <a class="navbar-brand" href="<?php echo home_url(); ?>">
                    <?php bloginfo('name'); ?>
                    </a>

                    <!-- input type="text" id="search-entry" class="form-control" placeholder="search" -->
                </div>

				 <?php
		            wp_nav_menu( array(
		                'menu'              => 'primary',
		                'theme_location'    => 'primary',
		                'depth'             => 2,
		                'container'         => 'div',
		                'container_class'   => 'collapse navbar-collapse',
		        		'container_id'      => 'main-navbar-collapse-1',
		                'menu_class'        => 'nav navbar-nav',
		                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		                'walker'            => new wp_bootstrap_navwalker())
		            );
		        ?>
					
                <!-- div class="nav navbar-nav navbar-right">
                    <button type="button" class="btn btn-default" onclick="showSearchInput()">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div -->

			</div><!-- /.container-fluid -->
        </nav>
    </div>
</header>

<!-- FEATURED IMAGE
================================================== -->

<?php
$thumbnail_url  = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
?>

<!-- check for feature image -->
<?php if( has_post_thumbnail() ) { ?>
    <section class="feature-image" style="background: url('<?php echo $thumbnail_url; ?>') no-repeat; background-size: cover;" data-type="background" data-speed="2">
        <!-- TODO make display of title conditional -->
        <!-- h1 class="page-title"><!-- ?php the_title(); ? --><!-- /h1 -->
    </section>
    
    <!-- if not feature image, display fallback image -->
    <?php } else { ?>

    <section class="feature-image feature-image-default" data-type="background" data-speed="2">
        <!-- TOD make display of title conditional -->
        <!-- h1 class="page-title"><!-- ?php the_title(); ? --><!-- /h1 -->
    </section>
    <?php } ?>



