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

		<table cellpadding="0" cellspacing="0" border="0" class="sort">
			<thead>
				<tr>
					<th>Status <?php echo get_sort_link('grant_actuals', 'current_status'); ?></th>
					<th>Title <?php echo get_sort_link('grant_actuals', 'grant_title'); ?></th>
					<th>Total Amount of Grant <?php echo get_sort_link('grant_actuals', 'total_amt_grant'); ?></th>
					<th>Contract Start Date <?php echo get_sort_link('grant_actuals', 'start_date'); ?></th>
					<th>Contract End Date <?php echo get_sort_link('grant_actuals', 'end_date'); ?></th>
					<th>Total Expense</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($projects)): foreach($projects as $project): ?>
				<?php $total_amt_grant = preg_replace("/[^0-9]/", '', $project->total_amt_grant); ?>
				<tr class="ui-helper-reset">
					<td><?php echo $project->current_status; ?></td>
					<td><?php echo $project->grant_title; ?></td>
					<td>$<?php echo number_format($total_amt_grant, 2, '.', ','); ?></td>
					<td><?php echo date_for_display($project->start_date); ?></td>
					<td><?php echo date_for_display($project->end_date); ?></td>

					<?php 
					$t = 0;
					foreach($project->cumulative_total as $total)
					{
						$t += $total;
					}
					?>

					<td>$<?php echo number_format($t, 2, '.', ''); ?></td>

					<td>
						<?php echo anchor('projects/view/'.$project->ID, 'edit'); ?>/<?php echo anchor('projects/delete/'.$project->ID.'/funds', 'delete', array('class' => 'delete')); ?>
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