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

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="container">
            <div class="col-sm-3">
                <p><a href="/"><img src="<?php echo get_bloginfo('template_url') ?>/assets/img/logo.png" alt="Idealist home"></a></p>
            </div><!-- col-sm-3 --> 

            <div class="col-sm-6">
                <nav>
                    <ul class="list-unstyled list-inline">
                        <li><a href="Home">Home</a></li>
                        <li><a href="Blog">Blog</a></li>
                        <li><a href="About">About</a></li>
                        <li><a href="Contact">Contact</a></li>
                    </ul>
                </nav>
            </div><!-- col-sm-6 -->
            <div class="col-sm-3">
                <p class="pull-right">Copyright &copy; 2017</p>
            </div><!-- col-sm-3 -->
        </div><!-- container -->
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
