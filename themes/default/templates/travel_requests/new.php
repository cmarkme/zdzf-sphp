<?php load_header() ?>

<?php if ($this->session->flashdata('travel')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('travel') ?></p>
	</div>
<?php endif ?>

<h1>New Travel Request</h1>

<?php echo form_open(site_url('travel/new_travel_request'), array('id' => 'travel_request_form')) ?>
<div class="ui-block wide">
	<h3><a href="#">Request info</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th style="width: 150px;">For</th>
					<td>
						<?php echo @$user->meta['first_name'].' '.@$user->meta['last_name']; ?>
						<?php echo @form_hidden('user_id', $user->ID); ?>
						<?php echo form_hidden('first_name', $user->meta['first_name']); ?>
						<?php echo form_hidden('last_name', $user->meta['last_name']); ?>
					</td>
				</tr>

				<tr class="ui-helper-reset">
					<th>For the Month</th>
					<td><?php echo form_dropdown('for_month', getMonthList(), date('F')); ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Current Status</th>
					<?php if (can_this_user('change_status')): ?>
					<td><?php echo form_dropdown('current_status', array('In Process' => 'In Process', 'Submitted for Approval' => 'Submitted for Approval', 'Approved' => 'Approved')); ?></td>
					<?php else: ?>
					<td>In Process <?php echo form_hidden('current_status', 'In Process'); ?></td>
					<?php endif ?>
				</tr>

				<tr class="ui-helper-reset">
					<th style="width: 150px;">Manager</th>
					<?php if (!can_this_user('change_manager')): ?>
					<td>
						<select name="manager">
							<?php foreach ($users as $u): ?>
							<option <?php echo (($u->ID == $user->user_manager) ? 'selected' : '') ?> value="<?php echo $u->ID ?>"><?php echo $u->meta['first_name'].' '.$u->meta['last_name']; ?></option>
							<?php endforeach ?>
						</select>
					</td>
					<?php else: ?>
						<td>
							<?php echo @$user->manager['first_name'].' '.@$user->manager['last_name']; ?>
							<?php echo form_hidden('manager', $user->user_manager); ?>
						</td>
					<?php endif ?>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Local Mileage</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0" id="local_travel">
			<tbody>
				<tr>
					<td style="width: 200px; vertical-align: top;">
						<strong>Date</strong><br />
						<?php echo form_input('travel_date[]', '', 'class="datepicker" style="width: 150px;"'); ?>
					</td>
					<td style="width: 200px; vertical-align: top;">
						<strong>Travel From</strong><br />
						<?php echo form_dropdown_extend('travel_from[]', array_merge($locations, array('Home' => 'Home')), '', 'class="extend-options"'); ?>
					</td>
					<td style="width: 200px; vertical-align: top;">
						<strong>Travel To</strong><br />
						<?php echo form_dropdown_extend('travel_to[]', array_merge($locations, array('Home' => 'Home')), '', 'class="extend-options"'); ?>
					</td>
					<td style="width: 200px;">
						<strong>Purpose</strong><br />
						<?php echo form_textarea(array('name' => 'purpose[]', 'value' => '', 'style' => 'width: 150px', 'rows' => 3)); ?>
					</td>
				</tr>

				<tr>
					<td valign="top">
						<?php $hash = rand(1000, 9999); ?>
						<strong>Roundtrip?</strong><br />
						<?php echo form_radio('roundtrip[]['.$hash.']', 'Yes', FALSE, 'class="roundtrip"') ?> Yes
						<?php echo form_radio('roundtrip[]['.$hash.']', 'No', TRUE, 'class="roundtrip"') ?> no
						<p>
							<strong>Note: </strong> roundtrip must be filled or net mileage will be zero
						</p>
					</td>
					<td valign="top">
						<strong># of Total Miles</strong><br />
						<?php echo form_input('total_miles[]', 0.0, 'rel="num_only" class="num-miles" style="width: 150px;"'); ?>
					</td>
					<td valign="top">
						<strong>Home Adjustment</strong><br />
						<?php echo form_input('home_adjustment[]', 0, 'rel="num_only" class="home-adjust" style="width: 150px;"'); ?>
						<p>
							<strong>Note: </strong> If "Home" is chosen in To or From, please specify the mileage adjustment.
						</p>
					</td>
					<td valign="top">
						<strong>Net Mileage</strong><br />
						<?php echo form_input('net_mileage[]', 0, 'rel="num_only" class="net-mileage" style="width: 150px;" readonly="readonly"'); ?>
						<p>
							<strong>Note: </strong> Mileage will be zero if Total Miles minus Home Adjustment equals a negative number or if roundtrip is not filled in.
						</p>
					</td>
				</tr>

				<tr>
					<td></td>
					<td>
						<strong>Parking</strong><br />
						$<?php echo form_input('parking[]', '0.00', 'class="parking" style="width: 150px;" rel="num_only"'); ?>
					</td>
					<td>
						<strong>Account Number</strong><br />
					<?php 
					$local_accounts = array();
					foreach($accounts as $key => $value)
					{
						if($value != 'Select Account')
						{
							$t = explode('-', $value);
							$key = str_replace($t[2], $this->config->item('local_travel_account'), $key);
							$t[2] = $this->config->item('local_travel_account');

							$local_accounts[$key] = implode('-', $t);
						}
						else
						{
							$local_accounts[$key] = $accounts[$key];
						}
					}
					?>

						<?php echo form_dropdown('account_number[]', $local_accounts, '', 'style="width: 180px;" class="account-number"'); ?>
					</td>
					<td>
						<strong>Total Amount</strong><br />
						$<?php echo form_input('total_amount[]', '0.00', 'class="total-amount" style="width: 150px;" readonly="readonly"'); ?>
					</td>
				</tr>
			</tbody>
		</table>

		<p>
			<?php echo form_submit(array('name' => 'local_clone', 'value' => 'Add Another Record', 'id' => 'local_clone')) ?>
		</p>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Out of Town Expenses</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0" id="ot_travel" class="ot_travel_table">
			<tbody>
				<tr>
					<td style="width: 200px; vertical-align: top;">
						<strong>Date</strong><br />
						<?php echo form_input('ot_travel_date[]', '', 'class="datepicker" style="width: 150px;"'); ?>
					</td>

					<td style="width: 200px;">
						<strong>Purpose</strong><br />
						<?php echo form_textarea(array('name' => 'ot_purpose[]', 'value' => '', 'style' => 'width: 150px', 'rows' => 3)); ?>
					</td>

					<td style="vertical-align: top;">
						<strong>Account Number</strong><br />
						<?php 
						$ot_accounts = array();
						foreach($accounts as $key => $value)
						{
							if($value != 'Select Account')
							{
								$t = explode('-', $value);
								$key = str_replace($t[2], 'gl_account', $key);
								$t[2] = 'gl_account';

								$ot_accounts[$key] = implode('-', $t);
							}
							else
							{
								$ot_accounts[$key] = $accounts[$key];
							}
						}
						?>
						<?php echo form_dropdown('ot_account_number[]', $ot_accounts, '', 'style="width: 180px;" class="account-number"'); ?>
					</td>

					<td style="width: 200px; vertical-align: top;">
						<strong>Air</strong><br />
						<?php echo form_input('air[]', '0.00', 'style="width: 150px;" rel="num_only" class="ot_air"'); ?>
						<div></div>
					</td>
				</tr>
				<tr>
					<td style="width: 200px;">
						<strong>Hotel</strong><br />
						<?php echo form_input('hotel[]', '0.00', 'style="width: 150px;" rel="num_only" class="ot_hotel"'); ?>
						<div></div>
					</td>

					<td style="width: 200px;">
						<strong>Meals</strong><br />
						<?php echo form_input('meals[]', '0.00', 'style="width: 150px;" rel="num_only" class="ot_meals"'); ?>
						<div></div>
					</td>

					<td style="width: 200px;">
						<strong>Misc</strong><br />
						<?php echo form_input('misc[]', '0.00', 'style="width: 150px;" rel="num_only" class="ot_misc"'); ?>
						<div></div>
					</td>

					<td style="width: 200px;">
						<strong>Transit</strong><br />
						<?php echo form_input('transit[]', '0.00', 'style="width: 150px;" rel="num_only" class="ot_transit" '); ?>
						<div></div>
					</td>
				</tr>
				<tr>
					<td colspan="4" style="width: 200px;">
						<strong>Total</strong><br />
						<?php echo form_input('total[]', '0.00', 'style="width: 150px;" readonly="readonly" class="ot_total"'); ?>
					</td>
				</tr>
			</tbody>
		</table>

		<p>
			<?php echo form_submit(array('name' => 'ot_clone', 'value' => 'Add Another Record', 'id' => 'ot_clone')) ?>
		</p>

		<p>
			<?php echo form_hidden('insert_travel_request', 'true'); ?>
			<?php echo form_hidden('mileage_rate', $mileage_rate); ?>
			<?php echo form_submit('submit_request', 'Save') ?>
			<?php echo form_submit('submit_request', 'Submit for Approval', 'class="submit-approval" id="traval_approval"') ?>
		</p>
	</div>
</div>
<?php echo form_close(); ?>
<?php load_footer() ?>