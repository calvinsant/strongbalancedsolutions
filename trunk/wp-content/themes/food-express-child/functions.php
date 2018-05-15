<?php 
        //Making ACF message boxes closed upon page load in admin area
	function ACF_flexible_content_collapse() {
        ?>
        <style id="acf-flexible-content-collapse">.acf-flexible-content .acf-fields { display: none; }</style>
        <script type="text/javascript">
            jQuery(function(jQuery) {
                jQuery('.acf-flexible-content .layout').addClass('-collapsed');
                jQuery('#acf-flexible-content-collapse').detach();
            });
        </script>
        <?php
    }

    add_action('acf/input/admin_head', 'ACF_flexible_content_collapse');

    //Adding custom stylesheets
    function custom_style_sheets() {
		wp_enqueue_style( 'all', get_stylesheet_directory_uri() . '/css/all.css' );
	}
	add_action('wp_enqueue_scripts', 'custom_style_sheets');
?>