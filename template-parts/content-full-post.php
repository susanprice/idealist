<?php
/**
 * Template part for displaying posts
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

	<?php 
	if ( has_post_thumbnail() ) { // check for feature image ?> 
		<div class="post-image">
			<?php the_post_thumbnail(); ?>
		</div><!-- post-image -->
	<?php 
	} ?>
	
	<div class="entry-content">
		<?php
			the_content();
			?>

		    <!--  display tags and categories -->
		    <div class="post-footer">
		       	<?php idealist_post_footer(); ?>
		    </div>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'idealist' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
