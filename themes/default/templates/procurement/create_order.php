<?php load_header() ?>

<?php if ($this->session->flashdata('procurement')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('procurement') ?></p>
	</div>
<?php endif ?>

<h1><?php echo $template->template_name ?></h1>

<?php echo form_open('procurement/create/'.$this->uri->segment('3')); ?>

<?php if ($template->gen_inv_num == 'Yes'): 
	$hash = substr(md5(rand(10000000, 99999999).time()), 0, 8);
?>
	<h2>Invoice Number: <?php echo $hash ?></h2>
	<?php echo form_hidden('order_id', $hash); ?>
<?php endif ?>

<div class="ui-block wide">
	<h3><a href="#">General settings</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th>Order By</th>
					<td>
						<?php echo @$user->meta['first_name'].' '.@$user->meta['last_name']; ?>
						<?php echo form_hidden('first_name', $user->meta['first_name']); ?>
						<?php echo form_hidden('last_name', $user->meta['last_name']); ?>
					</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<th>Delivery Location</th>
					<td>
						<?php echo form_dropdown('delivery_location', $locations); ?>
					</td>
				
					<th>Status</th>
					<td>
						<?php echo form_dropdown('current_status', array('In Process' => 'In Process','Submitted to Supervisor' => 'Submitted to Supervisor','Approved and sent to order' => 'Approved and sent to order','Ordered - Invoice & Package Pending' => 'Ordered - Invoice & Package Pending','Order-Complete' => 'Order-Complete')); ?>
					</td>
				</tr>

				<tr>
					<th>Order Date</th>
					<td>
						<?php echo date('Y/m/d') ?>
					</td>
				
					<th>Approving Manager</th>
					<td>
						<?php echo @$user->manager['first_name'].' '.@$user->manager['last_name']; ?>
						<?php echo form_hidden('manager', $user->user_manager); ?>
					</td>
				</tr>

				<tr>
					<th>Account</th>
					<td>
						<?php echo form_dropdown('status', $accounts,'', 'style="width: 150px;"'); ?>
					</td>
				<?php if(strlen($template->available_shipping_options)): ?>
					<th>Shipping</th>
					<td>
						<?php 
						$option = explode("\r\n", $template->available_shipping_options);
						$options = array();
						foreach($option as $o)
						{
							$options[$o] = $o;
						}
						echo form_dropdown('shipping_options', $options); ?>
					</td>
				<?php elseif(strlen($template->available_order_locations)): ?>
					<th>Order From</th>
					<td>
						<?php 
						$option = explode("\r\n", $template->available_order_locations);
						$options = array();
						foreach($option as $o)
						{
							$options[$o] = $o;
						}
						echo form_dropdown('order_locations', $options); ?>
					</td>
				<?php else: ?>
					<th></th>
					<td></td>
				<?php endif; ?>
				</tr>

			</tbody>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Fulfillment/Invoicing</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>

				<?php if ($template->show_date_rec_com == 'Yes'): ?>
				<tr>
					<th style="width: 250px;">Date Received Complete</th>
					<td>
						<?php echo form_input('date_rec_com', '', 'class="datepicker"'); ?>
					</td>
				</tr>
				<?php endif ?>

				<?php if ($template->show_date_inv_rec == 'Yes'): ?>
				<tr>
					<th style="width: 250px;">Date Invoice Received</th>
					<td>
						<?php echo form_input('date_inv_rec', '', 'class="datepicker"'); ?>
					</td>
				</tr>
				<?php endif ?>

				<?php if ($template->show_inv_num == 'Yes'): ?>
				<tr>
					<th style="width: 250px;">Invoice Number</th>
					<td>
						<?php echo form_input('inv_num', '', 'class="datepicker"'); ?>
					</td>
				</tr>
				<?php endif ?>

				<?php if ($template->show_inv_amount == 'Yes'): ?>
				<tr>
					<th style="width: 250px;">Invoice Amount</th>
					<td>
						<?php echo form_input('inv_amount', '', 'class="datepicker"'); ?>
					</td>
				</tr>
				<?php endif ?>

				<?php if ($template->show_chk_req_sub == 'Yes'): ?>
				<tr>
					<th style="width: 250px;">Date Check Request Submitted</th>
					<td>
						<?php echo form_input('chk_req_sub', '', 'class="datepicker"'); ?>
					</td>
				</tr>
				<?php endif ?>

				<?php if ($template->show_comm == 'Yes'): ?>
				<tr>
					<th style="width: 250px; vertical-align: top; padding-top: 3px;">Comments</th>
					<td>
						<?php echo form_textarea('comments'); ?>
					</td>
				</tr>
				<?php endif ?>

				<?php if (strlen($template->optional_instructions)): ?>
				<tr>
					<td colspan="2">
						<?php echo nl2br($template->optional_instructions) ?>
					</td>
				</tr>
				<?php endif ?>
			</tbody>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Order Details</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<?php if((sizeof($template->fields) > 0)): foreach($template->fields as $field): ?>
				<tr>
					<th><?php echo $field->option_name; ?></th>
					<?php 
					$name = preg_replace("/[^a-zA-Z0-9]/", "", strtolower($field->option_name));
					switch($field->option_type)
					{
						case 'text':
							echo '<td>'.form_input('custom_option['.$name.']', $field->option_value, 'class="custom-field" rel="'.$field->option_value.'"').'</td>';
						break;
						
						case 'datepicker':
							echo '<td>'.form_input('custom_option['.$name.']', $field->option_value, 'class="datepicker custom-field" rel="'.$field->option_value.'"').'</td>';
						break;

						case 'dropdown':
							$option = explode(",", $field->option_value);
							$options = array();
							foreach($option as $o)
							{
								$o = trim($o);
								$options[$o] = $o;
							}
							echo '<td>'.form_dropdown('custom_option['.$name.']', $options).'</td>';
						break;

					}
					?>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<?php endforeach; endif; ?>

				<tr>
					<td colspan="4" style="border-bottom: none;">&nbsp;</td>
				</tr>

				<?php if((sizeof($template->products) > 0)): ?>
				<tr class="product-headers  <?php echo ((sizeof($template->products) > 0) ? '' : 'hidden') ?>">
					<th>Item Name</th>
					<th>Item ID</th>
					<th>Unit Type</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
					<th></th>
				</tr>

				<tr class="product-clone hidden">
					<td>
						<?php echo form_dropdown('item_name[]', $products, '', 'class="order-product" style="width: 150px;"'); ?>
					</td>
					<td>
						<?php echo form_input('item_id[]', '', 'style="width: 75px;" readonly="readonly"'); ?>
					</td>
					<td>
						<?php echo form_input('unit_type[]', '', 'style="width: 75px;" readonly="readonly"'); ?>
					</td>
					<td>
						<?php echo form_input('price[]', '', 'style="width: 75px;" readonly="readonly"'); ?>
					</td>
					<td>
						<?php echo form_input('quantity[]', '', 'style="width: 75px;"'); ?>
					</td>
					<td>
						<?php echo form_input('total[]', '', 'style="width: 75px;"'); ?>
					</td>
					<td>
						<img src="<?php echo site_url('themes/default/images/removeBtn.gif'); ?>" alt="" class="remove" />
					</td>
				</tr>
				
				<tr>
					<td>
						<?php echo form_dropdown('item_name[]', $products, '', 'class="order-product" style="width: 150px;"'); ?>
					</td>
					<td>
						<?php echo form_input('item_id[]', '', 'style="width: 75px;" readonly="readonly"'); ?>
					</td>
					<td>
						<?php echo form_input('unit_type[]', '', 'style="width: 75px;" readonly="readonly"'); ?>
					</td>
					<td>
						<?php echo form_input('price[]', '', 'style="width: 75px;" readonly="readonly"'); ?>
					</td>
					<td>
						<?php echo form_input('quantity[]', '', 'style="width: 75px;"'); ?>
					</td>
					<td>
						<?php echo form_input('total[]', '', 'style="width: 75px;"'); ?>
					</td>
					<td>
						<img src="<?php echo site_url('themes/default/images/removeBtn.gif'); ?>" alt="" class="remove" />
					</td>
				</tr>
				<?php endif; ?>
				
				<tr>
					<td colspan="7" style="border-bottom: none;">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="7">
						<?php echo form_submit('add_new_product', 'Add Product', 'class="add-product"'); ?>
					</td>
				</tr>
				<tr>
					<td colspan="7" style="border-bottom: none;">&nbsp;</td>
				</tr>
				<tr>
					<th>Grand Total</th>
					<td>
						<?php echo form_input('grand_total[]', '', 'style="width: 75px;"'); ?>
					</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<p class="clear">
	<?php echo form_submit('submit_request', 'Save') ?>
	<?php echo form_submit('submit_request', 'Submit for Approval', 'class="submit-approval" id="timesheet_approval"') ?>
</p>

<input type="hidden" name="template_id" id="template_id" value="<?php echo $template->ID ?>" />
<?php echo form_close(); ?>
<?php load_footer(); ?>