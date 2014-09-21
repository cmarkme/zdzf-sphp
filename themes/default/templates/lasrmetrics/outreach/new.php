<?php load_header() ?>
<h1>Outreach Data</h1>

<?php echo form_open('lasrmetrics/outreach/new') ?>
<div class="ui-block wide">
	<h3><a href="#">General Information</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th style="width: 330px;">
					<label for="office">Office</label><br />
					(office of the person completing the form)
				</th>
				<td><?php echo form_dropdown('office', $locations); ?></td>
			</tr>
			<tr>
				<th style="vertical-align: top; padding-top: 3px;"><label for="contracted_agency">Is this event though a contracted agency?</label></th>
				<td>
					<div class="buttonset">
						<?php echo form_radio(array('name' => 'contracted_agency', 'value' => 'Yes', 'id' => 'contracted_agency1', 'checked' => 'checked')); ?><label for="contracted_agency1">Yes</label>
						<?php echo form_radio(array('name' => 'contracted_agency', 'value' => 'No', 'id' => 'contracted_agency2')); ?><label for="contracted_agency2">No</label>
					</div>
					If yes, please write the name of the agency:<br>
					<?php echo form_input('contracted_agency_name', ''); ?>
				</td>
			</tr>
			<tr>
				<th>
					<label for="quarter">Quarter</label><br />
					<div class="note">
						(current quarter: July-Sept = Q1; Oct-Dec = Q2;<br />
						Jan-Mar = Q3; April-June = Q4)
					</div>
				</th>
				<td><?php echo form_dropdown('quarter', array(1=>1,2,3,4)); ?></td>
			</tr>
			<tr>
				<th><label for="fiscial_year">Fiscal Year<br><small>(current fiscal year)</small></label></th>
				<td><?php echo form_dropdown('fiscial_year', getYearList()); ?></td>
			</tr>
			<tr>
				<th style="width: 330px;"><label for="date_of_event">Date of Event</label></th>
				<td><?php echo form_input('date_of_event', '', 'class="datepicker" style="width: 100px;"') ?></td>
			</tr>
			<tr>
				<th><label for="created_by">Name of Person Completing this form</label></th>
				<td><?php echo form_dropdown('created_by', $staff) ?></td>
			</tr>
			<tr>
				<th><label for="representative_for_event">Representative(s) for the event</label></th>
				<td><?php echo form_input('representative_for_event', '') ?></td>
			</tr>
			<tr>
				<th><label for="event_type">Event Type</label></th>
				<td><?php echo form_dropdown('event_type', $event_types) ?></td>
			</tr>
			<tr>
				<th>
					<label for="program_department">Program / Department</label><br />

					<small>(For funding purposes, assign the outreach event to a program listed)</small>
				</th>
				<td>
					<?php echo form_dropdown('program_department', $grant_programs); ?> <br>
					If Other, please specify:
					<?php echo form_input('program_department_other', ''); ?>
				</td>
			</tr>
			<tr>
				<th><label for="topic_title">Topic / Title of Event</label></th>
				<td><?php echo form_input('topic_title', '') ?></td>
			</tr>
			<tr>
				<th>
					<label for="grant_program">SPA</label><br />
					<small>(Area where the event took place)</small>
				</th>
				<td><?php echo form_dropdown('grant_program', $SPA); ?></td>
			</tr>
			<tr>
				<th><label for="total_number_attendees">Total # of Attendees - Duplicated</label></th>
				<td><?php echo form_input('total_number_attendees', 0, 'style="width: auto;" size="3"') ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Additional Program Calendar Information</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th style="width: 330px;"><label for="agency">Agency</label></th>
				<td><?php echo form_input('agency', '') ?></td>
			</tr>
			<tr>
				<th><label for="contact_name">Contact Name</label></th>
				<td><?php echo form_input('contact_name', '') ?></td>
			</tr>
			<tr>
				<th><label for="event_address">Event Address</label></th>
				<td><?php echo form_textarea(array('name' => 'event_address','rows' => '4', 'value' => '')) ?></td>
			</tr>
			<tr>
				<th><label for="telephone">Telephone</label></th>
				<td><?php echo form_input('telephone', '') ?></td>
			</tr>
			<tr>
				<th><label for="fax">Fax</label></th>
				<td><?php echo form_input('fax', '') ?></td>
			</tr>
			<tr>
				<th><label for="email">Email</label></th>
				<td><?php echo form_input('email', '') ?></td>
			</tr>
			<tr>
				<th><label for="topic">
					Topic <br>
					If Other, please specify:
				</label></th>
				<td><?php echo form_input('topic', '') ?></td>
			</tr>
			<tr>
				<th><label for="series">Series?</label></th>
				<td>
					<div class="buttonset">
						<?php echo form_radio(array('name' => 'series', 'value' => 'Yes', 'id' => 'series1', 'checked' => 'checked')); ?><label for="series1">Yes</label>
						<?php echo form_radio(array('name' => 'series', 'value' => 'No', 'id' => 'series2')); ?><label for="series2">No</label>
					</div>
				</td>
			</tr>
			<tr>
				<th style="vertical-algin: top; padding-top: 3px;">Time of Event</th>
				<td>
					<table cellspacing="0">
						<tr>
							<td style="width: 50px;"><label for="email">Start:</label></td>
							<td><?php echo form_input('start_time', '', 'class="timepicker" style="width: 100px;"') ?></td>
						</tr>
						<tr>
							<td><label for="email">End:</label></td>
							<td><?php echo form_input('end_time', '', 'class="timepicker" style="width: 100px;"') ?></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<th style="vertical-algin: top; padding-top: 3px;">Language</th>
				<td>
					<div class="buttons">
						<?php echo form_checkbox(array('name' => 'language[]', 'value' => 'English', 'id' => 'language1')); ?><label style="margin-bottom: 10px;" for="language1">English</label>
						<?php echo form_checkbox(array('name' => 'language[]', 'value' => 'Vietnamese', 'id' => 'language2')); ?><label style="margin-bottom: 10px;" for="language2">Vietnamese</label>
						<?php echo form_checkbox(array('name' => 'language[]', 'value' => 'Spanish', 'id' => 'language3')); ?><label style="margin-bottom: 10px;" for="language3">Spanish</label>
						<?php echo form_checkbox(array('name' => 'language[]', 'value' => 'Korean', 'id' => 'language4')); ?><label style="margin-bottom: 10px;" for="language4">Korean</label>
						<?php echo form_checkbox(array('name' => 'language[]', 'value' => 'Cantonese', 'id' => 'language5')); ?><label style="margin-bottom: 10px;" for="language5">Cantonese</label>
						<?php echo form_checkbox(array('name' => 'language[]', 'value' => 'Other', 'id' => 'language6')); ?><label style="margin-bottom: 10px;" for="language6">Other</label>
						<?php echo form_checkbox(array('name' => 'language[]', 'value' => 'Chinese', 'id' => 'language7')); ?><label style="margin-bottom: 10px;" for="language7">Chinese</label>
					</div>
				</td>
			</tr>
			<tr>
				<th><label for="post_online">Post Online?</label></th>
				<td>
					<div class="buttonset">
						<?php echo form_radio(array('name' => 'post_online', 'value' => 'Yes', 'id' => 'post_online1', 'checked' => 'checked')); ?><label for="post_online1">Yes</label>
						<?php echo form_radio(array('name' => 'post_online', 'value' => 'No', 'id' => 'post_online2')); ?><label for="post_online2">No</label>
					</div>
				</td>
			</tr>
			<tr>
				<th><label for="comments_notes">Comments / Notes:</label></th>
				<td><?php echo form_textarea(array('name' => 'comments_notes','rows' => '4', 'value' => '')) ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Health Fairs Face to Face</a></h3>
	<div>
		<div>
			<label for=""><strong>Health Fairs - Face to Face total:</strong></label>&nbsp;&nbsp;<?php echo form_input('num_health_fairs_ftf_total', '', 'style="width: auto;" size="3"'); ?><br>
			<small>Number of people that visited the table, take materials, ask questions.</small>
		</div>
		<br>
		<table cellspacing="0" border="0">
			<tr>
				<th colspan="2" style="text-align: center;">SPA (Duplicated)</th>
				<th colspan="2" style="text-align: center;">Ethnicity (Duplicated)</th>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 1</th>
				<td><?php echo form_input('health_fairs_ftf_spa1', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Caucasian</th>
				<td><?php echo form_input('health_fairs_ftf_caucasian', 0, 'class="health_fairs_ftf_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 2</th>
				<td><?php echo form_input('health_fairs_ftf_spa2', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
				<th>Latino</th>
				<td><?php echo form_input('health_fairs_ftf_latino', 0, 'class="health_fairs_ftf_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 3</th>
				<td><?php echo form_input('health_fairs_ftf_spa3', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
				<th>African American</th>
				<td><?php echo form_input('health_fairs_ftf_african_american', 0, 'class="health_fairs_ftf_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 4</th>
				<td><?php echo form_input('health_fairs_ftf_spa4', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
				<th>API</th>
				<td><?php echo form_input('health_fairs_ftf_api', 0, 'class="health_fairs_ftf_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 5</th>
				<td><?php echo form_input('health_fairs_ftf_spa5', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
				<th>Other Ethnicities</th>
				<td><?php echo form_input('health_fairs_ftf_other_ethnicities', 0, 'class="health_fairs_ftf_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 6</th>
				<td><?php echo form_input('health_fairs_ftf_spa6', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
				<th>Unknown</th>
				<td><?php echo form_input('health_fairs_spa_unknown', 0, 'class="health_fairs_ftf_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 7</th>
				<td colspan="3"><?php echo form_input('health_fairs_ftf_spa7', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 8</th>
				<td colspan="3"><?php echo form_input('health_fairs_ftf_spa8', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Coachella Valley</th>
				<td colspan="3"><?php echo form_input('health_fairs_ftf_coachella_valley', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inland Empire</th>
				<td colspan="3"><?php echo form_input('health_fairs_ftf_inland_empire', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Riverside County</th>
				<td colspan="3"><?php echo form_input('health_fairs_ftf_riverside_county', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>San Bernandino</th>
				<td colspan="3"><?php echo form_input('health_fairs_ftf_san_bernandino', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SW Riverside</th>
				<td colspan="3"><?php echo form_input('health_fairs_ftf_sw_riverside', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inyo</th>
				<td colspan="3"><?php echo form_input('health_fairs_ftf_inyo', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Mono</th>
				<td colspan="3"><?php echo form_input('health_fairs_ftf_mono', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Kings</th>
				<td colspan="3"><?php echo form_input('health_fairs_ftf_kings', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Tulare</th>
				<td colspan="3"><?php echo form_input('health_fairs_ftf_tulare', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Out of Territory</th>
				<td colspan="3"><?php echo form_input('health_fairs_ftf_out_of_territory', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Unknown</th>
				<td colspan="3"><?php echo form_input('health_fairs_ftf_unknown', 0, 'class="health_fairs_ftf_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA Total</th>
				<td><?php echo form_input('health_fairs_ftf_spa_total', 0, 'id="health_fairs_ftf_spa_total" style="width: auto" size="3"'); ?></td>
				<th>Ethnicity Total</th>
				<td><?php echo form_input('health_fairs_ftf_ethnicity_total', 0, 'id="health_fairs_ftf_ethnicity_total" style="width: auto" size="3"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Health Fairs - Walk By</a></h3>
	<div>
		<div>
			<label for=""><strong>Health Fairs - Walk By total:</strong></label>&nbsp;&nbsp;<?php echo form_input('num_health_fairs_walkby_total', 0, 'style="width: auto;" size="3"'); ?><br>
			<small>Number of people who ovserved the resource table and viewed the sinage (estimated).</small>
		</div>
		<br>
		<table cellspacing="0" border="0">
			<tr>
				<th colspan="2" style="text-align: center;">SPA (Duplicated)</th>
				<th colspan="2" style="text-align: center;">Ethnicity (Duplicated)</th>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 1</th>
				<td><?php echo form_input('health_fairs_walkby_spa1', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Caucasian</th>
				<td><?php echo form_input('health_fairs_walkby_caucasian', 0, 'class="health_fairs_walkby_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 2</th>
				<td><?php echo form_input('health_fairs_walkby_spa2', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
				<th>Latino</th>
				<td><?php echo form_input('health_fairs_walkby_latino', 0, 'class="health_fairs_walkby_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 3</th>
				<td><?php echo form_input('health_fairs_walkby_spa3', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
				<th>African American</th>
				<td><?php echo form_input('health_fairs_walkby_african_american', 0, 'class="health_fairs_walkby_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 4</th>
				<td><?php echo form_input('health_fairs_walkby_spa4', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
				<th>API</th>
				<td><?php echo form_input('health_fairs_walkby_api', 0, 'class="health_fairs_walkby_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 5</th>
				<td><?php echo form_input('health_fairs_walkby_spa5', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
				<th>Other Ethnicities</th>
				<td><?php echo form_input('health_fairs_walkby_other_ethnicities', 0, 'class="health_fairs_walkby_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 6</th>
				<td><?php echo form_input('health_fairs_walkby_spa6', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
				<th>Unknown</th>
				<td><?php echo form_input('health_fairs_walkby_spa_unknown', 0, 'class="health_fairs_walkby_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 7</th>
				<td colspan="3"><?php echo form_input('health_fairs_walkby_spa7', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 8</th>
				<td colspan="3"><?php echo form_input('health_fairs_walkby_spa8', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Coachella Valley</th>
				<td colspan="3"><?php echo form_input('health_fairs_walkby_coachella_valley', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inland Empire</th>
				<td colspan="3"><?php echo form_input('health_fairs_walkby_inland_empire', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Riverside County</th>
				<td colspan="3"><?php echo form_input('health_fairs_walkby_riverside_county', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>San Bernandino</th>
				<td colspan="3"><?php echo form_input('health_fairs_walkby_san_bernandino', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SW Riverside</th>
				<td colspan="3"><?php echo form_input('health_fairs_walkby_sw_riverside', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inyo</th>
				<td colspan="3"><?php echo form_input('health_fairs_walkby_inyo', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Mono</th>
				<td colspan="3"><?php echo form_input('health_fairs_walkby_mono', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Kings</th>
				<td colspan="3"><?php echo form_input('health_fairs_walkby_kings', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Tulare</th>
				<td colspan="3"><?php echo form_input('health_fairs_walkby_tulare', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Out of Territory</th>
				<td colspan="3"><?php echo form_input('health_fairs_walkby_out_of_territory', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Unknown</th>
				<td colspan="3"><?php echo form_input('health_fairs_walkby_unknown', 0, 'class="health_fairs_walkby_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA Total</th>
				<td><?php echo form_input('health_fairs_walkby_spa_total', 0, 'id="health_fairs_walkby_spa_total" style="width: auto" size="3"'); ?></td>
				<th>Ethnicity Total</th>
				<td><?php echo form_input('health_fairs_walkby_ethnicity_total', 0, 'id="health_fairs_walkby_ethnicity_total" style="width: auto" size="3"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Network Meetings</a></h3>
	<div>
		<div>
			<label for=""><strong>Network Meetings - total:</strong></label>&nbsp;&nbsp;<?php echo form_input('num_network_meeting_total', 0, 'style="width: auto;" size="3"'); ?><br>
			<small>Regularly scheduled meetings where more than one community agency is present.<br>
				Association staff does not make a formal presentation, but may make announcements or pass out brochures.</small>
		</div>
		<br>
		<table cellspacing="0" border="0">
			<tr>
				<th><label for="network_meeeting_advocacy_information"><h2>Was advocacy information presented?</h2></label></th>
				<td>
					<div class="buttonset">
						<?php echo form_radio(array('name' => 'network_meeeting_advocacy_information', 'value' => 'Yes', 'id' => 'network_meeeting_advocacy_information1', 'checked' => 'checked')); ?><label for="network_meeeting_advocacy_information1">Yes</label>
						<?php echo form_radio(array('name' => 'network_meeeting_advocacy_information', 'value' => 'No', 'id' => 'network_meeeting_advocacy_information2')); ?><label for="network_meeeting_advocacy_information2">No</label>
					</div>
				</td>
			</tr>
		</table>
		<table cellspacing="0" border="0">
			<tr>
				<th colspan="2" style="text-align: center;">SPA (Duplicated)</th>
				<th colspan="2" style="text-align: center;">Ethnicity (Duplicated)</th>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 1</th>
				<td><?php echo form_input('network_meeting_spa1', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Caucasian</th>
				<td><?php echo form_input('network_meeting_caucasian', 0, 'class="network_meeting_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 2</th>
				<td><?php echo form_input('network_meeting_spa2', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
				<th>Latino</th>
				<td><?php echo form_input('network_meeting_latino', 0, 'class="network_meeting_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 3</th>
				<td><?php echo form_input('network_meeting_spa3', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
				<th>African American</th>
				<td><?php echo form_input('network_meeting_african_american', 0, 'class="network_meeting_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 4</th>
				<td><?php echo form_input('network_meeting_spa4', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
				<th>API</th>
				<td><?php echo form_input('network_meeting_api', 0, 'class="network_meeting_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 5</th>
				<td><?php echo form_input('network_meeting_spa5', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
				<th>Other Ethnicities</th>
				<td><?php echo form_input('network_meeting_other_ethnicities', 0, 'class="network_meeting_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 6</th>
				<td><?php echo form_input('network_meeting_spa6', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
				<th>Unknown</th>
				<td><?php echo form_input('network_meeting_spa_unknown', 0, 'class="network_meeting_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 7</th>
				<td colspan="3"><?php echo form_input('network_meeting_spa7', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 8</th>
				<td colspan="3"><?php echo form_input('network_meeting_spa8', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Coachella Valley</th>
				<td colspan="3"><?php echo form_input('network_meeting_coachella_valley', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inland Empire</th>
				<td colspan="3"><?php echo form_input('network_meeting_inland_empire', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Riverside County</th>
				<td colspan="3"><?php echo form_input('network_meeting_riverside_county', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>San Bernandino</th>
				<td colspan="3"><?php echo form_input('network_meeting_san_bernandino', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SW Riverside</th>
				<td colspan="3"><?php echo form_input('network_meeting_sw_riverside', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inyo</th>
				<td colspan="3"><?php echo form_input('network_meeting_inyo', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Mono</th>
				<td colspan="3"><?php echo form_input('network_meeting_mono', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Kings</th>
				<td colspan="3"><?php echo form_input('network_meeting_kings', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Tulare</th>
				<td colspan="3"><?php echo form_input('network_meeting_tulare', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Out of Territory</th>
				<td colspan="3"><?php echo form_input('network_meeting_out_of_territory', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Unknown</th>
				<td colspan="3"><?php echo form_input('network_meeting_unknown', 0, 'class="network_meeting_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA Total</th>
				<td><?php echo form_input('network_meeting_spa_total', 0, 'id="network_meeting_spa_total" style="width: auto" size="3"'); ?></td>
				<th>Ethnicity Total</th>
				<td><?php echo form_input('network_meeting_ethnicity_total', 0, 'id="network_meeting_ethnicity_total" style="width: auto" size="3"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Staff Outreach</a></h3>
	<div>
		<div>
			<label for=""><strong>Staff Outreach - total:</strong></label>&nbsp;&nbsp;<?php echo form_input('num_staff_outreach_total', 0, 'style="width: auto;" size="3"'); ?><br>
			<small>Individual staff contact with one community agency or staff to promote the Association.<br>
				i.e. Support group liason visit, meeting with a senior center director</small>
		</div>
		<br>
		<table cellspacing="0" border="0">
			<tr>
				<th><label for="staff_outreach_advocacy_information"><h2>Was advocacy information presented?</h2></label></th>
				<td>
					<div class="buttonset">
						<?php echo form_radio(array('name' => 'staff_outreach_advocacy_information', 'value' => 'Yes', 'id' => 'staff_outreach_advocacy_information1', 'checked' => 'checked')); ?><label for="staff_outreach_advocacy_information1">Yes</label>
						<?php echo form_radio(array('name' => 'staff_outreach_advocacy_information', 'value' => 'No', 'id' => 'staff_outreach_advocacy_information2')); ?><label for="staff_outreach_advocacy_information2">No</label>
					</div>
				</td>
			</tr>
		</table>
		<table cellspacing="0" border="0">
			<tr>
				<th colspan="2" style="text-align: center;">SPA (Duplicated)</th>
				<th colspan="2" style="text-align: center;">Ethnicity (Duplicated)</th>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 1</th>
				<td><?php echo form_input('staff_outreach_spa1', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Caucasian</th>
				<td><?php echo form_input('staff_outreach_caucasian', 0, 'class="staff_outreach_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 2</th>
				<td><?php echo form_input('staff_outreach_spa2', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
				<th>Latino</th>
				<td><?php echo form_input('staff_outreach_latino', 0, 'class="staff_outreach_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 3</th>
				<td><?php echo form_input('staff_outreach_spa3', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
				<th>African American</th>
				<td><?php echo form_input('staff_outreach_african_american', 0, 'class="staff_outreach_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 4</th>
				<td><?php echo form_input('staff_outreach_spa4', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
				<th>API</th>
				<td><?php echo form_input('staff_outreach_api', 0, 'class="staff_outreach_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 5</th>
				<td><?php echo form_input('staff_outreach_spa5', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
				<th>Other Ethnicities</th>
				<td><?php echo form_input('staff_outreach_other_ethnicities', 0, 'class="staff_outreach_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 6</th>
				<td><?php echo form_input('staff_outreach_spa6', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
				<th>Unknown</th>
				<td><?php echo form_input('staff_outreach_spa_unknown', 0, 'class="staff_outreach_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 7</th>
				<td colspan="3"><?php echo form_input('staff_outreach_spa7', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 8</th>
				<td colspan="3"><?php echo form_input('staff_outreach_spa8', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Coachella Valley</th>
				<td colspan="3"><?php echo form_input('staff_outreach_coachella_valley', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inland Empire</th>
				<td colspan="3"><?php echo form_input('staff_outreach_inland_empire', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Riverside County</th>
				<td colspan="3"><?php echo form_input('staff_outreach_riverside_county', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>San Bernandino</th>
				<td colspan="3"><?php echo form_input('staff_outreach_san_bernandino', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SW Riverside</th>
				<td colspan="3"><?php echo form_input('staff_outreach_sw_riverside', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inyo</th>
				<td colspan="3"><?php echo form_input('staff_outreach_inyo', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Mono</th>
				<td colspan="3"><?php echo form_input('staff_outreach_mono', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Kings</th>
				<td colspan="3"><?php echo form_input('staff_outreach_kings', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Tulare</th>
				<td colspan="3"><?php echo form_input('staff_outreach_tulare', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Out of Territory</th>
				<td colspan="3"><?php echo form_input('staff_outreach_out_of_territory', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Unknown</th>
				<td colspan="3"><?php echo form_input('staff_outreach_unknown', 0, 'class="staff_outreach_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA Total</th>
				<td><?php echo form_input('staff_outreach_spa_total', 0, 'id="staff_outreach_spa_total" style="width: auto" size="3"'); ?></td>
				<th>Ethnicity Total</th>
				<td><?php echo form_input('staff_outreach_ethnicity_total', 0, 'id="staff_outreach_ethnicity_total" style="width: auto" size="3"'); ?></td>
			</tr>
		</table>
	</div>
	<p><?php echo form_submit('save_outreach_event', 'Save Outreach Event'); ?></p>
</div>

<?php echo form_hidden('do_action', 'save_form'); ?>
<?php echo form_close(); ?>

<script type="text/javascript">
$(function() {
	$(':input').keyup(function() {
		var $t = $(this),
		total = 0,
		clss = $(this).attr('class'),
		total_field = $(':input[name="'+clss+'_total"]');

		$('.'+clss).each(function() 
		{
			if(is_numeric($(this).val()))
			{
				total += parseInt($(this).val());				
			}
		});
		
		total_field.val(total);
	});

	$("input[type=text]").click(function(e){
		// Select field contents
		this.select();
		e.preventDefault();
	});
});
</script>

<?php load_footer() ?>