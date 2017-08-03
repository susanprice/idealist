<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Idealist
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses idealist_header_style()
 */
function idealist_custom_header_setup() {

	/**
	 * Filter Idealist custom-header support arguments.
	 *
	 * @since Idealist 1.0.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-image     		Default image of the header.
	 *     @type string $default_text_color     Default color of the header text.
	 *     @type int    $width                  Width in pixels of the custom header image. Default 954.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 1300.
	 *     @type string $flex-height     		Flex support for height of header.
	 *     @type string $header-text     		Display the header text over the image.	 
	 *     @type string $wp-head-callback       Callback function used to styles the header image and text
	 *                                          displayed on the blog.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'idealist_custom_header_args', array(
		'default-image'          => get_theme_file_uri( '/assets/img/header.jpg' ),
		'default-text-color'     => '000000',
		'width'                  => 1920,
		'height'                 => 600,
		'flex-height'            => true,
		'header-text'            => true,
		'wp-head-callback'       => 'idealist_header_style',
	) ) );

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/img/header.jpg',
			'thumbnail_url' => '%s/assets/img/header.jpg',
			'description'   => __( 'Default Header Image', 'idealist' ),
		),
	) );
}
add_action( 'after_setup_theme', 'idealist_custom_header_setup' );

if ( ! function_exists( 'idealist_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see idealist_custom_header_setup().
 */
function idealist_header_style() {
	$header_text_color = get_header_textcolor();

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
	 */
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;
