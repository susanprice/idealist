<?php
/**
 *
 * Idealist: Customizer
 *
 * @package Idealist
 *
 */

/**
 * Add postMessage support and selective refresh for the Theme Customizer.
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
        'title'          => __( 'Idealist Options', 'idealist' ),
        'description'    => __( 'Panel to update Idealist theme options', 'idealist' ), 
        'priority'       => 10, 
    ) );

    // Idealist Options Sections
    $wp_customize->add_section( 'theme_options' , array(
        'title'      => __( 'Settings', 'idealist' ),
        'priority'   => 20,
        'panel'      => 'idealist_main_options',
    ) );

    $wp_customize->add_section( 'theme_support' , array(
        'title'      => __( 'Documentation', 'idealist' ),
        'priority'   => 30,
        'panel'      => 'idealist_main_options',
    ) );

    // Idealist 'Settings' Settings & Controls
    $wp_customize->add_setting( 'show_borders_id', array(
        'default'    => '1',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'show_borders_id', array(
        'label'      => __( 'Show Borders', 'idealist' ),
        'section'    => 'theme_options',
        'type'       => 'checkbox',
    ) );

    $wp_customize->add_setting( 'show_comments_badge_id', array(
        'default'    => '1',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'show_comments_badge_id', array(
        'label'      => __( 'Show Comments Badge', 'idealist' ),
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

    // Idealist 'Documentation' Settings & Controls
    $wp_customize->add_setting(
        'support_id', array(
        'sanitize_callback'       => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new Idealist_Support_Text( 
            $wp_customize,
            'support_id',
            array(
                'settings'      => 'support_id',
                'section'       => 'theme_support',
            )
        )
    );

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

if( class_exists( 'WP_Customize_Control' ) ):   

    class Idealist_Info_Text extends WP_Customize_Control {

        public function render_content(){
        ?>
            <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>

            <?php if($this->description){ ?>
                <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php }
        }
    }    

    class Idealist_Support_Text extends WP_Customize_Control {

        public function render_content() {  ?>
            <h3><?php esc_html_e('Quick Start Quide to Make Your Front Page Look Like the Screenshot:', 'idealist'); ?><h3>
            <h3><?php esc_html_e('Add a Logo', 'idealist'); ?></h3>
            <p><?php esc_html_e('1. Go to Appearance / Customize / Site Identity.', 'idealist'); ?></p>
            <p><?php esc_html_e('2. Select a logo. A square works best.', 'idealist'); ?></p>
            <p><?php esc_html_e('3. Select \'Save & Publish\'.', 'idealist'); ?>
            <h3><?php esc_html_e('Set the Colors', 'idealist'); ?></h3>
            <p><?php esc_html_e('1. Go to Appearance / Customize / Colors.', 'idealist'); ?></p>
            <p><?php esc_html_e('2. Set Header Text Color to #212121.', 'idealist'); ?></p>
            <p><?php esc_html_e('3. Set Background Color to #e8e8e8.', 'idealist'); ?></p>
            <p><?php esc_html_e('4. Select \'Save & Publish\'.', 'idealist'); ?>
            <h3><?php esc_html_e('Set the Header Image', 'idealist'); ?></h3>
            <p><?php esc_html_e('1. Go to Appearance / Customize / Header Image.', 'idealist'); ?></p>
            <p><?php esc_html_e('2. Use a jpeg that is at least 1920 x 600 pixels.', 'idealist'); ?></p>
            <p><?php esc_html_e('3. Select \'Save & Publish\'.', 'idealist'); ?>
            <h3><?php esc_html_e('Setup the Sidebar', 'idealist'); ?></h3>
            <p><?php esc_html_e('1. Go to Appearance / Customize / Widgets.', 'idealist'); ?></p>
            <p><?php esc_html_e('2. Add the Recent Posts widget.', 'idealist'); ?></p>
            <p><?php esc_html_e('3. Add a Text widget for an About section.', 'idealist'); ?></p>
            <p><?php esc_html_e('4. Delete the other widgets.', 'idealist'); ?></p>
            <p><?php esc_html_e('5. Select \'Save & Publish\'.', 'idealist'); ?>
            <h3><?php esc_html_e('Set the Front Page', 'idealist'); ?></h3>
            <p><?php esc_html_e('1. Go to Appearance / Customize / Static Front Page.', 'idealist'); ?></p>
            <p><?php esc_html_e('2. Set to \'Your latest posts\'.', 'idealist'); ?></p>
            <p><?php esc_html_e('3. Select \'Save & Publish\'.', 'idealist'); ?>
            <h3><?php esc_html_e('Extras', 'idealist'); ?></h3>
            <p><?php esc_html_e('1. Go to Appearance / Customize / Idealist Options / Settings.', 'idealist'); ?></p>
            <p><?php esc_html_e('2. Toggle the Comments Badge and Borders.', 'idealist'); ?></p>
            <p><?php esc_html_e('3. Add Text to the Footer.', 'idealist'); ?></p>
            <h3><?php esc_html_e('Thank you for using the WordPress Idealist theme!', 'idealist'); ?></h3>
            <?php
        }
    }

endif;


/**
 * Enqueues front-end CSS for the border style
 *
 * @see wp_add_inline_style()
 *
 */
function idealist_border_css() {
    $css = '';
    $idealist_show_borders = get_theme_mod( 'show_borders_id' );

    // if borders have not been set, use the default
    if ( get_theme_mod( 'show_borders_id' ) === FALSE ) {
        $idealist_show_borders = 1;
    }

    $css = '
        article, 
        button.search-submit, 
        .comments, 
        input[type="search"], 
        .panel, 
        .post, 
        .widget { 
            border-width: ' . $idealist_show_borders . 'px;
        }
    ';

    wp_enqueue_style( 'idealist-custom-style', get_template_directory_uri() . '/assets/css/custom.css', array(), IDEALIST_VERSION );
    wp_add_inline_style( 'idealist-custom-style', $css );
}
add_action( 'wp_enqueue_scripts', 'idealist_border_css' );
