<?php

function enqueueAssets()
{

    wp_enqueue_style(' add_google_fonts ', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Poppins:wght@300;700&display=swap', false);

    if (!is_admin()) {
        wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.min.css');
        wp_enqueue_style('swiper-csss', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    }


    wp_register_script('font-awesome', 'https://kit.fontawesome.com/f2426038f9.js', array('jquery'), '5.15.4', true);
    wp_register_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), '11.1.9', true);
    wp_register_script('main-js', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '1.0.0', true);
    wp_register_script('slideshow-js', get_template_directory_uri() . '/js/slideshow.min.js', array('swiper-js'), '1.0.0', true);

    wp_enqueue_script('font-awesome');
    wp_enqueue_script('swiper-js');
    wp_enqueue_script('main-js');
}

function slideshowAssets()
{
    $GLOBALS['images_slideshow'] = get_field('slideshow', get_the_ID());
    global $images_slideshow;


    if ($images_slideshow && count($images_slideshow) > 0) {
        wp_enqueue_script('slideshow-js');
    }
}

add_action('wp_enqueue_scripts', 'enqueueAssets', 1);
add_action('wp_enqueue_scripts', 'slideshowAssets', 101);
