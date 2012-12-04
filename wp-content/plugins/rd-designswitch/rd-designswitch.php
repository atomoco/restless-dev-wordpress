<?php 
/*
Plugin Name: Restless Development design switch
Version: 0.1
Plugin URI: http://www.github.com/forward/xxxxxxxxxx
Description: Allow a "high/low bandwidth switch" to customize the css/js/images
Author: Restless Development
Author URI: http://www.restless-development.org.uk
*/

// debug
// ini_set ('display_errors', true);





// when the plug-in is activated, add these settings to wordpress
function rd_designwitch_install() {
  /* Creates new database field */
  add_option("rd_designswitch_low_list", 'nokia,android,symbian,bada,ios,internet explorer 6', '', 'yes');
  add_option("rd_designswitch_high_list", 'chrome,firefox,safari,internet explorer', '', 'yes');
}
register_activation_hook(__FILE__,'rd_designwitch_install'); 






// when the plug-in is de-activated, remove these settings to wordpress
function hello_world_remove() {
  /* Deletes the database field */
  delete_option('rd_designswitch_low_list');
  delete_option('rd_designswitch_high_list');
}
register_deactivation_hook( __FILE__, 'hello_world_remove' );






// function that runs on page run, that SETS the "high/low" bandwidth constant ("DESIGNSWITCH"), depending on what cookies are set, what browser is being used, etc. This constant is use in the header (and other templates) to switch between "high" and "low" resultion styles, images, javascripts, etc.
function rd_designswitch_init() {

  // find the plugin path and save it for later
  define('RDDSABSPATH', dirname(__FILE__).'/');

  // if the switch has been clicked, set that choice as a cookie.
  if ($_POST['rd-designswitch-change'] == '1') {
    if ( $_POST['rd-designswitch-toggle'] == '1' ) {
      setcookie( 'rd_designswitch', 'high', time()+31536000 );
      $_COOKIE['rd_designswitch'] = 'high';
    } else {
      setcookie( 'rd_designswitch', 'low', time()+31536000 );
      $_COOKIE['rd_designswitch'] = 'low';
    }
  }
  
  // if a previous cookie has been set, use theat to tell us if we need to use high or low
  if ( $_COOKIE['rd_designswitch'] ) {
    define('DESIGNSWITCH', $_COOKIE['rd_designswitch']);
  // else if the current browser (it's user agent) matches any of details set as "low-bandwidth"
  } else if ( check_if('low') ) {
    define('DESIGNSWITCH', 'low');
  // else if the current browser (it's user agent) matches any of details set as "high-bandwidth"
  } else if ( check_if('high') ) {
    define('DESIGNSWITCH', 'high');
  // all other cases are defaulted to "low"
  } else {
    define('DESIGNSWITCH', 'low');
  }
  
}
add_action('init','rd_designswitch_init');






// function used to check if the browser should get the "high" or "low" bandwidth by default. The browsers chosen to be in the list are set in the admin area.
function check_if ($toggle) {
  
  // pick up the list of agents for low and high end
  if ( $toggle == 'low') {
    $check_agents = explode( ',', get_option('rd_designswitch_low_list') );
  } else {
    $check_agents = explode( ',', get_option('rd_designswitch_high_list') );
  }
  
  // loop through the agent list and see if it matches the user's browser
  for ( $i=0; $i < sizeof($check_agents); $i++ ) {
    if ( stristr($_SERVER['HTTP_USER_AGENT'], $check_agents[$i]) ) {
      return true;
    }
  }
  
  // nothing found
  return false;
  
}




// ONLY IN ADMIN AREA
if ( is_admin() ){

  /* Call the html code */
  add_action( 'admin_menu', 'rd_designswitch_admin_menu' );
  
  function rd_designswitch_admin_menu() {
    add_options_page( 'Design switch', 'Design switch', 'administrator',
    'rd-designswitch', 'rd_designswitch_admin_page' );
  }

  function rd_designswitch_admin_page() {
    require_once ( RDDSABSPATH . 'admin/admin.php' );
  }

}


// print the switch
function rd_designswitch_print_switch() {
  require ( RDDSABSPATH . 'rd-designswitch-switch.php' );
}