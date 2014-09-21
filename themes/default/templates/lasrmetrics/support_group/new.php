<?php load_header() ?>
<h1>Support Group Data</h1>

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
				<th><label for="spa">SPA</label></th>
				<td><?php echo form_dropdown('spa', $SPA); ?></td>
			</tr>
			<tr>
				<th><label for="name_of_group">Name of Group</label></th>
				<td><?php echo form_input('name_of_group', ''); ?></td>
			</tr>
			<tr>
				<th><label for="group_type">Group Type</label></th>
				<td><?php echo form_dropdown('group_type', $group_types); ?></td>
			</tr>
			<tr>
				<th><label for="support_group_county">Support Group County</label></th>
				<td><?php echo form_dropdown('support_group_county', $counties); ?></td>
			</tr>
			<tr>
				<th>
					<label for="num_duplicate_attendees">Total Number of Duplicate Attendees</label><br>
					<small>(Please match this number to the Duplicated Sections Below)</small>
				</th>
				<td><?php echo form_input('num_duplicate_attendees', 0, 'rel="num_only" style="width: auto;" size="3"'); ?></td>
			</tr>
			<tr>
				<th>
					<label for="num_first_time_attendees">Number of First Time Attendees</label><br>
					<small>(Please match this number to the Unduplicated sections below</small>
				</th>
				<td><?php echo form_input('num_first_time_attendees', 0, 'rel="num_only" style="width: auto;" size="3"'); ?></td>
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
				<td><?php echo form_input('d_caucasian', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Caucasian</th>
				<td><?php echo form_input('und_caucasian', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Black / African American</th>
				<td><?php echo form_input('d_african_american', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Black / African American</th>
				<td><?php echo form_input('und_african_american', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Hispanic / Latino</th>
				<td><?php echo form_input('d_latino', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Hispanic / Latino</th>
				<td><?php echo form_input('und_latino', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Asian</th>
				<td><?php echo form_input('d_asian', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Asian</th>
				<td><?php echo form_input('und_asian', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Native Hawaiian / Other Pacific Islander</th>
				<td><?php echo form_input('d_native_hawaiian_other', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Native Hawaiian / Other Pacific Islander</th>
				<td><?php echo form_input('und_native_hawaiian_other', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Two or More Races</th>
				<td><?php echo form_input('d_two_or_more', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Two or More Races</th>
				<td><?php echo form_input('und_two_or_more', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Race</th>
				<td><?php echo form_input('d_other_race', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Race</th>
				<td><?php echo form_input('und_other_race', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th>Total</th>
				<td><?php echo form_input('duplicated_total', 0, 'rel="num_only" id="duplicated_total" style="width: auto" size="3"'); ?></td>
				<th>Total</th>
				<td><?php echo form_input('unduplicated_total', 0, 'rel="num_only" id="unduplicated_total" style="width: auto" size="3"'); ?></td>
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
				<td><?php echo form_input('d_ai_alasken_native', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">A.I. / Alasken Native</th>
				<td><?php echo form_input('und_ai_alasken_native', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Asian Indian</th>
				<td><?php echo form_input('d_asian_indian', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Asian Indian</th>
				<td><?php echo form_input('und_asian_indian', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Black / Afrcn American</th>
				<td><?php echo form_input('d_afrcn_american', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Black / Afrcn American</th>
				<td><?php echo form_input('und_afrcn_american', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Chinese</th>
				<td><?php echo form_input('d_chinese', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Chinese</th>
				<td><?php echo form_input('und_chinese', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Cuban</th>
				<td><?php echo form_input('d_cuban', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Cuban</th>
				<td><?php echo form_input('und_cuban', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Filipino</th>
				<td><?php echo form_input('d_filipino', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Filipino</th>
				<td><?php echo form_input('und_filipino', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Japanese</th>
				<td><?php echo form_input('d_japanese', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Japanese</th>
				<td><?php echo form_input('und_japanese', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Korean</th>
				<td><?php echo form_input('d_korean', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Korean</th>
				<td><?php echo form_input('und_korean', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Mexican</th>
				<td><?php echo form_input('d_mexican', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Mexican</th>
				<td><?php echo form_input('und_mexican', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Hawaiian / Pacific Islndr</th>
				<td><?php echo form_input('d_hawaiian_pacific_islndr', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Hawaiian / Pacific Islndr</th>
				<td><?php echo form_input('und_hawaiian_pacific_islndr', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Puerto Rican</th>
				<td><?php echo form_input('d_puerto_rican', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Puerto Rican</th>
				<td><?php echo form_input('und_puerto_rican', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Vietnamese</th>
				<td><?php echo form_input('d_vietnamese', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Vietnamese</th>
				<td><?php echo form_input('und_vietnamese', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">White</th>
				<td><?php echo form_input('d_white', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">White</th>
				<td><?php echo form_input('und_white', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Asian</th>
				<td><?php echo form_input('d_other_asian', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Asian</th>
				<td><?php echo form_input('und_other_asian', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Hispanic / Latino</th>
				<td><?php echo form_input('d_other_hispanic_latino', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Hispanic / Latino</th>
				<td><?php echo form_input('und_other_hispanic_latino', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Two or More</th>
				<td><?php echo form_input('d_two_or_more_ethnicity', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Two or More</th>
				<td><?php echo form_input('und_two_or_more_ethnicity', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('d_other_ethnicity', 0, 'rel="num_only" class="duplicated" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('und_other_ethnicity', 0, 'rel="num_only" class="unduplicated" style="width: auto" size="3"'); ?></td>
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
				<td><?php echo form_input('d_person_w_memory_problems', 0, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Person w/ Memory Problems</th>
				<td><?php echo form_input('und_person_w_memory_problems', 0, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Spouse / Partner</th>
				<td><?php echo form_input('d_spouse_partnet', 0, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Spouse / Partner</th>
				<td><?php echo form_input('und_spouse_partnet', 0, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Daughter / Son</th>
				<td><?php echo form_input('d_daughter_son', 0, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Daughter / Son</th>
				<td><?php echo form_input('und_daughter_son', 0, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Sister / Brother</th>
				<td><?php echo form_input('d_sister_brother', 0, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Sister / Brother</th>
				<td><?php echo form_input('und_sister_brother', 0, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Grandchild</th>
				<td><?php echo form_input('d_grandchild', 0, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Grandchild</th>
				<td><?php echo form_input('und_grandchild', 0, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Friend</th>
				<td><?php echo form_input('d_friend', 0, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Friend</th>
				<td><?php echo form_input('und_friend', 0, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">In-Law</th>
				<td><?php echo form_input('d_in_law', 0, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">In-Law</th>
				<td><?php echo form_input('und_in_law', 0, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other Relative</th>
				<td><?php echo form_input('d_other_relative', 0, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other Relative</th>
				<td><?php echo form_input('und_other_relative', 0, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Healthcare / community Service Provider</th>
				<td><?php echo form_input('d_healthcare_community_service_provider', 0, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Healthcare / community Service Provider</th>
				<td><?php echo form_input('und_healthcare_community_service_provider', 0, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('d_relationship_other', 0, 'rel="num_only" class="d_relation" style="width: auto" size="3"'); ?></td>
				<th style="width: 150px;">Other</th>
				<td><?php echo form_input('und_relationship_other', 0, 'rel="num_only" class="und_relation" style="width: auto" size="3"'); ?></td>
			</tr>

			<tr>
				<th>Total</th>
				<td><?php echo form_input('d_relation_total', 0, 'rel="num_only" id="duplicated_total" style="width: auto" size="3"'); ?></td>
				<th>Total</th>
				<td><?php echo form_input('und_relation_total', 0, 'rel="num_only" id="unduplicated_total" style="width: auto" size="3"'); ?></td>
			</tr>
			<tr>
				<td colspan="4"></td>
			</tr>
			<tr>
				<th>Notes</th>
				<td colspan="3"><?php echo form_textarea('notes', '', 'style="width: 100%"'); ?></td>
			</tr>
		</table>
	</div>
	<p><?php echo form_submit('save_form', 'Save Support Group Data'); ?></p>
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