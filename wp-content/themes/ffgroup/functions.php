<?php
if (function_exists('add_theme_support')) {
 add_theme_support('menus');
}
if ( function_exists( 'register_nav_menu' ) ) {
register_nav_menu( 'ff-menu', 'Main Menu' );
}

function wp_enqueue_theme_scrupts(){
	
	wp_enqueue_script( 'ui', get_template_directory_uri(). '/js/jquery-ui.min.js', array('jquery') );
}
add_action('admin_enqueue_scripts', 'wp_enqueue_theme_scrupts');

