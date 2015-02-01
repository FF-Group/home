
<div class="panel" id="post-<?php the_ID(); ?>">
                    <h2><?php echo get_the_title(); ?></h2>
                     <?php 
                    if(get_the_ID() != 31){
                    	echo get_the_content();
                    }	
                    else{
                    	echo do_shortcode("[huge_it_portfolio id='1']");
                    }
                     ?>
                    </div> <!-- end of contact us -->
