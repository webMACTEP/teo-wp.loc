<?php
if (!defined('ABSPATH')) exit;

add_action('admin_enqueue_scripts', 'sp_wp_security_style_admin');
function sp_wp_security_style_admin() {
	//enqueue the styles in setting page of plugin
	if(isset($_GET['page']) && $_GET['page'] == 'sp_wp_security'){
		wp_register_style('sp_wp_security_admin_css', plugins_url('assets/css/admin.css', __FILE__), false, false, 'all');
		wp_register_style('sp_wp_security_font_awesome', plugins_url('assets/css/font-awesome.css', __FILE__), false, false, 'all');
		wp_enqueue_style('sp_wp_security_admin_css');
		wp_enqueue_style('sp_wp_security_font_awesome');
	}	
}

?>