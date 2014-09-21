<?php load_header() ?>
<h1>Update Safe Return</h1>

<?php echo form_open('lasrmetrics/safe_return/update/'.$ID) ?>
<div class="ui-block wide">
	<h3><a href="#">General Information</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th style="width: 420px;"><label for="office">Office</label></th>
				<td><?php echo form_dropdown('office', $locations, $office); ?></td>
			</tr>
			<tr>
				<th><label for="month">Month</label></th>
				<td><?php echo form_dropdown('month', getMonthList(), $month); ?></td>
			</tr>
			<tr>
				<th><label for="quarter">Quarter</label></th>
				<td><?php echo form_dropdown('quarter', array(1=>1,2,3,4), $quarter); ?></td>
			</tr>
			<tr>
				<th><label for="fiscial_year">Fiscal Year</label></th>
				<td><?php echo form_dropdown('fiscial_year', getYearList(), $fiscial_year); ?></td>
			</tr>
			<tr>
				<th><label for="num_sr_education_program_emergency_responders">Number of SR Education Program for Emergency Responders</label></th>
				<td><?php echo form_input('num_sr_emergency_responders', $num_sr_emergency_responders, 'style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th><label for="num_sr_education_emergency_responder_participants">Number of SR Education Emergency Responder Participants</label></th>
				<td><?php echo form_input('num_sr_education_emergency_responder_participants', $num_sr_education_emergency_responder_participants, 'style="width: auto;" size="3"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Scholarships</a></h3>
	<div>
		<div><label for=""><strong>Number of Scolarships total:</strong></label>&nbsp;&nbsp;<?php echo form_input('num_scholarships_total', $num_scholarships_total, 'style="width: auto;" size="3"'); ?></div>
		<br>
		<table cellspacing="0" border="0">
			<tr>
				<th colspan="2" style="text-align: center;">SPA (Unduplicated)</th>
				<th colspan="2" style="text-align: center;">Ethnicity (Unduplicated)</th>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 1</th>
				<td><?php echo form_input('scholar_spa1', $scholar_spa1, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Caucasian</th>
				<td><?php echo form_input('scholar_caucasian', $scholar_caucasian, 'class="scholar_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 2</th>
				<td><?php echo form_input('scholar_spa2', $scholar_spa2, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
				<th>Latino</th>
				<td><?php echo form_input('scholar_latino', $scholar_latino, 'class="scholar_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 3</th>
				<td><?php echo form_input('scholar_spa3', $scholar_spa3, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
				<th>African American</th>
				<td><?php echo form_input('scholar_african_american', $scholar_african_american, 'class="scholar_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 4</th>
				<td><?php echo form_input('scholar_spa4', $scholar_spa4, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
				<th>API</th>
				<td><?php echo form_input('scholar_api', $scholar_api, 'class="scholar_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 5</th>
				<td><?php echo form_input('scholar_spa5', $scholar_spa5, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
				<th>Other Ethnicities</th>
				<td><?php echo form_input('scholar_other_ethnicities', $scholar_other_ethnicities, 'class="scholar_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 6</th>
				<td><?php echo form_input('scholar_spa6', $scholar_spa6, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
				<th>Unknown</th>
				<td><?php echo form_input('scholar_unknown', $scholar_unknown, 'class="scholar_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 7</th>
				<td colspan="3"><?php echo form_input('scholar_spa7', $scholar_spa7, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 8</th>
				<td colspan="3"><?php echo form_input('scholar_spa8', $scholar_spa8, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Coachella Valley</th>
				<td colspan="3"><?php echo form_input('scholar_coachella_valley', $scholar_coachella_valley, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inland Empire</th>
				<td colspan="3"><?php echo form_input('scholar_inland_empire', $scholar_inland_empire, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Riverside County</th>
				<td colspan="3"><?php echo form_input('scholar_riverside_county', $scholar_riverside_county, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>San Bernandino</th>
				<td colspan="3"><?php echo form_input('scholar_san_bernandino', $scholar_san_bernandino, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SW Riverside</th>
				<td colspan="3"><?php echo form_input('scholar_sw_riverside', $scholar_sw_riverside, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inyo</th>
				<td colspan="3"><?php echo form_input('scholar_inyo', $scholar_inyo, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Mono</th>
				<td colspan="3"><?php echo form_input('scholar_mono', $scholar_mono, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Kings</th>
				<td colspan="3"><?php echo form_input('scholar_kings', $scholar_kings, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Tulare</th>
				<td colspan="3"><?php echo form_input('scholar_tulare', $scholar_tulare, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Out of Territory</th>
				<td colspan="3"><?php echo form_input('scholar_out_of_territory', $scholar_out_of_territory, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Unknown</th>
				<td colspan="3"><?php echo form_input('scholar_unknown', $scholar_unknown, 'class="scholar_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA Total</th>
				<td><?php echo form_input('scholar_spa_total', $scholar_spa_total, 'id="scholar_spa_total" style="width: auto" size="3" disabled="disabled"'); ?></td>
				<th>Ethnicity Total</th>
				<td><?php echo form_input('scholar_ethnicity_total', $scholar_ethnicity_total, 'id="scholar_ethnicity_total" style="width: auto" size="3" disabled="disabled"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">SR Registrations</a></h3>
	<div>
		<div>
			<label for=""><strong>Number of SR Registrations - total:</strong></label>&nbsp;&nbsp;<?php echo form_input('num_sr_reg_istrations_total', $num_sr_reg_istrations_total, 'style="width: auto;" size="3"'); ?><br>
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
				<td><?php echo form_input('sr_reg_spa1', $sr_reg_spa1, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Caucasian</th>
				<td><?php echo form_input('sr_reg_caucasian', $sr_reg_caucasian, 'class="sr_reg_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 2</th>
				<td><?php echo form_input('sr_reg_spa2', $sr_reg_spa2, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
				<th>Latino</th>
				<td><?php echo form_input('sr_reg_latino', $sr_reg_latino, 'class="sr_reg_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 3</th>
				<td><?php echo form_input('sr_reg_spa3', $sr_reg_spa3, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
				<th>African American</th>
				<td><?php echo form_input('sr_reg_african_american', $sr_reg_african_american, 'class="sr_reg_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 4</th>
				<td><?php echo form_input('sr_reg_spa4', $sr_reg_spa4, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
				<th>API</th>
				<td><?php echo form_input('sr_reg_api', $sr_reg_api, 'class="sr_reg_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 5</th>
				<td><?php echo form_input('sr_reg_spa5', $sr_reg_spa5, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
				<th>Other Ethnicities</th>
				<td><?php echo form_input('sr_reg_other_ethnicities', $sr_reg_other_ethnicities, 'class="sr_reg_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 6</th>
				<td><?php echo form_input('sr_reg_spa6', $sr_reg_spa6, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
				<th>Unknown</th>
				<td><?php echo form_input('sr_reg_unknown', $sr_reg_unknown, 'class="sr_reg_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 7</th>
				<td colspan="3"><?php echo form_input('sr_reg_spa7', $sr_reg_spa7, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 8</th>
				<td colspan="3"><?php echo form_input('sr_reg_spa8', $sr_reg_spa8, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Coachella Valley</th>
				<td colspan="3"><?php echo form_input('sr_reg_coachella_valley', $sr_reg_coachella_valley, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inland Empire</th>
				<td colspan="3"><?php echo form_input('sr_reg_inland_empire', $sr_reg_inland_empire, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Riverside County</th>
				<td colspan="3"><?php echo form_input('sr_reg_riverside_county', $sr_reg_riverside_county, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>San Bernandino</th>
				<td colspan="3"><?php echo form_input('sr_reg_san_bernandino', $sr_reg_san_bernandino, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SW Riverside</th>
				<td colspan="3"><?php echo form_input('sr_reg_sw_riverside', $sr_reg_sw_riverside, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inyo</th>
				<td colspan="3"><?php echo form_input('sr_reg_inyo', $sr_reg_inyo, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Mono</th>
				<td colspan="3"><?php echo form_input('sr_reg_mono', $sr_reg_mono, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Kings</th>
				<td colspan="3"><?php echo form_input('sr_reg_kings', $sr_reg_kings, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Tulare</th>
				<td colspan="3"><?php echo form_input('sr_reg_tulare', $sr_reg_tulare, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Out of Territory</th>
				<td colspan="3"><?php echo form_input('sr_reg_out_of_territory', $sr_reg_out_of_territory, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Unknown</th>
				<td colspan="3"><?php echo form_input('sr_reg_unknown_spa', $sr_reg_unknown_spa, 'class="sr_reg_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA Total</th>
				<td><?php echo form_input('sr_reg_spa_total', $sr_reg_spa_total, 'id="sr_reg_spa_total" style="width: auto" size="3" disabled="disabled"'); ?></td>
				<th>Ethnicity Total</th>
				<td><?php echo form_input('sr_reg_ethnicity_total', $sr_reg_ethnicity_total, 'id="sr_reg_ethnicity_total" style="width: auto" size="3" disabled="disabled"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">SR Wandering Events</a></h3>
	<div>
		<div>
			<label for=""><strong>Number of SR Wandering Events - total:</strong></label>&nbsp;&nbsp;<?php echo form_input('num_sr_wandering_total', $num_sr_wandering_total, 'style="width: auto;" size="3"'); ?><br>
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
				<td><?php echo form_input('sr_wandering_spa1', $sr_wandering_spa1, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Caucasian</th>
				<td><?php echo form_input('sr_wandering_caucasian', $sr_wandering_caucasian, 'class="sr_wandering_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 2</th>
				<td><?php echo form_input('sr_wandering_spa2', $sr_wandering_spa2, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
				<th>Latino</th>
				<td><?php echo form_input('sr_wandering_latino', $sr_wandering_latino, 'class="sr_wandering_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 3</th>
				<td><?php echo form_input('sr_wandering_spa3', $sr_wandering_spa3, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
				<th>African American</th>
				<td><?php echo form_input('sr_wandering_african_american', $sr_wandering_african_american, 'class="sr_wandering_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 4</th>
				<td><?php echo form_input('sr_wandering_spa4', $sr_wandering_spa4, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
				<th>API</th>
				<td><?php echo form_input('sr_wandering_api', $sr_wandering_api, 'class="sr_wandering_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 5</th>
				<td><?php echo form_input('sr_wandering_spa5', $sr_wandering_spa5, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
				<th>Other Ethnicities</th>
				<td><?php echo form_input('sr_wandering_other_ethnicities', $sr_wandering_other_ethnicities, 'class="sr_wandering_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 6</th>
				<td><?php echo form_input('sr_wandering_spa6', $sr_wandering_spa6, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
				<th>Unknown</th>
				<td><?php echo form_input('sr_wandering_unknown', $sr_wandering_unknown, 'class="sr_wandering_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 7</th>
				<td colspan="3"><?php echo form_input('sr_wandering_spa7', $sr_wandering_spa7, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 8</th>
				<td colspan="3"><?php echo form_input('sr_wandering_spa8', $sr_wandering_spa8, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Coachella Valley</th>
				<td colspan="3"><?php echo form_input('sr_wandering_coachella_valley', $sr_wandering_coachella_valley, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inland Empire</th>
				<td colspan="3"><?php echo form_input('sr_wandering_inland_empire', $sr_wandering_inland_empire, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Riverside County</th>
				<td colspan="3"><?php echo form_input('sr_wandering_riverside_county', $sr_wandering_riverside_county, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>San Bernandino</th>
				<td colspan="3"><?php echo form_input('sr_wandering_san_bernandino', $sr_wandering_san_bernandino, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SW Riverside</th>
				<td colspan="3"><?php echo form_input('sr_wandering_sw_riverside', $sr_wandering_sw_riverside, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inyo</th>
				<td colspan="3"><?php echo form_input('sr_wandering_inyo', $sr_wandering_inyo, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Mono</th>
				<td colspan="3"><?php echo form_input('sr_wandering_mono', $sr_wandering_mono, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Kings</th>
				<td colspan="3"><?php echo form_input('sr_wandering_kings', $sr_wandering_kings, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Tulare</th>
				<td colspan="3"><?php echo form_input('sr_wandering_tulare', $sr_wandering_tulare, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Out of Territory</th>
				<td colspan="3"><?php echo form_input('sr_wandering_out_of_territory', $sr_wandering_out_of_territory, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Unknown</th>
				<td colspan="3"><?php echo form_input('sr_wandering_unknown_spa', $sr_wandering_unknown_spa, 'class="sr_wandering_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA Total</th>
				<td><?php echo form_input('sr_wandering_spa_total', $sr_wandering_spa_total, 'id="sr_wandering_spa_total" style="width: auto" size="3" disabled="disabled"'); ?></td>
				<th>Ethnicity Total</th>
				<td><?php echo form_input('sr_wandering_ethnicity_total', $sr_wandering_ethnicity_total, 'id="sr_wandering_ethnicity_total" style="width: auto" size="3" disabled="disabled"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Missing Events</a></h3>
	<div>
		<div>
			<label for=""><strong>Number of Missing Events - total:</strong></label>&nbsp;&nbsp;<?php echo form_input('num_missing_total', $num_missing_total, 'style="width: auto;" size="3"'); ?>
		</div>
		<br>
		<table cellspacing="0" border="0">
			<tr>
				<th colspan="2" style="text-align: center;">SPA (Duplicated)</th>
				<th colspan="2" style="text-align: center;">Ethnicity (Duplicated)</th>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 1</th>
				<td><?php echo form_input('missing_spa1', $missing_spa1, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Caucasian</th>
				<td><?php echo form_input('missing_caucasian', $missing_caucasian, 'class="missing_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 2</th>
				<td><?php echo form_input('missing_spa2', $missing_spa2, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
				<th>Latino</th>
				<td><?php echo form_input('missing_latino', $missing_latino, 'class="missing_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 3</th>
				<td><?php echo form_input('missing_spa3', $missing_spa3, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
				<th>African American</th>
				<td><?php echo form_input('missing_african_american', $missing_african_american, 'class="missing_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 4</th>
				<td><?php echo form_input('missing_spa4', $missing_spa4, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
				<th>API</th>
				<td><?php echo form_input('missing_api', $missing_api, 'class="missing_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 5</th>
				<td><?php echo form_input('missing_spa5', $missing_spa5, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
				<th>Other Ethnicities</th>
				<td><?php echo form_input('missing_other_ethnicities', $missing_other_ethnicities, 'class="missing_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 6</th>
				<td><?php echo form_input('missing_spa6', $missing_spa6, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
				<th>Unknown</th>
				<td><?php echo form_input('missing_unknown', $missing_unknown, 'class="missing_ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 7</th>
				<td colspan="3"><?php echo form_input('missing_spa7', $missing_spa7, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA 8</th>
				<td colspan="3"><?php echo form_input('missing_spa8', $missing_spa8, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Coachella Valley</th>
				<td colspan="3"><?php echo form_input('missing_coachella_valley', $missing_coachella_valley, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inland Empire</th>
				<td colspan="3"><?php echo form_input('missing_inland_empire', $missing_inland_empire, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Riverside County</th>
				<td colspan="3"><?php echo form_input('missing_riverside_county', $missing_riverside_county, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>San Bernandino</th>
				<td colspan="3"><?php echo form_input('missing_san_bernandino', $missing_san_bernandino, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SW Riverside</th>
				<td colspan="3"><?php echo form_input('missing_sw_riverside', $missing_sw_riverside, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Inyo</th>
				<td colspan="3"><?php echo form_input('missing_inyo', $missing_inyo, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Mono</th>
				<td colspan="3"><?php echo form_input('missing_mono', $missing_mono, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Kings</th>
				<td colspan="3"><?php echo form_input('missing_kings', $missing_kings, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Tulare</th>
				<td colspan="3"><?php echo form_input('missing_tulare', $missing_tulare, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Out of Territory</th>
				<td colspan="3"><?php echo form_input('missing_out_of_territory', $missing_out_of_territory, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Unknown</th>
				<td colspan="3"><?php echo form_input('missing_unknown_spa', $missing_unknown_spa, 'class="missing_spa" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>SPA Total</th>
				<td><?php echo form_input('missing_spa_total', $missing_spa_total, 'id="missing_spa_total" style="width: auto" size="3" disabled="disabled"'); ?></td>
				<th>Ethnicity Total</th>
				<td><?php echo form_input('missing_ethnicity_total', $missing_ethnicity_total, 'id="missing_ethnicity_total" style="width: auto" size="3" disabled="disabled"'); ?></td>
			</tr>
		</table>
	</div>
	<p><?php echo form_submit('update_form', 'Update Safe Return'); ?></p>
</div>
<?php echo form_hidden('do_action', 'update_form'); ?>
<?php echo form_close(); ?>
<?php load_footer() ?>