
<div class="panel <?php post_class(); ?>" id="post-<?php the_ID(); ?>">
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                    <footer class="entry-meta">
<?php edit_post_link( __( 'Edit', 'striped' ), '<div class="edit-link">', '</div>' ); ?>
<p class="tags"><?php the_tags(__( 'Tagged as: ', 'striped' ),', '); ?></p>
<p class="categories"><?php _e( 'Categorized in&#58; ', 'striped' ) . the_category(', '); ?></p>
</footer>
                    </div> <!-- end of contact us -->
