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
    $colors = array();
    $colors[] = array(
        'slug'=>'content_text_color', 
        'default' => '#333',
        'label' => __('Content Text Color', 'idealist')
    );
    $colors[] = array(
        'slug'=>'content_link_color', 
        'default' => '#88C34B',
        'label' => __('Content Link Color', 'idealist')
    );

    /* add settings and controls to an existing section (color) */
    foreach( $colors as $color ) {
        // SETTINGS
        $wp_customize->add_setting(
            $color['slug'], array(
              'default' => $color['default'],
              'type' => 'option', 
              'capability' => 'edit_theme_options',
              'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        // CONTROLS
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                $color['slug'], 
                array('label' => $color['label'], 
                    'section' => 'colors',
                    'settings' => $color['slug'])
                )
            );
        }


    /* add settings and controls to a new section (footer) */
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
     'label'                => __( 'Copyright Notice' ),
     'type'                 => 'textarea',
     'section'              => 'footer',      
     'priority'             => 160, 
     'description'          => __( 'This text will display in the footer:' ),
     'input_attrs'          => array(
         'style'            => 'border: 1px solid #ccc',
         'placeholder'      => __( '' ),
         ),
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
