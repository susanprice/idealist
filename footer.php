<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Idealist
 */

?>


<?php 
    $idealist_footer_copyright = get_theme_mod( 'copyright_id' );
?>


<!-- Footer
================================================== -->
<footer>
    <div class="navbar-wrapper">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <p class="copyright"><?php echo esc_html( $idealist_footer_copyright ); ?></p>
                    <p class="credits"><?php echo esc_html("WordPress Theme: Idealist"); ?>
                </div>
            </div>
        </nav>
    </div>
</footer>    


<?php wp_footer(); ?>

</body>
</html>
