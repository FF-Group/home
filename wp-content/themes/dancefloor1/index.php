<?php get_header(); ?>
<div id="show">
	<div id="showcase"  class="showcase">
<?php query_posts(array('post_type'=>'featured','posts_per_page' => '18'));?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post();
$large = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail');?>
<div>				<a href="<?php the_permalink();?>"><img src="<?php echo $large[0]; ?>" alt="<?php the_title();?>" /></a>
	<div class="showcase-thumbnail">
		<img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title();?>"/>
	<div class="showcase-thumbnail-cover"></div>
	</div></div>
<?php endwhile;?>
<?php wp_reset_query();?>
	</div>
		<div style="clear:both"></div>
        </div>
		<div style="clear:both"></div>
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Photo Gallery') ) : ?><div style="clear:both"></div>
<?php endif; ?>
			<div id="body">
			<?php
if ( function_exists('dynamic_sidebar') )
echo '<div id="centerwidgets">';
dynamic_sidebar('Widgets Home');
echo '<div style="clear:both"></div></div>';
?>
	<?php if ( get_option('layout') == 'right_sidebar'  ) echo '<div id="content" style="float:left;margin-left:22px;">'; else echo '<div  id="content" style="float:right;margin-right:42px;">';?>

	    	<?php if (have_posts()) :while (have_posts()) :the_post();?>
			<div class="postMain"></div>
			<div class="post">
 					<div class="date_title">
				<div class="date_back">
					<div class="month"><?php the_time('M') ?></div>
					<div class="day"><?php the_time('d') ?></div>
				</div>
 					<h2><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			</div>
				<?php if ( has_post_thumbnail() ) {
$mypostimage = the_post_thumbnail( 'thumbnail', array('class' => 'homethumb' , 'alt' => get_the_title() , 'title' => get_the_title() ));
the_excerpt('</br></br><span class="fullarticle">FULL ARTICLE &raquo;</span>');} else {the_excerpt('</br></br><span class="fullarticle">FULL ARTICLE &raquo;</span>'); } ?>
				<div class="postMeta"><?php _e("Posted in ","language"); ?> <?php the_category(', ') ?> </div>
                <div style="clear:both;"></div>
                </div>
                <div style="clear:both"></div>
                <div class="postFoot"></div>
				<?php endwhile;endif;  ?>
 				<div class="navigation"><p><?php posts_nav_link('&#8734;','Next &raquo;&raquo;',' &laquo;&laquo; Previous'); ?></p>
			</div>
		</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>