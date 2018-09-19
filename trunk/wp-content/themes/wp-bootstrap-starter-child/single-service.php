<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<div class="container">
  <div class="row">
    <section id="primary" class="">
      <main id="main" class="site-main" role="main">

        <?php
        while (have_posts()) : the_post();

      // get_template_part('template-parts/content', get_post_format());
        get_template_part('template-parts/content', 'service');

        ?>
        <div class="container pagination-<?php echo !get_previous_post() ? "first" : "rest"; ?>">
          <?php the_post_navigation(); ?>
        </div>
        <?php 

        endwhile; // End of the loop.
        ?>

      </main><!-- #main -->
	  </section><!-- #primary -->
  </div>
</div>

<?php
get_footer();
