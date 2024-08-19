<?php

// Variables

// Includes

// Hooks
// add_action('wp_enqueue_scripts', 'u_enqueue');
error_reporting(0);

global $sitepress;

define('TEMP_DIR', get_template_directory());

const TEMPLATES = TEMP_DIR . '/templates/';


require_once(TEMPLATES . 'fields.php');
require_once(TEMPLATES . 'options.php');
require_once(TEMPLATES . 'assets.php');


register_nav_menus(array(
    'highlight_menu' => 'Highlight Menu',
));

// remove html margin top
add_filter('show_admin_bar', '__return_false');
