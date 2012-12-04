<?php 
/*
Plugin Name: Restless Development Alumni database
Version: 0.1
Plugin URI: http://www.github.com/forward/xxxxxxxxxx
Description: A database for Alumni CVs
Author: Restless Development
Author URI: http://www.restless-development.org.uk
*/





// function that runs on page run
function rd_alumni_init() {

  // find the plugin path and save it for later
  define('RDALABSPATH', dirname(__FILE__).'/');
    
}
add_action('init','rd_alumni_init');



// ONLY IN ADMIN AREA
if ( is_admin() ){

  /* Call the html code */
  add_action( 'admin_menu', 'rd_alumni_admin_area' );
  
  function rd_alumni_admin_area() {
    add_menu_page( 'Alumni admin', 'Alumni', 'administrator',
    'rd-alumni', 'rd_alumni_admin_list', '' );
  }

  function rd_alumni_admin_list() {
    require_once ( RDALABSPATH . 'admin/list.php' );
  }

}