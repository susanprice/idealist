<?php
/**
 * Idealist header
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Idealist
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


<!-- CUSTOM LOGO
================================================== -->
<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>

<!-- CUSTOM COLORS
================================================== -->
<?php
  $content_text_color = get_option('content_text_color');
  $content_link_color = get_option('content_link_color');
  $header_text_color = get_header_textcolor();
?>

<style>
  /* Header Text Color */
  h1.logo { color: #<?php echo esc_attr( $header_text_color ); ?>; } 

  /* Content Text Color */
  #content p { color: <?php echo esc_attr( $content_text_color ); ?>; }

  /* Link Color */
  #content a { color: <?php echo esc_attr( $content_link_color ); ?>; }
  .navbar > .container-fluid .navbar-brand { color:  <?php echo esc_attr( $content_link_color ); ?>; }
</style>

<!-- HEADER
================================================== -->
<header id="masthead" class="site-header">
    <div class="navbar-wrapper">
        <nav class="navbar" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- mobile menu -->
                    <?php
                        if ( has_nav_menu( 'primary' ) ) {
                            ?>
                            <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#main-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                    <?php        
                        }
                    ?>    

                    <!-- Display Site Title -->
                    <a class="navbar-brand" href="<?php echo esc_attr( home_url() ); ?>">
                        <?php
                        if ( has_custom_logo() ) {
                            echo '<img class="custom-logo" src="'. esc_url( $logo[0] ) .'">';
                        } else {
                            echo '<h1 class="site-title">'. esc_attr( get_bloginfo( 'name' ) ) .'</h1>';
                        }
                        $description = get_bloginfo( 'description', 'display' );
                        echo '<p class="site-description">' . esc_attr( get_bloginfo( 'description', 'display' ) ) .'</p>';
                        ?>
                    </a>
                </div>

				<?php

                    if ( has_nav_menu( 'primary' ) ) {
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
                    }    
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

<!-- TEST
================================================== -->
<?php
if ( has_post_format( 'quote' )) {
}
?>


<!-- CUSTOM HEADER
================================================== -->
<?php if ( get_header_image() ) : ?>
    <div id="site-header">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php header_image(); ?>" 
                width="<?php echo esc_attr( get_custom_header()->width ); ?>" 
                height="<?php echo esc_attr( get_custom_header()->height ); ?>" 
                class="img-responsive"
                alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        </a>
    </div>
<?php endif; ?>


<!-- FEATURED IMAGE
================================================== -->
<?php
if ( is_home () | is_single () | is_category () | is_search () ) {
    return;
}
?>

<?php if( has_post_thumbnail() ) { ?>
    <?php echo wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), array('1920', '600'), "", array( "class" => "img-responsive" ) );  ?>

    <!-- if not feature image, display fallback image -->
    <?php } else { ?>
    <?php } ?>
    