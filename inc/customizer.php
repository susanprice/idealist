<?php
/**
 * idealist Theme Customizer
 *
 * @package idealist
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function idealist_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    /* add a setting and control to an existing section (color) */
    /* TODO replace date picker with color picker */
    $wp_customize->add_setting( 'setting_id', array(
        'type'                    => 'theme_mod', 
        'capability'              => 'edit_theme_options',
        'theme_supports'          => '', 
        'default'                 => '',
        'transport'               => 'refresh', 
        'sanitize_callback'       => '',
        'sanitize_js_callback'    => '', 
    ) );

    $wp_customize->add_control( 'setting_id', array(
        'type'              => 'date',
        'priority'          => 10, 
        'section'           => 'colors', 
        'label'             => __( 'Date' ),
        'description'       => __( 'This is a date control with a red border.' ),
        'input_attrs'       => array(
            'class'         => 'my-custom-class-for-js',
            'style'         => 'border: 1px solid #900',
            'placeholder'   => __( 'mm/dd/yyyy' ),
            ),
        'active_callback' => 'is_front_page',
    ) );

    /* add a setting and control to a new section (footer) */
    /* TODO replace date picker with a custom string or copyright notice */
    $wp_customize->add_section( 'footer' , array(
        'title'      => __( 'Footer', 'idealist' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'copyright_id', array(
        'type'                    => 'theme_mod', 
        'capability'              => 'edit_theme_options',
        'theme_supports'          => '', 
        'default'                 => '',
        'transport'               => 'refresh', 
        'sanitize_callback'       => '',
        'sanitize_js_callback'    => '', 
    ) );

    $wp_customize->add_control( 'copyright_id', array(
          'label' => __( 'Copyright Notice' ),
          'type' => 'textarea',
          'section' => 'footer',
        ) );


    // Hide core sections/controls when they aren't used on the current page.
    $wp_customize->get_section( 'header_image' )->active_callback = 'is_front_page';
    $wp_customize->get_control( 'blogdescription' )->active_callback = 'is_front_page';
}
add_action( 'customize_register', 'idealist_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function idealist_customize_preview_js() {
	wp_enqueue_script( 'idealist_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'idealist_customize_preview_js' );
