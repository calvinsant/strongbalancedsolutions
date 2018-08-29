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
            <header class="entry-header text-center pb-3">
              <h1 class="entry-title"><span><?php single_cat_title(); ?></span></h1>
              <p><?php echo category_description(); ?></p>
					  </header> <!-- .entry-header -->
          </div>
				    <?php 
      } ?>
<div class="container mb-5">
  <div class="row">
   <!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; width:100%;}
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="https://strongbalancedsolutions.us18.list-manage.com/subscribe/post?u=939de5206d3b0b3a4c316f8aa&amp;id=70c5efac88" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_939de5206d3b0b3a4c316f8aa_70c5efac88" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>

<!--End mc_embed_signup-->
  </div>
</div>
<div class="container">
  <div class="row">
						<div class="col col-md-6 p-3">
							<span class="image fit">
								<iframe width="560" height="315" src="https://www.youtube.com/embed/6ltP3de-pyc?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
							</span>
							<h2 class="p-3"><strong>10-minute workout with modifications</strong></h2>
							<p>This is a basic strength/cardio workout. The video demonstrates helpful modifications and pointers for your practice.</p>
							<ul class="actions">
							</ul>
						</div>
						<div class="col col-md-6 p-3">
							<span class="image fit">
								<iframe width="560" height="315" src="https://www.youtube.com/embed/ihbqailpbx0?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
							</span>
							<h2 class="p-3"><strong>10-minute strength/cardio workout</strong></h2>
							<p>This is a basic quick strength and cardio video<br><br><br></p>
							<ul class="actions">
							</ul>
						</div>
						<div class="col col-md-6 p-3">
							<span class="image fit">
								<iframe width="100%" height="315" src="https://www.youtube.com/embed/wOMB3lYe76o?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
							</span>
							<h2 class="p-3"><strong>Intoduction to core stabilization</strong></h2>
							<p>This video is a very brief introduction to core stabilization. We look at how to activate the transversus abdominis (TrA). Then we look at how to move the legs while keeping the pelvic floor still (activating but not over contracting) the dynamic middle layers of core.  If this work creates any discomfort in your low back, I would love to clarify this information and customize the exercises to fit your unique core needs. Let’s set up a session!</p>
							<ul class="actions">
							</ul>
						</div>
						<div class="col col-md-6 p-3">
							<span class="image fit">
								<iframe width="560" height="315" src="https://www.youtube.com/embed/rqsM_0aDVRg?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
							</span>
							<h2 class="p-3">Hip/ core Stability isolation exercises</h2>
							<p>This video provides some of my favorite isolation exercises. You need a loop band and a timer. By holding each posture for 1 minute we can find all of our subtle unbalances, become aware of them and hopefully change some movement patients that happen while participating in daily living activities.</p>
							<ul class="actions">
							</ul>
						</div>
					</div>
    </article><!-- #post-## -->		
  </main><!-- #content -->
</section><!-- #primary -->

<div class="container">
<div class="row">
	<?php
get_footer();
?>