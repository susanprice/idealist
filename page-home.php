<?php
/**
    Template Name: Home Page
 */


get_header(); ?>

     <!-- MAIN CONTENT
        ================================================== -->
        <div class="container">
            <div class="row">
                <!--  This displays site title & tab text (SEO) -->
                <h1><?php bloginfo('name'); ?></h1>
                <!--  This displays tagline -->
                <h2><?php bloginfo('description'); ?></h2>

                <div class="col-md-6">
                    <article class="post">
                        <header>
                            <h2 class="story-title">Displaced Reality</h2>
                        </header>
                        <div class="post-image">
                            <img src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/img/displacement.jpg" class="img-responsive" alt="displacement" />
                        </div>
                        <div>
                            <p>Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. Curabitur blandit tempus porttitor. Aenean lacinia bibendum nulla sed consectetur. </p>
                            <p>Read More ...</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6">
                    <article class="post">
                        <header>
                            <h2 class="story-title">Let There Be Light</h2>
                        </header>
                        <div class="post-image">
                            <img src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/img/hanging-lights.jpg" class="img-responsive" alt="lights" />
                        </div>
                        <div>
                            <p>Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. Curabitur blandit tempus porttitor. Aenean lacinia bibendum nulla sed consectetur.</p>
                            <p>Read More ...</p>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <article class="post">
                        <header>
                            <h2 class="story-title">Two Sides To Every Story</h2>
                        </header>
                        <div class="post-image">
                            <img src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/img/water-drops.jpg" class="img-responsive" alt="water drops" />
                        </div>
                        <div>
                            <p>Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. Curabitur blandit tempus porttitor. Aenean lacinia bibendum nulla sed consectetur. </p>
                            <p>Read More ...</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6">
                    <article class="post">
                        <header>
                            <h2 class="story-title">Bridges and Pathes, Not Walls</h2>
                        </header>
                        <div class="post-image">
                            <img src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/img/stairs.jpg" class="img-responsive" alt="stairs" />
                        </div>
                        <div>
                            <p>Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. Curabitur blandit tempus porttitor. Aenean lacinia bibendum nulla sed consectetur.</p>
                            <p>Read More ...</p>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <article class="post">
                        <header>
                            <h2 class="story-title">New Museum Berlin</h2>
                        </header>
                        <div class="post-image">
                            <img src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/img/new-museum-berlin.jpg" class="img-responsive" alt="new museum berlin" />
                        </div>
                        <div>
                            <p>Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. Curabitur blandit tempus porttitor. Aenean lacinia bibendum nulla sed consectetur.</p>
                            <p>Read More ...</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6">
                    <article class="post">
                        <header>
                            <h2 class="story-title">A Number Vortex</h2>
                        </header>
                        <div class="post-image">
                            <img src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/img/letter-vortex.jpg" class="img-responsive" alt="letter vortex" />
                        </div>
                        <div>
                            <p>Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. Curabitur blandit tempus porttitor. Aenean lacinia bibendum nulla sed consectetur.</p>
                            <p>Read More ...</p>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <article class="post">
                        <header>
                            <h2 class="story-title">Deja Vu</h2>
                        </header>
                        <div class="post-image">
                            <img src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/img/displacement.jpg" class="img-responsive" alt="displacement" />
                        </div>
                        <div>
                            <p>Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. Curabitur blandit tempus porttitor. Aenean lacinia bibendum nulla sed consectetur.</p>
                            <p>Read More ...</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6">
                    <article class="post">
                        <header>
                            <h2 class="story-title">Lights, Camera, Naptime</h2>
                        </header>
                        <div class="post-image">
                            <img src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/img/hanging-lights.jpg" class="img-responsive" alt="lights" />
                        </div>
                        <div>
                            <p>Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. Curabitur blandit tempus porttitor. Aenean lacinia bibendum nulla sed consectetur.</p>
                            <p>Read More ...</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>

<?php get_footer(); ?>
