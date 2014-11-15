                                                             <?php get_header(); ?>
            <div id="templatemo_content">
            	<div class="scroll">
	        		<div class="scrollContainer">
           <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part('content', 'single'); ?>
           <?php endwhile; ?>
                    </div> <!-- end scrollContainer -->
				</div>
            </div> <!-- end of content -->

            <div class="cleaner">s</div>
        </div> <!-- end of main -->

        <?php get_footer(); ?>
