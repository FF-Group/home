        <?php get_header(); ?>
            <div id="templatemo_content">
            	<div class="scroll">
           <div class="scrollContainer">
           <?php
           $args = array(
                 'post_type' => 'page',
                 'orderby' => 'date',
                 'order' => 'DESC'
           );
           $query = new WP_Query($args);
           ?>
           <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php get_template_part('content'); ?>
           <?php endwhile; ?>
                    </div> <!-- end scrollContainer -->
				</div>
            </div> <!-- end of content -->

            <div class="cleaner">s</div>
        </div> <!-- end of main -->
        
        <?php get_footer(); ?>
