<?php load_header() ?>

<?php if ($this->session->flashdata('procurement')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('procurement') ?></p>
	</div>
<?php endif ?>

<h1>Current Orders</h1>

<div class="ui-block wide">
	<h3><a href="#">Order Details</a></h3>
	<div>
		<?php echo form_open(site_url('procurement'), array('method' => 'get')) ?>
		<table cellpadding="0" cellspacing="0" border="0" style="width: auto;" class="search-table">
			<thead>
				<tr>
					<th>Procurement Search:</th>
					<td><?php echo form_input(array('name' => 'search_string', 'id' => 'search_string', 'value' => $this->input->get_post('search_string'))) ?></td>
					<td><?php echo form_submit('search_submit', 'Search') ?></td>
					<td align="left"><span class="ui-accordion-header search-more"><span class="ui-icon ui-icon-triangle-1-s"></span><a href="#">Advanced</a></span></td>
				</tr>
				<?php if (can_this_user('procurement/download')): ?>
				<tr>
					<th></th>
					<td colspan="3"><?php echo get_csv_download_link('procurement') ?></td>
				</tr>
				<?php endif; ?>
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

		<?php echo form_close(); ?>

		<?php echo $this->pagination->create_links(); ?>
		
		<?php echo form_open(site_url('procurement')) ?>

		<table cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
					<th>Created</th>
					<th>Ordered By</th>
					<th>Status</th>
					<th>Order Id</th>
					<th>Invoiced</th>
					<th>Pmt. Requested</th>
					<th>Total</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($procurements)): foreach($procurements as $procurement): ?>
				
				<tr class="ui-helper-reset">
					<td><?php echo date_for_display($procurement->date_created); ?></td>
					<td><?php echo $procurement->first_name.' '.$procurement->last_name; ?></td>
					<td><?php echo $procurement->current_status; ?></td>
					<td><?php echo $procurement->order_id; ?></td>
					<td><?php echo date_for_display($procurement->date_inv_rec); ?></td>
					<td><?php echo date_for_display($procurement->chk_req_sub); ?></td>
					<td>$<?php echo number_format($procurement->aprox_total, 2, '.', ''); ?></td>

					<td>
					<?php if (can_this_user('procurement/edit_order/all') || (in_array($procurement->created_by,  $this->user->subs) && ($procurement->current_status == 'Submitted to Supervisor')) || (can_this_user('procurement/edit_order') && (($procurement->created_by == $this->user->ID) || in_array($procurement->created_by,  $this->user->subs)) && ($procurement->current_status == 'In Process'))): ?>
						<?php echo anchor('procurement/edit_order/'.$procurement->template_id.'/'.$procurement->ID, 'edit'); ?>
					<?php endif; ?>
					<?php if (can_this_user('procurement/delete_order/all') || (can_this_user('procurement/delete_order') && (($procurement->created_by == $this->user->ID) || in_array($procurement->created_by,  $this->user->subs)) && ($procurement->current_status == 'In Process'))): ?>
						<?php echo anchor('procurement/delete_order/'.$procurement->template_id.'/'.$procurement->ID, 'delete', array('class' => 'delete')); ?>
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

<?php load_footer(); ?>