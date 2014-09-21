<?php load_header() ?>

<?php if ($this->session->flashdata('volunteers')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('volunteers') ?></p>
	</div>
<?php endif ?>

<h1>Volunteers</h1>

<?php echo form_open(site_url('volunteers/edit/'.$ID)) ?>
<div class="ui-block wide" style="width: 960px;">
	<h3><a href="#">User info</a></h3>
	<div>
		<div>
			<table>
				<tr>
					<th width="55"><label for="name">Name</label></th>
					<td><?php echo form_input('name', $name, 'style="width: 647px;"'); ?></td>
					<th><label for="date">Date</label></th>
					<td><?php echo form_input('date', date_for_display($date), 'style="width: 100px;" class="datepicker"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<th width="55"><label for="address">Address</label></th><td><?php echo form_input('address', $address, 'style="width: 450px;"'); ?></td>
					<th><label for="city">City</label></th><td><?php echo form_input('city', $city, 'style="width: 200px;"'); ?></td>
					<th><label for="zip">Zip</label></th><td><?php echo form_input('zip', $zip, 'size="5" maxlength="5" style="width: auto;"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<th width="55"><label for="email">Email</label></th><td><?php echo form_input('email', $email, 'style="width: 530px;"'); ?></td>
					<td><span id="sex" class="buttonset">
						<?php echo form_radio(array('name' => 'sex', 'value' => 'M', 'id' => 'sex1', 'checked' => (($sex == 'M') ? 'checked' : ''))); ?><label for="sex1">M</label>
						<?php echo form_radio(array('name' => 'sex', 'value' => 'F', 'id' => 'sex2', 'checked' => (($sex == 'F') ? 'checked' : ''))); ?><label for="sex2">F</label>
					</span></td>
					<th><label for="birthday">Birthday</label></th><td><?php echo form_input('birthday', date_for_display($birthday), 'style="width: 100px;" class="datepicker"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table style="width: auto;">
				<tr>
					<th>I prefer to be called at</th>
					<td><span id="called" class="buttonset">
						<?php echo form_radio(array('name' => 'called', 'value' => 'home', 'id' => 'called1', 'checked' => (($called == 'home') ? 'checked' : ''))); ?><label for="called1">home</label>
						<?php echo form_radio(array('name' => 'called', 'value' => 'cell', 'id' => 'called2', 'checked' => (($called == 'cell') ? 'checked' : ''))); ?><label for="called2">cell</label>
						<?php echo form_radio(array('name' => 'called', 'value' => 'work', 'id' => 'called3', 'checked' => (($called == 'work') ? 'checked' : ''))); ?><label for="called3">work</label>
						<?php echo form_radio(array('name' => 'called', 'value' => 'no preference', 'id' => 'called4', 'checked' => (($called == 'no preference') ? 'checked' : ''))); ?><label for="called4">no preference</label>
					</span></td>
				</tr>
			</table>
		</div>
		<br>
		<div>
			<table>
				<tr>
					<th width="55"><label for="skills">Skills</label></th><td><?php echo form_input('skills', $skills, 'style="width: 820px;"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<td colspan="2">
						<?php $skilled = unserialize($skilled); ?>
						<span id="skilled" class="buttons">
							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Graphic Design', 'id' => 'skilled1', 'checked' => ((in_array('Graphic Design', $skilled)) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="skilled1">Graphic Design</label>

							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Conseling', 'id' => 'skilled2', 'checked' => ((in_array('Conseling', $skilled)) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="skilled2">Conseling</label>

							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Video', 'id' => 'skilled3', 'checked' => ((in_array('Video', $skilled)) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="skilled3">Video</label>

							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Orginizational', 'id' => 'skilled4', 'checked' => ((in_array('Orginizational', $skilled)) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="skilled4">Orginizational</label>

							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Public Speaking', 'id' => 'skilled5', 'checked' => ((in_array('Public Speaking', $skilled)) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="skilled5">Public Speaking</label>

							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Photography', 'id' => 'skilled6', 'checked' => ((in_array('Photography', $skilled)) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="skilled6">Photography</label>

							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Educational', 'id' => 'skilled7', 'checked' => ((in_array('Educational', $skilled)) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="skilled7">Educational</label>

							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Clerical Skills', 'id' => 'skilled8', 'checked' => ((in_array('Clerical Skills', $skilled)) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="skilled8">Clerical Skills</label>

							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Telephoning', 'id' => 'skilled9', 'checked' => ((in_array('Telephoning', $skilled)) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="skilled9">Telephoning</label>

							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Art', 'id' => 'skilled10', 'checked' => ((in_array('Art', $skilled)) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="skilled10">Art</label>

							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Computers', 'id' => 'skilled11', 'checked' => ((in_array('Computers', $skilled)) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="skilled11">Computers</label>

							<?php echo form_checkbox(array('name' => 'skilled[]', 'value' => 'Project Mgmt.', 'id' => 'skilled12', 'checked' => ((in_array('Project Mgmt.', $skilled)) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="skilled12">Project Mgmt.</label>

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
					<td><?php echo form_textarea(array('name' => 'experience', 'style' => 'width: 100%;', 'rows' => 2, 'value' => $experience)); ?></td>
				</tr>
			</table>
		</div>
		<br>
		<div>
			<table>
				<tr>
					<th>Days available to volunteer:</th>
					<td>
						<?php $avail_days = unserialize($avail_days); ?>
						<div id="days" class="buttons">
							<?php echo form_checkbox(array('name' => 'avail_days[]', 'value' => 'Sunday', 'id' => 'day1', 'checked' => ((in_array('Sunday', $avail_days)) ? 'checked' : ''))); ?><label for="day1">Sunday</label>
							<?php echo form_checkbox(array('name' => 'avail_days[]', 'value' => 'Monday', 'id' => 'day2', 'checked' => ((in_array('Monday', $avail_days)) ? 'checked' : ''))); ?><label for="day2">Monday</label>
							<?php echo form_checkbox(array('name' => 'avail_days[]', 'value' => 'Tuesday', 'id' => 'day3', 'checked' => ((in_array('Tuesday', $avail_days)) ? 'checked' : ''))); ?><label for="day3">Tuesday</label>
							<?php echo form_checkbox(array('name' => 'avail_days[]', 'value' => 'Wednesday', 'id' => 'day4', 'checked' => ((in_array('Wednesday', $avail_days)) ? 'checked' : ''))); ?><label for="day4">Wednesday</label>
							<?php echo form_checkbox(array('name' => 'avail_days[]', 'value' => 'Thursday', 'id' => 'day5', 'checked' => ((in_array('Thursday', $avail_days)) ? 'checked' : ''))); ?><label for="day5">Thursday</label>
							<?php echo form_checkbox(array('name' => 'avail_days[]', 'value' => 'Friday', 'id' => 'day6', 'checked' => ((in_array('Friday', $avail_days)) ? 'checked' : ''))); ?><label for="day6">Friday</label>
							<?php echo form_checkbox(array('name' => 'avail_days[]', 'value' => 'Saturday', 'id' => 'day7', 'checked' => ((in_array('Saturday', $avail_days)) ? 'checked' : ''))); ?><label for="day7">Saturday</label>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<th>Times:</th>
					<td><?php echo form_input('avail_times', $avail_times, 'style="width: 837px;"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table style="width: auto;">
				<tr>
					<th>Amount of time willing to give</th>
					<td><?php echo form_input('vol_time', $vol_time, 'style="width: 230px;"'); ?></td>
					<th>per</th>
					<td><span id="vol_time_per" class="buttonset">
						<?php echo form_radio(array('name' => 'vol_time_per', 'value' => 'month', 'id' => 'vol_time_per1', 'checked' => (($vol_time_per == 'month') ? 'checked' : ''))); ?><label for="vol_time_per1">Month</label>
						<?php echo form_radio(array('name' => 'vol_time_per', 'value' => 'week', 'id' => 'vol_time_per2', 'checked' => (($vol_time_per == 'week') ? 'checked' : ''))); ?><label for="vol_time_per2">Week</label>
						<?php echo form_radio(array('name' => 'vol_time_per', 'value' => 'n/a', 'id' => 'vol_time_per3', 'checked' => (($vol_time_per == 'n/a') ? 'checked' : ''))); ?><label for="vol_time_per3">N/A</label>
					</span></td>
				</tr>
			</table>
		</div>
		<br>
		<div>
			<table>
				<tr>
					<th>Languages Spoken: <br /><small>(Other than English)</small></th>
					<td><?php echo form_input('languages', $languages, 'style="width: 749px;"'); ?></td>
				</tr>
			</table>
		</div>
		<br>
		<div>
			<table>
				<tr>
					<th style="vertical-align: top; white-space: nowrap;">Volunteer Interests:</th>
					<td>
						<?php $interests = unserialize($interests) ?>
						<div id="interests" class="buttons">
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Helpline', 'id' => 'interest1', 'checked' => ((in_array('Helpline', $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest1">Helpline</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Fundraising', 'id' => 'interest2', 'checked' => ((in_array('Fundraising', $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest2">Fundraising</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Update on research', 'id' => 'interest3', 'checked' => ((in_array('Update on research', $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest3">Update on research</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'General Office', 'id' => 'interest4', 'checked' => ((in_array('General Office', $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest4">General Office</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => "Walk to End Alzheimer's", 'id' => 'interest5', 'checked' => ((in_array("Walk to End Alzheimer's", $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest5">Walk to End Alzheimer's</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Communications Assistant', 'id' => 'interest6', 'checked' => ((in_array('Communications Assistant', $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest6">Communications Assistant</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Advocacy / Public Policy', 'id' => 'interest7', 'checked' => ((in_array('Advocacy / Public Policy', $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest7">Advocacy / Public Policy</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Receptionist', 'id' => 'interest8', 'checked' => ((in_array('Receptionist', $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest8">Receptionist</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Project Assistant', 'id' => 'interest9', 'checked' => ((in_array('Project Assistant', $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest9">Project Assistant</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Health Fair Host / Hostess', 'id' => 'interest10', 'checked' => ((in_array('Health Fair Host / Hostess', $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest10">Health Fair Host / Hostess</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Development Support', 'id' => 'interest11', 'checked' => ((in_array('Development Support', $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest11">Development Support</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Data Entry', 'id' => 'interest12', 'checked' => ((in_array('Data Entry', $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest12">Data Entry</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'memories in the making', 'id' => 'interest13', 'checked' => ((in_array('memories in the making', $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest13">memories in the making</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Support Group Facilitator', 'id' => 'interest14', 'checked' => ((in_array('Support Group Facilitator', $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest14">Support Group Facilitator</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Volunteer Management Support', 'id' => 'interest15', 'checked' => ((in_array('Volunteer Management Support', $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest15">Volunteer Management Support</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Health Fairs', 'id' => 'interest16', 'checked' => ((in_array('Health Fairs', $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest16">Health Fairs</label>
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Community Education Presentations', 'id' => 'interest17', 'checked' => ((in_array('Community Education Presentations', $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest17">Community Education Presentations</label><br />
							<?php echo form_checkbox(array('name' => 'interests[]', 'value' => 'Other', 'id' => 'interest18', 'checked' => ((in_array('pyjrt', $interests)) ? 'checked' : ''))); ?><label style="margin: 0 5px 10px 0;" for="interest18">Other<small>(specify)</small></label>
							<?php echo form_input('interests_other', $interests_other, 'style="width: 593px; margin-left: 10px;"'); ?>
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
						<?php echo form_radio(array('name' => 'diverse', 'value' => 'Yes', 'id' => 'diverse1', 'checked' => (($diverse == 'Yes') ? 'checked' : ''))); ?><label for="diverse1">Yes</label>
						<?php echo form_radio(array('name' => 'diverse', 'value' => 'No', 'id' => 'diverse2', 'checked' => (($diverse == 'No') ? 'checked' : ''))); ?><label for="diverse2">No</label>
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
					<td><?php echo form_input('emp_name', $emp_name, 'style="width: 449px;"'); ?></td>
					<th><label for="emp_phone">Phone</label></th>
					<?php $emp_phone = explode('-', $emp_phone); ?>
					<td>(<?php echo form_input('emp_phone1', $emp_phone[0], 'style="width: auto;" size="3" maxlength="3"'); ?>)<?php echo form_input('emp_phone2', $emp_phone[1], 'style="width: auto;" size="3" maxlength="3"'); ?>-<?php echo form_input('emp_phone3', $emp_phone[2], 'style="width: auto;" size="4" maxlength="4"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<th><label for="agency">Agency / Company</label></th>
					<td><?php echo form_input('agency', $agency, 'style="width: 288px;"'); ?></td>
					<th><label for="agency_address">Agency / Compnay Address</label></th>
					<td><?php echo form_input('agency_address', $agency_address); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<th><label for="type_work_studies">Type of Work / Studies</label></th>
					<td><?php echo form_input('type_work_studies', $type_work_studies, 'style="width: 445px;"'); ?></td>
					<th><label for="ok_call">Ok to call work / school?</label></th>
					<td><span id="ok_call" class="buttonset">
						<?php echo form_radio(array('name' => 'ok_call', 'value' => 'Yes', 'id' => 'ok_call1', 'checked' => (($ok_call == 'Yes') ? 'checked' : ''))); ?><label for="ok_call1">Yes</label>
						<?php echo form_radio(array('name' => 'ok_call', 'value' => 'No', 'id' => 'ok_call2', 'checked' => (($ok_call == 'No') ? 'checked' : ''))); ?><label for="ok_call2">No</label>
					</span></td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<th><label for="know_someone">Do you know someone with Alzheimer’s?</label></th>
					<td><span id="know_someone" class="buttonset">
						<?php echo form_radio(array('name' => 'know_someone', 'value' => 'Yes', 'id' => 'know_someone1', 'checked' => (($know_someone == 'Yes') ? 'checked' : ''))); ?><label for="know_someone1">Yes</label>
						<?php echo form_radio(array('name' => 'know_someone', 'value' => 'No', 'id' => 'know_someone2', 'checked' => (($know_someone == 'No') ? 'checked' : ''))); ?><label for="know_someone2">No</label>
					</span></td>
					<th><label for="relationship">Relationship</label></th>
					<td><?php echo form_input('relationship', $relationship); ?></td>
					<th><label for="living">Living?</label></th>
					<td><span id="living" class="buttonset">
						<?php echo form_radio(array('name' => 'living', 'value' => 'Yes', 'id' => 'living1', 'checked' => (($living == 'Yes') ? 'checked' : ''))); ?><label for="living1">Yes</label>
						<?php echo form_radio(array('name' => 'living', 'value' => 'No', 'id' => 'living2', 'checked' => (($living == 'No') ? 'checked' : ''))); ?><label for="living2">No</label>
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
					<td><?php echo form_input('reference1', $reference1, 'style="width: 550px;"'); ?></td>
					<th><label for="r1_relation">Relation</label></th>
					<td><?php echo form_input('r1_relation', $r1_relation, 'style="width: 150px;"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table style="width: auto">
				<tr>
					<th><label for="r1_years">Years Known</label></th>
					<td><?php echo form_input('r1_years', $r1_years, 'style="width: auto;" size="3" maxlength="3"'); ?></td>
					<th><label for="r1_phone">Phone</label></th>
					<?php $r1_phone = explode('-', $r1_phone) ?>
					<td>(<?php echo form_input('r1_phone1', $r1_phone[0], 'style="width: auto;" size="3" maxlength="3"'); ?>)<?php echo form_input('r1_phone2', $r1_phone[1], 'style="width: auto;" size="3" maxlength="3"'); ?>-<?php echo form_input('r1_phone3', $r1_phone[2], 'style="width: auto;" size="4" maxlength="4"'); ?></td>
					<th><label for="r1_email">Email</label></th>
					<td><?php echo form_input('r1_email', $r1_email); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table style="width: auto">
				<tr>
					<th><label for="r1_type">Reference Type:</label></th>
					<td><span id="r1_type" class="buttonset">
						<?php echo form_radio(array('name' => 'r1_type', 'value' => 'Personal', 'id' => 'r1_type1', 'checked' => (($r1_type == 'Personal') ? 'checked' : ''))); ?><label for="r1_type1">Personal</label>
						<?php echo form_radio(array('name' => 'r1_type', 'value' => 'Professional', 'id' => 'r1_type2', 'checked' => (($r1_type == 'Professional') ? 'checked' : ''))); ?><label for="r1_type2">Professional</label>
					</span></td>
				</tr>
			</table>
		</div>
		<br>
		<div>
			<table>
				<tr>
					<th><label for="reference2">Reference 2</label></th>
					<td><?php echo form_input('reference2', $reference2, 'style="width: 550px;"'); ?></td>
					<th><label for="r2_relation">Relation</label></th>
					<td><?php echo form_input('r2_relation', $r2_relation, 'style="width: 150px;"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table style="width: auto">
				<tr>
					<th><label for="r2_years">Years Known</label></th>
					<td><?php echo form_input('r2_years', $r2_years, 'style="width: auto;" size="3" maxlength="3"'); ?></td>
					<th><label for="r2_phone">Phone</label></th>
					<?php $r2_phone = explode('-', $r2_phone) ?>
					<td>(<?php echo form_input('r2_phone1', $r2_phone[0], 'style="width: auto;" size="3" maxlength="3"'); ?>)<?php echo form_input('r2_phone2', $r2_phone[1], 'style="width: auto;" size="3" maxlength="3"'); ?>-<?php echo form_input('r2_phone3', $r2_phone[2], 'style="width: auto;" size="4" maxlength="4"'); ?></td>
					<th><label for="r2_email">Email</label></th>
					<td><?php echo form_input('r2_email', $r2_email); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table style="width: auto">
				<tr>
					<th><label for="r2_type">Reference Type:</label></th>
					<td><span id="r2_type" class="buttonset">
						<?php echo form_radio(array('name' => 'r2_type', 'value' => 'Personal', 'id' => 'r2_type1', 'checked' => (($r2_type == 'Personal') ? 'checked' : ''))); ?><label for="r2_type1">Personal</label>
						<?php echo form_radio(array('name' => 'r2_type', 'value' => 'Professional', 'id' => 'r2_type2', 'checked' => (($r2_type == 'Professional') ? 'checked' : ''))); ?><label for="r2_type2">Professional</label>
					</span></td>
				</tr>
			</table>
		</div>
		<h2 style="text-align: center; border-top: 2px dashed #000; padding-top: 10px;">FOR OFFICE USE ONLY:</h2>
		<div>
			<table>
				<tr>
					<th><label for="supervisor">Supervisor:</label></th>
					<td><?php echo form_input('supervisor', $supervisor, 'style="width: 150px;"'); ?></td>
					<th><label for="start_date">Start Date:</label></th>
					<td><?php echo form_input('start_date', date_for_display($start_date), 'class="datepicker" style="width: 150px;"'); ?></td>
					<th><label for="work_assignment">Work assignment:</label></th>
					<td><?php echo form_input('work_assignment', $work_assignment, 'style="width: 150px;"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table style="width: auto">
				<tr>
					<th><label for="contact_date">Date of initial contact with the Association:</label></th>
					<td><?php echo form_input('contact_date', date_for_display($contact_date), 'class="datepicker" style="width: 150px;"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table style="width: auto">
				<tr>
					<th><label for="interview_date">Date of initial interview:</label></th>
					<td><?php echo form_input('interview_date', date_for_display($interview_date), 'class="datepicker" style="width: 150px;"'); ?></td>
				</tr>
			</table>
		</div>
		<div>
			<table style="width: auto">
				<tr>
					<th><label for="interviewed">Interviewed:</label></th>
					<td><span id="interviewed" class="buttonset">
						<?php echo form_radio(array('name' => 'interviewed', 'value' => 'in person', 'id' => 'interviewed1', 'checked' => (($interviewed == 'in person') ? 'checked' : ''))); ?><label for="interviewed1">in person</label>
						<?php echo form_radio(array('name' => 'interviewed', 'value' => 'by phone', 'id' => 'interviewed2', 'checked' => (($interviewed == 'by phone') ? 'checked' : ''))); ?><label for="interviewed2">by phone</label>
					</span></td>
				</tr>
			</table>
		</div>
		<br>
		<div>
			<table style="width: auto;">
				<tr>
					<th style="border-bottom: none;">This Volunteer is currently working in:</th>
				</tr>
			</table>
		</div>
		<div>
			<table style="width: auto;">
			<?php $class = 'button-remove' ?>
			<?php $i = 1; foreach($positions as $position): ?>
			<?php if ($i == count($positions)) {
				$class = 'button-add';
			} ?>
				<tr>
					<td>
						<table style="width: auto;">
							<tr>
								<th style="border-bottom: none;">Position:</th>
								<td style="border-bottom: none;"><?php echo form_input('working[position][]', $position->position); ?></td>
							</tr>
							<tr>
								<th style="border-bottom: none;">Project / Event:</th>
								<td style="border-bottom: none;"><?php echo form_input('working[event][]', $position->event); ?></td>
							</tr>
							<tr>
								<th style="border-bottom: none;">Start Date:</th>
								<td style="border-bottom: none;"><?php echo form_input('working[start_date][]', date_for_display($position->start_date), 'class="datepicker"'); ?></td>
							</tr>
							<tr>
								<th style="border-bottom: none;">End Date:</th>
								<td style="border-bottom: none;"><?php echo form_input('working[end_date][]', date_for_display($position->end_date), 'class="datepicker"'); ?></td>
							</tr>
						</table>
					</td>
					<td style="vertical-align: bottom"><span class="<?php echo $class ?>"></span></td>
				</tr>
			<?php $i++; endforeach; ?>
			</table>
		</div>
		<br>
		<div>
			<table style="width: auto;">
				<tr>
					<th style="border-bottom: none;"><?php echo form_checkbox(array('name' => 'schedule', 'id' => 'schedule', 'value' => 'orientation', 'checked' => (($schedule == 1) ? 'checked' : ''))) ?><label for="schedule">Please schedule this volunteer for a general orientation session.</label></th>
				</tr>
				<tr>
					<th style="border-bottom: none;"><?php echo form_checkbox(array('name' => 'schedule_on', 'id' => 'schedule_on', 'value' => 'orientation', 'checked' => (($schedule_on == 1) ? 'checked' : ''))) ?><label for="schedule_on">Please schedule this volunteer for a general orientation session.</label><?php echo form_input('schedule_on_date', date_for_display($schedule_on_date), 'style="width: auto;" class="datepicker"'); ?></th>
				</tr>
				<tr>
					<td style="border-bottom: none;">
						<div id="training_type" class="buttonset">
							<?php echo form_radio(array('name' => 'training_type', 'value' => 'Online Training', 'id' => 'training_type1', 'checked' => (($training_type == 'Online Training') ? 'checked' : ''))); ?><label for="training_type1">Online Training</label>
							<?php echo form_radio(array('name' => 'training_type', 'value' => 'Workshop Observation', 'id' => 'training_type2', 'checked' => (($training_type == 'Workshop Observation') ? 'checked' : ''))); ?><label for="training_type2">Workshop Observation</label>
							<?php echo form_radio(array('name' => 'training_type', 'value' => 'Onsite Training', 'id' => 'training_type3', 'checked' => (($training_type == 'Onsite Training') ? 'checked' : ''))); ?><label for="training_type3">Onsite Training</label>
						</div>
					</td>
				</tr>

				<tr>
					<th style="border-bottom: none;"><?php echo form_checkbox(array('name' => 'orientation_on', 'id' => 'orientation_on', 'value' => 'orientation_on', 'checked' => (($orientation_on == 1) ? 'checked' : ''))) ?><label for="schedule_on">This Volunteer has already attended a general orientation on</label><?php echo form_input('orientation_on_date', date_for_display($orientation_on_date), 'style="width: auto;" class="datepicker"'); ?></th>
				</tr>
			</table>
		</div>
		<br><br>
		<div>
			<table>
				<tr>
					<th style="border-bottom: none;"><label for="comments">Comments</label></th>
				</tr>
				<tr style="border-bottom: none;">
					<th><?php echo form_textarea('comments', $comments, 'style="width: 100%"'); ?></th>
				</tr>
			</table>
		</div>
	</div>
	<p><?php echo form_submit('update_volunteer', 'Update Volunteer'); ?></p>
</div>
<?php echo form_hidden('do_action', 'do_action'); ?>
<?php echo form_close(); ?>

<?php load_footer(); ?>

<script type="text/javascript">
$(document).ready(function() {
	$('.buttonset').buttonset();
	$('.buttons input[type=checkbox], #willing_na').button();
	$('.datepicker').datepicker({
		changeMonth: true,
		changeYear: true
	});

	$('.button-add').live('click', function() {
		var $t = $(this),
		clone = $t.parents('tr').clone();
		clone.find(':input').val('').removeClass('hasDatepicker').removeAttr('id');
		clone.find('.button-add').removeClass('button-add').addClass('button-remove');

		$t.parents('tr').after(clone);
	});

	$('.button-remove').live('click', function() {
		$(this).parents('tr').remove();
	})
});
</script>