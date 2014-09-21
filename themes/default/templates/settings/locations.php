<?php load_header() ?>

<?php if ($this->session->flashdata('admin')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('admin') ?></p>
	</div>
<?php endif ?>

<h1>Office Locations</h1>

<?php echo form_open(site_url('admin/locations')) ?>

<?php //start general information block ?>
<div class="ui-block wide">
	<h3><a href="#">Office Locations</a></h3>
	<div>
		<table cellpadding="0" cellspacing="0" border="0" class="clone-form">
			<colgroup>
				<col style="width: 250px">
				<col style="width: 250px">
				<col>
			</colgroup>
			<thead>
				<tr>
					<th>Location</th>
					<th>Address</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($locations as $key => $location): ?>
				<?php if(strlen($location)): ?>
				<tr>
					<td class="no-border"><?php echo form_input('settings[office_locations][]', $locations[$key]); ?></td>
					<td class="no-border"><?php echo form_input('settings[office_location_address][]', @$location_addresses[$key]); ?></td>
					<td class="no-border"><?php echo form_input('settings[office_location_description][]', @$location_descriptions[$key]); ?><span class="button-remove"></span></td>
				</tr>
				<?php endif; ?>
				<?php endforeach; ?>
				<tr>
					<td class="no-border"><?php echo form_input('settings[office_locations][]'); ?></td>
					<td class="no-border"><?php echo form_input('settings[office_location_address][]'); ?></td>
					<td class="no-border"><?php echo form_input('settings[office_location_description][]'); ?><span class="button-add"></span></td>
				</tr>
			</tbody>
		</table>
	</div>
<p><?php echo form_submit('gs_save', 'Save Settings'); ?></p>
</div>

<?php echo form_hidden('save_locations', 'save'); ?>
<?php form_close(); ?>

<script type="text/javascript">
jQuery(document).ready(function($) 
{
	$('.button-add').click(function() {
		var clone = $(this).closest('tr').clone();
		clone.find('input').val('');
		clone.removeAttr('class')
		clone.find('span').removeClass('button-add').addClass('button-remove');

		$(this).closest('table').append(clone);
	});

	$('.button-remove').live('click', function() {
		$(this).closest('tr').remove();
	});
});

</script>


<?php load_footer() ?>