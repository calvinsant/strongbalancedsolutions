<?php
/**
 * Template part for displaying page content in page-contact.php
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
		<?php the_title( '<h1 class="entry-title fadein_load"><span>', '</span></h1>' ); ?>
	</header><!-- .entry-header -->
    <?php } ?>

				<div class="entry-content fadein_load">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		</div>
		<div class="row pt-5">
							<div class="col-md-8">
				<?php 
					if(get_field('contact_form')){
						$form = get_field('contact_form');
						echo do_shortcode($form);
					}
				?>
		</div>
		
		<?php 
			if(have_rows('contact_items')){ ?>
			<div class="col-md-4" id="contact-info">
	<?php while(have_rows('contact_items')){ 
					the_row(); ?>
						<div class="row mb-4">
							<div class="col-2">
								<i class="fas <?php the_sub_field('contact_icon'); ?>"></i>
							</div>
							<div class="col-10">
									<span><?php the_sub_field('contact_title'); ?></span>
									<div><a href="<?php the_sub_field('contact_link'); ?>"><?php the_sub_field('contact_info'); ?></a></div>
								</div>
							</div>
				<?php
				}
				?>
				</div>
		<?php
			}
		?>

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
