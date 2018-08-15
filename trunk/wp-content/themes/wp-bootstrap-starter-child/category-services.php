<?php

/**
 * The template for displaying for all Categories
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */
get_header(); ?>

	<section id="primary" class="content-area col">
		<main id="main" class="site-main" role="main">
				<article class="fadein_load" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php
    $enable_vc = get_post_meta(get_the_ID(), '_wpb_vc_js_status', true);
    if (!$enable_vc) {
      ?>
				  <div class="container">
            <header class="entry-header text-center p-5">
              <h1 class="entry-title"><span><?php single_cat_title(); ?></span></h1>
              <p><?php echo category_description(); ?></p>
					  </header> <!-- .entry-header -->
          </div>
				    <?php 
      } ?>

						<?php 
      $args_services = array(
        'post_type' => 'service'
      );
      $args_testimonials = array(
        'post_type' => 'testimonial'
      );
      ?>

          <?php 
    $testimonials = new WP_QUERY($args_testimonials);
    $services = new WP_Query($args_services);
    ?>
<div class="container-fluid">
  <div class="row">
    <?php if ($services->have_posts()) : while ($services->have_posts()) : $services->the_post(); ?>
          <a class="col-sm-2 text-center product-item service" href="<?php echo get_permalink($post->ID); ?>">
            	<section>
                <h2 class="service-title"><?php the_title() ?></h2>
                <p class="service-exerpt">
                  <?php the_excerpt(); ?>
                </p>
              </section>
          </a>
          <?php
      endwhile;
    endif;
    ?>
    <div>
  <div>
        <?php if ($testimonials->have_posts()) : while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
        <!-- LOOP IS WORKING HERE FOR TESTIMONIALS -->
    <?php endwhile; ?>
    <?php endif; ?>
				</article><!-- #post-## -->		
				
			</main><!-- #content -->
		</section><!-- #primary -->
  </div>
<div class="container">
<div class="row">
	<?php
get_footer();
?>