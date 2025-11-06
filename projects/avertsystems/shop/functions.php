<?php
add_action( 'wp_enqueue_scripts', 'storefront_child_enqueue_styles' );

function storefront_child_enqueue_styles() {
	wp_enqueue_style(
		'storefront-child-mystyle', 
		get_theme_file_uri( 'mystyle.css' )
	);
}
add_action( 'wp_enqueue_scripts', 'storefront_child_enqueue_scripts' );

function storefront_child_enqueue_scripts() {
	wp_enqueue_script(
		'storefront-child-jquery',
		get_theme_file_uri( 'node_modules/jquery/dist/jquery.js' ),
		array(),
		1.0,
		false
	);
	wp_enqueue_script(
		'storefront-child-my',
		get_theme_file_uri( 'my.js' ),
		array('storefront-child-jquery'),
		1.0,
		false
	);
}
?>
