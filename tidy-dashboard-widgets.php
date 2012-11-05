<?php

/*
 * Plugin Name: Tidy Dashboard Widgets
 * Plugin URI: http://www.stormconsultancy.co.uk
 * Description: Lets you select widgets to remove from the dashboard
 * Version: 1.0
 * Author: Adam Pope
 * Author URI: http://www.stormconsultancy.co.uk
 *
 * Copyright (c) 2012 Storm Consultancy (EU) Ltd, 
 * http://www.stormconsultancy.co.uk/
 * 
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 * 
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
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