<?php
/*
Plugin Name: Photoshop Tools
Text Domain: ps-tools
Domain Path: /lang
Plugin URI: http://dianakcury.com/dev/photoshop-tools
Description: Insert any Photoshop tool reference in your posts and pages.
Version: 1.0
Author: Diana K. Cury
Author URI: http://arquivo.tk
*/

class post_snippets {


function post_snippets() {
		// define URL
		define('post_snippets_ABSPATH', WP_PLUGIN_DIR.'/'.plugin_basename( dirname(__FILE__) ).'/' );
		define('post_snippets_URLPATH', WP_PLUGIN_URL.'/'.plugin_basename( dirname(__FILE__) ).'/' );

		// Define the domain for translations
		load_plugin_textdomain(	'ps-tools', false, dirname(plugin_basename(__FILE__)) . '/lang');

		include_once (dirname (__FILE__)."/tinymce/tinymce.php");
	}


}


function plugin_mce_css($mce_css) {
  if (! empty($mce_css)) $mce_css .= ',';
  $mce_css .= WP_PLUGIN_URL . '/ps-tools/tinymce/styles.css';
  return $mce_css;
}

function ps_style($result) {
  wp_enqueue_style('pstools_style', WP_PLUGIN_URL ."/ps-tools/tinymce/styles.css");

}


function ps_tools_pages() { include('control/info.php');  }

function ps_add_pages() {
        add_plugins_page( 'PS Tools', 'PS Tools', 'manage_options', 'ps-tools', 'ps_tools_pages'); }

add_action( 'plugins_loaded', create_function( '', 'global $post_snippets; $post_snippets = new post_snippets();' ) );
add_filter('mce_css', 'plugin_mce_css');
add_filter('get_header','ps_style');
add_action('admin_menu', 'ps_add_pages');


?>