<?php
/**
 * Template part for displaying pagination
 *
 * @link https://codex.wordpress.org/Function_Reference/the_posts_pagination
 *
 * @package Idealist
 */
?>

<div class="pagination-wrapper">
    <div class="row">
        <?php
        the_posts_pagination( array(
            'mid_size'  => 1,
            'prev_text' => __( 'Prev', 'idealist' ),
            'next_text' => __( 'Next', 'idealist' ),
        ) );
        ?>
    </div>
</div>
