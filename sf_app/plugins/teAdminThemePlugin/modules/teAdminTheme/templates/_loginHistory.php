<h2>Login History</h2>
<table id="te_login_history" width="100%">
<?php foreach($users as $user) { ?>
	<tr>
		<td><?php echo link_to($user -> getUsername(), "sf_guard_user_edit", $user); ?></td>
		<td>
			<?php echo time_ago_in_words($user -> getLastLogin("U")); ?> ago <br /><span class="note">(<?php echo $user -> getLastLogin(); ?>)</span>
		</td>
	</tr>
<?php } ?>
</table>