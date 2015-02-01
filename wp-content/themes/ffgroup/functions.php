<?php
if (function_exists('add_theme_support')) {
 add_theme_support('menus');
}
if ( function_exists( 'register_nav_menu' ) ) {
register_nav_menu( 'ff-menu', 'Main Menu' );
}

