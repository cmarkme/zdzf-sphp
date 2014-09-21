<?php load_header() ?>
<h1>New Account</h1>

<?php echo form_open(site_url('labor/new_account/')) ?>

<?php //start generall information block ?>
<div class="ui-block wide">
	<h3><a href="#">Account Information</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th>Ledger:</th>
					<td><?php echo form_input('ledger'); ?></td>
				</tr>
				<tr>
					<th>Project:</th>
					<td><?php echo form_input('project'); ?></td>
				</tr>
				<tr>
					<th>Grant:</th>
					<td><?php echo form_input('grant'); ?></td>
				</tr>
				<tr>
					<th>Location:</th>
					<td><?php echo form_dropdown('location', array('WILS' => 'WILS','GSFV' => 'GSFV','GELA' => 'GELA','IE' => 'IE','RM' => 'RM')); ?></td>
				</tr>
				<tr>
					<th>Description:</th>
					<td><?php echo form_textarea('description') ?></td>
				</tr>
				<tr>
					<th>Status:</th>
					<td><?php echo form_dropdown('status', array('Y' => 'Active', 'N' => 'Inactive')); ?></td>
				</tr>
			</tbody>
		</table>

	</div>
</div>

<p class="clear"><?php echo form_submit('upate', 'Insert Account') ?></p>
<?php echo form_hidden('insert_account', 'true'); ?>
<?php echo form_close(); ?>
<?php load_footer() ?>