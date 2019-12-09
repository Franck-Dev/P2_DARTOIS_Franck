<?php
/**
**  activation theme
**/
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	wp_deregister_style( 'oceanwp-style' );
    wp_enqueue_style( 'oceanwp-style', get_template_directory_uri().'/assets/css/style.min.css', false, '1.11' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
?>