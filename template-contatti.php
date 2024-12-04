<?php

/**
 * Template Name: Contatti
 */
get_header();

get_template_part('partials/boxes/slideshow');
the_breadcrumb();
get_template_part('partials/boxes/main_content');
get_template_part('partials/boxes/contatti'); ?>


<section id="map" class="section">
    <div class="googleMapsIframeContainer container">
        <iframe
            width="100%"
            height="auto"
            src="https://maps.google.com/maps?q=Via%20Vivaldi%208%2C%20san%20stino%20di%20livenza&amp;z=14&amp;output=embed"
            class="googleMapsIframe"
            title="map"
            style="aspect-ratio: 16/7;">
        </iframe>
    </div>
</section>

<?php get_footer();
