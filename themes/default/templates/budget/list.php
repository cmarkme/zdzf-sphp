<?php load_header() ?>

<?php if ($this->session->flashdata('budget')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('budget') ?></p>
	</div>
<?php endif ?>

<h1>Budgets <?php if(can_this_user("budget/create")) echo anchor('budget/create', 'Add New', array('class' => 'button ui-helper-reset')); ?></h1>

<div class="ui-block wide">
	<h3><a href="#">Recent Budgets</a></h3>
	<div>
		<?php echo form_open(site_url('budget'), array('method' => 'get')) ?>
		<table cellpadding="0" cellspacing="0" border="0" style="width: auto;" class="search-table">
			<thead>
				<tr>
					<th>Budget Search:</th>
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
							<td>Title: <?php echo form_hidden('filters[search_val][]', 'title') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][title]', @$_GET['filters']['search_value']['title']);?> </td>
						</tr>
						<tr>
							<td>Fund: <?php echo form_hidden('filters[search_val][]', 'func') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][func]', @$_GET['filters']['search_value']['func']);?> </td>
						</tr>
						<tr>
							<td>Location: <?php echo form_hidden('filters[search_val][]', 'location') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][location]', @$_GET['filters']['search_value']['location']);?> </td>
						</tr>
						<tr>
							<td>Division: <?php echo form_hidden('filters[search_val][]', 'division') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][division]', @$_GET['filters']['search_value']['division']);?> </td>
						</tr>
						<tr>
							<td>Dept: <?php echo form_hidden('filters[search_val][]', 'dept') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][dept]', @$_GET['filters']['search_value']['dept']);?> </td>
						</tr>
						<tr>
							<td>grant: <?php echo form_hidden('filters[search_val][]', 'grant') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][grant]', @$_GET['filters']['search_value']['grant']);?> </td>
						</tr>
						<tr>
							<td>Project: <?php echo form_hidden('filters[search_val][]', 'project') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][project]', @$_GET['filters']['search_value']['project']);?> </td>
						</tr>
						<tr>
							<td>Expected Completion Date: <?php echo form_hidden('filters[search_val][]', 'ex_comp_date') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][ex_comp_date]', @$_GET['filters']['search_value']['ex_comp_date'], 'class="datepicker"');?> </td>
						</tr>
						<tr>
							<td>Current Status: <?php echo form_hidden('filters[search_val][]', 'status') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_dropdown('filters[search_value][status]', array('' => 'Select One', 'Approved Budget' => 'Approved Budget', 'Submitted Budget' => 'Submitted Budget'), @$_GET['filters']['search_value']['status']); ?> </td>
						</tr>
						<tr>
							<td>Budget Preparer Status: <?php echo form_hidden('filters[search_val][]', 'prep_status') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_dropdown('filters[search_value][prep_status]', array('' => 'Select One', 'In Process' => 'In Process', 'Submitted for Approval' => 'Submitted for Approval', 'Approved' => 'Approved', 'Ended' => 'Ended'), @$_GET['filters']['search_value']['prep_status']); ?> </td>
						</tr>
					</table>
					</td>
				</tr>
			</tbody>
		</table>

		<?php echo form_close(); ?>

		<?php echo $this->pagination->create_links(); ?>
		
		<?php echo form_open(site_url('budget')) ?>

		<table cellpadding="0" cellspacing="0" border="0" class="sort">
			<thead>
				<tr>
					<th>Title <?php echo get_sort_link('budget', 'title'); ?></th>
					<th>Fund <?php echo get_sort_link('budget', 'fund'); ?></th>
					<th>Location <?php echo get_sort_link('budget', 'location'); ?></th>
					<th>Division <?php echo get_sort_link('budget', 'division'); ?></th>
					<th>Dept <?php echo get_sort_link('budget', 'dept'); ?></th>
					<th>Grant <?php echo get_sort_link('budget', 'grant'); ?></th>
					<th>Project <?php echo get_sort_link('budget', 'project'); ?></th>
					<th>Status <?php echo get_sort_link('budget', 'status'); ?></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($budgets) && (count($budgets) > 0)): foreach($budgets as $budget): ?>
				
				<tr class="ui-helper-reset">
					<td><?php echo $budget->title; ?></td>					
					<td><?php echo $budget->fund; ?></td>
					<td><?php echo $budget->location; ?></td>
					<td><?php echo $budget->division; ?></td>
					<td><?php echo $budget->dept; ?></td>
					<td><?php echo $budget->grant; ?></td>
					<td><?php echo $budget->project; ?></td>
					<td><?php echo $budget->status; ?></td>

					<td>
						<?php if (can_this_user('budget/edit/all') || (can_this_user('budget/edit') && (($budget->director == $this->user->ID) || ($budget->manager == $this->user->ID)) && ($budget->prep_status == 'In Process'))): ?>
						<?php echo anchor('budget/edit/'.$budget->ID, 'edit'); ?>&nbsp;
						<?php else: ?>
						<?php echo anchor('budget/view/'.$budget->ID, 'view'); ?>&nbsp;
						<?php endif; ?>

						<?php if (can_this_user('budget/delete/all') || (can_this_user('budget/delete') && (($budget->director == $this->user->ID) || ($budget->manager == $this->user->ID)) && ($budget->prep_status == 'In Process'))): ?>
						<?php echo anchor('budget/delete/'.$budget->ID, 'delete', array('class' => 'delete')); ?>
						<?php endif; ?>
					</td>
				</tr>
				<?php endforeach; else: ?>
				<tr class="ui-helper-reset">
					<td colspan="8">
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