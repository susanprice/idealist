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