<?php load_header() ?>
<style>
    #menu_area {
        display: none;
    }
    #body {
    	margin: 0;
    }
    #content {
    	position: static;
    }
</style>
<script>
$(document).ready(function() {
	var usr = 'Username';
	var pwd = 'Password';

	$('#usr, #pwd').focus(function() {
		var this_val = $(this).val();
		if((this_val == usr) || (this_val == pwd)) {
			$(this).val('');
		}
	});
});
</script>
<?php 
if(validation_errors()) {
	echo '<div id="errors">';
	echo validation_errors('<div class="ui-state-error ui-corner-all"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>', '</p></div>');
	echo '</div>';
}
?>

<div class="ui-widget-overlay"></div>
<div class="ui-widget-shadow ui-corner-all login-shadow"></div>
<div class="ui-widget ui-widget-content ui-corner-all login-box">
	
	<?php echo img(array('src' => 'application/views/images/logo_alz_full.png', 'id' => 'alz_logo_full')); ?>
	

	<h3>Please Login</h3>
	<div class="boxBody">
	
		<?php echo form_open('login'); ?>
		<p><?php echo form_input(array('name'=>'usr', 'id'=>'usr', 'value'=>set_value('usr', 'Username'), 'style'=>'width:100%;' ));?></p>
		<p><?php echo form_password(array('name'=>'pwd', 'id'=>'pwd', 'value'=>'Password', 'style'=>'width:100%;' ));?></p>
		<p><?php echo form_submit('submit_login', 'Login');?></p>
		<?php echo form_close();?>
	</div>
</div>


<?php load_footer() ?>
