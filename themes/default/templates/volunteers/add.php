<?php load_header() ?>

<?php if ($this->session->flashdata('volunteers')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('volunteers') ?></p>
	</div>
<?php endif ?>

<h1>Volunteers</h1>

<?php echo form_open(site_url('volunteers/add')) ?>
<div class="ui-block wide" style="width: 960px;">
	<h3><a href="#">User info</a></h3>
	<div>
		<div>
			<table>
				<tr>
					<th width="55"><label for="name">Name</label></th>
					<td><?php echo form_input('name', '', 'style="width: 647px;"'); ?></td>
					<th><label for="date">Date</label></th>
					<td><?php echo form_input('date', '', 'style="width: 100px;" class="datepicker"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<th width="55"><label for="address">Address</label></th><td><?php echo form_input('address', '', 'style="width: 450px;"'); ?></td>
					<th><label for="city">City</label></th><td><?php echo form_input('city', '', 'style="width: 200px;"'); ?></td>
					<th><label for="zip">Zip</label></th><td><?php echo form_input('zip', '', 'size="5" maxlength="5" style="width: auto;"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<th width="55"><label for="email">Email</label></th><td><?php echo form_input('email', '', 'style="width: 530px;"'); ?></td>
					<td><span id="sex" class="buttonset">
						<?php echo form_radio(array('name' => 'sex', 'value' => 'M', 'id' => 'sex1', 'checked' => 'checked')); ?><label for="sex1">M</label>
						<?php echo form_radio(array('name' => 'sex', 'value' => 'F', 'id' => 'sex2')); ?><label for="sex2">F</label>
					</span></td>
					<th><label for="birthday">Birthday</label></th><td><?php echo form_input('birthday', '', 'style="width: 100px;" class="datepicker"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table style="width: auto;">
				<tr>
					<th>I prefer to be called at</th>
					<td><span id="called" class="buttonset">
						<?php echo form_radio(array('name' => 'called', 'value' => 'home', 'id' => 'called1', 'checked' => 'checked')); ?><label for="called1">home</label>
						<?php echo form_radio(array('name' => 'called', 'value' => 'cell', 'id' => 'called2')); ?><label for="called2">cell</label>
						<?php echo form_radio(array('name' => 'called', 'value' => 'work', 'id' => 'called3')); ?><label for="called3">work</label>
						<?php echo form_radio(array('name' => 'called', 'value' => 'no preference', 'id' => 'called4')); ?><label for="called4">no preference</label>
					</span></td>
				</tr>
			</table>
		</div>
		<br>
		<div>
			<table>
				<tr>
					<th width="55"><label for="skills">Skills</label></th><td><?php echo form_input('skills', '', 'style="width: 820px;"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<td colspan="2">
						<span id="skilled" class="buttons">
							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Graphic Design', 'id' => 'skilled1')); ?><label style="margin-bottom: 10px;" for="skilled1">Graphic Design</label>
							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Conseling', 'id' => 'skilled2')); ?><label style="margin-bottom: 10px;" for="skilled2">Conseling</label>
							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Video', 'id' => 'skilled3')); ?><label style="margin-bottom: 10px;" for="skilled3">Video</label>
							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Orginizational', 'id' => 'skilled4')); ?><label style="margin-bottom: 10px;" for="skilled4">Orginizational</label>
							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Public Speaking', 'id' => 'skilled5')); ?><label style="margin-bottom: 10px;" for="skilled5">Public Speaking</label>
							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Photography', 'id' => 'skilled6')); ?><label style="margin-bottom: 10px;" for="skilled6">Photography</label>
							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Educational', 'id' => 'skilled7')); ?><label style="margin-bottom: 10px;" for="skilled7">Educational</label>
							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Clerical Skills', 'id' => 'skilled8')); ?><label style="margin-bottom: 10px;" for="skilled8">Clerical Skills</label>
							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Telephoning', 'id' => 'skilled9')); ?><label style="margin-bottom: 10px;" for="skilled9">Telephoning</label>
							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Art', 'id' => 'skilled10')); ?><label style="margin-bottom: 10px;" for="skilled10">Art</label>
							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Computers', 'id' => 'skilled11')); ?><label style="margin-bottom: 10px;" for="skilled11">Computers</label>
							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Project Mgmt.', 'id' => 'skilled12')); ?><label style="margin-bottom: 10px;" for="skilled12">Project Mgmt.</label>
						</span>
					</td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<th style="border-bottom: none;"><label style="display: block; float: none; width: 100%;" for="experience">Additional information(e.g. computer skills, experience in a particular area, other skills, <br>prior volunteer experience or experience not previously listed</label></th>
				</tr>
				<tr>
					<td><?php echo form_textarea(array('name' => 'experience', 'style' => 'width: 100%;', 'rows' => 2)); ?></td>
				</tr>
			</table>
		</div>
		<br>
		<div>
			<table>
				<tr>
					<th>Days available to volunteer:</th>
					<td>
						<div id="days" class="buttons">
							<?php echo form_checkbox(array('name' => 'avail_days[]', 'value' => 'Sunday', 'id' => 'day1')); ?><label for="day1">Sunday</label>
							<?php echo form_checkbox(array('name' => 'avail_days[]', 'value' => 'Monday', 'id' => 'day2')); ?><label for="day2">Monday</label>
							<?php echo form_checkbox(array('name' => 'avail_days[]', 'value' => 'Tuesday', 'id' => 'day3')); ?><label for="day3">Tuesday</label>
							<?php echo form_checkbox(array('name' => 'avail_days[]', 'value' => 'Wednesday', 'id' => 'day4')); ?><label for="day4">Wednesday</label>
							<?php echo form_checkbox(array('name' => 'avail_days[]', 'value' => 'Thursday', 'id' => 'day5')); ?><label for="day5">Thursday</label>
							<?php echo form_checkbox(array('name' => 'avail_days[]', 'value' => 'Friday', 'id' => 'day6')); ?><label for="day6">Friday</label>
							<?php echo form_checkbox(array('name' => 'avail_days[]', 'value' => 'Saturday', 'id' => 'day7')); ?><label for="day7">Saturday</label>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<th>Times:</th>
					<td><?php echo form_input('avail_times', '', 'style="width: 837px;"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table style="width: auto;">
				<tr>
					<th>Amount of time willing to give</th>
					<td><?php echo form_input('vol_time', '', 'style="width: 230px;"'); ?></td>
					<th>per</th>
					<td><span id="vol_time_per" class="buttonset">
						<?php echo form_radio(array('name' => 'vol_time_per', 'value' => 'month', 'id' => 'vol_time_per1', 'checked' => 'checked')); ?><label for="vol_time_per1">Month</label>
						<?php echo form_radio(array('name' => 'vol_time_per', 'value' => 'week', 'id' => 'vol_time_per2')); ?><label for="vol_time_per2">Week</label>
						<?php echo form_radio(array('name' => 'vol_time_per', 'value' => 'n/a', 'id' => 'vol_time_per3')); ?><label for="vol_time_per3">N/A</label>
					</span></td>
				</tr>
			</table>
		</div>
		<br>
		<div>
			<table>
				<tr>
					<th>Languages Spoken: <br /><small>(Other than English)</small></th>
					<td><?php echo form_input('languages', '', 'style="width: 749px;"'); ?></td>
				</tr>
			</table>
		</div>
		<br>
		<div>
			<table>
				<tr>
					<th style="vertical-align: top; white-space: nowrap;">Volunteer Interests:</th>
					<td>
						<div id="interests" class="buttons">
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Helpline', 'id' => 'interest1')); ?><label style="margin: 0 5px 10px 0;" for="interest1">Helpline</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Fundraising', 'id' => 'interest2')); ?><label style="margin: 0 5px 10px 0;" for="interest2">Fundraising</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Update on research', 'id' => 'interest3')); ?><label style="margin: 0 5px 10px 0;" for="interest3">Update on research</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'General Office', 'id' => 'interest4')); ?><label style="margin: 0 5px 10px 0;" for="interest4">General Office</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => "Walk to End Alzheimer's", 'id' => 'interest5')); ?><label style="margin: 0 5px 10px 0;" for="interest5">Walk to End Alzheimer's</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Communications Assistant', 'id' => 'interest6')); ?><label style="margin: 0 5px 10px 0;" for="interest6">Communications Assistant</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Advocacy / Public Policy', 'id' => 'interest7')); ?><label style="margin: 0 5px 10px 0;" for="interest7">Advocacy / Public Policy</label>

							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Receptionist', 'id' => 'interest8')); ?><label style="margin: 0 5px 10px 0;" for="interest8">Receptionist</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Project Assistant', 'id' => 'interest9')); ?><label style="margin: 0 5px 10px 0;" for="interest9">Project Assistant</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Health Fair Host / Hostess', 'id' => 'interest10')); ?><label style="margin: 0 5px 10px 0;" for="interest10">Health Fair Host / Hostess</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Development Support', 'id' => 'interest11')); ?><label style="margin: 0 5px 10px 0;" for="interest11">Development Support</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Data Entry', 'id' => 'interest12')); ?><label style="margin: 0 5px 10px 0;" for="interest12">Data Entry</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'memories in the making', 'id' => 'interest13')); ?><label style="margin: 0 5px 10px 0;" for="interest13">memories in the making</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Support Group Facilitator', 'id' => 'interest14')); ?><label style="margin: 0 5px 10px 0;" for="interest14">Support Group Facilitator</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Volunteer Management Support', 'id' => 'interest15')); ?><label style="margin: 0 5px 10px 0;" for="interest15">Volunteer Management Support</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Health Fairs', 'id' => 'interest16')); ?><label style="margin: 0 5px 10px 0;" for="interest16">Health Fairs</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Community Education Presentations', 'id' => 'interest17')); ?><label style="margin: 0 5px 10px 0;" for="interest17">Community Education Presentations</label><br />
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Other', 'id' => 'interest18')); ?><label style="margin: 0 5px 10px 0;" for="interest18">Other<small>(specify)</small></label>
							<?php echo form_input('interests_other', '', 'style="width: 593px; margin-left: 10px;"'); ?>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<th width="470"><label for="diverse">Do you have any experience working with ethnically diverse groups?</label></th>
					<td><span id="diverse" class="buttonset">
						<?php echo form_radio(array('name' => 'diverse', 'value' => 'Yes', 'id' => 'diverse1', 'checked' => 'checked')); ?><label for="diverse1">Yes</label>
						<?php echo form_radio(array('name' => 'diverse', 'value' => 'No', 'id' => 'diverse2')); ?><label for="diverse2">No</label>
					</span></td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<td colspan="4" style="border-bottom: none;"><label for=""><strong>(If applicable)</strong></label></td>
				</tr>
				<tr>
					<th><label for="emp_name">Employer Name/School Name</label></th>
					<td><?php echo form_input('emp_name', '', 'style="width: 449px;"'); ?></td>
					<th><label for="emp_phone">Phone</label></th>
					<td>(<?php echo form_input('emp_phone1', '', 'style="width: auto;" size="3" maxlength="3"'); ?>)<?php echo form_input('emp_phone2', '', 'style="width: auto;" size="3" maxlength="3"'); ?>-<?php echo form_input('emp_phone3', '', 'style="width: auto;" size="4" maxlength="4"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<th><label for="agency">Agency / Company</label></th>
					<td><?php echo form_input('agency', '', 'style="width: 288px;"'); ?></td>
					<th><label for="agency_address">Agency / Compnay Address</label></th>
					<td><?php echo form_input('agency_address'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<th><label for="type_work_studies">Type of Work / Studies</label></th>
					<td><?php echo form_input('type_work_studies', '', 'style="width: 445px;"'); ?></td>
					<th><label for="ok_call">Ok to call work / school?</label></th>
					<td><span id="ok_call" class="buttonset">
						<?php echo form_radio(array('name' => 'ok_call', 'value' => 'Yes', 'id' => 'ok_call1', 'checked' => 'checked')); ?><label for="ok_call1">Yes</label>
						<?php echo form_radio(array('name' => 'ok_call', 'value' => 'No', 'id' => 'ok_call2')); ?><label for="ok_call2">No</label>
					</span></td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<th><label for="know_someone">Do you know someone with Alzheimer’s?</label></th>
					<td><span id="know_someone" class="buttonset">
						<?php echo form_radio(array('name' => 'know_someone', 'value' => 'Yes', 'id' => 'know_someone1', 'checked' => 'checked')); ?><label for="know_someone1">Yes</label>
						<?php echo form_radio(array('name' => 'know_someone', 'value' => 'No', 'id' => 'know_someone2')); ?><label for="know_someone2">No</label>
					</span></td>
					<th><label for="relationship">Relationship</label></th>
					<td><?php echo form_input('relationship'); ?></td>
					<th><label for="living">Living?</label></th>
					<td><span id="living" class="buttonset">
						<?php echo form_radio(array('name' => 'living', 'value' => 'Yes', 'id' => 'living1', 'checked' => 'checked')); ?><label for="living1">Yes</label>
						<?php echo form_radio(array('name' => 'living', 'value' => 'No', 'id' => 'living2')); ?><label for="living2">No</label>
					</span></td>
				</tr>
			</table>
		</div>
		<br>
		<h2 style="text-align: center;">REFERENCES (one personal and one professional or volunteer supervisor)</h2>
		<div>
			<table>
				<tr>
					<th><label for="reference1">Reference 1</label></th>
					<td><?php echo form_input('reference1', '', 'style="width: 550px;"'); ?></td>
					<th><label for="r1_relation">Relation</label></th>
					<td><?php echo form_input('r1_relation', '', 'style="width: 150px;"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table style="width: auto">
				<tr>
					<th><label for="r1_years">Years Known</label></th>
					<td><?php echo form_input('r1_years', '', 'style="width: auto;" size="3" maxlength="3"'); ?></td>
					<th><label for="r1_phone">Phone</label></th>
					<td>(<?php echo form_input('r1_phone1', '', 'style="width: auto;" size="3" maxlength="3"'); ?>)<?php echo form_input('r1_phone2', '', 'style="width: auto;" size="3" maxlength="3"'); ?>-<?php echo form_input('r1_phone3', '', 'style="width: auto;" size="4" maxlength="4"'); ?></td>
					<th><label for="r1_email">Email</label></th>
					<td><?php echo form_input('r1_email'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table style="width: auto">
				<tr>
					<th><label for="r1_type">Reference Type:</label></th>
					<td><span id="r1_type" class="buttonset">
						<?php echo form_radio(array('name' => 'r1_type', 'value' => 'Personal', 'id' => 'r1_type1', 'checked' => 'checked')); ?><label for="r1_type1">Personal</label>
						<?php echo form_radio(array('name' => 'r1_type', 'value' => 'Professional', 'id' => 'r1_type2')); ?><label for="r1_type2">Professional</label>
					</span></td>
				</tr>
			</table>
		</div>
		<br>
		<div>
			<table>
				<tr>
					<th><label for="reference2">Reference 2</label></th>
					<td><?php echo form_input('reference2', '', 'style="width: 550px;"'); ?></td>
					<th><label for="r2_relation">Relation</label></th>
					<td><?php echo form_input('r2_relation', '', 'style="width: 150px;"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table style="width: auto">
				<tr>
					<th><label for="r2_years">Years Known</label></th>
					<td><?php echo form_input('r2_years', '', 'style="width: auto;" size="3" maxlength="3"'); ?></td>
					<th><label for="r2_phone">Phone</label></th>
					<td>(<?php echo form_input('r2_phone1', '', 'style="width: auto;" size="3" maxlength="3"'); ?>)<?php echo form_input('r2_phone2', '', 'style="width: auto;" size="3" maxlength="3"'); ?>-<?php echo form_input('r2_phone3', '', 'style="width: auto;" size="4" maxlength="4"'); ?></td>
					<th><label for="r2_email">Email</label></th>
					<td><?php echo form_input('r2_email'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table style="width: auto">
				<tr>
					<th><label for="r2_type">Reference Type:</label></th>
					<td><span id="r2_type" class="buttonset">
						<?php echo form_radio(array('name' => 'r2_type', 'value' => 'Personal', 'id' => 'r2_type1', 'checked' => 'checked')); ?><label for="r2_type1">Personal</label>
						<?php echo form_radio(array('name' => 'r2_type', 'value' => 'Professional', 'id' => 'r2_type2')); ?><label for="r2_type2">Professional</label>
					</span></td>
				</tr>
			</table>
		</div>
	</div>
	<p><?php echo form_submit('save_volunteer', 'Save Volunteer'); ?></p>
</div>
<?php echo form_hidden('do_action', 'do_action'); ?>
<?php echo form_close(); ?>

<?php load_footer(); ?>

<script type="text/javascript">
$(document).ready(function() {
	$('.buttonset').buttonset();
	$('.buttons input[type=checkbox], #willing_na').button();
});
</script>