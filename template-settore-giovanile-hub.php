<?php

/**
 * Template Name: Settore Giovanile Hub
 */

get_header();

get_template_part('partials/boxes/slideshow');
the_breadcrumb();
get_template_part('partials/boxes/main_content');
get_template_part('partials/boxes/lista_giovanili');
get_template_part('partials/boxes/post_preview');
get_template_part('partials/boxes/uploads');
get_footer();
