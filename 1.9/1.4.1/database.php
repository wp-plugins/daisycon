<?php 
/* Daisycon affiliate marketing plugin
 * File: database.php
 * 
 * To create the database for the plugin and to update the tables if necessary.
 * 
 */

global $wpdb;
$defaultTablePrefix = $wpdb->prefix.'daisycon_';

// Categories table
$sql_mediaid = "
	CREATE TABLE IF NOT EXISTS `".$defaultTablePrefix."tools` (
		`media_id` int(11) NOT NULL
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

$query_publisher = mysql_query($sql_mediaid);
?>