<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package idealist
 */

?>

<!-- Footer
================================================== -->
<div class="navbar-wrapper">
    <nav class="navbar">
        <div class="container-fluid">
        <hr>
           <div class="col-sm-12 col-md-12 col-lg-12">
                <nav>
                  <?php wp_nav_menu( array( 
                        'menu'              => 'social',
                        'theme_location'    => 'social',
                        'container_class'   => 'social_menu_class',
                        'link_before'       => '<span class="screen-reader-text">',
                        'link_after'        => '</span>',
                        'fallback_cb'       => false
                         ) ); ?>  
                </nav>
            </div>    

            <div class="col-sm-12 col-md-12 col-lg-12">
                <p class="copyright">Copyright &copy; 2017</p>
            </div>
        </div>
    </nav>
</div>


<?php wp_footer(); ?>

</body>
</html>
