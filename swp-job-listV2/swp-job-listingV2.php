<?php
/**
 * Plugin Name: SWP Job Listing
 * Plugin URI: http://showit.co
 * Description: This plugin allows you to add a single job listing section to a WordPress website.
 * Author: StoneAngel Technologies
 *Version: 0.0.1
 *License: GPLv2
 */

//Exit if accessed directly
//if( ! defined('ABSPATH'))
//{
//   exit;
//}


//function which customizes a post-type
function swp_register_post_type()
{
    //variable declarations

    $singular = 'Job Listing';

    $plural = 'Job Listings';

    //Associative Array (key-value pairs)
    $labels = array
    (
        'name'               => $plural,
        'singular_name'      => $singular,
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New ' . $singular,
        'edit'               => 'Edit',
        'edit_item'          => 'Edit ' . $singular,
        'new_item'           => 'New ' . $singular,
        'view'               => 'View ' . $singular,
        'view_item'          => 'View ' . $singular,
        'search_term'        => 'Search ' . $plural,
        'parent'             => 'Parent' . $singular,
        'not_found'          => 'No ' . $plural . ' found',
        'not_found_in_trash' => 'No ' . $plural . ' in Trash',
    );



    $args = array
    (
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'show_in_menu'        => true,
        'show_ui'             => true,
        'menu_position'       => 10,
        'menu_icon'           => 'dashicons-businessman',
        'can_export'          => true,
        'delete_with_user'    => false,
        'hierarchical'        => false,
        'has_archive'         => true,
        'query_var'           => true,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
     // 'capabilities'        => array(),
        'rewrite'             => array
        (
            'slug'                => 'jobs',
            'with_front'          => true,
            'pages'               => true,
            'feeds'               => true,
        ),
        'supports'            => array
        (
            'title',
            'editor',
            'author',
            'custom-fields',
        )
    );

    //Below is the function to register a custom post-type
    //register_post_type( name of post-type,  );
    register_post_type( 'jobs', $args );
}
// 'init'-hook = Fires after WordPress has finished loading but before any headers are sent.
//'wp-add on action'-function (triggering operation, responding function)
add_action('init','swp_register_post_type');