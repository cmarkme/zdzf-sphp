<?php load_header() ?>

<?php if ($this->session->flashdata('budget')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('budget') ?></p>
	</div>
<?php endif ?>

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
					<td>1<?php echo form_hidden('fund', $fund); ?></td>
					<td><?php echo form_dropdown('location', $locations, $location, 'style="width: 120px;"'); ?></td>
					<td><?php echo form_dropdown('division', $divisions, $division, 'style="width: 120px;"'); ?></td>
					<td><?php echo form_dropdown('dept', $depts, $dept, 'style="width: 120px;"'); ?></td>
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
				<td style="width: 180px;">Prior year Carry Forward:</td>
				<td>$<?php echo form_input('prior_year', $prior_year, ''); ?></td>
			</tr>
			<tr>
				<td>Expected Completion Date:</td>
				<td>&nbsp;<?php echo form_input('ex_comp_date', date_for_display($ex_comp_date), 'class="datepicker"'); ?></td>
			</tr>
			<tr>
				<td>Current Status:</td>
				<td>&nbsp;<?php echo form_dropdown('status', array('' => 'Select One', 'In Process' => 'In Process', 'Submitted Budget' => 'Submitted Budget', 'Approved Budget' => 'Approved Budget'), $status); ?></td>
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
				<?php if (can_this_user('change_status')): ?>
				<td>&nbsp;<?php echo form_dropdown('prep_status', array('' => 'Select One', 'In Process' => 'In Process', 'Submitted for Approval' => 'Submitted for Approval', 'Approved' => 'Approved', 'Ended' => 'Ended'), $prep_status); ?> </td>
				<?php else: ?>
				<td>&nbsp;<?php echo $prep_status; ?><?php echo form_hidden('prep_status', 'In Process'); ?></td>
				<?php endif ?>
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
		<table cellpadding="0" cellspacing="0" border="0" id="staff_planning">
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
					<th><?php echo form_input('meta[fte_july_total]', $meta['fte_july_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_Aug_total]', $meta['fte_Aug_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_sept_total]', $meta['fte_sept_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_oct_total]', $meta['fte_oct_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_nov_total]', $meta['fte_nov_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_dec_total]', $meta['fte_dec_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_jan_total]', $meta['fte_jan_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_feb_total]', $meta['fte_feb_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_mar_total]', $meta['fte_mar_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_apr_total]', $meta['fte_apr_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_may_total]', $meta['fte_may_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_jun_total]', $meta['fte_jun_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
				</tr>
			</tfoot>
			<tbody>
				<?php for($i = 0; $i < 20; $i++): ?>
				<tr>
					<td>
						<select name="meta[fte_staff_name][]" style="width: 130px;">
							<option rel="0" fulltime="0">Choose User</option>
							<?php foreach ($users as $u): ?>
							<option <?php echo (($meta['fte_staff_name'][$i] == $u->ID) ? 'selected' : ''); ?> value="<?php echo $u->ID ?>" rel="<?php echo @$u->meta['salary']; ?>" fulltime="<?php echo @$u->meta['fulltime']; ?>"><?php echo $u->meta['first_name'].' '.$u->meta['last_name']; ?></option>
							<?php endforeach ?>
						</select>
					</td>
					<td><?php echo form_input('meta[fte_july_fig][]', $meta['fte_july_fig'][$i], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_Aug_fig][]', $meta['fte_Aug_fig'][$i], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_sept_fig][]', $meta['fte_sept_fig'][$i], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_oct_fig][]', $meta['fte_oct_fig'][$i], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_nov_fig][]', $meta['fte_nov_fig'][$i], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_dec_fig][]', $meta['fte_dec_fig'][$i], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_jan_fig][]', $meta['fte_jan_fig'][$i], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_feb_fig][]', $meta['fte_feb_fig'][$i], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_mar_fig][]', $meta['fte_mar_fig'][$i], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_apr_fig][]', $meta['fte_apr_fig'][$i], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_may_fig][]', $meta['fte_may_fig'][$i], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_jun_fig][]', $meta['fte_jun_fig'][$i], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
				</tr>
				<?php endfor; ?>
			</tbody>			
		</table>
	</div>
</div>	

<div class="ui-block wide">
	<h3><a href="#">Salary Accounts</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0" id="salary_accounts">
			<thead>
				<?php if (can_this_user('view_salary_calculations')): ?>
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
				<?php else: ?>
				<tr>
					<th colspan="13">Expenses including benefits where covered</th>
				</tr>
				<?php endif; ?>
				<tr>
					<td colspan="15">&nbsp;</td>
				</tr>
			</thead>
			<tbody>
				<?php if (can_this_user('view_salary_calculations')): ?>
				<tr>
					<td>6111</td>
					<th>Salaries</th>
					<td><?php echo form_input('meta[salaries_total][]', $meta['salaries_total'][0], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', $meta['salaries_total'][1], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', $meta['salaries_total'][2], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', $meta['salaries_total'][3], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', $meta['salaries_total'][4], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', $meta['salaries_total'][5], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', $meta['salaries_total'][6], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', $meta['salaries_total'][7], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', $meta['salaries_total'][8], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', $meta['salaries_total'][9], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', $meta['salaries_total'][10], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', $meta['salaries_total'][11], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_final_total]', $meta['salaries_final_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td>6121</td>
					<th>Health Insurance</th>
					<td><?php echo form_input('meta[health_total][]', $meta['health_total'][0], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', $meta['health_total'][1], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', $meta['health_total'][2], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', $meta['health_total'][3], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', $meta['health_total'][4], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', $meta['health_total'][5], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', $meta['health_total'][6], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', $meta['health_total'][7], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', $meta['health_total'][8], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', $meta['health_total'][9], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', $meta['health_total'][10], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', $meta['health_total'][11], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_final_total]', $meta['health_final_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td>6122</td>
					<th>Supplemental Insurance</th>
					<td><?php echo form_input('meta[supplemental_total][]', $meta['supplemental_total'][0], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', $meta['supplemental_total'][1], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', $meta['supplemental_total'][2], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', $meta['supplemental_total'][3], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', $meta['supplemental_total'][4], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', $meta['supplemental_total'][5], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', $meta['supplemental_total'][6], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', $meta['supplemental_total'][7], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', $meta['supplemental_total'][8], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', $meta['supplemental_total'][9], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', $meta['supplemental_total'][10], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', $meta['supplemental_total'][11], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_final_total]', $meta['supplemental_final_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td>6124</td>
					<th>Pension</th>
					<td><?php echo form_input('meta[pension_total][]', $meta['pension_total'][0], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', $meta['pension_total'][1], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', $meta['pension_total'][2], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', $meta['pension_total'][3], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', $meta['pension_total'][4], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', $meta['pension_total'][5], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', $meta['pension_total'][6], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', $meta['pension_total'][7], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', $meta['pension_total'][8], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', $meta['pension_total'][9], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', $meta['pension_total'][10], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', $meta['pension_total'][11], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_final_total]', $meta['pension_final_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td>6131</td>
					<th>Social Security Tax</th>
					<td><?php echo form_input('meta[sst_total][]', $meta['sst_total'][0], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', $meta['sst_total'][1], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', $meta['sst_total'][2], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', $meta['sst_total'][3], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', $meta['sst_total'][4], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', $meta['sst_total'][5], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', $meta['sst_total'][6], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', $meta['sst_total'][7], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', $meta['sst_total'][8], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', $meta['sst_total'][9], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', $meta['sst_total'][10], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', $meta['sst_total'][11], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_final_total]', $meta['sst_final_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td>6132</td>
					<th>Unemployment Tax</th>
					<td><?php echo form_input('meta[unemployment_total][]', $meta['unemployment_total'][0], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', $meta['unemployment_total'][1], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', $meta['unemployment_total'][2], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', $meta['unemployment_total'][3], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', $meta['unemployment_total'][4], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', $meta['unemployment_total'][5], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', $meta['unemployment_total'][6], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', $meta['unemployment_total'][7], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', $meta['unemployment_total'][8], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', $meta['unemployment_total'][9], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', $meta['unemployment_total'][10], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', $meta['unemployment_total'][11], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_final_total]', $meta['unemployment_final_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td>6123</td>
					<th>Workers Comp</th>
					<td><?php echo form_input('meta[workerscomp_total][]', $meta['workerscomp_total'][0], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', $meta['workerscomp_total'][1], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', $meta['workerscomp_total'][2], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', $meta['workerscomp_total'][3], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', $meta['workerscomp_total'][4], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', $meta['workerscomp_total'][5], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', $meta['workerscomp_total'][6], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', $meta['workerscomp_total'][7], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', $meta['workerscomp_total'][8], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', $meta['workerscomp_total'][9], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', $meta['workerscomp_total'][10], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', $meta['workerscomp_total'][11], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_final_total]', $meta['workerscomp_final_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td colspan="15">&nbsp;</td>
				</tr>
				<?php endif; ?>
				<tr>
					<?php if (can_this_user('view_salary_calculations')): ?>
					<td></td>
					<th>Expenses including benefits where covered</th>
					<?php endif; ?>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][0], 'style="width: auto" size="4" rel="num_only"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][1], 'style="width: auto" size="4" rel="num_only"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][2], 'style="width: auto" size="4" rel="num_only"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][3], 'style="width: auto" size="4" rel="num_only"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][4], 'style="width: auto" size="4" rel="num_only"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][5], 'style="width: auto" size="4" rel="num_only"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][6], 'style="width: auto" size="4" rel="num_only"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][7], 'style="width: auto" size="4" rel="num_only"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][8], 'style="width: auto" size="4" rel="num_only"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][9], 'style="width: auto" size="4" rel="num_only"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][10], 'style="width: auto" size="4" rel="num_only"'); ?></th>
					<th><?php echo form_input('meta[labor_total][]', $meta['labor_total'][11], 'style="width: auto" size="4" rel="num_only"'); ?></th>
					<th><?php echo form_input('meta[labor_final_total]', $meta['labor_final_total'], 'style="width: auto" size="4" rel="num_only"'); ?></th>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Discretionary Accounts</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0" id="disc_acc">
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
					<td><i><?php echo form_input('meta[da_sub_july]', $meta['da_sub_july'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_aug]', $meta['da_sub_aug'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_sept]', $meta['da_sub_sept'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_oct]', $meta['da_sub_oct'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_nov]', $meta['da_sub_nov'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_dec]', $meta['da_sub_dec'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_jan]', $meta['da_sub_jan'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_feb]', $meta['da_sub_feb'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_mar]', $meta['da_sub_mar'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_apr]', $meta['da_sub_apr'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_may]', $meta['da_sub_may'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_june]', $meta['da_sub_june'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_total]', $meta['da_sub_total'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
				</tr>
				<tr>
					<th colspan="2">Total Budget</th>
					<td><?php echo form_input('meta[da_total_july]', $meta['da_total_july'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_aug]', $meta['da_total_aug'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_sept]', $meta['da_total_sept'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_oct]', $meta['da_total_oct'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_nov]', $meta['da_total_nov'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_dec]', $meta['da_total_dec'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_jan]', $meta['da_total_jan'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_feb]', $meta['da_total_feb'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_mar]', $meta['da_total_mar'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_apr]', $meta['da_total_apr'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_may]', $meta['da_total_may'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_june]', $meta['da_total_june'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_total]', $meta['da_total_total'], 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach ($da_accounts as $key => $value): ?>
				<?php if(strlen($da_accounts[$key])): ?>
				<?php $disabled = ((can_this_user('set_all_da_values') || ($da_role_required[$key] == 'all') || ($da_role_required[$key] == $this->user->user_group)) ? '' : ' readonly="readonly"') ?>
				<tr>
					<td><?php echo $da_accounts[$key] ?></td>
					<td><?php echo $da_descriptions[$key] ?></td>
					<td><?php echo form_input('meta[da_row_july][]', (isset($meta['da_row_july'][$key]) ? $meta['da_row_july'][$key] : '0.00'), 'style="width: auto;" size="4" rel="num_only" class="col_total"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_aug][]', (isset($meta['da_row_aug'][$key]) ? $meta['da_row_aug'][$key] : '0.00'), 'style="width: auto;" size="4" rel="num_only" class="col_total"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_sept][]', (isset($meta['da_row_sept'][$key]) ? $meta['da_row_sept'][$key] : '0.00'), 'style="width: auto;" size="4" rel="num_only" class="col_total"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_oct][]', (isset($meta['da_row_oct'][$key]) ? $meta['da_row_oct'][$key] : '0.00'), 'style="width: auto;" size="4" rel="num_only" class="col_total"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_nov][]', (isset($meta['da_row_nov'][$key]) ? $meta['da_row_nov'][$key] : '0.00'), 'style="width: auto;" size="4" rel="num_only" class="col_total"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_dec][]', (isset($meta['da_row_dec'][$key]) ? $meta['da_row_dec'][$key] : '0.00'), 'style="width: auto;" size="4" rel="num_only" class="col_total"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_jan][]', (isset($meta['da_row_jan'][$key]) ? $meta['da_row_jan'][$key] : '0.00'), 'style="width: auto;" size="4" rel="num_only" class="col_total"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_feb][]', (isset($meta['da_row_feb'][$key]) ? $meta['da_row_feb'][$key] : '0.00'), 'style="width: auto;" size="4" rel="num_only" class="col_total"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_mar][]', (isset($meta['da_row_mar'][$key]) ? $meta['da_row_mar'][$key] : '0.00'), 'style="width: auto;" size="4" rel="num_only" class="col_total"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_apr][]', (isset($meta['da_row_apr'][$key]) ? $meta['da_row_apr'][$key] : '0.00'), 'style="width: auto;" size="4" rel="num_only" class="col_total"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_may][]', (isset($meta['da_row_may'][$key]) ? $meta['da_row_may'][$key] : '0.00'), 'style="width: auto;" size="4" rel="num_only" class="col_total"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_june][]', (isset($meta['da_row_june'][$key]) ? $meta['da_row_june'][$key] : '0.00'), 'style="width: auto;" size="4" rel="num_only" class="col_total"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_total][]', (isset($meta['da_row_total'][$key]) ? $meta['da_row_total'][$key] : '0.00'), 'style="width: auto;" size="4" rel="num_only" class="col_total" class="row_total"'.$disabled); ?></td>
				</tr>
				<?php endif; ?>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<?php if(can_this_user('handle_budget_admin_labor')): ?>
<div class="ui-block wide">
	<h3><a href="#">Administrative Labor</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<td><?php echo form_radio('meta[hours_month_use]', 1, '', 'class="hours-month"'.(($meta['hours_month_use'] == 1) ? 'checked="checked"' : '')); ?> Month1</td>
					<td><?php echo form_input('meta[hours_Month][]', $meta['hours_Month'][0]); ?></td>

					<td><?php echo form_radio('meta[hours_month_use]', 2, '', 'class="hours-month"'.(($meta['hours_month_use'] == 2) ? 'checked="checked"' : '')); ?> Month2</td>
					<td><?php echo form_input('meta[hours_Month][]', $meta['hours_Month'][1]); ?></td>

					<td><?php echo form_radio('meta[hours_month_use]', 3, '', 'class="hours-month"'.(($meta['hours_month_use'] == 3) ? 'checked="checked"' : '')); ?> Month3</td>
					<td><?php echo form_input('meta[hours_Month][]', $meta['hours_Month'][2]); ?></td>

					<td><?php echo form_radio('meta[hours_month_use]', 4, '', 'class="hours-month"'.(($meta['hours_month_use'] == 4) ? 'checked="checked"' : '')); ?> Month4</td>
					<td><?php echo form_input('meta[hours_Month][]', $meta['hours_Month'][3]); ?></td>
				</tr>
			</tbody>
		</table>

		<table cellpadding="0" cellspacing="0" border="0" id="admin_labor">
			<thead>
				<tr>
					<th>Staff Members</th>
					<th>Hr Rate</th>
					<th>Full Time</th>
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
					<th>Total Direct Labor</th>
					<th></th>
					<th></th>
					<th><?php echo form_input('meta[al_july_total]', $meta['al_july_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_Aug_total]', $meta['al_Aug_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_sept_total]', $meta['al_sept_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_oct_total]', $meta['al_oct_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_nov_total]', $meta['al_nov_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_dec_total]', $meta['al_dec_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_jan_total]', $meta['al_jan_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_feb_total]', $meta['al_feb_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_mar_total]', $meta['al_mar_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_apr_total]', $meta['al_apr_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_may_total]', $meta['al_may_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_jun_total]', $meta['al_jun_total'], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
				</tr>
			</tfoot>
			<tbody>
				<?php for($i = 0; $i < 20; $i++): ?>
				<tr>
					<td>
						<select name="meta[al_staff_name][]" style="width: 130px;" readonly="readonly">
							<option rel="0">Choose User</option>
							<?php foreach ($users as $u): ?>
							<option value="<?php echo $u->ID ?>" rel="<?php echo @$u->meta['salary']; ?>"><?php echo $u->meta['first_name'].' '.$u->meta['last_name']; ?></option>
							<?php endforeach ?>
						</select>
					</td>
					<td><?php echo form_input('meta[al_hf_rate][]', $meta['al_hf_rate'][0], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_full_time][]', $meta['al_full_time'][1], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_july_fig][]', $meta['al_july_fig'][2], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_Aug_fig][]', $meta['al_Aug_fig'][3], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_sept_fig][]', $meta['al_sept_fig'][4], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_oct_fig][]', $meta['al_oct_fig'][5], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_nov_fig][]', $meta['al_nov_fig'][6], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_dec_fig][]', $meta['al_dec_fig'][7], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_jan_fig][]', $meta['al_jan_fig'][8], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_feb_fig][]', $meta['al_feb_fig'][9], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_mar_fig][]', $meta['al_mar_fig'][10], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_apr_fig][]', $meta['al_apr_fig'][11], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_may_fig][]', $meta['al_may_fig'][12], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_jun_fig][]', $meta['al_jun_fig'][13], 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
				</tr>
				<?php endfor; ?>
			</tbody>			
		</table>
	</div>
</div>
<?php endif; ?>

<p class="clear">
	<?php echo form_submit('submit_request', 'Save') ?>
</p>
<?php echo form_hidden('update_budget', 'true'); ?>
<?php echo form_close(); ?>
<?php load_footer() ?>