<?php
function my_custom_theme_setup() {
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
?>