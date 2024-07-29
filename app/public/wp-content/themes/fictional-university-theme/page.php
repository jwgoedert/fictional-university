<?php get_header();
    while(have_posts()) {
        the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
        <h2>This is a page, not a post!</h2>
    <?php }
    get_footer();
?>