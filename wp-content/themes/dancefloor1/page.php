<?php include(TEMPLATEPATH."/header-single.php");?>
<div id="body" class="single">                 
<?php if ( get_option('layout') == 'right_sidebar'  ) echo '<div id="content" style="float:left;margin-left:22px;">'; else echo '<div  id="content" style="float:right;margin-right:42px;">';?> 
			<?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>             
			<div class="postMain"></div>
				<div class="post">			
					<div class="date_title">
						<h1><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					</div>
<?php if ( has_post_thumbnail() ) {
$mypostimage = the_post_thumbnail( 'large', array('class' => 'featsingle' , 'alt' => get_the_title() , 'title' => get_the_title() ));
the_content(); } else { the_content(); } ?>	
                </div> 				                            
                <div style="clear:both">
                <div class="postFoot"></div> 
                </div>
                <?php endwhile;  ?>
                <?php else : ?>
			<?php endif; ?>
		</div>            
	<?php get_sidebar(); ?>
<?php get_footer(); ?>            