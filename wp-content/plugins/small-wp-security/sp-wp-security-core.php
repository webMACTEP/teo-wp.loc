<?php
if (!defined('ABSPATH')) exit;

add_action( 'init', 'sp_wp_security_plugin_init' );
function sp_wp_security_plugin_init() {

	/*
	* Get option
	*/

	$sp_wp_security_link_meta = get_option('sp_wp_security_link_meta');
	$sp_wp_security_wp_version = get_option('sp_wp_security_wp_version');
	$sp_wp_security_rss = get_option('sp_wp_security_rss');
	$sp_wp_security_security_header = get_option('sp_wp_security_security_header');
	$sp_wp_security_emojis = get_option('sp_wp_security_emojis');
	$sp_wp_security_comments = get_option('sp_wp_security_comments');
	$sp_wp_security_nonce = wp_create_nonce('sp_wp_security_nonce');


	if(wp_verify_nonce($sp_wp_security_nonce, 'sp_wp_security_nonce')){

		/*
		* Meta tags and Links
		*/

		if($sp_wp_security_link_meta == "y"){
			//remove RSD link
			remove_action('wp_head', 'rsd_link');
			//remove manifest link
			remove_action('wp_head', 'wlwmanifest_link');
			//remove shortlink 
			remove_action('wp_head', 'wp_shortlink_wp_head',10,0);
			//remove pre/next link
			remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
			//remove canonical
			remove_action('wp_head','rel_canonical');
			//remove dns-prefetch
			remove_action( 'wp_head', 'wp_resource_hints', 2);
			//remove rest api
			remove_action('wp_head', 'rest_output_link_wp_head', 10);
			remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
			remove_action('wp_head', 'wp_oembed_add_host_js');
		}

		/*
		* Hide wp version 
		*/	

		if($sp_wp_security_wp_version == "y"){
			//remove generator meta
			remove_action('wp_head', 'wp_generator');

			//hide wp version 
			function sp_wp_security_remove_wp_ver_css_js( $src ) {
			    if ( strpos( $src, 'ver=' ) )
			        $src = remove_query_arg( 'ver', $src );
			    return $src;
			}

			add_filter('style_loader_src', 'sp_wp_security_remove_wp_ver_css_js', 9999);
			add_filter('script_loader_src', 'sp_wp_security_remove_wp_ver_css_js', 9999);
		}

		/*
		* Remove RSS
		*/

		if($sp_wp_security_rss == "y"){
			//remove rss link
			remove_action('wp_head', 'feed_links',2);
			remove_action('wp_head', 'feed_links_extra',3);

			//total remove rss
			function sp_wp_security_remove_rss() {
			    wp_redirect( home_url() ); 
				exit;
			}

			add_action('do_feed','sp_wp_security_remove_rss', 1);
			add_action('do_feed_rdf','sp_wp_security_remove_rss', 1);
			add_action('do_feed_rss','sp_wp_security_remove_rss', 1);
			add_action('do_feed_rss2','sp_wp_security_remove_rss', 1);
			add_action('do_feed_atom','sp_wp_security_remove_rss', 1);
		}

		/*
		* Security Headers
		*/

		if($sp_wp_security_security_header == "y"){
			//Remove X-Pingback from Header
			add_action('wp', function() { header_remove('X-Pingback');}, 1000);
			//Remove X-Powered-By from Header
			add_action('wp', function(){ header_remove('X-Powered-By'); }, 1000);
			//Remove shortlink from Header
			remove_action('template_redirect', 'wp_shortlink_header', 11);
			//Rest api
			remove_action('template_redirect', 'rest_output_link_header', 11, 0);
			//X-Frame-Options
			header("X-Frame-Options:sameorigin");
			//X-XSS-Protection
			header("X-XSS-Protection: 1; mode=block");
			//X-Content-Type-Options
			header('X-Content-Type-Options:nosniff');
			//Strict-Transport-Security
			header('Strict-Transport-Security: max-age=31536000');
		}

		/*
		* Remove emojis
		*/

		if($sp_wp_security_emojis == "y"){
			//remove emoji
			function sp_wp_security_disable_emojis_tinymce( $plugins ) {
				if ( is_array( $plugins ) ) {
					return array_diff( $plugins, array('wpemoji'));
				} else {
					return array();
				}
			}

			function sp_wp_security_disable_emojis() {
				remove_action('wp_head', 'print_emoji_detection_script', 7);
				remove_action('admin_print_scripts', 'print_emoji_detection_script');
				remove_action('wp_print_styles', 'print_emoji_styles');
				remove_action('admin_print_styles', 'print_emoji_styles');	
				remove_filter('the_content_feed', 'wp_staticize_emoji');
				remove_filter('comment_text_rss', 'wp_staticize_emoji');	
				remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
				add_filter('tiny_mce_plugins', 'sp_wp_security_disable_emojis_tinymce');
			}

			add_action( 'init', 'sp_wp_security_disable_emojis' );
		}

		/*
		* Comments
		*/

		if($sp_wp_security_comments == "y"){
			//remove author_link
			function sp_wp_security_remove_comment_author_url($author_link){
			    return strip_tags($author_link);
			}
			add_filter('get_comment_author_link', 'sp_wp_security_remove_comment_author_url');

			//disable auto link
			remove_filter('comment_text', 'make_clickable', 9);
		}
	}	
}
?>