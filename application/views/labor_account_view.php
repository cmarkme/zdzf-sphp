<?php load_header() ?>
<h1>Labor Accounts <?php echo anchor('labor/new_account', 'Add New', array('class' => 'button ui-helper-reset')); ?></h1>

<div class="ui-block wide">
	<h3><a href="#">Accounts</a></h3>
	<div>
		<?php echo form_open(site_url('labor/'), array('method' => 'get')) ?>
		<table cellpadding="0" cellspacing="0" border="0" style="width: auto;" class="search-table">
			<thead>
				<tr>
					<th>Account Search:</th>
					<td><?php echo form_input(array('name' => 'search_string', 'id' => 'search_string', 'value' => $this->input->post('search_string'))) ?></td>
					<td><?php echo form_submit('search_submit', 'Search') ?></td>
					<td align="left"><span class="ui-accordion-header search-more"><span class="ui-icon ui-icon-triangle-1-s"></span><a href="#">Advanced</a></span></td>
				</tr>
			</thead>
			<tbody class="ui-helper-hidden search-more-options">
				<tr>
					<td colspan="5">
					<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td>Ledger: <?php echo form_hidden('filters[search_val][]', 'ledger') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=')); ?></td>
							<td><?php echo form_input('filters[search_value][]');?> </td>
						</tr>
						<tr>
							<td>Project: <?php echo form_hidden('filters[search_val][]', 'project') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=')); ?></td>
							<td><?php echo form_input('filters[search_value][]');?> </td>
						</tr>
						<tr>
							<td>Grant: <?php echo form_hidden('filters[search_val][]', 'grant') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=')); ?></td>
							<td><?php echo form_input('filters[search_value][]');?> </td>
						</tr>
						<tr>
							<td>Location: <?php echo form_hidden('filters[search_val][]', 'location') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=')); ?></td>
							<td><?php echo form_dropdown('filters[search_value][]', array('' => 'Choose', 'WILS' => 'WILS','GSFV' => 'GSFV','GELA' => 'GELA','IE' => 'IE','RM' => 'RM'));?> </td>
						</tr>
						<tr>
							<td>Status: <?php echo form_hidden('filters[search_val][]', 'Status') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=')); ?></td>
							<td><?php echo form_dropdown('filters[search_value][]', array('' => 'Choose', 'Y' => 'Active', 'N' => 'Inactive'));?> </td>
						</tr>
					</table>
					</td>
				</tr>
			</tbody>
		</table>

		<?php echo form_close(); ?>

		<?php echo form_open(site_url('labor/')) ?>

		<?php echo $this->pagination->create_links(); ?>

		<table cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
					<th><?php echo form_checkbox(array('name' => 'bulkselect', 'id' => 'bulkselect')) ?></th>
					<th>Ledger Account</th>
					<th>Project</th>
					<th>Grant</th>
					<th>Location</th>
					<th>Description</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($accounts)): foreach($accounts as $account): ?>
				<tr class="ui-helper-reset">
					<td><?php echo form_checkbox('b_action[]', $account->ID) ?></td>
					<td><?php echo anchor(site_url('labor/edit_account/'.$account->ID), $account->ledger); ?></td>
					<td><?php echo $account->project; ?></td>
					<td><?php echo $account->grant; ?></td>
					<td><?php echo $account->location; ?></td>
					<td><?php echo $account->description; ?></td>
					<td><?php echo (($account->status == 'Y') ? 'Active' : 'Inactive'); ?></td>
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

		<p>
			<?php echo form_dropdown('bulk_action', array('bulk' => 'Bulk Actions', 'delete' => 'Delete', 'status_active' => 'Active', 'status_inactive' => 'Inactive')); ?>
			<?php echo form_submit('buld_submit', 'Submit Action') ?>
		</p>

		<?php echo form_close(); ?>
	</div>
</div>
<?php load_footer() ?>