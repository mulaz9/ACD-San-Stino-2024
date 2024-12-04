<?php

function enqueueAssets()
{

    wp_enqueue_style(' add_google_fonts ', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Poppins:wght@300;700&display=swap', false);

    if (!is_admin()) {
        wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.min.css');
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    }

    wp_register_script('font-awesome', 'https://kit.fontawesome.com/f2426038f9.js', array('jquery'), '6.6.0', true);
    wp_register_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), '11.1.9', true);
    wp_register_script('main-js', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '1.0.0', true);
    wp_register_script('slideshow-js', get_template_directory_uri() . '/js/slideshow.min.js', array('swiper-js'), '1.0.0', true);
    wp_register_script('anchors-js', get_template_directory_uri() . '/js/anchors.min.js', array(), '1.0.0', true);
    wp_register_script('post_preview-js', get_template_directory_uri() . '/js/post_preview.min.js', array('swiper-js'), '1.0.0', true);
    wp_register_script('sponsor-js', get_template_directory_uri() . '/js/sponsor.min.js', array('swiper-js'), '1.0.0', true);

    wp_enqueue_script('font-awesome');
    wp_enqueue_script('swiper-js');
    wp_enqueue_script('main-js');
}

function adminAssets()
{
    wp_enqueue_style('admin-css', get_template_directory_uri() . '/css/admin.min.css');
}

function blocksAssets()
{

    // Slideshow
    $GLOBALS['images_slideshow'] = get_field('slideshow_gallery', get_the_ID());
    global $images_slideshow;


    if ($images_slideshow && count($images_slideshow) > 0) {
        wp_enqueue_script('slideshow-js');
    }

    // Post preview
    $layout = get_field('post_preview_layout', get_the_ID());

    if ($layout == 'carousel') {
        wp_enqueue_script('post_preview-js');
    }

    // Sponsor
    $officialSponsorFields = get_field('official_sponsor_group', 'options');
    $officialSponsorList = $officialSponsorFields['official_sponsor'];

    if (!is_page_template('template-sponsor.php') && is_array($officialSponsorList) && count($officialSponsorList) > 0) {
        wp_enqueue_script('sponsor-js');
    }

    if (is_page_template('template-squadra.php')) {
        wp_enqueue_script('anchors-js');
    }
}


add_action('wp_enqueue_scripts', 'enqueueAssets', 1);
add_action('admin_head', 'adminAssets', 1);
add_action('wp_enqueue_scripts', 'blocksAssets', 101);
