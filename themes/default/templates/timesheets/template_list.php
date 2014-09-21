<?php load_header() ?>

<?php if ($this->session->flashdata('timesheet')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('timesheet') ?></p>
	</div>
<?php endif ?>

<h1>Timesheet Templates <?php if(can_this_user('timesheet/new_template')) echo anchor('timesheet/new_template', 'Add New', array('class' => 'button ui-helper-reset')); ?></h1>

<div class="ui-block wide">
	<h3><a href="#">Recent Templates</a></h3>
	<div>
		<?php echo form_open(site_url('timesheet/template_list'), array('method' => 'get')) ?>
		<table cellpadding="0" cellspacing="0" border="0" style="width: auto;" class="search-table">
			<thead>
				<tr>
					<th>Timesheet Search:</th>
					<td><?php echo form_input(array('name' => 'search_string', 'id' => 'search_string', 'value' => $this->input->get_post('search_string'))) ?></td>
					<td><?php echo form_submit('search_submit', 'Search') ?></td>
					<td align="left"><span class="ui-accordion-header search-more"><span class="ui-icon ui-icon-triangle-1-s"></span><a href="#">Advanced</a></span></td>
				</tr>
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
					</table>
					</td>
				</tr>
			</tbody>
		</table>

		<?php echo form_close(); ?>

		<?php echo $this->pagination->create_links(); ?>
		
		<?php echo form_open(site_url('timesheet')) ?>

		<table cellpadding="0" cellspacing="0" border="0" class="sort">
			<thead>
				<tr>
					<th>Created <?php echo get_sort_link('template_list', 'date_created'); ?></th>
					<th>Name <?php echo get_sort_link('template_list', 'first_name'); ?> <?php echo get_sort_link('template_list', 'last_name'); ?></th>
					<th>Last Edit <?php echo get_sort_link('template_list', 'last_edit'); ?></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($timesheets)): foreach($timesheets as $timesheet): ?>
				
				<tr class="ui-helper-reset">
					<td><?php echo date_for_display($timesheet->date_created); ?></td>
					<td><?php echo $timesheet->first_name.' '.$timesheet->last_name; ?></td>
					<td><?php echo date_for_display($timesheet->last_edit); ?></td>

					<td>
						<?php if (can_this_user('timesheet/edit_template')): ?>
						<?php echo anchor('timesheet/edit_template/'.$timesheet->ID, 'edit'); ?>&nbsp;							
						<?php endif ?>

						<?php if (can_this_user('timesheet/delete_template')): ?>
						<?php echo anchor('timesheet/delete_template/'.$timesheet->ID, 'delete', array('class' => 'delete')); ?>							
						<?php endif ?>
					</td>
				</tr>
				<?php endforeach; else: ?>
				<tr class="ui-helper-reset">
					<td colspan="4">
						<h2><?php echo $this->config->item('empty_message') ?></h2>
					</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
		<br />
		<?php echo $this->pagination->create_links(); ?>

		<?php echo form_close(); ?>
	</div>
</div>
<?php load_footer() ?>