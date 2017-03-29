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


<!-- CUSTOM LOGO
================================================== -->
<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
if ( has_custom_logo() ) {
    echo '<img src="'. esc_url( $logo[0] ) .'">';
} else {
    echo '<h1>'. esc_attr( get_bloginfo( 'name' ) ) .'</h1>';
}
?>

<?php
  $content_text_color = get_option('content_text_color');
  $content_link_color = get_option('content_link_color');
  $header_text_color = get_header_textcolor();
?>
<style>
  #content { color:  <?php echo $content_text_color; ?>; }
  #content a { color:  <?php echo $content_link_color; ?>; }
  .navbar > .container-fluid .navbar-brand { color:  <?php echo $content_link_color; ?>; }
</style>

<!-- TODO debug -->
<?php 
  echo "The header text color is: ". $header_text_color . "."; 
?>

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

<!-- TEST
================================================== -->
<?php
if ( has_post_format( 'quote' )) {
  // echo 'this is the quote format';
}
?>


<!-- CUSTOM HEADER
================================================== -->
<?php if ( get_header_image() ) : ?>
    <div id="site-header">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php header_image(); ?>" 
                width="<?php echo get_custom_header()->width; ?>" 
                height="<?php echo get_custom_header()->height; ?>" 
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
    