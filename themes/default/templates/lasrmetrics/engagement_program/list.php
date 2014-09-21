<?php load_header() ?>
<h1>Engagement Program <?php echo anchor('lasrmetrics/engagement_program/new', 'Add New', array('class' => 'button ui-helper-reset')); ?></h1>

<div class="ui-block wide">
	<h3><a href="#">&nbsp;</a></h3>
	<div>
		<?php echo form_open('lasrmetrics/engagement_program', array('method' => 'get')) ?>
		<table cellpadding="0" cellspacing="0" border="0" style="width: auto;" class="search-table">
			<thead>
				<tr>
					<th>Search Requrests:</th>
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
							<td>Date: <?php echo form_hidden('filters[search_val][]', 'date') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][date]', @$_GET['filters']['search_value']['date'], 'class="datepicker"');?> </td>
						</tr>
						<tr>
							<td>Birthday: <?php echo form_hidden('filters[search_val][]', 'birthday') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][birthday]', @$_GET['filters']['search_value']['birthday'], 'class="datepicker"');?> </td>
						</tr>
						<tr>
							<td>Name: <?php echo form_hidden('filters[search_val][]', 'name') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][name]', @$_GET['filters']['search_value']['name']);?> </td>
						</tr>
						<tr>
							<td>Email: <?php echo form_hidden('filters[search_val][]', 'email') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][email]', @$_GET['filters']['search_value']['email']);?> </td>
						</tr>
					</table>
					</td>
				</tr>
			</tbody>
		</table>

		<?php echo form_close(); ?>

		<?php echo $this->pagination->create_links(); ?>
		
		<?php echo form_open('lasrmetrics') ?>

		<table cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
					<th>Date</th>
					<th>Program Name</th>
					<th>Program Type</th>
					<th>Office</th>
					<th>Quarter</th>
					<th>FY </th>
					<th>Created By</th>
					<th>Total # Att.</th>
					<th>Total Und</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($items) && sizeof($items) > 0): foreach($items as $engagement_program): ?>
				<?php $user = $this->users_model->get_user($engagement_program->created_by); ?>
				<tr class="ui-helper-reset">
					<td><?php echo date_for_display($engagement_program->date); ?></td>
					<td><?php echo $engagement_program->name_of_program ?></td>
					<td><?php echo $engagement_program->group_type ?></td>
					<td><?php echo $engagement_program->office ?></td>
					<td><?php echo $engagement_program->quarter; ?></td>
					<td><?php echo $engagement_program->fiscial_year; ?></td>
					<td><?php echo $user->meta['first_name'].' '.$user->meta['last_name']; ?></td>
					<td><?php echo $engagement_program->num_duplicate_attendees; ?></td>
					<td><?php echo $engagement_program->num_first_time_attendees; ?></td>

					<td>
						<?php echo anchor('lasrmetrics/engagement_program/edit/'.$engagement_program->ID, 'edit'); ?>/<?php echo anchor('lasrmetrics/engagement_program/delete/'.$engagement_program->ID, 'delete', array('class' => 'delete')); ?>
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
		<br />
		<?php echo $this->pagination->create_links(); ?>

		<?php echo form_close(); ?>
	</div>
</div>
<?php load_footer() ?>