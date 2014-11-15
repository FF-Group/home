<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <h1 class="page-title">
        <?php
if (is_category()):
    single_cat_title();
elseif ( is_tag() ) :
single_tag_title();
elseif (is_year()):
    printf(__('Year: %s', 'striped'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'striped')) . '</span>');
elseif (is_month()):
    printf(__('Month: %s', 'striped'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'striped')) . '</span>');
elseif (is_day()):
    printf(__('Day: %s', 'striped'), '<span>' . get_the_date() . '</span>');
elseif (is_author()):
    printf( __( 'Author: %s', 'striped' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
else :
_e( 'Archives', 'striped' );
endif;
?>
<?php get_template_part('content'); ?>
    <?php endwhile; ?>
