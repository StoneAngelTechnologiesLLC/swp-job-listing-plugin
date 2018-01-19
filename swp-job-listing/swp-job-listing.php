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
//if(!defined('ABSPATH'))
//{
//    exit;
//}

//variable holding direct path to the directory which contains 'this' file.
$dir = plugin_dir_path(__FILE__);


//links a 'manditory' file (in order for app to run)
require_once ($dir . 'swp-job-cpt.php');
require_once ($dir . 'swp-job-render-admin.php');
require_once ($dir . 'swp-custom-fields-for-jobs.php');



//enqueue styles & scripts. How to upload JavaScript and CSS files.
function swp_admin_enqueue_scripts()
{
	//to declare Global-variables

	global $pagenow, $typenow;

   // hidden behind Admin-Bar, decrease screen-size, to make output visable.

	//var_dump($pagenow);
	//var_dump($typenow);

	//$screen = get_current_screen();
	//var_dump($screen -> post_type);


   //To see variable value on right side of page
   //echo '<h1 style = "color: blue; float: right;">'.$typenow.' '.$pagenow.'</h1><br/>';
	

	//Conditional Statement 1.On post-edit screen 2.On jobs post-type

	if (($pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'job' )
	{
		/*
		wp_enqueue_style()
		Registers the style if source provided (does NOT overwrite) and enqueues.

				(Name of the stylesheet, URL of the stylesheet, Array of registered stylesheet handles this stylesheet depends on, String specifying stylesheet version number, The media for which this stylesheet has been defined. Accepts media types like 'all', 'print' and 'screen', or media queries like '(orientation: portrait)' and '(max-width: 640px)'.)
	
		wp_enqueue_style( string $handle, string $src = '', array $deps = array(), string|bool|null $ver = false, string $media = 'all' )
		*/
		wp_enqueue_style('swp-admin', plugins_url('css/admin-jobs.css', __FILE__));

		/*
		(Name of the script,Full URL of the script,registered script handles this script depends on,String specifying script version number,Whether to enqueue the script before </body> instead of in the <head>)

		wp_enqueue_script( string $handle, string $src = '', array $deps = array(), string|bool|null $ver = false, bool $in_footer = false )
		*/
		wp_enqueue_script('swp-job-js', plugins_url('js/admin-jobs.js', __FILE__), array('jquery', 'jquery-ui-datepicker'), '20180109', true);
		
		//wp_enqueue_style('jquery-style','http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');

		wp_enqueue_script('swp-custom-quicktags',plugins_url('js/swp-quicktags.js', __FILE__), array('quicktags'), '20180109', true);
	}

}

// Because these files will only be loaded in the admin, the hook 'admin_enque_scripts', will trigger function call(at the time of that 'action').

//If the scripts were to be used on the front end, a different hook would be used.
add_action('admin_enqueue_scripts','swp_admin_enqueue_scripts');