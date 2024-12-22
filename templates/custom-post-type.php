<?php

add_action('init', 'gallery_album_post_type');

function gallery_album_post_type()
{
    register_post_type('gallery-album', array(
        'labels' => array(
            'name' => 'Gallery Albums',
            'singular_name' => 'Gallery Album',
            'menu_name' => 'Gallery Albums',
            'all_items' => 'All Gallery Albums',
            'edit_item' => 'Edit Gallery Album',
            'view_item' => 'View Gallery Album',
            'view_items' => 'View Gallery Albums',
            'add_new_item' => 'Add New Gallery Album',
            'add_new' => 'Add New Gallery Album',
            'new_item' => 'New Gallery Album',
            'parent_item_colon' => 'Parent Gallery Album:',
            'search_items' => 'Search Gallery Albums',
            'not_found' => 'No gallery albums found',
            'not_found_in_trash' => 'No gallery albums found in Trash',
            'archives' => 'Gallery Album Archives',
            'attributes' => 'Gallery Album Attributes',
            'insert_into_item' => 'Insert into gallery album',
            'uploaded_to_this_item' => 'Uploaded to this gallery album',
            'filter_items_list' => 'Filter gallery albums list',
            'filter_by_date' => 'Filter gallery albums by date',
            'items_list_navigation' => 'Gallery Albums list navigation',
            'items_list' => 'Gallery Albums list',
            'item_published' => 'Gallery Album published.',
            'item_published_privately' => 'Gallery Album published privately.',
            'item_reverted_to_draft' => 'Gallery Album reverted to draft.',
            'item_scheduled' => 'Gallery Album scheduled.',
            'item_updated' => 'Gallery Album updated.',
            'item_link' => 'Gallery Album Link',
            'item_link_description' => 'A link to a gallery album.',
        ),
        'public' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array(
            0 => 'title',
            1 => 'editor',
            2 => 'thumbnail',
            3 => 'custom-fields',
            4 => 'page-attributes'
        ),
        'delete_with_user' => false,
    ));
}
