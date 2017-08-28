<?php
/**
 * Template part for displaying pagination
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Idealist
 */
?>

<div class="pagination-wrapper">
    <div class="row">
        <?php
        the_posts_pagination( array(
            'mid_size'  => 0,
            'prev_text' => __( 'Prev', 'idealist' ),
            'next_text' => __( 'Next', 'idealist' ),
        ) );
        ?>
    </div>
</div>
