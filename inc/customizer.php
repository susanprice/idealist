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

    // Colors section: add settings and controls to the existing colors section    
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
                array('label'   => $color['label'], 
                    'section'   => 'colors',
                    'settings'  => $color['slug'])
                )
            );
        }

   // Support selective refresh
    $wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
     
    $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.site-title',
        'render_callback' => 'idealist_customize_partial_blogname',
    ) );
    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '.site-description',
        'render_callback' => 'idealist_customize_partial_blogdescription',
    ) );
    $wp_customize->selective_refresh->add_partial( 'logo', array(
        'selector' => 'img.custom-logo',
        'render_callback' => 'idealist_customize_partial_logo',
    ) );


    // Add Theme Options section
    $wp_customize->add_section( 'theme_options' , array(
        'title'      => __( 'Theme Options', 'idealist' ),
        'priority'   => 130,
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

   // Support selective refresh for Theme Options
    $wp_customize->selective_refresh->add_partial( 'copyright_id', array(
    'selector' => '.copyright',
    'render_callback' => 'idealist_customize_partial_copyright',
    ) );

    // remove toggle to display site title and description
    $wp_customize->remove_control('display_header_text');

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



