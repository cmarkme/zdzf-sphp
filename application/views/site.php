<?php load_header() ?>
<style>
    #menu {
        display: none;
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

<div class="ui-block">
	<h3><a href="#">Recent Timeoff Request</a></h3>
	<div>
		<table width="100%" border="0" cellpadding="3" cellspacing="0" >
			<thead>
				<tr>
					<th>Name</th>
					<th>Date From</th>
					<th>Date To</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($timeoff_requests['rows'])): foreach($timeoff_requests['rows'] as $timeoff_request): ?>
				<tr>
					<td><?php echo $timeoff_request->first_name.' '.$timeoff_request->last_name; ?></td>
					<td><?php echo date_for_display($timeoff_request->request_start); ?></td>
					<td><?php echo date_for_display($timeoff_request->request_end); ?></td>
					<td><?php echo $timeoff_request->current_status; ?></td>
				</tr>
				<?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</div>
<div class="ui-block">
	<h3><a href="#">Recent Timesheet(s) Submitted</a></h3>
	<div>
		<table width="100%" border="0" cellpadding="3" cellspacing="0" >
			<thead>
				<tr>
					<th>Name</th>
					<th>Date From</th>
					<th>Date To</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($timesheets['rows'])): foreach($timesheets['rows'] as $timesheet): ?>
				<tr>
					<td><?php echo $timesheet->first_name.' '.$timesheet->last_name; ?></td>
					<td><?php echo date_for_display($timesheet->period_start); ?></td>
					<td><?php echo date_for_display($timesheet->period_end); ?></td>
					<td><?php echo $timesheet->current_status; ?></td>
				</tr>
				<?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</div>

<div id="calendar" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
	<center>
		<h2>Time off Calendar View</h2>
	</center>
<?php 
echo $this->calendar->generate($this->uri->segment(1), $this->uri->segment(2), $caldata);
?>
</div>
<?php load_footer() ?>