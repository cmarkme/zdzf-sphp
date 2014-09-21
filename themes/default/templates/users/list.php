<?php load_header() ?>

<?php if ($this->session->flashdata('user')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('user') ?></p>
	</div>
<?php endif ?>

<h1>Users <?php echo anchor('users/add', 'Add New', array('class' => 'button ui-helper-reset')); ?></h1>

<?php echo form_open(site_url('users')) ?>
<div class="ui-block wide">
	<h3><a href="#">Current site users</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
					<th><?php echo form_checkbox(array('name' => 'bulkselect', 'id' => 'bulkselect')) ?></th>
					<th>User Name</th>
					<th>User Email</th>
					<th>User Group</th>
					<th>Date Created</th>
					<th>Last Login</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($users)): foreach($users as $user): ?>
				<tr class="ui-helper-reset">
					<td><?php echo form_checkbox('b_action[]', $user->ID) ?></td>
					<td><?php echo $user->user_name; ?></td>
					<td><?php echo $user->user_email; ?></td>
					<td><?php echo $user->user_group; ?></td>
					<td><?php echo date('m-d-y h:i:s', strtotime($user->create_date)); ?></td>
					<td><?php echo date('m-d-y h:i:s', strtotime($user->last_login)); ?></td>
					<td><?php echo $user->user_status; ?></td>
					<td>
						<?php echo anchor('users/edit/'.$user->ID, 'edit'); ?>/<?php echo anchor('users/delete/'.$user->ID, 'delete', array('class' => 'delete')); ?>
					</td>
				</tr>
				<?php endforeach; endif; ?>
			</tbody>
		</table>

	</div>
	<p>
		<?php echo form_dropdown('bulk_action', array('bulk' => 'Bulk Actions', 'delete' => 'Delete', 'status_active' => 'Active', 'status_inactive' => 'Inactive')); ?>
		<?php echo form_submit('buld_submit', 'Submit Action') ?>
	</p>
</div>
<?php echo form_close(); ?>
<?php load_footer() ?>