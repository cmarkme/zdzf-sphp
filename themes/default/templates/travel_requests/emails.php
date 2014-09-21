<?php load_header(); ?>

<?php if ($this->session->flashdata('travel')): ?>
	<div class="notice ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><?php echo $this->session->flashdata('travel') ?></p>
	</div>
<?php endif ?>

<h1>Emails</h1>

<?php echo form_open('travel/emails', '', array('save_emails' => 'true')); ?>
<div class="ui-block wide">
	<h3><a href="#">&nbsp;</a></h3>
	<div>
		<div class="emails tabs">
			<ul>
				<li><a href="#submit_for_approval">Submit For Approval</a></li>
				<li><a href="#approve">Approved</a></li>
				<li><a href="#send_back_to_user">Send Back to User</a></li>
			</ul>

			<div id="submit_for_approval">
				<table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<th>Send To</th>
						<td class="email-field"><?php echo form_input('email[submit_for_approval][to]', $submit_for_approval['to']); ?></td>
						<td><small>You can enter [user], [manager] or an actual email address</small></td>
					</tr>
					<tr>
						<th>Subject</th>
						<td class="email-field"><?php echo form_input('email[submit_for_approval][subject]', $submit_for_approval['subject']); ?></td>
						<td></td>
					</tr>
					<tr>
						<th class="message-header">Message</th>
						<td class="email-field"><?php echo form_textarea('email[submit_for_approval][message]', $submit_for_approval['message'], 'class="ckeditor"'); ?></td>
						<td class="message-header">Shortcodes available in this email: <br>
							[first_name], [last_name], [email], [manager_first_name], [manager_last_name], [current_status], [month_of], [date_created]</td>
					</tr>
				</table>
				<p><?php echo form_submit('save', 'Save'); ?></p>
			</div>

			<div id="approve">
				<table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<th>Send To</th>
						<td class="email-field"><?php echo form_input('email[approve][to]', $approve['to']); ?></td>
						<td><small>You can enter [user], [manager] or an actual email address</small></td>
					</tr>
					<tr>
						<th>Subject</th>
						<td class="email-field"><?php echo form_input('email[approve][subject]', $approve['subject']); ?></td>
						<td></td>
					</tr>
					<tr>
						<th class="message-header">Message</th>
						<td class="email-field"><?php echo form_textarea('email[approve][message]', $approve['message'], 'class="ckeditor"'); ?></td>
						<td class="message-header">Shortcodes available in this email: <br>
							[first_name], [last_name], [email], [manager_first_name], [manager_last_name], [current_status], [month_of], [date_created]</td>
					</tr>
				</table>
				<p><?php echo form_submit('save', 'Save'); ?></p>
			</div>

			<div id="send_back_to_user">
				<table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<th>Send To</th>
						<td class="email-field"><?php echo form_input('email[send_back_to_user][to]', $send_back_to_user['to']); ?></td>
						<td><small>You can enter [user], [manager] or an actual email address</small></td>
					</tr>
					<tr>
						<th>Subject</th>
						<td class="email-field"><?php echo form_input('email[send_back_to_user][subject]', $send_back_to_user['subject']); ?></td>
						<td></td>
					</tr>
					<tr>
						<th class="message-header">Message</th>
						<td class="email-field"><?php echo form_textarea('email[send_back_to_user][message]', $send_back_to_user['message'], 'class="ckeditor"'); ?></td>
						<td class="message-header">Shortcodes available in this email: <br>
							[first_name], [last_name], [email], [manager_first_name], [manager_last_name], [current_status], [month_of], [date_created]</td>
					</tr>
				</table>
				<p><?php echo form_submit('save', 'Save'); ?></p>
			</div>
		</div>
	</div>
</div>
<?php echo form_close() ?>
<?php load_footer(); ?>