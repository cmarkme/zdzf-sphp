<?php load_header() ?>
<h1>Care Consultation Data by county</h1>

<?php echo form_open('lasrmetrics/care_consultation/new') ?>
<div class="ui-block wide">
	<h3><a href="#">General Information</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th><label for="created_by">Created By</label></th>
				<td><?php echo form_dropdown('created_by', $staff, '', 'class="required"'); ?></td>
			</tr>
			<tr>
				<th style="width: 330px;">
					<label for="office">Office</label><br />
					(care consultatn's location / office)
				</th>
				<td><?php echo form_dropdown('office', $locations); ?></td>
			</tr>
			<tr>
				<th><label for="date">Date</label></th>
				<td><?php echo form_input('event_date', '','class="datepicker"'); ?></td>
			</tr>
			<tr>
				<th><label for="month">Month</label></th>
				<td><?php echo form_dropdown('month', getMonthList()); ?></td>
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
				<th style="vertical-align: top; padding-top: 3px;"><label for="early_stage_care_consultation">Is this an Early Stage Care Consultation?</label></th>
				<td>
					<div class="buttonset">
						<?php echo form_radio(array('name' => 'early_stage_care_consultation', 'value' => 'Yes', 'id' => 'early_stage_care_consultation1', 'checked' => 'checked')); ?><label for="early_stage_care_consultation1">Yes</label>
						<?php echo form_radio(array('name' => 'early_stage_care_consultation', 'value' => 'No', 'id' => 'early_stage_care_consultation2')); ?><label for="early_stage_care_consultation2">No</label>
					</div>
				</td>
			</tr>
			<tr>
				<th><label for="care_level">Level Type</label></th>
				<td><?php echo form_dropdown('care_level', $care_levels); ?></td>
			</tr>
			<tr>
				<th style="width: 330px;"><label for="num_care_consultations">
					Total Number of Care Consultations <small class="normal">(contacts)</small>:</label>
					<div class="normal"><i>
						Care consultations are defined as one contact by <br>
						telephone, email, in person. Total number of <br>
						contacts for duplicated and unduplicated cliends in<br>
						the reporting period.
					</i></div>
				</th>
				<td><?php echo form_input('num_care_consultations', 0, 'rel="num_only" style="width: auto;" size="3"') ?></td>
			</tr>
			<tr>
				<th style="width: 330px;"><label for="num_undup_care_consultations">
					Number of Unduplicated Care consultations:</label>
					<div class="normal"><i>
						(New clients this fiscal year). New Clients = Total of<br>
						1) New clients 2)old clients who have received care<br>
						consultations for the first time in a new fiscal year - in<br>
						this reporting period
					</i></div>
				</th>
				<td><?php echo form_input('num_undup_care_consultations', 0, 'rel="num_only" style="width: auto;" size="3"') ?></td>
			</tr>
			<tr>
				<th style="width: 330px;"><label for="num_cc_in_person">
					Number of CC In-person:</label>
					<div class="normal"><i>
						(total number of in person care consultations-<br>
						home or office visits - in this reporting period)
					</i></div>
				</th>
				<td><?php echo form_input('num_cc_in_person', 0, 'rel="num_only" style="width: auto;" size="3"') ?></td>
			</tr>
			<tr>
				<th style="width: 330px;"><label for="num_cc_by_phone">
					Number of CC In-person:</label>
					<div class="normal"><i>
						(total number of care consultation by phone this reporting period)
					</i></div>
				</th>
				<td><?php echo form_input('num_cc_by_phone', 0, 'rel="num_only" style="width: auto;" size="3"') ?></td>
			</tr>
			<tr>
				<th style="width: 330px;"><label for="num_cc_by_email_letter">
					Number of CC by email / letter:</label>
					<div class="normal"><i>
						(total number of care consultations provided via email in this reporting period)
					</i></div>
				</th>
				<td><?php echo form_input('num_cc_by_email_letter', 0, 'rel="num_only" style="width: auto;" size="3"') ?></td>
			</tr>
			<tr>
				<th style="width: 330px;"><label for="num_cc_hrs_provided">
					Number of Care Consultation Hrs Provided:</label>
					<div class="normal"><i>
						Total number of care consultation hours provided<br />
						during reporting period.<br>
						How contacts are logged:<br>
						the first contact with client, when a client file is<br>
						created with assessment @ care plan= 2 hours. for<br>
						all subsequent contacts (re-assessments, care plans,<br>
						follow-up/case monitoring, service authorization):
						one contact = one  hour
					</i></div>
				</th>
				<td><?php echo form_input('num_cc_hrs_provided', 0, 'rel="num_only" style="width: auto;" size="3"') ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Contact by County</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th colspan="2" style="text-align: center;">
				Duplicated and Unduplicated
				<div class="normal">
					total number of care consultations contacts by<br>
					service area / country
				</div>
				</th>
				<th colspan="2" style="text-align: center;">
					Unduplicated Only
					<div class="normal">
						New Clients this fiscal year by service area / county
					</div>
				</th>
			</tr>
			<tr>
				<th style="width: 150px;">Wilshire</th>
				<td><?php echo form_input('d_wilshire', 0, 'rel="num_only" class="dup_los_angeles" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Wilshire</th>
				<td><?php echo form_input('und_wilshire', 0, 'rel="num_only" class="undup_los_angeles" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">CSUN</th>
				<td><?php echo form_input('d_csun', 0, 'rel="num_only" class="dup_los_angeles" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">CSUN</th>
				<td><?php echo form_input('und_csun', 0, 'rel="num_only" class="undup_los_angeles" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">GELA</th>
				<td><?php echo form_input('d_gela', 0, 'rel="num_only" class="dup_los_angeles" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">GELA</th>
				<td><?php echo form_input('und_gela', 0, 'rel="num_only" class="undup_los_angeles" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Los Angeles County</th>
				<td><?php echo form_input('dup_los_angeles_total', 0, 'rel="num_only" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Los Angeles County</th>
				<td><?php echo form_input('undup_los_angeles_total', 0, 'rel="num_only" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 1</th>
				<td><?php echo form_input('d_spa_1', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">SPA 1</th>
				<td><?php echo form_input('und_spa_1', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 2</th>
				<td><?php echo form_input('d_spa_2', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">SPA 2</th>
				<td><?php echo form_input('und_spa_2', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 3</th>
				<td><?php echo form_input('d_spa_3', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">SPA 3</th>
				<td><?php echo form_input('und_spa_3', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 4</th>
				<td><?php echo form_input('d_spa_4', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">SPA 4</th>
				<td><?php echo form_input('und_spa_4', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 5</th>
				<td><?php echo form_input('d_spa_5', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">SPA 5</th>
				<td><?php echo form_input('und_spa_5', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 6</th>
				<td><?php echo form_input('d_spa_6', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">SPA 6</th>
				<td><?php echo form_input('und_spa_6', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 7</th>
				<td><?php echo form_input('d_spa_7', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">SPA 7</th>
				<td><?php echo form_input('und_spa_7', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 8</th>
				<td><?php echo form_input('d_spa_8', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">SPA 8</th>
				<td><?php echo form_input('und_spa_8', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">San Bernandino County</th>
				<td><?php echo form_input('d_san_bernandino_county', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">San Bernandino County</th>
				<td><?php echo form_input('und_san_bernandino_county', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Riverside County</th>
				<td><?php echo form_input('d_riverside_county', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Riverside County</th>
				<td><?php echo form_input('und_riverside_county', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Kings Countyn</th>
				<td><?php echo form_input('d_kings_county', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Kings County</th>
				<td><?php echo form_input('und_kings_county', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Tulare Conty</th>
				<td><?php echo form_input('d_tulare_county', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Tulare Conty</th>
				<td><?php echo form_input('und_tulare_county', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Inyo County</th>
				<td><?php echo form_input('d_inyo_county', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Inyo County</th>
				<td><?php echo form_input('und_inyo_county', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Mono County</th>
				<td><?php echo form_input('d_mono_county', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Mono County</th>
				<td><?php echo form_input('und_mono_county', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Coachella Valley</th>
				<td><?php echo form_input('d_coachella_valley', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Coachella Valley</th>
				<td><?php echo form_input('und_coachella_valley', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Inland Empire</th>
				<td><?php echo form_input('d_inland_empire', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Inland Empire</th>
				<td><?php echo form_input('und_inland_empire', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Southwest Riverside</th>
				<td><?php echo form_input('d_southwest_riverside', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Southwest Riverside</th>
				<td><?php echo form_input('und_southwest_riverside', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Unknown</th>
				<td><?php echo form_input('d_unknown', 0, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Unknown</th>
				<td><?php echo form_input('und_unknown', 0, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>

			<tr>
				<th style="width: 150px;">
					<div class="normal">
						(note: Wilshire, Gela, Csun totals are not counted in the SPA total only SPA 1-8)
					</div>
					SPA Total
				</th>
				<td><?php echo form_input('spa_duplicated_total', 0, 'rel="num_only" class="spa_duplicated_total" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">
					<div class="normal">
						(note: Wilshire, Gela, Csun totals are not counted in the SPA total only SPA 1-8)
					</div>
					SPA Total
				</th>
				<td><?php echo form_input('spa_unduplicated_total', 0, 'rel="num_only" class="spa_unduplicated_total" style="width: auto" size="3"'); ?></td>
			</tr>
			
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Attendees By Ethnicity</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th colspan="2" style="text-align: center;">
				Duplicated and Unduplicated
				<div class="normal">
					total number of care consultations contacts by race /<br>
					ethnicity
				</div>
				</th>
				<th colspan="2" style="text-align: center;">
					Unduplicated Only
					<div class="normal">
						New Clients this fiscal year by race / ethnicity
					</div>
				</th>
			</tr>
			<tr>
				<th style="width: 150px;">A.I. / Alasken Native</th>
				<td><?php echo form_input('d_ai_alasken_native', 0, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">A.I. / Alasken Native</th>
				<td><?php echo form_input('und_ai_alasken_native', 0, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Asian Indian</th>
				<td><?php echo form_input('d_asian_indian', 0, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Asian Indian</th>
				<td><?php echo form_input('und_asian_indian', 0, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Black / Afrcn American</th>
				<td><?php echo form_input('d_afrcn_american', 0, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Black / Afrcn American</th>
				<td><?php echo form_input('und_afrcn_american', 0, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Chinese</th>
				<td><?php echo form_input('d_chinese', 0, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Chinese</th>
				<td><?php echo form_input('und_chinese', 0, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Cuban</th>
				<td><?php echo form_input('d_cuban', 0, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Cuban</th>
				<td><?php echo form_input('und_cuban', 0, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Filipino</th>
				<td><?php echo form_input('d_filipino', 0, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Filipino</th>
				<td><?php echo form_input('und_filipino', 0, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Japanese</th>
				<td><?php echo form_input('d_japanese', 0, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Japanese</th>
				<td><?php echo form_input('und_japanese', 0, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Korean</th>
				<td><?php echo form_input('d_korean', 0, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Korean</th>
				<td><?php echo form_input('und_korean', 0, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Mexican</th>
				<td><?php echo form_input('d_mexican', 0, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Mexican</th>
				<td><?php echo form_input('und_mexican', 0, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Hawaiian / Pacific Islndr</th>
				<td><?php echo form_input('d_hawaiian_pacific_islndr', 0, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Hawaiian / Pacific Islndr</th>
				<td><?php echo form_input('und_hawaiian_pacific_islndr', 0, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Puerto Rican</th>
				<td><?php echo form_input('d_puerto_rican', 0, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Puerto Rican</th>
				<td><?php echo form_input('und_puerto_rican', 0, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Vietnamese</th>
				<td><?php echo form_input('d_vietnamese', 0, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Vietnamese</th>
				<td><?php echo form_input('und_vietnamese', 0, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">White</th>
				<td><?php echo form_input('d_white', 0, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">White</th>
				<td><?php echo form_input('und_white', 0, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Asian</th>
				<td><?php echo form_input('d_other_asian', 0, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Asian</th>
				<td><?php echo form_input('und_other_asian', 0, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Hispanic / Latino</th>
				<td><?php echo form_input('d_other_hispanic_latino', 0, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Hispanic / Latino</th>
				<td><?php echo form_input('und_other_hispanic_latino', 0, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Two or More</th>
				<td><?php echo form_input('d_two_or_more_ethnicity', 0, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Two or More</th>
				<td><?php echo form_input('und_two_or_more_ethnicity', 0, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('d_other_ethnicity', 0, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('und_other_ethnicity', 0, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Ethnicity Total</th>
				<td><?php echo form_input('eth_duplicated_total', 0, 'rel="num_only" class="eth_duplicated_total" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Ethnicity Total</th>
				<td><?php echo form_input('eth_unduplicated_total', 0, 'rel="num_only" class="eth_unduplicated_total" style="width: auto" size="3"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Attendees By Referal Source</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th colspan="2" style="text-align: center;">
				Duplicated and Unduplicated
				<div class="normal">
					total number of care consultations contacts by<br>
					referal source
				</div>
				</th>
				<th colspan="2" style="text-align: center;">
					Unduplicated Only
					<div class="normal">
						New Clients this fiscal year by referal source
					</div>
				</th>
			</tr>
			<tr>
				<th style="width: 150px;">Newspaper</th>
				<td><?php echo form_input('d_newspaper', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Newspaper</th>
				<td><?php echo form_input('und_newspaper', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Magazine</th>
				<td><?php echo form_input('d_magazine', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Magazine</th>
				<td><?php echo form_input('und_magazine', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Radio</th>
				<td><?php echo form_input('d_radio', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Radio</th>
				<td><?php echo form_input('und_radio', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Television</th>
				<td><?php echo form_input('d_television', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Television</th>
				<td><?php echo form_input('und_television', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Billboard or Sign</th>
				<td><?php echo form_input('d_billboard_or_sign', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Billboard or Sign</th>
				<td><?php echo form_input('und_billboard_or_sign', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Yellow Pages</th>
				<td><?php echo form_input('d_yellow_pages', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Yellow Pages</th>
				<td><?php echo form_input('und_yellow_pages', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Relative</th>
				<td><?php echo form_input('d_relative', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Relative</th>
				<td><?php echo form_input('und_relative', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Friend</th>
				<td><?php echo form_input('d_ref_friend', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Friend</th>
				<td><?php echo form_input('und_ref_friend', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Co-worker or Supervisor</th>
				<td><?php echo form_input('d_coworker_or_supervisor', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Co-worker or Supervisor</th>
				<td><?php echo form_input('und_coworker_or_supervisor', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Doctor</th>
				<td><?php echo form_input('d_doctor', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Doctor</th>
				<td><?php echo form_input('und_doctor', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Nursing Home Staff</th>
				<td><?php echo form_input('d_nursing_home_staff', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Nursing Home Staff</th>
				<td><?php echo form_input('und_nursing_home_staff', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Health Prfessional</th>
				<td><?php echo form_input('d_other_health_professional', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Health Prfessional</th>
				<td><?php echo form_input('und_other_health_professional', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Alz. Association Staff / Program</th>
				<td><?php echo form_input('d_alz_assoc_staff_program', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Alz. Association Staff / Program</th>
				<td><?php echo form_input('und_alz_assoc_staff_program', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Mailing(Home or Work)</th>
				<td><?php echo form_input('d_mailing', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Mailing(Home or Work)</th>
				<td><?php echo form_input('und_mailing', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Saw Flyer / Brochure</th>
				<td><?php echo form_input('d_saw_flyer_brochure', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Saw Flyer / Brochure</th>
				<td><?php echo form_input('und_saw_flyer_brochure', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Email</th>
				<td><?php echo form_input('d_email', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Email</th>
				<td><?php echo form_input('und_email', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Website</th>
				<td><?php echo form_input('d_website', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Website</th>
				<td><?php echo form_input('und_website', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Health Fair</th>
				<td><?php echo form_input('d_health_fair', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Health Fair</th>
				<td><?php echo form_input('und_health_fair', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Telephone Call</th>
				<td><?php echo form_input('d_telephone_call', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Telephone Call</th>
				<td><?php echo form_input('und_telephone_call', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Don't Remember</th>
				<td><?php echo form_input('d_dont_remember', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Don't Remember</th>
				<td><?php echo form_input('und_dont_remember', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('d_ref_other', 0, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('und_ref_other', 0, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			
			<tr>
				<th style="width: 150px;">Source Total</th>
				<td><?php echo form_input('source_duplicated_total', 0, 'rel="num_only" class="source_duplicated_total" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Source Total</th>
				<td><?php echo form_input('source_unduplicated_total', 0, 'rel="num_only" class="source_unduplicated_total" style="width: auto" size="3"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Contacts by Relationship to the person with dementia</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th colspan="2" style="text-align: center;">
				Duplicated and Unduplicated
				<div class="normal">
					total number of care consultations contacts by<br>
					relationshiop
				</div>
				</th>
				<th colspan="2" style="text-align: center;">
					Unduplicated Only
					<div class="normal">
						New Clients this fiscal year by relationship
					</div>
				</th>
			</tr>
			<tr>
				<th style="width: 150px;">Person w/ Memory Problems</th>
				<td><?php echo form_input('d_person_w_memory_problems', 0, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Person w/ Memory Problems</th>
				<td><?php echo form_input('und_person_w_memory_problems', 0, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Spouse / Partner</th>
				<td><?php echo form_input('d_spouse_partner', 0, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Spouse / Partner</th>
				<td><?php echo form_input('und_spouse_partner', 0, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Daughter / Son</th>
				<td><?php echo form_input('d_daughter_son', 0, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Daughter / Son</th>
				<td><?php echo form_input('und_daughter_son', 0, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Sister / Brother</th>
				<td><?php echo form_input('d_sister_brother', 0, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Sister / Brother</th>
				<td><?php echo form_input('und_sister_brother', 0, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Grandchild</th>
				<td><?php echo form_input('d_grandchild', 0, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Grandchild</th>
				<td><?php echo form_input('und_grandchild', 0, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Friend</th>
				<td><?php echo form_input('d_friend', 0, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Friend</th>
				<td><?php echo form_input('und_friend', 0, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">In-Law</th>
				<td><?php echo form_input('d_inlaw', 0, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">In-Law</th>
				<td><?php echo form_input('und_inlaw', 0, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Relative</th>
				<td><?php echo form_input('d_other_relative', 0, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Relative</th>
				<td><?php echo form_input('und_other_relative', 0, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Healtcare / Community Service Provider</th>
				<td><?php echo form_input('d_healthcare_comm_service_provider', 0, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Healtcare / Community Service Provider</th>
				<td><?php echo form_input('und_healthcare_comm_service_provider', 0, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">other</th>
				<td><?php echo form_input('d_other', 0, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">other</th>
				<td><?php echo form_input('und_other', 0, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			
			<tr>
				<th style="width: 150px;">Source Total</th>
				<td><?php echo form_input('relationship_duplicated_total', 0, 'rel="num_only" class="relationship_duplicated_total" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Source Total</th>
				<td><?php echo form_input('relationship_unduplicated_total', 0, 'rel="num_only" class="relationship_unduplicated_total" style="width: auto" size="3"'); ?></td>
			</tr>
		</table>
	</div>
	<p><?php echo form_submit('save_care_consultation', 'Save Care Consultation'); ?></p>
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
			val = parseFloat($(this).val());
			if(is_numeric(val))
			{
				total += val;				
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