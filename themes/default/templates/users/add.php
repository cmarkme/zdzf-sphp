<?php load_header() ?>

<?php if ($this->session->flashdata('user')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('users') ?></p>
	</div>
<?php endif ?>

<h1>Add User</h1>

<?php echo form_open(site_url('users/add')) ?>
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
					<td><?php echo form_input('meta[first_name]', '', 'class="required"') ?></td>
				</tr>
				<tr class="ui-helper-reset">
					<th>Last Name</th>
					<td><?php echo form_input('meta[last_name]', '', 'class="required"') ?></td>
				</tr>
				<tr class="ui-helper-reset">
					<th>User Name</th>
					<td><?php echo form_input('user_name', $this->input->post('user_name')) ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>User Email</th>
					<td><?php echo form_input('user_email', $this->input->post('user_email')) ?></td>
				</tr>
				<tr class="ui-helper-reset">
					<th>Grant Matching</th>
					<td>
						<div class="buttonset">
							<?php echo form_radio(array('name' => 'meta[grant_matching]', 'value' => 'Yes', 'id' => 'grant_matching1')); ?><label for="grant_matching1">Yes</label>
							<?php echo form_radio(array('name' => 'meta[grant_matching]', 'value' => 'No', 'id' => 'grant_matching2')); ?><label for="grant_matching2">No</label>
						</div>
					</td>
				</tr>
				<tr class="ui-helper-reset">
					<th>User Role</th>
					<td><select name="user_group_id">
							<?php foreach ($user_roles as $role): ?>
								<option value="<?php echo $role->ID; ?>"><?php echo $role->name; ?></option>
							<?php endforeach ?>
						</select></td>
				</tr>

			<?php if (can_this_user('users_set_salary')): ?>
				<tr class="ui-helper-reset">
					<th>User Salary</th>
					<td><?php echo form_input('meta[salary]', '0.00', ' rel="num_only"') ?></td>
				</tr>
			<?php endif; ?>

			<?php if (can_this_user('users_set_fulltime')): ?>
				<tr class="ui-helper-reset">
					<th>Full Time</th>
					<td><?php echo form_input('meta[fulltime]', '0.00', ' rel="num_only"') ?></td>
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
				<?php echo display_user_settings(); ?>
				<tr class="ui-helper-reset">
					<th>Status</th>
					<td><?php echo form_dropdown('user_status', array('active' => 'Active', 'inactive' => 'Inactive')) ?></td>
				</tr>

				<tr class="ui-helper-reset">
					<th>Manager</th>
					<td><?php echo form_dropdown('user_manager', $users) ?></td>
				</tr>

				<tr>
					<th>UI Theme</th>
					<td><?php echo form_dropdown('meta[theme]', getThemeList()) ?></td>
				</tr>	

				<tr class="ui-helper-reset">
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
									
									</ul>
									</div>
								</td>
								<td>
									<div style="height: 300px; overflow: auto;">
									<ul id="available" class="connectedSortable ui-state-default">
									<?php foreach ($accounts as $key => $account): ?>
										<li class="ui-state-default" rel="<?php echo $key; ?>">
											<?php echo $account ?>
										</li>
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
		<?php echo form_submit('submit_user', 'Add User') ?>
	</p>
</div>
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