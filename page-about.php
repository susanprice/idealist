<?php
/**
 * Template Name: About Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package idealist
 */

get_header();

$thumbnail_url  = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
?>

<!-- FEATURED IMAGE
================================================== -->

<!-- check for feature image -->
<?php if( has_post_thumbnail() ) { ?>
    <section class="feature-image" style="background: url('<?php echo $thumbnail_url; ?>') no-repeat; background-size: cover;" data-type="background" data-speed="2">
        <!-- TOD make display of title conditional -->
        <!-- h1 class="page-title"><!-- ?php the_title(); ? --><!-- /h1 -->
    </section>
    
    <!-- if not feature image, display fallback image -->
    <?php } else { ?>

    <section class="feature-image feature-image-default" data-type="background" data-speed="2">
        <!-- TOD make display of title conditional -->
        <!-- h1 class="page-title"><!-- ?php the_title(); ? --><!-- /h1 -->
    </section>
    <?php } ?>


<!-- MAIN CONTENT
================================================== -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <article class="post">
                <header>
                    <h2 class="page-title"><?php the_title(); ?></h2>
                </header>
                <section class="main-content">
                    <?php while (have_posts() ) : the_post(); ?>
                        <?php the_content()?>
                     <?php endwhile; ?>
                </section>
            </article>
        </div>
    </div>
</div>

<?php get_footer(); ?>
