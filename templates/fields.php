<?php

function my_acf_add_local_field_groups()
{
    //////////////// General Fileds ///////////////////////

    acf_add_local_field_group(array(
        'key' => 'group_slideshow',
        'title' => 'Slideshow Fields',
        'fields' => array(
            array(
                'key' => 'slideshow_tab',
                'name' => 'slideshow_tab',
                'label' => 'Slideshow',
                'type' => 'tab',
                'placement' => 'top',
            ),
            array(
                'key' => 'slideshow_gallery',
                'label' => 'Slideshow Gallery',
                'name' => 'slideshow_gallery',
                'type' => 'gallery',
                'max' => 8,
                'instructions' => 'Risoluzione raccomandata: 2200x1200 px',
            ),
            array(
                'key' => 'slideshow_height',
                'label' => 'Slideshow Height',
                'name' => 'slideshow_height',
                'instructions' => 'Selezionare l\'altezza dello slideshow (ha effetto su schermi larghi oltre 1440px)',
                'type' => 'select',
                'choices' => [
                    'full_height' => '100%',
                    'partial_height' => '75%'
                ],
                'default' => 'full_height',
                'wrapper' => [
                    'width' => '50%'
                ]

            ),
            array(
                'key' => 'slideshow_logo',
                'label' => 'Slideshow Logo',
                'name' => 'slideshow_logo',
                'type' => 'image',
                'instructions' => 'Selezionare un logo per lo slideshow (disponibile solo per la prima immagine)',
                'wrapper' => [
                    'width' => '50%'
                ]
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));


    acf_add_local_field_group(array(
        'key' => 'group_post_preview',
        'title' => 'Post Preview Fields',
        'fields' => array(
            array(
                'key' => 'post_preview_tab',
                'name' => 'post_preview_tab',
                'label' => 'Post Preview',
                'type' => 'tab',
                'placement' => 'top',
            ),
            array(
                'key' => 'post_preview_title',
                'name' => 'post_preview_title',
                'label' => 'Titolo',
                'type' => 'text',
                'instructions' => 'Inserire il titolo della sezione',
            ),
            array(
                'key' => 'post_preview_layout',
                'name' => 'post_preview_layout',
                'label' => 'Layout',
                'type' => 'select',
                'choices' => array(
                    'grid' => 'Griglia',
                    'carousel' => 'Carosello'
                ),
                'default' => 'carousel',
                'instructions' => 'Selezionare il tipo di post preview',
                'wrapper' => [
                    'width' => '50%'
                ]
            ),
            array(
                'key' => 'post_preview_categories',
                'name' => 'post_preview_categories',
                'label' => 'Category',
                'type' => 'taxonomy',
                'taxonomy' => 'category',
                'return_format' => 'id',
                'field_type' => 'multi_select',
                'allow_null' => 1,
                'instructions' => 'Categoria/categorie dei post da visualizzare (lasciare vuoto per selezionare tutte le categorie)',
                'wrapper' => [
                    'width' => '50%'
                ]
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));


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
                    2 => 'group_post_preview'
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



    //////////////// Template Squadra Fileds ///////////////////////

    acf_add_local_field_group(array(
        'key' => 'group_squadra',
        'title' => 'Informazioni Principali',
        'fields' => array(
            array(
                'key' => 'titolo_custom_squadra',
                'name' => 'titolo_custom_squadra',
                'label' => 'Titolo Custom',
                'type' => 'text',
                'instructions' => 'Inserire il nome della squadra se diverso dal titolo della pagina (es: Prima Squadra)',
            ),
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
            array(
                'key' => 'foto_squadra',
                'name' => 'foto_squadra',
                'label' => 'Foto Squadra',
                'type' => 'image',
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

    acf_add_local_field_group(array(
        'key' => 'group_classifiche_campionato',
        'title' => 'Classifiche Campionato',
        'fields' => array(
            array(
                'key' => 'prossima_partita_tab',
                'name' => 'prossima_partita_tab',
                'label' => 'Prossima Partita',
                'type' => 'tab',
                'placement' => 'top',
            ),
            array(
                'key' => 'prossima_partita',
                'name' => 'prossima_partita',
                'label' => 'Prossima Partita',
                'instructions' => 'Inserire l\'intero codice del widget (iframe)',
                'type' => 'wysiwyg',
                'wrapper' => [
                    'height' => '50%'
                ]
            ),
            array(
                'key' => 'classifica_campionato_tab',
                'name' => 'classifica_campionato_tab',
                'label' => 'Classifica Campionato',
                'type' => 'tab',
                'placement' => 'top',
            ),
            array(
                'key' => 'classifica_campionato',
                'name' => 'classifica_campionato',
                'label' => 'Classifica',
                'instructions' => 'Inserire l\'intero codice del widget (iframe)',
                'type' => 'wysiwyg',
            ),
            array(
                'key' => 'classifica_marcatori_tab',
                'name' => 'classifica_marcatori_tab',
                'label' => 'Marcatori',
                'type' => 'tab',
                'placement' => 'top',
            ),
            array(
                'key' => 'classifica_marcatori',
                'name' => 'classifica_marcatori',
                'label' => 'Classifica Marcatori',
                'instructions' => 'Inserire l\'intero codice del widget (iframe)',
                'type' => 'wysiwyg',
            ),
            array(
                'key' => 'risultati_tab',
                'name' => 'risultati_tab',
                'label' => 'Risultati',
                'type' => 'tab',
                'placement' => 'top',
            ),
            array(
                'key' => 'risultati',
                'name' => 'risultati',
                'label' => 'Risultati',
                'instructions' => 'Inserire l\'intero codice del widget (iframe)',
                'type' => 'wysiwyg',
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
        'menu_order' => 1,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'layout' => 'table',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_classifiche_coppa',
        'title' => 'Classifiche Coppa',
        'fields' => array(
            array(
                'key' => 'prossima_partita_coppa_tab',
                'name' => 'prossima_partita_coppa_tab',
                'label' => 'Prossima Partita di Coppa',
                'type' => 'tab',
                'placement' => 'top',
            ),
            array(
                'key' => 'prossima_partita_coppa',
                'name' => 'prossima_partita_coppa',
                'label' => 'Prossima Partita',
                'instructions' => 'Inserire l\'intero codice del widget (iframe)',
                'type' => 'wysiwyg',
                'wrapper' => [
                    'height' => '50%'
                ]
            ),
            array(
                'key' => 'classifica_coppa_tab',
                'name' => 'classifica_coppa_tab',
                'label' => 'Classifica Coppa',
                'type' => 'tab',
                'placement' => 'top',
            ),
            array(
                'key' => 'classifica_coppa',
                'name' => 'classifica_coppa',
                'label' => 'Classifica',
                'instructions' => 'Inserire l\'intero codice del widget (iframe)',
                'type' => 'wysiwyg',
            ),
            array(
                'key' => 'classifica_marcatori_coppa_tab',
                'name' => 'classifica_marcatori_coppa_tab',
                'label' => 'Marcatori Coppa',
                'type' => 'tab',
                'placement' => 'top',
            ),
            array(
                'key' => 'classifica_marcatori_coppa',
                'name' => 'classifica_marcatori_coppa',
                'label' => 'Classifica Marcatori',
                'instructions' => 'Inserire l\'intero codice del widget (iframe)',
                'type' => 'wysiwyg',
            ),
            array(
                'key' => 'risultati_coppa_tab',
                'name' => 'risultati_coppa_tab',
                'label' => 'Risultati Coppa',
                'type' => 'tab',
                'placement' => 'top',
            ),
            array(
                'key' => 'risultati_coppa',
                'name' => 'risultati_coppa',
                'label' => 'Risultati',
                'instructions' => 'Inserire l\'intero codice del widget (iframe)',
                'type' => 'wysiwyg',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-squadra.php',
                ),
                array(
                    'param' => 'post_taxonomy',
                    'operator' => '==',
                    'value' => 'page-category:prima-squadra',
                ),
            )
        ),
        'menu_order' => 2,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'layout' => 'table',
    ));
}

add_action('acf/init', 'my_acf_add_local_field_groups');
