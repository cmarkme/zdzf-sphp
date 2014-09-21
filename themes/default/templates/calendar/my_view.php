<?php load_header() ?>
<h1>My Reservations</h1>

<?php if ($this->session->flashdata('calendar')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('calendar') ?></p>
	</div>
<?php endif ?>

<div class="tabs">
	<ul>
		<li><a href="#calendar">Calendar</a></li>
		<li><a href="#list">List</a></li>
	</ul>
	
	<div id="calendar">
	<?php 
	echo $this->calendar->generate($this->uri->segment(4), $this->uri->segment(5), $caldata);
	?>
	</div>
	<div id="list">
		<?php echo $this->pagination->create_links(); ?>
		
		<?php echo form_open(site_url('calendar')) ?>

		<table cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
					<th>Created By <?php echo get_sort_link('calendar', 'created_by', '#list'); ?></th>
					<th>Person In Charge <?php echo get_sort_link('calendar', 'person_in_charge', '#list'); ?></th>
					<th>Resource <?php echo get_sort_link('calendar', 'room', '#list'); ?></th>
					<th>Start Time <?php echo get_sort_link('calendar', 'start_time', '#list'); ?></th>
					<th>End Time <?php echo get_sort_link('calendar', 'end_time', '#list'); ?></th>
					<th>Description <?php echo get_sort_link('calendar', 'description', '#list'); ?></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($resource_list) && sizeof($resource_list) > 0): foreach($resource_list as $list): ?>
				<?php 
				$created_by = get_user_by_id($list->created_by);
				$person_in_charge = get_user_by_id($list->person_in_charge);
				?>
				<tr class="ui-helper-reset">
					<td><?php echo $created_by->meta['first_name'].' '.$created_by->meta['last_name']; ?></td>
					<td><?php echo $person_in_charge->meta['first_name'].' '.$person_in_charge->meta['last_name']; ?></td>
					<td><?php echo $list->room; ?></td>
					<td><?php echo datetime_for_display($list->start_time); ?></td>
					<td><?php echo datetime_for_display($list->end_time); ?></td>
					<td><?php echo $list->description; ?></td>

					<td>
						<?php if(can_this_user('calendar/edit/all') || can_this_user('calendar/edit')): ?>
						<?php echo anchor('calendar/edit/'.$list->ID, 'edit'); ?> 
						<?php endif; ?>
						
						<?php if(can_this_user('calendar/delete/all') || can_this_user('calendar/delete')): ?>
						<?php echo anchor('calendar/delete/'.$list->ID, 'delete', array('class' => 'delete')); ?>
						<?php endif; ?>
					</td>
				</tr>
				<?php endforeach; else: ?>
				<tr class="ui-helper-reset">
					<td colspan="7">
						<h2><?php echo $this->config->item('empty_message') ?></h2>
					</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>

		<?php echo $this->pagination->create_links(); ?>

		<?php echo form_close(); ?>
	</div>
</div>
<?php load_footer() ?>