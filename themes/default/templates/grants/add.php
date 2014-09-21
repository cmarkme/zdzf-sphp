<?php load_header() ?>

<?php if ($this->session->flashdata('grants')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('grants') ?></p>
	</div>
<?php endif ?>

<h1>Grants</h1>

<script>
	availableTags = [
	<?php foreach($users as $user): ?>
	<?php echo '"'.$user.'",'; ?>
	<?php endforeach; ?>
	];
</script>

<?php echo form_open_multipart('grants/add') ?>
<div class="ui-block wide">
	<h3><a href="#">Funder Info</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th><label for="funder">Funder</label></th>
				<td colspan="2"><?php echo form_input('funder', '', 'class="required"'); ?></td>
				<th><label for="type">Type</label></th>
				<td colspan="2"><?php echo form_dropdown('type', array('Foundation' => 'Foundation', 'Corporation' => 'Corporation', 'Government' => 'Government'), '', 'class="required"'); ?></td>
				<th><label for="contact">Contact</label></th>
				<td><?php echo form_input('contact', '', 'class="required"'); ?></td>
			</tr>
			<tr>
				<th><label for="address">Address</label></th>
				<td colspan="5"><?php echo form_input('address', '', 'class="required"'); ?></td>
				<th><label for="title">Title</label></th>
				<td><?php echo form_input('title', ''); ?></td>
			</tr>
			<tr>
				<th><label for="address2">Address</label></th>
				<td colspan="5"><?php echo form_input('address2'); ?></td>
				<th><label for="email">Email</label></th>
				<td><?php echo form_input('email', ''); ?></td>
			</tr>
			<tr>
				<th><label for="city">City</label></th>
				<td><?php echo form_input('city', '', 'class="required"'); ?></td>
				<th><label for="state">State</label></th>
				<td><?php echo form_dropdown('state', getStateList(), '', 'style="width: auto;" class="required"'); ?></td>
				<th><label for="zip">Zip</label></th>
				<td><?php echo form_input('zip', '', 'style="width: auto;" size="5" maxlength="5" class="required"'); ?></td>
				<th><label for="phone">Phone</label></th>
				<td><?php echo form_input('phone', '', 'class="format-phone"'); ?></td>
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
							<td><?php echo form_input('website', '', 'style="width: 200px;"'); ?></td>
							<td><?php echo form_upload('grand_guildlines', 'style="width: 200px;"'); ?></td>
							<td><?php echo form_input('previous_funding', '', 'style="width: 200px;" rel="num_only"'); ?></td>
							<td><?php echo form_upload('nine_nine_zero', 'style="width: 200px;"'); ?></td>
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
				), '', 'style="width: 100px;" class="required"'); ?></td>
				<th><label for="">Program:</label></th>
				<td><?php echo form_input('program', '', 'style="width: 100px;"'); ?></td>
				<th><label for="">Request:</label></th>
				<td><?php echo form_input('request', '', 'style="width: 100px;" rel="num_only"'); ?></td>
				<th><label for="">Duration:</label></th>
				<td><?php echo form_input('duration', '', 'style="width: 100px;"'); ?></td>
				<th><label for="">Aprvd Amt:</label></th>
				<td><?php echo form_input('aprvd_amt', '', 'style="width: 100px;" rel="num_only"'); ?></td>
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
				<td><?php echo form_input('aprvl_date', '', 'style="width: 100px;" class="datepicker"'); ?></td>
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
				<td><?php echo form_input('year_one_start', '', 'style="width: 100px;" class="datepicker"'); ?></td>
				<td><?php echo form_input('year_one_end', '', 'style="width: 100px;" class="datepicker"'); ?></td>
				<td><?php echo form_input('year_two_start', '', 'style="width: 100px;" class="datepicker"'); ?></td>
				<td><?php echo form_input('year_two_end', '', 'style="width: 100px;" class="datepicker"'); ?></td>
				<td><?php echo form_input('year_three_start', '', 'style="width: 100px;" class="datepicker"'); ?></td>
				<td><?php echo form_input('year_three_end', '', 'style="width: 100px;" class="datepicker"'); ?></td>
			</tr>
			<tr>
				<th><label for="">Fund Amount:</label></th>
				<th colspan="2"><?php echo form_input('year_one_fund', '', 'style="width: 235px;" rel="num_only"'); ?></td>
				<th colspan="2"><?php echo form_input('year_two_fund', '', 'style="width: 235px;" rel="num_only"'); ?></td>
				<th colspan="2"><?php echo form_input('year_three_fund', '', 'style="width: 235px;" rel="num_only"'); ?></td>
			</tr>
		</table>
		<br>
		<table cellspacing="0" border="0">
			<tr>
				<th><label for="">LOI Y/N:</label></th>
				<td><?php echo form_dropdown('loi', array('Yes' => 'Yes', 'No' => 'No'), '','class="yesno"'); ?></td>
				<th><label for="">Due Date:</label></th>
				<td><?php echo form_input('loi_due_date', '', 'style="width: 100px;" class="datepicker required"'); ?></td>
				<th><label for="">Int. App Date</label></th>
				<td><?php echo form_input('loi_app_date', '', 'style="width: 100px;" class="datepicker required"'); ?></td>
				<th><label for="">Subm Date:</label></th>
				<td><?php echo form_input('loi_subm_date', '', 'style="width: 100px;" class="datepicker"'); ?></td>
				<th><label for="">Rept Out:</label></th>
				<td><?php echo form_input('loi_rept_out', '', 'style="width: 100px;" class="datepicker required"'); ?></td>
			</tr>
			<tr>
				<th><label for="">Full App:</label></th>
				<td><?php echo form_dropdown('full_app', array('Yes' => 'Yes', 'No' => 'No'), '','class="yesno"'); ?></td>
				<th><label for="">Due Date:</label></th>
				<td><?php echo form_input('full_app_due_date', '', 'style="width: 100px;" class="datepicker required"'); ?></td>
				<th><label for="">Int. App Date</label></th>
				<td><?php echo form_input('full_app_app_date', '', 'style="width: 100px;" class="datepicker required"'); ?></td>
				<th><label for="">Subm Date:</label></th>
				<td><?php echo form_input('full_app_subm_date', '', 'style="width: 100px;" class="datepicker"'); ?></td>
				<th><label for="">Rept Out:</label></th>
				<td><?php echo form_input('full_app_rept_out', '', 'style="width: 100px;" class="datepicker required"'); ?></td>
			</tr>
			<tr>
				<th colspan="9" style="text-align: right"><label for="completion_date">Completion Date</label></th>
				<td><?php echo form_input('completion_date', '', 'style="width: 100px;" class="datepicker"'); ?></td>
			</tr>
		</table>
		<table cellspacing="0" border="0">
			<tr>
				<th style="vertical-align: top; padding-top: 3px;"><label for="">Notes:</label></th>
				<td><?php echo form_textarea('current_notes', '', 'style="width: 92%"'); ?></td>
			</tr>
			<tr>
				<th><label for="attachments">Attachments</label></th>
				<td><?php echo form_upload(array('name' => 'current_attachments[]', 'multiple' => 'multiple')); ?></td>
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
				<td><?php echo form_dropdown('responsible_staff', array_merge(array(0 => 'Select Staff'), $users)); ?></td>
				<th><label for="staff_access">Staff Access</th>
				<td><?php echo form_input('staff_access', '', 'class="required autocomplete"'); ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td colspan="2"><i><small>(Ben, Debra, and Joyce should be assumed)</small></i></td>
			</tr>
		</table>
		<?php $up_name = substr(md5(rand()), 0, 10); ?>
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
							<td style="border-bottom: none;"><?php echo form_dropdown('report_type[]', array('Program' => 'Program', 'Financial' => 'Financial', 'Other' => 'Other (see notes)')); ?></td>
						</tr>
						<tr>
							<th style="border-bottom: none;"><label for="report_notes">Notes</label></th>
							<td style="border-bottom: none;"><?php echo form_input('report_notes[]'); ?></td>
						</tr>
						<tr>
							<th style="border-bottom: none;"><label for="report_attachments">Attach Files</label></th>
							<td style="border-bottom: none;"><?php echo form_upload($up_name.'[]', '', 'multiple="multiple"'); ?></td>
						</tr>
					</table>
				</td>
				<td style="vertical-align: bottom; text-align: left;"><span class="reporting-add"></span></td>
			</tr>
		</table>
		<?php echo form_hidden('upload_names', $up_name) ?>
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
				<td><?php echo form_input('nce_duration', ''); ?></td>
				<th><label for="nce_aprvl_date">Aprvl Date:</label></th>
				<td><?php echo form_input('nce_aprvl_date', '', 'class="datepicker"'); ?></td>
				<th><label for="nce_submission_date">Submission Date:</label></th>
				<td><?php echo form_input('nce_submission_date', '', 'class="datepicker"'); ?></td>
			</tr>
		</table>
		<br>
		<table cellspacing="0" border="0">
			<tr>
				<th style="vertical-align: top; padding-top: 3px;"><label for="">Notes:</label></th>
				<td><?php echo form_textarea('nce_notes', '', 'style="width: 92%"'); ?></td>
			</tr>
			<tr>
				<th><label for="attachments">Attachments</label></th>
				<td><?php echo form_upload(array('name' => 'nce_attachments[]', 'multiple' => 'multiple')); ?></td>
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
						<tr>
							<td><?php echo form_input('ggci_deadline[]', '', 'style="width: 100px;" class="datepicker"'); ?></td>
							<td><?php echo form_dropdown('ggci_type[]', array('LOI' => 'LOI', 'Full' => 'Full')); ?></td>
							<td><?php echo form_input('ggci_report_out[]', '', 'style="width: 100px;" class="datepicker"'); ?></td>
							<td style="vertical-align: bottom; text-align: left;"><span class="button-add"></span></td>
						</tr>
						<tr>
							<th colspan="2">Online Submission:</th>
							<td colspan="2"><?php echo form_dropdown('online_submission', array('Yes' => 'Yes', 'No' => 'No')); ?></td>
						</tr>
						<tr>
							<th colspan="2">Weblink:</th>
							<td colspan="2"><?php echo form_input('weblink'); ?></td>
						</tr>
					</table>
				</td>
				<th style="vertical-align: top; padding-top: 8px;">Notes</th>
				<td style="vertical-align: top; padding-top: 8px;"><?php echo form_textarea('ggci_notes', '', 'style="width: 98%"'); ?></td>
			</tr>
		</table>
		<br>
		<table cellspacing="0" border="0">
			<tr>
				<th>Attachments</th>
				<td><?php echo form_upload(array('name' => 'ggci_attachments[]', 'multiple' => 'multiple')); ?></td>
			</tr>
		</table>
	</div>
</div>
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
			<tr>
				<td><?php echo form_input('fy[]', '', 'style="width: 100px;" maxlength="4" rel="num_only" class="wholenumber"'); ?></td>
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