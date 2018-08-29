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

// Custom post type "Services"
function custom_post_services()
{
    $labels = array(
        'name' => _x('Services', 'post type general name'),
        'singular_name' => _x('Service', 'post type singular name'),
        'add_new' => _x('Add New', 'service'),
        'add_new_item' => __('Add New Service'),
        'edit_item' => __('Edit Service'),
        'new_item' => __('New Service'),
        'all_items' => __('All Services'),
        'view_item' => __('View Service'),
        'search_items' => __('Search Services'),
        'not_found' => __('No services found'),
        'not_found_in_trash' => __('No services found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Services'
    );
              // $args = array();
    $args = array(
        'labels' => $labels,
        'description' => 'Holds our services and services specific data',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'services', 'with_front' => false),
        'has_archive' => false,
    );
    register_post_type('service', $args);
}
add_action('init', 'custom_post_services');

// Custom post type "Testimonials"
function custom_post_testimonials()
{
    $labels = array(
        'name' => _x('Testimonials', 'post type general name'),
        'singular_name' => _x('testimonial', 'post type singular name'),
        'add_new' => _x('Add New', 'testimonial'),
        'add_new_item' => __('Add New testimonial'),
        'edit_item' => __('Edit testimonial'),
        'new_item' => __('New testimonial'),
        'all_items' => __('All Testimonials'),
        'view_item' => __('View testimonial'),
        'search_items' => __('Search testimonials'),
        'not_found' => __('No testimonials found'),
        'not_found_in_trash' => __('No testimonials found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Testimonials'
    );
              // $args = array();
    $args = array(
        'labels' => $labels,
        'description' => 'Holds our testimonials and testimonials specific data',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'testimonials', 'with_front' => false),
        'has_archive' => false,
    );
    register_post_type('testimonial', $args);
}
add_action('init', 'custom_post_testimonials');

//Custom post type "gifts"
function custom_post_gifts()
{
    $labels = array(
        'name' => _x('Gifts', 'post type general name'),
        'singular_name' => _x('Gift', 'post type singular name'),
        'add_new' => _x('Add New', 'Gift'),
        'add_new_item' => __('Add New Gift'),
        'edit_item' => __('Edit Gift'),
        'new_item' => __('New Gift'),
        'all_items' => __('All Gift'),
        'view_item' => __('View Gift'),
        'search_items' => __('Search gifts'),
        'not_found' => __('No gifts found'),
        'not_found_in_trash' => __('No gifts found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Gifts'
    );
              // $args = array();
    $args = array(
        'labels' => $labels,
        'description' => 'Holds our gifts specific data',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'free-gift', 'with_front' => false),
        'has_archive' => false,
    );
    register_post_type('gift', $args);
}
add_action('init', 'custom_post_gifts');

//Custom post type "Offerings"
function custom_post_offerings()
{
    $labels = array(
        'name' => _x('Offerings', 'post type general name'),
        'singular_name' => _x('Offering', 'post type singular name'),
        'add_new' => _x('Add New', 'Offering'),
        'add_new_item' => __('Add New Gift'),
        'edit_item' => __('Edit Offering'),
        'new_item' => __('New Offering'),
        'all_items' => __('All Offering'),
        'view_item' => __('View Offering'),
        'search_items' => __('Search offerings'),
        'not_found' => __('No offerings found'),
        'not_found_in_trash' => __('No offerings found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Offerings'
    );
              // $args = array();
    $args = array(
        'labels' => $labels,
        'description' => 'Holds our offerings specific data',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'offerings', 'with_front' => false),
        'has_archive' => false,
    );
    register_post_type('offering', $args);
}
add_action('init', 'custom_post_offerings');