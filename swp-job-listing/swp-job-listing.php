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
//customizing post-type
//register_post_type( $post_type, $args );

function swp_register_post_type()
{
    //variable
    $args = array( 'public' => true, 'label' => 'Job Listing');

    //register_post_type( $post_type, $args );
    register_post_type( 'jobs', $args );
}

add_action('init','swp_register_post_type');