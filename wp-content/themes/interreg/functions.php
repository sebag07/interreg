<?php
function my_custom_theme_setup(): void {
	// Add support for featured images
	add_theme_support('post-thumbnails');

	// Add support for site title tag
	add_theme_support('title-tag');

	// Register navigation menus
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'my-custom-theme'),
	));
}
add_action('after_setup_theme', 'my_custom_theme_setup');

// Add stylesheets and scripts
function interreg_enqueue_styles(): void {
	// Get the theme directory URI
	$theme_uri = get_template_directory_uri();

	// Enqueue Swiper CSS first
	wp_enqueue_style('swiper', $theme_uri . '/assets/css/plugins/swiper-bundle.min.css', array(), null);

	// Enqueue all stylesheets
	wp_enqueue_style('icofont', $theme_uri . '/assets/css/vendor/icofont.min.css');
	wp_enqueue_style('animate', $theme_uri . '/assets/css/plugins/animate.css');
	wp_enqueue_style('nice-select', $theme_uri . '/assets/css/plugins/nice-select.css');	
	wp_enqueue_style('venobox', $theme_uri . '/assets/css/plugins/venobox.min.css');
	wp_enqueue_style('aos', $theme_uri . '/assets/css/plugins/aos.min.css');
	wp_enqueue_style('main-style', $theme_uri . '/assets/css/style.css');

	// Explicitly enqueue jQuery from WordPress
	wp_enqueue_script('jquery');

	// Enqueue vendor scripts
	wp_enqueue_script('jquery-migrate', $theme_uri . '/assets/js/vendor/jquery-migrate-3.3.0.min.js', array('jquery'), null, true);
	wp_enqueue_script('bootstrap', $theme_uri . '/assets/js/vendor/bootstrap.min.js', array('jquery'), null, true);
	wp_enqueue_script('jquery-ui', $theme_uri . '/assets/js/vendor/jquery-ui.min.js', array('jquery'), null, true);
	wp_enqueue_script('modernizr', $theme_uri . '/assets/js/vendor/modernizr-3.11.2.min.js', array(), null, true);

	// Enqueue plugin scripts
	wp_enqueue_script('swiper', $theme_uri . '/assets/js/plugins/swiper-bundle.min.js', array('jquery'), null, true);
	wp_enqueue_script('material-scrolltop', $theme_uri . '/assets/js/plugins/material-scrolltop.js', array('jquery'), null, true);
	wp_enqueue_script('nice-select', $theme_uri . '/assets/js/plugins/jquery.nice-select.min.js', array('jquery'), null, true);
	wp_enqueue_script('images-loaded', $theme_uri . '/assets/js/plugins/images-loaded.min.js', array('jquery'), null, true);
	wp_enqueue_script('isotope', $theme_uri . '/assets/js/plugins/isotope.pkgd.min.js', array('jquery'), null, true);
	wp_enqueue_script('venobox', $theme_uri . '/assets/js/plugins/venobox.min.js', array('jquery'), null, true);
	wp_enqueue_script('aos', $theme_uri . '/assets/js/plugins/aos.min.js', array('jquery'), null, true);
	wp_enqueue_script('parallax', $theme_uri . '/assets/js/plugins/parallax.js', array('jquery'), null, true);
	wp_enqueue_script('waypoint', $theme_uri . '/assets/js/plugins/waypoint.js', array('jquery'), null, true);
	wp_enqueue_script('counter', $theme_uri . '/assets/js/plugins/counter.js', array('jquery'), null, true);
	
	// Enqueue main script after all other scripts
	wp_enqueue_script('main', $theme_uri . '/assets/js/main.js', array('jquery', 'swiper'), null, true);

	// Add jQuery in noConflict mode
	wp_add_inline_script('jquery-migrate', 'jQuery.noConflict();', 'after');
}
add_action('wp_enqueue_scripts', 'interreg_enqueue_styles');

// Force jQuery to load in header
function load_jquery_in_header() {
	wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'load_jquery_in_header', 1);

register_nav_menus(array(
	'primary-menu' => 'Primary Menu',
	'mobile-menu' => 'Mobile Menu',
	'footer-menu' => 'Footer Menu'
));

add_filter('nav_menu_css_class', function($classes, $item) {
	// Add has-dropdown class if item has children
	if(in_array('menu-item-has-children', $classes)) {
		$classes[] = 'has-dropdown';
	}
	return $classes;
}, 10, 2);

add_filter('nav_menu_submenu_css_class', function($classes) {
	return array('submenu');
});