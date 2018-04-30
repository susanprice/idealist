<?php
/**
 * About Idealist Page
 *
 * @since Idealist 1.1.5
 *
 */
function idealist_welcome_page() { 
    $html = '<div class="about">';
        $html .= '<br><h1 class="welcome">Welcome to Idealist!</h1><br>';

        $html .= '<h3 class="sub-heading">Theme Options & Quick Start Guide</h3>';

        $html .= '<p class="description">Use the WordPress Customizer to set theme options and view the Quick Start Guide.</p>';
                
        $html .= '<a class="button button-primary" target="_blank" href="customize.php">Go to Customizer</a><br>'; 

        $html .= '<br>';

        $html .= '<h3>Questions?</h3>';

        $html .= '<p class="description">If you have questions about the Idealist theme, please post your questions in the community forum.</p>';

        $html .= '<a class="button button-primary" target="_blank" href="https://wordpress.org/support/theme/idealist">Go to Support Forum</a><br>';

        $html .= '<br>';

        $html .= '<h3>Subscribe to Design News</h3>';

        $html .= '<p class="description">If you would like to receive design news, sign up here:</p>';

        $html .= '<a class="button button-primary" target="_blank" href="https://NewMediaThemes.com">NewMediaThemes.com</a><br>';  
        
        $html .= '<br><p class="description">Enjoying Idealist? Please consider leaving a five star review on WordPress.org. We\'d really appreciate it!</p>'; 

        $html .= '</div>';
  
    echo wp_kses( $html, idealist_allowed_html() );   
}
?>
