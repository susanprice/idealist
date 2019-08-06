<?php
/**
 * About Idealist Page
 *
 * @since Idealist 1.1.5
 *
 */
function idealist_welcome_page() { ?>
    <div class="about">
        <br><h1 class="welcome"><?php esc_html_e('Welcome to Idealist!', 'idealist'); ?></h1><br>
        <h3 class="sub-heading"><?php esc_html_e('Theme Options & Quick Start Guide', 'idealist'); ?></h3>

        <p class="description"><?php esc_html_e('Use the WordPress Customizer to set theme options and view the Quick Start Guide.', 'idealist'); ?></p>
        <a class="button button-primary" target="_blank" href="customize.php"><?php esc_html_e('Go to Customizer', 'idealist'); ?></a><br> 
        <br>
        <h3><?php esc_html_e('Questions?', 'idealist'); ?></h3>
        <p class="description"><?php esc_html_e('If you have questions about the Idealist theme, please post your questions in the community forum.', 'idealist'); ?></p>
        <a class="button button-primary" target="_blank" href="https://wordpress.org/support/theme/idealist"><?php esc_html_e('Go to Support Forum', 'idealist'); ?></a><br>
        <br>
        <h3><?php esc_html_e('Subscribe to Design News', 'idealist'); ?></h3>
        <p class="description"><?php esc_html_e('If you would like to receive design news, sign up here:', 'idealist'); ?></p>
        <a class="button button-primary" target="_blank" href="https://NewMediaThemes.com">NewMediaThemes.com</a><br>  
        <br><p class="description"><?php esc_html_e('Enjoying Idealist? Please consider leaving a five star review on WordPress.org. We\'d really appreciate it!', 'idealist'); ?></p> 
    </div>
    <?php 
}    
?>