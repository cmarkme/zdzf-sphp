<?php load_header() ?>

<?php if ($this->session->flashdata('projects')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('projects') ?></p>
	</div>
<?php endif ?>

<h1>Project Actuals <?php echo anchor('projects/new_budget/actual', 'Add New', array('class' => 'button ui-helper-reset')); ?></h1>

<div class="ui-block wide">
	<h3><a href="#">Order Details</a></h3>
	<div>
		<!-- <?php echo form_open(site_url('project/grant_actuals'), array('method' => 'get')) ?>
		 <table cellpadding="0" cellspacing="0" border="0" style="width: auto;" class="search-table">
			<thead>
				<tr>
					<th>Project Search:</th>
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
						<tr>
							<td>Order ID: <?php echo form_hidden('filters[search_val][]', 'order_id') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][order_id]', @$_GET['filters']['search_value']['order_id'], 'class="datepicker"');?> </td>
						</tr>
						<tr>
							<td>Date Invoiced: <?php echo form_hidden('filters[search_val][]', 'date_inv_rec') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][date_inv_rec]', @$_GET['filters']['search_value']['date_inv_rec'], 'class="datepicker"');?> </td>
						</tr>
						<tr>
							<td>Date PMT. Requested: <?php echo form_hidden('filters[search_val][]', 'chk_req_sub') ?></td>
							<td><?php echo form_dropdown('filters[search_type][]', array('equals' => '=', 
								'not_equal' => '!=', 
								'less_than' => '<', 
								'less_than_equal' => '<=',
								'greater_than' => '>',
								'greater_than_equal' => '>=',
								'like' => 'Like')); ?></td>
							<td><?php echo form_input('filters[search_value][chk_req_sub]', @$_GET['filters']['search_value']['chk_req_sub'], 'class="datepicker"');?> </td>
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

		<?php echo form_close(); ?> -->

		<?php echo $this->pagination->create_links(); ?>
		
		<?php echo form_open(site_url('project')) ?>

		<table cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
					<th>Location</th>
					<th>Devision</th>
					<th>Dept</th>
					<th>Grant</th>
					<th>Project</th>
					<th>Title</th>
					<th>Total Expense</th>
					<th>Pd1<br /> Expenses</th>
					<th>Pd1<br /> Balance</th>
					<th>Pd2<br /> Expenses</th>
					<th>Pd2<br /> Balance</th>
					<th>Pd3<br /> Expenses</th>
					<th>Pd3<br /> Balance</th>
					<th>Pd4<br /> Expenses</th>
					<th>Pd4<br /> Balance</th>
					<th>Pd5<br /> Expenses</th>
					<th>Pd5<br /> Balance</th>
					<th>Pd6<br /> Expenses</th>
					<th>Pd6<br /> Balance</th>
					<th>Pd7<br /> Expenses</th>
					<th>Pd7<br /> Balance</th>
					<th>Pd8<br /> Expenses</th>
					<th>Pd8<br /> Balance</th>
					<th>Pd9<br /> Expenses</th>
					<th>Pd9<br /> Balance</th>
					<th>Pd10<br /> Expenses</th>
					<th>Pd10<br /> Balance</th>
					<th>Pd11<br /> Expenses</th>
					<th>Pd11<br /> Balance</th>
					<th>Pd12<br /> Expenses</th>
					<th>Pd12<br /> Balance</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($projects)): foreach($projects as $project): ?>
				
				<tr class="ui-helper-reset">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><?php echo $project->grant_title; ?></td>

					<?php 
					$t = 0;
					foreach($project->cumulative_total as $total)
					{
						$t += $total;
					}
					?>

					<td>$<?php echo number_format($t, 2, '.', ''); ?></td>

					<?php foreach($dates as $key => $val): ?>
					<td>$<?php echo @number_format($project->expenses[$key], 2, '.', ''); ?></td>
					<td>$<?php echo @number_format($project->cumulative_expenses[$key], 2, '.', ''); ?></td>
					<?php endforeach; ?>

					<td>
						<?php echo anchor('projects/view/'.$project->ID, 'edit'); ?>/<?php echo anchor('projects/delete/'.$project->ID.'/actuals', 'delete', array('class' => 'delete')); ?>
					</td>
				</tr>
				<?php endforeach; else: ?>
				<tr class="ui-helper-reset">
					<td colspan="30">
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

<?php load_footer(); ?>