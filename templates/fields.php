<?php

function my_acf_add_local_field_groups()
{

    acf_add_local_field_group(array(
        'key' => 'group_slideshow',
        'fields' => array(
            array(
                'key' => 'slideshow_gallery_field',
                'label' => 'Slideshow',
                'name' => 'slideshow',
                'type' => 'gallery',
                'max' => 8,
                'instructions' => 'Risoluzione raccomandata: 2200x1200 px',
                'wrapper' => [
                    'width' => '50%'
                ]
            ),
            array(
                'key' => 'slideshow_height',
                'label' => 'Slideshow Height',
                'name' => 'slideshow_height',
                'instructions' => 'Selezionare l\'altezza dello slideshow',
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
    ));
}

add_action('acf/init', 'my_acf_add_local_field_groups');
