<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package idealist
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		
		<div class="post-comments-badge">
			<a href="<?php comments_link(); ?>"><i class="fa fa-comments"></i> <?php comments_number( 0, 1, '%'); ?></a>
		</div><!-- post-comments-badge -->

		<div class="post-details">
			<?php edit_post_link( 'Edit', '<i class="fa fa-pencil"></i> ', ''  ); ?>
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

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'idealist' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
