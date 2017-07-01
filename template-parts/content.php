<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Idealist
 */
?>

<!-- ?php $badgedefault = get_theme_mod( 'show_comments_badge_id' );
echo "badge is set to: [";
echo $badgedefault;
echo "]" . "<br>";

if ( get_theme_mod( 'show_comments_badge_id' ) !== FALSE ) {
	echo "value is not FALSE" . "<br>";
}

if ( get_theme_mod( 'show_comments_badge_id' ) !== TRUE ) {
	echo "value is not TRUE" . "<br>";
}

if ( get_theme_mod( 'show_comments_badge_id' ) === FALSE ) {
	echo "value is FALSE" . "<br>";
}

echo "var_dump of badgedefault: ";
var_dump( $badgedefault );
echo "<br>";
echo "<br>";

? -->

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
	
		<div class="post-details">
			<?php edit_post_link( 'Edit', '<i class="fa fa-pencil"></i> ', ''  ); ?>
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
	
</article><!-- #post-## -->
