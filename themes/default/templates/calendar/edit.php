<?php load_header(); ?>

<?php if ($this->session->flashdata('calendar')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('calendar') ?></p>
	</div>
<?php endif ?>

<h1>Current Orders</h1>

<?php echo form_open('calendar/edit/'.$event->ID); ?>
<div class="ui-block wide">
	<h3><a href="#">Order Details</a></h3>
	<div>
		<table border="0" cellspacing="0">
			<tr>
				<th><label for="created_by">Person Creating Reservation</label></th>
				<td><?php echo $users[$event->created_by]; ?></td>
			</tr>
			<tr>
				<th><label for="person_in_charge">Person in Charge</label></th>
				<td><?php echo form_dropdown('person_in_charge', $users, $event->person_in_charge); ?></td>
			</tr>
			<tr>
				<th><label for="room">Resource</label></th>
				<td><?php echo form_dropdown('room', $resources, $event->room); ?></td>
			</tr>
			<tr>
				<th><label for="date">Start Date</label></th>
				<td><?php echo form_input('start_time', datetime_for_display($event->start_time), 'class="datetimepicker-from required"'); ?></td>
			</tr>
			<tr>
				<th><label for="date">End Date</label></th>
				<td><?php echo form_input('end_time', datetime_for_display($event->end_time), 'class="datetimepicker-to required"'); ?></td>
			</tr>
			<tr>
				<th><label for="description">Description</label></th>
				<td><?php echo form_textarea('description', $event->description, 'class="required"'); ?></td>
			</tr>
		</table>
	</div>
	<p id="button_area">
		<?php if(can_this_user('calendar/edit/all') || (can_this_user('calendar/edit') && (in_array($event->person_in_charge, $manage) || in_array($event->created_by, $manage)))): ?>
		<?php echo form_submit('save_reserve', 'Update Reservation'); ?>
		<?php endif; ?>
		
		<?php if(can_this_user('calendar/delete/all') || (can_this_user('calendar/delete') && (in_array($event->person_in_charge, $manage) || in_array($event->created_by, $manage)))): ?>
		<?php echo anchor('calendar/delete/'.$event->ID, 'Delete Entry', 'class="delete ui-button ui-widget ui-state-default ui-corner-all" style="padding: .4em 1em;"'); ?>
		<?php endif ?>
	</p>
</div>
<?php echo form_hidden('save_reservation', 'save_reservation'); ?>
<?php echo form_close(); ?>
<?php load_footer(); ?>