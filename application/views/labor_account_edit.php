<?php load_header() ?>
<h1>Edit Account: <?php echo $account->ledger ?></h1>

<?php echo form_open(site_url('labor/edit_account/'.$this->uri->segment('3'))) ?>

<?php //start generall information block ?>
<div class="ui-block wide">
	<h3><a href="#">Account Information</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th>Ledger:</th>
					<td><?php echo form_input('ledger', $account->ledger); ?></td>
				</tr>
				<tr>
					<th>Project:</th>
					<td><?php echo form_input('project', $account->project); ?></td>
				</tr>
				<tr>
					<th>Grant:</th>
					<td><?php echo form_input('grant', $account->grant); ?></td>
				</tr>
				<tr>
					<th>Location:</th>
					<td><?php echo form_dropdown('location', array('WILS' => 'WILS','GSFV' => 'GSFV','GELA' => 'GELA','IE' => 'IE','RM' => 'RM'), $account->location); ?></td>
				</tr>
				<tr>
					<th>Description:</th>
					<td><?php echo form_textarea('description', $account->description) ?></td>
				</tr>
				<tr>
					<th>Status:</th>
					<td><?php echo form_dropdown('status', array('Y' => 'Active', 'N' => 'Inactive'), $account->status); ?></td>
				</tr>
			</tbody>
		</table>

	</div>
</div>

<p class="clear"><?php echo form_submit('upate', 'Update Account') ?></p>
<?php echo form_hidden('update_account', $account->ID) ?>
<?php echo form_close(); ?>
<?php load_footer() ?>