<?php
/*
Plugin Name: Daisycon prijsvergelijkers
Plugin URI: http://prijsvergelijkers.affiliateprogramma.eu/
Description: Promoot adverteeders van Daisycon eenvoudig en goed met de verschillende professionele prijsvergelijkers voor WordPress-publishers. Met deze plugin kun je eenvoudig en snel een vergelijkingssite maken. De plugin bevat op dit moment zes vergelijkers en zal regelmatig worden aangevuld met nieuwe tools, dus houd de updates in de gaten!
Author: Daisycon
Version: 2.0 
Author URI: http://www.daisycon.com
*/

// Turn off all error reporting in the plugin
error_reporting(0);

// Required files
require_once('includes/general.php');
require_once('includes/database.php');

// Required files for tools
require_once('tools/telecom.php');
require_once('tools/auto.php');
require_once('tools/simonly.php');
require_once('tools/zorg.php');
require_once('tools/energie.php');
require_once('tools/wintersport.php');
require_once('tools/zomer.php');
require_once('tools/dagaanbiedingen.php');
require_once('tools/dating.php');
require_once('tools/reis.php');
require_once('tools/allesin1.php');

// Activate files for tools
$telecomPlugin = new generalCom;
$simonlyPlugin = new generalSim;
$generalPlugin = new generalSettings;
$zorgPlugin = new generalZorg;
$energyPlugin = new generalEnergy;
$autoPlugin = new generalAuto;
$winterPlugin = new generalWinter;
$summerPlugin = new generalSummer;
$dailyofferPlugin = new generalDailyoffer;
$datingPlugin = new generalDating;
$reisPlugin = new generalReis;
$allesineenPlugin = new generalAllesineen;

// Create menu
function dmenu(){
	add_menu_page('daisycontools', 'Prijsvergelijkers', 'manage_options', 'daisycontools', array('generalSettings', 'adminSettings'),plugin_dir_url( __FILE__ ) . 'images/icon.png');
		add_submenu_page('daisycontools', 'Introductie',  'Introductie', 'manage_options', 'daisycontools');
		add_submenu_page('daisycontools', 'Sim only', 'Sim only', 'manage_options', 'simonly', array('generalSim', 'adminSimonly'));
		add_submenu_page('daisycontools', 'Alles-in-&eacute;&eacute;n-vergelijker',  'Alles-in-&eacute;&eacute;n-vergelijker', 'manage_options', 'allesineen', array('generalAllesineen', 'adminAllesineen'));
		add_submenu_page('daisycontools', 'Telecom',  'Telecom', 'manage_options', 'telecom', array('generalCom', 'adminTelecom'));
		add_submenu_page('daisycontools', 'Autoverzekering',  'Autoverzekering', 'manage_options', 'auto', array('generalAuto', 'adminAuto'));
		add_submenu_page('daisycontools', 'Zorgverzekering',  'Zorgverzekering', 'manage_options', 'zorg', array('generalZorg', 'adminZorg'));
		add_submenu_page('daisycontools', 'Reisverzekering',  'Reisverzekering', 'manage_options', 'reisverzekering', array('generalReis', 'adminReis'));
		add_submenu_page('daisycontools', 'Vakantie',  'Vakantie', 'manage_options', 'vakantie', array('generalSummer', 'adminSummer'));
		add_submenu_page('daisycontools', 'Wintersport',  'Wintersport', 'manage_options', 'wintersport', array('generalWinter', 'adminWintersport'));
		add_submenu_page('daisycontools', 'Dating',  'Dating', 'manage_options', 'dating', array('generalDating', 'adminDating'));
		add_submenu_page('daisycontools', 'Energie',  'Energie', 'manage_options', 'energy', array('generalEnergy', 'adminEnergy'));
		add_submenu_page('daisycontools', 'Dagaanbiedingen',  'Dagaanbiedingen', 'manage_options', 'dagaanbiedingen', array('generalDailyoffer', 'adminDailyoffer'));
}



// Add Daisycon menu to Wordpress admin interface
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
add_shortcode('daisycon_zorg', array('generalZorg', 'zorgAdv'));
add_shortcode('daisycon_winter', array('generalWinter', 'winterAdv'));  
add_shortcode('daisycon_energie', array('generalEnergy', 'energyAdv')); 
add_shortcode('daisycon_auto', array('generalAuto', 'autoAdv')); 
add_shortcode('daisycon_vakantie', array('generalSummer', 'summerAdv'));
add_shortcode('daisycon_dagaanbieding', array('generalDailyoffer', 'dailyofferAdv'));
add_shortcode('daisycon_dating', array('generalDating', 'datingAdv'));
add_shortcode('daisycon_reis', array('generalReis', 'reisAdv'));
add_shortcode('daisycon_allesin1', array('generalAllesineen', 'allesineenAdv'));
?>
