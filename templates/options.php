<?php

function site_options_add_local_field_groups()
{
    acf_add_local_field_group(array(
        'key' => 'group_site_options',
        'title' => 'Site Options Fields',
        'fields' => array(
            array(
                'key' => 'main_logo_tab',
                'name' => 'main_logo_tab',
                'label' => 'Main Logo',
                'type' => 'tab',
                'placement' => 'left'
            ),
            array(
                'key' => 'main_logo',
                'name' => 'main_logo',
                'label' => 'Logo Principale del Sito',
                'type' => 'image',
                'wrapper' => [
                    'width' => '50%'
                ]
            ),
            array(
                'key' => 'main_logo_height',
                'name' => 'main_logo_height',
                'label' => 'Dimensione del logo',
                'type' => 'range',
                'default_value' => '60',
                'min' => '40',
                'max' => '100',
                'step' => '5',
                'wrapper' => [
                    'width' => '50%'
                ]
            ),
            array(
                'key' => 'contacts_tab',
                'name' => 'contacts_tab',
                'label' => 'Contatti',
                'type' => 'tab',
                'placement' => 'left'
            ),
            array(
                'key' => 'address_sede',
                'name' => 'field_address_sede',
                'label' => 'Indirizzo Sede',
                'type' => 'text',
            ),
            array(
                'key' => 'stadio',
                'name' => 'field_stadio',
                'label' => 'Stadio',
                'instructiuons' => 'Inserire il nome e l\'indirizzo dello stadio',
                'type' => 'text',
            ),
            array(
                'key' => 'altri_campi',
                'name' => 'field_altri_campi',
                'label' => 'Altri Campi di Gioco',
                'type' => 'repeater',
                'button_label' => 'Aggiungi Campo',
                'sub_fields' => array(
                    array(
                        'key' => 'altro_campo',
                        'name' => 'field_altro_campo',
                        'label' => 'Altro Campo di Gioco',
                        'instructiuons' => 'Inserire il nome e l\'indirizzo dello stadio',
                        'type' => 'text',
                    )
                )
            ),
            array(
                'key' => 'phone',
                'name' => 'field_phone',
                'label' => 'Telefono',
                'type' => 'text',
            ),
            array(
                'key' => 'fax',
                'name' => 'field_fax',
                'label' => 'Fax',
                'type' => 'text',
            ),
            array(
                'key' => 'email',
                'name' => 'field_email',
                'label' => 'Email',
                'type' => 'email',
            ),
            array(
                'key' => 'sponsor_tab',
                'name' => 'sponsor_tab',
                'label' => 'Sponsor',
                'type' => 'tab',
                'placement' => 'left'
            ),
            array(
                'key' => 'main_sponsor_group',
                'name' => 'main_sponsor_group',
                'label' => 'Main Sponsor',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'main_sponsor_section_title',
                        'name' => 'main_sponsor_section_title',
                        'label' => 'Titolo della Sezione Main Sponsor',
                        'placeholder' => 'Main Sponsor',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'main_sponsor_logo',
                        'name' => 'main_sponsor_logo',
                        'label' => 'Logo del Main Sponsor',
                        'type' => 'image',
                    ),
                    array(
                        'key' => 'main_sponsor_link',
                        'name' => 'main_sponsor_link',
                        'label' => 'Link del Main Sponsor',
                        'instructions' => 'Insrire l\'url del sito dello sponsor (es. https://www.impresaedilepalaminmaurosrl.it)',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'official_sponsor_group',
                'name' => 'official_sponsor_group',
                'label' => 'Official Sponsor',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'official_sponsor_section_title',
                        'name' => 'official_sponsor_section_title',
                        'label' => 'Titolo della Sezione Official Sponsor',
                        'placeholder' => 'Official Sponsor',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'official_sponsor',
                        'name' => 'official_sponsor',
                        'label' => 'Official Sponsor',
                        'type' => 'repeater',
                        'sub_fields' => array(
                            array(
                                'key' => 'official_sponsor_logo',
                                'name' => 'official_sponsor_logo',
                                'label' => 'Logo dello Sponsor',
                                'type' => 'image',
                            ),
                            array(
                                'key' => 'official_sponsor_link',
                                'name' => 'official_sponsor_link',
                                'label' => 'Link dello Sponsor',
                                'instructions' => 'Insrire l\'url del sito dello sponsor (es. https://www.impresaedilepalaminmaurosrl.it/)',
                                'type' => 'text',
                            ),
                        ),
                    ),
                )
            ),
            array(
                'key' => 'official_partners_group',
                'name' => 'official_partners_group',
                'label' => 'Official Partners',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'official_partners_section_title',
                        'name' => 'official_partners_section_title',
                        'label' => 'Titolo della Sezione Official Partners',
                        'placeholder' => 'Official Partners',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'official_partners',
                        'name' => 'official_partners',
                        'label' => 'Official Partners',
                        'type' => 'repeater',
                        'sub_fields' => array(
                            array(
                                'key' => 'official_partner_logo',
                                'name' => 'official_partner_logo',
                                'label' => 'Logo del Partner',
                                'type' => 'image',
                            ),
                            array(
                                'key' => 'official_partner_link',
                                'name' => 'official_partner_link',
                                'label' => 'Link del Partner',
                                'instructions' => 'Insrire l\'url del sito del Partner (es. https://www.impresaedilepalaminmaurosrl.it/)',
                                'type' => 'text',
                            ),
                        ),
                    ),
                )
            ),
        ),

        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'options'
                )
            )
        ),
    ));
}

add_action('acf/init', 'site_options_add_local_field_groups');
