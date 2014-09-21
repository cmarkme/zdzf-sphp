<?php load_header() ?>
<h1>New Budget</h1>

<?php echo form_open(site_url('budget/create/')) ?>

<?php //start general information block ?>
<div class="ui-block wide">
	<h3><a href="#">Account Code</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th style="width: 150px;">Title</th>
					<td colspan="5">
						<?php echo form_input('title', '', 'style="width: 730px;"'); ?>
					</td>
				</tr>
				<tr>
					<th style="width: 150px; padding: 5px 0;">Fund</th>
					<th style="width: 150px; padding: 5px 0;">Location</th>
					<th style="width: 150px; padding: 5px 0;">Division</th>
					<th style="width: 150px; padding: 5px 0;">Dept</th>
					<th style="width: 150px; padding: 5px 0;">Grant</th>
					<th style="width: 150px; padding: 5px 0;">Project</th>
				</tr>
				<tr>
					<td><?php echo form_input('fund', '', 'style="width: 120px;"'); ?></td>
					<td><?php echo form_input('location', '', 'style="width: 120px;"'); ?></td>
					<td><?php echo form_input('division', '', 'style="width: 120px;"'); ?></td>
					<td><?php echo form_input('dept', '', 'style="width: 120px;"'); ?></td>
					<td><?php echo form_input('grant', '', 'style="width: 120px;"'); ?></td>
					<td><?php echo form_input('project', '', 'style="width: 120px;"'); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>	

<div class="ui-block wide">
	<h3><a href="#">General Info</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td style="width: 180px;">Prior year Carry Forwar:</td>
				<td>$<?php echo form_input('prior_year', '', ''); ?></td>
			</tr>
			<tr>
				<td>Expected Completion Date:</td>
				<td>&nbsp;<?php echo form_input('ex_comp_date', '', 'class="datepicker"'); ?></td>
			</tr>
			<tr>
				<td>Current Status:</td>
				<td>&nbsp;<?php echo form_dropdown('status', array('Submitted Budget' => 'Submitted Budget', 'Approved Budget' => 'Approved Budget')); ?></td>
			</tr>
			<tr>
				<td>Budget Manager</td>
				<td>&nbsp;<select name="manager">
						<?php foreach ($users as $u): ?>
						<option value="<?php echo $u->ID ?>"><?php echo $u->meta['first_name'].' '.$u->meta['last_name']; ?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Director-In-Charge</td>
				<td>&nbsp;<select name="director">
						<?php foreach ($users as $u): ?>
						<option value="<?php echo $u->ID ?>"><?php echo $u->meta['first_name'].' '.$u->meta['last_name']; ?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Budget Preparer Status</td>
				<td>&nbsp;<?php echo form_dropdown('prep_status', array('' => 'Select One', 'In Process' => 'In Process', 'Submitted for Approval' => 'Submitted for Approval', 'Approved' => 'Approved', 'Ended' => 'Ended')); ?> </td>
			</tr>
			<tr>
				<th style="width: 150px; padding: 5px 0;">Notes or Comments</th>
				<td><?php echo form_textarea('comment', '', ''); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">1.Staffing Plan</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
					<th>Staff Members</th>
					<th>July</th>
					<th>Aug</th>
					<th>Sept</th>
					<th>Oct</th>
					<th>Nov</th>
					<th>Dec</th>
					<th>Jan</th>
					<th>Feb</th>
					<th>Mar</th>
					<th>Apr</th>
					<th>May</th>
					<th>Jun</th>
				</tr>
				<tr>
					<td colspan="13">&nbsp;</td>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Total FTE Time Assigned</th>
					<th><?php echo form_input('meta[fte_july_total]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_Aug_total]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_sept_total]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_oct_total]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_nov_total]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_dec_total]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_jan_total]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_feb_total]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_mar_total]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_apr_total]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_may_total]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_jun_total]', '0.00', 'style="width: auto" size="4"'); ?></th>
				</tr>
			</tfoot>
			<tbody>
				<?php for($i = 0; $i < 15; $i++): ?>
				<tr>
					<td>
						<select name="meta[fte_staff_name][]" style="width: 130px;">
							<option>Choose User</option>
							<?php foreach ($users as $u): ?>
							<option value="<?php echo $u->ID ?>"><?php echo $u->meta['first_name'].' '.$u->meta['last_name']; ?></option>
							<?php endforeach ?>
						</select>
					</td>
					<td><?php echo form_input('meta[fte_july_fig][]', '0.00', 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_Aug_fig][]', '0.00', 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_sept_fig][]', '0.00', 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_oct_fig][]', '0.00', 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_nov_fig][]', '0.00', 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_dec_fig][]', '0.00', 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_jan_fig][]', '0.00', 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_feb_fig][]', '0.00', 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_mar_fig][]', '0.00', 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_apr_fig][]', '0.00', 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_may_fig][]', '0.00', 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_jun_fig][]', '0.00', 'style="width: auto" size="4"'); ?></td>
				</tr>
				<?php endfor; ?>
			</tbody>			
		</table>
	</div>
</div>	

<div class="ui-block wide">
	<h3><a href="#">Total Labor</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
					<th colspan="13">Expenses including benefits where covered</th>
				</tr>
				<tr>
					<td colspan="13">&nbsp;</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_final_total]', '0.00', 'style="width: auto" size="4"'); ?></th>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Discretionary Accounts</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
					<th>Acct</th>
					<th>Description</th>
					<th>July</th>
					<th>Aug</th>
					<th>Sept</th>
					<th>Oct</th>
					<th>Nov</th>
					<th>Dec</th>
					<th>Jan</th>
					<th>Feb</th>
					<th>Mar</th>
					<th>Apr</th>
					<th>May</th>
					<th>Jun</th>
					<th>Total</th>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="2"><i>Subtotal Discretionary Budget</i></td>
					<td><i><?php echo form_input('meta[da_sub_july]', '0.00', 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_aug]', '0.00', 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_sept]', '0.00', 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_oct]', '0.00', 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_nov]', '0.00', 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_dec]', '0.00', 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_jan]', '0.00', 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_feb]', '0.00', 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_mar]', '0.00', 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_apr]', '0.00', 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_may]', '0.00', 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_june]', '0.00', 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_total]', '0.00', 'style="width: 27px;" size="3"'); ?></i></td>
				</tr>
				<tr>
					<th colspan="2">Total Budget</th>
					<td><?php echo form_input('meta[da_total_july]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_aug]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_sept]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_oct]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_nov]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_dec]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_jan]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_feb]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_mar]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_apr]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_may]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_june]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_total]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
				</tr>
			</tfoot>
			<tbody>
				<?php for($i = 0; $i < 25; $i++): ?>
				<tr>
					<td><?php echo form_input('meta[da_row_acct][]', '0000', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_desc][]', '', 'style="width: 205px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_july][]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_aug][]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_sept][]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_oct][]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_nov][]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_dec][]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_jan][]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_feb][]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_mar][]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_apr][]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_may][]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_june][]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_total][]', '0.00', 'style="width: 27px;" size="3"'); ?></td>
				</tr>
				<?php endfor; ?>
			</tbody>
		</table>
	</div>
</div>

<p class="clear">
	<?php echo form_submit('submit_request', 'Save') ?>
</p>
<?php echo form_hidden('insert_budget', 'true'); ?>
<?php echo form_close(); ?>
<?php load_footer() ?>
