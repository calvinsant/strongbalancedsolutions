<?php 
  function wp_bootstrap_starter_child_setup(){
    //Prepare theme for translation
    load_child_theme_textdomain('wp-bootstrap-starter-child', get_stylesheet_directory() . '/languages');
  }
add_action('after_setup_theme', 'wp_bootstrap_starter_child_setup');

function add_google_fonts(){
  wp_enqueue_style('wp_google_fonts', 'https://fonts.googleapis.com/css?family=Julius+Sans+One|Monda');
}

add_action('wp_enqueue_scripts', 'add_google_fonts');

function add_custom_js(){ ?>
              <!-- Floating scroll to top -->
              <script type="text/javascript">
                jQuery(document).ready(function(){
                    jQuery(window).scroll(function () {
                        if (jQuery(this).scrollTop() > 50) {
                        jQuery('#back-to-top').fadeIn();
                        } else {
                            jQuery('#back-to-top').fadeOut();
                            }
                            });
                    // scroll body to 0px on click
                    jQuery('#back-to-top').click(function () {
                        jQuery('body,html').animate({
                        scrollTop: 0
                        }, 800);
                        return false;
                        });
                });
            </script>
            <!-- Fade in script -->
             <script type="text/javascript">
           jQuery(document).ready(function(){  // jQuery(document).ready shorthand
                  jQuery('.fadein_load').animate({'opacity':'1'},1230);

                  function isVisible($el) {
                              var winTop = jQuery(window).scrollTop();
                              var winBottom = winTop + jQuery(window).height();
                              var elTop = $el.offset().top;
                              var elBottom = elTop + $el.height();
                              return ((elBottom<= winBottom) && (elTop >= winTop));
                                    }

                    /* Every time the window is scrolled ... */
                    jQuery(window).scroll( function(){


                        /* Check the location of each desired element */
                        jQuery('.fadein').each( function(i){

                            if(isVisible(jQuery(this))){
                                 jQuery(this).animate({'opacity':'1'},1230);
                            }
                        }); 
                    });
                });
        </script>
        <!-- SHRINK HEADER ON SCROLL -->
        <script type="text/javascript">
            jQuery(document).on('scroll',function(){
                if(jQuery(document).scrollTop() > 100){
                    jQuery('header').addClass('shrink');
                }else{
                    jQuery('header').removeClass('shrink');
                }
            });
        </script>
<?php }
//Add custom js to footer
add_action('wp_footer', 'add_custom_js');

// Custom Menu Locations
function register_custom_menus() {
  register_nav_menu('social_menu',__( 'Social Menu' ));
  // Multiple menus
  // register_nav_menus(
  //   array(
  //     'new-menu' => __( 'New Menu' ),
  //     'another-menu' => __( 'Another Menu' ),
  //     'an-extra-menu' => __( 'An Extra Menu' )
  //   )
  // );
}
add_action( 'init', 'register_custom_menus' );

// ACF OPTIONS PAGES
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}