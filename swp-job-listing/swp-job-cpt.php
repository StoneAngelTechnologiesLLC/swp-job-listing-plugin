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
//													** variable declarations **
  //The plural form of the name of the post-type.  
    $singular = 'Job Listing';

  //The singular form of the name of the post-type.
    $plural = 'Job Listings';

  //Associative Array (key-value pairs)
    $labels = array
    (
        //The singular form of the name of the post-type.
        'name'               => $plural,

        //The singular form of the name of the post-type.
        'singular_name'      => $singular,

        //The admin-menu item for adding a new post.
        'add_new'            => 'Add New Listing',

        //The header shown when creating a new post.
        'add_new_item'       => 'Please Add New '.$singular.' Here',

        //The menu item for editing posts.
        'edit'               => 'Edit',

        //The header shown when editing a post.
        'edit_item'          => 'Edit This FUBAR ' . $singular,

        //Shown in the favorites menu in the admin header
        'new_item'           => 'Favorites-Menu: New ' . $singular,

        //Used as text in a link to view the post
        'view'               => 'View ' . $singular,

        //Shown alongside the permalink on the edit post screen
        'view_item'          => 'View ' . $singular,

        //Button text for the search box on the edit posts screen
        'search_term'        => 'Search ' . $plural,

        //Used as a label for a parent post on the edit posts screen 
        //Only useful for hierarchical post types
        'parent'             => 'Parent' . $singular,

        // Default is No posts found/No pages found
        'not_found'          => 'No ' . $plural . ' found',

        //Text to display when no posts are in the trash
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
        // Do you want this post-type to be part of the WP-loop?
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
        'menu_position'       => 6,

        //The url to the icon to be used for this menu or the name of the icon from the iconfon
        'menu_icon'           => 'dashicons-businessman',

        //will show-up with exportable items
        'can_export'          => true,

        //when deleting a user-account, do you want their previous postings of 'this' post-type
        // to be deleted along with them.
        'delete_with_user'    => false,

        //do yoe want this post-type to act like a page(true) or act like a post(false)
        //If you set it to true, your posts will behave like pages in WordPress.
        'hierarchical'        => false,

        //(boolean or string) (optional) Enables post-type archive-page.
        // Will use $post_type as archive-slug by default.
        'has_archive'         => true,

        //The query_var argument allows you to control the query variable used to get posts of this type. For example, you could use it with the query_posts() function or WP_Query class. 
        //This will default to the name of your taxonomy.
        //changes url after '?', default uses post-type's slug
        'query_var'           => true,

        //declares who can have access to modify this custom register-post-type
        //The capability_type argument is another catchall argument for several more specific arguments and defaults to post. It allows you to define a custom set of capabilities, which are permissions to edit, create, and read your custom post type. 

        /*
        If you just want to keep the same permissions you have with blog posts, leave this at the default. Otherwise, you can either set capability_type to something custom or define each specific capability in the capabilities array.
        */
        'capability_type'     => 'post',

        'map_meta_cap'        => true,
/*
        'capabilities'        => array
        (
        	//Whether someone can create and edit a specific post of this post-type
        	'edit_post' => 'edit_'.$singular ,

        	//Capability that allows editing posts of this post type
        	'edit_posts' => 'edit_'.$plural,

        	//Capability that allows editing of others posts
        	'edit_others_posts' => 'edit_others_'.$plural,

        	//Capability to grant publishing of these types of posts
        	'publish_posts' => 'publish_'.$plural,

        	//Capability that controls reading of a specific post of this post-type
        	'read_post' => 'read_'.$singular,

        	//Capability to allow reading of private posts
        	'read_private_posts' => 'read_private_'.$plural,

        	//Capability that grants the privelege of deleting posts
        	'delete_post' => 'delete_'.$singular,
        ),*/
        //(boolean or array) (optional) Triggers the handling of rewrites for this post-type. To prevent rewrites, set to false.
        //Default: true and use $post_type as slug
        'rewrite'             => array
        (// sets pre-perm-links

        	//string Customize the permalink structure slug
            'slug'                => 'jobs',

            //Should the permalink structure be prepended with the front base. (example: if your permalink structure is /blog/, then your links will be: false->/news/, true->/blog/news/). Defaults to true
            'with_front'          => true,

            //Should the permalink structure provide for pagination. Defaults to true
            'pages'               => true,

            //Should a feed permalink structure be built for this post type. Defaults to has_archive value.
            'feeds'               => false,
        ),

        /*
         supports(array/boolean) (optional) An alias for calling add_post_type_support() directly.
         As of 3.5, boolean false can be passed as value instead of an array to prevent default (title and editor) behavior.
         Default: title and editor
         */

        'supports'           => array
        (
           'title',
           
//Not using WP's supports, instead app uses custom meta-box, which holds multiple custom fields. The code for these custom elements are held in the 'swp-custom-fields-for-jobs.php' file.
           //'editor', //(content)
           //'author',
           //'custom-fields',
           //'thumbnail', //(featured image, current theme must also support post-thumbnails)
           
           //'excerpt',
           //'trackbacks',
           //'comments', //(also will see comment count balloon on edit screen)
           
           //'revisons', //(will store revisions)
           //'page-attributes',//(menu order, hierarchical must be true to show Parent option)
           //'post-formats'//(add post formats)
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

        // name for one instance of this post type.
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
    //               (taxonomy-name, object_type(custom_post_type), arguments)
    register_taxonomy('location','job',$args);
}

add_action('init', 'swp_register_taxonomy');