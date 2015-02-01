<?php get_header('single'); ?>
<div id="body" class="single">                 
<?php if ( get_option('layout') == 'right_sidebar'  ) echo '<div id="content" style="float:left;margin-left:22px;">'; else echo '<div  id="content" style="float:right;margin-right:42px;">';?> 
     <?php if (have_posts()) : ?>
	 <?php $post = $posts[0];?>
	 <div class="postMain"></div>
	<div class="postcom">
	  <p class="taghead"><?php printf( __( 'Search Results for: %s', 'language' ), '<span>' . get_search_query() . '</span>' ); ?></h1></p>
	 </div><div style="clear:both"></div>
	 <div class="postFoot"></div>
	 <?php while (have_posts()) : the_post(); ?>
		<div class="postMain"></div>
			<div class="post">                 
				<div class="date_title">
					<div class="date_back">
						<div class="month"><?php the_time('M') ?>
						</div>
						<div class="day"><?php the_time('d') ?>
						</div>				
					</div>
						<h2><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				</div>
            		<?php if ( has_post_thumbnail() ) {
$mypostimage = the_post_thumbnail( 'eventthumb', array('class' => 'eventthumb' , 'alt' => get_the_title() , 'title' => get_the_title() ));
the_excerpt();} else { echo'<a href="'.get_permalink().'">'.category_image($post->ID,'medium').'</a>';
the_excerpt();  } ?>	
<div style="clear:both;"></div>
               </div> 				                            
               <div style="clear:both">
               <div class="postFoot"></div> 
               </div>
               <?php endwhile;  ?>
 				<div class="navigation"><p><?php posts_nav_link('&#8734;','Next &raquo;&raquo;',' &laquo;&laquo; Previous'); ?></p></div>
			<?php else : ?>
		<?php endif; ?>
	</div>            
<?php get_sidebar(); ?>
<?php get_footer(); ?>                