<?php load_header(); ?>
<h1>New Procurement Template</h1>

<?php echo form_open('procurement/edit/'.$this->uri->segment('3')); ?>
<div class="ui-block wide">
	<h3><a href="#">Template Settings</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th style="width: 250px;">Template Name</th>
					<td>
						<?php echo form_input('template_name', $template->template_name); ?>
					</td>
				</tr>

				<tr>
					<th style="width: 250px;">Generate Invoice number</th>
					<td>
						<?php echo form_dropdown('gen_inv_num', array('Yes' => 'Yes', 'No' => 'No'), $template->gen_inv_num); ?>
					</td>
				</tr>

				<tr>
					<th style="width: 150px; vertical-align: top; padding-top: 3px;">
						Available Shipping Options<br />
						<small>one per line</small>
					</th>
					<td>
						<small>one per line</small>
						<?php echo form_textarea('available_shipping_options', $template->available_shipping_options); ?>
					</td>
				</tr>

				<tr>
					<th style="width: 150px; vertical-align: top; padding-top: 3px;">
						Available Order Locations<br />
						<small>one per line</small>
					</th>
					<td>
						<small>one per line</small>
						<?php echo form_textarea('available_order_locations', $template->available_order_locations); ?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Fulfillment/Invoicing Options</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th style="width: 250px;">Show Date Received Complete</th>
					<td>
						<?php echo form_dropdown('show_date_rec_com', array('Yes' => 'Yes', 'No' => 'No'), $template->show_date_rec_com); ?>
					</td>
				</tr>

				<tr>
					<th style="width: 250px;">Show Date Invoice Received</th>
					<td>
						<?php echo form_dropdown('show_date_inv_rec', array('Yes' => 'Yes', 'No' => 'No'), $template->show_date_inv_rec); ?>
					</td>
				</tr>

				<tr>
					<th style="width: 250px;">Show Invoice Number</th>
					<td>
						<?php echo form_dropdown('show_inv_num', array('No' => 'No', 'Yes' => 'Yes'), $template->show_inv_num); ?>
					</td>
				</tr>

				<tr>
					<th style="width: 250px;">Show Invoice Amount</th>
					<td>
						<?php echo form_dropdown('show_inv_amount', array('No' => 'No', 'Yes' => 'Yes'), $template->show_inv_amount); ?>
					</td>
				</tr>

				<tr>
					<th style="width: 250px;">Show Date Check Request Submitted</th>
					<td>
						<?php echo form_dropdown('show_chk_req_sub', array('Yes' => 'Yes', 'No' => 'No'), $template->show_chk_req_sub); ?>
					</td>
				</tr>

				<tr>
					<th style="width: 250px;">Show Comment area</th>
					<td>
						<?php echo form_dropdown('show_comm', array('Yes' => 'Yes', 'No' => 'No'), $template->show_comm); ?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Template Instructions</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th style="width: 150px; vertical-align: top; padding-top: 3px;">Optional Instructions</th>
					<td><?php echo form_textarea('optional_instructions', $template->optional_instructions); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Available Products</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr class="custom-options-headers <?php echo ((sizeof($template->fields) > 0) ? '' : 'hidden') ?>">
					<th>Option Name</th>
					<th>Option Type</th>
					<th>Option Default Values</th>
					<th></th>
				</tr>
				<tr class="custom-options-headers <?php echo ((sizeof($template->fields) > 0) ? '' : 'hidden') ?>">
					<td colspan="4"><small>For downdown enter options in default value separated by a comma (,)</small></td>
				</tr>

				<tr class="custom-options-clone hidden">
					<td><?php echo form_input('coption_name[]'); ?></td>
					<td><?php echo form_dropdown('coption_type[]', array('text'=> 'text', 'dropdown' => 'dropdown', 'datepicker' => 'datepicker')); ?></td>
					<td><?php echo form_input('coption_value[]'); ?></td>

					<td>
						<img src="<?php echo site_url('application/views/images/removeBtn.gif'); ?>" alt="" class="remove" />
					</td>
				</tr>

				<?php if((sizeof($template->fields) > 0)): foreach($template->fields as $field): ?>
				<tr>
					<td><?php echo form_input('coption_name[]', $field->option_name); ?></td>
					<td><?php echo form_dropdown('coption_type[]', array('text'=> 'text', 'dropdown' => 'dropdown', 'datepicker' => 'datepicker'), $field->option_type); ?></td>
					<td><?php echo form_input('coption_value[]', $field->option_value); ?></td>

					<td>
						<img src="<?php echo site_url('application/views/images/removeBtn.gif'); ?>" alt="" class="remove" />
					</td>
				</tr>
				<?php endforeach; endif; ?>

				<tr>
					<td colspan="4" style="border-bottom: none;">&nbsp;</td>
				</tr>

				<tr class="product-headers  <?php echo ((sizeof($template->products) > 0) ? '' : 'hidden') ?>">
					<th>Item Name</th>
					<th>Item ID</th>
					<th>Unit Type</th>
					<th>Price</th>
					<th></th>
				</tr>

				<tr class="product-clone hidden">
					<td>
						<?php echo form_input('item_name[]', '', 'style="width: 150px;"'); ?>
					</td>
					<td>
						<?php echo form_input('item_id[]', 0, 'style="width: 150px;"'); ?>
					</td>
					<td>
						<?php echo form_input('unit_type[]', 'EA', 'style="width: 150px;"'); ?>
					</td>
					<td>
						<?php echo form_input('price[]', 0, 'style="width: 150px;"'); ?>
					</td>
					<td>
						<img src="<?php echo site_url('application/views/images/removeBtn.gif'); ?>" alt="" class="remove" />
					</td>
				</tr>

				<?php if((sizeof($template->products) > 0)): foreach($template->products as $product): ?>
				<tr>
					<td>
						<?php echo form_input('item_name[]', $product->item_name, 'style="width: 150px;"'); ?>
					</td>
					<td>
						<?php echo form_input('item_id[]', $product->item_id, 'style="width: 150px;"'); ?>
					</td>
					<td>
						<?php echo form_input('unit_type[]', $product->unit_type, 'style="width: 150px;"'); ?>
					</td>
					<td>
						<?php echo form_input('price[]', $product->price, 'style="width: 150px;"'); ?>
					</td>
					<td>
						<img src="<?php echo site_url('application/views/images/removeBtn.gif'); ?>" alt="" class="remove" />
					</td>
				</tr>
				<?php endforeach; endif; ?>
				
				<tr>
					<td colspan="4" style="border-bottom: none;">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="4">
						<?php echo form_submit('add_new_product', 'Add Product', 'class="add-product"'); ?>
						- OR - 
						<?php echo form_submit('add_custom_option', 'Add Custom Option', 'class="add-option"'); ?>
					</td>
				</tr>
				<tr>
					<td colspan="4" style="border-bottom: none;">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="4"style="border-bottom: none;">
						<?php echo form_submit('update_template', 'Update Template'); ?>
						<?php echo form_hidden('update_template', 'update'); ?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<?php echo form_close(); ?>
<?php load_footer(); ?>