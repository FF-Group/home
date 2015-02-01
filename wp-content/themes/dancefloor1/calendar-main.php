<?php
/*
  Template Name: Event Calendar
 */
?>
<?php get_header('single');   ?>
<div id="body" class="single">
<?php if ( get_option('layout') == 'right_sidebar'  ) echo '<div id="content" style="float:left;margin-left:22px;">'; else echo '<div  id="content" style="float:right;margin-right:42px;">';?>

<?php function old_events( $where = '' ) { $where .= " AND post_date > '" . date('Y-m-d', strtotime('0 days')) . "'"; return $where;}
add_filter( 'posts_where', 'old_events' );
query_posts( $query_string );?>
<?php  $args = array( 'post_type' => 'events',
					  'posts_per_page' => '10',
					  'post_status' => 'publish,future',
					  'order' => 'ASC');
				query_posts($args);
				?>
            	<?php if (have_posts()) : ?>
            	<?php while (have_posts()) : the_post(); ?>
						<div class="postMain"></div>
			<div class="post">
			<div class="date_title">
				<div class="date_back">
					<div class="month"><?php the_time('M') ?></div>
					<div class="day"><?php the_time('d') ?></div>
				</div>
 					<h2><a href="<?php the_permalink() ?>" title="Постоянная ссылка на <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			</div> <?php if ( has_post_thumbnail() ) {
$mypostimage = the_post_thumbnail( 'eventthumb', array('class' => 'eventthumb' , 'alt' => get_the_title() , 'title' => get_the_title() ));
the_excerpt(); } else { the_excerpt();} ?>
<div style="clear:both;"></div>
			</div>
<div style="clear:both"></div>
            <div class="postFoot"></div>
               <?php endwhile; ?>
                <?php else: ?>
                <?php endif; ?>
 			</div>
	<?php get_sidebar();?>
<?php get_footer();?>