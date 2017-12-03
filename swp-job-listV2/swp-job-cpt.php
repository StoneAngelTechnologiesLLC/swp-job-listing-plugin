<?php


/*
                                *** To Create or Modify a Register-Post-Type ***

You can use this type of function in themes and plugins.
However, if you use it in a theme, your post-type will disappear from the admin if a user switches away from your theme.
If you want to keep your changes e.g. post type, even if you switch between themes -> (*** Codex-Ref: Must Use Plugins)
------------------------------------------------------------------------------------------------------------------------

                                                    Taxonomies

When registering a post type, always register your taxonomies using the taxonomies argument.
If you don't, the taxonomies and post-type will not be recognized as connected, when using filters such as parse_query
or pre_get_posts. This can lead to unexpected results and failures.

Even if you register a taxonomy while creating the post-type, you must still explicitly register and define the taxonomy
using 'register_taxonomy()'.
------------------------------------------------------------------------------------------------------------------------

                                                 Reserved Post-Types

The following post-types are reserved and used by WordPress already:

post
page
attachment
revision
nav_menu_item
custom_css
customize_changeset

In addition, the following post types should not be used as they interfere with other WordPress functions.

action
author
order
theme

/*
                                                    Usage

<?php register_post_type( $post_type, $args ); ?>

                                                  Parameters

$post_type:  (string) Post-type's name (maximum of 20 characters, it cannot contain capital letters or spaces)

$args: (array) An array of arguments.

*/
//function which customizes a post-type
function swp_job_listing_post_type()
{
    //variable declarations

    $singular = 'Job Listing';

    $plural = 'Job Listings';

    //Associative Array (key-value pairs)
    $labels = array
    (
        //general name for the post type, usually plural.
        // The same and overridden by $post_type_object->label.
        'name'               => $plural,

        // name for one object of this post type.
        'singular_name'      => $singular,

        //the add new text. The default is "Add New" for both hierarchical and non-hierarchical post types.
        // When internationalizing this string
        'add_new'            => 'Add New',

        // Default is Add New Post/Add New Page.
        'add_new_item'       => 'Add New ' . $singular,
        'edit'               => 'Edit',
        //labels below use concatenation
        'edit_item'          => 'Edit ' . $singular,
        'new_item'           => 'New ' . $singular,
        'view'               => 'View ' . $singular,
        'view_item'          => 'View ' . $singular,
        'search_term'        => 'Search ' . $plural,
        'parent'             => 'Parent' . $singular,
        // Default is No posts found/No pages found
        'not_found'          => 'No ' . $plural . ' found',
        'not_found_in_trash' => 'No ' . $plural . ' in Trash',

        //Above, the first default value is for non-hierarchical post types (like posts)
        // and the second one is for hierarchical post types (like pages).
    );

    //Below are the 'register_post_type()'-function's arguments
    //Associative Array (key-value pairs)
    $args = array
    (
        //value-pairs declared from above.
        'labels'              => $labels,

        //(boolean) (optional) Controls how the type is visible to authors (show_in_nav_menus, show_ui)
        // and readers (exclude_from_search, publicly_queryable).
        'public'              => true,

        //boolean) (optional) Whether queries can be performed on the front end as part of parse_request()
        // Do you want this post-type to be part of the WP-loop
        'publicly_queryable'  => true,

        //(boolean) (importance) Whether to exclude posts with this post type from front end search results.
        //'true' - site/?s=search-term will not include posts of this post type.
        //'false' - site/?s=search-term will include posts of this post type.
        'exclude_from_search' => false,

        //(boolean) (optional) Whether post_type is available for selection in navigation menus
        'show_in_nav_menus'   => true,

        //(boolean) (optional) Whether to make this post type available in the WordPress admin bar.
        //Default: value of the show_in_menu argument
        'show_in_admin_bar'   => true,

        //(boolean or string) (optional) Where to show the post type in the admin menu. show_ui must be true.
        'show_in_menu'        => true,

        //(boolean) (optional) Whether to generate a default UI for managing this post type in the admin.
        //built-in post types, such as post and page, are intentionally set to false
        'show_ui'             => true,

        //The position in the menu order the post type should appear. show_in_menu must be true.
        'menu_position'       => 10,

        //The url to the icon to be used for this menu or the name of the icon from the iconfon
        'menu_icon'           => 'dashicons-businessman',

        //will show-up with exportable items
        'can_export'          => true,

        //when deleting a user-account, do you want their previous postings of 'this' post-type
        // to be deleted along with them.
        'delete_with_user'    => false,

        //do yoe want this post-type to act like a page(true) or act like a post(false)
        'hierarchical'        => false,

        //(boolean or string) (optional) Enables post-type archive-page.
        // Will use $post_type as archive-slug by default.
        'has_archive'         => true,

        //changes url after '?' default uses post-type's slug
        'query_var'           => true,

        //declares who can have access to modify this custom register-post-type
        'capability_type'     => 'post',
        
        'map_meta_cap'        => true,
        // 'capabilities'        => array(),
        //(boolean or array) (optional) Triggers the handling of rewrites for this post type. To prevent rewrites, set to false.
        //Default: true and use $post_type as slug
        'rewrite'             => array
        (// sets pre-perm-links
            'slug'                => 'jobs',
            'with_front'          => true,
            'pages'               => true,
            'feeds'               => false,
        ),

        /*
         supports(array/boolean) (optional) An alias for calling add_post_type_support() directly.
         As of 3.5, boolean false can be passed as value instead of an array to prevent default (title and editor) behavior.
         Default: title and editor
         */
        'supports'           => array
        (
            'title'//,
           // 'editor',
           // 'author',
           // 'custom-fields',
           // 'thumbnail',
        )
    );

    //Below is the function to register a custom post-type
    //register_post_type( name of post-type(slug), function's arguments );
    register_post_type( 'job', $args );
}

/*
Every 'register_post_type'-function should only be 'called' through the 'init'-'action-hook'.
Any 'register-post-type' will not work if called before the 'init'-operation,
and the operations of the 'register-post-type' will work incorrectly if called later.
The 'init'-'action-hook' fires after WordPress has finished loading but before any headers are sent.
*/

//'WP's add_action()-function (triggering operation, fires responding function)
add_action            (       'init'       ,  'swp_job_listing_post_type');

function swp_register_taxonomy()
{
    //variable declarations

    $singular = 'Location';

    $plural = 'Locations';

    $labels = array
    (
        //general name for the post type, usually plural.
        // The same and overridden by $post_type_object->label.
        'name'                            => $plural,

        // name for one object of this post type.
        'singular_name'                   => $singular,

        'search_items'                    => 'Search ' . $plural,

        'popular_items'                   => 'Popular ' . $plural,

        'all_items'                       => 'All ' . $plural,

        'parent_item'                     => null,

        'parent_item_colon'               => null,

        'edit_item'                       => 'Edit ' . $singular,

        'update_item'                     => 'Update ' . $singular,

        'add_new_item'                    => 'Add New ' . $singular,

        'add_item_name'                   => 'Add New ' . $singular,

        'new_item_name'                   => 'New ' . $singular . ' Name',

        'separate_items_with_commas'      => 'Separate ' . $plural . ' with commas',

        'add_or_remove_items'             => 'Add or remove ' . $plural,

        'choose_from_not_used'            => 'Choose from the most used ' . $plural,

        'not_found'                       => 'No ' . $plural . ' found',

        'menu_name'                       => $plural,

        // Above, the first default value is for non-hierarchical post types (like posts)
        // and the second one is for hierarchical post types (like pages).
    );

    $args = array
    (
        'hierarchical'           => true,
        'labels'                 => $labels,
        'show_ui'                => true,
        'show_admin_column'      => true,
        'update_count_callback'  => '_update_post_term_count',
        'query_var'              => true,
        'rewrite'                => array( 'slug' => 'location'),
    );
    //               (taxonomy-name, of register_post_type, arguments)
    register_taxonomy('location','job',$args);
}

add_action('init', 'swp_register_taxonomy');

 