<?php
/**
* Plugin Name: Awesomeizer
* Plugin URI: http://showit.co
* Description:  adds an admin menu to the WordPress settings, replaces the word "good" in any post content or title with "awesome" and adds "Be excellent to each other!" to the end of all post content
* Author: John Pietrangelo
* Author URI: http://showit.co
* Version: 1.0
* License: GPLv2
**/



//------------------------------------function calls----------------------------------------------------

add_action( 'admin_menu', 'swp_awesomeizer_plugin_menu' );



add_filter('the_content', 'swp_filter_posting_content_test');

	add_filter('the_content', 'swp_filter_posting_content');

	add_filter('the_content','swp_good_to_awesome');

	add_filter('the_title','swp_good_to_awesome');


//-------------------------------------plugin functions-------------------------------------------------

function swp_awesomeizer_plugin_menu() 
{
	                    //function
	add_options_page( 'Awesomeizer Plugin Options', 'Awesomeizer', 'manage_options', 'Awesomeizer-unique-identifier', 'swp_awesomeizer_plugin_options' );
}

function swp_awesomeizer_plugin_options() 
{
	if ( !current_user_can( 'manage_options' ) )  
	{
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	echo '<h1>Effects of the Awesomeizer Plugin</h1><br>';

	echo '<div id="ckBxInfo">';

	echo '<p>When box is checked, the word "good" in any post content or title will be replaced with the word "awesome"</p>';

	echo '<p>The sentance,"Be excellent to each other!" will also be added to the end of the content on all posts.</p>';

	echo '</div>';

	echo '<form action="">';
    echo '<p>Awesomeizer Checkbox:  <input type="checkbox" name="awesome" checked="" value="off"></p>';
    echo '</form>';
}

function swp_filter_posting_content($content) 
{
  //conditonal-statement to add additional content to both single posts, custom post types and pages which hold content
  //while also using 'is_main_query()'-method to check whether focus is currently inside of the main post query.
  //*(The main post query can be thought of as the primary post loop that displays the main content for the post, page or archive)
  //if(is_singular() && is_main_query())
  //{	

	//conditional-statement using 'is_single()'-method to add additional content only to single-postings which hold content
	//while also using 'is_main_query()'-method to check whether focus is currently inside of the main post query. 
	//*(The main post query can be thought of as the primary post loop that displays the main content for the post)
	if(is_single() && is_main_query())
	{
		//most efficient solution:
		//declaring a variable and initializing it's value to a html 'h3'-heading while using the inline<b>-tag to make all h3-content bold and inline<u>-tags to underline content segments
		$new_content = '<h3><b>Be <u>excellent</u> to <u>each other!</u></b></h3>';
		
		//using 'return'-keyword to place current content which has been appended with 'new_content'-value, via the '.'-operator, to the 'current'-content's location
		// 
		return $content . $new_content;

		//alternative solution:
		//return $content . '<h3><b>Be <u>excellent</u> to <u>each other!</u></b></h3>';
	}
  //}	
}

function swp_filter_posting_content_test($content) 
{
 
	if(is_single() && is_main_query())
	{
		
		$new_content = '<h3><b>Filter is activated</b></h3>';
		
		
		return $content . $new_content;

		
	}
 
}






function swp_good_to_awesome($text)
{
        $replace = array( 'good' => 'awesome', 'Good' => 'Awesome');
        
        $text = str_replace(array_keys($replace), $replace, $text);
        
        return $text;
}