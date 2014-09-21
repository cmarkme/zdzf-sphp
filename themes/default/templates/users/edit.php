<?php load_header() ?>

<?php if ($this->session->flashdata('user')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('user') ?></p>
	</div>
<?php endif ?>

<h1>Edit User - <?php echo $user->user_name ?></h1>
<?php echo form_open(site_url('users/edit/'.$this->uri->segment('3'))) ?>
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

		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr class="ui-helper-reset">
					<th>First Name</th>
					<td><?php echo form_input('meta[first_name]', $user->meta['first_name'], 'class="required"') ?></td>
				</tr>
				<tr class="ui-helper-reset">
					<th>Last Name</th>
					<td><?php echo form_input('meta[last_name]', $user->meta['last_name'], 'class="required"') ?></td>
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
					<th>Grant Matching</th>
					<td>
						<div class="buttonset">
							<?php echo form_radio(array('name' => 'meta[grant_matching]', 'value' => 'Yes', 'id' => 'grant_matching1', 'checked' => ((isset($user->meta['grant_matching']) && $user->meta['grant_matching'] == 'Yes') ? TRUE : FALSE))); ?><label for="grant_matching1">Yes</label>
							<?php echo form_radio(array('name' => 'meta[grant_matching]', 'value' => 'No', 'id' => 'grant_matching2', 'checked' => ((isset($user->meta['grant_matching']) && $user->meta['grant_matching'] == 'No') ? TRUE : FALSE))); ?><label for="grant_matching2">No</label>
						</div>
					</td>
				</tr>
				<tr class="ui-helper-reset">
					<th>User Role</th>
					<td><select name="user_group_id">
							<?php foreach ($user_roles as $role): ?>
								<option value="<?php echo $role->ID; ?>" <?php echo ($user->user_group_id == $role->ID ? 'selected' : ''); ?>><?php echo $role->name; ?></option>
							<?php endforeach ?>
						</select></td>
				</tr>
				
			<?php if (can_this_user('users_set_salary')): ?>
				<tr class="ui-helper-reset">
					<th>User Salary</th>
					<td><?php echo form_input('meta[salary]', @$user->meta['salary'], ' rel="num_only"') ?></td>
				</tr>
			<?php endif; ?>
				
			<?php if (can_this_user('users_set_fulltime')): ?>
				<tr class="ui-helper-reset">
					<th>Full Time</th>
					<td><?php echo form_input('meta[fulltime]', @$user->meta['fulltime'], ' rel="num_only"') ?></td>
				</tr>
			<?php endif; ?>

				<tr class="ui-helper-reset">
					<th>User Password</th>
					<td><?php echo form_password('user_password') ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Confirm Password</th>
					<td><?php echo form_password('con_password') ?></td>
				</tr>
				<?php echo display_user_settings(true, $user); ?>
				<tr class="ui-helper-reset">
					<th>Status</th>
					<td><?php echo form_dropdown('user_status', array('active' => 'Active', 'inactive' => 'Inactive'), $user->user_status) ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Manager</th>
					<td><?php echo form_dropdown('user_manager', $users, $user->user_manager) ?></td>
				</tr>

				<tr>
					<th>UI Theme</th>
					<td><?php echo form_dropdown('meta[theme]', getThemeList(), $user->meta['theme']) ?></td>
				</tr>	

				<tr class="ui-helper-reset">
					<?php $current = unserialize(base64_decode($user->accounts)); ?>
					<th>Available Accounts</th>
					<td>
						<table>
							<thead>
								<tr>
									<th>Assigned Accounts</th>
									<th>Available Accounts</th>
								</tr>
							</thead>
							<tbody>
							<tr>
								<td>
									<div style="height: 300px; overflow: auto;">
									<ul id="current" class="connectedSortable ui-state-default">
									<?php foreach ($current as $key): ?>
										<?php if (array_key_exists($key, $accounts)): ?>
										<li class="ui-state-active" rel="<?php echo $key ?>">
											<?php echo $accounts[$key] ?>
											<?php echo form_hidden('accounts[]', $key); ?>
										</li>
										<?php endif ?>
									<?php endforeach ?>
									</ul>
									</div>
								</td>
								<td>
									<div style="height: 300px; overflow: auto;">
									<ul id="available" class="connectedSortable ui-state-default">
									<?php foreach ($accounts as $key => $account): ?>
									<?php if (!in_array($key, $current)): ?>
										<li class="ui-state-default" rel="<?php echo $key; ?>">
											<?php echo $account ?>
										</li>
									<?php endif ?>
									<?php endforeach ?>
									</ul>
									</div>
								</td>
							</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>

	</div>
	<p>
		<?php echo form_submit('submit_user', 'Update User') ?>
	</p>
</div>
<?php echo form_hidden('update_user', true) ?>
<?php echo form_close(); ?>

<script>
$(function() {
    $( "#current, #available" ).sortable({
        connectWith: ".connectedSortable",
        receive : function(e,u)
        {
        	if(u.sender[0].id == 'available')
        	{
        		var id = $(u.item[0]).attr('rel');
        		$(u.item[0]).append('<input type="hidden" name="accounts[]" value="'+id+'" />');
        	}
        	else
        	{
        		$(u.item[0]).find('input').remove();
        	}
        	
        }
    }).disableSelection();
});
</script>

<?php load_footer() ?>