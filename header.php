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

<!-- HEADER
================================================== -->
<div class="container-fluid primary-navigation" role="main">

    <!-- Header: Logo, Title, and Tagline -->
    <div class="site-header text-center"> 
        <?php the_custom_logo(); ?>

        <div class="site-branding-text">
            <h1 class="site-title identity"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

            <?php
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) {
                echo '<p class="site-description">' . esc_attr( $description ) .'</p>';
                }
            ?>    
        </div><!-- .site-branding-text -->
    </div><!-- .site-header -->

    <!-- Menus: Mobile, Fullsize, and Search -->
    <div class="main-menu" >
        <nav id="site-navigation" class="navbar">     
            <div class="container">
                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target=".main-navbar-collapse-1">
                            <span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'idealist' ); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                <?php endif; ?>
                <?php
                wp_nav_menu( array(
                    'theme_location'    => 'primary',
                    'depth'             => 3,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse main-navbar-collapse-1',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'idealist_WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new idealist_WP_Bootstrap_Navwalker()
                ) );
                ?>
                
                <!-- Display Search Icon -->
                <div class="pull-right nav-search">
                    <button type="button" class="btn btn-default nav-search pull-right" onclick="idealist_showSearchInput()">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>

                    <!-- Search Entry Form  -->
                    <form id="full-search" action="<?php echo esc_url( home_url( '/') ); ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <input class="full-search-input" id="search" name="s" type="text" placeholder="<?php esc_attr_e( 'Search ...', 'idealist' );?>">
                                <button type="button" class="fa fa-times close-icon close-button" onclick="idealist_hideSearchInput()">
                                </button>   
                            </div>
                        </div>
                    </form>
                </div> 
            </div> 
        </nav> 
    </div>
</div><!-- /.container-fluid -->
      
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
if ( is_home () | is_single () | is_category () | is_search () | is_archive () ) {
    return;
}
?>

<?php if( has_post_thumbnail() ) { ?>
    <?php echo wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), array('1920', '600'), "", array( "class" => "img-responsive" ) );  ?>

    <!-- if not feature image, display fallback image -->
    <?php } else { ?>
    <?php } ?>
    