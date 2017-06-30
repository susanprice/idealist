<?php
/**
 * Idealist header
 *
 * This is the template that displays all of the <head> sections and everything up until <div id="content">
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
$idealist_logo = get_theme_mod( 'custom_logo' );
$idealist_logo_image = wp_get_attachment_image_src( $idealist_logo , 'full' );
?>

<!-- CUSTOM SETTINGS
================================================== -->
<?php
  $idealist_header_text_color = get_header_textcolor();
  $idealist_background_color = get_background_color();  
  $idealist_show_borders = get_theme_mod( 'show_borders_id' );
?>

<style>
  /* Header Text Color */
  .site-title, p.site-description { color: #<?php echo esc_attr( $idealist_header_text_color ); ?>; }

  /* Background Color */
  #secondary > .widget_search { background-color: #<?php echo esc_attr( $idealist_background_color ); ?>; }

  /* Border Display */
  .post, .widget, .comments, input[type="search"], button.search-submit { border-width: <?php echo intval( $idealist_show_borders ); ?>; } 
</style>

<!-- HEADER
================================================== -->
<header id="masthead" class="site-header">
    <div class="navbar-wrapper">
        <nav class="navbar" role="navigation">
            <div class="container-fluid">
                <div class="row">
                    <div class="navbar-header">

                        <!-- Mobile Menu -->
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
                        
                        <!-- Display Custom Logo, Site Title, and Tagline -->
                        <a class="navbar-brand side-by-side" href="<?php echo esc_url( home_url() ); ?>">
                            <?php
                                if ( has_custom_logo() ) {
                                   echo '<img class="custom-logo" src="'. esc_url( $idealist_logo_image[0] ) .'">';
                                }
                                echo '<h1 class="site-title">'. esc_attr( get_bloginfo( 'name' ) ) .'</h1>';
                                echo '<p class="site-description">' . esc_attr( get_bloginfo( 'description', 'display' ) ) .'</p>';
                            ?>
                        </a>
                    </div> <!-- navbar-header -->

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
                </div>   

                <!-- Display Search Icon -->
                <div class="pull-right nav-search">
                    <button type="button" class="btn btn-default nav-search pull-right" onclick="showSearchInput()">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>

                    <!-- Search Entry Form  -->
                    <form id="full-search" action="<?php echo esc_url( home_url( '/') ); ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <input class="full-search-input" name="s" type="text" placeholder="<?php esc_attr_e( 'Search ...', 'idealist' );?>">
                                <button type="button" class="fa fa-times close-icon close-button js-close">
                                </button>   
                            </div>
                        </div>
                    </form>
                </div> 
			</div><!-- /.container-fluid -->
        </nav>
    </div>
</header>

<!-- CUSTOM HEADER
================================================== -->
<?php if ( get_header_image() ) : ?>
    <div id="site-header">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php header_image(); ?>" 
                width="<?php echo esc_attr( get_custom_header()->width ); ?>" 
                height="<?php echo esc_attr( get_custom_header()->height ); ?>" 
                class="img-responsive main-image"
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
    