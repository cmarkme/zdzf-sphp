<?php load_header() ?>

<?php if ($this->session->flashdata('admin')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('admin') ?></p>
	</div>
<?php endif ?>

<h1>Account Codes</h1>

<?php echo form_open(site_url('admin/account_codes')) ?>

<?php //start general information block ?>
<div class="ui-block wide">
	<h3><a href="#">Account Codes</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0" class="clone-form">
			<tbody>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Location</th>
					<td colspan="5">
						<table cellpadding="0" cellspacing="0" border="0" class="options-table">
							<?php foreach($locations as $key => $location): ?>
							<?php if(strlen($location)): ?>
							<tr>
								<td style="width: 160px;" class="no-border"><?php echo form_input('settings[locations][]', $locations[$key]); ?></td>
								<td class="no-border"><?php echo form_input('settings[location_des][]', @$location_des[$key], 'style="width: 400px;"'); ?><span class="button-remove"></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[locations][]'); ?></td>
								<td class="no-border"><?php echo form_input('settings[location_des][]', '', 'style="width: 400px;"'); ?><span class="button-add"></span></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Division</th>
					<td colspan="5">
						<table cellpadding="0" cellspacing="0" border="0" class="options-table">
							<?php foreach($divisions as $key => $division): ?>
							<?php if(strlen($division)): ?>
							<tr>
								<td style="width: 160px;" class="no-border"><?php echo form_input('settings[divisions][]', $divisions[$key]); ?></td>
								<td class="no-border"><?php echo form_input('settings[division_des][]', @$division_des[$key], 'style="width: 400px;"'); ?><span class="button-remove"></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[divisions][]'); ?></td>
								<td class="no-border"><?php echo form_input('settings[division_des][]', '', 'style="width: 400px;"'); ?><span class="button-add"></span></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Dept</th>
					<td colspan="5">
						<table cellpadding="0" cellspacing="0" border="0" class="options-table">
							<?php foreach($depts as $key => $dept): ?>
							<?php if(strlen($dept)): ?>
							<tr>
								<td style="width: 160px;" class="no-border"><?php echo form_input('settings[depts][]', $depts[$key]); ?></td>
								<td class="no-border"><?php echo form_input('settings[dept_des][]', @$dept_des[$key], 'style="width: 400px;"'); ?><span class="button-remove"></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[depts][]'); ?></td>
								<td class="no-border"><?php echo form_input('settings[dept_des][]', '', 'style="width: 400px;"'); ?><span class="button-add"></span></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Grant</th>
					<td colspan="5">
						<table cellpadding="0" cellspacing="0" border="0" class="options-table">
							<?php foreach($grants as $key => $grant): ?>
							<?php if(strlen($grant)): ?>
							<tr>
								<td style="width: 160px;" class="no-border"><?php echo form_input('settings[grants][]', $grants[$key]); ?></td>
								<td class="no-border"><?php echo form_input('settings[grant_des][]', @$grant_des[$key], 'style="width: 400px;"'); ?><span class="button-remove"></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[grants][]'); ?></td>
								<td class="no-border"><?php echo form_input('settings[grant_des][]', '', 'style="width: 400px;"'); ?><span class="button-add"></span></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Project</th>
					<td colspan="5">
						<table cellpadding="0" cellspacing="0" border="0" class="options-table">
							<?php foreach($projects as $key => $project): ?>
							<?php if(strlen($project)): ?>
							<tr>
								<td style="width: 160px;" class="no-border"><?php echo form_input('settings[projects][]', $projects[$key]); ?></td>
								<td class="no-border"><?php echo form_input('settings[project_des][]', @$project_des[$key], 'style="width: 400px;"'); ?><span class="button-remove"></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[projects][]'); ?></td>
								<td class="no-border"><?php echo form_input('settings[project_des][]', '', 'style="width: 400px;"'); ?><span class="button-add"></span></td>
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