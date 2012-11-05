<?php

/*
 Plugin Name: Tidy Dashboard Widgets
 Plugin URI: http://www.stormconsultancy.co.uk
 Description: Lets you select widgets to remove from the dashboard
 Version: 1.0
 Author: Adam Pope
 Author URI: http://www.stormconsultancy.co.uk
 */


// Plugin Version
define('TIDY_DASHBOARD_WIDGETS_CURRENT_VERSION', '1' );

// Widget Details
$TIDY_DASHBOARD_WIDGETS = array(
  'tidy_dashboard_quick_press' => array( 
    'name' => 'Quick Press', 
    'key' => 'dashboard_quick_press', 
    'area' => 'side'
    ),
  'tidy_dashboard_incoming_links' => array( 
    'name' => 'Incoming Links', 
    'key' => 'dashboard_incoming_links', 
    'area' => 'normal'
    ),
  'tidy_dashboard_other_wordpress_news' => array( 
    'name' => 'Other WordPress News', 
    'key' => 'dashboard_secondary', 
    'area' => 'side'
    ),
  'tidy_dashboard_plugins' => array( 
    'name' => 'Plugins', 
    'key' => 'dashboard_plugins', 
    'area' => 'normal'
    ),
  'tidy_dashboard_recent_comments' => array( 
    'name' => 'Recent Comments', 
    'key' => 'dashboard_recent_comments', 
    'area' => 'normal'
    ),
  'tidy_dashboard_wordpress_blog' => array( 
    'name' => 'WordPress Blog', 
    'key' => 'dashboard_primary', 
    'area' => 'side'
    ),
  'tidy_dashboard_recent_drafts' => array( 
    'name' => 'Recent Drafts', 
    'key' => 'dashboard_recent_drafts', 
    'area' => 'normal'
    ),
  'tidy_dashboard_right_now' => array( 
    'name' => 'Right Now', 
    'key' => 'dashboard_right_now', 
    'area' => 'normal'
    )
);

function tidy_dashboard_widgets() {
  global $TIDY_DASHBOARD_WIDGETS;

  foreach($TIDY_DASHBOARD_WIDGETS as $k => $v){
    if(get_option($k) == 1){
      remove_meta_box($v['key'], 'dashboard', $v['area']);
    }
  }
} 

// Register our function
add_action('wp_dashboard_setup', 'tidy_dashboard_widgets');


require_once (dirname(__FILE__).'/tidy-dashboard-widgets-options.php');

?>