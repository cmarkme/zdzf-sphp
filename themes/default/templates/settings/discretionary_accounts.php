<?php load_header() ?>

<?php if ($this->session->flashdata('admin')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('admin') ?></p>
	</div>
<?php endif ?>

<h1>Discretionary Accounts</h1>

<?php echo form_open(site_url('admin/discretionary_accounts')) ?>

<?php //start general information block ?>
<div class="ui-block wide">
	<h3><a href="#">Discretionary Accounts</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0" class="clone-form options-table">
			<tbody>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Account</th>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Description</th>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">User Role</th>
				</tr>
				<?php foreach ($da_accounts as $key => $value): ?>
				<?php if (strlen($value)): ?>	
				<tr>
					<td><?php echo form_input('settings[da_accounts][]', $da_accounts[$key]); ?></td>
					<td><?php echo form_input('settings[da_descriptions][]', $da_descriptions[$key]); ?></td>
					<td><select name="settings[da_role_required][]">
							<option value="all">All Users</option>
							<?php foreach ($user_roles as $role): ?>
								<option value="<?php echo $role->name; ?>" <?php echo (($role->name == @$da_role_required[$key]) ? 'selected' : ''); ?>><?php echo $role->name; ?></option>
							<?php endforeach ?>
						</select>
					<span class="button-remove"></span></td>
				</tr>
				<?php endif ?>
				<?php endforeach ?>
				<tr>
					<td><?php echo form_input('settings[da_accounts][]'); ?></td>
					<td><?php echo form_input('settings[da_descriptions][]'); ?></td>
					<td><select name="settings[da_role_required][]">
							<option value="all">All Users</option>
							<?php foreach ($user_roles as $role): ?>
								<option value="<?php echo $role->name; ?>"><?php echo $role->name; ?></option>
							<?php endforeach ?>
						</select>
					<span class="button-add"></span></td>
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