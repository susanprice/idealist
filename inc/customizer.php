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
          'capability' => 
          'edit_theme_options'
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
}
add_action( 'customize_register', 'idealist_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function idealist_customize_preview_js() {
	wp_enqueue_script( 'idealist_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'idealist_customize_preview_js' );
