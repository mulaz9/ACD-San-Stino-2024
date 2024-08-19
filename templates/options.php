<?php

function site_options_add_local_field_groups()
{
    acf_add_local_field_group(array(
        'key' => 'group_site_options',
        'title' => 'Site Options Fields',
        'fields' => array(
            // array(
            //     'key' => 'tab_test',
            //     'name' => '',
            //     'label' => 'Tab Test',
            //     'type' => 'tab',
            //     'placement' => 'left'
            // ),
            array(
                'key' => 'main_logo',
                'name' => 'main_logo',
                'label' => 'Site Main Logo',
                'type' => 'image',
                'wrapper' => [
                    'width' => '50%'
                ]
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
