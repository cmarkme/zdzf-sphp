<?php load_header() ?>
<?php if ($this->session->flashdata('updated')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>Settings have been updated</p>
	</div>
<?php endif ?>
<h1>Edit Role - <?php echo $name; ?> <?php echo anchor('users/add_role', 'Add New', array('class' => 'button ui-helper-reset')); ?></h1>

<?php echo form_open(site_url('users/edit_role/'.$id)) ?>
<div class="ui-block wide">
	<h3><a href="#">Current role settings</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th><label for="name">Role Name</label></th>
					<td colspan="3"><?php echo form_input('name', $name); ?></td>
				</tr>
				<tr>
					<th><label for="name">Role Description</label></th>
					<td colspan="3"><?php echo form_textarea('description', $description); ?></td>
				</tr>

				<tr>
					<?php $i = 1; foreach ($cap_list as $cap): ?>
					<td style="vertical-align: top;">
						<ul class="no-bullets">
							<li>
								<?php echo form_checkbox('caps[]', $cap['controller'], (in_array($cap['controller'], $caps) ? TRUE : FALSE)); ?>&nbsp;<strong><?php echo $cap['name'] ?></strong>
								<?php if (isset($cap['subs']) && is_array($cap['subs'])): ?>
								<ul>
									<?php foreach ($cap['subs'] as $controller => $name): ?>
									<li><?php echo form_checkbox('caps[]', $controller, (in_array($controller, $caps) ? TRUE : FALSE)); ?>&nbsp;<?php echo $name ?></li>
									<?php endforeach ?>
								</ul>
								<?php endif ?>
							</li>
						</ul>
					</td>
					<?php if (($i % 4 == 0) && $i > 0): ?>
				</tr>
				<tr>
					<?php endif ?>
					<?php $i++; endforeach ?>
					<?php if (($i % 4 != 0)):$i--; ?>
					<?php while($i % 4 != 0): ?>
					<td></td>
					<?php $i++; endwhile; ?>
					<?php endif; ?>
				</tr>

			</tbody>
		</table>

	</div>
	<p>
		<?php echo form_submit('role_submit', 'Save Role') ?>
	</p>
</div>
<?php echo form_hidden('save_role', 'save_role'); ?>
<?php echo form_close(); ?>
<script type="text/javascript">
$(function(){
	$('td > ul > li > input[type=checkbox]').change(function() {
		if($(this).is(':checked'))
		{
			$(this).closest('ul').find('input').attr('checked', 'checked');
		}
		else
		{
			$(this).closest('ul').find('input').removeAttr('checked');	
		}
	});

	$('ul ul > li input[type=checkbox]').change(function() {
		if($(this).is(':checked'))
		{
			$(this).closest('td').find('input:first').attr('checked', 'checked');
		}
	});
})
</script>
<?php load_footer() ?>