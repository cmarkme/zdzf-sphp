<?php load_header(); ?>

<?php if ($this->session->flashdata('timeoff')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('timeoff') ?></p>
	</div>
<?php endif ?>

<h1>View Timeoff Request</h1>

<div class="ui-block wide">
	<h3><a href="#">Request info</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th style="width: 150px;">For</th>
					<td>
						<div style="padding: 3px 5px;"><?php echo @$user->meta['first_name'].' '.@$user->meta['last_name']; ?></div>
					</td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Current Status</th>
					<td><div style="padding: 3px 5px;"><?php echo $timeoff_request->current_status; ?></div></td>
					
				</tr>

				<tr class="ui-helper-reset">
					<th style="width: 150px;">Manager</th>
					<td>
						<div style="padding: 3px 5px;"><?php echo @$user->manager['first_name'].' '.@$user->manager['last_name']; ?></div>
					</td>
				</tr>

				<tr class="manager_sig<?php echo (($timeoff_request->current_status != 'Approved') ? ' hidden' : ''); ?>">
					<th>Manager Signature</th>
					<td><div style="padding: 3px 5px;"><?php echo @$timeoff_request->manager_signature; ?></div></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Request Type</th>
					<td><div style="padding: 3px 5px;"><?php echo $timeoff_request->request_type; ?></div></td>
				</tr>

				<tr class="ui-helper-reset">
					<th valign="top" style="padding-top: 5px;">If Combination please specify</th>
					<td><div style="padding: 3px 5px;"><?php echo $timeoff_request->combination; ?></div></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Number of Days or Hours</th>
					<td><div style="padding: 3px 5px;"><?php echo $timeoff_request->days_or_hours; ?></div></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>From</th>
					<td><div style="padding: 3px 5px;"><?php echo date_for_display($timeoff_request->request_start) ?></div></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>To</th>
					<td><div style="padding: 3px 5px;"><?php echo date_for_display($timeoff_request->request_end) ?></div></td>
				</tr>

				<tr class="ui-helper-reset">
					<th valign="top" style="padding-top: 5px;">Comments</th>
					<td><div style="padding: 3px 5px;"><?php echo $timeoff_request->comments; ?></div></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<script>
$(document).ready(function()
{
	$(':input, select, textarea').attr("disabled", "disabled").addClass('disabled');
})
</script>

<?php load_footer() ?>