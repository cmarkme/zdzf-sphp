<?php load_header() ?>
<h1>Update Support Group Data</h1>

<div id="notice">
	* Each regional office is responsible for entering all data <br>
	for affiliated support groups in there region.
</div>

<?php echo form_open('lasrmetrics/support_group/new') ?>
<div class="ui-block wide">
	<h3><a href="#">General Information</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th><label for="created_by">Created By</label></th>
				<td><?php echo form_dropdown('created_by', $staff, $created_by); ?></td>
			</tr>
			<tr>
				<th><label for="office">Office</label></th>
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
			<tr>
				<th><label for="spa">SPA</label></th>
				<td><?php echo form_dropdown('spa', $SPA, $spa); ?></td>
			</tr>
			<tr>
				<th><label for="name_of_group">Name of Group</label></th>
				<td><?php echo form_input('name_of_group', $name_of_group, $name_of_group); ?></td>
			</tr>
			<tr>
				<th><label for="group_type">Group Type</label></th>
				<td><?php echo form_dropdown('group_type', $group_types, $group_type); ?></td>
			</tr>
			<tr>
				<th><label for="support_group_county">Support Group County</label></th>
				<td><?php echo form_dropdown('support_group_county', $counties, $support_group_county); ?></td>
			</tr>
			<tr>
				<th>
					<label for="num_duplicate_attendees">Total Number of Duplicate Attendees</label><br>
					<small>(Please match this number to the Duplicated Sections Below)</small>
				</th>
				<td><?php echo form_input('num_duplicate_attendees', $num_duplicate_attendees); ?></td>
			</tr>
			<tr>
				<th>
					<label for="num_first_time_attendees">Number of First Time Attendees</label><br>
					<small>(Please match this number to the Unduplicated sections below</small>
				</th>
				<td><?php echo form_input('num_first_time_attendees', $num_first_time_attendees); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Attendees By Race</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th colspan="2" style="text-align: center;">Duplicated</th>
				<th colspan="2" style="text-align: center;">Unduplicated</th>
			</tr>

			<tr>
				<th style="width: 150px;">Caucasian</th>
				<td><?php echo form_input('d_caucasian', $d_caucasian, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Caucasian</th>
				<td><?php echo form_input('und_caucasian', $und_caucasian, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Black / African American</th>
				<td><?php echo form_input('d_african_american', $d_african_american, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Black / African American</th>
				<td><?php echo form_input('und_african_american', $und_african_american, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Hispanic / Latino</th>
				<td><?php echo form_input('d_latino', $d_latino, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Hispanic / Latino</th>
				<td><?php echo form_input('und_latino', $und_latino, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Asian</th>
				<td><?php echo form_input('d_asian', $d_asian, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Asian</th>
				<td><?php echo form_input('und_asian', $und_asian, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Native Hawaiian / Other Pacific Islander</th>
				<td><?php echo form_input('d_native_hawaiian_other', $d_native_hawaiian_other, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Native Hawaiian / Other Pacific Islander</th>
				<td><?php echo form_input('und_native_hawaiian_other', $und_native_hawaiian_other, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Two or More Races</th>
				<td><?php echo form_input('d_two_or_more', $d_two_or_more, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Two or More Races</th>
				<td><?php echo form_input('und_two_or_more', $und_two_or_more, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Race</th>
				<td><?php echo form_input('d_other_race', $d_other_race, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Race</th>
				<td><?php echo form_input('und_other_race', $und_other_race, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Total</th>
				<td><?php echo form_input('duplicated_total', $duplicated_total, 'rel="num_only" id="duplicated_total" style="width: auto" size="3"'); ?></td>
				<th>Total</th>
				<td><?php echo form_input('unduplicated_total', $unduplicated_total, 'rel="num_only" id="unduplicated_total" style="width: auto" size="3"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Attendees By Ethnicity</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th colspan="2" style="text-align: center;">Duplicated</th>
				<th colspan="2" style="text-align: center;">Unduplicated</th>
			</tr>
			<tr>
				<th style="width: 150px;">A.I. / Alasken Native</th>
				<td><?php echo form_input('d_ai_alasken_native', $d_ai_alasken_native, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">A.I. / Alasken Native</th>
				<td><?php echo form_input('und_ai_alasken_native', $und_ai_alasken_native, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Asian Indian</th>
				<td><?php echo form_input('d_asian_indian', $d_asian_indian, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Asian Indian</th>
				<td><?php echo form_input('und_asian_indian', $und_asian_indian, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Black / Afrcn American</th>
				<td><?php echo form_input('d_afrcn_american', $d_afrcn_american, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Black / Afrcn American</th>
				<td><?php echo form_input('und_afrcn_american', $und_afrcn_american, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Chinese</th>
				<td><?php echo form_input('d_chinese', $d_chinese, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Chinese</th>
				<td><?php echo form_input('und_chinese', $und_chinese, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Cuban</th>
				<td><?php echo form_input('d_cuban', $d_cuban, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Cuban</th>
				<td><?php echo form_input('und_cuban', $und_cuban, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Filipino</th>
				<td><?php echo form_input('d_filipino', $d_filipino, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Filipino</th>
				<td><?php echo form_input('und_filipino', $und_filipino, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Japanese</th>
				<td><?php echo form_input('d_japanese', $d_japanese, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Japanese</th>
				<td><?php echo form_input('und_japanese', $und_japanese, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Korean</th>
				<td><?php echo form_input('d_korean', $d_korean, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Korean</th>
				<td><?php echo form_input('und_korean', $und_korean, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Mexican</th>
				<td><?php echo form_input('d_mexican', $d_mexican, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Mexican</th>
				<td><?php echo form_input('und_mexican', $und_mexican, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Hawaiian / Pacific Islndr</th>
				<td><?php echo form_input('d_hawaiian_pacific_islndr', $d_hawaiian_pacific_islndr, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Hawaiian / Pacific Islndr</th>
				<td><?php echo form_input('und_hawaiian_pacific_islndr', $und_hawaiian_pacific_islndr, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Puerto Rican</th>
				<td><?php echo form_input('d_puerto_rican', $d_puerto_rican, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Puerto Rican</th>
				<td><?php echo form_input('und_puerto_rican', $und_puerto_rican, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Vietnamese</th>
				<td><?php echo form_input('d_vietnamese', $d_vietnamese, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Vietnamese</th>
				<td><?php echo form_input('und_vietnamese', $und_vietnamese, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">White</th>
				<td><?php echo form_input('d_white', $d_white, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">White</th>
				<td><?php echo form_input('und_white', $und_white, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Asian</th>
				<td><?php echo form_input('d_other_asian', $d_other_asian, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Asian</th>
				<td><?php echo form_input('und_other_asian', $und_other_asian, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Hispanic / Latino</th>
				<td><?php echo form_input('d_other_hispanic_latino', $d_other_hispanic_latino, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Hispanic / Latino</th>
				<td><?php echo form_input('und_other_hispanic_latino', $und_other_hispanic_latino, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Two or More</th>
				<td><?php echo form_input('d_two_or_more_ethnicity', $d_two_or_more_ethnicity, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Two or More</th>
				<td><?php echo form_input('und_two_or_more_ethnicity', $und_two_or_more_ethnicity, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('d_other_ethnicity', $d_other_ethnicity, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('und_other_ethnicity', $und_other_ethnicity, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Attendees by Relationship to the person with dementia</a></h3>
	<div>
		<table cellspacing="0" border="0">
			<tr>
				<th colspan="2" style="text-align: center;">Duplicated</th>
				<th colspan="2" style="text-align: center;">Unduplicated</th>
			</tr>

			<tr>
				<th style="width: 150px;">Person w/ Memory Problems</th>
				<td><?php echo form_input('d_person_w_memory_problems', $d_person_w_memory_problems, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Person w/ Memory Problems</th>
				<td><?php echo form_input('und_person_w_memory_problems', $und_person_w_memory_problems, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Spouse / Partner</th>
				<td><?php echo form_input('d_spouse_partnet', $d_spouse_partnet, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Spouse / Partner</th>
				<td><?php echo form_input('und_spouse_partnet', $und_spouse_partnet, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Daughter / Son</th>
				<td><?php echo form_input('d_daughter_son', $d_daughter_son, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Daughter / Son</th>
				<td><?php echo form_input('und_daughter_son', $und_daughter_son, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Sister / Brother</th>
				<td><?php echo form_input('d_sister_brother', $d_sister_brother, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Sister / Brother</th>
				<td><?php echo form_input('und_sister_brother', $und_sister_brother, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Grandchild</th>
				<td><?php echo form_input('d_grandchild', $d_grandchild, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Grandchild</th>
				<td><?php echo form_input('und_grandchild', $und_grandchild, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Friend</th>
				<td><?php echo form_input('d_friend', $d_friend, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Friend</th>
				<td><?php echo form_input('und_friend', $und_friend, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">In-Law</th>
				<td><?php echo form_input('d_in_law', $d_in_law, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">In-Law</th>
				<td><?php echo form_input('und_in_law', $und_in_law, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Relative</th>
				<td><?php echo form_input('d_other_relative', $d_other_relative, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Relative</th>
				<td><?php echo form_input('und_other_relative', $und_other_relative, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Healthcare / community Service Provider</th>
				<td><?php echo form_input('d_healthcare_community_service_provider', $d_healthcare_community_service_provider, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Healthcare / community Service Provider</th>
				<td><?php echo form_input('und_healthcare_community_service_provider', $und_healthcare_community_service_provider, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('d_relationship_other', $d_relationship_other, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('und_relationship_other', $und_relationship_other, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>

			<tr>
				<th>Total</th>
				<td><?php echo form_input('d_relation_total', $d_relation_total, 'rel="num_only" id="duplicated_total" style="width: auto" size="3"'); ?></td>
				<th>Total</th>
				<td><?php echo form_input('und_relation_total', $und_relation_total, 'rel="num_only" id="unduplicated_total" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<td colspan="4"></td>
			</tr>
			<tr>
				<th>Notes</th>
				<td colspan="3"><?php echo form_textarea('notes', $notes, 'style="width: 100%"'); ?></td>
			</tr>
		</table>
	</div>
	<p><?php echo form_submit('update_form', 'Update Support Group Data'); ?></p>
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