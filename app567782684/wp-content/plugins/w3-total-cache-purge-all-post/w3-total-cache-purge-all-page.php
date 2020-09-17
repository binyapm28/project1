<?php
/*
Plugin Name: W3 Total Cache Purge All Page
Plugin URI: http://www.tonjoo.com/w3-total-cache-purge-all-post/
Description: Purge all post from W3 Total Cache when a post is published / updated.
Version: 0.2
Author: Todi Adiyatmo Wijoyo
Author URI:  http://todiadiyatmo.com
Contributor: Muhammad IqbL Jayadi
Contributor URI: http://iqbaljayadi.me
*/


/* Flush cache when post is saved */

function tonjoo_w3tc_purge_all_page_tonjoo_clear_cache($post_ID)  {

	$post = get_post($post_ID);

	// return on new post
	if(is_null($post)||is_null($post_ID))
		return $post_ID;

	// return on draft post
	if($post->post_status=='auto-draft')
		return $post_ID;

	// apply on publish / trash / private
	if($post->post_status=='publish'||$post->post_status=='trash'||$post->post_status=='private') {
		if($post->post_type!='attachment'){
			if (function_exists('w3tc_pgcache_flush')) {
				w3tc_pgcache_flush();
			} 
		}	
	}

	return $post_ID;
}

	// Add Readme Page Menu
function tonjoo_w3tc_purge_all_page_readme_page() {  
	include('readme.php');  
}  

function tonjoo_w3tc_purge_all_page_readme_page_actions() {  
	add_menu_page('W3TC Purge All Page', 'W3TC Purge All Page', 'manage_options', 'tonjoo-w3tc-purge-all-page-readme', 'tonjoo_w3tc_purge_all_page_readme_page', '', '67.7');

}  


	// Add Links Directly from Plugin List Menu
function tonjoo_w3tc_purge_all_page_readme($links) {
	$plugins_url = plugins_url();
	$readme_link = '<a href="options-general.php?page=tonjoo-w3tc-purge-all-page-readme">Readme</a>'; 
	array_unshift($links, $readme_link); 
	return $links; 
}

function tonjoo_w3tc_purge_all_page_donate($links) { 
	$donate_link = '<a href="http://tonjoo.com/donate/">Donate</a>'; 
	array_unshift($links, $donate_link); 
	return $links; 
}

$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'tonjoo_w3tc_purge_all_page_readme' );
add_filter("plugin_action_links_$plugin", 'tonjoo_w3tc_purge_all_page_donate' );


add_action('save_post', 'tonjoo_w3tc_purge_all_page_tonjoo_clear_cache');
add_action('admin_menu', 'tonjoo_w3tc_purge_all_page_readme_page_actions');
