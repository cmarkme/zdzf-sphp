<?php load_header() ?>

<?php if ($this->session->flashdata('timesheet')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('timesheet') ?></p>
	</div>
<?php endif ?>

<h1>New Timesheet</h1>

<?php echo form_open(site_url('timesheet/new_timesheet/'), array('id' => 'timesheet_form')) ?>

<?php //start general information block ?>
<div class="ui-block wide">
	<h3><a href="#">General Information</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th style="width: 150px;">For</th>
					<td>
						<?php echo @$user->meta['first_name'].' '.@$user->meta['last_name']; ?>
						<?php echo form_hidden('first_name', $user->meta['first_name']); ?>
						<?php echo form_hidden('last_name', $user->meta['last_name']); ?>
					</td>
				</tr>
				<tr>
					<th style="width: 150px;">Pay Period</th>
					<td>
					<?php if (can_this_user('set_timesheet_pay_period')): ?>
						<?php echo form_input('period_start', date('m/j/Y', strtotime('saturday last week', time())), 'style="width: 100px;" class="ts_start_datepicker"'); ?>
						<?php echo form_input('period_end', date('m/j/Y', strtotime('friday next week', time())), 'style="width: 100px;" class="ts_end_datepicker" readonly'); ?>
					<?php else: ?>	
						<?php echo date('m/j/Y', strtotime('saturday last week', time())); ?> &nbsp; -&nbsp; <?php echo date('m/j/Y', strtotime('friday next week', time())); ?>
						<?php echo form_hidden('period_start', date('m/j/Y', strtotime('saturday last week', time()))); ?>
						<?php echo form_hidden('period_end', date('m/j/Y', strtotime('friday next week', time()))); ?>
						<?php endif ?>
					</td>
				</tr>
				<tr>
					<th style="width: 150px;">Current Status</th>
					<?php if (can_this_user('change_status')): ?>
					<td><?php echo form_dropdown('current_status', array('In Process' => 'In Process', 'Submitted for Approval' => 'Submitted for Approval', 'Approved' => 'Approved')); ?></td>
					<?php else: ?>
					<td>In Process <?php echo form_hidden('current_status', 'In Process'); ?></td>
					<?php endif ?>
				</tr>
				<tr>
					<th style="width: 150px;">Manager</th>
					<td>
					<?php if (can_this_user('set_timesheet_manager')): ?>
						<?php echo form_dropdown('manager', $users, $user->user_manager); ?>
					<?php else: ?>
						<?php echo $manager->meta['first_name'].' '.$manager->meta['last_name']; ?>
					<?php endif ?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<?php if (isset($this->user->meta['grant_matching']) && $this->user->meta['grant_matching'] == 'Yes'): ?>
<?php //start grant matching block ?>
<div class="ui-block wide">
	<h3><a href="#">Grant Matching</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0" class="gweek1-table">
			<tbody>
				<tr>
					<th colspan="11">Week 1</th>
				</tr>
				<tr class="week1_accounts">
					<th>Account</th>
					<th style="text-align: center;"><?php echo date('D', strtotime('saturday last week')); ?><br />
						<span><?php echo date('m/j', strtotime('saturday last week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('sunday last week')); ?><br />
						<span><?php echo date('m/j', strtotime('sunday last week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('monday this week')); ?><br />
						<span><?php echo date('m/j', strtotime('monday this week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('tuesday this week')); ?><br />
						<span><?php echo date('m/j', strtotime('tuesday this week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('wednesday this week')); ?><br />
						<span><?php echo date('m/j', strtotime('wednesday this week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('thursday this week')); ?><br />
						<span><?php echo date('m/j', strtotime('thursday this week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('friday this week')); ?><br />
						<span><?php echo date('m/j', strtotime('friday this week', time())); ?></span></th>
					
					<th>Week Total</th>
					<th>Account Description</th>
				</tr>
				
				<tr class="gweek1 gweek1-row-0">
					<td style="width: 300px;" valign="top"><?php echo form_dropdown_extend('gweek1[account][]', $accounts, '', 'class="account-select" style="width: 180px;"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day1][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day2][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day3][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day4][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day5][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day6][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day7][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[weekly_total][]', '0.00', 'size="8" style="width: auto;" class="week-total" readonly="readonly"'); ?></td>
					<td valign="top"><?php echo form_textarea(array('name' => 'gweek1[account_description][]', 'id' => 'account_description[]', 'rows' => 3, 'readonly' => 'readonly', 'cols' => 30, 'style' => 'width: 200px; max-width: 200px;')); ?></td>
				</tr>
			</tbody>
		</table>
		<table cellpadding="0" cellspacing="0" border="0" class="gweek2-table">
			<tbody>
				<tr>
					<th colspan="11">Week 2</th>
				</tr>
				<tr class="week2_accounts">
					<th>Account</th>
					<th style="text-align: center;"><?php echo date('D', strtotime('saturday this week')); ?><br />
						<span><?php echo date('m/j', strtotime('saturday this week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('sunday this week')); ?><br />
						<span><?php echo date('m/j', strtotime('sunday this week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('monday next week')); ?><br />
						<span><?php echo date('m/j', strtotime('monday next week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('tuesday next week')); ?><br />
						<span><?php echo date('m/j', strtotime('tuesday next week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('wednesday next week')); ?><br />
						<span><?php echo date('m/j', strtotime('wednesday next week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('thursday next week')); ?><br />
						<span><?php echo date('m/j', strtotime('thursday next week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('friday next week')); ?><br />
						<span><?php echo date('m/j', strtotime('friday next week', time())); ?></span></th>
					
					<th>Week Total</th>
					<th>Grand Total</th>
					<th>Account Description</th>
				</tr>
				<tr id="gweek2" class="gweek2 gweek2-row-0">
					<td style="width: 300px;" valign="top"><?php echo form_dropdown_extend('gweek2[account][]', $accounts, '', 'class="account-select" style="width: 180px;"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day1][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day2][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day3][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day4][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day5][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day6][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day7][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[weekly_total][]', '0.00', 'size="8" style="width: auto;" class="week-total" readonly="readonly"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[grand_total][]', '0.00', 'size="8" style="width: auto;" class="grand-total" readonly="readonly"'); ?></td>
					<td valign="top"><?php echo form_textarea(array('name' => 'gweek2[account_description][]', 'id' => 'account_description[]', 'rows' => 3, 'readonly' => 'readonly', 'cols' => 30, 'style' => 'width: 200px; max-width: 200px;')); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<p><?php echo form_submit('add_week', 'Add Account', 'class="add-week"'); ?></p>
</div>
<?php endif ?>

<?php //start week 1 block ?>
<div class="ui-block wide">
	<h3><a href="#">Week 1</a></h3>
	<div class="week1">
		<table cellpadding="0" cellspacing="0" border="0" class="week1">
			<tbody>
				<tr class="week1_accounts">
					<th>Account</th>
					<th style="text-align: center;"><?php echo date('D', strtotime('saturday last week')); ?><br />
						<span><?php echo date('m/j', strtotime('saturday last week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('sunday last week')); ?><br />
						<span><?php echo date('m/j', strtotime('sunday last week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('monday this week')); ?><br />
						<span><?php echo date('m/j', strtotime('monday this week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('tuesday this week')); ?><br />
						<span><?php echo date('m/j', strtotime('tuesday this week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('wednesday this week')); ?><br />
						<span><?php echo date('m/j', strtotime('wednesday this week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('thursday this week')); ?><br />
						<span><?php echo date('m/j', strtotime('thursday this week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('friday this week')); ?><br />
						<span><?php echo date('m/j', strtotime('friday this week', time())); ?></span></th>
					
					<th>Week Total</th>
					<th>Account Description</th>
				</tr>
				
				<tr class="week1-row clone">
					<td style="width: 300px;" valign="top"><?php echo form_dropdown_extend('week1[account][]', $accounts, '', 'class="account-select" style="width: 180px;"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day1][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day2][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day3][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day4][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day5][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day6][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day7][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week1[weekly_total][]', '0.00', 'size="8" style="width: auto;" rel="num_only" class="week-total" readonly="readonly"'); ?></td>
					<td valign="top"><?php echo form_textarea(array('name' => 'week1[account_description][]', 'id' => 'account_description[]', 'rows' => 3, 'readonly' => 'readonly', 'cols' => 30, 'style' => 'width: 200px; max-width: 200px;')); ?></td>
				</tr>
				
				<tr>
					<td colspan="10"><p><?php echo form_submit('add_week', 'Add Account', 'class="add-account"'); ?></p></td>
				</tr>
			
				<tr>
					<td>Holiday</td>
					<td><?php echo form_input('week1[holiday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[holiday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[holiday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[holiday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[holiday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[holiday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[holiday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[holiday_total]', '0.00', 'style="width: auto;" size="8" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td>Personal Time</td>
					<td><?php echo form_input('week1[personal_time][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[personal_time][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[personal_time][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[personal_time][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[personal_time][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[personal_time][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[personal_time][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[personal_time_total]', '0.00', 'style="width: auto;" size="8" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td>Vacation</td>
					<td><?php echo form_input('week1[vacation][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[vacation][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[vacation][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[vacation][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[vacation][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[vacation][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[vacation][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[vacation_total]', '0.00', 'style="width: auto;" size="8" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td>Sicktime</td>
					<td><?php echo form_input('week1[sicktime][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[sicktime][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[sicktime][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[sicktime][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[sicktime][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[sicktime][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[sicktime][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[sicktime_total]', '0.00', 'style="width: auto;" size="8" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td>Other</td>
					<td><?php echo form_input('week1[birthday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[birthday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[birthday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[birthday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[birthday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[birthday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[birthday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[birthday_total]', '0.00', 'style="width: auto;" size="8" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td>Birthday</td>
					<td><?php echo form_input('week1[other][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[other][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[other][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[other][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[other][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[other][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[other][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[other_total]', '0.00', 'style="width: auto;" size="8" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td>Chargeable Hours</td>
					<td><?php echo form_input('week1[chargeable_hours][]', '0.00', 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[chargeable_hours][]', '0.00', 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[chargeable_hours][]', '0.00', 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[chargeable_hours][]', '0.00', 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[chargeable_hours][]', '0.00', 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[chargeable_hours][]', '0.00', 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[chargeable_hours][]', '0.00', 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[chargeable_hours_total]', '0.00', 'rel="num_only" style="width: auto;" size="8" class="week-total" readonly="readonly"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td>Unpaid Time Off</td>
					<td><?php echo form_input('week1[unpaid_time_off][]', '0.00', 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week1[unpaid_time_off][]', '0.00', 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week1[unpaid_time_off][]', '0.00', 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week1[unpaid_time_off][]', '0.00', 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week1[unpaid_time_off][]', '0.00', 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week1[unpaid_time_off][]', '0.00', 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week1[unpaid_time_off][]', '0.00', 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week1[unpaid_time_off_total]', '0.00', 'rel="num_only" style="width: auto;" size="8" class="week-total" readonly="readonly"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td>Total Hours</td>
					<td><?php echo form_input('week1[total_hours][]', '0.00', 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[total_hours][]', '0.00', 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[total_hours][]', '0.00', 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[total_hours][]', '0.00', 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[total_hours][]', '0.00', 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[total_hours][]', '0.00', 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[total_hours][]', '0.00', 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[total_hours_total]', '0.00', 'rel="num_only" style="width: auto;" size="8" class="week-total" readonly="readonly"'); ?></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<?php //start week 2 block ?>
<div class="ui-block wide">
	<h3><a href="#">Week 2</a></h3>
	<div class="week2">
		<table cellpadding="0" cellspacing="0" border="0" class="week2">
			<tbody>
				<tr class="week2_accounts">
					<th>Account</th>
					<th style="text-align: center;"><?php echo date('D', strtotime('saturday last week')); ?><br />
						<span><?php echo date('m/j', strtotime('saturday last week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('sunday last week')); ?><br />
						<span><?php echo date('m/j', strtotime('sunday last week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('monday this week')); ?><br />
						<span><?php echo date('m/j', strtotime('monday this week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('tuesday this week')); ?><br />
						<span><?php echo date('m/j', strtotime('tuesday this week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('wednesday this week')); ?><br />
						<span><?php echo date('m/j', strtotime('wednesday this week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('thursday this week')); ?><br />
						<span><?php echo date('m/j', strtotime('thursday this week', time())); ?></span></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('friday this week')); ?><br />
						<span><?php echo date('m/j', strtotime('friday this week', time())); ?></span></th>
					
					<th>Week Total</th>
					<th>Grand Total</th>
					<th>Account Description</th>
				</tr>
				
				<tr class="week2-row clone">
					<td style="width: 300px;" valign="top"><?php echo form_dropdown_extend('week2[account][]', $accounts, '', 'class="account-select" style="width: 180px;"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day1][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day2][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day3][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day4][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day5][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day6][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day7][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week2[weekly_total][]', '0.00', 'size="8" style="width: auto;" rel="num_only" class="week-total" readonly="readonly"'); ?></td>
					<td valign="top"><?php echo form_input('week2[grand_total][]', '0.00', 'size="8" style="width: auto;" class="grand-total" readonly="readonly"'); ?></td>
					<td valign="top"><?php echo form_textarea(array('name' => 'week2[account_description][]', 'id' => 'account_description[]', 'rows' => 3, 'readonly' => 'readonly', 'cols' => 30, 'style' => 'width: 200px; max-width: 200px;')); ?></td>
				</tr>
				
				<tr>
					<td colspan="11"><p><?php echo form_submit('add_week', 'Add Account', 'class="add-account"'); ?></p></td>
				</tr>
			
				<tr>
					<td>Holiday</td>
					<td><?php echo form_input('week2[holiday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[holiday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[holiday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[holiday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[holiday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[holiday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[holiday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[holiday_total]', '0.00', 'style="width: auto;" size="8" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[holiday_grand_total]', '0.00', 'style="width: auto;" size="8" class="grand-total holiday-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td>Personal Time</td>
					<td><?php echo form_input('week2[personal_time][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[personal_time][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[personal_time][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[personal_time][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[personal_time][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[personal_time][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[personal_time][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[personal_time_total]', '0.00', 'style="width: auto;" size="8" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[personal_time_grand_total]', '0.00', 'style="width: auto;" size="8" class="grand-total personal-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td>Vacation</td>
					<td><?php echo form_input('week2[vacation][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[vacation][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[vacation][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[vacation][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[vacation][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[vacation][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[vacation][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[vacation_total]', '0.00', 'style="width: auto;" size="8" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[vacation_grand_total]', '0.00', 'style="width: auto;" size="8" class="grand-total vacation-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td>Sicktime</td>
					<td><?php echo form_input('week2[sicktime][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[sicktime][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[sicktime][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[sicktime][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[sicktime][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[sicktime][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[sicktime][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[sicktime_total]', '0.00', 'style="width: auto;" size="8" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[sicktime_grand_total]', '0.00', 'style="width: auto;" size="8" class="grand-total sicktime-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td>Birthday</td>
					<td><?php echo form_input('week2[birthday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[birthday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[birthday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[birthday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[birthday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[birthday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[birthday][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[birthday_total]', '0.00', 'style="width: auto;" size="8" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[birthday_grand_total]', '0.00', 'style="width: auto;" size="8" class="grand-total birthday-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td>Other</td>
					<td><?php echo form_input('week2[other][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[other][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[other][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[other][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[other][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[other][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[other][]', '0.00', 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[other_total]', '0.00', 'style="width: auto;" size="8" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[other_grand_total]', '0.00', 'style="width: auto;" size="8" class="grand-total other-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td>Chargeable Hours</td>
					<td><?php echo form_input('week2[chargeable_hours][]', '0.00', 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[chargeable_hours][]', '0.00', 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[chargeable_hours][]', '0.00', 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[chargeable_hours][]', '0.00', 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[chargeable_hours][]', '0.00', 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[chargeable_hours][]', '0.00', 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[chargeable_hours][]', '0.00', 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[chargeable_hours_total]', '0.00', 'rel="num_only" style="width: auto;" size="8" class="week-total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[chargeable_hours_grand_total]', '0.00', 'rel="num_only" style="width: auto;" size="8" class="grand-total chargeable-total" readonly="readonly"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td>Unpaid Time Off</td>
					<td><?php echo form_input('week2[unpaid_time_off][]', '0.00', 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week2[unpaid_time_off][]', '0.00', 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week2[unpaid_time_off][]', '0.00', 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week2[unpaid_time_off][]', '0.00', 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week2[unpaid_time_off][]', '0.00', 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week2[unpaid_time_off][]', '0.00', 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week2[unpaid_time_off][]', '0.00', 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week2[unpaid_time_off_total]', '0.00', 'rel="num_only" style="width: auto;" size="8" class="week-total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[unpaid_time_off_grand_total]', '0.00', 'rel="num_only" style="width: auto;" size="8" class="grand-total unpaid-total" readonly="readonly"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td>Total Hours</td>
					<td><?php echo form_input('week2[total_hours][]', '0.00', 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[total_hours][]', '0.00', 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[total_hours][]', '0.00', 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[total_hours][]', '0.00', 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[total_hours][]', '0.00', 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[total_hours][]', '0.00', 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[total_hours][]', '0.00', 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[total_hours_total]', '0.00', 'rel="num_only" style="width: auto;" size="8" class="week-total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[total_hours_grand_total]', '0.00', 'rel="num_only" style="width: auto;" size="8" class="grand-total hours-total" readonly="readonly"'); ?></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Summary</a></h3>
	<div class="week2">
		<table cellpadding="0" cellspacing="0" border="0" class="week2">
			<tbody>
				<tr>
					<th>Chargeable Hours</th>
					<td><?php echo form_input('summary[chargable_hours]', '0.00', 'style="width: auto;" size="4" class="summary-chargeable" readonly="readonly"'); ?></td>

					<th>Holiday</th>
					<td><?php echo form_input('summary[holiday]', '0.00', 'style="width: auto;" size="4" class="summary-holiday" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<th>Unpaid Time Off</th>
					<td><?php echo form_input('summary[unpaid_time_off]', '0.00', 'style="width: auto;" size="4" class="summary-unpaid" readonly="readonly"'); ?></td>

					<th>Personl Hours</th>
					<td><?php echo form_input('summary[personal_time]', '0.00', 'style="width: auto;" size="4" class="summary-personal" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<th>Total Hours</th>
					<td><?php echo form_input('summary[total_hours]', '0.00', 'style="width: auto;" size="4" class="summary-hours" readonly="readonly"'); ?></td>

					<th>Vacation</th>
					<td><?php echo form_input('summary[vacation]', '0.00', 'style="width: auto;" size="4" class="summary-vacation" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<th>Sicktime</th>
					<td><?php echo form_input('summary[sicktime]', '0.00', 'style="width: auto;" size="4" class="summary-sicktime" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<th>Birthday</th>
					<td><?php echo form_input('summary[birthday]', '0.00', 'style="width: auto;" size="4" class="summary-birthday" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<th>Other</th>
					<td><?php echo form_input('summary[other]', '0.00', 'style="width: auto;" size="4" class="summary-other" readonly="readonly"'); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<p class="clear">
	<?php echo form_submit('submit_request', 'Save') ?>
	<?php echo form_submit('submit_request', 'Submit for Approval', 'class="submit-approval" id="timeoff_approval"') ?>
</p>
<?php echo form_hidden('insert_timesheet', 'true'); ?>
<?php echo form_close(); ?>
<?php load_footer() ?>