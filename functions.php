<?php

// Variables

// Includes

// Hooks
// add_action('wp_enqueue_scripts', 'u_enqueue');
error_reporting(0);

global $sitepress;

define('TEMP_DIR', get_template_directory());

const TEMPLATES = TEMP_DIR . '/templates/';
const INCLUDES = TEMP_DIR . '/includes/';


require_once(TEMPLATES . 'fields.php');
require_once(TEMPLATES . 'acf-layout.php');
require_once(TEMPLATES . 'categories.php');
require_once(TEMPLATES . 'options.php');
require_once(TEMPLATES . 'assets.php');
require_once(INCLUDES . 'data_handler.php');


register_nav_menus(array(
    'highlight_menu' => 'Highlight Menu',
));

// remove html margin top
add_filter('show_admin_bar', '__return_false');

//Remove WPAUTOP from ACF TinyMCE Editor
function acf_wysiwyg_remove_wpautop()
{
    remove_filter('the_content', 'wpautop');
    remove_filter('acf_the_content', 'wpautop');
}
add_action('acf/init', 'acf_wysiwyg_remove_wpautop');


// Add featured image
add_theme_support('post-thumbnails');


// Limit words
function limit_words($string, $word_limit)
{
    $string = strip_tags($string);
    $words = explode(' ', strip_tags($string));
    $return = trim(implode(' ', array_slice($words, 0, $word_limit)));
    if (strlen($return) < strlen($string)) {
        $return .= '...';
    }
    return $return;
}
