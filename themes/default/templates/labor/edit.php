<?php load_header() ?>

<?php if ($this->session->flashdata('labor')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('labor') ?></p>
	</div>
<?php endif ?>

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
					<td>
						<?php $ledger = explode('-', $account->ledger); ?>
						<?php echo form_input('ledger_section[]', $ledger[0], 'size="1" maxlength="1" style="width: auto;"'); ?> - 
						<?php echo form_input('ledger_section[]', $ledger[1], 'size="3" maxlength="3" style="width: auto;"'); ?> - 
						<?php echo form_hidden('ledger_section[]', 'gl_account', 'size="4" maxlength="4" style="width: auto;"'); ?> gl_account - 
						<?php echo form_input('ledger_section[]', $ledger[3], 'size="1" maxlength="1" style="width: auto;"'); ?> - 
						<?php echo form_input('ledger_section[]', $ledger[4], 'size="2" maxlength="2" style="width: auto;"'); ?> - 
						<?php echo form_input('ledger_section[]', $ledger[5], 'size="3" maxlength="4" style="width: auto;"'); ?> - 
						<?php echo form_input('ledger_section[]', $ledger[6], 'size="4" maxlength="3" style="width: auto;"'); ?>
					</td>
				</tr>
				<!-- <tr>
					<th>Project:</th>
					<td><?php echo form_input('project', $account->project, 'maxlength="3"'); ?></td>
				</tr>
				<tr>
					<th>Grant:</th>
					<td><?php echo form_input('grant', $account->grant, 'maxlength="4"'); ?></td>
				</tr>
				<tr>
					<th>Location:</th>
					<td><?php echo form_dropdown('location', $locations, $account->location); ?></td>
				</tr> -->
				<tr>
					<th>Description:</th>
					<td><?php echo form_textarea('description', $account->description) ?></td>
				</tr>
				<tr>
					<th>Status:</th>
					<td><?php echo form_dropdown('status', array('Y' => 'Active', 'N' => 'Inactive'), $account->status); ?></td>
				</tr>
				<tr>
					<th>Used For:</th>
					<td>
						<table celpadding="4" border="0" cellspacing="0">
							<tr>
								<td>Timesheet: <?php echo form_checkbox('timesheet', 'on', ($account->timesheet == 'on') ? true : false); ?></td>
								<td>Travel: <?php echo form_checkbox('travel', 'on', ($account->travel == 'on') ? true : false); ?></td>
							</tr>
							<tr>
								<td>Financials: <?php echo form_checkbox('financials', 'on', ($account->financials == 'on') ? true : false); ?></td>
								<td>Procurement: <?php echo form_checkbox('procurement', 'on', ($account->procurement == 'on') ? true : false); ?></td>
							</tr>
						</table>
					</td>
				</tr>
			</tbody>
		</table>

	</div>
</div>

<p class="clear"><?php echo form_submit('upate', 'Update Account') ?></p>
<?php echo form_hidden('update_account', $account->ID) ?>
<?php echo form_close(); ?>
<?php load_footer() ?>