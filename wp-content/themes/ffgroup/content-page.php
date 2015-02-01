
<div <?php post_class('panel'); ?>  id="post-<?php the_ID(); ?>">
                    <h2><?php the_title(); ?></h2>
                    <?php 
                    if(get_the_ID() != 24){
                    	the_content();
                    }	
                    else{
                    	echo do_shortcode("[huge_it_gallery id='1']");
                    }
                     ?>
                    </div> <!-- end of contact us -->
