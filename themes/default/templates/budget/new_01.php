<?php load_header() ?>

<?php if ($this->session->flashdata('budget')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('budget') ?></p>
	</div>
<?php endif ?>

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
					<td>1<?php echo form_hidden('fund', '1'); ?></td>
					<td><?php echo form_dropdown('location', $locations, '', 'style="width: 120px;"'); ?></td>
					<td><?php echo form_dropdown('division', $divisions, '', 'style="width: 120px;"'); ?></td>
					<td><?php echo form_dropdown('dept', $depts, '', 'style="width: 120px;"'); ?></td>
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
				<td style="width: 180px;">Prior year Carry Forward:</td>
				<td>$<?php echo form_input('prior_year', '', ''); ?></td>
			</tr>
			<tr>
				<td>Expected Completion Date:</td>
				<td>&nbsp;<?php echo form_input('ex_comp_date', '', 'class="datepicker"'); ?></td>
			</tr>
			<tr>
				<td>Current Status:</td>
				<td>&nbsp;<?php echo form_dropdown('status', array('' => 'Select One', 'In Process' => 'In Process', 'Submitted Budget' => 'Submitted Budget', 'Approved Budget' => 'Approved Budget')); ?></td>
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
				<?php if (can_this_user('change_status')): ?>
				<td>&nbsp;<?php echo form_dropdown('prep_status', array('' => 'Select One', 'In Process' => 'In Process', 'Submitted for Approval' => 'Submitted for Approval', 'Approved' => 'Approved', 'Ended' => 'Ended')); ?> </td>
				<?php else: ?>
				<td>&nbsp;In Process <?php echo form_hidden('prep_status', 'In Process') ?></td>
				<?php endif ?>
			</tr>

			<tr>
				<td valign="top">Notes or Comments</td>
				<td><?php echo form_textarea('comment', '', ''); ?></td>
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
					<th><?php echo form_input('meta[fte_july_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_Aug_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_sept_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_oct_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_nov_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_dec_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_jan_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_feb_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_mar_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_apr_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_may_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[fte_jun_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
				</tr>
			</tfoot>
			<tbody>
				<?php for($i = 0; $i < 20; $i++): ?>
				<tr>
					<td>
						<select name="meta[fte_staff_name][]" style="width: 130px;">
							<option rel="0" fulltime="0">Choose User</option>
							<?php foreach ($users as $u): ?>
							<option value="<?php echo $u->ID ?>" rel="<?php echo @$u->meta['salary']; ?>" fulltime="<?php echo @$u->meta['fulltime']; ?>"><?php echo $u->meta['first_name'].' '.$u->meta['last_name']; ?></option>
							<?php endforeach ?>
						</select>
					</td>
					<td><?php echo form_input('meta[fte_july_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_Aug_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_sept_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_oct_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_nov_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_dec_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_jan_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_feb_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_mar_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_apr_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_may_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[fte_jun_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
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
					<td><?php echo form_input('meta[salaries_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[salaries_final_total]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td>6121</td>
					<th>Health Insurance</th>
					<td><?php echo form_input('meta[health_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[health_final_total]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td>6122</td>
					<th>Supplemental Insurance</th>
					<td><?php echo form_input('meta[supplemental_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[supplemental_final_total]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td>6124</td>
					<th>Pension</th>
					<td><?php echo form_input('meta[pension_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[pension_final_total]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td>6131</td>
					<th>Social Security Tax</th>
					<td><?php echo form_input('meta[sst_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[sst_final_total]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td>6132</td>
					<th>Unemployment Tax</th>
					<td><?php echo form_input('meta[unemployment_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[unemployment_final_total]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td>6123</td>
					<th>Workers Comp</th>
					<td><?php echo form_input('meta[workerscomp_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[workerscomp_final_total]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
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
					<td><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[labor_total][]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[labor_final_total]', '0.00', 'style="width: auto" size="5" rel="num_only" readonly="readonly"'); ?></td>
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
					<td><i><?php echo form_input('meta[da_sub_july]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_aug]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_sept]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_oct]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_nov]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_dec]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_jan]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_feb]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_mar]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_apr]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_may]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_june]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></i></td>
					<td><i><?php echo form_input('meta[da_sub_total]', '0.00', 'style="width: auto;" size="4" class="row_total" readonly="readonly" rel="num_only"'); ?></i></td>
				</tr>
				<tr>
					<th colspan="2">Total Budget</th>
					<td><?php echo form_input('meta[da_total_july]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_aug]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_sept]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_oct]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_nov]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_dec]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_jan]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_feb]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_mar]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_apr]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_may]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_june]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="col_total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[da_total_total]', '0.00', 'style="width: auto;" size="4" class="row_total" readonly="readonly" rel="num_only"'); ?></td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach ($da_accounts as $key => $value): ?>
				<?php if(strlen($da_accounts[$key])): ?>
				<?php $disabled = ((can_this_user('set_all_da_values') || ($da_role_required[$key] == 'all') || ($da_role_required[$key] == $this->user->user_group)) ? '' : ' readonly="readonly"') ?>
				<tr>
					<td><?php echo $da_accounts[$key] ?></td>
					<td><?php echo $da_descriptions[$key] ?></td>
					<td><?php echo form_input('meta[da_row_july][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_aug][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_sept][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_oct][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_nov][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_dec][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_jan][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_feb][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_mar][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_apr][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_may][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_june][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'.$disabled); ?></td>
					<td><?php echo form_input('meta[da_row_total][]', '0.00', 'style="width: auto;" size="4" class="row_total" readonly="readonly" rel="num_only"'.$disabled); ?></td>
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
					<td><?php echo form_radio('meta[hours_month_use]', 1, '', 'class="hours-month" checked="checked"'); ?> Month1</td>
					<td><?php echo form_input('meta[hours_Month][]', 120); ?></td>

					<td><?php echo form_radio('meta[hours_month_use]', 2, '', 'class="hours-month"'); ?> Month2</td>
					<td><?php echo form_input('meta[hours_Month][]', 160); ?></td>

					<td><?php echo form_radio('meta[hours_month_use]', 3, '', 'class="hours-month"'); ?> Month3</td>
					<td><?php echo form_input('meta[hours_Month][]', 240); ?></td>

					<td><?php echo form_radio('meta[hours_month_use]', 4, '', 'class="hours-month"'); ?> Month4</td>
					<td><?php echo form_input('meta[hours_Month][]', 200); ?></td>
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
					<th><?php echo form_input('meta[al_july_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_Aug_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_sept_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_oct_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_nov_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_dec_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_jan_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_feb_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_mar_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_apr_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_may_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
					<th><?php echo form_input('meta[al_jun_total]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></th>
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
					<td><?php echo form_input('meta[al_hf_rate][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_full_time][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_july_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_Aug_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_sept_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_oct_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_nov_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_dec_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_jan_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_feb_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_mar_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_apr_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_may_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
					<td><?php echo form_input('meta[al_jun_fig][]', '0.00', 'style="width: auto" size="4" rel="num_only" readonly="readonly"'); ?></td>
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
<?php echo form_hidden('insert_budget', 'true'); ?>
<?php echo form_close(); ?>

<script>
var assumptions = <?php echo json_encode($settings) ?>;
</script>
<?php load_footer() ?>