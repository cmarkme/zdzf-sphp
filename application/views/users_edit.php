<?php load_header() ?>
<h1>Edit User - <?php echo $user->user_name ?></h1>
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

		<?php echo form_open(site_url('users/edit/'.$this->uri->segment('3'))) ?>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr class="ui-helper-reset">
					<th>First Name</th>
					<td><?php echo form_input('meta[first_name]', @$user->meta['first_name']) ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Last Name</th>
					<td><?php echo form_input('meta[last_name]', @$user->meta['last_name']) ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>User Name</th>
					<td><?php echo form_input('user_name', $user->user_name) ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>User Email</th>
					<td><?php echo form_input('user_email', $user->user_email) ?></td>
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
					<td><?php echo form_dropdown('user_status', array('active' => 'Active', 'inactive' => 'Inactive'), $user->user_status) ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Manager</th>
					<td><?php echo form_dropdown('user_manager', $users, $user->user_manager) ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Available Accounts</th>
					<td><?php echo form_multiselect('accounts[]', $accounts, unserialize(base64_decode($user->accounts)), 'size=10') ?></td>
				</tr>
			</tbody>
		</table>

		<p>
			<?php echo form_submit('submit_user', 'Update User') ?>
		</p>
		<?php echo form_hidden('update_user', true) ?>
		<?php echo form_close(); ?>
	</div>
</div>
<?php load_footer() ?>