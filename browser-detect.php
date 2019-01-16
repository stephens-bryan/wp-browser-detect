<?php
/**
 * @package Browser Detect
 */
/*
Plugin Name: Browser Detect
Description: Developer plugin to append a class for the current browser. Can then be used to target a specific browser for development.
Version: 1.0
Author: Bryan Stephens
License: GPLv2 or later
Text Domain: browser-detect
*/

define( 'BROWSER_DETECT__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
require_once( BROWSER_DETECT__PLUGIN_DIR . 'browser-detect-class.php' );


add_action( 'admin_menu', 'my_admin_menu' );
function my_admin_menu() {
	add_menu_page( 'Browser Detect', 'Browser Detect', 'manage_options', 'browser-detect/browser-detect-admin-page.php', 'browser_detect', 'dashicons-admin-site', 65  );
}

function browser_detect(){
    require_once( BROWSER_DETECT__PLUGIN_DIR . 'browser-detect-view.php' );
}


function browser_detect_body_class($classes) {
    $user_agent_string = $_SERVER['HTTP_USER_AGENT'];
    $browserDetect = new BrowserDetect( $user_agent_string );
    $current_browser_class = $browserDetect->get_browser_name();
    $classes[] = $current_browser_class;
    return $classes;
}

add_filter('body_class', 'browser_detect_body_class');

function add_custom_dashboard_widgets() {

    wp_add_dashboard_widget(
                 'wpexplorer_dashboard_widget', // Widget slug.
                 'My Custom Dashboard Widget', // Title.
                 'custom_dashboard_widget_content' // Display function.
        );
}

add_action( 'wp_dashboard_setup', 'add_custom_dashboard_widgets' );

/**
 * Create the function to output the contents of your Dashboard Widget.
 */

function custom_dashboard_widget_content() {
    // Display whatever it is you want to show.
    echo "Hello Client XYZ, please remember to stay away from the plugins menu.</br>If you have any need of assistance, please don't hesitate to contact us under:
    <ul>
        <li>http://yourwebsite.com</li>
        <li>1-800-YOURDEVELOPER</li>
    </ul>
    ";;
}