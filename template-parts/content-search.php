<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Idealist
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		
			<?php idealist_display_comments_badge();  ?>

			<div class="post-details">
				<?php edit_post_link( __( 'Edit', 'idealist' ), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>'  ); ?>
			</div><!-- post-details -->
		
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) { // check for feature image ?> 
	<div class="post-image">
		<?php the_post_thumbnail(); ?>
	</div><!-- post-image -->
	<?php } ?>
	
	<div class="post-excerpt">
		<?php the_excerpt(); ?>
	</div><!-- post-excerpt -->
	
	<!--  display tags and categories -->	
	<div class="post-footer">
		<?php idealist_post_footer(); ?>
	</div><!-- post-footer -->
	

</article><!-- #post-## -->
