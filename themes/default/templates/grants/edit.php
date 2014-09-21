<?php load_header() ?>

<?php if ($this->session->flashdata('grants')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('grants') ?></p>
	</div>
<?php endif ?>

<h1>Grants</h1>
<p>Hold ctrl and click to follow links.</p>
<?php echo form_open_multipart('grants/edit/'.$ID) ?>

<script>
	availableTags = [
	<?php foreach($users as $user): ?>
	<?php echo '"'.$user.'",'; ?>
	<?php endforeach; ?>
	];
</script>

<div class="ui-block wide">
	<h3><a href="#">Funder Info</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th><label for="funder">Funder</label></th>
				<td colspan="2"><?php echo form_input('funder', $funder, 'class="required"'); ?></td>
				<th><label for="type">Type</label></th>
				<td colspan="2"><?php echo form_dropdown('type', array('Foundation' => 'Foundation', 'Corporation' => 'Corporation', 'Government' => 'Government'), $type, 'class="required"'); ?></td>
				<th><label for="contact">Contact</label></th>
				<td><?php echo form_input('contact', $contact, 'class="required"'); ?></td>
			</tr>
			<tr>
				<th><label for="address">Address</label></th>
				<td colspan="5"><?php echo form_input('address', $address, 'class="required"'); ?></td>
				<th><label for="title">Title</label></th>
				<td><?php echo form_input('title', $title); ?></td>
			</tr>
			<tr>
				<th><label for="address2">Address</label></th>
				<td colspan="5"><?php echo form_input('address2'); ?></td>
				<th><label for="email">Email</label></th>
				<td><?php echo form_input('email', $email, 'class="email-link"'); ?></td>
			</tr>
			<tr>
				<th><label for="city">City</label></th>
				<td><?php echo form_input('city', $city, 'class="required"'); ?></td>
				<th><label for="state">State</label></th>
				<td><?php echo form_dropdown('state', getStateList(), $state, 'style="width: auto;" class="required"'); ?></td>
				<th><label for="zip">Zip</label></th>
				<td><?php echo form_input('zip', $zip, 'style="width: auto;" size="5" maxlength="5" class="required"'); ?></td>
				<th><label for="phone">Phone</label></th>
				<td><?php echo form_input('phone', $phone, 'class="format-phone"'); ?></td>
			</tr>
			<tr>
				<td colspan="8">
					<table>
						<tr>
							<th style="text-align: center;"><label for="website">Website</label></th>
							<th style="text-align: center;"><label for="grand_guildlines">Grant Guidelines</label></th>
							<th style="text-align: center;"><label for="previous_funding">Previous Funding</label></th>
							<th style="text-align: center;"><label for="nine_nine_zero">990</label></th>
						</tr>
						<tr>
							<td style="vertical-align: top;"><?php echo form_input('website', $website, 'style="width: 200px;" class="weblink"'); ?></td>
							<td style="vertical-align: top;">
								<?php echo form_upload('grand_guildlines', 'style="width: 200px;" class="weblink"'); ?>
								<?php 
								if (strlen($grand_guildlines)): ?>
									<br /><?php echo anchor( '/uploads/'. $grand_guildlines, $grand_guildlines ) ?>
								<?php endif ?>
							</td>
							<td style="vertical-align: top;"><?php echo form_input('previous_funding', $previous_funding, 'style="width: 200px;" class="weblink" rel="num_only"'); ?></td>
							<td style="vertical-align: top;">
								<?php echo form_upload('nine_nine_zero', 'style="width: 200px;" class="weblink"'); ?>
								<?php if (strlen($nine_nine_zero)): ?>
									<br /><?php echo anchor( '/uploads/'. $nine_nine_zero, $nine_nine_zero ) ?>
								<?php endif ?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="ui-block wide">
	<h3><a href="#">Current Grant Cycle Information</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th><label for="">Status:</label></th>
				<td><?php echo form_dropdown('status', array('To Submit' => 'To Submit',
					'On Deck' => 'On Deck',
					'Funded' => 'Funded',
					'Pending' => 'Pending',
					'Declined' => 'Declined',
					'Prospect' => 'Prospect',
					'Approved' => 'Approved'
				), $status, 'style="width: 100px;" class="required"'); ?></td>
				<th><label for="">Program:</label></th>
				<td><?php echo form_input('program', $program, 'style="width: 100px;"'); ?></td>
				<th><label for="">Request:</label></th>
				<td><?php echo form_input('request', $request, 'style="width: 100px;" rel="num_only"'); ?></td>
				<th><label for="">Duration:</label></th>
				<td><?php echo form_input('duration', $duration, 'style="width: 100px;"'); ?></td>
				<th><label for="">Aprvd Amt:</label></th>
				<td><?php echo form_input('aprvd_amt', $aprvd_amt, 'style="width: 100px;" rel="num_only"'); ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<th><label for="">Location:</label></th>
				<td><?php echo form_dropdown('location', array('Inland Empire' => 'Inland Empire',
					'Coachella Valley' => 'Coachella Valley',
					'San Fernando Valley' => 'San Fernando Valley',
					'East Los Angeles' => 'East Los Angeles',
					'Wilshire' => 'Wilshire',
					'CA Southland' => 'CA Southland',
					'State Wide' => 'State Wide',
					'Multiple' => 'Multiple (See Notes)'
				), '', 'style="width: 100px;"'); ?></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<th><label for="">Aprvl Date:</label></th>
				<td><?php echo form_input('aprvl_date', date_for_display($aprvl_date), 'style="width: 100px;" class="datepicker"'); ?></td>
			</tr>
		</table>
		<br>
		<table cellspacing="0" border="0">
			<tr>
				<td></td>
				<th colspan="2" style="text-align: center;">Year 1</label></th>
				<th colspan="2" style="text-align: center;">Year 2</label></th>
				<th colspan="2" style="text-align: center;">Year 3</label></th>
			</tr>
			<tr>
				<th><label for="">Year:</label></th>
				<td><?php echo form_input('year_one_start', $year_one_start, 'style="width: 100px;" class="datepicker"'); ?></td>
				<td><?php echo form_input('year_one_end', $year_one_end, 'style="width: 100px;" class="datepicker"'); ?></td>
				<td><?php echo form_input('year_two_start', $year_two_start, 'style="width: 100px;" class="datepicker"'); ?></td>
				<td><?php echo form_input('year_two_end', $year_two_end, 'style="width: 100px;" class="datepicker"'); ?></td>
				<td><?php echo form_input('year_three_start', $year_three_start, 'style="width: 100px;" class="datepicker"'); ?></td>
				<td><?php echo form_input('year_three_end', $year_three_end, 'style="width: 100px;" class="datepicker"'); ?></td>
			</tr>
			<tr>
				<th><label for="">Fund Amount:</label></th>
				<th colspan="2"><?php echo form_input('year_one_fund', $year_one_fund, 'style="width: 235px;" rel="num_only"'); ?></td>
				<th colspan="2"><?php echo form_input('year_two_fund', $year_two_fund, 'style="width: 235px;" rel="num_only"'); ?></td>
				<th colspan="2"><?php echo form_input('year_three_fund', $year_three_fund, 'style="width: 235px;" rel="num_only"'); ?></td>
			</tr>
		</table>
		<br>
		<table cellspacing="0" border="0">
			<tr>
				<th><label for="">LOI Y/N:</label></th>
				<td><?php echo form_dropdown('loi', array('Yes' => 'Yes', 'No' => 'No'), $loi, 'class="required"'); ?></td>
				<th><label for="">Due Date:</label></th>
				<td><?php echo form_input('loi_due_date', date_for_display($loi_due_date), 'style="width: 100px;" class="datepicker required"'); ?></td>
				<th><label for="">Int. App Date</label></th>
				<td><?php echo form_input('loi_app_date', date_for_display($loi_app_date), 'style="width: 100px;" class="datepicker required"'); ?></td>
				<th><label for="">Subm Date:</label></th>
				<td><?php echo form_input('loi_subm_date', date_for_display($loi_subm_date), 'style="width: 100px;" class="datepicker"'); ?></td>
				<th><label for="">Rept Out:</label></th>
				<td><?php echo form_input('loi_rept_out', date_for_display($loi_rept_out), 'style="width: 100px;" class="datepicker required"'); ?></td>
			</tr>
			<tr>
				<th><label for="">Full App:</label></th>
				<td><?php echo form_dropdown('full_app', array('Yes' => 'Yes', 'No' => 'No'), $full_app, 'class="required"'); ?></td>
				<th><label for="">Due Date:</label></th>
				<td><?php echo form_input('full_app_due_date', date_for_display($full_app_due_date), 'style="width: 100px;" class="datepicker required"'); ?></td>
				<th><label for="">Int. App Date</label></th>
				<td><?php echo form_input('full_app_app_date', date_for_display($full_app_app_date), 'style="width: 100px;" class="datepicker required"'); ?></td>
				<th><label for="">Subm Date:</label></th>
				<td><?php echo form_input('full_app_subm_date', date_for_display($full_app_subm_date), 'style="width: 100px;" class="datepicker"'); ?></td>
				<th><label for="">Rept Out:</label></th>
				<td><?php echo form_input('full_app_rept_out', date_for_display($full_app_rept_out), 'style="width: 100px;" class="datepicker required"'); ?></td>
			</tr>
			<tr>
				<th colspan="9" style="text-align: right"><label for="completion_date">Completion Date</label></th>
				<td><?php echo form_input('completion_date', date_for_display($completion_date), 'style="width: 100px;" class="datepicker"'); ?></td>
			</tr>
		</table>
		<table cellspacing="0" border="0">
			<tr>
				<th style="vertical-align: top; padding-top: 3px;"><label for="">Notes:</label></th>
				<td><?php echo form_textarea('current_notes', $current_notes, 'style="width: 92%"'); ?></td>
			</tr>
			<tr>
				<th><label for="attachments">Attachments</label></th>
				<td>
					<?php echo form_hidden('old_current_attachments', $current_attachments); ?>
					<?php echo form_upload(array('name' => 'current_attachments[]', 'multiple' => 'multiple')); ?>
					<?php $current_attachments = unserialize($current_attachments); ?>
					<div>
						<?php if( is_array($nce_attachments)): 
						foreach ($current_attachments as $att): ?>
							<?php echo anchor('uploads/'.$att, $att, ''); ?>&nbsp;&nbsp;&nbsp;
						<?php endforeach;
						endif; ?>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="ui-block wide">
	<h3><a href="#">Reporting</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th><label for="responsible_staff">Responsible Staff</th>
				<td><?php echo form_dropdown('responsible_staff', array_merge(array(0 => 'Select Staff'), $users),  $responsible_staff); ?></td>
				<th><label for="staff_access">Staff Access</th>
				<td><?php echo form_input('staff_access', $staff_access, 'class="required autocomplete"'); ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td colspan="2"><i><small>(Ben, Debra, and Joyce should be assumed)</small></i></td>
			</tr>
		</table>
		<?php foreach($reports as $key => $report): ?>
		<?php $up_name[$key] = substr(md5(rand()), 0, 10) ?>
		<table cellspacing="0" border="0" style="width: auto; float: left;">
			<tr>
				<td>
					<table cellspacing="0" style="width: auto;">
						<tr>
							<th style="border-bottom: none;"><label for="report_date">Date</label></th>
							<td style="border-bottom: none;"><?php echo form_input('report_date[]', date_for_display($report->report_date), 'class="datepicker"'); ?></td>
						</tr>
						<tr>
							<th style="border-bottom: none;"><label for="report_type">Type</label></th>
							<td style="border-bottom: none;"><?php echo form_dropdown('report_type[]', array('Program' => 'Program', 'Financial' => 'Financial', 'Other' => 'Other (see notes)'), $report->report_type); ?></td>
						</tr>
						<tr>
							<th style="border-bottom: none;"><label for="report_notes">Notes</label></th>
							<td style="border-bottom: none;"><?php echo form_input('report_notes[]', $report->report_notes); ?></td>
						</tr>
						<tr>
							<th style="border-bottom: none; vertical-align: top;"><label for="report_attachments">Attach Files</label></th>
							<td style="border-bottom: none;">
								<?php echo form_hidden('old_'.$up_name[$key], base64_encode($report->report_attachments)); ?>
								<?php echo form_upload($up_name[$key].'[]', '', 'multiple="multiple"'); ?>
								<br />
								<?php 
								$atts = unserialize($report->report_attachments);
								foreach($atts as $att)
								{
									echo anchor('uploads/'.$att, $att, '').'<br />'; 
								}
								?></td>
						</tr>
					</table>
				</td>
				<td style="vertical-align: bottom; text-align: left;"><span class="reporting-remove"></span></td>
			</tr>
		</table>
		<?php endforeach; ?>
		<?php $up_name[] = substr(md5(rand()), 0, 10) ?>
		<table cellspacing="0" border="0" style="width: auto; float: left;">
			<tr>
				<td>
					<table cellspacing="0" style="width: auto;">
						<tr>
							<th style="border-bottom: none;"><label for="report_date">Date</label></th>
							<td style="border-bottom: none;"><?php echo form_input('report_date[]', '', 'class="datepicker"'); ?></td>
						</tr>
						<tr>
							<th style="border-bottom: none;"><label for="report_type">Type</label></th>
							<td style="border-bottom: none;"><?php echo form_dropdown('report_type[]', array('Program' => 'Program', 'Financial' => 'Financial', 'Other' => 'Other (see notes)'),' $report->report_type'); ?></td>
						</tr>
						<tr>
							<th style="border-bottom: none;"><label for="report_notes">Notes</label></th>
							<td style="border-bottom: none;"><?php echo form_input('report_notes[]'); ?></td>
						</tr>
						<tr>
							<th style="border-bottom: none;"><label for="report_attachments">Attach Files</label></th>
							<td style="border-bottom: none;"><?php echo form_upload($up_name[$key+1].'[]'); ?></td>
						</tr>
					</table>
				</td>
				<td style="vertical-align: bottom; text-align: left;"><span class="reporting-add"></span></td>
			</tr>
		</table>
		<?php echo form_hidden('upload_names', implode(',', $up_name)) ?>
	</div>
</div>
<div class="ui-block wide">
	<h3><a href="#">No Cost Extension</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th><label for="nce_status">Status:</label></th>
				<td><?php echo form_dropdown('nce_status', array('To Submit' => 'To Submit',
					'On Deck' => 'On Deck',
					'Funded' => 'Funded',
					'Pending' => 'Pending',
					'Declined' => 'Declined',
					'Prospect' => 'Prospect',
					'Approved' => 'Approved')); ?></td>
				<th><label for="nce_duration">Duration:</label></th>
				<td><?php echo form_input('nce_duration', $nce_duration); ?></td>
				<th><label for="nce_aprvl_date">Aprvl Date:</label></th>
				<td><?php echo form_input('nce_aprvl_date', date_for_display($nce_aprvl_date), 'class="datepicker"'); ?></td>
				<th><label for="nce_submission_date">Submission Date:</label></th>
				<td><?php echo form_input('nce_submission_date', date_for_display($nce_submission_date), 'class="datepicker"'); ?></td>
			</tr>
		</table>
		<br>
		<table cellspacing="0" border="0">
			<tr>
				<th style="vertical-align: top; padding-top: 3px;"><label for="">Notes:</label></th>
				<td><?php echo form_textarea('nce_notes', $nce_notes, 'style="width: 92%"'); ?></td>
			</tr>
			<tr>
				<th><label for="attachments">Attachments</label></th>
				<td>
					<?php echo form_hidden('old_nce_attachments', $nce_attachments); ?>
					<?php echo form_upload(array('name' => 'nce_attachments[]', 'multiple' => 'multiple')); ?>
					<div>
						<?php $nce_attachments = unserialize($nce_attachments) ?>
						<?php if( is_array($nce_attachments)): 
						foreach ($nce_attachments as $att): ?>
							<?php echo anchor('uploads/'.$att, $att, ''); ?>&nbsp;&nbsp;&nbsp;
						<?php endforeach;
						endif; ?>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="ui-block wide">
	<h3><a href="#">General Grant Cycle Information</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<td style="vertical-align: top; padding-top: 8px;">
					<table cellspacing="0" border="0" style="width: auto;">
						<tr>
							<th>Deadline</th>
							<th>Type</th>
							<th style="width: 100px;">Report Out</th>
							<th></th>
						</tr>
							<?php 
							$ggci_deadline = unserialize($ggci_deadline);
							$ggci_type = unserialize($ggci_type);
							$ggci_report_out = unserialize($ggci_report_out);
							?>
						<?php foreach ($ggci_deadline as $key => $dummy): ?>
						<tr>
							<td><?php echo form_input('ggci_deadline[]', $ggci_deadline[$key], 'style="width: 100px;" class="datepicker"'); ?></td>
							<td><?php echo form_dropdown('ggci_type[]', array('LOI' => 'LOI', 'Full' => 'Full'), $ggci_type[$key]); ?></td>
							<td><?php echo form_input('ggci_report_out[]', $ggci_report_out[$key], 'style="width: 100px;" class="datepicker"'); ?></td>
							<td style="vertical-align: bottom; text-align: left;"><span class="button-remove"></span></td>
						</tr>
						<?php endforeach ?>
						<tr>
							<td><?php echo form_input('ggci_deadline[]', '', 'style="width: 100px;" class="datepicker"'); ?></td>
							<td><?php echo form_dropdown('ggci_type[]', array('LOI' => 'LOI', 'Full' => 'Full')); ?></td>
							<td><?php echo form_input('ggci_report_out[]', '', 'style="width: 100px;" class="datepicker"'); ?></td>
							<td style="vertical-align: bottom; text-align: left;"><span class="button-add"></span></td>
						</tr>
						<tr>
							<th colspan="2">Online Submission:</th>
							<td colspan="2"><?php echo form_dropdown('online_submission', array('Yes' => 'Yes', 'No' => 'No'), $online_submission); ?></td>
						</tr>
						<tr>
							<th colspan="2">Weblink:</th>
							<td colspan="2"><?php echo form_input('weblink', $weblink, 'class="weblink"'); ?></td>
						</tr>
					</table>
				</td>
				<th style="vertical-align: top; padding-top: 8px;">Notes</th>
				<td style="vertical-align: top; padding-top: 8px;"><?php echo form_textarea('ggci_notes', $ggci_notes, 'style="width: 98%"'); ?></td>
			</tr>
		</table>
		<br>
		<table cellspacing="0" border="0">
			<tr>
				<th>Attachments</th>
				<td>
					<?php echo form_hidden('old_ggci_attachments', $ggci_attachments); ?>
					<?php echo form_upload(array('name' => 'ggci_attachments[]', 'multiple' => 'multiple')); ?>
					<div>
						<?php $ggci_attachments = unserialize($ggci_attachments) ?>
						<?php if( is_array($nce_attachments)): 
						foreach ($ggci_attachments as $att): ?>
							<?php echo anchor('uploads/'.$att, $att, ''); ?>&nbsp;&nbsp;&nbsp;
						<?php endforeach;
						endif; ?>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>

<?php if ($status == 'Funded' && can_this_user('manage_funding_history')): ?>
<div class="ui-block wide">
	<h3><a href="#">Funding History</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th>FY</th>
				<th>Req $</th>
				<th>Refund $</th>
				<th>Program</th>
				<th>Result</th>
				<th>Notes</th>
				<th></th>
			</tr>
			<?php foreach($history as $h): ?>
			<tr>
				<td><?php echo form_input('fy[]', $h->fy, 'style="width: 100px;" rel="num_only" class="wholenumber"'); ?></td>
				<td><?php echo form_input('fh_req[]', $h->fh_req, 'style="width: 100px;" rel="num_only"'); ?></td>
				<td><?php echo form_input('fh_refund[]', $h->fh_refund, 'style="width: 100px;" rel="num_only"'); ?></td>
				<td><?php echo form_input('fh_program[]', $h->fh_program, 'style="width: 100px;"'); ?></td>
				<td><?php echo form_input('fh_result[]', $h->fh_result, 'style="width: 100px;"'); ?></td>
				<td><?php echo form_input('fh_notes[]', $h->fh_notes); ?></td>
				<td style="vertical-align: bottom; text-align: left;"><span class="button-remove"></span></td>
			</tr>
		<?php endforeach; ?>
		<tr>
				<td><?php echo form_input('fy[]', '', 'style="width: 100px;" rel="num_only" class="wholenumber"'); ?></td>
				<td><?php echo form_input('fh_req[]', '', 'style="width: 100px;" rel="num_only"'); ?></td>
				<td><?php echo form_input('fh_refund[]', '', 'style="width: 100px;" rel="num_only"'); ?></td>
				<td><?php echo form_input('fh_program[]', '', 'style="width: 100px;"'); ?></td>
				<td><?php echo form_input('fh_result[]', '', 'style="width: 100px;"'); ?></td>
				<td><?php echo form_input('fh_notes[]', ''); ?></td>
				<td style="vertical-align: bottom; text-align: left;"><span class="button-add"></span></td>
			</tr>
		</table>
	</div>
</div>
<?php endif ?>
	
<p><?php echo form_submit('submit', 'Save Grant Form') ?></p>
<?php echo form_hidden('do_action', 'do_action'); ?>
<?php echo form_close(); ?>

<?php load_footer(); ?>

<script type="text/javascript">
$(document).ready(function() {
	$('.buttonset').buttonset();
	$('.buttons input[type=checkbox], #willing_na').button();

	$('.button-add').live('click', function() {
		var $t = $(this),
		clone = $t.parent('td').parent('tr').clone();
		clone.find(':input').val('').removeClass('hasDatepicker').removeAttr('id');
		clone.find('.button-add').removeClass('button-add').addClass('button-remove');

		$t.parent('td').parent('tr').after(clone);
	});

	$('.reporting-add').live('click', function() 
	{
		var $t = $(this),
		clone = $t.closest('table').clone(),
		up_name = Math.random().toString(36).substr(2, 10);

		clone.find(':input').val('').removeClass('hasDatepicker').removeAttr('id');
		clone.find('.reporting-add').removeClass('reporting-add').addClass('reporting-remove');
		clone.find(':input[type=file]').attr('name', up_name);

		$(':input[name=upload_names]').val(
			$(':input[name=upload_names]').val()+','+up_name
		)

		$t.closest('table').after(clone);
	});

	$('.button-remove').live('click', function() {
		$(this).parent('td').parent('tr').remove();
	});

	$('.reporting-remove').live('click', function() {
		$(this).closest('table').remove();
	});

	$('.yesno').change(function() 
	{
		if($(this).val() == 'No')
		{
			$(this).closest('tr').find(':input').removeClass('required');
		}
		else 
		{
			$(this).closest('tr').find(':input').addClass('required');	
		}
	})
});
</script>