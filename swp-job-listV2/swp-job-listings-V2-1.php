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
//  exit;
//}

//full path to 'this' files directory 
$dir = plugin_dir_path(__FILE__);

//var_dump($dir);
//die();

//To link a seperate files (swp-job-cpt.php) to 'this' (swp-job-listings-V2-1.php) file, which is held within 'this' directory 
require_once ( $dir . 'swp-job-cpt.php' );
require_once ( $dir . 'swp-job-render-admin.php' );
require_once ( $dir . 'swp-job-fields.php' );