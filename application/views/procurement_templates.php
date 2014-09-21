<?php load_header(); ?>
<h1>Current Templates <?php echo anchor('procurement/new_template', 'Add New', array('class' => 'button ui-helper-reset')); ?></h1>

<div class="ui-block wide">
	<h3><a href="#">Templates</a></h3>
	<div>
		<?php echo $this->pagination->create_links(); ?>
		
		<?php echo form_open(site_url('template')) ?>

		<table cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
					<th>Date Created</th>
					<th>Template Name</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($templates)): foreach($templates as $template): ?>
				
				<tr class="ui-helper-reset">
					<td><?php echo date_for_display($template->date_created); ?></td>
					<td><?php echo $template->template_name; ?></td>

					<td>
						<?php echo anchor('procurement/edit/'.$template->ID, 'edit'); ?>/<?php echo anchor('procurement/delete/'.$template->ID, 'delete', array('class' => 'delete')); ?>/<?php echo anchor('procurement/create/'.$template->ID, 'create'); ?>
					</td>
				</tr>
				<?php endforeach; else: ?>
				<tr class="ui-helper-reset">
					<td colspan="8">
						<h2><?php echo $this->config->item('empty_message') ?></h2>
					</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
		<br />
		<?php echo $this->pagination->create_links(); ?>

		<?php echo form_close(); ?>
	</div>
</div>

<?php load_footer(); ?>