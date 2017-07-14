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