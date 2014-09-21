<?php load_header(); ?>

<?php if ($this->session->flashdata('timesheet')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('timesheet') ?></p>
	</div>
<?php endif ?>

<h1>New Timesheet</h1>

<?php echo form_open(site_url('timesheet/new_timesheet/')) ?>

<?php //start general information block ?>
<div class="ui-block wide">
	<h3><a href="#">General Information</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th style="width: 150px;">For</th>
					<td>
						<?php echo @$timesheet->first_name.' '.@$timesheet->last_name; ?>
						<?php echo form_hidden('first_name', $timesheet->first_name); ?>
						<?php echo form_hidden('last_name', $timesheet->last_name); ?>
					</td>
				</tr>
				<tr>
					<th style="width: 150px;">Pay Period</th>
					<td>
					<?php if (can_this_user('set_timesheet_pay_period')): ?>
						<?php echo form_input('period_start', date('m/j/Y', strtotime('saturday last week', time())), 'style="width: 100px;" class="ts_start_datepicker"'); ?>
						<?php echo form_input('period_end', date('m/j/Y', strtotime('friday next week', time())), 'style="width: 100px;" class="ts_end_datepicker" readonly'); ?>
					<?php else: ?>	
						<?php echo date('m/j/Y', strtotime('saturday last week', time())); ?> &nbsp;-&nbsp; <?php echo date('m/j/Y', strtotime('friday next week', time())); ?>
						<?php echo form_hidden('period_start', date('m/j/Y', strtotime('saturday last week', time()))); ?>
						<?php echo form_hidden('period_end', date('m/j/Y', strtotime('friday next week', time()))); ?>
					<?php endif ?>
					</td>
				</tr>
				<tr>
					<th style="width: 150px;">Current Status</th>
					<?php if (can_this_user('change_status')): ?>
					<td><?php echo form_dropdown('current_status', array('In Process' => 'In Process', 'Submitted for Approval' => 'Submitted for Approval', 'Approved' => 'Approved'), $timesheet->current_status); ?></td>
					<?php else: ?>
					<td><?php echo $timesheet->current_status; echo form_hidden('current_status', $timesheet->current_status); ?></td>
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
				<?php foreach($grant_matching['week1']['account'] as $i => $value): ?>
				<tr class="gweek1 gweek1-row-<?php echo $i; ?>">
					<?php
					$t = explode('-', $grant_matching['week1']['account'][$i]);
					$t[2] = $account_code;
					$grant_matching['week1']['account'][$i] = implode('-', $t);
					?>
					<td style="width: 300px;" valign="top"><?php echo form_dropdown_extend('gweek1[account][]', $accounts, $grant_matching['week1']['account'][$i], 'class="account-select" style="width: 180px;"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day1][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day2][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day3][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day4][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day5][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day6][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day7][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[weekly_total][]', '0.00', 'size="8" style="width: auto;" class="week-total" readonly="readonly"'); ?></td>
					<td valign="top"><?php echo form_textarea(array('name' => 'gweek1[account_description][]', 'id' => 'account_description[]', 'rows' => 3, 'readonly' => 'readonly', 'cols' => 30, 'style' => 'width: 200px; max-width: 200px;'), $grant_matching['week1']['account_description'][$i]); ?></td>
				</tr>
				<?php endforeach; ?>
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
				<?php foreach($grant_matching['week2']['account'] as $i => $value): ?>
				<tr id="gweek2" class="gweek2 gweek2-row-<?php echo $i; ?>">
				<?php
					$t = explode('-', $grant_matching['week2']['account'][$i]);
					$t[2] = $account_code;
					$grant_matching['week2']['account'][$i] = implode('-', $t);
					?>
					<td style="width: 300px;" valign="top"><?php echo form_dropdown_extend('gweek2[account][]', $accounts, $grant_matching['week2']['account'][$i], 'class="account-select" style="width: 180px;"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day1][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day2][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day3][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day4][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day5][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day6][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day7][]', '0.00', 'style="width: auto;" size="4" rel="num_only" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[weekly_total][]', '0.00', 'size="8" style="width: auto;" class="week-total" readonly="readonly"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[grand_total][]', '0.00', 'size="8" style="width: auto;" class="grand-total" readonly="readonly"'); ?></td>
					<td valign="top"><?php echo form_textarea(array('name' => 'gweek2[account_description][]', 'id' => 'account_description[]', 'rows' => 3, 'readonly' => 'readonly', 'cols' => 30, 'style' => 'width: 200px; max-width: 200px;'), $grant_matching['week2']['account_description'][$i]); ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<p><?php echo form_submit('add_week', 'Add Account', 'class="add-week"'); ?></p>
</div>

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
				<?php foreach($week1['account'] as $i => $value): ?>
				<tr class="week1-row-<?php echo $i; echo (($i == 0) ? ' clone' : '')?>">
					<?php
					$t = explode('-', $week1['account'][$i]);
					$t[2] = $account_code;
					$week1['account'][$i] = implode('-', $t);
					?>
					<td style="width: 300px;" valign="top"><?php echo form_dropdown_extend('week1[account][]', $accounts, $week1['account'][$i], 'style="width: 180px;" class="account-select"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day1][]', $week1['day1'][$i], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day2][]', $week1['day2'][$i], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day3][]', $week1['day3'][$i], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day4][]', $week1['day4'][$i], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day5][]', $week1['day5'][$i], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day6][]', $week1['day6'][$i], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day7][]', $week1['day7'][$i], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week1[weekly_total][]', $week1['weekly_total'][$i], 'style="width: 60px;" class="week-total"'); ?></td>
					<td valign="top"><?php echo form_textarea(array('name' => 'week1[account_description][]', 'id' => 'account_description[]', 'rows' => 3, 'readonly' => 'readonly', 'cols' => 30, 'style' => 'width: 200px; max-width: 200px;'), $week1['account_description'][$i]); ?></td>
				</tr>
				<?php endforeach; ?>
				<tr>
					<td colspan="10"><p><?php echo form_submit('add_week', 'Add Account', 'class="add-account"'); ?></p></td>
				</tr>
				<tr>
					<td style="width: 150px;">Holiday</td>
					<td><?php echo form_input('week1[holiday][]', $week1['holiday'][0], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[holiday][]', $week1['holiday'][1], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[holiday][]', $week1['holiday'][2], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[holiday][]', $week1['holiday'][3], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[holiday][]', $week1['holiday'][4], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[holiday][]', $week1['holiday'][5], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[holiday][]', $week1['holiday'][6], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[holiday_total]', $week1['holiday_total'], 'style="width: auto;" size="4" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td style="width: 150px;">Personal Time</td>
					<td><?php echo form_input('week1[personal_time][]', $week1['personal_time'][0], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[personal_time][]', $week1['personal_time'][1], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[personal_time][]', $week1['personal_time'][2], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[personal_time][]', $week1['personal_time'][3], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[personal_time][]', $week1['personal_time'][4], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[personal_time][]', $week1['personal_time'][5], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[personal_time][]', $week1['personal_time'][6], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[personal_time_total]', $week1['personal_time_total'], 'style="width: auto;" size="4" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td style="width: 150px;">Vacation</td>
					<td><?php echo form_input('week1[vacation][]', $week1['vacation'][0], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[vacation][]', $week1['vacation'][1], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[vacation][]', $week1['vacation'][2], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[vacation][]', $week1['vacation'][3], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[vacation][]', $week1['vacation'][4], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[vacation][]', $week1['vacation'][5], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[vacation][]', $week1['vacation'][6], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[vacation_total]', $week1['vacation_total'], 'style="width: auto;" size="4" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td style="width: 150px;">Sicktime</td>
					<td><?php echo form_input('week1[sicktime][]', $week1['sicktime'][0], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[sicktime][]', $week1['sicktime'][1], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[sicktime][]', $week1['sicktime'][2], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[sicktime][]', $week1['sicktime'][3], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[sicktime][]', $week1['sicktime'][4], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[sicktime][]', $week1['sicktime'][5], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[sicktime][]', $week1['sicktime'][6], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[sicktime_total]', $week1['sicktime_total'], 'style="width: auto;" size="4" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td style="width: 150px;">Birthday</td>
					<td><?php echo form_input('week1[birthday][]', @$week1['birthday'][0], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[birthday][]', @$week1['birthday'][1], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[birthday][]', @$week1['birthday'][2], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[birthday][]', @$week1['birthday'][3], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[birthday][]', @$week1['birthday'][4], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[birthday][]', @$week1['birthday'][5], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[birthday][]', @$week1['birthday'][6], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[birthday_total]', @$week1['birthday_total'], 'style="width: auto;" size="4" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td style="width: 150px;">Other</td>
					<td><?php echo form_input('week1[other][]', @$week1['other'][0], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[other][]', @$week1['other'][1], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[other][]', @$week1['other'][2], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[other][]', @$week1['other'][3], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[other][]', @$week1['other'][4], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[other][]', @$week1['other'][5], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[other][]', @$week1['other'][6], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week1[other_total]', @$week1['other_total'], 'style="width: auto;" size="4" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td style="width: 150px;">Chargeable Hours</td>
					<td><?php echo form_input('week1[chargeable_hours][]', $week1['chargeable_hours'][0], 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[chargeable_hours][]', $week1['chargeable_hours'][1], 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[chargeable_hours][]', $week1['chargeable_hours'][2], 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[chargeable_hours][]', $week1['chargeable_hours'][3], 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[chargeable_hours][]', $week1['chargeable_hours'][4], 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[chargeable_hours][]', $week1['chargeable_hours'][5], 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[chargeable_hours][]', $week1['chargeable_hours'][6], 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[chargeable_hours_total]', $week1['chargeable_hours_total'], 'rel="num_only" style="width: auto;" size="4" class="week-total" readonly="readonly"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td style="width: 150px;">Unpaid Time Off</td>
					<td><?php echo form_input('week1[unpaid_time_off][]', $week1['unpaid_time_off'][0], 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week1[unpaid_time_off][]', $week1['unpaid_time_off'][1], 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week1[unpaid_time_off][]', $week1['unpaid_time_off'][2], 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week1[unpaid_time_off][]', $week1['unpaid_time_off'][3], 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week1[unpaid_time_off][]', $week1['unpaid_time_off'][4], 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week1[unpaid_time_off][]', $week1['unpaid_time_off'][5], 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week1[unpaid_time_off][]', $week1['unpaid_time_off'][6], 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week1[unpaid_time_off_total]', $week1['unpaid_time_off_total'], 'rel="num_only" style="width: auto;" size="4" class="week-total" readonly="readonly"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td style="width: 150px;">Total Hours</td>
					<td><?php echo form_input('week1[total_hours][]', $week1['total_hours'][0], 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[total_hours][]', $week1['total_hours'][1], 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[total_hours][]', $week1['total_hours'][2], 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[total_hours][]', $week1['total_hours'][3], 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[total_hours][]', $week1['total_hours'][4], 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[total_hours][]', $week1['total_hours'][5], 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[total_hours][]', $week1['total_hours'][6], 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week1[total_hours_total]', $week1['total_hours_total'], 'rel="num_only" style="width: auto;" size="4" class="week-total" readonly="readonly"'); ?></td>
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
				<?php foreach($week2['account'] as $i => $value): ?>
				<tr class="week2-row-<?php echo $i; echo (($i == 0) ? ' clone' : '')?>">
					<?php
					$t = explode('-', $week2['account'][$i]);
					$t[2] = $account_code;
					$week2['account'][$i] = implode('-', $t);
					?>
					<td style="width: 300px;" valign="top"><?php echo form_dropdown_extend('week2[account][]', $accounts, $week2['account'][$i], 'style="width: 180px;" class="account-select"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day1][]', $week2['day1'][$i], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day2][]', $week2['day2'][$i], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day3][]', $week2['day3'][$i], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day4][]', $week2['day4'][$i], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day5][]', $week2['day5'][$i], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day6][]', $week2['day6'][$i], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day7][]', $week2['day7'][$i], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td valign="top"><?php echo form_input('week2[weekly_total][]', $week2['weekly_total'][$i], 'style="width: 60px;" class="week-total"'); ?></td>
					<td valign="top"><?php echo form_input('week2[grand_total][]', $week2['grand_total'][$i], 'style="width: 60px;" class="grand-total"'); ?></td>
					<td valign="top"><?php echo form_textarea(array('name' => 'week2[account_description][]', 'id' => 'account_description[]', 'rows' => 3, 'readonly' => 'readonly', 'cols' => 30, 'style' => 'width: 200px; max-width: 200px;'), $week2['account_description'][$i]); ?></td>
				</tr>
				<?php endforeach; ?>
				<tr>
					<td colspan="11"><p><?php echo form_submit('add_week', 'Add Account', 'class="add-account"'); ?></p></td>
				</tr>

				<tr>
					<td style="width: 150px;">Holiday</td>
					<td><?php echo form_input('week2[holiday][]', $week2['holiday'][0], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[holiday][]', $week2['holiday'][1], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[holiday][]', $week2['holiday'][2], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[holiday][]', $week2['holiday'][3], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[holiday][]', $week2['holiday'][4], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[holiday][]', $week2['holiday'][5], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[holiday][]', $week2['holiday'][6], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[holiday_total]', $week2['holiday_total'], 'style="width: auto;" size="4" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[holiday_grand_total]', $week2['holiday_grand_total'], 'style="width: auto;" size="4" class="grand-total holiday-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td style="width: 150px;">Personal Time</td>
					<td><?php echo form_input('week2[personal_time][]', $week2['personal_time'][0], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[personal_time][]', $week2['personal_time'][1], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[personal_time][]', $week2['personal_time'][2], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[personal_time][]', $week2['personal_time'][3], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[personal_time][]', $week2['personal_time'][4], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[personal_time][]', $week2['personal_time'][5], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[personal_time][]', $week2['personal_time'][6], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[personal_time_total]', $week2['personal_time_total'], 'style="width: auto;" size="4" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[personal_time_grand_total]', $week2['personal_time_grand_total'], 'style="width: auto;" size="4" class="grand-total personal-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td style="width: 150px;">Vacation</td>
					<td><?php echo form_input('week2[vacation][]', $week2['vacation'][0], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[vacation][]', $week2['vacation'][1], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[vacation][]', $week2['vacation'][2], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[vacation][]', $week2['vacation'][3], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[vacation][]', $week2['vacation'][4], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[vacation][]', $week2['vacation'][5], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[vacation][]', $week2['vacation'][6], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[vacation_total]', $week2['vacation_total'], 'style="width: auto;" size="4" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[vacation_grand_total]', $week2['vacation_grand_total'], 'style="width: auto;" size="4" class="grand-total vacation-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td style="width: 150px;">Sicktime</td>
					<td><?php echo form_input('week2[sicktime][]', $week2['sicktime'][0], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[sicktime][]', $week2['sicktime'][1], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[sicktime][]', $week2['sicktime'][2], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[sicktime][]', $week2['sicktime'][3], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[sicktime][]', $week2['sicktime'][4], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[sicktime][]', $week2['sicktime'][5], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[sicktime][]', $week2['sicktime'][6], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[sicktime_total]', $week2['sicktime_total'], 'style="width: auto;" size="4" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[sicktime_grand_total]', $week2['sicktime_grand_total'], 'style="width: auto;" size="4" class="grand-total sicktime-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td style="width: 150px;">Birthday</td>
					<td><?php echo form_input('week2[birthday][]', @$week2['birthday'][0], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[birthday][]', @$week2['birthday'][1], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[birthday][]', @$week2['birthday'][2], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[birthday][]', @$week2['birthday'][3], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[birthday][]', @$week2['birthday'][4], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[birthday][]', @$week2['birthday'][5], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[birthday][]', @$week2['birthday'][6], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[birthday_total]', @$week2['birthday_total'], 'style="width: auto;" size="4" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[birthday_grand_total]', @$week2['birthday_grand_total'], 'style="width: auto;" size="4" class="grand-total birthday-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td style="width: 150px;">Other</td>
					<td><?php echo form_input('week2[other][]', @$week2['other'][0], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[other][]', @$week2['other'][1], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[other][]', @$week2['other'][2], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[other][]', @$week2['other'][3], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[other][]', @$week2['other'][4], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[other][]', @$week2['other'][5], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[other][]', @$week2['other'][6], 'style="width: auto;" size="4" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[other_total]', @$week2['other_total'], 'style="width: auto;" size="4" class="week-total" readonly="readonly" rel="num_only"'); ?></td>
					<td><?php echo form_input('week2[other_grand_total]', @$week2['other_grand_total'], 'style="width: auto;" size="4" class="grand-total other-total" readonly="readonly" rel="num_only"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td style="width: 150px;">Chargeable Hours</td>
					<td><?php echo form_input('week2[chargeable_hours][]', $week2['chargeable_hours'][0], 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[chargeable_hours][]', $week2['chargeable_hours'][1], 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[chargeable_hours][]', $week2['chargeable_hours'][2], 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[chargeable_hours][]', $week2['chargeable_hours'][3], 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[chargeable_hours][]', $week2['chargeable_hours'][4], 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[chargeable_hours][]', $week2['chargeable_hours'][5], 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[chargeable_hours][]', $week2['chargeable_hours'][6], 'style="width: auto;" size="4" class="chargeable-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[chargeable_hours_total]', $week2['chargeable_hours_total'], 'rel="num_only" style="width: auto;" size="4" class="week-total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[chargeable_hours_grand_total]', $week2['chargeable_hours_grand_total'], 'rel="num_only" style="width: auto;" size="4" class="grand-total chargeable-total" readonly="readonly"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td style="width: 150px;">Unpaid Time Off</td>
					<td><?php echo form_input('week2[unpaid_time_off][]', $week2['unpaid_time_off'][0], 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week2[unpaid_time_off][]', $week2['unpaid_time_off'][1], 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week2[unpaid_time_off][]', $week2['unpaid_time_off'][2], 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week2[unpaid_time_off][]', $week2['unpaid_time_off'][3], 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week2[unpaid_time_off][]', $week2['unpaid_time_off'][4], 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week2[unpaid_time_off][]', $week2['unpaid_time_off'][5], 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week2[unpaid_time_off][]', $week2['unpaid_time_off'][6], 'rel="num_only" style="width: auto;" size="4" class="unpaid-time"'); ?></td>
					<td><?php echo form_input('week2[unpaid_time_off_total]', $week2['unpaid_time_off_total'], 'rel="num_only" style="width: auto;" size="4" class="week-total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[unpaid_time_off_grand_total]', $week2['unpaid_time_off_grand_total'], 'rel="num_only" style="width: auto;" size="4" class="grand-total unpaid-total" readonly="readonly"'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td style="width: 150px;">Total Hours</td>
					<td><?php echo form_input('week2[total_hours][]', $week2['total_hours'][0], 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[total_hours][]', $week2['total_hours'][1], 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[total_hours][]', $week2['total_hours'][2], 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[total_hours][]', $week2['total_hours'][3], 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[total_hours][]', $week2['total_hours'][4], 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[total_hours][]', $week2['total_hours'][5], 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[total_hours][]', $week2['total_hours'][6], 'style="width: auto;" size="4" class="total-hours" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[total_hours_total]', $week2['total_hours_total'], 'rel="num_only" style="width: auto;" size="4" class="week-total" readonly="readonly"'); ?></td>
					<td><?php echo form_input('week2[total_hours_grand_total]', $week2['total_hours_grand_total'], 'rel="num_only" style="width: auto;" size="4" class="grand-total hours-total" readonly="readonly"'); ?></td>
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
					<td><?php echo form_input('summary[chargable_hours]', $timesheet->chargable_hours, 'style="width: auto;" size="4" class="summary-chargeable" readonly="readonly"'); ?></td>

					<th>Holiday</th>
					<td><?php echo form_input('summary[holiday]', $timesheet->holiday, 'style="width: auto;" size="4" class="summary-holiday" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<th>Unpaid Time Off</th>
					<td><?php echo form_input('summary[unpaid_time_off]', $timesheet->unpaid_time_off, 'style="width: auto;" size="4" class="summary-unpaid" readonly="readonly"'); ?></td>

					<th>Personl Hours</th>
					<td><?php echo form_input('summary[personal_time]', $timesheet->personal_time, 'style="width: auto;" size="4" class="summary-personal" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<th>Total Hours</th>
					<td><?php echo form_input('summary[total_hours]', $timesheet->total_hours, 'style="width: auto;" size="4" class="summary-hours" readonly="readonly"'); ?></td>

					<th>Vacation</th>
					<td><?php echo form_input('summary[vacation]', $timesheet->vacation, 'style="width: auto;" size="4" class="summary-vacation" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<th>Sicktime</th>
					<td><?php echo form_input('summary[sicktime]', $timesheet->sicktime, 'style="width: auto;" size="4" class="summary-sicktime" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<th>Birthday</th>
					<td><?php echo form_input('summary[birthday]', $timesheet->birthday, 'style="width: auto;" size="4" class="summary-birthday" readonly="readonly"'); ?></td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<th>Other</th>
					<td><?php echo form_input('summary[other]', $timesheet->other, 'style="width: auto;" size="4" class="summary-other" readonly="readonly"'); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<p class="clear">
	<?php echo form_submit('submit_request', 'Save') ?>
	<?php echo form_submit('submit_request', 'Submit for Approval', 'class="submit-approval" id="timesheet_approval"') ?>
</p>
<?php echo form_hidden('insert_timesheet', 'true'); ?>
<?php echo form_close(); ?>
<?php load_footer() ?>