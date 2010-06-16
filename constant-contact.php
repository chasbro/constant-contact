<?php

/*
Plugin Name: Constant Contact
Plugin URI: http://gopi.coolpage.biz/demo/2009/07/18/constant-contact/
Description: This constant contact plug-in is created to create constant-contact widget; this constant-contact widget will add the Subscriber email address into site admin constantcontact.com account with mentioned group...
Author: Gopi.R
Version: 4.0
Author URI: http://gopi.coolpage.biz/demo/about/
Donate link: http://gopi.coolpage.biz/demo/2009/07/18/constant-contact/
*/

//########################################################################################
//###### Project   : constant-contact integration with word press  					######
//###### File Name : constant-contact.php                   						######
//###### Purpose   : plugin main page												######
//###### Created   : June 20th 2009                  								######
//###### Updated   : June 16th 2010                  								######
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
	add_option('gConstantcontact_widget_button_style', "");
	add_option('gConstantcontact_widget_textbox_style', "");
	add_option('gConstantcontact_widget_with_in_textbox', "Enter email address.");
	add_option('gConstantcontact_widget_button', "Submit");
}

function widget_gConstantcontact_admin_options() 
{
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
	echo '<p>Constant Contact.<br> To change the setting goto Constant Contact link under SETTING tab.';
	echo ' <a href="options-general.php?page=constant-contact/constant-contact.php">';
	echo 'click here</a></p>';
}

function gConstantcontact_admin_options()
{
	
	?>
    <div class="wrap">
    <?php
    $title = __('Constant Contact (Subscribe Newsletter)');
    $mainurl = get_option('siteurl')."/wp-admin/options-general.php?page=constant-contact/constant-contact.php";
    ?>
    <h2><?php echo wp_specialchars( $title ); ?></h2>
    </div>
    <?php

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
	
	?>
	<form name="gConstantcontact_form" method="post" action="">
	<table width="100%" border="0" cellspacing="0" cellpadding="3"><tr><td align="left">
	<?php

	echo '<p>Constant contact username:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_username . '" name="gConstantcontact_widget_username" id="gConstantcontact_widget_username" /></p>';

	echo '<p>Constant contact password:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_password . '" name="gConstantcontact_widget_password" id="gConstantcontact_widget_password" /></p>';

	echo '<p>Constant contact group:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_group . '" name="gConstantcontact_widget_group" id="gConstantcontact_widget_group" /></p>';
	
	echo '<p>Header title:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_title . '" name="gConstantcontact_widget_title" id="gConstantcontact_widget_title" /></p>';
	
	echo '<p>Word within text box:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_with_in_textbox . '" name="gConstantcontact_widget_with_in_textbox" id="gConstantcontact_widget_with_in_textbox" /></p>';	
	
	echo '<p>Button caption:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_button . '" name="gConstantcontact_widget_button" id="gConstantcontact_widget_button" /></p>';
	
	echo '<p>Top text:<br><input  style="width: 350px;" type="text" value="';
	echo $gConstantcontact_caption . '" name="gConstantcontact_widget_caption" id="gConstantcontact_widget_caption" /></p>';
	
	echo '<p>Text Box Style:<br><input  style="width: 350px;" type="text" value="';
	echo $gConstantcontact_textbox_style . '" name="gConstantcontact_widget_textbox_style" id="gConstantcontact_widget_textbox_style" /></p>';
	
	echo '<p>Button Style:<br><input  style="width: 350px;" type="text" value="';
	echo $gConstantcontact_button_style . '" name="gConstantcontact_widget_button_style" id="gConstantcontact_widget_button_style" /></p>';

	
	echo '<input id="gConstantcontact_submit" name="gConstantcontact_submit" lang="publish" class="button-primary" value="Update Setting" type="Submit" />';	
	
	?>
	</td><td align="center" valign="middle"> <?php if (function_exists (timepass)) timepass(); ?> </td></tr></table>
	</form>
    <hr />
    We can use this plug-in in two different way.<br />
	1.	Go to widget menu and drag and drop the 'constant-contact' widget to your sidebar location. or <br />
	2.	Copy and past the below mentioned code to your desired template location.

    <h2><?php echo wp_specialchars( 'Paste the below code to your desired template location!' ); ?></h2>
    <div style="padding-top:7px;padding-bottom:7px;">
    <code style="padding:7px;">
    &lt;?php if (function_exists (gConstantcontact)) gConstantcontact(); ?&gt;
    </code></div>
    <h2><?php echo wp_specialchars( 'About Plugin' ); ?></h2>
    Plug-in created by <a target="_blank" href='http://gopi.coolpage.biz/demo/about/'>Gopi</a>. <br /> 
    <a target="_blank" href='http://gopi.coolpage.biz/demo/2009/07/18/constant-contact/'>click here</a> to post suggestion or comments or how to improve this plugin.  <br /> 
    <a target="_blank" href='http://gopi.coolpage.biz/demo/2009/07/18/constant-contact/'>click here</a> to see LIVE demo & More info.  <br /> 
    <a target="_blank" href='http://gopi.coolpage.biz/demo/2009/07/18/constant-contact/'>click here</a> To download my other plugins.  <br /> 
    <h2>Do I need a Constant Contact account for this widget?</h2>
	Yes, you need to have a Constant Contact account. <br />If you don't have one, you can sign up for a free trial account. <br />
    <a target="_blank" href="http://www.constantcontact.com/">Learn more about Constant Contact & sign up </a>
	<?php

}

function gConstantcontact_plugins_loaded()
{
  	register_sidebar_widget(__('constant-contact'), 'widget_gConstantcontact');   
	
	if(function_exists('register_sidebar_widget')) 
	{
		register_sidebar_widget('constant-contact', 'widget_gConstantcontact');
	}
	
	if(function_exists('register_widget_control')) 
	{
		register_widget_control(array('constant-contact', 'widgets'), 'gConstantcontact_widget_control');
	} 
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

function gConstantcontact_add_to_menu() 
{
	add_options_page('Software - Plugin - widget | Constant contact', 'constant-contact', 7, __FILE__, 'gConstantcontact_admin_options' );
}

register_activation_hook(__FILE__, 'gConstantcontact_activation');
add_action("plugins_loaded", "gConstantcontact_plugins_loaded");
register_deactivation_hook( __FILE__, 'gConstantcontact_deactivate' );
add_action('admin_menu', 'gConstantcontact_add_to_menu');
?>