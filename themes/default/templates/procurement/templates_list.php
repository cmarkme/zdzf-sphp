<?php load_header() ?>

<?php if ($this->session->flashdata('procurement')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('procurement') ?></p>
	</div>
<?php endif ?>

<h1>Current Templates <?php if (can_this_user('procurement/new_template')): ?>
<?php echo anchor('procurement/new_template', 'Add New Template', array('class' => 'button ui-helper-reset')); ?>
<?php endif ?>
</h1>

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
						<?php if (can_this_user('procurement/edit_template')): ?>
						<?php echo anchor('procurement/edit_template/'.$template->ID, 'edit'); ?>&nbsp;
						<?php endif ?>

						<?php if (can_this_user('procurement/delete_template')): ?>
						<?php echo anchor('procurement/delete_template/'.$template->ID, 'delete', array('class' => 'delete')); ?>
						<?php endif ?>
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