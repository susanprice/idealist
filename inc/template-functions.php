<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package Idealist
 * @since 1.0
 */

/**
 * Checks to see if we're on the homepage or not.
 */
function idealist_is_frontpage() {
    return ( is_front_page() && ! is_home() );
}

function idealist_post_footer() {
    if ( has_category( ) ) { ?>   
        <i class="fa fa-folder"></i> <?php the_category(', ') ?>
    <?php } 

    if ( has_tag( ) ) { ?>
        <i class="fa fa-tags"></i> <?php the_tags(' ') ?>
    <?php }
}

/**
 * Display comments badge if at least 1 comment 
 * and the comments badge is not disabled in the customizer
 */
function idealist_display_comments_badge() {
    $num_comments = get_comments_number(); 

    if ( esc_attr (get_theme_mod( 'show_comments_badge_id' ) !== 0 ) 
        && ( $num_comments > 0) ) { ?>
        <div class="post-comments-badge">
            <a href="<?php comments_link(); ?>"><i class="fa fa-comments"></i> <?php comments_number( 0, 1, '%'); ?></a>
        </div>
   <?php }  
}