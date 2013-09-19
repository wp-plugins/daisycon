<?php
/*
Plugin Name: Daisycon prijsvergelijkers
Plugin URI: http://mobielvergelijker.affiliateprogramma.eu/
Description: Promoot adverteeders van Daisycon eenvoudig en goed met de verschillende professionele prijsvergelijkers voor WordPress-publishers. Met deze plugin kun je eenvoudig en snel een vergelijkingssite maken. De plugin bevat een Telecomvergelijker en Sim only-vergelijker en zal regelmatig worden aangevuld met nieuwe tools, dus houd de updates in de gaten!
Author: Daisycon
Version: 1.1
Author URI: http://www.daisycon.com
*/

// Turn of all error reporting in the plugin
error_reporting(0);

// Required files
require_once('telecom.php');
require_once('general.php');
require_once('simonly.php');
require_once('zorg.php');
require_once('database.php');

$telecomPlugin = new generalCom;
$simonlyPlugin = new generalSim;
$generalPlugin = new generalSettings;
$zorgPlugin = new generalZorg;

// Create menu
function dmenu(){
	add_menu_page('daisycontools', 'Prijsvergelijkers', 'manage_options', 'daisycontools', array('generalSettings', 'adminSettings'),plugin_dir_url( __FILE__ ) . 'images/icon.png');
		add_submenu_page('daisycontools', 'Introductie',  'Introductie', 'manage_options', 'daisycontools');
		add_submenu_page('daisycontools', 'Sim only', 'Sim only', 'manage_options', 'simonly', array('generalSim', 'adminSimonly'));
		add_submenu_page('daisycontools', 'Telecom',  'Telecom', 'manage_options', 'telecom', array('generalCom', 'adminTelecom'));
		add_submenu_page('daisycontools', 'Zorgverzekeringen',  'Zorgverzekeringen', 'manage_options', 'zorg', array('generalZorg', 'adminZorg'));
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
