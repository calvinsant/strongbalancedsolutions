<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
$enable_vc = get_post_meta(get_the_ID(), '_wpb_vc_js_status', true);
if (!$enable_vc) {
  ?>
    <header class="entry-header">
		<?php the_title('<h1 class="entry-title fadein_load"><span>', '</span></h1>'); ?>
	</header><!-- .entry-header -->
    <?php 
  } ?>

	<div class="entry-content fadein_load">
	<?php 
	the_content();

  // $args_offerings = array(
  //   'post_type' => 'testimonial',
  //   'meta_key' => 'testimonial',
  //   'meta_key' => 'testimonial_image',
  //   'order_by' => 'rand',
  //   'posts_per_page' => '5'
  // );
  $args_offerings = array(
		'post_type' => 'offering',
		'order' => 'ASC'
  );
  $offerings = new WP_QUERY($args_offerings);

  if($offerings->have_posts()){
		$i = 0; ?>
		<div id="offerings-content" class="pt-4">
		<?php
    while($offerings->have_posts()){
			$offerings->the_post(); ?>
			<!-- Popup content.  Hidden on page load -->
			<section id="my_popup_<?php echo $i; ?>" class="offering-popup p-4">
				<?php echo do_shortcode('[contact-form-7 id=" 305 " title=" Offerings lead generation form "]'); ?>
			</section>
			<div class="row offering p-5 fadein">
				<div class="col-md-8 align-self-center"><h2><?php the_title();?></h2><p><?php the_content(); ?></p></div>
				<div class="col-md-2 align-self-center offering-info">
				<i>30 MIN/ $40</i>
				</div>
				<div class="col-md-2 align-self-center">
				<button class="my_popup_<?php echo $i; ?>_open orange-button p-2 mt-3 mt-md-0">LEARN MORE</button>
				</div>
			</div>

	<?php
		$i ++;
    } ?>
		</div>
		<?php
  }
  ?>
  
	<?php

  wp_link_pages(array(
    'before' => '<div class="page-links">' . esc_html__('Pages:', 'wp-bootstrap-starter'),
    'after' => '</div>',
  ));
  ?>
	</div><!-- .entry-content -->
	<?php 
if (have_rows('featured')) {
  the_row();
  ?>
			<div class="row pt-5 pb-5 mt-5">
				<div class="col-md-6">
					<img src="<?php the_sub_field('featured_image'); ?>" alt="Strong and Balanced Featured Content">
				</div>
				<div class="col-md-6 text-md-left">
					<h2 class="pt-4 pt-md-0"><?php the_sub_field('featured_title') ?></h2>
					<p><?php the_sub_field('featured_paragraph', false, false); ?></p>
					<br>
					<a href="<?php the_sub_field('featured_button_link') ?>" class="orange-button p-3 mt-3"><?php the_sub_field('featured_button_text'); ?></a>
				</div>
			</div>
	<?php	
}
?>
		</div>
	</div>

	</div>

	<?php
$banner = get_field('banner');
if ($banner) { ?>
			<div style="background-image:url('<?php echo $banner['background_image'] ?>');" class="row profile-banner p-5 text-left site-content">
				<div class="row">
					<div class="col-md-4">
						<h1><?php echo $banner['banner_header'] ?></h1>
						<h2><?php echo $banner['banner_sub_header'] ?></h2>
						<p><?php echo $banner['banner_paragraph'] ?></p>
						<p></p>
						<?php 
      if ($banner['banner_button_text']) { ?>
							<br>
						<a href="<?php echo $banner['banner_button_link'] ?>" class="orange-button p-3"><?php echo $banner['banner_button_text'] ?></a>
						<?php
    }
    ?>
					</div>
				</div>
		</div>
<?php

}
?>


	<?php 
$gallery = get_field('gallery');

if ($gallery) { ?>
			<div id="content" class="row text-center site-content pt-0 pb-0">
				<h1 class="w-100 entry-title mb-5 p-5"><span><?php the_field('gallery_title'); ?></span></h1>
				<?php 
    foreach ($gallery as $image) { ?>
						<div class="col-12 col-md-4 nopadding">
							<img src="<?php echo $image['url']; ?>" alt="">
						</div>
			<?php

}
?>
			</div>
<?php

}
?>

	<?php if (have_rows('offerings')) { ?>
		<div id="content" class="site-content">
			<div class="container offerings text-center">
				<div class="row d-flex justify-content-between">
					<h1 class="w-100 entry-title mb-5"><span><?php the_field('offerings_title'); ?></span></h1>
			<?php while (have_rows('offerings')) {
    the_row(); ?>
				<div class="col-12 col-sm-6 col-md-3 text-center mt-4">
					<img src="<?php the_sub_field('offering_image'); ?>" alt="offering-<?php echo get_row_index(); ?>" class="rounded-circle">
					<h3 class="pt-4"><?php the_sub_field('offering_title'); ?></h3>
					<p class="pb-4"><?php the_sub_field('offering_paragraph'); ?></p>
					<a class="orange-button p-3 d-block mb-5" href="<?php the_sub_field('offering_link'); ?>">LEARN MORE</a>
				</div>
		<?php 
} ?>
				</div>
			</div>
	</div>
<?php 
} ?>

	<?php if (get_edit_post_link() && !$enable_vc) : ?>
		<footer class="entry-footer">
			<?php
  edit_post_link(
    sprintf(
						/* translators: %s: Name of current post */
      esc_html__('Edit %s', 'wp-bootstrap-starter'),
      the_title('<span class="screen-reader-text">"', '"</span>', false)
    ),
    '<span class="edit-link">',
    '</span>'
  );
  ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
