<?php load_header() ?>
<h1>Online Education Program Data</h1>

<?php echo form_open('lasrmetrics/online_education/new') ?>
<div class="ui-block wide">
	<h3><a href="#">General Information</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th><label for="created_by">Created By</label></th>
				<td><?php echo form_dropdown('created_by', $staff, $created_by, 'class="required"'); ?></td>
			</tr>
			<tr>
				<th style="width: 330px;"><label for="office">Office</label></th>
				<td><?php echo form_dropdown('office', $locations, $office); ?></td>
			</tr>
			<tr>
				<th><label for="quarter">Quarter</label></th>
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
				<th><label for="month">Month</label></th>
				<td><?php echo form_dropdown('month', getMonthList(), $month); ?></td>
			</tr>
			<tr>
				<th><label for="name_of_education_program">Name of the Education Program</label></th>
				<td><?php echo form_dropdown('name_of_education_program', $education_programs, $name_of_education_program) ?></td>
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
				<th style="vertical-align: top; padding-top: 3px;"><label for="grant_program">SPA</label></th>
				<td>
					<label>1</label>&nbsp;<?php echo form_input('spa_1', $spa_1, 'style="width: auto;" rel="num_only" size="3"') ?><br>
					<label>2</label>&nbsp;<?php echo form_input('spa_2', $spa_2, 'style="width: auto;" rel="num_only" size="3"') ?><br>
					<label>3</label>&nbsp;<?php echo form_input('spa_3', $spa_3, 'style="width: auto;" rel="num_only" size="3"') ?><br>
					<label>4</label>&nbsp;<?php echo form_input('spa_4', $spa_4, 'style="width: auto;" rel="num_only" size="3"') ?><br>
					<label>5</label>&nbsp;<?php echo form_input('spa_5', $spa_5, 'style="width: auto;" rel="num_only" size="3"') ?><br>
					<label>6</label>&nbsp;<?php echo form_input('spa_6', $spa_6, 'style="width: auto;" rel="num_only" size="3"') ?><br>
					<label>7</label>&nbsp;<?php echo form_input('spa_7', $spa_7, 'style="width: auto;" rel="num_only" size="3"') ?><br>
					<label>8</label>&nbsp;<?php echo form_input('spa_8', $spa_8, 'style="width: auto;" rel="num_only" size="3"') ?><br>
					<label>unknown</label>&nbsp;<?php echo form_input('spa_unknown', $spa_unknown, 'style="width: auto;" rel="num_only" size="3"') ?><br>
				</td>
			</tr>
			<tr>
				<th><label for="county_program_held">County where program was held</label></th>
				<td><?php echo form_input('county_program_held', $county_program_held) ?></td>
			</tr>
			<tr>
				<th><label for="total_number_attendees">Total Number of Attendees</label></th>
				<td><?php echo form_input('total_number_attendees', $total_number_attendees, 'style="width: auto;" rel="num_only" size="3"') ?></td>
			</tr>
		</table>
	</div>
</div>	

<div class="ui-block wide">
	<h3><a href="#">Participants by County of Residence</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th style="width: 150px;">Los Angels County Total</th>
				<td><?php echo form_input('la_county_total', $la_county_total, 'class="county" style="width: auto;" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">San Bernandino county</th>
				<td><?php echo form_input('san_bernandino_county', $san_bernandino_county, 'class="county" style="width: auto;" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Riverside County</th>
				<td><?php echo form_input('riverside_county', $riverside_county, 'class="county" style="width: auto;" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Kings County</th>
				<td><?php echo form_input('kings_county', $kings_county, 'class="county" style="width: auto;" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Tulare County</th>
				<td><?php echo form_input('tulare_county', $tulare_county, 'class="county" style="width: auto;" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Inyo County</th>
				<td><?php echo form_input('inyo_county', $inyo_county, 'class="county" style="width: auto;" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Mono County</th>
				<td><?php echo form_input('mono_county', $mono_county, 'class="county" style="width: auto;" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Inland Empire</th>
				<td><?php echo form_input('inland_empire', $inland_empire, 'class="county" style="width: auto;" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Coachella Valley</th>
				<td><?php echo form_input('coachella_valley', $coachella_valley, 'class="county" style="width: auto;" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Southwest Riverside</th>
				<td><?php echo form_input('southwest_riverside', $southwest_riverside, 'class="county" style="width: auto;" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('residence_other', $residence_other, 'style="width: auto;" rel="num_only" size="3"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Participants Ethnicity</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th style="width: 150px;">American Indian or Alaskan Native</th>
				<td><?php echo form_input('ai_alasken_native', $ai_alasken_native, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Asian Indian</th>
				<td><?php echo form_input('asian_indian', $asian_indian, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Black / Afrcn American</th>
				<td><?php echo form_input('afrcn_american', $afrcn_american, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Chinese</th>
				<td><?php echo form_input('chinese', $chinese, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Cuban</th>
				<td><?php echo form_input('cuban', $cuban, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Filipino</th>
				<td><?php echo form_input('filipino', $filipino, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Japanese</th>
				<td><?php echo form_input('japanese', $japanese, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Korean</th>
				<td><?php echo form_input('korean', $korean, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Mexican</th>
				<td><?php echo form_input('mexican', $mexican, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Native Hawaiian or Pacific Islander</th>
				<td><?php echo form_input('hawaiian_pacific_islndr', $hawaiian_pacific_islndr, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Puerto Rican</th>
				<td><?php echo form_input('puerto_rican', $puerto_rican, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Vietnamese</th>
				<td><?php echo form_input('vietnamese', $vietnamese, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">White</th>
				<td><?php echo form_input('white', $white, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Asian</th>
				<td><?php echo form_input('other_asian', $other_asian, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Hispanic / Latino</th>
				<td><?php echo form_input('other_hispanic_latino', $other_hispanic_latino, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Two or More</th>
				<td><?php echo form_input('two_or_more_ethnicity', $two_or_more_ethnicity, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('other_ethnicity', $other_ethnicity, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Unknown</th>
				<td><?php echo form_input('ethnicity_unknown', $ethnicity_unknown, 'style="width: auto;" rel="num_only" size="3"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Participants Profession</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th style="width: 150px;">Nurse</th>
				<td><?php echo form_input('nurse', $nurse, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Social Worker</th>
				<td><?php echo form_input('social_worker', $social_worker, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">RCFE Administrator</th>
				<td><?php echo form_input('rcfe_administrator', $rcfe_administrator, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">CNA</th>
				<td><?php echo form_input('cna', $cna, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Marriage Family Terapist</th>
				<td><?php echo form_input('marriage_family_therapist', $marriage_family_therapist, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('other', $other, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">if other, specify</th>
				<td><?php echo form_input('if_other_specify', $if_other_specify, 'class="ethnicity" style="width: auto" rel="num_only" size="3"'); ?></td>
			</tr>
		</table>
	</div>
	<p><?php echo form_submit('save_education_program', 'Save Online Education Program'); ?></p>
</div>

<? echo form_hidden('do_action', 'save_form'); ?>
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
			total += parseInt($(this).val());
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