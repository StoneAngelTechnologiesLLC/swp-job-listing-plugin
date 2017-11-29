<?php
/**
* Plugin Name: GoogleAnalyticsLink
* Plugin URI: http://showit.co
* Description:  adds a link to Google Analytics onto the admin bar menu 
* Author: John Pietrangelo
* Author URI: http://showit.co
* Version: 1.0
* License: GPLv2
**/
//custom-function   *swp = unique-prefix(showit wordpress)
function swp_add_google_link()
{
	//wp-global Object-variable
	global $wp_admin_bar;

	/*
	// html <pre>-tag prints the 'var_dump' returned data in a JSON format
	echo '<pre>';

	//'prints all the object's and their properties held within the argument-variable(also an object) and the values the properties hold
	var_dump($wp_admin_bar);
    
    // closing the html <pre>-tag
	echo '</pre>';
	*/

    // declaring and initailizing an array variable.  * the symbol '=>' is used to connect 'key/value' pairs
    $args = array( 'id' => 'google_analytics' , 'title' => 'Google Analytics', 'href' => 'http://google.com/analytics');

    //adds the add_menu's(wp_admin_bar-method) return (which passes the '$args'-variable throught its parameter) to the'$wp_admin_bar'-Object's held nodes(Array of Objects).
	$wp_admin_bar->add_menu($args);
	
}

//wp-function (String-$hook->time preceeding admin_bar is rendered, Function->$function_to_add *custom-function)
add_action('wp_before_admin_bar_render', 'swp_add_google_link');