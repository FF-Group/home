<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed"
          href="<?php bloginfo('rss2_url'); ?>"/>
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed"
          href="<?php bloginfo('atom_url'); ?>"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php wp_get_archives('type=monthly&format=link'); ?>
<!--    <script type="text/javascript" src="--><?php //bloginfo('template_url'); ?><!--/js/jquery.min.js"></script>-->
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/cufon.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/Helvetica_Inserat_Cyrillic_Upright_400.font.js"
            type="text/javascript"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/css_browser_selector.js" type="text/javascript"></script>
    <style type="text/css">h1, h2, .menu a, .menu li a, .date_title .day, .date_title .month, .taghead, #show, #player {
            visibility: hidden;
        }</style>

    <script type="text/javascript">
        Cufon.replace('h1', {fontFamily: 'Helvetica Inserat Cyrillic Upright'});
        Cufon.replace('div.date_title h1', {fontFamily: 'Helvetica Inserat Cyrillic Upright'});
        Cufon.replace('h2', {fontFamily: 'Helvetica Inserat Cyrillic Upright'});
        Cufon.replace('div.WidgetContent h2', {fontFamily: 'Helvetica Inserat Cyrillic Upright'});
        Cufon.replace('h3', {fontFamily: 'Helvetica Inserat Cyrillic Upright'});
        Cufon.replace('.menu a', {fontFamily: 'Helvetica Inserat Cyrillic Upright'});
        Cufon.replace('ul.menu li a', {fontFamily: 'Helvetica Inserat Cyrillic Upright'});
        Cufon.replace('.date_title .day', {fontFamily: 'Helvetica Inserat Cyrillic Upright'});
        Cufon.replace('.date_title .month ', {fontFamily: 'Helvetica Inserat Cyrillic Upright'});
        Cufon.replace('.taghead', {fontFamily: 'Helvetica Inserat Cyrillic Upright'});
        Cufon.replace('h3.gform_title', {fontFamily: 'Helvetica Inserat Cyrillic Upright'});
    </script>
    <link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet" type="text/css"/>
    <?php wp_head(); ?>
</head>
<body>
<div class="main">
    <div id="header">
        <div id="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php header_image(); ?>"
                                                                width="<?php echo HEADER_IMAGE_WIDTH; ?>"
                                                                height="<?php echo HEADER_IMAGE_HEIGHT; ?>"
                                                                alt=" <?php bloginfo('name'); ?>"/></a></div>
        <div id="header_ad">
        </div>
    </div>

<!--  
<table id="slider-table">
<tr>
<td><img src="<?php bloginfo('template_url'); ?>/images/slider-corner-top-left.png" /></td><td  background="<?php bloginfo('template_url'); ?>/images/slider-top.png"></td><td><img src="<?php bloginfo('template_url'); ?>/images/slider-corner-top-right.png" /></td>
</tr>
<tr>
<td  background="<?php bloginfo('template_url'); ?>/images/slider-left.png"></td><td  background="<?php bloginfo('template_url'); ?>/images/slider-bg.png">
<div style="margin: 5px">		
<?php /* echo do_shortcode("[huge_it_slider id='1']"); */ ?>
</div>

</td><td  background="<?php bloginfo('template_url'); ?>/images/slider-right.png"></td>
</tr>
<tr>
<td><img src="<?php bloginfo('template_url'); ?>/images/slider-corner-bot-left.png" /></td><td  background="<?php bloginfo('template_url'); ?>/images/slider-bottom.png"></td><td><img src="<?php bloginfo('template_url'); ?>/images/slider-corner-bot-right.png" /></td>
</tr>
</table>
-->

<div id="slider">		
<?php echo do_shortcode("[huge_it_slider id='1']"); ?>
</div>
<br>

</div>
    <div id="menu_navigation">
        <div id="menu-nav">
            <?php wp_nav_menu(array('theme_location' => 'primary', 'menu' => 'Primary Menu', 'sort_column' => 'menu_order', 'container_class' => 'menu-header')); ?></div>
    </div>
    <div style="clear:both"></div>
    <div class="out">

