<?php load_header() ?>
<h1>Users Roles <?php echo anchor('users/add_role', 'Add New Role', array('class' => 'button ui-helper-reset')); ?></h1>

<?php echo form_open(site_url('users')) ?>
<div class="ui-block wide">
	<h3><a href="#">Current site users</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<colgroup>
				<col style="width: 300px;">
				<col>
			</colgroup>
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($roles)): foreach($roles as $role): ?>
				<tr class="ui-helper-reset">
					<td><?php echo $role->name; ?></td>
					<td><?php echo $role->description; ?></td>
					<td>
						<?php echo anchor('users/edit_role/'.$role->ID, 'edit'); ?>/<?php echo anchor('users/delete_role/'.$role->ID, 'delete', array('class' => 'delete')); ?>
					</td>
				</tr>
				<?php endforeach; endif; ?>
			</tbody>
		</table>

	</div>
	<p>
		<?php echo form_submit('buld_submit', 'Submit Action') ?>
	</p>
</div>
<?php echo form_close(); ?>
<?php load_footer() ?>