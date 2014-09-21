<?php load_header() ?>
<h1>New Travel Request</h1>

<?php echo form_open(site_url('travel/new_travel_request')) ?>
<div class="ui-block wide">
	<h3><a href="#">Request info</a></h3>
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

				<tr class="ui-helper-reset">
					<th>For the Month</th>
					<td><?php echo form_dropdown('for_month', array("January" => "January","February" => "February","March" => "March","April" => "April","May" => "May","June" => "June","July" => "July","August" => "August","September" => "September","October" => "October","November" => "November","December" => "December")); ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Current Status</th>
					<td><?php echo form_dropdown('current_status', array('In Process' => 'In Process', 'Submitted for Approval' => 'Submitted for Approval', 'Approved' => 'Approved')); ?></td>
				</tr>

				<tr class="ui-helper-reset">
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

<div class="ui-block wide">
	<h3><a href="#">Local Milage</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0" id="local_travel">
			<tbody>
				<tr>
					<td style="width: 200px;">
						<strong>Date</strong><br />
						<?php echo form_input('travel_date[]', '', 'class="datepicker" style="width: 150px;"'); ?>
					</td>
					<td style="width: 200px;">
						<strong>Travel From</strong><br />
						<?php echo form_dropdown('travel_from[]', array('Coachella Valley Office' => 'Coachella Valley Office','GELA Office' => 'GELA Office','GSFV Office' => 'GSFV Office','IE (Redlands) Office' => 'IE (Redlands) Office','SWRC Office' => 'SWRC Office','Wilshire Office' => 'Wilshire Office','Home' => 'Home')); ?>
					</td>
					<td style="width: 200px;">
						<strong>Travel To</strong><br />
						<?php echo form_dropdown('travel_to[]', array('Coachella Valley Office' => 'Coachella Valley Office','GELA Office' => 'GELA Office','GSFV Office' => 'GSFV Office','IE (Redlands) Office' => 'IE (Redlands) Office','SWRC Office' => 'SWRC Office','Wilshire Office' => 'Wilshire Office','Home' => 'Home')); ?>
					</td>
					<td style="width: 200px;">
						<strong>Purpose</strong><br />
						<?php echo form_input('purpose[]', '', 'style="width: 150px;"'); ?>
					</td>
				</tr>

				<tr>
					<td valign="top">
						<?php $hash = rand(1000, 9999); ?>
						<strong>Roundtrip?</strong><br />
						<?php echo form_radio('roundtrip[]['.$hash.']', 'Yes', FALSE, 'class="roundtrip"') ?> Yes
						<?php echo form_radio('roundtrip[]['.$hash.']', 'No', TRUE, 'class="roundtrip"') ?> no
						<p>
							<strong>Note: </strong> roundtrip must be filled or net Milage will be zero
						</p>
					</td>
					<td valign="top">
						<strong># of Total Miles</strong><br />
						<?php echo form_input('total_miles[]', 0.0, 'class="numeric" style="width: 150px;"'); ?>
					</td>
					<td valign="top">
						<strong>Home Adjustment</strong><br />
						<?php echo form_input('home_adjustment[]', 0, 'class="numeric" style="width: 150px;"'); ?>
						<p>
							<strong>Note: </strong> If "Home" is chosen in To or From, please specify the milage adjustment.
						</p>
					</td>
					<td valign="top">
						<strong>Met Mileage</strong><br />
						<?php echo form_input('net_mileage[]', 0, 'class="numeric" style="width: 150px;"'); ?>
						<p>
							<strong>Note: </strong> Milage will be zero if Total Miles minus Home Adjustment equals a negative number or if roundtrip is not filled in.
						</p>
					</td>
				</tr>

				<tr>
					<td></td>
					<td>
						<strong>Parking</strong><br />
						$<?php echo form_input('parking[]', '0.00', 'style="width: 150px;"'); ?>
					</td>
					<td>
						<strong>Account Number</strong><br />
						<?php echo form_dropdown('account_number[]', $accounts, '', 'style="width: 150px;"'); ?>
					</td>
					<td>
						<strong>Total Amount</strong><br />
						<?php echo form_input('total_amount[]', '0.00', 'style="width: 150px;"'); ?>
					</td>
				</tr>
			</tbody>
		</table>

		<p>
			<?php echo form_submit(array('name' => 'local_clone', 'value' => 'Add Another Record', 'id' => 'local_clone')) ?>
		</p>

		<p>
			<?php echo form_hidden('insert_travel_request', 'true'); ?>
			<?php echo form_submit('submit_request', 'Save') ?>
			<?php echo form_submit('submit_request', 'Submit for Approval', 'class="submit-approval" id="traval_approval"') ?>
		</p>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Our of Town Mileage</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0" id="ot_travel">
			<tbody>
				<tr>
					<td style="width: 200px;">
						<strong>Date</strong><br />
						<?php echo form_input('ot_travel_date[]', '', 'class="datepicker" style="width: 150px;"'); ?>
					</td>

					<td style="width: 200px;">
						<strong>Purpose</strong><br />
						<?php echo form_input('ot_purpose[]', '', 'style="width: 150px;"'); ?>
					</td>

					<td>
						<strong>Account Number</strong><br />
						<?php echo form_dropdown('ot_account_number[]', $accounts, '', 'style="width: 150px;"'); ?>
					</td>

					<td style="width: 200px;">
						<strong>Air</strong><br />
						<?php echo form_input('air[]', '', 'style="width: 150px;"'); ?>
					</td>
				</tr>
				<tr>
					<td style="width: 200px;">
						<strong>Hotel</strong><br />
						<?php echo form_input('hotel[]', '', 'style="width: 150px;"'); ?>
					</td>

					<td style="width: 200px;">
						<strong>Meals</strong><br />
						<?php echo form_input('meals[]', '', 'style="width: 150px;"'); ?>
					</td>

					<td style="width: 200px;">
						<strong>Misc</strong><br />
						<?php echo form_input('misc[]', '', 'style="width: 150px;"'); ?>
					</td>

					<td style="width: 200px;">
						<strong>Total</strong><br />
						<?php echo form_input('total[]', '', 'style="width: 150px;"'); ?>
					</td>
				</tr>
			</tbody>
		</table>

		<p>
			<?php echo form_submit(array('name' => 'ot_clone', 'value' => 'Add Another Record', 'id' => 'ot_clone')) ?>
		</p>

		<p>
			<?php echo form_hidden('insert_travel_request', 'true'); ?>
			<?php echo form_submit('submit_request', 'Save') ?>
			<?php echo form_submit('submit_request', 'Submit for Approval', 'class="submit-approval" id="traval_approval"') ?>
		</p>
	</div>
</div>
<?php echo form_close(); ?>
<?php load_footer() ?>