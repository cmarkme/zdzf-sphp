<?php load_header() ?>
<h1>Safe Return</h1>

<?php echo form_open('lasrmetrics/safe_return/new') ?>
<div class="ui-block wide">
	<h3><a href="#">General Information</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th><label for="created_by">Created By</label></th>
				<td><?php echo form_dropdown('created_by', $staff, '', 'class="required"'); ?></td>
			</tr>
			<tr>
				<th style="width: 420px;"><label for="office">Office</label></th>
				<td><?php echo form_dropdown('office', $locations); ?></td>
			</tr>
			<tr>
				<th><label for="month">Month</label></th>
				<td><?php echo form_dropdown('month', getMonthList()); ?></td>
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
				<th><label for="num_sr_education_program_emergency_responders">Number of SR Education Program for Emergency Responders</label></th>
				<td><?php echo form_input('num_sr_emergency_responders', 0, 'rel="num_only" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th><label for="num_sr_education_emergency_responder_participants">Number of SR Education Emergency Responder Participants</label></th>
				<td><?php echo form_input('num_sr_education_emergency_responder_participants', 0, 'rel="num_only" style="width: auto;" size="3"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Scholarships</a></h3>
	<div>
		<div><label for=""><strong>Number of Scolarships total:</strong></label>&nbsp;&nbsp;<?php echo form_input('num_scholarships_total', 0, 'rel="num_only" style="width: auto;" size="3"'); ?></div>
		<br>
		<table cellspacing="0" border="0">
			<tr>
				<th colspan="2" style="text-align: center;">SPA (Unduplicated)</th>
				<th colspan="2" style="text-align: center;">Ethnicity (Unduplicated)</th>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 1</th>
				<td><?php echo form_input('scholar_spa1', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Caucasian</th>
				<td><?php echo form_input('scholar_caucasian', 0, 'rel="num_only" class="scholar_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 2</th>
				<td><?php echo form_input('scholar_spa2', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
				<th>Latino</th>
				<td><?php echo form_input('scholar_latino', 0, 'rel="num_only" class="scholar_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 3</th>
				<td><?php echo form_input('scholar_spa3', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
				<th>African American</th>
				<td><?php echo form_input('scholar_african_american', 0, 'rel="num_only" class="scholar_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 4</th>
				<td><?php echo form_input('scholar_spa4', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
				<th>API</th>
				<td><?php echo form_input('scholar_api', 0, 'rel="num_only" class="scholar_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 5</th>
				<td><?php echo form_input('scholar_spa5', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
				<th>Other Ethnicities</th>
				<td><?php echo form_input('scholar_other_ethnicities', 0, 'rel="num_only" class="scholar_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 6</th>
				<td><?php echo form_input('scholar_spa6', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
				<th>Unknown</th>
				<td><?php echo form_input('scholar_unknown', 0, 'rel="num_only" class="scholar_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 7</th>
				<td colspan="3"><?php echo form_input('scholar_spa7', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 8</th>
				<td colspan="3"><?php echo form_input('scholar_spa8', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Coachella Valley</th>
				<td colspan="3"><?php echo form_input('scholar_coachella_valley', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inland Empire</th>
				<td colspan="3"><?php echo form_input('scholar_inland_empire', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Riverside County</th>
				<td colspan="3"><?php echo form_input('scholar_riverside_county', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>San Bernandino</th>
				<td colspan="3"><?php echo form_input('scholar_san_bernandino', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SW Riverside</th>
				<td colspan="3"><?php echo form_input('scholar_sw_riverside', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inyo</th>
				<td colspan="3"><?php echo form_input('scholar_inyo', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Mono</th>
				<td colspan="3"><?php echo form_input('scholar_mono', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Kings</th>
				<td colspan="3"><?php echo form_input('scholar_kings', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Tulare</th>
				<td colspan="3"><?php echo form_input('scholar_tulare', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Out of Territory</th>
				<td colspan="3"><?php echo form_input('scholar_out_of_territory', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Unknown</th>
				<td colspan="3"><?php echo form_input('scholar_unknown_spa', 0, 'rel="num_only" class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA Total</th>
				<td><?php echo form_input('scholar_spa_total', 0, 'rel="num_only" id="scholar_spa_total" style="width: auto" size="3"'); ?></td>
				<th>Ethnicity Total</th>
				<td><?php echo form_input('scholar_ethnicity_total', 0, 'rel="num_only" id="scholar_ethnicity_total" style="width: auto" size="3"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">SR Registrations</a></h3>
	<div>
		<div>
			<label for=""><strong>Number of SR Registrations - total:</strong></label>&nbsp;&nbsp;<?php echo form_input('num_sr_reg_istrations_total', 0, 'rel="num_only" style="width: auto;" size="3"'); ?><br>
			<small>Number of people who observed the resouce table <br>
				and viewed the sinage (estimated)</small>
		</div>
		<br>
		<table cellspacing="0" border="0">
			<tr>
				<th colspan="2" style="text-align: center;">SPA (Unduplicated)</th>
				<th colspan="2" style="text-align: center;">Ethnicity (Unduplicated)</th>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 1</th>
				<td><?php echo form_input('sr_reg_spa1', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Caucasian</th>
				<td><?php echo form_input('sr_reg_caucasian', 0, 'rel="num_only" class="sr_reg_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 2</th>
				<td><?php echo form_input('sr_reg_spa2', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
				<th>Latino</th>
				<td><?php echo form_input('sr_reg_latino', 0, 'rel="num_only" class="sr_reg_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 3</th>
				<td><?php echo form_input('sr_reg_spa3', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
				<th>African American</th>
				<td><?php echo form_input('sr_reg_african_american', 0, 'rel="num_only" class="sr_reg_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 4</th>
				<td><?php echo form_input('sr_reg_spa4', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
				<th>API</th>
				<td><?php echo form_input('sr_reg_api', 0, 'rel="num_only" class="sr_reg_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 5</th>
				<td><?php echo form_input('sr_reg_spa5', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
				<th>Other Ethnicities</th>
				<td><?php echo form_input('sr_reg_other_ethnicities', 0, 'rel="num_only" class="sr_reg_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 6</th>
				<td><?php echo form_input('sr_reg_spa6', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
				<th>Unknown</th>
				<td><?php echo form_input('sr_reg_unknown', 0, 'rel="num_only" class="sr_reg_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 7</th>
				<td colspan="3"><?php echo form_input('sr_reg_spa7', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 8</th>
				<td colspan="3"><?php echo form_input('sr_reg_spa8', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Coachella Valley</th>
				<td colspan="3"><?php echo form_input('sr_reg_coachella_valley', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inland Empire</th>
				<td colspan="3"><?php echo form_input('sr_reg_inland_empire', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Riverside County</th>
				<td colspan="3"><?php echo form_input('sr_reg_riverside_county', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>San Bernandino</th>
				<td colspan="3"><?php echo form_input('sr_reg_san_bernandino', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SW Riverside</th>
				<td colspan="3"><?php echo form_input('sr_reg_sw_riverside', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inyo</th>
				<td colspan="3"><?php echo form_input('sr_reg_inyo', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Mono</th>
				<td colspan="3"><?php echo form_input('sr_reg_mono', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Kings</th>
				<td colspan="3"><?php echo form_input('sr_reg_kings', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Tulare</th>
				<td colspan="3"><?php echo form_input('sr_reg_tulare', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Out of Territory</th>
				<td colspan="3"><?php echo form_input('sr_reg_out_of_territory', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Unknown</th>
				<td colspan="3"><?php echo form_input('sr_reg_unknown_spa', 0, 'rel="num_only" class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA Total</th>
				<td><?php echo form_input('sr_reg_spa_total', 0, 'rel="num_only" id="sr_reg_spa_total" style="width: auto" size="3"'); ?></td>
				<th>Ethnicity Total</th>
				<td><?php echo form_input('sr_reg_ethnicity_total', 0, 'rel="num_only" id="sr_reg_ethnicity_total" style="width: auto" size="3"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">SR Wandering Events</a></h3>
	<div>
		<div>
			<label for=""><strong>Number of SR Wandering Events - total:</strong></label>&nbsp;&nbsp;<?php echo form_input('num_sr_wandering_total', 0, 'rel="num_only" style="width: auto;" size="3"'); ?><br>
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
				<td><?php echo form_input('sr_wandering_spa1', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Caucasian</th>
				<td><?php echo form_input('sr_wandering_caucasian', 0, 'rel="num_only" class="sr_wandering_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 2</th>
				<td><?php echo form_input('sr_wandering_spa2', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
				<th>Latino</th>
				<td><?php echo form_input('sr_wandering_latino', 0, 'rel="num_only" class="sr_wandering_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 3</th>
				<td><?php echo form_input('sr_wandering_spa3', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
				<th>African American</th>
				<td><?php echo form_input('sr_wandering_african_american', 0, 'rel="num_only" class="sr_wandering_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 4</th>
				<td><?php echo form_input('sr_wandering_spa4', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
				<th>API</th>
				<td><?php echo form_input('sr_wandering_api', 0, 'rel="num_only" class="sr_wandering_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 5</th>
				<td><?php echo form_input('sr_wandering_spa5', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
				<th>Other Ethnicities</th>
				<td><?php echo form_input('sr_wandering_other_ethnicities', 0, 'rel="num_only" class="sr_wandering_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 6</th>
				<td><?php echo form_input('sr_wandering_spa6', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
				<th>Unknown</th>
				<td><?php echo form_input('sr_wandering_unknown', 0, 'rel="num_only" class="sr_wandering_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 7</th>
				<td colspan="3"><?php echo form_input('sr_wandering_spa7', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 8</th>
				<td colspan="3"><?php echo form_input('sr_wandering_spa8', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Coachella Valley</th>
				<td colspan="3"><?php echo form_input('sr_wandering_coachella_valley', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inland Empire</th>
				<td colspan="3"><?php echo form_input('sr_wandering_inland_empire', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Riverside County</th>
				<td colspan="3"><?php echo form_input('sr_wandering_riverside_county', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>San Bernandino</th>
				<td colspan="3"><?php echo form_input('sr_wandering_san_bernandino', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SW Riverside</th>
				<td colspan="3"><?php echo form_input('sr_wandering_sw_riverside', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inyo</th>
				<td colspan="3"><?php echo form_input('sr_wandering_inyo', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Mono</th>
				<td colspan="3"><?php echo form_input('sr_wandering_mono', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Kings</th>
				<td colspan="3"><?php echo form_input('sr_wandering_kings', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Tulare</th>
				<td colspan="3"><?php echo form_input('sr_wandering_tulare', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Out of Territory</th>
				<td colspan="3"><?php echo form_input('sr_wandering_out_of_territory', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Unknown</th>
				<td colspan="3"><?php echo form_input('sr_wandering_unknown_spa', 0, 'rel="num_only" class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA Total</th>
				<td><?php echo form_input('sr_wandering_spa_total', 0, 'rel="num_only" id="sr_wandering_spa_total" style="width: auto" size="3"'); ?></td>
				<th>Ethnicity Total</th>
				<td><?php echo form_input('sr_wandering_ethnicity_total', 0, 'rel="num_only" id="sr_wandering_ethnicity_total" style="width: auto" size="3"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Missing Events</a></h3>
	<div>
		<div>
			<label for=""><strong>Number of Missing Events - total:</strong></label>&nbsp;&nbsp;<?php echo form_input('num_missing_total', 0, 'rel="num_only" style="width: auto;" size="3"'); ?>
		</div>
		<br>
		<table cellspacing="0" border="0">
			<tr>
				<th colspan="2" style="text-align: center;">SPA (Duplicated)</th>
				<th colspan="2" style="text-align: center;">Ethnicity (Duplicated)</th>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 1</th>
				<td><?php echo form_input('missing_spa1', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Caucasian</th>
				<td><?php echo form_input('missing_caucasian', 0, 'rel="num_only" class="missing_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 2</th>
				<td><?php echo form_input('missing_spa2', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
				<th>Latino</th>
				<td><?php echo form_input('missing_latino', 0, 'rel="num_only" class="missing_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 3</th>
				<td><?php echo form_input('missing_spa3', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
				<th>African American</th>
				<td><?php echo form_input('missing_african_american', 0, 'rel="num_only" class="missing_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 4</th>
				<td><?php echo form_input('missing_spa4', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
				<th>API</th>
				<td><?php echo form_input('missing_api', 0, 'rel="num_only" class="missing_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 5</th>
				<td><?php echo form_input('missing_spa5', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
				<th>Other Ethnicities</th>
				<td><?php echo form_input('missing_other_ethnicities', 0, 'rel="num_only" class="missing_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 6</th>
				<td><?php echo form_input('missing_spa6', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
				<th>Unknown</th>
				<td><?php echo form_input('missing_unknown', 0, 'rel="num_only" class="missing_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 7</th>
				<td colspan="3"><?php echo form_input('missing_spa7', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 8</th>
				<td colspan="3"><?php echo form_input('missing_spa8', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Coachella Valley</th>
				<td colspan="3"><?php echo form_input('missing_coachella_valley', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inland Empire</th>
				<td colspan="3"><?php echo form_input('missing_inland_empire', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Riverside County</th>
				<td colspan="3"><?php echo form_input('missing_riverside_county', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>San Bernandino</th>
				<td colspan="3"><?php echo form_input('missing_san_bernandino', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SW Riverside</th>
				<td colspan="3"><?php echo form_input('missing_sw_riverside', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inyo</th>
				<td colspan="3"><?php echo form_input('missing_inyo', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Mono</th>
				<td colspan="3"><?php echo form_input('missing_mono', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Kings</th>
				<td colspan="3"><?php echo form_input('missing_kings', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Tulare</th>
				<td colspan="3"><?php echo form_input('missing_tulare', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Out of Territory</th>
				<td colspan="3"><?php echo form_input('missing_out_of_territory', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Unknown</th>
				<td colspan="3"><?php echo form_input('missing_unknown_spa', 0, 'rel="num_only" class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA Total</th>
				<td><?php echo form_input('missing_spa_total', 0, 'rel="num_only" id="missing_spa_total" style="width: auto" size="3"'); ?></td>
				<th>Ethnicity Total</th>
				<td><?php echo form_input('missing_ethnicity_total', 0, 'rel="num_only" id="missing_ethnicity_total" style="width: auto" size="3"'); ?></td>
			</tr>
		</table>
	</div>
	<p><?php echo form_submit('save_form', 'Save Safe Return'); ?></p>
</div>
<?php echo form_hidden('do_action', 'save_form'); ?>
<?php echo form_close(); ?>

<script type="text/javascript">
$(function() {
	$(':input').keyup(function() {
		var $t = $(this),
		total = 0,
		clss = $(this).attr('class'),
		total_field = $(':input[name="'+clss+'_total"]'),
		total_field2 = $(':input[name="'+total_field.attr('class')+'_total"]');

		$('.'+clss).each(function() 
		{
			if(is_numeric($(this).val()))
			{
				total += parseInt($(this).val());
			}
		});
		
		total_field.val(total);
		total_field2.val(total);
	});

	$("input[type=text]").click(function(e){
		// Select field contents
		this.select();
		e.preventDefault();
	});
});
</script>

<?php load_footer() ?>