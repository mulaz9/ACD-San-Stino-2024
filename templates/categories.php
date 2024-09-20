<?php


function page_categories()
{
    $args = array(
        'labels' => array(
            'name' => 'Page Categories',
            'singular_name' => 'Page Category',
            'menu_name' => 'Categories',
            'all_items' => 'All Categories',
            'edit_item' => 'Edit Category',
            'view_item' => 'View Category',
            'update_item' => 'Update Category',
            'add_new_item' => 'Add New Category',
            'new_item_name' => 'New Category Name',
            'parent_item' => 'Parent Category',
            'parent_item_colon' => 'Parent Category:',
            'search_items' => 'Search Categories',
            'not_found' => 'No categories found',
            'no_terms' => 'No categories',
            'filter_by_item' => 'Filter by category',
            'items_list_navigation' => 'Categories list navigation',
            'items_list' => 'Categories list',
            'back_to_items' => '← Go to categories',
            'item_link' => 'Category Link',
            'item_link_description' => 'A link to a category',
        ),
        'public' => true,
        'hierarchical' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
    );

    register_taxonomy('page-category', array(
        0 => 'page',
    ), $args);
}

add_action('init', 'page_categories', 0);
