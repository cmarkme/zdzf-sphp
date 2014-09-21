<?php load_header() ?>

<?php if ($this->session->flashdata('travel')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('travel') ?></p>
	</div>
<?php endif ?>

<h1>View Travel Request</h1>

<div class="ui-block wide">
	<h3><a href="#">Request info</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th style="width: 150px;">For</th>
					<td>
						<?php echo @$user->meta['first_name'].' '.@$user->meta['last_name']; ?>
					</td>
				</tr>

				<tr class="ui-helper-reset">
					<th>For the Month</th>
					<td><?php echo $travel_request['details']->for_month; ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Current Status</th>
					<td><?php echo $travel_request['details']->current_status; ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th style="width: 150px;">Manager</th>
						<td>
							<?php echo @$user->manager['first_name'].' '.@$user->manager['last_name']; ?>
						</td>
				</tr>

				<tr class="manager_sig<?php echo (($travel_request['details']->current_status != 'Approved') ? ' hidden' : ''); ?>">
					<th>Manager Signature</th>
					<td><?php echo @$travel_request['details']->manager_signature; ?></td>
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
						<div style="padding: 3px 5px"><?php echo date_for_display($request->travel_date); ?></div>
					</td>
					<td style="width: 200px; vertical-align: top;">
						<strong>Travel From</strong><br />
						<div style="padding: 3px 5px"><?php echo $request->travel_from; ?></div>
					</td>
					<td style="width: 200px; vertical-align: top;">
						<strong>Travel To</strong><br />
						<div style="padding: 3px 5px"><?php echo $request->travel_to; ?></div>
					</td>
					<td style="width: 200px;">
						<strong>Purpose</strong><br />
						<div style="padding: 3px 5px"><?php echo $request->purpose; ?></div>
					</td>
				</tr>

				<tr>
					<td valign="top">
						<?php $hash = rand(1000, 9999); ?>
						<strong>Roundtrip?</strong><br />
						<div style="padding: 3px 5px"><?php echo (($request->roundtrip == 'Yes') ? 'Yes' : 'No') ?> </div>
						<p>
							<strong>Note: </strong> roundtrip must be filled or net mileage will be zero
						</p>
					</td>
					<td valign="top">
						<strong># of Total Miles</strong><br />
						<div style="padding: 3px 5px"><?php echo $request->total_miles; ?></div>
					</td>
					<td valign="top">
						<strong>Home Adjustment</strong><br />
						<div style="padding: 3px 5px"><?php echo $request->home_adjustment; ?></div>
						<p>
							<strong>Note: </strong> If "Home" is chosen in To or From, please specify the mileage adjustment.
						</p>
					</td>
					<td valign="top">
						<strong>Net Mileage</strong><br />
						<div style="padding: 3px 5px"><?php echo $request->net_mileage; ?></div>
						<p>
							<strong>Note: </strong> Mileage will be zero if Total Miles minus Home Adjustment equals a negative number or if roundtrip is not filled in.
						</p>
					</td>
				</tr>

				<tr>
					<td></td>
					<td>
						<strong>Parking</strong><br />
						<div style="padding: 3px 5px">$<?php echo number_format($request->parking, 2, '.', ''); ?></div>
					</td>
					<td>
						<strong>Account Number</strong><br />
						<?php
						if(!isset($local_accounts[$request->account_number]))
						{
							$local_accounts[$request->account_number] = $request->account_number;
						}
						?>
						<div style="padding: 3px 5px"><?php echo $request->account_number; ?></div>
					</td>
					<td>
						<strong>Total Amount</strong><br />
						<div style="padding: 3px 5px">$<?php echo number_format($request->total_amount, 2, '.', ''); ?></div>
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
						<div style="padding: 3px 5px"><?php echo date_for_display($ot->travel_date); ?></div>
					</td>

					<td style="width: 200px;">
						<strong>Purpose</strong><br />
						<div style="padding: 3px 5px"><?php echo $ot->purpose; ?></div>
					</td>

					<td style="vertical-align: top;">
						<strong>Account Number</strong><br />
						<?php 
						if(!isset($ot_accounts[$ot->account_number]))
						{
							$ot_accounts[$ot->account_number] = $ot->account_number;
						}
						?>
						<div style="padding: 3px 5px"><?php echo $ot->account_number; ?></div>
					</td>

					<td style="width: 200px; vertical-align: top;">
						<strong>Air</strong><br />
						<div style="padding: 3px 5px"><?php echo number_format($ot->air, 2, '.', ''); ?></div>
						<div style="padding: 3px 5px"><?php echo str_replace('gl_account', $ot_codes['airfare'], $ot->account_number) ?></div>
					</td>
				</tr>
				<tr>
					<td style="width: 200px;">
						<strong>Hotel</strong><br />
						<div style="padding: 3px 5px"><?php echo number_format($ot->hotel, 2, '.', ''); ?></div>
						<div style="padding: 3px 5px"><?php echo str_replace('gl_account', $ot_codes['hotel'], $ot->account_number) ?></div>
					</td>

					<td style="width: 200px;">
						<strong>Meals</strong><br />
						<div style="padding: 3px 5px"><?php echo number_format($ot->meals, 2, '.', ''); ?></div>
						<div style="padding: 3px 5px"><?php echo str_replace('gl_account', $ot_codes['meals'], $ot->account_number) ?></div>
					</td>

					<td style="width: 200px;">
						<strong>Misc</strong><br />
						<div style="padding: 3px 5px"><?php echo number_format($ot->misc, 2, '.', ''); ?></div>
						<div style="padding: 3px 5px"><?php echo str_replace('gl_account', $ot_codes['misc'], $ot->account_number) ?></div>
					</td>

					<td style="width: 200px;">
						<strong>Transit</strong><br />
						<div style="padding: 3px 5px"><?php echo number_format($ot->transit, 2, '.', ''); ?></div>
						<div style="padding: 3px 5px"><?php echo str_replace('gl_account', $ot_codes['transit'], $ot->account_number) ?></div>
					</td>
				</tr>
				<tr>
					<td colspan="4" style="width: 200px;">
						<strong>Total</strong><br />
						<div style="padding: 3px 5px"><?php echo number_format($ot->total, 2, '.', ''); ?></div>
					</td>
				</tr>
			</tbody>
		</table>
		<br><br>
		<?php $i++; endforeach; ?>
	</div>
</div>

<script>
$(document).ready(function()
{
	$(':input, select, textarea').attr("disabled", "disabled").addClass('disabled');
})
</script>

<?php load_footer() ?>