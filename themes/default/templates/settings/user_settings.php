<?php load_header() ?>

<?php if ($this->session->flashdata('admin')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('admin') ?></p>
	</div>
<?php endif ?>

<h1>User Settings</h1>

<?php echo form_open(site_url('admin/user_settings')) ?>
<?php $temp = $settings; ?>
<?php //start general information block ?>
<div class="ui-block wide">
	<h3><a href="#">Discretionary Accounts</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0" class="clone-form options-table">
			<tbody>
				<tr>
					<th style="vertical-align: top; padding-top: 10px;">Field Name</th>
					<th style="vertical-align: top; padding-top: 10px;">Field Type</th>
					<th style="vertical-align: top; padding-top: 10px;">Value(s)</th>
				</tr>
				<?php foreach ($settings['title'] as $key => $value): ?>
				<?php if (strlen($settings['title'][$key])): ?>
				<tr>
					<td width="260px"><?php echo form_input('settings[user_settings][title][]', $settings['title'][$key]); ?></td>
					<td><?php echo form_dropdown('settings[user_settings][type][]', array('text' => 'Text Input', 'select' => 'Select Input', 'textarea' => 'Text Area'), $settings['type'][$key], 'style="width: 100%;"'); ?></td>
					<td><?php echo form_input('settings[user_settings][value][]', $settings['value'][$key]); ?>
					<span class="button-remove"></span></td>
				</tr>
				<?php endif ?>
				<?php endforeach ?>
				<tr>
					<td width="260px"><?php echo form_input('settings[user_settings][title][]'); ?></td>
					<td><?php echo form_dropdown('settings[user_settings][type][]', array('text' => 'Text Input', 'select' => 'Select Input', 'textarea' => 'Text Area'), '', 'style="width: 100%;"'); ?></td>
					<td><?php echo form_input('settings[user_settings][value][]'); ?>
					<span class="button-add"></span></td>
				</tr>
			</tbody>
		</table>
	<p><small>For Select, Checkbox and Radio types enter options in value field separated by comma (,)</small></p>
	</div>
<p><?php echo form_submit('gs_save', 'Save Settings'); ?></p>
</div>

<?php echo form_hidden('save_user_settings', 'save'); ?>
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