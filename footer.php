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
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="col-sm-6 col-md-3 footer-nav">
                <!-- button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button -->
                <a class="navbar-brand" href="/">IDEALIST</a>
            </div>
            <div class="hidden-sm hidden-xs col-md-6">
                <nav class="center">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Home<span class="sr-only">(current)</span></a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="vcenter">
                    <p class="copyright">Copyright&copy;2017</p>
                </div>
            </div>
        </div>
    </nav>
</div>


<?php wp_footer(); ?>

</body>
</html>
