<?php load_header() ?>
<h1>Engagement Program Data</h1>

<div id="notice">
	* Each regional office is responsible for entering all data <br>
	for affiliated support groups in there region.
</div>

<?php echo form_open('lasrmetrics/engagement_program/new') ?>
<div class="ui-block wide">
	<h3><a href="#">General Information</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th><label for="created_by">Created By</label></th>
				<td><?php echo form_dropdown('created_by', $staff, '', 'class="required"'); ?></td>
			</tr>
			<tr>
				<th><label for="office">Office</label></th>
				<td><?php echo form_dropdown('office', $locations); ?></td>
			</tr>
			<tr>
				<th><label for="quarter">Quarter</label></th>
				<td><?php echo form_dropdown('quarter', array(1=>1,2,3,4)); ?></td>
			</tr>
			<tr>
				<th><label for="fiscial_year">Fiscal Year</label></th>
				<td><?php echo form_dropdown('fiscial_year', getYearList()); ?></td>
			</tr>
			<tr>
				<th><label for="name_of_program">Name of Program</label></th>
				<td><?php echo form_input('name_of_program', ''); ?></td>
			</tr>
			<tr>
				<th><label for="name_of_activity">Name of Activity</label></th>
				<td><?php echo form_input('name_of_activity', ''); ?></td>
			</tr>
			<tr>
				<th><label for="group_type">Program Type</label></th>
				<td><?php echo form_dropdown('group_type', $engagement_types); ?></td>
			</tr>
			<tr>
				<th><label for="support_group_county">Program Group County</label></th>
				<td><?php echo form_dropdown('support_group_county', $counties); ?></td>
			</tr>
			<tr>
				<th>
					<label for="num_duplicate_attendees">Total Number of Duplicate Attendees</label><br>
					<small>(Please match this number to the Duplicated Sections Below)</small>
				</th>
				<td><?php echo form_input('num_duplicate_attendees'); ?></td>
			</tr>
			<tr>
				<th>
					<label for="num_first_time_attendees">Number of First Time Attendees</label><br>
					<small>(Please match this number to the Unduplicated sections below</small>
				</th>
				<td><?php echo form_input('num_first_time_attendees'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Attendees By Race / Ethnicity</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th colspan="2" style="text-align: center;">Duplicated</th>
				<th colspan="2" style="text-align: center;">Unduplicated</th>
			</tr>
			<tr>
				<th style="width: 150px;">A.I. / Alasken Native</th>
				<td><?php echo form_input('d_ai_alasken_native', 0, 'class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">A.I. / Alasken Native</th>
				<td><?php echo form_input('und_ai_alasken_native', 0, 'class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Asian Indian</th>
				<td><?php echo form_input('d_asian_indian', 0, 'class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Asian Indian</th>
				<td><?php echo form_input('und_asian_indian', 0, 'class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Black / Afrcn American</th>
				<td><?php echo form_input('d_afrcn_american', 0, 'class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Black / Afrcn American</th>
				<td><?php echo form_input('und_afrcn_american', 0, 'class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Chinese</th>
				<td><?php echo form_input('d_chinese', 0, 'class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Chinese</th>
				<td><?php echo form_input('und_chinese', 0, 'class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Cuban</th>
				<td><?php echo form_input('d_cuban', 0, 'class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Cuban</th>
				<td><?php echo form_input('und_cuban', 0, 'class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Filipino</th>
				<td><?php echo form_input('d_filipino', 0, 'class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Filipino</th>
				<td><?php echo form_input('und_filipino', 0, 'class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Japanese</th>
				<td><?php echo form_input('d_japanese', 0, 'class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Japanese</th>
				<td><?php echo form_input('und_japanese', 0, 'class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Korean</th>
				<td><?php echo form_input('d_korean', 0, 'class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Korean</th>
				<td><?php echo form_input('und_korean', 0, 'class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Mexican</th>
				<td><?php echo form_input('d_mexican', 0, 'class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Mexican</th>
				<td><?php echo form_input('und_mexican', 0, 'class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Hawaiian / Pacific Islndr</th>
				<td><?php echo form_input('d_hawaiian_pacific_islndr', 0, 'class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Hawaiian / Pacific Islndr</th>
				<td><?php echo form_input('und_hawaiian_pacific_islndr', 0, 'class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Puerto Rican</th>
				<td><?php echo form_input('d_puerto_rican', 0, 'class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Puerto Rican</th>
				<td><?php echo form_input('und_puerto_rican', 0, 'class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Vietnamese</th>
				<td><?php echo form_input('d_vietnamese', 0, 'class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Vietnamese</th>
				<td><?php echo form_input('und_vietnamese', 0, 'class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">White</th>
				<td><?php echo form_input('d_white', 0, 'class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">White</th>
				<td><?php echo form_input('und_white', 0, 'class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Asian</th>
				<td><?php echo form_input('d_other_asian', 0, 'class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Asian</th>
				<td><?php echo form_input('und_other_asian', 0, 'class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Hispanic / Latino</th>
				<td><?php echo form_input('d_other_hispanic_latino', 0, 'class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Hispanic / Latino</th>
				<td><?php echo form_input('und_other_hispanic_latino', 0, 'class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Two or More</th>
				<td><?php echo form_input('d_two_or_more_ethnicity', 0, 'class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Two or More</th>
				<td><?php echo form_input('und_two_or_more_ethnicity', 0, 'class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('d_other_ethnicity', 0, 'class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('und_other_ethnicity', 0, 'class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
		</table>
	</div>
	<p><?php echo form_submit('save_form', 'Save Engagement Program Data'); ?></p>
</div>

<?php echo form_hidden('do_action', 'save_form'); ?>
<?php echo form_close(); ?>
<?php load_footer() ?>