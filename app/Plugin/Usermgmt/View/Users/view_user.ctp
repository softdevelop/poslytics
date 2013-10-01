<?php echo $this->Session->flash(); ?>
<div id="dashboard-left" class="span8">
<table class="table table-bordered table-invoice">
	<tr>
		<td class="width30"><?php echo __('Group');?></td>
		<td class="width70"><strong><?php echo h($user['UserGroup']['name'])?></strong></td>
	</tr>
	<tr>
		<td><?php echo __('Username');?></td>
		<td><strong><?php echo h($user['User']['username'])?></strong></td>
	</tr>
	<tr>
		<td><?php echo __('Full name');?></td>
		<td><strong><?php echo h($user['User']['last_name'])?></strong></td>
	</tr>
	<tr>
		<td><?php echo __('Email');?></td>
		<td><strong><?php echo h($user['User']['email'])?></strong></td>
	</tr>
</table>		
</div><!--span8-->