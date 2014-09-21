<?php load_header() ?>
<h1>Online Education Program Data</h1>

<?php echo form_open('lasrmetrics/online_education/new') ?>
<div class="ui-block wide">
	<h3><a href="#">General Information</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th><label for="created_by">Created By</label></th>
				<td><?php echo form_dropdown('created_by', $staff, '', 'class="required"'); ?></td>
			</tr>
			<tr>
				<th style="width: 330px;"><label for="office">Office</label></th>
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
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Individule Entry</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th><label for="month">Month</label></th>
				<td><?php echo form_dropdown('month', getMonthList()); ?></td>
			</tr>
			<tr>
				<th><label for="name_of_education_program">Name of the Education Program</label></th>
				<td><?php echo form_dropdown('name_of_education_program', $education_programs) ?></td>
			</tr>
			<tr>
				<th><label for="program_type">Program Type</label></th>
				<td><?php echo form_dropdown('program_type', $program_types) ?></td>
			</tr>
			<tr>
				<th><label for="target_audience">Target Audience</label></th>
				<td><?php echo form_dropdown('target_audience', $target_audiences) ?></td>
			</tr>
			<tr>
				<th style="vertical-align: top; padding-top: 3px;"><label for="grant_program">SPA</label></th>
				<td>
					<label>1</label>&nbsp;<?php echo form_input('spa_1', 0, 'rel="num_only" style="width: auto;" size="3"') ?><br>
					<label>2</label>&nbsp;<?php echo form_input('spa_2', 0, 'rel="num_only" style="width: auto;" size="3"') ?><br>
					<label>3</label>&nbsp;<?php echo form_input('spa_3', 0, 'rel="num_only" style="width: auto;" size="3"') ?><br>
					<label>4</label>&nbsp;<?php echo form_input('spa_4', 0, 'rel="num_only" style="width: auto;" size="3"') ?><br>
					<label>5</label>&nbsp;<?php echo form_input('spa_5', 0, 'rel="num_only" style="width: auto;" size="3"') ?><br>
					<label>6</label>&nbsp;<?php echo form_input('spa_6', 0, 'rel="num_only" style="width: auto;" size="3"') ?><br>
					<label>7</label>&nbsp;<?php echo form_input('spa_7', 0, 'rel="num_only" style="width: auto;" size="3"') ?><br>
					<label>8</label>&nbsp;<?php echo form_input('spa_8', 0, 'rel="num_only" style="width: auto;" size="3"') ?><br>
					<label>unknown</label>&nbsp;<?php echo form_input('spa_unknown', 0, 'rel="num_only" style="width: auto;" size="3"') ?><br>
				</td>
			</tr>
			<tr>
				<th><label for="county_program_held">County where program was held</label></th>
				<td><?php echo form_input('county_program_held', '') ?></td>
			</tr>
			<tr>
				<th><label for="total_number_attendees">Total Number of Attendees</label></th>
				<td><?php echo form_input('total_number_attendees', 0, 'rel="num_only" style="width: auto;" size="3"') ?></td>
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
				<td><?php echo form_input('la_county_total', 0, 'rel="num_only" class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">San Bernandino county</th>
				<td><?php echo form_input('san_bernandino_county', 0, 'rel="num_only" class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Riverside County</th>
				<td><?php echo form_input('riverside_county', 0, 'rel="num_only" class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Kings County</th>
				<td><?php echo form_input('kings_county', 0, 'rel="num_only" class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Tulare County</th>
				<td><?php echo form_input('tulare_county', 0, 'rel="num_only" class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Inyo County</th>
				<td><?php echo form_input('inyo_county', 0, 'rel="num_only" class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Mono County</th>
				<td><?php echo form_input('mono_county', 0, 'rel="num_only" class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Inland Empire</th>
				<td><?php echo form_input('inland_empire', 0, 'rel="num_only" class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Coachella Valley</th>
				<td><?php echo form_input('coachella_valley', 0, 'rel="num_only" class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Southwest Riverside</th>
				<td><?php echo form_input('southwest_riverside', 0, 'rel="num_only" class="county" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('residence_other', 0, 'rel="num_only" style="width: auto;" size="3"'); ?></td>
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
				<td><?php echo form_input('ai_alasken_native', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Asian Indian</th>
				<td><?php echo form_input('asian_indian', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Black / Afrcn American</th>
				<td><?php echo form_input('afrcn_american', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Chinese</th>
				<td><?php echo form_input('chinese', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Cuban</th>
				<td><?php echo form_input('cuban', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Filipino</th>
				<td><?php echo form_input('filipino', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Japanese</th>
				<td><?php echo form_input('japanese', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Korean</th>
				<td><?php echo form_input('korean', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Mexican</th>
				<td><?php echo form_input('mexican', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Native Hawaiian or Pacific Islander</th>
				<td><?php echo form_input('hawaiian_pacific_islndr', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Puerto Rican</th>
				<td><?php echo form_input('puerto_rican', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Vietnamese</th>
				<td><?php echo form_input('vietnamese', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">White</th>
				<td><?php echo form_input('white', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Asian</th>
				<td><?php echo form_input('other_asian', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Hispanic / Latino</th>
				<td><?php echo form_input('other_hispanic_latino', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Two or More</th>
				<td><?php echo form_input('two_or_more_ethnicity', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('other_ethnicity', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Unknown</th>
				<td><?php echo form_input('ethnicity_unknown', 0, 'rel="num_only" style="width: auto;" size="3"'); ?></td>
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
				<td><?php echo form_input('nurse', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Social Worker</th>
				<td><?php echo form_input('social_worker', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">RCFE Administrator</th>
				<td><?php echo form_input('rcfe_administrator', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">CNA</th>
				<td><?php echo form_input('cna', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Marriage Family Terapist</th>
				<td><?php echo form_input('marriage_family_therapist', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('other', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">if other, specify</th>
				<td><?php echo form_input('if_other_specify', 0, 'rel="num_only" class="ethnicity" style="width: auto" size="3"'); ?></td>
			</tr>
		</table>
	</div>
	<p><?php echo form_submit('save_education_program', 'Save Online Education Program'); ?></p>
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