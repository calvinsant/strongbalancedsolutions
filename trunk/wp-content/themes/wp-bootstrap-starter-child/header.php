<?php
/**
 * The header for our child theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter-child' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="masthead" class="site-header navbar-static-top <?php echo wp_bootstrap_starter_bg_class(); ?>" role="banner">
        <div class="container">
            <nav class="navbar navbar-expand-xl p-0">
                <div class="navbar-brand">
                    <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo esc_attr(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; ?>

                </div>
                <!-- Social menu if not mobile -->
                <?php if(wp_is_mobile()){ ?> 
                  
                <?php } else{ ?>
                  <div class="social-menu"><?php wp_nav_menu( array( 'theme_location' => 'social_menu' ) ); ?></div>
              <?php
                } ?>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'div',
                'container_id'    => 'main-nav',
                'container_class' => 'collapse navbar-collapse justify-content-end',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>
                
                <?php 
                  if(wp_is_mobile()){ ?>
                    <div class="social-menu-mobile navbar-collapse justify-content-end collapse show"><?php wp_nav_menu(array('theme_location' => 'social_menu')); ?></div>
                    <?php
                  }
                ?>

            </nav>     
            </div>
	</header><!-- #masthead -->
  <?php 
    if(have_rows('slider')){
      $i = 0;
  ?>
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade hero" data-ride="carousel" data-interval="5000">
    <ol class="carousel-indicators">
      <?php while(have_rows('slider')){ 
        the_row();
        ?>
        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php if($i==0){echo "active";} ?>"></li>
    <?php 
    $i++;
      } 
    ?>
    </ol>

    <div class="carousel-inner">
  <?php 
  $i = 0;
    while(have_rows('slider')){
      the_row();
  ?>
      <div style="background-image:url('<?php the_sub_field('slider_image'); ?>');" class="carousel-item <?php if($i==0){echo 'active';} ?>">
        <div class="container">
          <div class="row">
            <div class="col-md-7 text-center text-md-left hero-content p-4">
              <h1><?php the_sub_field('slider_header'); ?></h1>
              <h2><?php the_sub_field('slider_sub_header'); ?></h2>
              <p><?php the_sub_field('slider_paragraph'); ?></p>
              <?php if(get_sub_field('slider_button_text')){ ?>
                  <br>
                  <a class="orange-button p-3" href="<?php the_sub_field('slider_button'); ?>"><?php the_sub_field('slider_button_text'); ?></a>
              <?php } ?>
            </div>
          </div>
        </div>  
      </div>
  <?php
      $i++;
      } ?>
      </div>
  <?php 
    }elseif(get_field('hero_image')){
  ?>

    <div id="page-sub-header" class="hero" style="background-image:url('<?php the_field('hero_image'); ?>');">
        <div class="container">
          <div class="row">
            <div class="col-md-7 text-center text-md-left hero-content p-4">
              <h1><?php the_field('hero_header'); ?></h1>
              <h2><?php the_field('hero_sub_header'); ?></h2>
              <p><?php the_field('hero_paragraph'); ?></p>
              <?php if(get_sub_field('hero_button_text')){ ?>
                  <br>
                  <a class="orange-button p-3" href="<?php the_field('hero_button'); ?>"><?php the_field('hero_button_text'); ?></a>
              <?php } ?>
            </div>
          </div>
        </div>  
      </div>

  <?php
    }
    ?>

      </div>
      <a data-slide="prev" role="button" href="#carousel-example-captions" class="left carousel-control">
        <span aria-hidden="true" class="icon-prev"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a data-slide="next" role="button" href="#carousel-example-captions" class="right carousel-control">
        <span aria-hidden="true" class="icon-next"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div id="content" class="site-content">
                <?php endif; ?>