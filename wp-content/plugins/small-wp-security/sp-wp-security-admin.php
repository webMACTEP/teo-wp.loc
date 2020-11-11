<?php
if (!defined('ABSPATH')) exit;

//admin settings page
add_action('admin_menu', 'sp_wp_security_admin_menu_setup');
function sp_wp_security_admin_menu_setup() {
    add_submenu_page(
        'options-general.php',
        'Small WP Security',
        'Small WP Security',
        'manage_options',
        'sp_wp_security',
        'sp_wp_security_admin_page_screen'
    );
}

function sp_wp_security_admin_page_screen(){
	echo '<h2>Small WP Security</h2>';

    if (isset($_POST['save_data'])){
        if(wp_verify_nonce($_POST['save_data'], 'sp_wp_security_nonce')){
        	
        	if (isset($_POST['sp_wp_security_link_meta'])) $sp_wp_security_link_meta = sanitize_key($_POST['sp_wp_security_link_meta']);
            else $sp_wp_security_link_meta = '';

            if (isset($_POST['sp_wp_security_wp_version'])) $sp_wp_security_wp_version = sanitize_key($_POST['sp_wp_security_wp_version']);
            else $sp_wp_security_wp_version = '';

            if (isset($_POST['sp_wp_security_rss'])) $sp_wp_security_rss = sanitize_key($_POST['sp_wp_security_rss']);
            else $sp_wp_security_rss = '';

            if (isset($_POST['sp_wp_security_security_header'])) $sp_wp_security_security_header = sanitize_key($_POST['sp_wp_security_security_header']);
            else $sp_wp_security_security_header = '';

            if (isset($_POST['sp_wp_security_emojis'])) $sp_wp_security_emojis = sanitize_key($_POST['sp_wp_security_emojis']);
            else $sp_wp_security_emojis = '';

            if (isset($_POST['sp_wp_security_comments'])) $sp_wp_security_comments = sanitize_key($_POST['sp_wp_security_comments']);
            else $sp_wp_security_comments = '';

        	update_option('sp_wp_security_link_meta', sp_wp_security_validate_data('1', 'n', $sp_wp_security_link_meta));
        	update_option('sp_wp_security_wp_version', sp_wp_security_validate_data('1', 'n', $sp_wp_security_wp_version));
        	update_option('sp_wp_security_rss', sp_wp_security_validate_data('1', 'n', $sp_wp_security_rss));
        	update_option('sp_wp_security_security_header', sp_wp_security_validate_data('1', 'n', $sp_wp_security_security_header));
        	update_option('sp_wp_security_emojis', sp_wp_security_validate_data('1', 'n', $sp_wp_security_emojis));
        	update_option('sp_wp_security_comments', sp_wp_security_validate_data('1', 'n', $sp_wp_security_comments));

        					
           echo '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible sp_wp_security_ok"><p><strong><i class="fa fa-paw" aria-hidden="true"></i> '.__( 'Settings is saved', 'sp_wp_security' ).'</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text"></span></button></div>';
        }
    }    

?>
	<form method="POST" action="">
        <?php $sp_wp_security_nonce = wp_create_nonce('sp_wp_security_nonce'); ?>
		<input type="hidden" name="save_data" value="<?php echo $sp_wp_security_nonce?>">
		<table class="form-table sp_wp_security_setting_table">
            <tr class="sp_wp_security_head" valign="top">
                <th scope="row" class="sp_wp_security_th">
                    <p><strong><label for="sp_wp_security_link_meta"><i class="fa fa-header" aria-hidden="true"></i> 
                        <?php echo __('Remove Meta tags and Link', 'sp_wp_security'); ?>:
                    </label></strong></p>
                    <p><?php echo __('Remove: RSD Link (EditURI Link), WLW Manifest Link, Shortlink, Prev/Next Links, Canonical Link, DNS Prefetch Link, WP API Links and Scripts', 'sp_wp_security'); ?></p>
                </th>
                <td>
                    <?php $sp_wp_security_link_meta = get_option('sp_wp_security_link_meta'); ?>
                    <input type="radio" name="sp_wp_security_link_meta" id="sp_wp_security_link_meta_y" class="sp_radio sp_enable" value="y" <?php if($sp_wp_security_link_meta=='y'){echo"checked";} ?>>
                    <label for="sp_wp_security_link_meta_y"></label>
                    <?php echo __('yes', 'sp_wp_security'); ?><br><br>
                    <input type="radio" name="sp_wp_security_link_meta" id="sp_wp_security_link_meta_n" class="sp_radio sp_disable" value="n" <?php if($sp_wp_security_link_meta=='n'){echo"checked";} ?>>
                    <label for="sp_wp_security_link_meta_n"></label>
                    <?php echo __('no', 'sp_wp_security'); ?>
                </td>
            </tr>

            <tr class="sp_wp_security_head" valign="top">
                <th scope="row" class="sp_wp_security_th">
                    <p><strong><label for="sp_wp_security_wp_version"><i class="fa fa-user-secret" aria-hidden="true"></i>
                        <?php echo __('Hide WP Version', 'sp_wp_security'); ?>:
                    </label></strong></p>
                    <p><?php echo __('Remove WordPress generator version. Remove WordPress version parameter from JS and CSS files', 'sp_wp_security'); ?></p>
                </th>
                <td>
                    <?php $sp_wp_security_wp_version = get_option('sp_wp_security_wp_version'); ?>
                    <input type="radio" name="sp_wp_security_wp_version" id="sp_wp_security_wp_version_y" class="sp_radio sp_enable" value="y" <?php if($sp_wp_security_wp_version=='y'){echo"checked";} ?>>
                    <label for="sp_wp_security_wp_version_y"></label>
                    <?php echo __('yes', 'sp_wp_security'); ?><br><br>
                    <input type="radio" name="sp_wp_security_wp_version" id="sp_wp_security_wp_version_n" class="sp_radio sp_disable" value="n" <?php if($sp_wp_security_wp_version=='n'){echo"checked";} ?>>
                    <label for="sp_wp_security_wp_version_n"></label>
                    <?php echo __('no', 'sp_wp_security'); ?>
                </td>
            </tr>

            <tr class="sp_wp_security_head" valign="top">
                <th scope="row" class="sp_wp_security_th">
                    <p><strong><label for="sp_wp_security_rss"><i class="fa fa-rss" aria-hidden="true"></i> 
                        <?php echo __('Remove RSS', 'sp_wp_security'); ?>:
                    </label></strong></p>
                    <p><?php echo __('Clean up site head from the feed links and redirect them to the home page.', 'sp_wp_security'); ?></p>
                </th>
                <td>
                    <?php $sp_wp_security_rss = get_option('sp_wp_security_rss'); ?>
                    <input type="radio" name="sp_wp_security_rss" id="sp_wp_security_rss_y" class="sp_radio sp_enable" value="y" <?php if($sp_wp_security_rss=='y'){echo"checked";} ?>>
                    <label for="sp_wp_security_rss_y"></label>
                    <?php echo __('yes', 'sp_wp_security'); ?><br><br>
                    <input type="radio" name="sp_wp_security_rss" id="sp_wp_security_rss_n" class="sp_radio sp_disable" value="n" <?php if($sp_wp_security_rss=='n'){echo"checked";} ?>>
                    <label for="sp_wp_security_rss_n"></label>
                    <?php echo __('no', 'sp_wp_security'); ?>
                </td>
            </tr>

            <tr class="sp_wp_security_head" valign="top">
                <th scope="row" class="sp_wp_security_th">
                    <p><strong><label for="sp_wp_security_security_header"><i class="fa fa-shield" aria-hidden="true"></i> 
                        <?php echo __('Security Headers', 'sp_wp_security'); ?>:
                    </label></strong></p>
                    <p><?php echo __('Remove: Shortlink from HTTP Headers, X-Pingback from HTTP Headers, X-Powered-By from HTTP Headers. Add: X-Frame-Options, X-XSS-Protection, X-Content-Type-Options', 'sp_wp_security'); ?></p>
                </th>
                <td>
                    <?php $sp_wp_security_security_header = get_option('sp_wp_security_security_header'); ?>
                    <input type="radio" name="sp_wp_security_security_header" id="sp_wp_security_security_header_y" class="sp_radio sp_enable" value="y" <?php if($sp_wp_security_security_header=='y'){echo"checked";} ?>>
                    <label for="sp_wp_security_security_header_y"></label>
                    <?php echo __('yes', 'sp_wp_security'); ?><br><br>
                    <input type="radio" name="sp_wp_security_security_header" id="sp_wp_security_security_header_n" class="sp_radio sp_disable" value="n" <?php if($sp_wp_security_security_header=='n'){echo"checked";} ?>>
                    <label for="sp_wp_security_security_header_n"></label>
                    <?php echo __('no', 'sp_wp_security'); ?>
                </td>
            </tr>

            <tr class="sp_wp_security_head" valign="top">
                <th scope="row" class="sp_wp_security_th">
                    <p><strong><label for="sp_wp_security_emojis"><i class="fa fa-smile-o" aria-hidden="true"></i>
                        <?php echo __('Remove Emoji', 'sp_wp_security'); ?>:
                    </label></strong></p>
                    <p><?php echo __('Remove Emoji Styles and Scripts', 'sp_wp_security'); ?></p>
                </th>
                <td>
                    <?php $sp_wp_security_emojis = get_option('sp_wp_security_emojis'); ?>
                    <input type="radio" name="sp_wp_security_emojis" id="sp_wp_security_emojis_y" class="sp_radio sp_enable" value="y" <?php if($sp_wp_security_emojis=='y'){echo"checked";} ?>>
                    <label for="sp_wp_security_emojis_y"></label>
                    <?php echo __('yes', 'sp_wp_security'); ?><br><br>
                    <input type="radio" name="sp_wp_security_emojis" id="sp_wp_security_emojis_n" class="sp_radio sp_disable" value="n" <?php if($sp_wp_security_emojis=='n'){echo"checked";} ?>>
                    <label for="sp_wp_security_emojis_n"></label>
                    <?php echo __('no', 'sp_wp_security'); ?>
                </td>
            </tr>
          
          	<tr class="sp_wp_security_head" valign="top">
                <th scope="row" class="sp_wp_security_th">
                    <p><strong><label for="sp_wp_security_comments"><i class="fa fa-comments" aria-hidden="true"></i>
                        <?php echo __('Comments links', 'sp_wp_security'); ?>:
                    </label></strong></p>
                    <p><?php echo __('Remove Author&#8242;s Link and Disable Auto Link', 'sp_wp_security'); ?></p>
                </th>
                <td>
                    <?php $sp_wp_security_comments = get_option('sp_wp_security_comments'); ?>
                    <input type="radio" name="sp_wp_security_comments" id="sp_wp_security_comments_y" class="sp_radio sp_enable" value="y" <?php if($sp_wp_security_comments=='y'){echo"checked";} ?>>
                    <label for="sp_wp_security_comments_y"></label>
                    <?php echo __('yes', 'sp_wp_security'); ?><br><br>
                    <input type="radio" name="sp_wp_security_comments" id="sp_wp_security_comments_n" class="sp_radio sp_disable" value="n" <?php if($sp_wp_security_comments=='n'){echo"checked";} ?>>
                    <label for="sp_wp_security_comments_n"></label>
                    <?php echo __('no', 'sp_wp_security'); ?>
                </td>
            </tr>
        </table>
        <p><input type="submit" value="<?php echo __( 'Save', 'sp_wp_security' ); ?>" class="button-primary"/></p>
	</form>
<?php	
}
