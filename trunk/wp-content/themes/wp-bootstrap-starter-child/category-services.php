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
        'post_type' => 'service',
        'order' => 'ASC'
      );
      $args_testimonials = array(
        'post_type' => 'testimonial',
        'meta_key' => 'testimonial',
        'meta_key' => 'testimonial_image',
        'order_by' => 'rand',
        'posts_per_page' => '5'
      );  
      ?>

          <?php 
    $testimonials = new WP_QUERY($args_testimonials);
    $services = new WP_Query($args_services);
    ?>
<div class="container">
  <div class="row">
    <?php if ($services->have_posts()) : while ($services->have_posts()) : $services->the_post(); ?>
          <a class="col-md-6 col-lg-6 col-xl-6 p-5 text-center product-item service fadein" href="<?php echo get_permalink($post->ID); ?>">
            	<section>
                <h2 class="align-middle service-title"><?php the_title() ?></h2>
                <p class="service-exerpt">
                  <?php echo wp_trim_words(get_the_excerpt(), 15, "..."); ?>
                </p>
              </section>
          </a>
          <?php
      endwhile;
    endif;
    ?>
    </div>
  </div>
</article><!-- #post-## -->		
			</main><!-- #content -->
    </section><!-- #primary -->
<?php 
  if($testimonials->have_posts()){ 
    $i = 0;
    ?>
       <div class="row p-5 d-flex justify-content-between testimonials mt-5">
      <div class="card col mt-2" id="testimonials">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="100000">
          <div class="w-100 carousel-inner" role="listbox">
          <?php 
            while($testimonials->have_posts()){
              $testimonials->the_post();
              ?>
            <div class="carousel-item <?php echo $i == 0 ? 'active' : ''; ?>">
              <div class="bg"></div>
              <div class="carousel-caption">
                <blockquote>
                    <?php
                      the_field('testimonial');
                    ?>
                </blockquote>
                <div class="row">
                  <div class="col-5 text-right">
                    <img class="rounded-circle" src="<?php the_field('testimonial_image') ?>" alt="">
                  </div>
                  <div class="col-7 text-left">
                  <cite>
                  ~ <?php the_title() ?>
                </cite>
              </div>
            </div>
          </div>
        </div>
              <?php
          $i++;
            }
          ?>
            <!-- <div class="carousel-item active">
              <div class="bg"></div>
              <div class="carousel-caption">
                <blockquote>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.
                </blockquote>
                <div class="row">
                  <div class="col-5 text-right">
                    <img class="rounded-circle" src="/bio.jpg" alt="">
                  </div>
                  <div class="col-7 text-left">
                     <cite>
                      ~ CALVIN SANT
                    </cite>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
            <div class="bg"></div>
            <div class="carousel-caption">
               <blockquote>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.
                </blockquote>
                <div class="row">
                  <div class="col-5 text-right">
                    <img class="rounded-circle" src="/bio.jpg" alt="">
                  </div>
                  <div class="col-7 text-left">
                     <cite>
                      ~ CALVIN SANT
                    </cite>
                  </div>
            </div>
          </div>
        </div> -->
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
    <?php
  }
?>
<div class="container">
<div class="row">
	<?php
get_footer();
?>