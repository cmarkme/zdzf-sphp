<?php load_header() ?>
<h1>Add User</h1>

<div class="ui-block wide">
	<h3><a href="#">User info</a></h3>
	<div>
		
		<?php 
		if(validation_errors()) {
			echo '<div id="errors">';
			echo validation_errors('<div class="ui-state-error ui-corner-all"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>', '</p></div>');
			echo '</div>';
		}
		?>

		<?php echo form_open(site_url('users/add')) ?>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr class="ui-helper-reset">
					<th>User Name</th>
					<td><?php echo form_input('user_name', $this->input->post('user_name')) ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>User Email</th>
					<td><?php echo form_input('user_email', $this->input->post('user_email')) ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>User Password</th>
					<td><?php echo form_password('user_password') ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Confirm Password</th>
					<td><?php echo form_password('con_password') ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Status</th>
					<td><?php echo form_dropdown('user_status', array('active' => 'Active', 'inactive' => 'Inactive')) ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Manager</th>
					<td><?php echo form_dropdown('user_manager', $users) ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Available Accounts</th>
					<td><?php echo form_multiselect('accounts[]', $accounts, '', 'size=10') ?></td>
				</tr>
			</tbody>
		</table>

		<p>
			<?php echo form_submit('submit_user', 'Add User') ?>
		</p>
		<?php echo form_close(); ?>
	</div>
</div>
<?php load_footer() ?>