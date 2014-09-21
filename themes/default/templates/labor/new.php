<?php load_header() ?>

<?php if ($this->session->flashdata('labor')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('labor') ?></p>
	</div>
<?php endif ?>

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
					<td>
						<?php echo form_input('ledger_section[]', '', 'size="1" maxlength="1" style="width: auto;"'); ?> - 
						<?php echo form_input('ledger_section[]', '', 'size="3" maxlength="3" style="width: auto;"'); ?> - 
						<?php echo form_hidden('ledger_section[]', 'gl_account', 'size="4" maxlength="4" style="width: auto;"'); ?> gl_account - 
						<?php echo form_input('ledger_section[]', '', 'size="1" maxlength="1" style="width: auto;"'); ?> - 
						<?php echo form_input('ledger_section[]', '', 'size="2" maxlength="2" style="width: auto;"'); ?> - 
						<?php echo form_input('ledger_section[]', '', 'size="3" maxlength="4" style="width: auto;"'); ?> - 
						<?php echo form_input('ledger_section[]', '', 'size="4" maxlength="3" style="width: auto;"'); ?>
					</td>
				</tr>
				<!-- <tr>
					<th>Project:</th>
					<td><?php echo form_input('project', '', 'maxlength="3"'); ?></td>
				</tr>
				<tr>
					<th>Grant:</th>
					<td><?php echo form_input('grant', '', 'maxlength="4"'); ?></td>
				</tr>
				<tr>
					<th>Location:</th>
					<td><?php echo form_dropdown('location', $locations); ?></td>
				</tr> -->
				<tr>
					<th>Description:</th>
					<td><?php echo form_textarea('description') ?></td>
				</tr>
				<tr>
					<th>Status:</th>
					<td><?php echo form_dropdown('status', array('Y' => 'Active', 'N' => 'Inactive')); ?></td>
				</tr>
				<tr>
					<th>Used For:</th>
					<td>
						<table celpadding="4" border="0" cellspacing="0">
							<tr>
								<td>Timesheet: <?php echo form_checkbox('timesheet', 'on'); ?></td>
								<td>Travel: <?php echo form_checkbox('travel', 'on'); ?></td>
							</tr>
							<tr>
								<td>Financials: <?php echo form_checkbox('financials', 'on'); ?></td>
								<td>Procurement: <?php echo form_checkbox('procurement', 'on'); ?></td>
							</tr>
						</table>
					</td>
				</tr>
			</tbody>
		</table>

	</div>
</div>

<p class="clear"><?php echo form_submit('upate', 'Insert Account') ?></p>
<?php echo form_hidden('insert_account', 'true'); ?>
<?php echo form_close(); ?>

<script type="text/javascript">
$('form input').keyup(function() {
	var $t = $(this),
	max = parseInt($t.attr('maxlength')),
	val = $t.val(),
	inputs = $t.closest('form').find(':input');
	
	if(val.length == max)
	{
		inputs.eq( inputs.index(this)+ 1 ).focus();
	}
});
</script>

<?php load_footer() ?>