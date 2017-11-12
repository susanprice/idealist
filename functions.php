<?php
/**
 * functions and definitions for theme Idealist
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Idealist
 */

define( 'IDEALIST_VERSION', '1.1.3' );

if ( ! function_exists( 'idealist_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 */
function idealist_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'idealist', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Featured Images (aka Post Thumbnails) on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Add HTML5 support
	add_theme_support( 'html5', array('comment-form', 'comment-list', 'caption',) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'idealist_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Enable custom logo support
	add_theme_support( 'custom-logo' );

	// Set styles for TinyMCE editor
	add_editor_style( 'assets/css/editor-style.css' );

	// Set the default content width.
	$GLOBALS['content_width'] = 600;

	// This theme uses wp_nav_menu() in mulitple locations.
	register_nav_menus( array(
    	'primary' => __( 'Primary Menu', 'idealist' ),
    	'social'  => __( 'Social Links Menu', 'idealist' ),
	) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place two core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put one core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
			),
		),
	);

	/**
	 * Filters Idealist array of starter content.
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'idealist_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
endif;
add_action( 'after_setup_theme', 'idealist_setup' );

/**
 * Set the maximum content width
 */
function idealist_content_width() {

	if ( ! isset( $content_width ) ) {
		$content_width = 600;
	}

	$GLOBALS['content_width'] = apply_filters( 'idealist_content_width', $content_width );
}
add_action( 'after_setup_theme', 'idealist_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function idealist_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'idealist' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to display on the right side of your posts. This sidebar is displayed on the Front Page by default, and with the Two Panel Template.', 'idealist' ),
		'class'			=> 'minimal',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'idealist_widgets_init' );


/**
 * Register custom logo.
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-logo/
 */
function idealist_custom_logo_setup() {
    $defaults = array(
        'height'      => 50,
        'width'       => 50,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'idealist_custom_logo_setup' );


/**
 * Add theme support for post formats.
 *
 * @link https://developer.wordpress.org/themes/functionality/post-formats/
 */
function idealist_post_formats_setup() {
	add_theme_support( 'post-formats', array( 'aside', 'link', 'image', 'quote', 'status' ) );
}
add_action( 'after_setup_theme', 'idealist_post_formats_setup' );


/**
 * Add post type support
 *
 * @link https://developer.wordpress.org/themes/functionality/post-formats/
 */
function idealist_custom_post_formats_setup() {
    add_post_type_support( 'page', 'post-formats' );
    add_post_type_support( 'my_custom_post_type', 'post-formats' );
}
add_action( 'init', 'idealist_custom_post_formats_setup' );


/**
 * Enqueue scripts and styles
 */
function idealist_scripts() {

	// Styles

	wp_enqueue_style( 'idealist-style', get_stylesheet_uri(), array(), IDEALIST_VERSION );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome/css/font-awesome.min.css', array(), '4.7.0' );

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Roboto:100,300,400,500', false );

	// wp_enqueue_style( 'idealist-custom-style', get_template_directory_uri() . '/assets/css/custom.min.css', array(), IDEALIST_VERSION );
	wp_enqueue_style( 'idealist-custom-style', get_template_directory_uri() . '/assets/css/custom.css', array(), IDEALIST_VERSION );

	// Scripts

	wp_enqueue_script( 'bootstrap-js' , get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.7', true );

	wp_enqueue_script( 'idealist-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array( 'jquery' ), '1.0', true );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'idealist-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	wp_enqueue_script( 'idealist-custom-js', get_template_directory_uri() . '/assets/js/custom.min.js', array(), IDEALIST_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'idealist_scripts' );

// Add "Header Image" option in the Customizer
require get_template_directory() . '/inc/custom-header.php';

// Additional features to allow styling of the templates
require get_template_directory() . '/inc/template-functions.php';

// Custom template tags for this theme
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions
require get_template_directory() . '/inc/customizer.php';

// Register custom navigation walker
require_once get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with a "MORE" link.
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function idealist_excerpt_more($more) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'more<span class="screen-reader-text"> "%s"</span>', 'idealist' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter('excerpt_more', 'idealist_excerpt_more');
