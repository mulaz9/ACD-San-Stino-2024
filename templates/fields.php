<?php


function addSiteOptions()
{
    acf_add_options_page(array(
        'page_title' => 'Site Options',
        'menu_slug' => 'options',
        'position' => '',
        'redirect' => false,
        'menu_icon' => array(
            'type' => 'dashicons',
            'value' => 'dashicons-admin-generic',
        ),
        'icon_url' => 'dashicons-admin-generic',
    ));
}

add_action('acf/init', 'addSiteOptions');



function my_acf_add_local_field_groups()
{

    ///////////////////////// Main Content /////////////////////////

    acf_add_local_field_group(array(
        'key' => 'group_main_content',
        'title' => 'Main Content Fields',
        'fields' => array(
            array(
                'key' => 'main_content_tab',
                'name' => 'main_content_tab',
                'label' => 'Main Content',
                'type' => 'tab',
                'placement' => 'left',
            ),
            array(
                'key' => 'main_content_hide_title',
                'name' => 'main_content_hide_title',
                'label' => 'Nascondi titolo',
                'instructions' => 'Abilitare per nascondere il titolo',
                'type' => 'true_false',
                'ui' => 1,
                'ui_on_text' => 'Si',
                'ui_off_text' => 'No',
                'default_value' => 0,
                'wrapper' => [
                    'width' => '20%'
                ]
            ),
            array(
                'key' => 'main_content_title',
                'name' => 'main_content_title',
                'label' => 'Titolo personalizzato del Main Content',
                'instructions' => 'Sostituisce il titolo della pagina se riempito',
                'type' => 'text',
                'wrapper' => [
                    'width' => '80%'
                ]
            ),
            array(
                'key' => 'main_content_subtitle',
                'name' => 'main_content_subtitle',
                'label' => 'Sottotitolo del Main Content',
                'type' => 'text',
            ),
            array(
                'key' => 'main_content_image',
                'name' => 'main_content_image',
                'label' => 'Immagine del Main Content',
                'type' => 'image',
                'wrapper' => [
                    'width' => '30%'
                ]
            ),
            array(
                'key' => 'main_content_image_position',
                'name' => 'main_content_image_position',
                'label' => 'Posizione dell\'immagine',
                'type' => 'select',
                'choices' => array(
                    'bottom' => 'Sotto il testo',
                    'left' => 'A sinistra del testo',
                    'right' => 'A destra del testo',
                ),
                'default' => 'bottom',
                'wrapper' => [
                    'width' => '30%'
                ]
            ),
            array(
                'key' => 'main_content_text_layout',
                'name' => 'main_content_text_layout',
                'label' => 'Layout del testo',
                'type' => 'select',
                'choices' => array(
                    'default' => 'Una colonna (default)',
                    'two_columns' => 'Due Colonne',
                ),
                'default' => 'default',
                'wrapper' => [
                    'width' => '25%'
                ]
            ),
            array(
                'key' => 'main_content_btns_enable',
                'name' => 'main_content_btns_enable',
                'label' => 'Abilita bottoni',
                'type' => 'true_false',
                'ui' => 1,
                'ui_on_text' => 'Si',
                'ui_off_text' => 'No',
                'default_value' => 0,
                'wrapper' => [
                    'width' => '15%'
                ]
            ),
            array(
                'key' => 'main_content_btns',
                'name' => 'main_content_btns',
                'label' => 'Buttons',
                'type' => 'repeater',
                'max' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'main_content_btns_enable',
                            'operator' => '==',
                            'value' => 1
                        ),
                    ),
                ),
                'sub_fields' => array(
                    array(
                        'key' => 'main_content_btn_type',
                        'name' => 'main_content_btn_type',
                        'label' => 'Tipo di collegamento del bottone',
                        'type' => 'select',
                        'choices' => array(
                            'internal' => 'Pagina Interna',
                            'external' => 'Link Esterno al Sito',
                            'pdf' => 'Pdf file',
                        ),
                        'wrapper' => [
                            'width' => '33%'
                        ]
                    ),
                    array(
                        'key' => 'main_content_btn_label',
                        'name' => 'main_content_btn_label',
                        'label' => 'Testo del bottone',
                        'type' => 'text',
                        'wrapper' => [
                            'width' => '33%'
                        ]
                    ),
                    array(
                        'key' => 'main_content_internal_link',
                        'name' => 'main_content_internal_link',
                        'label' => 'Link alla Pagina Interna',
                        'type' => 'page_link',
                        'post_type' => array(
                            0 => 'post',
                            1 => 'page',
                        ),
                        'post_status' => array(
                            0 => 'publish',
                        ),
                        'allow_archives' => 1,
                        'wrapper' => [
                            'width' => '33%'
                        ],
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'main_content_btn_type',
                                    'operator' => '==',
                                    'value' => 'internal'
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'main_content_external_link',
                        'name' => 'main_content_external_link',
                        'label' => 'Link alla Pagina Esterna',
                        'type' => 'text',
                        'wrapper' => [
                            'width' => '33%'
                        ],
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'main_content_btn_type',
                                    'operator' => '==',
                                    'value' => 'external'
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'main_content_pdf',
                        'name' => 'main_content_pdf',
                        'label' => 'Pdf link',
                        'type' => 'file',
                        'return_format' => 'url',
                        'mime_types' => 'pdf',
                        'wrapper' => [
                            'width' => '33%'
                        ],
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'main_content_btn_type',
                                    'operator' => '==',
                                    'value' => 'pdf'
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));

    ///////////////////////// Slideshow /////////////////////////

    acf_add_local_field_group(array(
        'key' => 'group_slideshow',
        'title' => 'Slideshow Fields',
        'fields' => array(
            array(
                'key' => 'slideshow_tab',
                'name' => 'slideshow_tab',
                'label' => 'Slideshow',
                'type' => 'tab',
                'placement' => 'left',
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
                'key' => 'slideshow_width',
                'label' => 'Slideshow Width',
                'name' => 'slideshow_width',
                'instructions' => 'Selezionare la larghezza dello slideshow',
                'type' => 'select',
                'choices' => [
                    'full_width' => '100%',
                    'partial_width' => '70%'
                ],
                'default' => 'full_height',
                'wrapper' => [
                    'width' => '50%'
                ]

            ),
            array(
                'key' => 'contain_image_enable',
                'name' => 'contain_image_enable',
                'label' => 'Contieni intera immagine',
                'instructions' => 'Selezionare per contenere l\'immagine (consigliato solo per immagini strette)',
                'type' => 'true_false',
                'ui' => 1,
                'ui_on_text' => 'Si',
                'ui_off_text' => 'No',
                'default_value' => 0,
                'wrapper' => [
                    'width' => '50%'
                ],
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'slideshow_width',
                            'operator' => '==',
                            'value' => 'partial_width'
                        ),
                    ),
                ),
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

    ///////////////////////// Giocatori e staff /////////////////////////
    acf_add_local_field_group(array(
        'key' => 'group_giocatori',
        'title' => 'Giocatori e Staff',
        'fields' => array(
            array(
                'key' => 'giocatori_tab',
                'name' => 'giocatori_tab',
                'label' => 'Giocatori e Staff',
                'type' => 'tab',
                'placement' => 'left',
            ),
            array(
                'key' => 'componenti_tabs_goup',
                'name' => 'componenti_tabs_goup',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'portieri_tab',
                        'name' => 'portieri_tab',
                        'label' => 'Portieri',
                        'type' => 'tab',
                        'placement' => 'top',
                    ),
                    array(
                        'key' => 'portieri',
                        'name' => 'portieri',
                        'type' => 'repeater',
                        'sub_fields' => array(
                            array(
                                'key' => 'portieri_foto',
                                'name' => 'portieri_foto',
                                'label' => 'Foto',
                                'type' => 'image',
                            ),
                            array(
                                'key' => 'portieri_nome',
                                'name' => 'portieri_nome',
                                'label' => 'Nome e Cognome',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'portieri_data_nascita',
                                'name' => 'portieri_data_nascita',
                                'label' => 'Data di Nascita',
                                'type' => 'date_picker',
                                'display_format' => 'd/m/Y',
                                'return_format' => 'd/m/Y',
                                'first_day' => 1
                            ),
                        ),
                    ),
                    array(
                        'key' => 'difensori_tab',
                        'name' => 'difensori_tab',
                        'label' => 'Difensori',
                        'type' => 'tab',
                        'placement' => 'top',
                    ),
                    array(
                        'key' => 'difensori',
                        'name' => 'difensori',
                        'type' => 'repeater',
                        'sub_fields' => array(
                            array(
                                'key' => 'difensori_foto',
                                'name' => 'difensori_foto',
                                'label' => 'Foto',
                                'type' => 'image',
                            ),
                            array(
                                'key' => 'difensori_nome',
                                'name' => 'difensori_nome',
                                'label' => 'Nome e Cognome',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'difensori_data_nascita',
                                'name' => 'difensori_data_nascita',
                                'label' => 'Data di Nascita',
                                'type' => 'date_picker',
                                'display_format' => 'd/m/Y',
                                'return_format' => 'd/m/Y',
                                'first_day' => 1
                            ),
                        ),
                    ),
                    array(
                        'key' => 'centrocampisti_tab',
                        'name' => 'centrocampisti_tab',
                        'label' => 'Centrocampisti',
                        'type' => 'tab',
                        'placement' => 'top',
                    ),
                    array(
                        'key' => 'centrocampisti',
                        'name' => 'centrocampisti',
                        'type' => 'repeater',
                        'sub_fields' => array(
                            array(
                                'key' => 'centrocampisti_foto',
                                'name' => 'centrocampisti_foto',
                                'label' => 'Foto',
                                'type' => 'image',
                            ),
                            array(
                                'key' => 'centrocampisti_nome',
                                'name' => 'centrocampisti_nome',
                                'label' => 'Nome e Cognome',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'centrocampisti_data_nascita',
                                'name' => 'centrocampisti_data_nascita',
                                'label' => 'Data di Nascita',
                                'type' => 'date_picker',
                                'display_format' => 'd/m/Y',
                                'return_format' => 'd/m/Y',
                                'first_day' => 1
                            ),
                        ),
                    ),
                    array(
                        'key' => 'attaccanti_tab',
                        'name' => 'attaccanti_tab',
                        'label' => 'Attaccanti',
                        'type' => 'tab',
                        'placement' => 'top',
                    ),
                    array(
                        'key' => 'attaccanti',
                        'name' => 'attaccanti',
                        'type' => 'repeater',
                        'sub_fields' => array(
                            array(
                                'key' => 'attaccanti_foto',
                                'name' => 'attaccanti_foto',
                                'label' => 'Foto',
                                'type' => 'image',
                            ),
                            array(
                                'key' => 'attaccanti_nome',
                                'name' => 'attaccanti_nome',
                                'label' => 'Nome e Cognome',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'attaccanti_data_nascita',
                                'name' => 'attaccanti_data_nascita',
                                'label' => 'Data di Nascita',
                                'type' => 'date_picker',
                                'display_format' => 'd/m/Y',
                                'return_format' => 'd/m/Y',
                                'first_day' => 1
                            ),
                        ),
                    ),
                    array(
                        'key' => 'staff_tab',
                        'name' => 'staff_tab',
                        'label' => 'Staff Tecnico',
                        'type' => 'tab',
                        'placement' => 'top',
                    ),
                    array(
                        'key' => 'staff',
                        'name' => 'staff',
                        'type' => 'repeater',
                        'sub_fields' => array(
                            array(
                                'key' => 'staff_foto',
                                'name' => 'staff_foto',
                                'label' => 'Foto',
                                'type' => 'image',
                            ),
                            array(
                                'key' => 'staff_nome',
                                'name' => 'staff_nome',
                                'label' => 'Nome e Cognome',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'staff_ruolo',
                                'name' => 'staff_ruolo',
                                'label' => 'Ruolo',
                                'type' => 'text',
                            ),
                        ),
                    ),
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

    ///////////////////////// Files Upload /////////////////////////

    acf_add_local_field_group(array(
        'key' => 'group_files',
        'title' => 'File Upload Fields',
        'fields' => array(
            array(
                'key' => 'files_tab',
                'name' => 'files_tab',
                'label' => 'Files Upload',
                'type' => 'tab',
                'placement' => 'left',
            ),
            array(
                'key' => 'files_section_title',
                'name' => 'files_section_title',
                'label' => 'Titolo della sezione',
                'type' => 'text',
            ),
            array(
                'key' => 'files_repeater',
                'name' => 'files_repeater',
                'label' => 'Files',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'file_title',
                        'name' => 'file_title',
                        'label' => 'Titolo',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'file_bg_image',
                        'name' => 'file_bg_image',
                        'label' => 'Immagine di sfondo',
                        'type' => 'image',
                    ),
                    array(
                        'key' => 'file_file',
                        'name' => 'file_file',
                        'label' => 'File da caricare',
                        'type' => 'file',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'file_btn_label',
                        'name' => 'file_btn_label',
                        'label' => 'Testo del bottone',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'files_color',
                'name' => 'files_color',
                'label' => 'Colore di sfondo',
                'type' => 'select',
                'choices' => array(
                    'default' => 'Default (Bianco)',
                    'light' => 'Light (Grigio chiaro)',
                    'dark' => 'Dark (Grigio scuro)',
                ),
                'default' => 'default',
                'instructions' => 'Selezionare il colore di sfondo',
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));

    ///////////////////////// Post Preview /////////////////////////
    acf_add_local_field_group(array(
        'key' => 'group_post_preview',
        'title' => 'Post Preview Fields',
        'fields' => array(
            array(
                'key' => 'post_preview_tab',
                'name' => 'post_preview_tab',
                'label' => 'Post Preview',
                'type' => 'tab',
                'placement' => 'left',
            ),
            array(
                'key' => 'post_preview_enable',
                'name' => 'post_preview_enable',
                'label' => 'Abilita blocco',
                'type' => 'true_false',
                'ui' => 1,
                'ui_on_text' => 'Si',
                'ui_off_text' => 'No',
                'default_value' => 0,
                'wrapper' => [
                    'width' => '20%'
                ]
            ),
            array(
                'key' => 'post_preview_category_show',
                'name' => 'post_preview_category_show',
                'label' => 'Visualizza categoria',
                'type' => 'true_false',
                'ui' => 1,
                'ui_on_text' => 'Si',
                'ui_off_text' => 'No',
                'default_value' => 1,
                'wrapper' => [
                    'width' => '20%'
                ]
            ),
            array(
                'key' => 'post_preview_view_all',
                'name' => 'post_preview_view_all',
                'label' => 'link "Mostra Tutto"',
                'type' => 'true_false',
                'ui' => 1,
                'ui_on_text' => 'Si',
                'ui_off_text' => 'No',
                'default_value' => 0,
                'wrapper' => [
                    'width' => '20%'
                ]
            ),
            array(
                'key' => 'post_preview_hide_description',
                'name' => 'post_preview_hide_description',
                'label' => 'Nascondi descrizione',
                'type' => 'true_false',
                'ui' => 1,
                'ui_on_text' => 'Si',
                'ui_off_text' => 'No',
                'default_value' => 0,
                'wrapper' => [
                    'width' => '20%'
                ]
            ),
            array(
                'key' => 'post_preview_read_more',
                'name' => 'post_preview_read_more',
                'label' => 'Abilita bottone "Read More"',
                'type' => 'true_false',
                'ui' => 1,
                'ui_on_text' => 'Si',
                'ui_off_text' => 'No',
                'default_value' => 1,
                'wrapper' => [
                    'width' => '20%'
                ]
            ),
            array(
                'key' => 'post_preview_bg_color',
                'name' => 'post_preview_bg_color',
                'label' => 'Colore di sfondo',
                'type' => 'select',
                'choices' => array(
                    'default' => 'Default (Bianco)',
                    'light' => 'Light (Grigio chiaro)',
                    'dark' => 'Dark (Grigio scuro)',
                ),
                'default' => 'default',
                'instructions' => 'Selezionare il colore di sfondo',
                'wrapper' => [
                    'width' => '50%'
                ],
            ),
            array(
                'key' => 'post_preview_title',
                'name' => 'post_preview_title',
                'label' => 'Titolo',
                'type' => 'text',
                'instructions' => 'Inserire il titolo della sezione',
                'wrapper' => [
                    'width' => '50%'
                ],
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
                'placeholder' => 'Tutte',
                'instructions' => 'Categoria/categorie dei post da visualizzare (lasciare vuoto per selezionare tutte le categorie)',
                'wrapper' => [
                    'width' => '50%'
                ]
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
                'key' => 'post_preview_autoplay',
                'name' => 'post_preview_autoplay',
                'label' => 'Autoplay',
                'type' => 'true_false',
                'ui' => 1,
                'ui_on_text' => 'Si',
                'ui_off_text' => 'No',
                'default_value' => 1,
                'instructions' => 'Abilita autoplay nel carosello',
                'wrapper' => [
                    'width' => '50%'
                ],
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'post_preview_layout',
                            'operator' => '==',
                            'value' => 'carousel'
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
                ),
                array(
                    'param' => 'page_type',
                    'operator' => '!=',
                    'value' => 'front_page',
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

    ///////////////////////// Classifiche Campionato /////////////////////////

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
                    'width' => '75%'
                ]
            ),
            array(
                'key' => 'prossima_partita_bg_color',
                'name' => 'prossima_partita_bg_color',
                'label' => 'Colore di sfondo',
                'type' => 'select',
                'choices' => array(
                    'default' => 'Default (Bianco)',
                    'light' => 'Light (Grigio chiaro)',
                    'dark' => 'Dark (Grigio scuro)',
                ),
                'default' => 'default',
                'instructions' => 'Selezionare il colore di sfondo',
                'wrapper' => [
                    'width' => '25%'
                ],
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
                'wrapper' => [
                    'width' => '75%'
                ]
            ),
            array(
                'key' => 'classifica_campionato_bg_color',
                'name' => 'classifica_campionato_bg_color',
                'label' => 'Colore di sfondo',
                'type' => 'select',
                'choices' => array(
                    'default' => 'Default (Bianco)',
                    'light' => 'Light (Grigio chiaro)',
                    'dark' => 'Dark (Grigio scuro)',
                ),
                'default' => 'default',
                'instructions' => 'Selezionare il colore di sfondo',
                'wrapper' => [
                    'width' => '25%'
                ],
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
                'wrapper' => [
                    'width' => '75%'
                ]
            ),
            array(
                'key' => 'classifica_marcatori_bg_color',
                'name' => 'classifica_marcatori_bg_color',
                'label' => 'Colore di sfondo',
                'type' => 'select',
                'choices' => array(
                    'default' => 'Default (Bianco)',
                    'light' => 'Light (Grigio chiaro)',
                    'dark' => 'Dark (Grigio scuro)',
                ),
                'default' => 'default',
                'instructions' => 'Selezionare il colore di sfondo',
                'wrapper' => [
                    'width' => '25%'
                ],
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
                'wrapper' => [
                    'width' => '75%'
                ]
            ),
            array(
                'key' => 'risultati_bg_color',
                'name' => 'risultati_bg_color',
                'label' => 'Colore di sfondo',
                'type' => 'select',
                'choices' => array(
                    'default' => 'Default (Bianco)',
                    'light' => 'Light (Grigio chiaro)',
                    'dark' => 'Dark (Grigio scuro)',
                ),
                'default' => 'default',
                'instructions' => 'Selezionare il colore di sfondo',
                'wrapper' => [
                    'width' => '25%'
                ],
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

    ///////////////////////// Classifiche Coppa /////////////////////////

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
                'wrapper' => [
                    'width' => '75%'
                ]
            ),
            array(
                'key' => 'prossima_partita_coppa',
                'name' => 'prossima_partita_coppa',
                'label' => 'Prossima Partita',
                'instructions' => 'Inserire l\'intero codice del widget (iframe)',
                'type' => 'wysiwyg',
                'wrapper' => [
                    'width' => '75%'
                ]
            ),
            array(
                'key' => 'prossima_partita_coppa_bg_color',
                'name' => 'prossima_partita_coppa_bg_color',
                'label' => 'Colore di sfondo',
                'type' => 'select',
                'choices' => array(
                    'default' => 'Default (Bianco)',
                    'light' => 'Light (Grigio chiaro)',
                    'dark' => 'Dark (Grigio scuro)',
                ),
                'default' => 'default',
                'instructions' => 'Selezionare il colore di sfondo',
                'wrapper' => [
                    'width' => '25%'
                ],
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
                'wrapper' => [
                    'width' => '75%'
                ]
            ),
            array(
                'key' => 'classifica_coppa_bg_color',
                'name' => 'classifica_coppa_bg_color',
                'label' => 'Colore di sfondo',
                'type' => 'select',
                'choices' => array(
                    'default' => 'Default (Bianco)',
                    'light' => 'Light (Grigio chiaro)',
                    'dark' => 'Dark (Grigio scuro)',
                ),
                'default' => 'default',
                'instructions' => 'Selezionare il colore di sfondo',
                'wrapper' => [
                    'width' => '25%'
                ],
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
                'wrapper' => [
                    'width' => '75%'
                ]
            ),
            array(
                'key' => 'classifica_marcatori_coppa_bg_color',
                'name' => 'classifica_marcatori_coppa_bg_color',
                'label' => 'Colore di sfondo',
                'type' => 'select',
                'choices' => array(
                    'default' => 'Default (Bianco)',
                    'light' => 'Light (Grigio chiaro)',
                    'dark' => 'Dark (Grigio scuro)',
                ),
                'default' => 'default',
                'instructions' => 'Selezionare il colore di sfondo',
                'wrapper' => [
                    'width' => '25%'
                ],
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
                'wrapper' => [
                    'width' => '75%'
                ]
            ),
            array(
                'key' => 'risultati_coppa_bg_color',
                'name' => 'risultati_coppa_bg_color',
                'label' => 'Colore di sfondo',
                'type' => 'select',
                'choices' => array(
                    'default' => 'Default (Bianco)',
                    'light' => 'Light (Grigio chiaro)',
                    'dark' => 'Dark (Grigio scuro)',
                ),
                'default' => 'default',
                'instructions' => 'Selezionare il colore di sfondo',
                'wrapper' => [
                    'width' => '25%'
                ],
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


///////////////////////// Gallery Album /////////////////////////

acf_add_local_field_group(array(
    'key' => 'group_gallery_album',
    'title' => 'Gallery Album Fields',
    'fields' => array(
        array(
            'key' => 'gallery_album_gallery',
            'label' => 'Gallery',
            'name' => 'gallery_album_gallery',
            'type' => 'gallery',
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
));
