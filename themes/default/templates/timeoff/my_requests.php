<?php load_header(); ?>

<?php if ($this->session->flashdata('timeoff')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('timeoff') ?></p>
	</div>
<?php endif ?>

<h1>My Timeoff requests <?php if(can_this_user('timeoff/new_timeoff_request')) echo anchor('timeoff/new_timeoff_request', 'Add New', array('class' => 'button ui-helper-reset')); ?></h1>

<div class="ui-block wide">
	<h3><a href="#">My Recent Timeoff requests</a></h3>
	<div>
		<?php echo form_open(site_url('timeoff/my_timeoff_requests'), array('method' => 'get')) ?>
		<table cellpadding="0" cellspacing="0" border="0" style="width: auto;" class="search-table">
			<thead>
				<tr>
					<th>Search Requrests:</th>
					<td><?php echo form_input(array('name' => 'search_string', 'id' => 'search_string', 'value' => $this->input->get_post('search_string'))) ?></td>
					<td><?php echo form_submit('search_submit', 'Search') ?></td>
					<td align="left"><span class="ui-accordion-header search-more"><span class="ui-icon ui-icon-triangle-1-s"></span><a href="#">Advanced</a></span></td>
				</tr>
				<?php if (can_this_user('timeoff/download')): ?>
				<tr>
					<th></th>
					<td colspan="3"><?php echo get_csv_download_link('timeoff', $this->user->ID) ?></td>
				</tr>
				<?php endif ?>
			</thead>
			<tbody class="ui-helper-hidden search-more-options">
				<tr>
					<td colspan="5">
					<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td>Date Created: <?php echo form_hidden('filters[search_val][]', 'date_created') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][date_created]', @$_GET['filters']['search_value']['date_created'], 'class="datepicker"');?> </td>
						</tr>
						<tr>
							<td>First Name: <?php echo form_hidden('filters[search_val][]', 'first_name') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][first_name]', @$_GET['filters']['search_value']['first_name']);?> </td>
						</tr>
						<tr>
							<td>Last Name: <?php echo form_hidden('filters[search_val][]', 'last_name') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][last_name]', @$_GET['filters']['search_value']['last_name']);?> </td>
						</tr>
						<tr>
							<td>Start Date: <?php echo form_hidden('filters[search_val][]', 'request_start') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][request_start]', @$_GET['filters']['search_value']['request_start'], 'class="datepicker"');?> </td>
						</tr>
						<tr>
							<td>End Date: <?php echo form_hidden('filters[search_val][]', 'request_end') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][request_end]', @$_GET['filters']['search_value']['request_end'], 'class="datepicker"');?> </td>
						</tr>
						<tr>
							<td>Status: <?php echo form_hidden('filters[search_val][]', 'current_status') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_dropdown('filters[search_value][current_status]', array('' => 'Select One', 'In Process' => 'In Process', 'Submitted for Approval' => 'Submitted for Approval', 'Approved' => 'Approved'), @$_GET['filters']['search_value']['current_status']); ?> </td>
						</tr>
					</table>
					</td>
				</tr>
			</tbody>
		</table>

		<?php echo form_close(); ?>

		<?php echo $this->pagination->create_links(); ?>
		
		<?php echo form_open(site_url('timeoff/my_timeoff_requests')) ?>

		<table cellpadding="0" cellspacing="0" border="0" class="sort">
			<thead>
				<tr>
					<th>Created <?php echo get_sort_link('my_timeoff_requests', 'date_created'); ?></th>
					<th>Name <?php echo get_sort_link('my_timeoff_requests', 'first_name'); ?> <?php echo get_sort_link('my_timeoff_requests', 'last_name'); ?></th>
					<th>Start Date <?php echo get_sort_link('my_timeoff_requests', 'request_start'); ?></th>
					<th>End Date <?php echo get_sort_link('my_timeoff_requests', 'request_end'); ?></th>
					<th>Status <?php echo get_sort_link('my_timeoff_requests', 'current_status'); ?></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($timeoff_requests) && sizeof($timeoff_requests) > 0): foreach($timeoff_requests as $timeoff_request): ?>
				
				<tr class="ui-helper-reset">
					<td><?php echo date_for_display($timeoff_request->date_created); ?></td>
					<td><?php echo $timeoff_request->first_name.' '.$timeoff_request->last_name; ?></td>
					<td><?php echo date_for_display($timeoff_request->request_start); ?></td>
					<td><?php echo date_for_display($timeoff_request->request_end); ?></td>
					<td><?php echo $timeoff_request->current_status; ?></td>

					<td>
						<?php if (can_this_user('timeoff/edit/all') || (can_this_user('timeoff/edit') && (($timeoff_request->user_id == $this->user->ID) || ($timeoff_request->manager == $this->user->ID)) && ($timeoff_request->current_status == 'In Process'))): ?>
						<?php echo anchor('timeoff/edit/'.$timeoff_request->ID, 'edit'); ?>&nbsp;
						<?php else: ?>
						<?php echo anchor('timeoff/view/'.$timeoff_request->ID, 'view'); ?>&nbsp;
						<?php endif; ?>

						<?php if (can_this_user('timeoff/delete/all') || (can_this_user('timeoff/delete') && (($timeoff_request->user_id == $this->user->ID) || ($timeoff_request->manager == $this->user->ID)) && ($timeoff_request->current_status == 'In Process'))): ?>
						<?php echo anchor('timeoff/delete/'.$timeoff_request->ID, 'delete', array('class' => 'delete')); ?>
						<?php endif; ?>
					</td>
				</tr>
				<?php endforeach; else: ?>
				<tr class="ui-helper-reset">
					<td colspan="6">
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