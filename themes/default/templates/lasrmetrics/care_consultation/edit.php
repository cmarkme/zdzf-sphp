<?php load_header() ?>
<h1>Care Consultation Data by county</h1>

<?php echo form_open('lasrmetrics/care_consultation/new') ?>
<div class="ui-block wide">
	<h3><a href="#">General Information</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th><label for="created_by">Created By</label></th>
				<td><?php echo form_dropdown('created_by', $staff, $created_by, 'class="required"'); ?></td>
			</tr>
			<tr>
				<th style="width: 330px;">
					<label for="office">Office</label><br />
					(care consultatn's location / office)
				</th>
				<td><?php echo form_dropdown('office', $locations, $office); ?></td>
			</tr>
			<tr>
				<th><label for="date">Date</label></th>
				<td><?php echo form_input('event_date', date_for_display($event_date),'class="datepicker"'); ?></td>
			</tr>
			<tr>
				<th><label for="month">Month</label></th>
				<td><?php echo form_dropdown('month', getMonthList(), $month); ?></td>
			</tr>
			<tr>
				<th>
					<label for="quarter">Quarter</label><br />
					<div class="note">
						(current quarter: July-Sept = Q1; Oct-Dec = Q2;<br />
						Jan-Mar = Q3; April-June = Q4)
					</div>
				</th>
				<td><?php echo form_dropdown('quarter', array(1=>1,2,3,4), $quarter); ?></td>
			</tr>
			<tr>
				<th><label for="fiscial_year">Fiscal Year<br><small>(current fiscal year)</small></label></th>
				<td><?php echo form_dropdown('fiscial_year', getYearList(), $fiscial_year); ?></td>
			</tr>
			<tr>
				<th style="vertical-align: top; padding-top: 3px;"><label for="early_stage_care_consultation">Is this an Early Stage Care Consultation?</label></th>
				<td>
					<div class="buttonset">
						<?php echo form_radio(array('name' => 'early_stage_care_consultation', 'value' => 'Yes', 'id' => 'early_stage_care_consultation1', 'checked' => ($early_stage_care_consultation == 'Yes' ? 'checked' : ''))); ?><label for="early_stage_care_consultation1">Yes</label>
						<?php echo form_radio(array('name' => 'early_stage_care_consultation', 'value' => 'No', 'id' => 'early_stage_care_consultation2', 'checked' => ($early_stage_care_consultation == 'No' ? 'checked' : ''))); ?><label for="early_stage_care_consultation2">No</label>
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
				<td><?php echo form_input('num_care_consultations', $num_care_consultations, 'rel="num_only" style="width: auto;" size="3"') ?></td>
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
				<td><?php echo form_input('num_undup_care_consultations', $num_undup_care_consultations, 'rel="num_only" style="width: auto;" size="3"') ?></td>
			</tr>
			<tr>
				<th style="width: 330px;"><label for="num_cc_in_person">
					Number of CC In-person:</label>
					<div class="normal"><i>
						(total number of in person care consultations-<br>
						home or office visits - in this reporting period)
					</i></div>
				</th>
				<td><?php echo form_input('num_cc_in_person', $num_cc_in_person, 'rel="num_only" style="width: auto;" size="3"') ?></td>
			</tr>
			<tr>
				<th style="width: 330px;"><label for="num_cc_by_phone">
					Number of CC In-person:</label>
					<div class="normal"><i>
						(total number of care consultation by phone this reporting period)
					</i></div>
				</th>
				<td><?php echo form_input('num_cc_by_phone', $num_cc_by_phone, 'rel="num_only" style="width: auto;" size="3"') ?></td>
			</tr>
			<tr>
				<th style="width: 330px;"><label for="num_cc_by_email_letter">
					Number of CC by email / letter:</label>
					<div class="normal"><i>
						(total number of care consultations provided via email in this reporting period)
					</i></div>
				</th>
				<td><?php echo form_input('num_cc_by_email_letter', $num_cc_by_email_letter, 'rel="num_only" style="width: auto;" size="3"') ?></td>
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
				<td><?php echo form_input('num_cc_hrs_provided', $num_cc_hrs_provided, 'rel="num_only" style="width: auto;" size="3"') ?></td>
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
				<td><?php echo form_input('d_wilshire', $d_wilshire, 'rel="num_only" class="dup_los_angeles" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Wilshire</th>
				<td><?php echo form_input('und_wilshire', $und_wilshire, 'rel="num_only" class="undup_los_angeles" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">CSUN</th>
				<td><?php echo form_input('d_csun', $d_csun, 'rel="num_only" class="dup_los_angeles" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">CSUN</th>
				<td><?php echo form_input('und_csun', $und_csun, 'rel="num_only" class="undup_los_angeles" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">GELA</th>
				<td><?php echo form_input('d_gela', $d_gela, 'rel="num_only" class="dup_los_angeles" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">GELA</th>
				<td><?php echo form_input('und_gela', $und_gela, 'rel="num_only" class="undup_los_angeles" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Los Angeles County</th>
				<td><?php echo form_input('dup_los_angeles_total', $dup_los_angeles_total, 'rel="num_only" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Los Angeles County</th>
				<td><?php echo form_input('undup_los_angeles_total', $undup_los_angeles_total, 'rel="num_only" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 1</th>
				<td><?php echo form_input('d_spa_1', $d_spa_1, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">SPA 1</th>
				<td><?php echo form_input('und_spa_1', $und_spa_1, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 2</th>
				<td><?php echo form_input('d_spa_2', $d_spa_2, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">SPA 2</th>
				<td><?php echo form_input('und_spa_2', $und_spa_2, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 3</th>
				<td><?php echo form_input('d_spa_3', $d_spa_3, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">SPA 3</th>
				<td><?php echo form_input('und_spa_3', $und_spa_3, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 4</th>
				<td><?php echo form_input('d_spa_4', $d_spa_4, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">SPA 4</th>
				<td><?php echo form_input('und_spa_4', $und_spa_4, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 5</th>
				<td><?php echo form_input('d_spa_5', $d_spa_5, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">SPA 5</th>
				<td><?php echo form_input('und_spa_5', $und_spa_5, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 6</th>
				<td><?php echo form_input('d_spa_6', $d_spa_6, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">SPA 6</th>
				<td><?php echo form_input('und_spa_6', $und_spa_6, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 7</th>
				<td><?php echo form_input('d_spa_7', $d_spa_7, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">SPA 7</th>
				<td><?php echo form_input('und_spa_7', $und_spa_7, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 8</th>
				<td><?php echo form_input('d_spa_8', $d_spa_8, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">SPA 8</th>
				<td><?php echo form_input('und_spa_8', $und_spa_8, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">San Bernandino County</th>
				<td><?php echo form_input('d_san_bernandino_county', $d_san_bernandino_county, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">San Bernandino County</th>
				<td><?php echo form_input('und_san_bernandino_county', $und_san_bernandino_county, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Riverside County</th>
				<td><?php echo form_input('d_riverside_county', $d_riverside_county, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Riverside County</th>
				<td><?php echo form_input('und_riverside_county', $und_riverside_county, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Kings Countyn</th>
				<td><?php echo form_input('d_kings_county', $d_kings_county, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Kings County</th>
				<td><?php echo form_input('und_kings_county', $und_kings_county, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Tulare Conty</th>
				<td><?php echo form_input('d_tulare_county', $d_tulare_county, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Tulare Conty</th>
				<td><?php echo form_input('und_tulare_county', $und_tulare_county, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Inyo County</th>
				<td><?php echo form_input('d_inyo_county', $d_inyo_county, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Inyo County</th>
				<td><?php echo form_input('und_inyo_county', $und_inyo_county, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Mono County</th>
				<td><?php echo form_input('d_mono_county', $d_mono_county, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Mono County</th>
				<td><?php echo form_input('und_mono_county', $und_mono_county, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Coachella Valley</th>
				<td><?php echo form_input('d_coachella_valley', $d_coachella_valley, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Coachella Valley</th>
				<td><?php echo form_input('und_coachella_valley', $und_coachella_valley, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Inland Empire</th>
				<td><?php echo form_input('d_inland_empire', $d_inland_empire, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Inland Empire</th>
				<td><?php echo form_input('und_inland_empire', $und_inland_empire, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Southwest Riverside</th>
				<td><?php echo form_input('d_southwest_riverside', $d_southwest_riverside, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Southwest Riverside</th>
				<td><?php echo form_input('und_southwest_riverside', $und_southwest_riverside, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Unknown</th>
				<td><?php echo form_input('d_unknown', $d_unknown, 'rel="num_only" class="spa_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Unknown</th>
				<td><?php echo form_input('und_unknown', $und_unknown, 'rel="num_only" class="spa_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>

			<tr>
				<th style="width: 150px;">
					<div class="normal">
						(note: Wilshire, Gela, Csun totals are not counted in the SPA total only SPA 1-8)
					</div>
					SPA Total
				</th>
				<td><?php echo form_input('spa_duplicated_total', $spa_duplicated_total, 'rel="num_only" class="spa_duplicated_total" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">
					<div class="normal">
						(note: Wilshire, Gela, Csun totals are not counted in the SPA total only SPA 1-8)
					</div>
					SPA Total
				</th>
				<td><?php echo form_input('spa_unduplicated_total', $spa_unduplicated_total, 'rel="num_only" class="spa_unduplicated_total" style="width: auto" size="3"'); ?></td>
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
				<td><?php echo form_input('d_ai_alasken_native', $d_ai_alasken_native, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">A.I. / Alasken Native</th>
				<td><?php echo form_input('und_ai_alasken_native', $und_ai_alasken_native, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Asian Indian</th>
				<td><?php echo form_input('d_asian_indian', $d_asian_indian, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Asian Indian</th>
				<td><?php echo form_input('und_asian_indian', $und_asian_indian, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Black / Afrcn American</th>
				<td><?php echo form_input('d_afrcn_american', $d_afrcn_american, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Black / Afrcn American</th>
				<td><?php echo form_input('und_afrcn_american', $und_afrcn_american, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Chinese</th>
				<td><?php echo form_input('d_chinese', $d_chinese, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Chinese</th>
				<td><?php echo form_input('und_chinese', $und_chinese, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Cuban</th>
				<td><?php echo form_input('d_cuban', $d_cuban, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Cuban</th>
				<td><?php echo form_input('und_cuban', $und_cuban, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Filipino</th>
				<td><?php echo form_input('d_filipino', $d_filipino, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Filipino</th>
				<td><?php echo form_input('und_filipino', $und_filipino, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Japanese</th>
				<td><?php echo form_input('d_japanese', $d_japanese, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Japanese</th>
				<td><?php echo form_input('und_japanese', $und_japanese, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Korean</th>
				<td><?php echo form_input('d_korean', $d_korean, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Korean</th>
				<td><?php echo form_input('und_korean', $und_korean, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Mexican</th>
				<td><?php echo form_input('d_mexican', $d_mexican, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Mexican</th>
				<td><?php echo form_input('und_mexican', $und_mexican, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Hawaiian / Pacific Islndr</th>
				<td><?php echo form_input('d_hawaiian_pacific_islndr', $d_hawaiian_pacific_islndr, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Hawaiian / Pacific Islndr</th>
				<td><?php echo form_input('und_hawaiian_pacific_islndr', $und_hawaiian_pacific_islndr, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Puerto Rican</th>
				<td><?php echo form_input('d_puerto_rican', $d_puerto_rican, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Puerto Rican</th>
				<td><?php echo form_input('und_puerto_rican', $und_puerto_rican, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Vietnamese</th>
				<td><?php echo form_input('d_vietnamese', $d_vietnamese, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Vietnamese</th>
				<td><?php echo form_input('und_vietnamese', $und_vietnamese, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">White</th>
				<td><?php echo form_input('d_white', $d_white, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">White</th>
				<td><?php echo form_input('und_white', $und_white, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Asian</th>
				<td><?php echo form_input('d_other_asian', $d_other_asian, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Asian</th>
				<td><?php echo form_input('und_other_asian', $und_other_asian, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Hispanic / Latino</th>
				<td><?php echo form_input('d_other_hispanic_latino', $d_other_hispanic_latino, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Hispanic / Latino</th>
				<td><?php echo form_input('und_other_hispanic_latino', $und_other_hispanic_latino, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Two or More</th>
				<td><?php echo form_input('d_two_or_more_ethnicity', $d_two_or_more_ethnicity, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Two or More</th>
				<td><?php echo form_input('und_two_or_more_ethnicity', $und_two_or_more_ethnicity, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('d_other_ethnicity', $d_other_ethnicity, 'rel="num_only" class="eth_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('und_other_ethnicity', $und_other_ethnicity, 'rel="num_only" class="eth_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Ethnicity Total</th>
				<td><?php echo form_input('eth_duplicated_total', $eth_duplicated_total, 'rel="num_only" class="eth_duplicated_total" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Ethnicity Total</th>
				<td><?php echo form_input('eth_unduplicated_total', $eth_unduplicated_total, 'rel="num_only" class="eth_unduplicated_total" style="width: auto" size="3"'); ?></td>
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
				<td><?php echo form_input('d_newspaper', $d_newspaper, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Newspaper</th>
				<td><?php echo form_input('und_newspaper', $und_newspaper, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Magazine</th>
				<td><?php echo form_input('d_magazine', $d_magazine, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Magazine</th>
				<td><?php echo form_input('und_magazine', $und_magazine, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Radio</th>
				<td><?php echo form_input('d_radio', $d_radio, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Radio</th>
				<td><?php echo form_input('und_radio', $und_radio, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Television</th>
				<td><?php echo form_input('d_television', $d_television, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Television</th>
				<td><?php echo form_input('und_television', $und_television, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Billboard or Sign</th>
				<td><?php echo form_input('d_billboard_or_sign', $d_billboard_or_sign, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Billboard or Sign</th>
				<td><?php echo form_input('und_billboard_or_sign', $und_billboard_or_sign, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Yellow Pages</th>
				<td><?php echo form_input('d_yellow_pages', $d_yellow_pages, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Yellow Pages</th>
				<td><?php echo form_input('und_yellow_pages', $und_yellow_pages, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Relative</th>
				<td><?php echo form_input('d_relative', $d_relative, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Relative</th>
				<td><?php echo form_input('und_relative', $und_relative, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Friend</th>
				<td><?php echo form_input('d_ref_friend', $d_ref_friend, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Friend</th>
				<td><?php echo form_input('und_ref_friend', $und_ref_friend, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Co-worker or Supervisor</th>
				<td><?php echo form_input('d_coworker_or_supervisor', $d_coworker_or_supervisor, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Co-worker or Supervisor</th>
				<td><?php echo form_input('und_coworker_or_supervisor', $und_coworker_or_supervisor, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Doctor</th>
				<td><?php echo form_input('d_doctor', $d_doctor, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Doctor</th>
				<td><?php echo form_input('und_doctor', $und_doctor, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Nursing Home Staff</th>
				<td><?php echo form_input('d_nursing_home_staff', $d_nursing_home_staff, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Nursing Home Staff</th>
				<td><?php echo form_input('und_nursing_home_staff', $und_nursing_home_staff, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Health Prfessional</th>
				<td><?php echo form_input('d_other_health_professional', $d_other_health_professional, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Health Prfessional</th>
				<td><?php echo form_input('und_other_health_professional', $und_other_health_professional, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Alz. Association Staff / Program</th>
				<td><?php echo form_input('d_alz_assoc_staff_program', $d_alz_assoc_staff_program, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Alz. Association Staff / Program</th>
				<td><?php echo form_input('und_alz_assoc_staff_program', $und_alz_assoc_staff_program, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Mailing(Home or Work)</th>
				<td><?php echo form_input('d_mailing', $d_mailing, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Mailing(Home or Work)</th>
				<td><?php echo form_input('und_mailing', $und_mailing, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Saw Flyer / Brochure</th>
				<td><?php echo form_input('d_saw_flyer_brochure', $d_saw_flyer_brochure, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Saw Flyer / Brochure</th>
				<td><?php echo form_input('und_saw_flyer_brochure', $und_saw_flyer_brochure, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Email</th>
				<td><?php echo form_input('d_email', $d_email, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Email</th>
				<td><?php echo form_input('und_email', $und_email, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Website</th>
				<td><?php echo form_input('d_website', $d_website, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Website</th>
				<td><?php echo form_input('und_website', $und_website, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Health Fair</th>
				<td><?php echo form_input('d_health_fair', $d_health_fair, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Health Fair</th>
				<td><?php echo form_input('und_health_fair', $und_health_fair, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Telephone Call</th>
				<td><?php echo form_input('d_telephone_call', $d_telephone_call, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Telephone Call</th>
				<td><?php echo form_input('und_telephone_call', $und_telephone_call, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Don't Remember</th>
				<td><?php echo form_input('d_dont_remember', $d_dont_remember, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Don't Remember</th>
				<td><?php echo form_input('und_dont_remember', $und_dont_remember, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('d_ref_other', $d_ref_other, 'rel="num_only" class="source_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('und_ref_other', $und_ref_other, 'rel="num_only" class="source_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			
			<tr>
				<th style="width: 150px;">Source Total</th>
				<td><?php echo form_input('source_duplicated_total', $source_duplicated_total, 'rel="num_only" class="source_duplicated_total" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Source Total</th>
				<td><?php echo form_input('source_unduplicated_total', $source_unduplicated_total, 'rel="num_only" class="source_unduplicated_total" style="width: auto" size="3"'); ?></td>
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
				<td><?php echo form_input('d_person_w_memory_problems', $d_person_w_memory_problems, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Person w/ Memory Problems</th>
				<td><?php echo form_input('und_person_w_memory_problems', $und_person_w_memory_problems, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Spouse / Partner</th>
				<td><?php echo form_input('d_spouse_partner', $d_spouse_partner, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Spouse / Partner</th>
				<td><?php echo form_input('und_spouse_partner', $und_spouse_partner, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Daughter / Son</th>
				<td><?php echo form_input('d_daughter_son', $d_daughter_son, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Daughter / Son</th>
				<td><?php echo form_input('und_daughter_son', $und_daughter_son, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Sister / Brother</th>
				<td><?php echo form_input('d_sister_brother', $d_sister_brother, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Sister / Brother</th>
				<td><?php echo form_input('und_sister_brother', $und_sister_brother, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Grandchild</th>
				<td><?php echo form_input('d_grandchild', $d_grandchild, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Grandchild</th>
				<td><?php echo form_input('und_grandchild', $und_grandchild, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Friend</th>
				<td><?php echo form_input('d_friend', $d_friend, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Friend</th>
				<td><?php echo form_input('und_friend', $und_friend, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">In-Law</th>
				<td><?php echo form_input('d_inlaw', $d_inlaw, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">In-Law</th>
				<td><?php echo form_input('und_inlaw', $und_inlaw, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Relative</th>
				<td><?php echo form_input('d_other_relative', $d_other_relative, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Relative</th>
				<td><?php echo form_input('und_other_relative', $und_other_relative, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Healtcare / Community Service Provider</th>
				<td><?php echo form_input('d_healthcare_comm_service_provider', $d_healthcare_comm_service_provider, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Healtcare / Community Service Provider</th>
				<td><?php echo form_input('und_healthcare_comm_service_provider', $und_healthcare_comm_service_provider, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">other</th>
				<td><?php echo form_input('d_other', $d_other, 'rel="num_only" class="relationship_duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">other</th>
				<td><?php echo form_input('und_other', $und_other, 'rel="num_only" class="relationship_unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			
			<tr>
				<th style="width: 150px;">Source Total</th>
				<td><?php echo form_input('relationship_duplicated_total', $relationship_duplicated_total, 'rel="num_only" class="relationship_duplicated_total" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Source Total</th>
				<td><?php echo form_input('relationship_unduplicated_total', $relationship_unduplicated_total, 'rel="num_only" class="relationship_unduplicated_total" style="width: auto" size="3"'); ?></td>
			</tr>
		</table>
	</div>
	<p><?php echo form_submit('update_care_consultation', 'Update Care Consultation'); ?></p>
</div>

<? echo form_hidden('do_action', 'update_form'); ?>
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