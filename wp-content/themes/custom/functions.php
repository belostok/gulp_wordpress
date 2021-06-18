<?php
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'wp_site_icon', 99);
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_print_styles', 'print_emoji_styles');
show_admin_bar(false);
function wpassist_remove_block_library_css()
{
	wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'wpassist_remove_block_library_css');
function my_deregister_scripts()
{
	wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'my_deregister_scripts');

add_action('wp_enqueue_scripts', 'custom_css');
function custom_css()
{
	wp_enqueue_style('css_libs', get_stylesheet_directory_uri() . '/src/css/libs.min.css');
	wp_enqueue_style('css_main', get_stylesheet_directory_uri() . '/src/css/main.css');
}


add_action('wp_enqueue_scripts', 'custom_js');
function custom_js()
{
	wp_enqueue_script('js_libs', get_template_directory_uri() . '/src/js/libs.min.js', '', '', true);
	wp_enqueue_script('js_common', get_template_directory_uri() . '/src/js/common.js', '', '', true);
}

function navbar_menu()
{
	register_nav_menu('navbar_menu', __('Navbar'));
}
add_action('init', 'navbar_menu');
