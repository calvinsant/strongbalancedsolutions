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
    if(!$enable_vc ) {
    ?>
    <header class="entry-header">
		<?php the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); ?>
	</header><!-- .entry-header -->
    <?php } ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php 
		if(have_rows('featured')){
				the_row();
			?>
			<div class="row pt-5 pb-5 mt-5">
				<div class="col-md-6">
					<img src="<?php the_sub_field('featured_image'); ?>" alt="Strong and Balanced Featured Content">
				</div>
				<div class="col-md-6 text-md-left">
					<h2 class="pt-4 pt-md-0"><?php the_sub_field('featured_title') ?></h2>
					<p><?php the_sub_field('featured_paragraph',false, false); ?></p>
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
	if($video){ ?>
	<div class="video-container">
		<video autoplay loop muted id="video-bg">

			<source src="<?php echo $video['background_video']; ?>" type="video/mp4" />

		</video>
	<div class="video-content">
		<h1><?php echo $video['video_header']; ?></h1>
		<h2><?php echo $video['video_sub_header']; ?></h2>
		<?php 
			if($video['video_button_text']){ ?>
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
		if($banner){ ?>
			<div style="background-image:url('<?php echo $banner['background_image'] ?>');" class="row profile-banner p-5 text-left site-content">
				<div class="row">
					<div class="col-md-4">
						<h1><?php echo $banner['banner_header'] ?></h1>
						<h2><?php echo $banner['banner_sub_header'] ?></h2>
						<p><?php echo $banner['banner_paragraph'] ?></p>
						<p></p>
						<?php 
							if($banner['banner_button_text']){ ?>
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
	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-center text-md-left pt-4"><h3>STAY UP TO DATE ON SPECIALS AND UPCOMING EVENTS</h3></div>
				<div class="col-md-6">
					<!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="https://strongbalancedsolutions.us18.list-manage.com/subscribe/post?u=939de5206d3b0b3a4c316f8aa&amp;id=70c5efac88" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	
<div class="mc-field-group d-flex justify-between flex-wrap flex-md-nowrap">
	<input placeholder="Email" type="email" value="" name="EMAIL" class="required email col-12 col-md-8 mt-3" id="mce-EMAIL">
	<input type="submit" value="SUBSCRIBE" name="subscribe" id="mc-embedded-subscribe" class="col-md-3 orange-button p-2">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_939de5206d3b0b3a4c316f8aa_70c5efac88" tabindex="-1" value=""></div>
    
    </div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';fnames[6]='MMERGE6';ftypes[6]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
				</div>
			</div>
		</div>
	</div>

	<?php 
		$gallery = get_field('gallery');
		
		if($gallery){ ?>
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

	<?php if(have_rows('offerings')) { ?>
		<div id="content" class="site-content">
			<div class="container offerings text-center">
				<div class="row d-flex justify-content-between">
					<h1 class="w-100 entry-title mb-5"><span><?php the_field('offerings_title'); ?></span></h1>
			<?php while(have_rows('offerings')){ the_row(); ?>
				<div class="col-12 col-sm-6 col-md-3 text-center mt-4">
					<img src="<?php the_sub_field('offering_image'); ?>" alt="offering-<?php echo get_row_index(); ?>" class="rounded-circle">
					<h3 class="pt-4"><?php the_sub_field('offering_title'); ?></h3>
					<p class="pb-4"><?php the_sub_field('offering_paragraph'); ?></p>
					<a class="orange-button p-3 d-block mb-5" href="<?php the_sub_field('offering_link'); ?>">LEARN MORE</a>
				</div>
		<?php } ?>
				</div>
			</div>
	</div>
<?php } ?>

	<?php if ( get_edit_post_link() && !$enable_vc ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'wp-bootstrap-starter' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
