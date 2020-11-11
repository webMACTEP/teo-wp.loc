<?php
/*
Plugin Name: Small WP Security
Description: Small WP Security is a WordPress plugin which provides the basic security of your site.
Version: 1.2
Text Domain: sp_wp_security
Domain Path: /languages
Author: spoot1986
Author URI: https://cms3.ru/
Plugin URI: https://cms3.ru/sp-wp-security/
*/

if (!defined('ABSPATH')) exit;

//default setting
register_activation_hook( __FILE__, 'sp_wp_security_plugin_activate');
function sp_wp_security_plugin_activate(){
	update_option('sp_wp_security_link_meta', 'n');
	update_option('sp_wp_security_wp_version', 'n');
	update_option('sp_wp_security_rss', 'n');
	update_option('sp_wp_security_security_header', 'n');
	update_option('sp_wp_security_emojis', 'n');
	update_option('sp_wp_security_comments', 'n');
}	

//require functions
require_once(plugin_dir_path(__FILE__).'sp-wp-functions.php');
//require styles
require_once(plugin_dir_path(__FILE__).'sp-wp-security-style.php');
//require admin
require_once(plugin_dir_path(__FILE__).'sp-wp-security-admin.php');
//require core
require_once(plugin_dir_path(__FILE__).'sp-wp-security-core.php');
?>