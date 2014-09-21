<?php load_header() ?>

<?php if ($this->session->flashdata('admin')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('admin') ?></p>
	</div>
<?php endif ?>

<h1>Assumptions</h1>

<?php echo form_open(site_url('admin/general')) ?>

<?php //start general information block ?>
<div class="ui-block wide">
	<h3><a href="#">General</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th style="width: 300px;">Mileage Rate</th>
					<td colspan="5">
						<?php echo form_input('settings[mileage_rate]', $mileage_rate); ?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="ui-block wide">
	<h3><a href="#">Assumptions</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th style="width: 300px;">Monthly Medical Insurance Premium</th>
					<td colspan="5">
						<?php echo form_input('settings[monthly_medical_insurance_premium]', $monthly_medical_insurance_premium); ?>
					</td>
				</tr>
				<tr>
					<th style="width: 300px;">Monthly Supplemental Insurance Premium</th>
					<td colspan="5">
						<?php echo form_input('settings[monthly_dental_insurance_premium]', $monthly_dental_insurance_premium); ?>
					</td>
				</tr>
				<tr>
					<th style="width: 300px;">Monthly Vision Insurance Premium</th>
					<td colspan="5">
						<?php echo form_input('settings[monthly_vision_insurance_premium]', $monthly_vision_insurance_premium); ?>
					</td>
				</tr>
				<tr>
					<th style="width: 300px;">Monthly Life Insurance Premium</th>
					<td colspan="5">
						<?php echo form_input('settings[monthly_live_insurance_premium]', $monthly_live_insurance_premium); ?>
					</td>
				</tr>
				<tr>
					<th style="width: 300px;">Workers comp Insurance Premium</th>
					<td colspan="5">
						<?php echo form_input('settings[workers_comp_insurance_premium]', $workers_comp_insurance_premium); ?>
					</td>
				</tr>
				<tr>
					<th style="width: 300px;">Social Security/Medicare Premium</th>
					<td colspan="5">
						<?php echo form_input('settings[social_security_medical_premium]', $social_security_medical_premium); ?>
					</td>
				</tr>
				<tr>
					<th style="width: 300px;">Unemployment</th>
					<td colspan="5">
						<?php echo form_input('settings[unemployment]', $unemployment); ?>
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