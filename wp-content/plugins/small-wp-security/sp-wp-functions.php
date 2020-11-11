<?php
if (!defined('ABSPATH')) exit;

//languages textdomain settings
add_action('plugins_loaded','sp_wp_security_languages');
function sp_wp_security_languages() {
	load_plugin_textdomain('sp_wp_security', false, dirname( plugin_basename( __FILE__ ) ).'/languages/');
}

//validate_data
function sp_wp_security_validate_data($count, $number, $data){

	if($number == "y") $data=preg_replace('/[^0-9]/', '', $data);
	
	if(strlen($data)>$count){
		$data_len=strlen($data)-$count;
		$data= substr($data, 0, -$data_len);
	}

	return $data;
}
?>