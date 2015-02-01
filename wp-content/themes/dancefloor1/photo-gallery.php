<?php
/*
  Template Name: Photo Gallery
 */
?>
<?php include(TEMPLATEPATH."/header-single.php");?>
<div id="body" class="single">
<?php if ( get_option('layout') == 'right_sidebar'  ) echo '<div id="content" style="float:left;margin-left:22px;">'; else echo '<div  id="content" style="float:right;margin-right:42px;">';?>
			<?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
			<div class="postMain"></div>
				<div class="postPage">
					<div class="date_title">
						<h1><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					</div>
					<?php echo do_shortcode('[gallery columns="4" size="thumbnail"]');?>
				<div style="clear:both;"></div>
                </div>
            <div style="clear:both"></div>
		<div class="postFoot"></div>
        <?php endwhile; ?>
	<?php else : ?>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
