<?php load_header() ?>

<?php if ($this->session->flashdata('grants')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('grants') ?></p>
	</div>
<?php endif ?>

<h1>
	Grants 
	<?php if(can_this_user('grants/add')) echo anchor('grants/add', 'Add New', array('class' => 'button ui-helper-reset')); ?>
</h1>

<div class="ui-block wide">
	<h3><a href="#">General Information</a></h3>
	<div>
		<?php echo form_open('grants', array('method' => 'get')) ?>
		<table cellpadding="0" cellspacing="0" border="0" style="width: auto;" class="search-table">
			<thead>
				<tr>
					<th>Search Requests:</th>
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
							<td>Funder: <?php echo form_hidden('filters[search_val][]', 'funder') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][funder]', @$_GET['filters']['search_value']['funder']);?> </td>
						</tr>
						<tr>
							<td>Address: <?php echo form_hidden('filters[search_val][]', 'address') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][address]', @$_GET['filters']['search_value']['address'], 'class="datepicker"');?> </td>
						</tr>
						<tr>
							<td>City: <?php echo form_hidden('filters[search_val][]', 'city') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][city]', @$_GET['filters']['search_value']['city']);?> </td>
						</tr>
						<tr>
							<td>State: <?php echo form_hidden('filters[search_val][]', 'state') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_dropdown('filters[search_value][state]',array_merge(array('' => 'Choose State'), getStateList()), @$_GET['filters']['search_value']['state']);?> </td>
						</tr>
						<tr>
							<td>Status: <?php echo form_hidden('filters[search_val][]', 'status') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_dropdown('filters[search_value][status]',array('' => 'Select one', 'To Submit' => 'To Submit',
					'On Deck' => 'On Deck',
					'Funded' => 'Funded',
					'Pending' => 'Pending',
					'Declined' => 'Declined',
					'Prospect' => 'Prospect',
					'Approved' => 'Approved'), @$_GET['filters']['search_value']['status']);?> </td>
						</tr>
						<tr>
							<td>Type: <?php echo form_hidden('filters[search_val][]', 'type') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_dropdown('filters[search_value][type]',array('' => 'Select one', 'Foundation' => 'Foundation', 'Corporation' => 'Corporation', 'Government' => 'Government'), @$_GET['filters']['search_value']['type']);?> </td>
						</tr>
					</table>
					</td>
				</tr>
			</tbody>
		</table>

		<?php echo form_close(); ?>

		<?php echo $this->pagination->create_links(); ?>
		
		<?php echo form_open('grants') ?>

		<table cellpadding="0" cellspacing="0" border="0" class="sort">
			<thead>
				<tr>
					<th>Funder <?php echo get_sort_link('grants', 'funder', ''); ?></th>
					<th>Address <?php echo get_sort_link('grants', 'address', ''); ?></th>
					<th>City <?php echo get_sort_link('grants', 'city', ''); ?></th>
					<th>State <?php echo get_sort_link('grants', 'state', ''); ?></th>
					<th>Zip <?php echo get_sort_link('grants', 'zip', ''); ?></th>
					<th>Website <?php echo get_sort_link('grants', 'website', ''); ?></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($grants) && sizeof($grants) > 0): foreach($grants as $grant): ?>
				
				<tr class="ui-helper-reset">
					<td><?php echo $grant->funder ?></td>
					<td><?php echo $grant->address; ?></td>
					<td><?php echo $grant->city; ?></td>
					<td><?php echo $grant->state; ?></td>
					<td><?php echo $grant->zip; ?></td>
					<td><?php echo $grant->website; ?></td>

					<td>
						<?php if (can_this_user('grants/edit')): ?>
						<?php echo anchor('grants/edit/'.$grant->ID, 'edit'); ?>&nbsp;							
						<?php endif ?>
						
						<?php if (can_this_user('grants/delete')): ?>
						<?php echo anchor('grants/delete/'.$grant->ID, 'delete', array('class' => 'delete')); ?>
						<?php endif ?>
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