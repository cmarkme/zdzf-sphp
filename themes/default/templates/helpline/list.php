<?php load_header() ?>

<?php if ($this->session->flashdata('helpline')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('helpline') ?></p>
	</div>
<?php endif ?>

<h1>Callers <?php echo anchor('helpline/new_profile', 'Add New', array('class' => 'button ui-helper-reset')); ?></h1>

<div class="ui-block wide">
	<h3><a href="#">Recent Callers</a></h3>
	<div>
		<?php echo form_open(site_url('helpline'), array('method' => 'get')) ?>
		<table cellpadding="0" cellspacing="0" border="0" style="width: auto;" class="search-table">
			<thead>
				<tr>
					<th>Caller Search:</th>
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
							<td>First Name: <?php echo form_hidden('filters[search_val][]', 'first_name') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=')); ?></td>
							<td><?php echo form_input('filters[search_value][]', $this->input->get_post('filters[search_value][]'));?> </td>
						</tr>
						<tr>
							<td>Last Name: <?php echo form_hidden('filters[search_val][]', 'last_name') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=')); ?></td>
							<td><?php echo form_input('filters[search_value][]');?> </td>
						</tr>
						<tr>
							<td>Email: <?php echo form_hidden('filters[search_val][]', 'Email') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=')); ?></td>
							<td><?php echo form_input('filters[search_value][]');?> </td>
						</tr>
						<tr>
							<td>Phone: <?php echo form_hidden('filters[search_val][]', 'phone') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=')); ?></td>
							<td><?php echo form_input('filters[search_value][]');?> </td>
						</tr>
					</table>
					</td>
				</tr>
			</tbody>
		</table>

		<?php echo form_close(); ?>

		<?php echo $this->pagination->create_links(); ?>
		
		<?php echo form_open(site_url('helpline')) ?>

		<table cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
					<th>Caller</th>
					<th>Home Phone</th>
					<th>Reason For Call</th>
					<th>Ethnicity</th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($callers)): foreach($callers as $caller): ?>
				<tr class="ui-helper-reset">
					<td><?php echo anchor(site_url('helpline/profile/'.$caller->ID), $caller->first_name.' '.$caller->last_name); ?></td>
					<td><?php echo format_phone_number($caller->phone); ?></td>
					<td><?php echo $caller->reason; ?></td>
					<td><?php echo $caller->ethnicity; ?></td>
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