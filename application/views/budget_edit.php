<?php load_header() ?>
<h1>New Budget</h1>

<?php echo form_open(site_url('budget/edit/'.$this->uri->segment(3))) ?>

<?php //start general information block ?>
<div class="ui-block wide">
	<h3><a href="#">Account Code</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th style="width: 150px;">Title</th>
					<td colspan="5">
						<?php echo form_input('title', $title, 'style="width: 730px;"'); ?>
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
					<td><?php echo form_input('fund', $fund, 'style="width: 120px;"'); ?></td>
					<td><?php echo form_input('location', $location, 'style="width: 120px;"'); ?></td>
					<td><?php echo form_input('division', $division, 'style="width: 120px;"'); ?></td>
					<td><?php echo form_input('dept', $dept, 'style="width: 120px;"'); ?></td>
					<td><?php echo form_input('grant', $grant, 'style="width: 120px;"'); ?></td>
					<td><?php echo form_input('project', $project, 'style="width: 120px;"'); ?></td>
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
				<td>$<?php echo form_input('prior_year', $prior_year, ''); ?></td>
			</tr>
			<tr>
				<td>Expected Completion Date:</td>
				<td>&nbsp;<?php echo form_input('ex_comp_date', date_for_display($ex_comp_date), 'class="datepicker"'); ?></td>
			</tr>
			<tr>
				<td>Current Status:</td>
				<td>&nbsp;<?php echo form_dropdown('status', array('Submitted Budget' => 'Submitted Budget', 'Approved Budget' => 'Approved Budget'), $status); ?></td>
			</tr>
			<tr>
				<td>Budget Manager</td>
				<td>&nbsp;<select name="manager">
						<?php foreach ($users as $u): ?>
						<option <?php echo (($manager == $u->ID) ? 'selected' : ''); ?> value="<?php echo $u->ID ?>"><?php echo $u->meta['first_name'].' '.$u->meta['last_name']; ?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Director-In-Charge</td>
				<td>&nbsp;<select name="director">
						<?php foreach ($users as $u): ?>
						<option <?php echo (($director == $u->ID) ? 'selected' : ''); ?> value="<?php echo $u->ID ?>"><?php echo $u->meta['first_name'].' '.$u->meta['last_name']; ?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Budget Preparer Status</td>
				<td>&nbsp;<?php echo form_dropdown('prep_status', array('' => 'Select One', 'In Process' => 'In Process', 'Submitted for Approval' => 'Submitted for Approval', 'Approved' => 'Approved', 'Ended' => 'Ended'), $prep_status); ?> </td>
			</tr>

			<tr>
				<td valign="top">Notes or Comments</td>
				<td><?php echo form_textarea('comment', $comment, ''); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Staffing Plan</a></h3>
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
					<th><?php echo form_input('meta[fte_july_total]', $meta['fte_july_total'], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_Aug_total]', $meta['fte_Aug_total'], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_sept_total]', $meta['fte_sept_total'], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_oct_total]', $meta['fte_oct_total'], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_nov_total]', $meta['fte_nov_total'], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_dec_total]', $meta['fte_dec_total'], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_jan_total]', $meta['fte_jan_total'], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_feb_total]', $meta['fte_feb_total'], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_mar_total]', $meta['fte_mar_total'], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_apr_total]', $meta['fte_apr_total'], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_may_total]', $meta['fte_may_total'], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[fte_jun_total]', $meta['fte_jun_total'], 'style="width: auto" size="4"'); ?></th>
				</tr>
			</tfoot>
			<tbody>
				<?php for($i = 0; $i < 15; $i++): ?>
				<tr>
					<td>
						<select name="meta[fte_staff_name][]" style="width: 130px;">
							<option>Choose User</option>
							<?php foreach ($users as $u): ?>
							<option <?php echo (($meta['fte_staff_name'][$i] == $u->ID) ? 'selected' : ''); ?> value="<?php echo $u->ID ?>"><?php echo $u->meta['first_name'].' '.$u->meta['last_name']; ?></option>
							<?php endforeach ?>
						</select>
					</td>
					<td><?php echo form_input('meta[fte_july_fig][]', $meta['fte_july_fig'][$i], 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_Aug_fig][]', $meta['fte_Aug_fig'][$i], 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_sept_fig][]', $meta['fte_sept_fig'][$i], 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_oct_fig][]', $meta['fte_oct_fig'][$i], 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_nov_fig][]', $meta['fte_nov_fig'][$i], 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_dec_fig][]', $meta['fte_dec_fig'][$i], 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_jan_fig][]', $meta['fte_jan_fig'][$i], 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_feb_fig][]', $meta['fte_feb_fig'][$i], 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_mar_fig][]', $meta['fte_mar_fig'][$i], 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_apr_fig][]', $meta['fte_apr_fig'][$i], 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_may_fig][]', $meta['fte_may_fig'][$i], 'style="width: auto" size="4"'); ?></td>
					<td><?php echo form_input('meta[fte_jun_fig][]', $meta['fte_jun_fig'][$i], 'style="width: auto" size="4"'); ?></td>
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
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][0], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][1], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][2], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][3], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][4], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][5], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][6], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][7], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][8], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][9], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][10], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][11], 'style="width: auto" size="4"'); ?></th>
					<th><?php echo form_input('meta[labor_final_total]', $meta['labor_final_total'], 'style="width: auto" size="4"'); ?></th>
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
					<td><i><?php echo form_input('meta[da_sub_july]', $meta['da_sub_july'], 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_aug]', $meta['da_sub_aug'], 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_sept]', $meta['da_sub_sept'], 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_oct]', $meta['da_sub_oct'], 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_nov]', $meta['da_sub_nov'], 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_dec]', $meta['da_sub_dec'], 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_jan]', $meta['da_sub_jan'], 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_feb]', $meta['da_sub_feb'], 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_mar]', $meta['da_sub_mar'], 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_apr]', $meta['da_sub_apr'], 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_may]', $meta['da_sub_may'], 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_june]', $meta['da_sub_june'], 'style="width: 27px;" size="3"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_total]', $meta['da_sub_total'], 'style="width: 27px;" size="3"'); ?></i></td>
				</tr>
				<tr>
					<th colspan="2">Total Budget</th>
					<td><?php echo form_input('meta[da_total_july]', $meta['da_total_july'], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_aug]', $meta['da_total_aug'], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_sept]', $meta['da_total_sept'], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_oct]', $meta['da_total_oct'], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_nov]', $meta['da_total_nov'], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_dec]', $meta['da_total_dec'], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_jan]', $meta['da_total_jan'], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_feb]', $meta['da_total_feb'], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_mar]', $meta['da_total_mar'], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_apr]', $meta['da_total_apr'], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_may]', $meta['da_total_may'], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_june]', $meta['da_total_june'], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_total_total]', $meta['da_total_total'], 'style="width: 27px;" size="3"'); ?></td>
				</tr>
			</tfoot>
			<tbody>
				<?php for($i = 0; $i < 25; $i++): ?>
				<tr>
					<td><?php echo form_input('meta[da_row_acct][]', $meta['da_row_acct'][$i], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_desc][]', $meta['da_row_desc'][$i], 'style="width: 205px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_july][]', $meta['da_row_july'][$i], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_aug][]', $meta['da_row_aug'][$i], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_sept][]', $meta['da_row_sept'][$i], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_oct][]', $meta['da_row_oct'][$i], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_nov][]', $meta['da_row_nov'][$i], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_dec][]', $meta['da_row_dec'][$i], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_jan][]', $meta['da_row_jan'][$i], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_feb][]', $meta['da_row_feb'][$i], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_mar][]', $meta['da_row_mar'][$i], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_apr][]', $meta['da_row_apr'][$i], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_may][]', $meta['da_row_may'][$i], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_june][]', $meta['da_row_june'][$i], 'style="width: 27px;" size="3"'); ?></td>
					<td><?php echo form_input('meta[da_row_total][]', $meta['da_row_total'][$i], 'style="width: 27px;" size="3"'); ?></td>
				</tr>
				<?php endfor; ?>
			</tbody>
		</table>
	</div>
</div>

<p class="clear">
	<?php echo form_submit('submit_request', 'Save') ?>
</p>
<?php echo form_hidden('update_budget', 'true'); ?>
<?php echo form_close(); ?>
<?php load_footer() ?>