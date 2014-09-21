<?php load_header() ?>

<?php if ($this->session->flashdata('labor')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('labor') ?></p>
	</div>
<?php endif ?>

<h1>Labor Accounts <?php if(can_this_user('labor/new_account')) echo anchor('labor/new_account', 'Add New', array('class' => 'button ui-helper-reset')); ?></h1>

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
							<td>Description: <?php echo form_hidden('filters[search_val][]', 'description') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=')); ?></td>
							<td><?php echo form_input('filters[search_value][]');?> </td>
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

		<table cellpadding="0" cellspacing="0" border="0" class="sort">
			<thead>
				<tr>
					<th><?php echo form_checkbox(array('name' => 'bulkselect', 'id' => 'bulkselect')) ?></th>
					<th>Ledger Account <?php echo get_sort_link('labor', 'ledger'); ?></th>
					<th>Description <?php echo get_sort_link('labor', 'description'); ?></th>
					<th>Status <?php echo get_sort_link('labor', 'status'); ?></th>
					<th>Timesheet <?php echo get_sort_link('labor', 'timesheet'); ?></th>
					<th>Travel <?php echo get_sort_link('labor', 'travel'); ?></th>
					<th>Financials <?php echo get_sort_link('labor', 'financials'); ?></th>
					<th>Procurement <?php echo get_sort_link('labor', 'procurement'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($accounts)): foreach($accounts as $account): ?>
				<tr class="ui-helper-reset">
					<td><?php echo form_checkbox('b_action[]', $account->ID) ?></td>
					<td><?php echo anchor(site_url('labor/edit_account/'.$account->ID), $account->ledger); ?></td>
					<td><?php echo $account->description; ?></td>
					<td><?php echo (($account->status == 'Y') ? 'Active' : 'Inactive'); ?></td>
					<td><?php echo ($account->timesheet == 'on') ? 'Yes' : 'No' ?></td>
					<td><?php echo ($account->travel == 'on') ? 'Yes' : 'No' ?></td>
					<td><?php echo ($account->financials == 'on') ? 'Yes' : 'No' ?></td>
					<td><?php echo ($account->procurement == 'on') ? 'Yes' : 'No' ?></td>
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