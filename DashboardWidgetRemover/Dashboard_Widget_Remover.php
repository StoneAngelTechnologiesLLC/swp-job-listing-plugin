<?php
/**
* Plugin Name: Dashboard Widgit Remover
* Plugin URI: http://stonangeltechnologies.com
* Description:  Removes widgets from dashboard
* Author: John Pietrangelo
* Author URI: http://stonangeltechnologies.com
* Version: 1.0
* License: GPLv2
**/
//custom-function   *swp = unique-prefix(showit wordpress)
function swp_remove_dashboard_widgets()
{
 // wp-functions     parameters(String-$id, String-$page, String-$content)
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );   // Right Now
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' ); // Recent Comments
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );  // Incoming Links
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );   // Plugins
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );  // Quick Press
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );  // Recent Drafts
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );   // WordPress blog
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );   // Other WordPress News
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' ); // Activities
	remove_meta_box( 'themify_news', 'dashboard', 'normal' ); // themify news
	remove_meta_box( 'themify_updates', 'dashboard', 'normal'); // themify updates
	remove_meta_box( 'wpe_dify_news_feed', 'dashboard', 'normal' );   // Right Now
}
// wp-function  parameters(String-$hook/tag, Function-$function_to_add)
add_action( 'wp_dashboard_setup', 'swp_remove_dashboard_widgets' );
