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
			<!-- Display comments badge unless it was disabled in the customizer -->
			<?php if ( esc_attr (get_theme_mod( 'show_comments_badge_id' ) !== 0 ) ) : ?>
				<div class="post-comments-badge">
					<a href="<?php comments_link(); ?>"><i class="fa fa-comments"></i> <?php comments_number( 0, 1, '%'); ?></a>
				</div><!-- post-comments-badge -->
			<?php endif; ?>
	
			<!-- This version includes author -->
			<!-- ?php idealist_posted_on(); ? -->

			<div class="post-details">
				<!-- display the date on every post, using the format specified in Settings/General -->
				<?php the_time( get_option( 'date_format' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'idealist' ), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>'  ); ?>
			</div><!-- post-details -->
		
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) { // check for feature image ?> 
	<div class="post-image">
		<?php the_post_thumbnail(); ?>
	</div><!-- post-image -->
	<?php } ?>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post */				
				__( 'more<span class="screen-reader-text"> "%s"</span>', 'idealist' ),
			get_the_title()
			) );
		?>
	</div>
	
	<!--  display tags and categories -->
	<div class="post-footer">
		<?php idealist_post_footer(); ?>
	</div><!-- post-footer -->

</article><!-- #post-## -->
