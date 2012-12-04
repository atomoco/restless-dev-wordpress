<?php 
/*
Plugin Name: Restless Development Alumni database
Version: 0.1
Plugin URI: http://www.github.com/forward/xxxxxxxxxx
Description: A database for Alumni CVs
Author: Restless Development
Author URI: http://www.restless-development.org.uk
*/

/*
add_action('init','hello_world');
function hello_world() {
  echo "Hello World...";
}
*/

if ( is_admin() ) {

	var $hook 			= 'rd-alumni';
	var $filename		= 'rd-alumni/rd-alumni.php';
	var $longname		= 'Restless Development Alumni directory';
	var $shortname		= 'Alumni';
	var $currentoption 	= 'list';
	var $ozhicon		= 'tag.png';
	
	function WPSEO_Admin() {
		$this->multisite_defaults();
		add_action( 'init', array(&$this, 'init') );
	}

  global $wp_admin_bar;
  
	$wp_admin_bar->add_menu( array( 'id' => 'wpseo-menu', 'title' => __( 'sssssss' ), 'href' => get_admin_url('admin.php?page=wpseo_dashboard'), ) );
	
}
?>