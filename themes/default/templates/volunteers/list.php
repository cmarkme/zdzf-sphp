<?php load_header() ?>

<?php if ($this->session->flashdata('volunteers')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('volunteers') ?></p>
	</div>
<?php endif ?>

<h1>Volunteers <?php echo anchor('volunteers/add', 'Add New', array('class' => 'button ui-helper-reset')); ?></h1>

<div class="ui-block wide">
	<h3><a href="#">General Information</a></h3>
	<div>
		<?php echo form_open('volunteers', array('method' => 'get')) ?>
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
		
		<?php echo form_open('volunteers') ?>

		<table cellpadding="0" cellspacing="0" border="0" class="sort">
			<thead>
				<tr>
					<th>Date <?php echo get_sort_link('volunteers', 'date', ''); ?></th>
					<th>Name <?php echo get_sort_link('volunteers', 'name', ''); ?></th>
					<th>Email <?php echo get_sort_link('volunteers', 'email', ''); ?></th>
					<th>Address <?php echo get_sort_link('volunteers', 'address', ''); ?></th>
					<th>City <?php echo get_sort_link('volunteers', 'city', ''); ?></th>
					<th>Zip <?php echo get_sort_link('volunteers', 'zip', ''); ?></th>
					<th>Gender <?php echo get_sort_link('volunteers', 'sex', ''); ?></th>
					<th>Prefered Contact <?php echo get_sort_link('volunteers', 'called', ''); ?></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($volunteers) && sizeof($volunteers) > 0): foreach($volunteers as $volunteer): ?>
				
				<tr class="ui-helper-reset">
					<td><?php echo date_for_display($volunteer->date); ?></td>
					<td><?php echo $volunteer->name ?></td>
					<td><?php echo $volunteer->email; ?></td>
					<td><?php echo $volunteer->address; ?></td>
					<td><?php echo $volunteer->city; ?></td>
					<td><?php echo $volunteer->zip; ?></td>
					<td><?php echo $volunteer->sex; ?></td>
					<td><?php echo ucwords($volunteer->called); ?></td>

					<td>
						<?php echo anchor('volunteers/edit/'.$volunteer->ID, 'edit'); ?>/<?php echo anchor('volunteers/delete/'.$volunteer->ID, 'delete', array('class' => 'delete')); ?>
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