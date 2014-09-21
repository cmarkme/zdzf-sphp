<?php load_header() ?>

<?php if ($this->session->flashdata('admin')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('admin') ?></p>
	</div>
<?php endif ?>

<h1>LasrMetric Settings</h1>

<?php echo form_open(site_url('admin/lasrmetrics_settings')) ?>

<?php //start general information block ?>
<div class="ui-block wide">
	<h3><a href="#">Account Codes</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0" class="clone-form">
			<tbody>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Group Types</th>
					<td colspan="5">
						<table cellpadding="0" cellspacing="0" border="0" class="options-table">
							<?php foreach($group_types as $group_type): ?>
							<?php if(strlen($group_type)): ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[group_types][]', $group_type); ?><span class="button-remove"></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[group_types][]'); ?><span class="button-add"></span></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Counties</th>
					<td colspan="5">
						<table cellpadding="0" cellspacing="0" border="0" class="options-table">
							<?php foreach($counties as $county): ?>
							<?php if(strlen($county)): ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[counties][]', $county); ?><span class="button-remove"></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[counties][]'); ?><span class="button-add"></span></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Education Programs</th>
					<td colspan="5">
						<table cellpadding="0" cellspacing="0" border="0" class="options-table">
							<?php foreach($education_programs as $education_program): ?>
							<?php if(strlen($education_program)): ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[education_programs][]', $education_program); ?><span class="button-remove"></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[education_programs][]'); ?><span class="button-add"></span></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Presenter Type</th>
					<td colspan="5">
						<table cellpadding="0" cellspacing="0" border="0" class="options-table">
							<?php foreach($presenter_types as $presenter_type): ?>
							<?php if(strlen($presenter_type)): ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[presenter_types][]', $presenter_type); ?><span class="button-remove"></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[presenter_types][]'); ?><span class="button-add"></span></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Program Type</th>
					<td colspan="5">
						<table cellpadding="0" cellspacing="0" border="0" class="options-table">
							<?php foreach($program_types as $program_type): ?>
							<?php if(strlen($program_type)): ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[program_types][]', $program_type); ?><span class="button-remove"></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[program_types][]'); ?><span class="button-add"></span></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Event Type</th>
					<td colspan="5">
						<table cellpadding="0" cellspacing="0" border="0" class="options-table">
							<?php foreach($event_types as $event_type): ?>
							<?php if(strlen($event_type)): ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[event_types][]', $event_type); ?><span class="button-remove"></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[event_types][]'); ?><span class="button-add"></span></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Engagement Type</th>
					<td colspan="5">
						<table cellpadding="0" cellspacing="0" border="0" class="options-table">
							<?php foreach($engagement_types as $engagement_type): ?>
							<?php if(strlen($engagement_type)): ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[engagement_types][]', $engagement_type); ?><span class="button-remove"></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[engagement_types][]'); ?><span class="button-add"></span></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Target Audience</th>
					<td colspan="5">
						<table cellpadding="0" cellspacing="0" border="0" class="options-table">
							<?php foreach($target_audiences as $target_audience): ?>
							<?php if(strlen($target_audience)): ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[target_audiences][]', $target_audience); ?><span class="button-remove"></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[target_audiences][]'); ?><span class="button-add"></span></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">SPA</th>
					<td colspan="5">
						<table cellpadding="0" cellspacing="0" border="0" class="options-table">
							<?php foreach($SPA as $spa): ?>
							<?php if(strlen($spa)): ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[SPA][]', $spa); ?><span class="button-remove"></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[SPA][]'); ?><span class="button-add"></span></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Grant / Program</th>
					<td colspan="5">
						<table cellpadding="0" cellspacing="0" border="0" class="options-table">
							<?php foreach($grant_programs as $grant_program): ?>
							<?php if(strlen($grant_program)): ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[grant_programs][]', $grant_program); ?><span class="button-remove"></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[grant_programs][]'); ?><span class="button-add"></span></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Care Consultation Levels</th>
					<td colspan="5">
						<table cellpadding="0" cellspacing="0" border="0" class="options-table">
							<?php foreach($care_levels as $care_level): ?>
							<?php if(strlen($care_level)): ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[care_levels][]', $care_level); ?><span class="button-remove"></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[care_levels][]'); ?><span class="button-add"></span></td>
							</tr>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
<p><?php echo form_submit('gs_save', 'Save Settings'); ?></p>
</div>

<?php echo form_hidden('gs_save_settings', 'save'); ?>
<?php form_close(); ?>

<script type="text/javascript">
jQuery(document).ready(function($) 
{
	$('.button-add').click(function() {
		var clone = $(this).parent('td').parent('tr').clone();
		clone.find('input').val('');
		clone.find('span').removeClass('button-add').addClass('button-remove');

		$(this).parents('.options-table').append(clone);
	});

	$('.button-remove').live('click', function() {
		$(this).parent('td').parent('tr').remove();
	});
});

</script>


<?php load_footer() ?>