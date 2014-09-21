<?php load_header() ?>
<h1>Edit Timeoff Request</h1>

<div class="ui-block wide">
	<h3><a href="#">Request info</a></h3>
	<div>
		<?php echo form_open(site_url('timeoff/edit/'.$this->uri->segment('3'))) ?>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th style="width: 150px;">For</th>
					<td>
						<?php echo @$user->meta['first_name'].' '.@$user->meta['last_name']; ?>
						<?php echo form_hidden('first_name', $user->meta['first_name']); ?>
						<?php echo form_hidden('last_name', $user->meta['last_name']); ?>
					</td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Current Status</th>
					<td><?php echo form_dropdown('current_status', array('In Process' => 'In Process', 'Submitted for Approval' => 'Submitted for Approval', 'Approved' => 'Approved'), $timeoff_request->current_status, 'class="set_status"'); ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th style="width: 150px;">Manager</th>
					<td>
						<?php echo @$user->manager['first_name'].' '.@$user->manager['last_name']; ?>
						<?php echo form_hidden('manager', $user->user_manager); ?>
					</td>
				</tr>

				<tr class="manager_sig<?php echo (($timeoff_request->current_status != 'Approved') ? ' hidden' : ''); ?>">
					<th>Manager Signature</th>
					<td><?php echo form_input('manager_signature', @$timeoff_request->manager_signature); ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Request Type</th>
					<td><?php echo form_dropdown('request_type', array('Vacation' => 'Vacation','Sick Time','Personal' => 'Sick Time','Personal' => 'Personal','Comp Time' => 'Comp Time','Bereavement' => 'Bereavement','Time Off w/o Pay' => 'Time Off w/o Pay','Combination' => 'Combination'), $timeoff_request->request_type) ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th valign="top" style="padding-top: 5px;">If Combination please specify</th>
					<td><?php echo form_textarea('combination', $timeoff_request->combination); ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Number of Days or Hours</th>
					<td><?php echo form_input('days_or_hours', $timeoff_request->days_or_hours) ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>From</th>
					<td><?php echo form_input('request_start', date_for_display($timeoff_request->request_start), 'class="datepicker"') ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>To</th>
					<td><?php echo form_input('request_end', date_for_display($timeoff_request->request_end), 'class="datepicker"') ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th valign="top" style="padding-top: 5px;">Comments</th>
					<td><?php echo form_textarea('comments', $timeoff_request->comments) ?></td>
				</tr>
			</tbody>
		</table>

		<p>
			<?php echo form_hidden('update_timeoff_request', 'true'); ?>
			<?php echo form_submit('submit_request', 'Save') ?>
			<?php echo form_submit('submit_request', 'Submit for Approval', 'class="submit-approval" id="timeoff_approval"') ?>
		</p>
		<?php echo form_close(); ?>
	</div>
</div>
<?php load_footer() ?>