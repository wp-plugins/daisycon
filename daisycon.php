<?php
/*
Plugin Name: Daisycon productvergelijkers
Plugin URI: http://www.daisycon.com/nl/tools/
Description: Promoot adverteeders van Daisycon eenvoudig en goed met de verschillende professionele prijsvergelijkers voor WordPress-publishers.
Author: Daisycon
Version: 1.0
Author URI: http://www.daisycon.com
*/

// Turn of all error reporting in the plugin
error_reporting(0);

// Required files
require_once('telecom.php');
require_once('general.php');
require_once('simonly.php');

$telecomPlugin = new generalCom;
$simonlyPlugin = new generalSim;
$generalPlugin = new generalSettings;

// Create menu
function dmenu(){
	add_menu_page('daisycontools', 'Daisycon Tools', 'manage_options', 'daisycontools', array('generalSettings', 'adminSettings'),plugin_dir_url( __FILE__ ) . 'images/icon.png');
		add_submenu_page('daisycontools', 'Introductie',  'Introductie', 'manage_options', 'daisycontools');
		add_submenu_page('daisycontools', 'Sim only-vergelijker', 'Sim only-vergelijker', 'manage_options', 'simonly', array('generalSim', 'adminSimonly'));
		add_submenu_page('daisycontools', 'Telecomvergelijker',  'Telecomvergelijker', 'manage_options', 'telecom', array('generalCom', 'adminTelecom'));
}

add_action('admin_menu', 'dmenu');

//Add jQuery
function addjquery() {
    wp_enqueue_script('jquery');
}

//Add actions
add_action('wp_enqueue_scripts', 'addjquery');
add_action('admin_menu', 'dmenu');

// Add shortcodes
add_shortcode('daisycon_telecom', array('generalCom', 'telecomAdv')); 
add_shortcode('daisycon_telecomadv', array('generalCom', 'telecomAdv'));
add_shortcode('daisycon_simonly', array('generalSim', 'simonlyAdv')); 
?>
