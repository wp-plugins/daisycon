<?php 
/* Daisycon affiliate marketing plugin
 * File: database.php
 * 
 * To create the database for the plugin and to update the tables if necessary.
 * 
 */

global $wpdb;
$table_name = $wpdb->prefix.'daisycon_tools';

if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
{
	$defaultTablePrefix = $wpdb->prefix.'daisycon_tools';

	// Categories table
	$sql_mediaid = "
		CREATE TABLE IF NOT EXISTS `".$defaultTablePrefix."` (
			`media_id` int(11) NOT NULL
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

	$query_publisher = $wpdb->query($wpdb->prepare($sql_mediaid));
}

?>