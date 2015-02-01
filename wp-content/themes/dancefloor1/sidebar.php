<?php if ( get_option('layout') == 'right_sidebar'  ) echo '<div id="sidebar" style="float:right;margin-right:43px;">'; else echo '<div  id="sidebar" style="float:left;margin-left:24px;">';?>  
<div class="ad300x250">
	<?php newThemeOptions_showBigBanner();?>
</div> <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widgets') ) : ?>
<?php endif; ?>
<div style="clear:both;"></div>	
<?php newThemeOptions_showBannersSquare();	?>
<div style="clear:both;"></div>	

</div> 