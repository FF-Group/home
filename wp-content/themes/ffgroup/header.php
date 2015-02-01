<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; <?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
<title><?php
/*
* Print the <title> tag based on what is being viewed.
*/
global $page, $paged;

wp_title( '|', true, 'right' );

// Add the blog name.
bloginfo( 'name' );

// Add the blog description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
echo " | $site_description";

// Add a page number if necessary:
if ( $paged >= 2 || $page >= 2 )
echo ' | ' . sprintf( __( 'Page %s', 'striped' ), max( $paged, $page ) );

?></title>
<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/coda-slider.css" type="text/css" charset="utf-8" />


<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.2.6.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.scrollTo-1.3.3.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.localscroll-1.2.5.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.serialScroll-1.2.1.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/coda-slider.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>







<?php wp_head(); ?>
</head>
<body <?php body_class( $class ); ?>>

<div id="slider">
	<div id="templatemo_wrapper">

		<div id="templatemo_social">

        </div> <!-- end of social -->

        <div id="templatemo_main">
        	<div id="templatemo_sidebar">
            	<div id="header"><h1><a href='<?php echo get_home_url(); ?>'><?php bloginfo('name'); ?></a></h1></div>
             <div id="menu">
                <nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">

		          <?php wp_nav_menu( array( /*'theme_location' => 'primary' */ 'menu_class' => 'ff-menu' ) ); ?>

			    </nav>
                 </div>
                 </div><!-- end of sidebar -->
