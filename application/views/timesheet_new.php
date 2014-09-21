<?php load_header() ?>
<h1>New Timesheet</h1>

<?php echo form_open(site_url('labor/new_timesheet/')) ?>

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
						<?php echo date('m/j/Y', strtotime('saturday last week', time())); ?> - <?php echo date('m/j/Y', strtotime('friday next week', time())); ?>
						<?php echo form_hidden('period_start', date('m/j/Y', strtotime('saturday last week', time()))); ?>
						<?php echo form_hidden('period_end', date('m/j/Y', strtotime('friday next week', time()))); ?>
					</td>
				</tr>
				<tr>
					<th style="width: 150px;">Current Status</th>
					<td><?php echo form_dropdown('current_status', array('In Process' => 'In Process', 'Submitted for Approval' => 'Submitted for Approval', 'Approved' => 'Approved')); ?></td>
				</tr>
				<tr>
					<th style="width: 150px;">Manager</th>
					<td>
						<?php echo @$user->manager['first_name'].' '.@$user->manager['last_name']; ?>
						<?php echo form_hidden('manager', $user->user_manager); ?>
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
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th colspan="11">Week 1</th>
				</tr>
				<tr>
					<th>Account</th>
					<th style="text-align: center;"><?php echo date('D', strtotime('saturday last week')); ?><br />
						<?php echo date('m/j', strtotime('saturday last week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('sunday last week')); ?><br />
						<?php echo date('m/j', strtotime('sunday last week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('monday this week')); ?><br />
						<?php echo date('m/j', strtotime('monday this week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('tuesday this week')); ?><br />
						<?php echo date('m/j', strtotime('tuesday this week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('wednesday this week')); ?><br />
						<?php echo date('m/j', strtotime('wednesday this week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('thursday this week')); ?><br />
						<?php echo date('m/j', strtotime('thursday this week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('friday this week')); ?><br />
						<?php echo date('m/j', strtotime('friday this week', time())); ?></th>
					
					<th>Week Total</th>
					<th>Grand Total</th>
					<th>Account Description</th>
				</tr>
				<?php for($i = 0; $i != 5; $i++): ?>
				<tr class="gweek1 gweek1-row-<?php echo $i; ?>">
					<td valign="top"><?php echo form_dropdown('gweek1[account][]', $accounts, '', 'style="width: 150px;"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day1][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day2][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day3][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day4][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day5][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day6][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[day7][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[weekly_total][]', 0, 'style="width: 60px;" class="week-total"'); ?></td>
					<td valign="top"><?php echo form_input('gweek1[grand_total][]', 0, 'style="width: 60px;" class="grand-total"'); ?></td>
					<td valign="top"><?php echo form_textarea(array('name' => 'gweek1[account_description][]', 'id' => 'account_description[]', 'rows' => 1, 'cols' => 30, 'style' => 'width: 200px; max-width: 200px;')); ?></td>
				</tr>
				<?php endfor; ?>

				<tr>
					<th colspan="11" style="border-bottom: none;">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="11" style="border-bottom: none;">&nbsp;</th>
				</tr>

				<tr>
					<th colspan="11">Week 2</th>
				</tr>
				<tr>
					<th>Account</th>
					<th style="text-align: center;"><?php echo date('D', strtotime('saturday this week')); ?><br />
						<?php echo date('m/j', strtotime('saturday this week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('sunday this week')); ?><br />
						<?php echo date('m/j', strtotime('sunday this week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('monday next week')); ?><br />
						<?php echo date('m/j', strtotime('monday next week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('tuesday next week')); ?><br />
						<?php echo date('m/j', strtotime('tuesday next week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('wednesday next week')); ?><br />
						<?php echo date('m/j', strtotime('wednesday next week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('thursday next week')); ?><br />
						<?php echo date('m/j', strtotime('thursday next week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('friday next week')); ?><br />
						<?php echo date('m/j', strtotime('friday next week', time())); ?></th>
					
					<th>Week Total</th>
					<th>Grand Total</th>
					<th>Account Description</th>
				</tr>
				<?php for($i = 0; $i != 5; $i++): ?>
				<tr id="gweek2" class="gweek2-row-<?php echo $i; ?>">
					<td valign="top"><?php echo form_dropdown('gweek2[account][]', $accounts, '', 'style="width: 150px;"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day1][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day2][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day3][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day4][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day5][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day6][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[day7][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[weekly_total][]', 0, 'style="width: 60px;" class="week-total"'); ?></td>
					<td valign="top"><?php echo form_input('gweek2[grand_total][]', 0, 'style="width: 60px;" class="grand-total"'); ?></td>
					<td valign="top"><?php echo form_textarea(array('name' => 'gweek2[account_description][]', 'id' => 'account_description[]', 'rows' => 1, 'cols' => 30, 'style' => 'width: 200px; max-width: 200px;')); ?></td>
				</tr>
				<?php endfor; ?>
			</tbody>
		</table>
	</div>
</div>

<?php //start week 1 block ?>
<div class="ui-block wide">
	<h3><a href="#">Week 1</a></h3>
	<div class="week1">
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th>Account</th>
					<th style="text-align: center;"><?php echo date('D', strtotime('saturday last week')); ?><br />
						<?php echo date('m/j', strtotime('saturday last week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('sunday last week')); ?><br />
						<?php echo date('m/j', strtotime('sunday last week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('monday this week')); ?><br />
						<?php echo date('m/j', strtotime('monday this week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('tuesday this week')); ?><br />
						<?php echo date('m/j', strtotime('tuesday this week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('wednesday this week')); ?><br />
						<?php echo date('m/j', strtotime('wednesday this week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('thursday this week')); ?><br />
						<?php echo date('m/j', strtotime('thursday this week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('friday this week')); ?><br />
						<?php echo date('m/j', strtotime('friday this week', time())); ?></th>
					
					<th>Week Total</th>
					<th>Grand Total</th>
					<th>Account Description</th>
				</tr>
				<?php for($i = 0; $i != 15; $i++): ?>
				<tr class="week1-row-<?php echo $i; ?>">
					<td valign="top"><?php echo form_dropdown('week1[account][]', $accounts, '', 'style="width: 150px;"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day1][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day2][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day3][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day4][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day5][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day6][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('week1[day7][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('week1[weekly_total][]', 0, 'style="width: 60px;" class="week-total"'); ?></td>
					<td valign="top"><?php echo form_input('week1[grand_total][]', 0, 'style="width: 60px;" class="grand-total"'); ?></td>
					<td valign="top"><?php echo form_textarea(array('name' => 'week1[account_description][]', 'id' => 'account_description[]', 'rows' => 1, 'cols' => 30, 'style' => 'width: 200px; max-width: 200px;')); ?></td>
				</tr>
				<?php endfor; ?>
			</tbody>
		</table>
		<br />
		<br />
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<th style="width: 150px;">Holiday</th>
				<td><?php echo form_input('week1[holiday]', 0, 'class="addon-total numeric"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Personal Time</th>
				<td><?php echo form_input('week1[personal_time]', 0, 'class="addon-total numeric"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Vacation</th>
				<td><?php echo form_input('week1[vacation]', 0, 'class="addon-total numeric"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Sicktime</th>
				<td><?php echo form_input('week1[sicktime]', 0, 'class="addon-total numeric"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">birthday</th>
				<td><?php echo form_input('week1[birthday]', 0, 'class="addon-total numeric"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('week1[other]', 0, 'class="addon-total numeric"'); ?></td>
			</tr>
		</table>
		<br />
		<br />
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<th style="width: 150px;">Chargeable hours</th>
				<td><?php echo form_input('week1[chargeable_hours]', 0, 'class="chargeable-hours"'); ?></td>
			</tr>
		</table>
		<br />
		<br />
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<th style="width: 150px;">Unpaid Time Off</th>
				<td><?php echo form_input('week1[unpaid_time_off]', 0, 'class="unpaid-time-off"'); ?></td>
			</tr>
		</table>
		<br />
		<br />
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<th style="width: 150px;">Total Hours</th>
				<td><?php echo form_input('week1[total_hours]', 0, 'class="total-hours"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<?php //start week 2 block ?>
<div class="ui-block wide">
	<h3><a href="#">Week 2</a></h3>
	<div class="week2">
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th>Account</th>
					<th style="text-align: center;"><?php echo date('D', strtotime('saturday this week')); ?><br />
						<?php echo date('m/j', strtotime('saturday this week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('sunday this week')); ?><br />
						<?php echo date('m/j', strtotime('sunday this week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('monday next week')); ?><br />
						<?php echo date('m/j', strtotime('monday next week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('tuesday next week')); ?><br />
						<?php echo date('m/j', strtotime('tuesday next week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('wednesday next week')); ?><br />
						<?php echo date('m/j', strtotime('wednesday next week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('thursday next week')); ?><br />
						<?php echo date('m/j', strtotime('thursday next week', time())); ?></th>

					<th style="text-align: center;"><?php echo date('D', strtotime('friday next week')); ?><br />
						<?php echo date('m/j', strtotime('friday next week', time())); ?></th>
					
					<th>Week Total</th>
					<th>Grand Total</th>
					<th>Account Description</th>
				</tr>
				<?php for($i = 0; $i != 15; $i++): ?>
				<tr class="week2-row-<?php echo $i; ?>">
					<td valign="top"><?php echo form_dropdown('week2[account][]', $accounts, '', 'style="width: 150px;"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day1][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day2][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day3][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day4][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day5][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day6][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('week2[day7][]', 0, 'style="width: 30px;" class="numeric"'); ?></td>
					<td valign="top"><?php echo form_input('week2[weekly_total][]', 0, 'style="width: 60px;" class="week-total"'); ?></td>
					<td valign="top"><?php echo form_input('week2[grand_total][]', 0, 'style="width: 60px;" class="grand-total"'); ?></td>
					<td valign="top"><?php echo form_textarea(array('name' => 'week2[account_description][]', 'id' => 'account_description[]', 'rows' => 1, 'cols' => 30, 'style' => 'width: 200px; max-width: 200px;')); ?></td>
				</tr>
				<?php endfor; ?>
			</tbody>
		</table>
		<br />
		<br />
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<th style="width: 150px;">Holiday</th>
				<td><?php echo form_input('week2[holiday]', 0, 'class="addon-total numeric"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Personal Time</th>
				<td><?php echo form_input('week2[personal_time]', 0, 'class="addon-total numeric"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Vacation</th>
				<td><?php echo form_input('week2[vacation]', 0, 'class="addon-total numeric"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Sicktime</th>
				<td><?php echo form_input('week2[sicktime]', 0, 'class="addon-total numeric"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">birthday</th>
				<td><?php echo form_input('week2[birthday]', 0, 'class="addon-total numeric"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('week2[other]', 0, 'class="addon-total numeric"'); ?></td>
			</tr>
		</table>
		<br />
		<br />
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<th style="width: 150px;">Chargeable hours</th>
				<td><?php echo form_input('week2[chargeable_hours]', 0, 'class="chargeable-hours"'); ?></td>
			</tr>
		</table>
		<br />
		<br />
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<th style="width: 150px;">Unpaid Time Off</th>
				<td><?php echo form_input('week2[unpaid_time_off]', 0, 'class="unpaid-time-off"'); ?></td>
			</tr>
		</table>
		<br />
		<br />
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<th style="width: 150px;">Total Hours</th>
				<td><?php echo form_input('week2[total_hours]', 0, 'class="total-hours"'); ?></td>
			</tr>
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