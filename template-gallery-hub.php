<?php

/**
 * Template Name: Gallery Hub
 */
get_header();

get_template_part('partials/boxes/slideshow');
the_breadcrumb();
get_template_part('partials/boxes/main_content');
get_template_part('partials/boxes/gallery_albums_preview'); ?>

<?php get_footer();
