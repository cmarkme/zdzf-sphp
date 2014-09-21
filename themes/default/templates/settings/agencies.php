<?php load_header() ?>

<?php if ($this->session->flashdata('admin')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('admin') ?></p>
	</div>
<?php endif ?>

<h1>Reference Agencies</h1>

<?php echo form_open(site_url('admin/reference_agencies')) ?>

<?php //start general information block ?>
<div class="ui-block wide">
	<h3><a href="#">&nbsp;</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0" class="clone-form">
			<tbody>
				<tr>
					<th style="width: 100px; vertical-align: top; padding-top: 10px;">Locations</th>
					<td colspan="5">
						<table cellpadding="0" cellspacing="0" border="0" class="options-table">
							<?php foreach($reference_agencies as $agency): ?>
							<?php if(strlen($agency)): ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[reference_agencies][]', $agency); ?><span class="button-remove"></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td class="no-border"><?php echo form_input('settings[reference_agencies][]'); ?><span class="button-add"></span></td>
							</tr>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
<p><?php echo form_submit('gs_save', 'Save Settings'); ?></p>
</div>

<?php echo form_hidden('save_agencies', 'save'); ?>
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