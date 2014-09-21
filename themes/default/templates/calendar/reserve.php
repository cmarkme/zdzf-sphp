<?php load_header(); ?>

<?php if ($this->session->flashdata('calendar')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('calendar') ?></p>
	</div>
<?php endif ?>

<h1>Current Orders</h1>

<?php echo form_open('calendar/reserve'); ?>
<div class="ui-block wide">
	<h3><a href="#">Order Details</a></h3>
	<div>
		<table border="0" cellspacing="0">
			<tr>
				<th><label for="created_by">Person Creating Reservation</label></th>
				<td><?php echo $users[$this->user->ID] . form_hidden('created_by', $this->user->ID, 'class="required"'); ?></td>
			</tr>
			<tr>
				<th><label for="person_in_charge">Person in Charge</label></th>
				<td><?php echo form_dropdown('person_in_charge', $users, $this->user->ID, 'class="required"'); ?></td>
			</tr>
			<tr>
				<th><label for="room">Resource</label></th>
				<td><?php echo form_dropdown('room', $resources, '', 'class="required"'); ?></td>
			</tr>
			<tr>
				<th><label for="date">Start Date</label></th>
				<td><?php echo form_input('start_time', date('m/d/Y').' 08:30 am', 'class="datetimepicker-from required"'); ?></td>
			</tr>
			<tr>
				<th><label for="date">End Date</label></th>
				<td><?php echo form_input('end_time', date('m/d/Y').' 09:00 am', 'class="datetimepicker-to required"'); ?></td>
			</tr>
			<tr>
				<th><label for="description">Description</label></th>
				<td><?php echo form_textarea('description', '', 'class="required"'); ?></td>
			</tr>
		</table>
	</div>
	<p><?php echo form_submit('save_reserve', 'Save Reservation'); ?></p>
</div>
<?php echo form_hidden('save_reservation', 'save_reservation'); ?>
<?php echo form_close(); ?>
<?php load_footer(); ?>