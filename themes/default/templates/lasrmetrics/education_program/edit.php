<?php load_header() ?>
<h1>Education Program Data</h1>

<div id="notice">
	* Term Definitions are listed at bottom of the form.<br />
	** Data from talks requested by the LASpeaker's Bureau will be entered by the LA manager of Community Education
</div>

<?php echo form_open('lasrmetrics/education_program/edit/'.$ID) ?>
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
					(office of the person completing the form);
					<div class="note">
						* The data must be entered by the office that made<br />
						the original request.
					</div>
				</th>
				<td><?php echo form_dropdown('office', $locations, $office); ?></td>
			</tr>
			<tr>
				<th style="vertical-align: top; padding-top: 3px;"><label for="contracted_agency">Is this event though a contracted agency?</label></th>
				<td>
					<div class="buttonset">
						<?php echo form_radio(array('name' => 'contracted_agency', 'value' => 'Yes', 'id' => 'contracted_agency1', 'checked' => ($contracted_agency == 'Yes' ? 'checked' : ''))); ?><label for="contracted_agency1">Yes</label>
						<?php echo form_radio(array('name' => 'contracted_agency', 'value' => 'No', 'id' => 'contracted_agency2', 'checked' => ($contracted_agency == 'No' ? 'checked' : ''))); ?><label for="contracted_agency2">No</label>
					</div>
					If yes, please write the name of the agency:<br>
					<?php echo form_input('contracted_agency_name', $contracted_agency_name); ?>
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
				<td><?php echo form_dropdown('quarter', array(1=>1,2,3,4), $quarter); ?></td>
			</tr>
			<tr>
				<th><label for="fiscial_year">Fiscal Year</label></th>
				<td><?php echo form_dropdown('fiscial_year', getYearList(), $fiscial_year); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Individule Entry</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th style="width: 330px;"><label for="date_of_program">Date of Program</label></th>
				<td><?php echo form_input('date_of_program', date_for_display($date_of_program), 'class="datepicker" style="width: 100px;"') ?></td>
			</tr>
			<tr>
				<th><label for="name_of_education_program">Name of the Education Program</label></th>
				<td><?php echo form_dropdown('name_of_education_program', $education_programs, $name_of_education_program) ?></td>
			</tr>
			<tr>
				<th><label for="name_of_presenters">Date Names of Presenter(s)</label></th>
				<td><?php echo form_input('name_of_presenters', $name_of_presenters) ?></td>
			</tr>
			<tr>
				<th><label for="type_of_presenter">Type of Presenter</label></th>
				<td><?php echo form_dropdown('type_of_presenter', $presenter_types, $type_of_presenter) ?></td>
			</tr>
			<tr>
				<th><label for="program_type">Program Type</label></th>
				<td><?php echo form_dropdown('program_type', $program_types, $program_type) ?></td>
			</tr>
			<tr>
				<th><label for="target_audience">Target Audience</label></th>
				<td><?php echo form_dropdown('target_audience', $target_audiences, $target_audience) ?></td>
			</tr>
			<tr>
				<th>
					<label for="grant_program">Grant / Program</label><br />
					<small>(For funding / reporting purposes only, sing <br />
						Presentation to a funding source)</small>
				</th>
				<td><?php echo form_dropdown('grant_program', $grant_programs, $grant_program); ?></td>
			</tr>
			<tr>
				<th>
					<label for="grant_program">SPA</label><br />
					<small>(County where program was held)</small>
				</th>
				<td><?php echo form_dropdown('spa', $SPA, $spa); ?></td>
			</tr>
			<tr>
				<th><label for="total_number_attendees">Total Number of Attendees</label></th>
				<td><?php echo form_input('total_number_attendees', $total_number_attendees, 'style="width: auto;" size="3"') ?></td>
			</tr>
			<tr>
				<th style="vertical-align: top; padding-top: 3px;"><label for="advocacy_information_presented">Was advocacy information presented?</label></th>
				<td>
					<div class="buttonset">
						<?php echo form_radio(array('name' => 'advocacy_information_presented', 'value' => 'Yes', 'id' => 'advocacy_information_presented1', 'checked' => ($advocacy_information_presented == 'Yes' ? 'checked' : ''))); ?><label for="advocacy_information_presented1">Yes</label>
						<?php echo form_radio(array('name' => 'advocacy_information_presented', 'value' => 'No', 'id' => 'advocacy_information_presented2', 'checked' => ($advocacy_information_presented == 'No' ? 'checked' : ''))); ?><label for="advocacy_information_presented2">No</label>
					</div>
				</td>
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
				<td><?php echo form_input('agency', $agency) ?></td>
			</tr>
			<tr>
				<th><label for="contact_name">Contact Name</label></th>
				<td><?php echo form_input('contact_name', $contact_name) ?></td>
			</tr>
			<tr>
				<th><label for="event_address">Event Address</label></th>
				<td><?php echo form_textarea(array('name' => 'event_address','rows' => '4', 'value' => $event_address)) ?></td>
			</tr>
			<tr>
				<th><label for="telephone">Telephone</label></th>
				<td><?php echo form_input('telephone', $telephone) ?></td>
			</tr>
			<tr>
				<th><label for="fax">Fax</label></th>
				<td><?php echo form_input('fax', $fax) ?></td>
			</tr>
			<tr>
				<th><label for="email">Email</label></th>
				<td><?php echo form_input('email', $email) ?></td>
			</tr>
			<tr>
				<th><label for="topic">
					Topic <br>
					If Other, please specify:
				</label></th>
				<td><?php echo form_input('topic', $topic) ?></td>
			</tr>
			<tr>
				<th><label for="series">Series?</label></th>
				<td>
					<div class="buttonset">
						<?php echo form_radio(array('name' => 'series', 'value' => 'Yes', 'id' => 'series1', 'checked' => ($series == 'Yes' ? 'checked' : ''))); ?><label for="series1">Yes</label>
						<?php echo form_radio(array('name' => 'series', 'value' => 'No', 'id' => 'series2', 'checked' => ($series == 'No' ? 'checked' : ''))); ?><label for="series2">No</label>
					</div>
				</td>
			</tr>
			<tr>
				<th style="vertical-algin: top; padding-top: 3px;">Time of Event</th>
				<td>
					<table cellspacing="0">
						<tr>
							<td style="width: 50px;"><label for="email">Start:</label></td>
							<td><?php echo form_input('start_time', $start_time, 'class="timepicker" style="width: 100px;"') ?></td>
						</tr>
						<tr>
							<td><label for="email">End:</label></td>
							<td><?php echo form_input('end_time', $end_time, 'class="timepicker" style="width: 100px;"') ?></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<th style="vertical-algin: top; padding-top: 3px;">Language</th>
				<td>
					<?php $language = maybe_unserialize($language) ?>
					<div class="buttons">
						<?php echo form_checkbox(array('name' => 'language[]', 'value' => 'English', 'id' => 'language1', 'checked' => (@in_array('English', $language) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="language1">English</label>
						<?php echo form_checkbox(array('name' => 'language[]', 'value' => 'Vietnamese', 'id' => 'language2', 'checked' => (@in_array('Vietnamese', $language) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="language2">Vietnamese</label>
						<?php echo form_checkbox(array('name' => 'language[]', 'value' => 'Spanish', 'id' => 'language3', 'checked' => (@in_array('Spanish', $language) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="language3">Spanish</label>
						<?php echo form_checkbox(array('name' => 'language[]', 'value' => 'Korean', 'id' => 'language4', 'checked' => (@in_array('Korean', $language) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="language4">Korean</label>
						<?php echo form_checkbox(array('name' => 'language[]', 'value' => 'Cantonese', 'id' => 'language5', 'checked' => (@in_array('Cantonese', $language) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="language5">Cantonese</label>
						<?php echo form_checkbox(array('name' => 'language[]', 'value' => 'Other', 'id' => 'language6', 'checked' => (@in_array('Other', $language) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="language6">Other</label>
						<?php echo form_checkbox(array('name' => 'language[]', 'value' => 'Chinese', 'id' => 'language7', 'checked' => (@in_array('Chinese', $language) ? 'checked' : ''))); ?><label style="margin-bottom: 10px;" for="language7">Chinese</label>
					</div>
				</td>
			</tr>

			<tr>
				<th><label for="donation">Donation?</label></th>
				<td>
					<div class="buttonset">
						<?php echo form_radio(array('name' => 'donation', 'value' => 'Yes', 'id' => 'donation1', 'checked' => ($donation == 'Yes' ? 'checked' : ''))); ?><label for="donation1">Yes</label>
						<?php echo form_radio(array('name' => 'donation', 'value' => 'No', 'id' => 'donation2', 'checked' => ($donation == 'No' ? 'checked' : ''))); ?><label for="donation2">No</label>
					</div>
				</td>
			</tr>
			<tr>
				<th><label for="donation_amount">Donation Amount</label></th>
				<td>$<?php echo form_input('donation_amount', $donation_amount) ?></td>
			</tr>
			<tr>
				<th><label for="post_online">Post Online?</label></th>
				<td>
					<div class="buttonset">
						<?php echo form_radio(array('name' => 'post_online', 'value' => 'Yes', 'id' => 'post_online1', 'checked' => ($post_online == 'Yes' ? 'checked' : ''))); ?><label for="post_online1">Yes</label>
						<?php echo form_radio(array('name' => 'post_online', 'value' => 'No', 'id' => 'post_online2', 'checked' => ($post_online == 'No' ? 'checked' : ''))); ?><label for="post_online2">No</label>
					</div>
				</td>
			</tr>
			<tr>
				<th><label for="comments_notes">Comments / Notes:</label></th>
				<td><?php echo form_textarea(array('name' => 'comments_notes','rows' => '4', 'value' => $comments_notes)) ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Participants by County of Residence (duplicated)</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<td colspan="2"><small>(best approximation, based on CSQEI forms)</small></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 1</th>
				<td><?php echo form_input('spa_1', $spa_1, 'class="la_county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 2</th>
				<td><?php echo form_input('spa_2', $spa_2, 'class="la_county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 3</th>
				<td><?php echo form_input('spa_3', $spa_3, 'class="la_county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 4</th>
				<td><?php echo form_input('spa_4', $spa_4, 'class="la_county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 5</th>
				<td><?php echo form_input('spa_5', $spa_5, 'class="la_county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 6</th>
				<td><?php echo form_input('spa_6', $spa_6, 'class="la_county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 7</th>
				<td><?php echo form_input('spa_7', $spa_7, 'class="la_county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">SPA 8</th>
				<td><?php echo form_input('spa_8', $spa_8, 'class="la_county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Los Angels County Total<br /><small>(self calculated)</small></th>
				<td><?php echo form_input('la_county_total', $la_county_total, 'class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">San Bernandino county</th>
				<td><?php echo form_input('san_bernandino_county', $san_bernandino_county, 'class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Inland Empire</th>
				<td><?php echo form_input('inland_empire', $inland_empire, 'class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Kings County</th>
				<td><?php echo form_input('kings_county', $kings_county, 'class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Tulare County</th>
				<td><?php echo form_input('tulare_county', $tulare_county, 'class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Inyo County</th>
				<td><?php echo form_input('inyo_county', $inyo_county, 'class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Mono County</th>
				<td><?php echo form_input('mono_county', $mono_county, 'class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Coachella Valley</th>
				<td><?php echo form_input('coachella_valley', $coachella_valley, 'class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Southwest Riverside</th>
				<td><?php echo form_input('southwest_riverside', $southwest_riverside, 'class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Riverside</th>
				<td><?php echo form_input('riverside', $riverside, 'class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Out of Territory</th>
				<td><?php echo form_input('out_of_territory', $out_of_territory, 'class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Unknown</th>
				<td><?php echo form_input('unknown', $unknown, 'class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">County Total</th>
				<td><?php echo form_input('county_total', $county_total, 'style="width: auto;" size="3"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Participants Ethnicity (Duplicated)</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<td colspan="2"><small>(best approximation, based on CSQEI forms)</small></td>
			</tr>
			<tr>
				<th style="width: 150px;">A.I. / Alasken Native</th>
				<td><?php echo form_input('ai_alasken_native', $ai_alasken_native, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Asian Indian</th>
				<td><?php echo form_input('asian_indian', $asian_indian, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Black / Afrcn American</th>
				<td><?php echo form_input('afrcn_american', $afrcn_american, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Chinese</th>
				<td><?php echo form_input('chinese', $chinese, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Cuban</th>
				<td><?php echo form_input('cuban', $cuban, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Filipino</th>
				<td><?php echo form_input('filipino', $filipino, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Japanese</th>
				<td><?php echo form_input('japanese', $japanese, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Korean</th>
				<td><?php echo form_input('korean', $korean, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Mexican</th>
				<td><?php echo form_input('mexican', $mexican, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Hawaiian / Pacific Islndr</th>
				<td><?php echo form_input('hawaiian_pacific_islndr', $hawaiian_pacific_islndr, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Puerto Rican</th>
				<td><?php echo form_input('puerto_rican', $puerto_rican, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Vietnamese</th>
				<td><?php echo form_input('vietnamese', $vietnamese, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">White</th>
				<td><?php echo form_input('white', $white, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Asian</th>
				<td><?php echo form_input('other_asian', $other_asian, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Hispanic / Latino</th>
				<td><?php echo form_input('other_hispanic_latino', $other_hispanic_latino, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Two or More</th>
				<td><?php echo form_input('two_or_more_ethnicity', $two_or_more_ethnicity, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('other_ethnicity', $other_ethnicity, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Unknown</th>
				<td><?php echo form_input('unknown_ethnicity', $unknown_ethnicity, 'class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Ethnicity Total</th>
				<td><?php echo form_input('ethnicity_total', $ethnicity_total, 'style="width: auto;" size="3"'); ?></td>
			</tr>
		</table>
	</div>
	<p><?php echo form_submit('update_education_program', 'Update Education Program'); ?></p>
</div>

<?php echo form_hidden('do_action', 'update_form'); ?>
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