<?php


function my_acf_add_local_field_layout()
{

    //////////////// Homepage Fileds ///////////////////////

    acf_add_local_field_group(array(
        'key' => 'group_homepage',
        'title' => 'Hompage Fields',
        'fields' => array(
            array(
                'key' => 'field_group_homepage_fields',
                'name' => 'acf_group_homepage_fields',
                'type' => 'clone',
                'clone' => array(
                    1 => 'group_slideshow',
                    2 => 'group_main_content',
                    3 => 'group_post_preview',
                    4 => 'group_files',
                ),
                'display' => 'group',
                'layout' => 'block',
            ),

        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page'
                )
            )
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));

    //////////////// Default Page Fileds ///////////////////////

    acf_add_local_field_group(array(
        'key' => 'group_default_page',
        'title' => 'Default Page Fields',
        'fields' => array(
            array(
                'key' => 'field_group_default_page',
                'name' => 'acf_group_default_page',
                'type' => 'clone',
                'clone' => array(
                    1 => 'group_slideshow',
                    2 => 'group_main_content',
                    3 => 'group_post_preview',
                    4 => 'group_files',
                ),
                'display' => 'group',
                'layout' => 'block',
            ),

        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '!=',
                    'value' => 'front_page'
                ),
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default'
                )
            ),
        ),

        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));

    //////////////// Template Squadra Fileds ///////////////////////

    acf_add_local_field_group(array(
        'key' => 'group_squadra',
        'title' => 'Informazioni Principali',
        'fields' => array(
            array(
                'key' => 'girone_squadra',
                'name' => 'girone_squadra',
                'label' => 'Girone Squadra',
                'type' => 'text',
                'instructions' => 'Inserire il girone della squadra(es: Promozione - Girone D)',
            ),
            array(
                'key' => 'nome_coppa',
                'name' => 'nome_coppa',
                'label' => 'Nome della Coppa',
                'type' => 'text',
                'instructions' => 'Inserire il nome della coppa regionale(es: Trofeo Regione Veneto)',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-squadra.php',
                ),
            )
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_squadra_fields',
        'title' => 'Squadra Fields',
        'fields' => array(
            array(
                'key' => 'field_group_squadra_fields',
                'name' => 'acf_group_squadra_fields',
                'type' => 'clone',
                'clone' => array(
                    1 => 'group_main_content',
                    2 => 'group_giocatori'
                ),
                'display' => 'group',
                'layout' => 'block',
            ),

        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-squadra.php',
                ),
            )
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));

    //////////////// Contatti Fileds ///////////////////////

    acf_add_local_field_group(array(
        'key' => 'group_contatti',
        'title' => 'Contatti Fields',
        'fields' => array(
            array(
                'key' => 'field_group_contatti',
                'name' => 'acf_group_contatti',
                'type' => 'clone',
                'clone' => array(
                    1 => 'group_slideshow',
                    2 => 'group_main_content',
                ),
                'display' => 'group',
                'layout' => 'block',
            ),

        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-contatti.php'
                )
            )
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));
}

add_action('acf/init', 'my_acf_add_local_field_layout');
