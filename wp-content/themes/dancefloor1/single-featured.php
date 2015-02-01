<?php get_header('single'); ?>
<div id="body" class="single">  <div style="display:none"><a href="http://blogra.ru">the best wordpress themes</a>.</div>               
<?php if ( get_option('layout') == 'right_sidebar'  ) echo '<div id="content" style="float:left;margin-left:22px;">'; else echo '<div  id="content" style="float:right;margin-right:42px;">';?> 
           <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>             
			<div class="postMain"></div>
			<div class="post">	
			<div class="date_title">
<div class="date_back">
				<div class="month"><?php the_time('M') ?></div>
				<div class="day"><?php the_time('d') ?></div>				
			</div>
				<h1><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			</div>
<?php if ( has_post_thumbnail() ) {
$mypostimage = the_post_thumbnail( 'medium', array('class' => 'featsingle' , 'alt' => get_the_title() , 'title' => get_the_title() ));
the_content(); } else { the_content(); } ?>	
             <div style="clear:both;"></div>
			 </div> 
				<div style="clear:both">
                 <div class="postFoot"></div> 
                </div>
                <?php endwhile;  ?>
				<div class="commentsMain">
					<?php comments_template(); ?>
				 </div>  
				 <?php else : ?>
			<?php endif; ?>
		</div>            
	<?php get_sidebar(); ?>
<?php get_footer(); ?>            