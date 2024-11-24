<?php

/**
 * Commet 2016 functions and definitions.
 *
 * Anyone can use the theme but he/she will have to maintain the rules of GPL 2 licence.
 *
 * Here you will get all the functions of Comet 2019.
 */

// All Require Files

if (file_exists(dirname(__FILE__).'/gallery.php')) {
  require_once(dirname(__FILE__).'/gallery.php');
}
if (file_exists(dirname(__FILE__).'/recent-post.php')) {
  require_once(dirname(__FILE__).'/recent-post.php');
}
if (file_exists(dirname(__FILE__).'/lib/theme-option/codestar-framework.php')) {
  require_once(dirname(__FILE__).'/lib/theme-option/codestar-framework.php');
}
if (file_exists(dirname(__FILE__).'/lib/theme-option/samples/config.php')) {
  require_once(dirname(__FILE__).'/lib/theme-option/samples/config.php');
}
if (file_exists(dirname(__FILE__).'/lib/metabox/init.php')) {
  require_once(dirname(__FILE__).'/lib/metabox/init.php');
}
if (file_exists(dirname(__FILE__).'/lib/metabox/metaconfig.php')) {
  require_once(dirname(__FILE__).'/lib/metabox/metaconfig.php');
}
if (file_exists(dirname(__FILE__).'/navwalk/custom-nav-walker.php')) {
  require_once(dirname(__FILE__).'/navwalk/custom-nav-walker.php');
}
if (file_exists(dirname(__FILE__).'/shortcode/shortcodes.php')) {
  require_once(dirname(__FILE__).'/shortcode/shortcodes.php');
}
if (file_exists(dirname(__FILE__).'/lib/plugins/requried-plugins.php')) {
  require_once(dirname(__FILE__).'/lib/plugins/requried-plugins.php');
}


// theme setup functions

add_action('after_setup_theme', 'comet_functions');

function comet_functions(){

  // Text Domain

  load_theme_textdomain('comet', get_template_directory().'/languages');

  // Theme Supports

  add_theme_support('title-tag');

  add_theme_support( 'automatic-feed-links' );

  add_theme_support('post-thumbnails');

  add_theme_support('post-formats', array(
    'asid',
    'gallery',
    'audio',
    'video',
    'quote'
  ));

// Portfolio custom post registration.

register_post_type('comet-portfolio', array(
		'labels' => array(
			'name' => __('Portfolio', 'comet'),
			'add_new' => __('Add New Portfolio', 'comet'),
			'add_new_item' => __('Add New Portfolio', 'comet'),
		),
		'public' => true,
    'supports' => array('title', 'editor', 'thumbnail','revition')
	));

  register_taxonomy( 'portfolio-category','comet-portfolio', array(
    'labels' => array(
      'name'         => __('Category', 'comet'),
			'add_new'      => __('Add New Category', 'comet'),
			'add_new_item' => __('Add New Category', 'comet'),
    ),
    'public' => true,
    'hierarchical' => true
  ) );

// Registration Navication

register_nav_menu('main-menu', __('Main Menu', 'comet'));

// Registration slider

register_post_type( 'comet-slider', array(
  'labels' => array(
    'name'          => __('Slider','comet'),
    'add_new'       => __('Add New Slider', 'comet'),
    'add_new_item'  => __('Add New Slider', 'comet'),
  ),
  'public' => true,
  'supports' => array('title', 'editor', 'thumbnail','revition')
));




}

// Add fonts

function get_comet_fonts(){

	$fonts = array();

	$fonts[] = 'Montserrat:400,700';

	$fonts[] = 'Raleway:300,400,500';

	$fonts[] = 'Halant:300,400';


	$comet_fonts = add_query_arg(array(
		'family' => urlencode(implode('|', $fonts)),
		'subset' => urlencode('latin')
	), 'https://fonts.googleapis.com/css');


	return $comet_fonts;

}



// Including styles

add_action('wp_enqueue_scripts', 'comet_styles');

function comet_styles(){

  wp_enqueue_style('bundle', get_template_directory_uri().'/css/bundle.css');

  wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome.css');

  wp_enqueue_style('style', get_template_directory_uri().'/css/style.css');

  wp_enqueue_style('fonts', get_comet_fonts());

  wp_enqueue_style('stylesheet', get_stylesheet_uri());

}

// Conditional Scripts

add_action('wp_enqueue_scripts', 'conditional_scripts');

function conditional_scripts(){

  wp_enqueue_script('html5shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array(), '', false);
  wp_script_add_data('html5shim', 'conditional', 'lt IE 9');

  wp_enqueue_script('respond', 'https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js', array(), '', false);
  wp_script_add_data('respond', 'conditional', 'lt IE 9');

}


// Incuding all Scripts

add_action('wp_enqueue_scripts', 'comet_scripts');

function comet_scripts(){

  wp_enqueue_script('bundle', get_template_directory_uri().'/js/bundle.js', array('jquery'), '', true);

  wp_enqueue_script('google-map', 'https://maps.googleapis.com/maps/api/js?v=3.exp', array('jquery'), '', true);

  wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array('jquery'), '', true);

}

add_action( 'widgets_init', 'comet_sidbars');

function comet_sidbars(){

  register_sidebar(array(
		'name' 			=> __('Right Sidebar', 'comet'),
		'description' 	=> __('You may add your Right Sidebar Widgets Here', 'comet'),
		'id' 			=> 'right-sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h6 class="upper">',
		'after_title' 	=> '</h6>'
	));
  register_sidebar(array(
		'name' 			    => __('Footer First Area', 'comet'),
		'description' 	=> __('You may add your Footer First Widgets Here', 'comet'),
		'id' 			      => 'footer-first',
		'before_widget' => '<div class="col-sm-4"><div class="widget">',
		'after_widget' 	=> '</div></div>',
		'before_title' 	=> '<h6 class="upper">',
		'after_title' 	=> '</h6>'
	));
  register_sidebar(array(
		'name' 			    => __('Footer last Area', 'comet'),
		'description' 	=> __('You may add your Footer last Widgets Here', 'comet'),
		'id' 		       	=> 'footer-last',
		'before_widget' => '<div class="widget">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h6 class="upper">',
		'after_title' 	=> '</h6>'
	));

}



add_action('admin_print_scripts', 'add_metabox_script', 1000);

function add_metabox_script(){ ?>

  <?php if( get_post_type() == 'post') : ?>

    <script>

  		jQuery(document).ready(function(){


  			var id = jQuery( 'input[name="post_format"]:checked' ).attr('id');

  			if(id == 'post-format-video'){
  				jQuery('.cmb2-id--for-video').show();
  			}else{
  				jQuery('.cmb2-id--for-video').hide();
  			}

  			if(id == 'post-format-audio'){
  				jQuery('.cmb2-id--for-audio').show();
  			}else{
  				jQuery('.cmb2-id--for-audio').hide();
  			}





  			if(id == 'post-format-gallery'){
  				jQuery('.cmb2-id--for-gallery').show();
  			}else{
  				jQuery('.cmb2-id--for-gallery').hide();
  			}


  			jQuery( 'input[name="post_format"]' ).change(function(){
  				jQuery('.cmb2-id--for-gallery').hide();
  				jQuery('.cmb2-id--for-audio').hide();
  				jQuery('.cmb2-id--for-video').hide();

  				var id = jQuery( 'input[name="post_format"]:checked' ).attr('id');

  				if(id == 'post-format-video'){
  					jQuery('.cmb2-id--for-video').show();
  				}else{
  					jQuery('.cmb2-id--for-video').hide();
  				}

  				if(id == 'post-format-audio'){
  					jQuery('.cmb2-id--for-audio').show();
  				}else{
  					jQuery('.cmb2-id--for-audio').hide();
  				}

  				if(id == 'post-format-gallery'){
  					jQuery('.cmb2-id--for-gallery').show();
  				}else{
  					jQuery('.cmb2-id--for-gallery').hide();
  				}


  			});



  		})


  	</script>


  <?php endif; ?>



<?php }


register_activation_hook(__FILE__, 'flush_rewrite');

function flush_rewrite(){
  flush_rewrite();
}

add_action( 'vc_before_init', 'setup_theme_vc' );
function setup_theme_vc() {
  vc_set_as_theme();
}

if (function_exists('vc_map')) :

vc_map(array(
  'name'                      => 'Comet Slider',
  'base'                      => 'comet-slider',
  'show_settings_on_create'   => false
));

vc_map(array(
  'name'                      => 'About Section',
  'base'                      => 'about-section',
  "icon"                      => "vc_masonry_grid",
  'params'                    => array(
    array(
      "type"        => 'textfield',
      "heading"     => 'Title',
      'param_name'  => 'title',
      "value"       => 'Who We Are',
    ),
    array(
      "type"        => 'textfield',
      "heading"     => 'Subtitle',
      'param_name'  => 'subtitle',
      "value"       => 'We are driven by creative.',
    ),
    array(
      "type"        => 'textarea',
      "heading"     => 'Content',
      'param_name'  => 'content'
    ),
  )
));



endif;
