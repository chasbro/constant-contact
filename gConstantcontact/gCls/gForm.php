<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/gConstantcontact/gExtra/gConstantcontact.js"></script>
<?php if(get_option('gConstantcontact_widget_username')<>"enter username") { ?>
<div align="center">
  <div style="padding:2px 0;"></div>
  <?php if(get_option('gConstantcontact_widget_caption')<>"") { ?>
  <div style="padding:3px 0;"><?php echo get_option('gConstantcontact_widget_caption'); ?></div>
  <?php } ?>
  <div style=""><span id="gConstantcontact_msg"></span></div>
  <div style="padding:8px 0;">
    <input style="<?php echo get_option('gConstantcontact_widget_textbox_style'); ?>" name="gConstantcontact_email" id="gConstantcontact_email" onkeypress="if(event.keyCode==13) gConstantcontact('<?php echo get_option('siteurl'); ?>/wp-content/plugins/gConstantcontact/gCls/')" onblur="if(this.value=='') this.value='<?php echo get_option('gConstantcontact_widget_with_in_textbox'); ?>';" onfocus="if(this.value=='<?php echo get_option('gConstantcontact_widget_with_in_textbox'); ?>') this.value='';" value="<?php echo get_option('gConstantcontact_widget_with_in_textbox'); ?>" maxlength="120" type="text">
  </div>
  <div style="padding:5px 0;">
    <input style="<?php echo get_option('gConstantcontact_widget_button_style'); ?>" type="button" name="gConstantcontact_Button" onClick="return gConstantcontact('<?php echo get_option('siteurl'); ?>/wp-content/plugins/gConstantcontact/gCls/')" id="gConstantcontact_Button" value="<?php echo get_option('gConstantcontact_widget_button'); ?>">
  </div>
</div>
<?php } else  { ?>
<div align="center" style="padding:10px 0;">Under Construction.</div>
<?php } ?>