<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/constant-contact/gExtra/gConstantcontact.js"></script>
<?php if(get_option('gConstantcontact_widget_username')<>"enter username") { ?>
<div>
  <div></div>
  <?php if(get_option('gConstantcontact_widget_caption')<>"") { ?>
  <div style="padding-top:5px;"><?php echo get_option('gConstantcontact_widget_caption'); ?></div>
  <?php } ?>
  <div style="padding-top:5px;"><span id="gConstantcontact_msg"></span></div>
  <div style="padding-top:5px;">
    <input style="<?php echo get_option('gConstantcontact_widget_textbox_style'); ?>" name="gConstantcontact_email" id="gConstantcontact_email" onkeypress="if(event.keyCode==13) gConstantcontact('<?php echo get_option('siteurl'); ?>/wp-content/plugins/gConstantcontact/gCls/')" onblur="if(this.value=='') this.value='<?php echo get_option('gConstantcontact_widget_with_in_textbox'); ?>';" onfocus="if(this.value=='<?php echo get_option('gConstantcontact_widget_with_in_textbox'); ?>') this.value='';" value="<?php echo get_option('gConstantcontact_widget_with_in_textbox'); ?>" maxlength="120" type="text">
  </div>
  <div style="padding-top:5px;">
    <input style="<?php echo get_option('gConstantcontact_widget_button_style'); ?>" type="button" name="gConstantcontact_Button" onClick="return gConstantcontact('<?php echo get_option('siteurl'); ?>/wp-content/plugins/constant-contact/gCls/')" id="gConstantcontact_Button" value="<?php echo get_option('gConstantcontact_widget_button'); ?>">
  </div>
</div>
<?php } else  { ?>
<div align="center" style="padding-top:10px">Under Construction.</div>
<?php } ?>