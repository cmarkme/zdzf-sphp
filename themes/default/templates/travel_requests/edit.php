<?php load_header() ?>

<?php if ($this->session->flashdata('travel')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('travel') ?></p>
	</div>
<?php endif ?>

<h1>Edit Travel Request</h1>

<?php echo form_open(site_url('travel/edit/'.$this->uri->segment('3')), array('id' => 'travel_request_form')) ?>
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
						<?php echo @form_hidden('first_name', $user->meta['first_name']); ?>
						<?php echo @form_hidden('last_name', $user->meta['last_name']); ?>
					</td>
				</tr>

				<tr class="ui-helper-reset">
					<th>For the Month</th>
					<td><?php echo form_dropdown('for_month', getMonthList(), $travel_request['details']->for_month); ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Current Status</th>
					<?php if (can_this_user('change_status')): ?>
					<td><?php echo form_dropdown('current_status', array('In Process' => 'In Process', 'Submitted for Approval' => 'Submitted for Approval', 'Approved' => 'Approved'), $travel_request['details']->current_status, 'class="set_status"'); ?></td>
					<?php else: ?>
					<td><?php echo $travel_request['details']->current_status; echo form_hidden('current_status', $travel_request['details']->current_status); ?></td>
					<?php endif ?>
				</tr>

				<tr class="ui-helper-reset">
					<th style="width: 150px;">Manager</th>
					<?php if (!can_this_user('change_manager')): ?>
					<td>
						<select name="manager">
							<?php foreach ($users as $u): ?>
							<option <?php echo (($u->ID == $travel_request['details']->manager) ? 'selected' : '') ?> value="<?php echo $u->ID ?>"><?php echo $u->meta['first_name'].' '.$u->meta['last_name']; ?></option>
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

				<tr class="manager_sig<?php echo (($travel_request['details']->current_status != 'Approved') ? ' hidden' : ''); ?>">
					<th>Manager Signature</th>
					<td><?php echo form_input('manager_signature', @$travel_request['details']->manager_signature); ?></td>
				</tr>

			</tbody>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Local Mileage</a></h3>
	<div>

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

		$i = 0; foreach($travel_request['local'] as $request): ?>
		<table cellpadding="0" cellspacing="0" border="0" <?php echo (($i == 0) ? 'id="local_travel"' : 'style="border-top: 40px solid #aaa;"'); ?>>
			<tbody>
				<?php if($i > 0): ?>
				<tr>
					<td colspan="4"><small class="travel-delete">[X Delete]</small></td>
				</tr>
				<?php endif; ?>
				<tr>
					<td style="width: 200px; vertical-align: top;">
						<strong>Date</strong><br />
						<?php echo form_input('travel_date[]', date_for_display($request->travel_date), 'class="datepicker" style="width: 150px;"'); ?>
					</td>
					<td style="width: 200px; vertical-align: top;">
						<strong>Travel From</strong><br />
						<?php echo form_dropdown_extend('travel_from[]', array_merge($locations, array('Home' => 'Home')), $request->travel_from, 'class="extend-options"'); ?>
					</td>
					<td style="width: 200px; vertical-align: top;">
						<strong>Travel To</strong><br />
						<?php echo form_dropdown_extend('travel_to[]', array_merge($locations, array('Home' => 'Home')), $request->travel_to, 'class="extend-options"'); ?>
					</td>
					<td style="width: 200px;">
						<strong>Purpose</strong><br />
						<?php echo form_textarea(array('name' => 'purpose[]', 'value' => $request->purpose, 'style' => 'width: 150px', 'rows' => 3)); ?>
					</td>
				</tr>

				<tr>
					<td valign="top">
						<?php $hash = rand(1000, 9999); ?>
						<strong>Roundtrip?</strong><br />
						<?php echo form_radio('roundtrip[]['.$hash.']', 'Yes', (($request->roundtrip == 'Yes') ? TRUE : FALSE), 'class="roundtrip"') ?> Yes
						<?php echo form_radio('roundtrip[]['.$hash.']', 'No', (($request->roundtrip == 'No') ? TRUE : FALSE), 'class="roundtrip"') ?> no
						<p>
							<strong>Note: </strong> roundtrip must be filled or net mileage will be zero
						</p>
					</td>
					<td valign="top">
						<strong># of Total Miles</strong><br />
						<?php echo form_input('total_miles[]', $request->total_miles, 'rel="num_only" class="num-miles" style="width: 150px;"'); ?>
					</td>
					<td valign="top">
						<strong>Home Adjustment</strong><br />
						<?php echo form_input('home_adjustment[]', $request->home_adjustment, 'rel="num_only" class="home-adjust" style="width: 150px;"'); ?>
						<p>
							<strong>Note: </strong> If "Home" is chosen in To or From, please specify the mileage adjustment.
						</p>
					</td>
					<td valign="top">
						<strong>Net Mileage</strong><br />
						<?php echo form_input('net_mileage[]', $request->net_mileage, 'rel="num_only" class="net-mileage" style="width: 150px;" readonly="readonly"'); ?>
						<p>
							<strong>Note: </strong> Mileage will be zero if Total Miles minus Home Adjustment equals a negative number or if roundtrip is not filled in.
						</p>
					</td>
				</tr>

				<tr>
					<td></td>
					<td>
						<strong>Parking</strong><br />
						$<?php echo form_input('parking[]', number_format($request->parking, 2, '.', ''), 'class="parking" style="width: 150px;"'); ?>
					</td>
					<td>
						<strong>Account Number</strong><br />
						<?php
						if(!isset($local_accounts[$request->account_number]))
						{
							$local_accounts[$request->account_number] = $request->account_number;
						}
						?>
						<?php echo form_dropdown('account_number[]', $local_accounts, $request->account_number, 'style="width: 180px;" class="account-number"'); ?>
					</td>
					<td>
						<strong>Total Amount</strong><br />
						$<?php echo form_input('total_amount[]', number_format($request->total_amount, 2, '.', ''), 'class="total-amount" style="width: 150px;" readonly="readonly"'); ?>
					</td>
				</tr>
			</tbody>
		</table>
		<?php
		$ot_accounts = array();
		$ot_codes = $this->config->item('ot_travel_accounts');
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

		$i++; endforeach; ?>
		<?php if (!count($travel_request['local'])): ?>
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
						<?php echo form_dropdown('account_number[]', $ot_accounts, '', 'style="width: 180px;" class="account-number"'); ?>
					</td>
					<td>
						<strong>Total Amount</strong><br />
						$<?php echo form_input('total_amount[]', '0.00', 'class="total-amount" style="width: 150px;" readonly="readonly"'); ?>
					</td>
				</tr>
			</tbody>
		</table>
		<?php endif ?>
		<p>
			<?php echo form_submit(array('name' => 'local_clone', 'value' => 'Add Another Record', 'id' => 'local_clone')) ?>
		</p>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Out of Town Expenses</a></h3>
	<div>
		<?php $i = 0; foreach($travel_request['ot'] as $ot): ?>
		<table cellpadding="0" cellspacing="0" border="0" <?php echo (($i == 0) ? 'id="ot_travel"' : 'style="border-top: 40px solid #aaa;"'); ?> class="ot_travel_table">
			<tbody>
				<tr>
					<td style="width: 200px; vertical-align: top;">
						<strong>Date</strong><br />
						<?php echo form_input('ot_travel_date[]', date_for_display($ot->travel_date), 'class="datepicker" style="width: 150px;"'); ?>
					</td>

					<td style="width: 200px;">
						<strong>Purpose</strong><br />
						<?php echo form_textarea(array('name' => 'ot_purpose[]', 'value' => $ot->purpose, 'style' => 'width: 150px', 'rows' => 3)); ?>
					</td>

					<td style="vertical-align: top;">
						<strong>Account Number</strong><br />
						<?php 
						if(!isset($ot_accounts[$ot->account_number]))
						{
							$ot_accounts[$ot->account_number] = $ot->account_number;
						}
						?>
						<?php echo form_dropdown('ot_account_number[]', $ot_accounts, $ot->account_number, 'style="width: 180px;" class="account-number"'); ?>
					</td>

					<td style="width: 200px; vertical-align: top;">
						<strong>Air</strong><br />
						<?php echo form_input('air[]', number_format($ot->air, 2, '.', ''), 'style="width: 150px;" rel="num_only" class="ot_air"'); ?>
						<div><?php echo str_replace('gl_account', $ot_codes['airfare'], $ot->account_number) ?></div>
					</td>
				</tr>
				<tr>
					<td style="width: 200px;">
						<strong>Hotel</strong><br />
						<?php echo form_input('hotel[]', number_format($ot->hotel, 2, '.', ''), 'style="width: 150px;" rel="num_only" class="ot_hotel"'); ?>
						<div><?php echo str_replace('gl_account', $ot_codes['hotel'], $ot->account_number) ?></div>
					</td>

					<td style="width: 200px;">
						<strong>Meals</strong><br />
						<?php echo form_input('meals[]', number_format($ot->meals, 2, '.', ''), 'style="width: 150px;" rel="num_only" class="ot_meals"'); ?>
						<div><?php echo str_replace('gl_account', $ot_codes['meals'], $ot->account_number) ?></div>
					</td>

					<td style="width: 200px;">
						<strong>Misc</strong><br />
						<?php echo form_input('misc[]', number_format($ot->misc, 2, '.', ''), 'style="width: 150px;" rel="num_only" class="ot_misc"'); ?>
						<div><?php echo str_replace('gl_account', $ot_codes['misc'], $ot->account_number) ?></div>
					</td>

					<td style="width: 200px;">
						<strong>Transit</strong><br />
						<?php echo form_input('transit[]', number_format($ot->transit, 2, '.', ''), 'style="width: 150px;" rel="num_only" class="ot_transit"'); ?>
						<div><?php echo str_replace('gl_account', $ot_codes['transit'], $ot->account_number) ?></div>
					</td>
				</tr>
				<tr>
					<td colspan="4" style="width: 200px;">
						<strong>Total</strong><br />
						<?php echo form_input('total[]', number_format($ot->total, 2, '.', ''), 'style="width: 150px;" readonly="readonly" class="ot_total"'); ?>
					</td>
				</tr>
			</tbody>
		</table>
		<br><br>
		<?php $i++; endforeach; ?>
		<?php if (!count($travel_request['ot'])): ?>
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
						<?php echo form_dropdown('ot_account_number[]', $accounts, '', 'style="width: 180px;" class="account-number"'); ?>
					</td>

					<td style="width: 200px; vertical-align: top;">
						<strong>Air</strong><br />
						<?php echo form_input('air[]', '0.00', 'style="width: 150px;" rel="num_only" class="ot_air"'); ?>
					</td>
				</tr>
				<tr>
					<td style="width: 200px;">
						<strong>Hotel</strong><br />
						<?php echo form_input('hotel[]', '0.00', 'style="width: 150px;" rel="num_only" class="ot_hotel"'); ?>
					</td>

					<td style="width: 200px;">
						<strong>Meals</strong><br />
						<?php echo form_input('meals[]', '0.00', 'style="width: 150px;" rel="num_only" class="ot_meals"'); ?>
					</td>

					<td style="width: 200px;">
						<strong>Misc</strong><br />
						<?php echo form_input('misc[]', '0.00', 'style="width: 150px;" rel="num_only" class="ot_misc"'); ?>
					</td>

					<td style="width: 200px;">
						<strong>Transit</strong><br />
						<?php echo form_input('transit[]', '0.00', 'style="width: 150px;" rel="num_only" class="ot_transit" '); ?>
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
		<?php endif ?>
		<p>
			<?php echo form_submit(array('name' => 'ot_clone', 'value' => 'Add Another Record', 'id' => 'ot_clone')) ?>
		</p>

		<hr>

		<?php if(can_this_user('approve_travel') && $travel_request['details']->current_status == 'Submitted for Approval'): ?>
		<p class="clear">
			<?php echo form_submit('submit_request', 'Approve') ?>
			<?php echo form_submit('submit_request', 'Send Back to User', 'class="submit-approval" id="traval_approval"') ?>
		</p>
		<?php endif; ?>

		<p>
			<?php echo form_hidden('update_travel_request', 'true'); ?>
			<?php echo form_hidden('mileage_rate', $travel_request['details']->mileage_rate); ?>
			<?php if ($travel_request['details']->current_status == 'In Process' || can_this_user('approve_travel')): ?>
			<?php echo form_submit('submit_request', 'Save') ?>
			<?php endif; ?>
				
			<?php if ($travel_request['details']->current_status == 'In Process'): ?>
			<?php echo form_submit('submit_request', 'Submit for Approval', 'class="submit-approval" id="traval_approval"') ?>
			<?php endif ?>
		</p>
	</div>
</div>
<?php echo form_close(); ?>
<?php load_footer() ?>