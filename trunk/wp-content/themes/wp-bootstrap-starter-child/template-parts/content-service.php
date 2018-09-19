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
    <header class="entry-header pt-5 pb-4 mt-5 fadein_load">
		<?php the_title('<h1 class="entry-title"><span>', '</span></h1>'); ?>
		<h2 class="pt-3">SECONDARY HEADER HERE</h2>
	</header><!-- .entry-header -->
    <?php 
  } ?>

	<div class="entry-content fadein_load pt-4">
		<div class="row d-flex justify-content-between">
			<div class="col-md-7 pr-2 text-left">
				<h3 class="pt-2 text-center text-md-left">TERTIARY HEADER GOES HERE</h3>
					<?php
						the_content();

						wp_link_pages(array(
							'before' => '<div class="page-links">' . esc_html__('Pages:', 'wp-bootstrap-starter'),
							'after' => '</div>',
						));
					?>
			</div>
			<div class="col-md-4 border-left p-3">
				<?php echo do_shortcode('[contact-form-7 id=" 305 " title=" Offerings lead generation form "]'); ?>
			</div>
		</div>
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
$video = get_field('video');
if ($video) { ?>
	<div class="video-container">
		<video autoplay loop muted id="video-bg">

			<source src="<?php echo $video['background_video']; ?>" type="video/mp4" />

		</video>
	<div class="video-content fadein">
		<h1><?php echo $video['video_header']; ?></h1>
		<h2><?php echo $video['video_sub_header']; ?></h2>
		<?php 
  if ($video['video_button_text']) { ?>
			<br>
		<a href="<?php echo $video['video_button_link']; ?>" class="orange-button p-3"><?php echo $video['video_button_text']; ?></a>
<?php

}
?>
	</div>
</div>
<?php
}
?>
	<?php
$banner = get_field('banner');
if ($banner) { ?>
			<div style="background-image:url('<?php echo $banner['background_image'] ?>');" class="row profile-banner p-5 text-left site-content">
				<div class="row">
					<div class="col-md-4 p-4 hero-content fadein">
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
