<?php
/*
Plugin Name: Tables Plugin
Description: this plugin is made for installing multiple tables in a single plugin .
Author: <strong>Neeraj Sukheja </strong>
Version: 0.1
*/

global $table_db_version;
$table_db_version = "1.0";

/**
  *Function to add multiple table in WordPress Database
  *Created on 17 aug 2012
  *By Neeraj Sukheja
*/

function table_add(){

	global $wpdb;
	global $table_db_version;

	$table_add_one = $wpdb->prefix . "table_one";
   	$table_add_two = $wpdb->prefix . "table_two";
	//-----------------------table_one-----------------------------------
        if($wpdb->get_var('SHOW TABLES LIKE ' . $table_add_one) != $table_add_one){
	  $sql_one = 'CREATE TABLE ' . $table_add_one . '(
		  id INT(11) UNSIGNED AUTO_INCREMENT,
		  time datetime NOT NULL,
		  size int (11),
		  price int (11),
		  image_url VARCHAR (255),
		  PRIMARY KEY  (id) )';

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql_one);
	}

	//-----------------------table_two-----------------------------------
        if($wpdb->get_var('SHOW TABLES LIKE ' . $table_add_two) != $table_add_two){
	  $sql_two = 'CREATE TABLE ' . $table_add_two . '(
		  id INT(11) UNSIGNED AUTO_INCREMENT,
		  time datetime NOT NULL,
		  size int (11),
		  price int (11),
		  image_url VARCHAR (255),
		  PRIMARY KEY  (id) )';

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql_two);
	}

    add_option("table_db_version", $table_db_version);
}
register_activation_hook(__FILE__,'table_add');

//*****************************************************************************************

/**
  *Function to Update Db Version in WordPress Database
  *Created on 17 aug 2012
  *By Neeraj Sukheja
*/
function myplugin_update_db_check() {
    global $table_db_version;
    if (get_site_option('table_db_version') != $table_db_version) {
        table_add();
    }
}
add_action('plugins_loaded', 'myplugin_update_db_check');

//********************************************************************

/**
  *Function to insert record into multiple tables in WordPress Database
  *Created on 17 aug 2012
  *By Neeraj Sukheja
*/

function table_add_data() {
   global $wpdb;
   $table_add_one = $wpdb->prefix . "table_one";
   $table_add_two = $wpdb->prefix . "table_two";
   $size_one = "10";
   $price_one = "25";
   $image_one = "http://exmaple.com/image_one";
   $size_two = "20";
   $price_two = "50";
   $image_two = "http://exmaple.com/image_two";
   $rows_affected_one = $wpdb->insert( $table_add_one, array( 'time' => current_time('mysql'), 'size' => $size_one, 'price' => $price_one, 'image_url' => $image_one ) );
   $rows_affected_two = $wpdb->insert( $table_add_two, array( 'time' => current_time('mysql'), 'size' => $size_two, 'price' => $price_two, 'image_url' => $image_two ) );
  }
register_activation_hook(__FILE__,'table_add_data');