<?php
/**
 * functions and definitions for theme Idealist
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Idealist
 */

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

	add_editor_style( array( 'assets/css/editor-style.css', idealist_fonts_url() ) );

	// This theme uses wp_nav_menu() in mulitple locations.
	register_nav_menus( array(
    	'primary' => __( 'Primary Menu', 'idealist' ),
    	'social'  => __( 'Social Links Menu', 'idealist' ),
	) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		/*
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-birch}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-skybuildings}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-tree}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{header}}',
			),
		),
		*/

		// Create the custom image attachments used as post thumbnails for pages.
		/*
		'attachments' => array(
			'image-birch' => array(
				'post_title' => _x( 'Birch', 'Theme starter content', 'idealist' ),
				'file' => 'assets/img/birch.jpg', // URL relative to the template directory.
			),
			'image-skybuildings' => array(
				'post_title' => _x( 'Sky', 'Theme starter content', 'idealist' ),
				'file' => 'assets/img/skybuildings.jpg',
			),
			'image-tree' => array(
				'post_title' => _x( 'Tree', 'Theme starter content', 'idealist' ),
				'file' => 'assets/img/tree.jpg',
			),
		),
		*/

		// Default to a static front page and assign the front and posts pages.
		/*
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),
		*/

		// Set the front page section theme mods to the IDs of the core-registered pages.
		/*
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),
		*/

		// Set up nav menus for each of the two areas registered in the theme.
		// Note that the core "home" page is actually a link in case a static front page is not used.
		/*
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'idealist' ),
				'items' => array(
					'link_home', 
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'idealist' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		*/	
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
 * Set the content width based on design and stylesheet.
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
		'name'          => esc_html__( 'Primary Sidebar', 'idealist' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'idealist' ),
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

	wp_enqueue_style( 'idealist-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome/css/font-awesome.css');

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Roboto:100,300,400,500', false );

	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/custom.css');


	// Scripts

	wp_enqueue_script( 'jquery-js', get_template_directory_uri() . '/assets/js/jquery-3.2.0.js', array(), '20160804' );

	wp_enqueue_script( 'bootstrap-js' , get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery-js'), '20160804' );

	wp_enqueue_script( 'idealist-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'idealist-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'idealist_scripts' );

// Add "Header Image" option in the Customizer
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme
require get_template_directory() . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates
require get_template_directory() . '/inc/extras.php';

// Customizer additions
require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file
require get_template_directory() . '/inc/jetpack.php';

// Register custom navigation walker
require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

// Replaces the excerpt "more" text with a link
function idealist_excerpt_more($more) {
    global $post;
	return '... <a class="moretag" href="'. esc_url( get_permalink($post->ID) ) . '"> continue reading &raquo;</a>';
}
add_filter('excerpt_more', 'idealist_excerpt_more');

// Allow svg and json uploads to the media library
/*
function idealist_add_mime_types( $mime_types ) {
	$mime_types['svg'] = 'image/svg+xml';     
	$mime_types['json'] = 'application/json'; 
	return $mime_types;
}
add_filter( 'upload_mimes', 'idealist_add_mime_types', 1, 1 );
*/
