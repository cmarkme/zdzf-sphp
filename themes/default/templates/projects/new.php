<?php load_header() ?>

<?php if ($this->session->flashdata('projects')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('projects') ?></p>
	</div>
<?php endif ?>

<h1>New Project</h1>

<?php echo form_open_multipart(site_url('projects/new_budget/')) ?>

<?php //start general information block ?>
<div class="ui-block wide">
	<h3><a href="#">General Information</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th style="width: 150px;">Grant Title</th>
					<td>
						<?php echo form_input('grant_title'); ?>
					</td>
				</tr>
				<tr>
					<th style="width: 150px;">Current Status</th>
					<td>
						<?php echo form_dropdown('current_status', array(
						'Active' => 'Active',
						'Being Pursued' => 'Being Pursued',
						'Consider Applying' => 'Consider Applying',
						'Ended - Complete' => 'Ended - Complete',
						'Turned Down' => 'Turned Down'
						)) ?>
					</td>
				</tr>
				<tr>
					<th style="width: 150px;">Finance Dept. Title</th>
					<td>
						<?php echo form_input('fin_dept_title'); ?>
					</td>
				</tr>
				<tr>
					<th style="width: 150px;">Total Amount of Grant</th>
					<td>
						<?php echo form_input('total_amt_grant'); ?>
					</td>
				</tr>
				<tr>
					<th style="width: 150px;">Contract Start Date</th>
					<td>
						<?php echo form_input('start_date', '', 'class="datepicker"'); ?>
					</td>
				</tr>
				<tr>
					<th style="width: 150px;">Contract End Date</th>
					<td>
						<?php echo form_input('end_date', '', 'class="datepicker"'); ?>
					</td>
				</tr>
				<tr>
					<th style="width: 150px;">Responsible Staff Pers</th>
					<td>
						<?php echo form_dropdown('res_staff', $staff); ?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Schedule of Reports Due To Funders</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th><?php echo date('F') ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+1), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+2), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+3), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+4), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+5), 1)) ?></th>
				</tr>
				<tr>
					<td><?php echo form_input('schedule[]['.date('F/Y').']', '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_input('schedule[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+1), 1)).']', '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_input('schedule[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+2), 1)).']', '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_input('schedule[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+3), 1)).']', '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_input('schedule[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+4), 1)).']', '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_input('schedule[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+5), 1)).']', '', 'style="width: 100px;"'); ?></td>
				</tr>
				<tr>
					<td colspan="6" style="border-bottom: none;">&nbsp;</td>
				</tr>
				<tr>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+6), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+7), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+8), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+9), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+10), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+11), 1)) ?></th>
				</tr>
				<tr>
					<td><?php echo form_input('schedule[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+6), 1)).']', '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_input('schedule[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+7), 1)).']', '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_input('schedule[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+8), 1)).']', '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_input('schedule[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+9), 1)).']', '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_input('schedule[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+10), 1)).']', '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_input('schedule[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+11), 1)).']', '', 'style="width: 100px;"'); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Expense Balances (Funds Remaining) For Period Ended</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th>PY Balance FWD</th>
					<td colspan="12"><?php echo form_input('py_bal_fwd') ?></td>
				</tr>
				<tr>
					<td>Current</td>
					<th><?php echo date('F') ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+1), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+2), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+3), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+4), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+5), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+6), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+7), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+8), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+9), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+10), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+11), 1)) ?></th>
				</tr>
				<tr>
					<th></th>
					<th>Period 1</th>
					<th>Period 2</th>
					<th>Period 3</th>
					<th>Period 4</th>
					<th>Period 5</th>
					<th>Period 6</th>
					<th>Period 7</th>
					<th>Period 8</th>
					<th>Period 9</th>
					<th>Period 10</th>
					<th>Period 11</th>
					<th>Period 12</th>
				</tr>
				<tr>
					<th>Expenses:</th>
					<td><?php echo form_input('expenses[]['.date('F/Y').']', '', 'style="width: 45px;" class="expenses"'); ?></td>
					<td><?php echo form_input('expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+1), 1)).']', '', 'style="width: 45px;" class="expenses"'); ?></td>
					<td><?php echo form_input('expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+2), 1)).']', '', 'style="width: 45px;" class="expenses"'); ?></td>
					<td><?php echo form_input('expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+3), 1)).']', '', 'style="width: 45px;" class="expenses"'); ?></td>
					<td><?php echo form_input('expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+4), 1)).']', '', 'style="width: 45px;" class="expenses"'); ?></td>
					<td><?php echo form_input('expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+5), 1)).']', '', 'style="width: 45px;" class="expenses"'); ?></td>
					<td><?php echo form_input('expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+6), 1)).']', '', 'style="width: 45px;" class="expenses"'); ?></td>
					<td><?php echo form_input('expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+7), 1)).']', '', 'style="width: 45px;" class="expenses"'); ?></td>
					<td><?php echo form_input('expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+8), 1)).']', '', 'style="width: 45px;" class="expenses"'); ?></td>
					<td><?php echo form_input('expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+9), 1)).']', '', 'style="width: 45px;" class="expenses"'); ?></td>
					<td><?php echo form_input('expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+10), 1)).']', '', 'style="width: 45px;" class="expenses"'); ?></td>
					<td><?php echo form_input('expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+11), 1)).']', '', 'style="width: 45px;" class="expenses"'); ?></td>
				</tr>
				<tr>
					<th>Cumulative <br />Expenses:</th>
					<td><?php echo form_input('cumulative_expenses[]['.date('F/Y').']', '', 'style="width: 45px;" class="cumulative_expenses"'); ?></td>
					<td><?php echo form_input('cumulative_expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+1), 1)).']', '', 'style="width: 45px;" class="cumulative_expenses"'); ?></td>
					<td><?php echo form_input('cumulative_expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+2), 1)).']', '', 'style="width: 45px;" class="cumulative_expenses"'); ?></td>
					<td><?php echo form_input('cumulative_expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+3), 1)).']', '', 'style="width: 45px;" class="cumulative_expenses"'); ?></td>
					<td><?php echo form_input('cumulative_expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+4), 1)).']', '', 'style="width: 45px;" class="cumulative_expenses"'); ?></td>
					<td><?php echo form_input('cumulative_expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+5), 1)).']', '', 'style="width: 45px;" class="cumulative_expenses"'); ?></td>
					<td><?php echo form_input('cumulative_expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+6), 1)).']', '', 'style="width: 45px;" class="cumulative_expenses"'); ?></td>
					<td><?php echo form_input('cumulative_expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+7), 1)).']', '', 'style="width: 45px;" class="cumulative_expenses"'); ?></td>
					<td><?php echo form_input('cumulative_expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+8), 1)).']', '', 'style="width: 45px;" class="cumulative_expenses"'); ?></td>
					<td><?php echo form_input('cumulative_expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+9), 1)).']', '', 'style="width: 45px;" class="cumulative_expenses"'); ?></td>
					<td><?php echo form_input('cumulative_expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+10), 1)).']', '', 'style="width: 45px;" class="cumulative_expenses"'); ?></td>
					<td><?php echo form_input('cumulative_expenses[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+11), 1)).']', '', 'style="width: 45px;" class="cumulative_expenses"'); ?></td>
				</tr>
				<tr>
					<th>Income:</th>
					<td><?php echo form_input('income[]['.date('F/Y').']', '', 'style="width: 45px;"'); ?></td>
					<td><?php echo form_input('income[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+1), 1)).']', '', 'style="width: 45px;"'); ?></td>
					<td><?php echo form_input('income[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+2), 1)).']', '', 'style="width: 45px;"'); ?></td>
					<td><?php echo form_input('income[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+3), 1)).']', '', 'style="width: 45px;"'); ?></td>
					<td><?php echo form_input('income[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+4), 1)).']', '', 'style="width: 45px;"'); ?></td>
					<td><?php echo form_input('income[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+5), 1)).']', '', 'style="width: 45px;"'); ?></td>
					<td><?php echo form_input('income[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+6), 1)).']', '', 'style="width: 45px;"'); ?></td>
					<td><?php echo form_input('income[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+7), 1)).']', '', 'style="width: 45px;"'); ?></td>
					<td><?php echo form_input('income[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+8), 1)).']', '', 'style="width: 45px;"'); ?></td>
					<td><?php echo form_input('income[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+9), 1)).']', '', 'style="width: 45px;"'); ?></td>
					<td><?php echo form_input('income[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+10), 1)).']', '', 'style="width: 45px;"'); ?></td>
					<td><?php echo form_input('income[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+11), 1)).']', '', 'style="width: 45px;"'); ?></td>
				</tr>
				<tr>
					<th></th>
					<td><?php echo form_input('cumulative_total[]['.date('F/Y').']', '', 'style="width: 45px;" class="cumulative_total"'); ?></td>
					<td><?php echo form_input('cumulative_total[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+1), 1)).']', '', 'style="width: 45px;" class="cumulative_total"'); ?></td>
					<td><?php echo form_input('cumulative_total[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+2), 1)).']', '', 'style="width: 45px;" class="cumulative_total"'); ?></td>
					<td><?php echo form_input('cumulative_total[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+3), 1)).']', '', 'style="width: 45px;" class="cumulative_total"'); ?></td>
					<td><?php echo form_input('cumulative_total[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+4), 1)).']', '', 'style="width: 45px;" class="cumulative_total"'); ?></td>
					<td><?php echo form_input('cumulative_total[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+5), 1)).']', '', 'style="width: 45px;" class="cumulative_total"'); ?></td>
					<td><?php echo form_input('cumulative_total[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+6), 1)).']', '', 'style="width: 45px;" class="cumulative_total"'); ?></td>
					<td><?php echo form_input('cumulative_total[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+7), 1)).']', '', 'style="width: 45px;" class="cumulative_total"'); ?></td>
					<td><?php echo form_input('cumulative_total[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+8), 1)).']', '', 'style="width: 45px;" class="cumulative_total"'); ?></td>
					<td><?php echo form_input('cumulative_total[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+9), 1)).']', '', 'style="width: 45px;" class="cumulative_total"'); ?></td>
					<td><?php echo form_input('cumulative_total[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+10), 1)).']', '', 'style="width: 45px;" class="cumulative_total"'); ?></td>
					<td><?php echo form_input('cumulative_total[]['.date('F/Y', mktime(0,0,0, ((int)date('m')+11), 1)).']', '', 'style="width: 45px;" class="cumulative_total"'); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Detailed Budget Reports for Period Ending</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th><?php echo date('F') ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+1), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+2), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+3), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+4), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+5), 1)) ?></th>
				</tr>
				<tr>
					<td><?php echo form_upload('report_'.date('F_Y'), '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_upload('report_'.date('F_Y', mktime(0,0,0, ((int)date('m')+1), 1)), '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_upload('report_'.date('F_Y', mktime(0,0,0, ((int)date('m')+2), 1)), '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_upload('report_'.date('F_Y', mktime(0,0,0, ((int)date('m')+3), 1)), '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_upload('report_'.date('F_Y', mktime(0,0,0, ((int)date('m')+4), 1)), '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_upload('report_'.date('F_Y', mktime(0,0,0, ((int)date('m')+5), 1)), '', 'style="width: 100px;"'); ?></td>
				</tr>
				<tr>
					<td colspan="6" style="border-bottom: none;">&nbsp;</td>
				</tr>
				<tr>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+6), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+7), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+8), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+9), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+10), 1)) ?></th>
					<th><?php echo date('F', mktime(0,0,0, ((int)date('m')+11), 1)) ?></th>
				</tr>
				<tr>
					<td><?php echo form_upload('report_'.date('F_Y', mktime(0,0,0, ((int)date('m')+6), 1)), '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_upload('report_'.date('F_Y', mktime(0,0,0, ((int)date('m')+7), 1)), '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_upload('report_'.date('F_Y', mktime(0,0,0, ((int)date('m')+8), 1)), '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_upload('report_'.date('F_Y', mktime(0,0,0, ((int)date('m')+9), 1)), '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_upload('report_'.date('F_Y', mktime(0,0,0, ((int)date('m')+10), 1)), '', 'style="width: 100px;"'); ?></td>
					<td><?php echo form_upload('report_'.date('F_Y', mktime(0,0,0, ((int)date('m')+11), 1)), '', 'style="width: 100px;"'); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Other Information</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th style="width: 250px;">Grantor/Fundor</th>
					<td><?php echo form_input('grantor') ?></td>
				</tr>
				<tr>
					<th style="width: 250px;">Amount of Original Request</th>
					<td><?php echo form_input('org_request') ?></td>
				</tr>
				<tr>
					<th style="width: 250px;">Date Of Request</th>
					<td><?php echo form_input('date_of_request', '', 'class="datepicker"') ?></td>
				</tr>
				<tr>
					<th style="width: 250px;">Decision Date</th>
					<td><?php echo form_input('decision_date', '', 'class="datepicker"') ?></td>
				</tr>
				<tr>
					<th style="width: 250px;">Fund Date</th>
					<td><?php echo form_input('fund_date', '', 'class="datepicker"') ?></td>
				</tr>
				<tr>
					<th style="width: 250px;">Approved Account List</th>
					<td><?php echo form_upload('account_list') ?></td>
				</tr>
				<tr>
					<th style="width: 250px;">Amount of Grant Pending</th>
					<td><?php echo form_input('amount_pending') ?></td>
				</tr>
				<tr>
					<th style="width: 250px;">Program Area</th>
					<td><?php echo form_input('program_area') ?></td>
				</tr>
				<tr>
					<th style="width: 250px; vertical-align: top; padding-top: 3px;">Additional Info</th>
					<td><?php echo form_textarea('add_info') ?></td>
				</tr>
				<tr>
					<th style="width: 250px; vertical-align: top; padding-top: 3px;">Comments/Action_plan</th>
					<td><?php echo form_textarea('comments') ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<p class="clear">
	<?php echo form_submit('insert_project', 'Save') ?>
</p>
<?php echo form_hidden('insert_project', 'true'); ?>
<?php echo form_hidden('project_type', $this->uri->segment(3)); ?>
<?php echo form_close(); ?>
<?php load_footer() ?>