<?

/*
Plugin Name: Constant Contact
Plugin URI: http://gopi.coolpage.biz/gConstantcontact/gConstantcontact.html
Description: This gConstantcontact plug-in is created to create gConstantcontact widget; this gConstantcontact widget will add the Subscriber email address into site admin constantcontact.com account with mentioned group  <a href="../wp-content/plugins/gConstantcontact/gHelp/gConstantcontact.html" target="_blank">Help</a>...
Author: Gopi R
Version: 1.0
Author URI: http://gopi.coolpage.biz/gConstantcontact/gConstantcontact.html
*/

//########################################################################################
//###### Project   : Constant contact integration with word press  					######
//###### File Name : gConstantcontact.php                   						######
//###### Purpose   : plugin main page												######
//###### Date      : June 20th 2009                  								######
//###### Author    : Gopi.R                        									######
//###### Thanks to constantcontact.com who gave sample account to test this plugin	######
//########################################################################################


global $wpdb, $wp_version;

function gConstantcontact()
{
	include_once("gCls/gForm.php");
}

function gConstantcontact_activation()
{
	global $wpdb;
	
	add_option('gConstantcontact_widget_username', "enter username");
	add_option('gConstantcontact_widget_password', "enter password");
	add_option('gConstantcontact_widget_group', "General Interest");
	
	add_option('gConstantcontact_widget_title', "Newsletter");
	add_option('gConstantcontact_widget_caption', "Monthly Hints & Tips newsletter ");
	add_option('gConstantcontact_widget_button_style', "cursor:pointer;font-family:Verdana;font-size: 11px;font-weight: bold;color:#000000;background-color:#CCCCCC;border:#CCCCCC;height:25px;width:70px;");
	add_option('gConstantcontact_widget_textbox_style', "font-family:Verdana;font-size: 12px;color: #000000;background-color: #FFFFFF;border: thin groove #CCCCCC;width:150px;height:18px;");
	add_option('gConstantcontact_widget_with_in_textbox', "Enter email address.");
	add_option('gConstantcontact_widget_button', "Submit");
}

function widget_gConstantcontact_admin_options() 
{
	?>
    <div class="wrap">
    <?php
    $title = __('Subscribe Newsletter');
    $mainurl = get_option('siteurl')."/wp-admin/options-general.php?page=gConstantcontact/gConstantcontact.php";
    ?>
    <h2><?php echo wp_specialchars( $title ); ?></h2>
    </div>
    <?
}

function widget_gConstantcontact($args) 
{
  extract($args);
  echo $before_widget;
  echo $before_title;
  echo get_option('gConstantcontact_widget_title');
  echo $after_title;
  gConstantcontact();
  echo $after_widget;
}

function gConstantcontact_widget_control() 
{
	$gConstantcontact_username = get_option('gConstantcontact_widget_username');
	$gConstantcontact_password = get_option('gConstantcontact_widget_password');
	$gConstantcontact_group = get_option('gConstantcontact_widget_group');
	
	$gConstantcontact_title = get_option('gConstantcontact_widget_title');
	$gConstantcontact_caption = get_option('gConstantcontact_widget_caption');
	$gConstantcontact_button_style = get_option('gConstantcontact_widget_button_style');
	$gConstantcontact_textbox_style = get_option('gConstantcontact_widget_textbox_style');
	$gConstantcontact_with_in_textbox = get_option('gConstantcontact_widget_with_in_textbox');
	$gConstantcontact_button = get_option('gConstantcontact_widget_button');
	
	if ($_POST['gConstantcontact_submit']) 
	{	
		$gConstantcontact_username = stripslashes(trim($_POST['gConstantcontact_widget_username']));
		$gConstantcontact_password = stripslashes(trim($_POST['gConstantcontact_widget_password']));
		$gConstantcontact_group = stripslashes(trim($_POST['gConstantcontact_widget_group']));		
		
		$gConstantcontact_title = stripslashes(trim($_POST['gConstantcontact_widget_title']));
		$gConstantcontact_caption = stripslashes(trim($_POST['gConstantcontact_widget_caption']));
		$gConstantcontact_button_style = stripslashes(trim($_POST['gConstantcontact_widget_button_style']));
		$gConstantcontact_textbox_style = stripslashes(trim($_POST['gConstantcontact_widget_textbox_style']));
		$gConstantcontact_with_in_textbox = stripslashes(trim($_POST['gConstantcontact_widget_with_in_textbox']));
		$gConstantcontact_button = stripslashes(trim($_POST['gConstantcontact_widget_button']));
		
		update_option('gConstantcontact_widget_username', $gConstantcontact_username );
		update_option('gConstantcontact_widget_password', $gConstantcontact_password );
		update_option('gConstantcontact_widget_group', $gConstantcontact_group );
		
		update_option('gConstantcontact_widget_title', $gConstantcontact_title );
		update_option('gConstantcontact_widget_caption', $gConstantcontact_caption );
		update_option('gConstantcontact_widget_button_style', $gConstantcontact_button_style );
		update_option('gConstantcontact_widget_textbox_style', $gConstantcontact_textbox_style );
		update_option('gConstantcontact_widget_with_in_textbox', $gConstantcontact_with_in_textbox );
		update_option('gConstantcontact_widget_button', $gConstantcontact_button );
	}
	
	echo '<p>Constant contact username:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_username . '" name="gConstantcontact_widget_username" id="gConstantcontact_widget_username" /></p>';

	echo '<p>Constant contact password:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_password . '" name="gConstantcontact_widget_password" id="gConstantcontact_widget_password" /></p>';

	echo '<p>Constant contact group:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_group . '" name="gConstantcontact_widget_group" id="gConstantcontact_widget_group" /></p>';
	
	echo '<p>Header title:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_title . '" name="gConstantcontact_widget_title" id="gConstantcontact_widget_title" /></p>';
	
	echo '<p>Top text:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_caption . '" name="gConstantcontact_widget_caption" id="gConstantcontact_widget_caption" /></p>';
	
	echo '<p>Text Box Style:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_textbox_style . '" name="gConstantcontact_widget_textbox_style" id="gConstantcontact_widget_textbox_style" /></p>';
	
	echo '<p>Button Style:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_button_style . '" name="gConstantcontact_widget_button_style" id="gConstantcontact_widget_button_style" /></p>';
	
	echo '<p>Word within text box:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_with_in_textbox . '" name="gConstantcontact_widget_with_in_textbox" id="gConstantcontact_widget_with_in_textbox" /></p>';	
	
	echo '<p>Button caption:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_button . '" name="gConstantcontact_widget_button" id="gConstantcontact_widget_button" /></p>';
	
	echo '<input type="hidden" id="gConstantcontact_submit" name="gConstantcontact_submit" value="1" />';	
}


function gConstantcontact_plugins_loaded()
{
  	register_sidebar_widget(__('gConstantcontact'), 'widget_gConstantcontact');   
	
	if(function_exists('register_sidebar_widget')) 
	{
		register_sidebar_widget('gConstantcontact', 'widget_gConstantcontact');
	}
	
	if(function_exists('register_widget_control')) 
	{
		register_widget_control(array('gConstantcontact', 'widgets'), 'gConstantcontact_widget_control');
	} 
}

function gConstantcontact_add_to_menu() 
{
	add_options_page('gConstantcontact', 'gConstantcontact', 7, __FILE__, 'widget_gConstantcontact_admin_options' );
}

function gConstantcontact_deactivate() 
{
	delete_option('gConstantcontact_widget_username');
	delete_option('gConstantcontact_widget_password');
	delete_option('gConstantcontact_widget_group');
	
	delete_option('gConstantcontact_widget_title');
	delete_option('gConstantcontact_widget_caption');
	delete_option('gConstantcontact_widget_button_style');
	delete_option('gConstantcontact_widget_textbox_style');
	delete_option('gConstantcontact_widget_with_in_textbox');
	delete_option('gConstantcontact_widget_button');
}

register_activation_hook(__FILE__, 'gConstantcontact_activation');

//add_action('admin_menu', 'gConstantcontact_add_to_menu');
add_action("plugins_loaded", "gConstantcontact_plugins_loaded");
register_deactivation_hook( __FILE__, 'gConstantcontact_deactivate' );
?>