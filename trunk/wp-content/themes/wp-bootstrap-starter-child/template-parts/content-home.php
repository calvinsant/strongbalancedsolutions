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
	<?php if(have_rows('banner')){ 
			the_row();
		?>
	<div style="background-image:url(<?php the_sub_field('banner_image'); ?>);" class="row home-banner p-5 text-left mt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
				<h2><?php the_sub_field('banner_title') ?></h2>
				<p><?php the_sub_field('banner_paragraph'); ?></p>
				<br>
				<a href="<?php the_sub_field('banner_button_link'); ?>" class="orange-button p-3"><?php the_sub_field('banner_button_text'); ?></a>
			</div>
		</div>
	</div>
</div>
<?php		
	} ?>
	</div>
	<div class="newsletter	">
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
	<div class="container">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
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
