<?php
/**
 *
 * Idealist: Customizer
 *
 * @package Idealist
 *
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function idealist_customize_register( $wp_customize ) {
    // Support selective refresh and improve responsiveness with postMessage
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
     
    // Abort if selective refresh is not available
    if ( ! isset( $wp_customize->selective_refresh ) ) {
        return;
    }

    // Support selective refresh for Idealist Options
    $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.site-title',
        'render_callback' => 'idealist_customize_partial_blogname',
    ) );

    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '.site-description',
        'render_callback' => 'idealist_customize_partial_blogdescription',
    ) );

    $wp_customize->selective_refresh->add_partial( 'logo', array(
        'selector' => '.custom-logo',
        'render_callback' => 'idealist_customize_partial_logo',
    ) );

    $wp_customize->selective_refresh->add_partial( 'copyright_id', array(
        'selector' => '.copyright',
        'render_callback' => 'idealist_customize_partial_copyright',
    ) );
}

add_action( 'customize_register', 'idealist_customize_register' );


/**
 * Options for WordPress Theme Customizer.
 */
function idealist_customizer( $wp_customize ) {
 
    // Idealist Options Panel 
    $wp_customize->add_panel( 'idealist_main_options', array(
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => esc_html__( 'Idealist Options', 'idealist' ),
        'description'    => esc_html__( 'Panel to update Idealist theme options', 'idealist' ), // in case of html tags such as <p>
        'priority'       => 10, 
    ) );

    // Idealist Options Sections
    $wp_customize->add_section( 'theme_options' , array(
        'title'      => __( 'Main Options', 'idealist' ),
        'priority'   => 20,
        'panel'       => 'idealist_main_options',
    ) );

    $wp_customize->add_section( 'theme_support' , array(
        'title'      => __( 'Documentation', 'idealist' ),
        'priority'   => 30,
        'panel'       => 'idealist_main_options',
    ) );

    // Idealist 'Main Options' Settings & Controls
    $wp_customize->add_setting( 'show_borders_id', array(
        'default'    => '1',
    ) );

    $wp_customize->add_control( 'show_borders_id', array(
        'label'      => __( 'Show Borders', 'documentation' ),
        'section'    => 'theme_options',
        'type'       => 'checkbox',
    ) );

    $wp_customize->add_setting( 'show_comments_badge_id', array(
        'default'    => '1',
    ) );

    $wp_customize->add_control( 'show_comments_badge_id', array(
        'label'      => __( 'Show Comments Badge', 'documentation' ),
        'section'    => 'theme_options',
        'type'       => 'checkbox',
    ) );

    $wp_customize->add_setting( 'copyright_id', array(
        'type'                    => 'theme_mod', 
        'capability'              => 'edit_theme_options',
        'theme_supports'          => '', 
        'default'                 => '',
        'transport'               => 'refresh', 
        'sanitize_callback'       => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'copyright_id', array(
        'label'                => __( 'Footer', 'idealist' ),
        'type'                 => 'textarea',
        'section'              => 'theme_options',      
        'priority'             => 160, 
        'description'          => __( 'copyright notice or license agreement:', 'idealist' ),
        'input_attrs'          => array(
        'style'                => 'border: 1px solid #ccc',
        'placeholder'          => __( 'Enter text here to display in footer.', 'idealist' ),
        ),
    ) );

    // Idealist 'Documentation/Support' Settings & Controls
    $wp_customize->add_setting( 'support_id', array(
    ) );

    $wp_customize->add_setting( 'thanks_id', array(
    ) );

    $wp_customize->add_control( 'support_id', array(
        'label'                => __( '', 'idealist' ),
        'type'                 => 'hidden',
        'section'              => 'theme_support',      
        'description'          => esc_html__( 'Find the FAQ and documentation here: https://wpvisuals.com/support/idealist', 'idealist' ),
    ) );

    $wp_customize->add_control( 'thanks_id', array(
        'label'                => __( 'Thanks for using Idealist!', 'idealist' ),
        'type'                 => 'hidden',
        'section'              => 'theme_support',      
    ) );

    // Hide core sections/controls when they aren't used on the current page.
    $wp_customize->get_section( 'header_image' )->active_callback = 'is_front_page';
    $wp_customize->get_control( 'blogdescription' )->active_callback = 'is_front_page';
}

add_action( 'customize_register', 'idealist_customizer' );

/**
 * Sanitize a URL 
 */
function idealist_sanitize_url( $url ) {
    return esc_url_raw( $url );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function idealist_customize_preview_js() {
	wp_enqueue_script( 'idealist_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );

    // future - use minified version
    // wp_enqueue_script( 'idealist_customizer', get_template_directory_uri() . '/assets/js/customizer.min.js', array( 'customize-preview' ), '20151215', true );

}
add_action( 'customize_preview_init', 'idealist_customize_preview_js' );

/**
 * Render the site title for the selective refresh partial.
 * 
 * @return void
 */
function idealist_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function idealist_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Render the site copyright for the selective refresh partial.
 *
 * @return void
 */
function idealist_customize_partial_copyright() {
}

/**
 * Render the site logo for the selective refresh partial.
 *
 * @return void
 */
function idealist_customize_partial_logo() {
}



