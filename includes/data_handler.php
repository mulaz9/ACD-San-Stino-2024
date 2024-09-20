<?php

function get_prima_squadra_data()
{

    $args = array(
        'numberposts' => -1,
        'post_type' => 'page',
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'post_status' => 'publish',
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-squadra.php',
        'tax_query' => array(
            array(
                'taxonomy' => 'page-category',
                'field' => 'slug',
                'terms' => 'prima-squadra',
            ),
        ),
    );


    $prima_squadra = get_posts($args)[0];
    $prima_squadra_ID = $prima_squadra->ID;

    $prima_squadra_data = new stdClass();

    $prima_squadra_data->titolo = !empty(get_field('titolo_custom_squadra', $prima_squadra_ID)) ? get_field('titolo_custom_squadra', $prima_squadra_ID) : get_the_title($prima_squadra_ID);
    $prima_squadra_data->girone = get_field('girone_squadra', $prima_squadra_ID);
    $prima_squadra_data->nome_coppa = get_field('nome_coppa', $prima_squadra_ID);
    $prima_squadra_data->foto_url = wp_get_attachment_image_url(get_field('foto_squadra', $prima_squadra_ID)['ID'], 'full');
    $prima_squadra_data->prossima_partita = get_field('prossima_partita', $prima_squadra_ID);
    $prima_squadra_data->classifica_campionato = get_field('classifica_campionato', $prima_squadra_ID);
    $prima_squadra_data->classifica_marcatori = get_field('classifica_marcatori', $prima_squadra_ID);
    $prima_squadra_data->risultati = get_field('risultati', $prima_squadra_ID);

    $prima_squadra_data->prossima_partita_coppa = get_field('prossima_partita_coppa', $prima_squadra_ID);
    $prima_squadra_data->classifica_coppa = get_field('classifica_coppa', $prima_squadra_ID);
    $prima_squadra_data->classifica_marcatori_coppa = get_field('classifica_marcatori_coppa', $prima_squadra_ID);
    $prima_squadra_data->risultati_coppa = get_field('risultati_coppa', $prima_squadra_ID);

    // Global variable for current data
    $GLOBALS['prima_squadra_data'] = $prima_squadra_data;
}

add_action('init', 'get_prima_squadra_data');


function get_current_squadra_data()
{
    $squadra_ID = get_the_ID();

    $current_squadra_data = new stdClass();

    $current_squadra_data->titolo = !empty(get_field('titolo_custom_squadra', $squadra_ID)) ? get_field('titolo_custom_squadra', $squadra_ID) : get_the_title($squadra_ID);
    $current_squadra_data->girone = get_field('girone_squadra', $squadra_ID);
    $current_squadra_data->foto_url = wp_get_attachment_image_url(get_field('foto_squadra', $squadra_ID)['ID'], 'full');
    $current_squadra_data->prossima_partita = get_field('prossima_partita', $squadra_ID);
    $current_squadra_data->classifica_campionato = get_field('classifica_campionato', $squadra_ID);
    $current_squadra_data->classifica_marcatori = get_field('classifica_marcatori', $squadra_ID);
    $current_squadra_data->risultati = get_field('risultati', $squadra_ID);

    // Global variable for current data
    $GLOBALS['current_squadra_data'] = $current_squadra_data;
}

add_action('template_redirect', 'get_current_squadra_data');
