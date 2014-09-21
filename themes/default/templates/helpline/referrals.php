<?php load_header() ?>

<?php if ($this->session->flashdata('helpline')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('helpline') ?></p>
	</div>
<?php endif ?>

<h1><?php echo $caller->first_name.' '.$caller->last_name ?></h1>

<?php echo form_open(site_url('helpline/profile/'.$this->uri->segment('3'))) ?>


<?php //start generall information block ?>
<div class="ui-block wide">
	<h3><a href="#">Caller Information</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th>First Name:</th>
					<td><?php echo form_input('first_name', $caller->first_name); ?></td>
				</tr>
				<tr>
					<th>Last Name:</th>
					<td><?php echo form_input('last_name', $caller->last_name); ?></td>
				</tr>
				<tr>
					<th>Address:</th>
					<td><?php echo form_input('address', $caller->address); ?></td>
				</tr>
				<tr>
					<th>City:</th>
					<td><?php echo form_input('city', $caller->city); ?></td>
				</tr>
				<tr>
					<th>State:</th>
					<td><?php echo form_input('state', $caller->state); ?></td>
				</tr>
				<tr>
					<th>Zip:</th>
					<td><?php echo form_input('zip', $caller->zip); ?></td>
				</tr>
				<tr>
					<th>Phone #:</th>
					<td><?php echo form_input('phone', format_phone_number($caller->phone)); ?></td>
				</tr>
				<tr>
					<th>E-Mail Address:</th>
					<td><?php echo form_input('email', $caller->email); ?></td>
				</tr>
				<tr>
					<th>Gender:</th>
					<td><?php echo form_dropdown('gender', $gender, $caller->gender); ?></td>
				</tr>
				<tr>
					<th>Caller's Birth Date:</th>
					<td><?php echo form_input('dob', date_for_display($caller->dob)); ?></td>
				</tr>
				<tr>
					<th>Language Spoken (if not English):</th>
					<td><?php echo form_input('language', $caller->language); ?></td>
				</tr>
				<tr>
					<th>Ethnicity:</th>
					<td><?php echo form_dropdown('ethnicity', $ethnicity, $caller->ethnicity); ?></td>
				</tr>
				<tr>
					<th>Caller's Education:</th>
					<td><?php echo form_dropdown('education', $education, $caller->education); ?></td>
				</tr>
				<tr>
					<th>Caller Relationship to the person with Dementia:</th>
					<td><?php echo form_dropdown('relationship', $relationship, $caller->relationship); ?></td>
				</tr>
				<tr>
					<th>Reason for Call:</th>
					<td><?php echo form_textarea('reason', $caller->reason) ?></td>
				</tr>
			</tbody>
		</table>

		<?php echo $this->pagination->create_links(); ?>

	</div>
</div>

<?php //start PWD block ?>
<div class="ui-block wide">
	<h3><a href="#">Person with Dementia (PWD)</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th>PWD's Gender:</th>
					<td><?php echo form_dropdown('pwd_gender', $gender, $caller->pwd_gender); ?></td>
				</tr>
				<tr>
					<th>PWD's Birth Date:</th>
					<td><?php echo form_input('pwd_birthday', date_for_display($caller->pwd_birthday)); ?></td>
				</tr>
				<tr>
					<th>PWD's Ethnicity:</th>
					<td><?php echo form_dropdown('pwd_ethnicity', $ethnicity, $caller->pwd_ethnicity); ?></td>
				</tr>
				<tr>
					<th>PWD's Education:</th>
					<td><?php echo form_dropdown('pwd_education', $education, $caller->pwd_education); ?></td>
				</tr>
				<tr>
					<th>Date of Diagnosis:</th>
					<td><?php echo form_input('pwd_diagnosis_date', date_for_display($caller->pwd_diagnosis_date)); ?></td>
				</tr>
				<tr>
					<th>Type of Diagnosis</th>
					<td><?php echo form_input('pwd_diagnosis_type', $caller->pwd_diagnosis_type); ?></td>
				</tr>
			</tbody>
		</table>

		<?php echo $this->pagination->create_links(); ?>

	</div>
</div>
<p class="clear"><?php echo form_submit('upate', 'Update Caller') ?></p>
<?php echo form_hidden('update_caller', $caller->ID) ?>
<?php echo form_close(); ?>
<?php load_footer() ?>