<?php
/*
  Template Name: Video Player
 */
?>
<?php get_header('single'); ?>
	<div id="showvideo">            
	<div id="media">
	<div>		
	<div class="aPlayer">                    	 
        	 <?php show_player();?> 	 
		</div>  
	</div>
	</div>	       
		<div style="clear:both"></div>    
        </div>
		<div style="clear:both"></div> 		
			<div id="body"> 			
<?php if ( get_option('layout') == 'right_sidebar'  ) echo '<div id="content" style="float:left;margin-left:22px;">'; else echo '<div  id="content" style="float:right;margin-right:42px;">';?>     	
	    	<?php
	    	$post = $wp_query->post;
	   	 	$limit = get_settings('posts_per_page');
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts('showposts='.$limit.'&paged=' . $paged);
			while (have_posts()) : the_post(); 
			?> 
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
				<?php endwhile;  ?>
 				<div class="navigation"><p><?php posts_nav_link('&#8734;','Next &raquo;&raquo;',' &laquo;&laquo; Previous'); ?></p>
			</div>
		</div>            
<?php get_sidebar(); ?>  
<?php get_footer(); ?>            