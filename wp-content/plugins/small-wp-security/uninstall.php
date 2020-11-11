<?php 
if (!defined('ABSPATH')) exit;

//delete option
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}

delete_option('sp_wp_security_link_meta');
delete_option('sp_wp_security_wp_version');
delete_option('sp_wp_security_rss');
delete_option('sp_wp_security_security_header');
delete_option('sp_wp_security_emojis');
delete_option('sp_wp_security_comments');