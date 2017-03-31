<?php
/*
Plugin Name: Frequently Asked Questions
Plugin URI: http://damsonsfutureplanning.co.uk
Description: Declares a plugin that will create a custom post type displaying frequently asked questions
Version: 1.0
Author: Alastair Shone
Author URI: http://alastairshone.com
License: GPLv2
*/

add_action( 'init', 'create_faq' );

function create_faq() {
    register_post_type( 'faq',
        array(
            'labels' => array(
                'name' => 'FAQs',
                'singular_name' => 'faq',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New FAQ',
                'edit' => 'Edit',
                'edit_item' => 'Edit FAQ',
                'new_item' => 'New FAQ',
                'view' => 'View',
                'view_item' => 'View FAQ',
                'search_items' => 'Search FAQs',
                'not_found' => 'No FAQs found',
                'not_found_in_trash' => 'No FAQs found in Trash',
                'parent' => 'Parent FAQ'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array( '' ),
            'menu_icon' => 'dashicons-editor-help',
            'has_archive' => true
        )
    );
}

function create_faq_taxonomies() {
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );

    $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'faqs' ),
    );

    register_taxonomy( 'faq_categories', array( 'faq' ), $args );
}
add_action( 'init', 'create_faq_taxonomies', 0 );

?>