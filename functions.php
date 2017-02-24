<?php
/**
 * functions and definitions for theme Idealist
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package idealist
 */

if ( ! function_exists( 'idealist_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function idealist_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'idealist', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Add HTML5 support
	add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list', 'caption',) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'idealist_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Enable custom logo support
	add_theme_support( 'custom-logo' );

	add_editor_style( array( 'assets/css/editor-style.css', idealist_fonts_url() ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
    	'primary' => __( 'Primary Menu', 'idealist' ),
    	// 'social' => __( 'Social Links Menu', 'idealist' ),
	) );
	
}
endif;
add_action( 'after_setup_theme', 'idealist_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function idealist_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'idealist_content_width', 640 );
}
add_action( 'after_setup_theme', 'idealist_content_width', 0 );

/**
 * Register custom fonts.
 */
function idealist_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'idealist' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function idealist_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'idealist' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'idealist' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
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
        'height'      => 100,
        'width'       => 400,
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
    // add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
}
add_action( 'after_setup_theme', 'idealist_post_formats_setup' );


/**
 * Add post type support
 *
 * @link https://developer.wordpress.org/themes/functionality/post-formats/
 */
function idealist_custom_post_formats_setup() {
    // add post-formats to post_type 'page'
    add_post_type_support( 'page', 'post-formats' );
 
    // add post-formats to post_type 'my_custom_post_type'
    add_post_type_support( 'my_custom_post_type', 'post-formats' );
}
add_action( 'init', 'idealist_custom_post_formats_setup' );


/**
 * Enqueue scripts and styles
 */
function idealist_scripts() {

	// Styles

	wp_enqueue_style( 'idealist-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome/css/font-awesome.min.css');

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Roboto:100,300,400,500', false );

	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/custom.css');


	// Scripts

	wp_enqueue_script( 'jquery-js', '//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), '20160804' );

	wp_enqueue_script( 'jquery-js', 'assets/js/jquery-3.1.1.slim.min.js', array(), '20160804' );

	wp_enqueue_script( 'bootstrap-js' , get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery-js'), '20160804' );

	wp_enqueue_script( 'idealist-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'idealist-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'idealist-style' ), '1.0' );
		wp_style_add_data( 'idealist-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'idealist-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'idealist-style' ), '1.0' );
	wp_style_add_data( 'idealist-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'idealist-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), '20160804', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'idealist_scripts' );


// Add "Header Image" option in the Customizer
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
* Register custom navigation walker
*/
require_once('wp_bootstrap_navwalker.php');

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
 * Replaces the excerpt "more" text with a link.
 */
function new_excerpt_more($more) {
    global $post;
	return '... <a class="moretag" href="'. get_permalink($post->ID) . '"> continue reading &raquo;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
