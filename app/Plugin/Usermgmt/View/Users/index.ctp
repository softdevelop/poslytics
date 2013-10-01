<a href="<?php echo $this->Html->url('/addUser');?>" class="btn btn-primary btn-rounded"> <i class="icon-user"></i>Add user</a>
<?php 
if($this->Session->read('UserAuth.UserGroup.id')==1){?>
<a href="<?php echo $this->Html->url('/permissions');?>" class="btn btn-primary btn-rounded"> <i class="icon-user"></i>Permissions</a>
<?php }?>
<h4 class="widgettitle">Total Users</h4>
	<table class="table table-bordered table-infinite" id="dyntable2">
		<colgroup>
			<col class="con0" style="align: center; width: 4%" />
			<col class="con1" />
			<col class="con0" />
			<col class="con1" />
			<col class="con0" />
			<col class="con1" />
		</colgroup>
		<thead>
			<tr>
				<th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
				<th class="head0"><?php echo __('Fullname');?></th>
				<th class="head1"><?php echo __('Username');?></th>
				<th class="head0"><?php echo __('Group');?></th>
				<th class="head1"><?php echo __('Email');?></th>
				<th class="head0"><?php echo __('Created');?></th>
				<th class="head0"><?php echo __('Action');?></th>
			</tr>
		</thead>
		<tbody>
		<?php      
     		if (!empty($users)) {
					foreach ($users as $row) {
		?>
			<tr class="gradeX">
				<td class="aligncenter"><span class="center">
                            <input type="checkbox" />
                          </span></td>
				<td><?php echo h($row['User']['last_name']);?></td>
				<td><?php echo h($row['User']['username']);?></td>
				<td><?php echo h($row['UserGroup']['name']);?></td>
				<td><?php echo h($row['User']['email']);?></td>
				<td><?php echo h($row['User']['created']);?></td>
				<td>
					<a href="<?php echo $this->Html->url('/viewUser/'.$row['User']['id']); ?>"><i class=" iconsweets-trashcan2"></i></a>
					<a href="<?php echo $this->Html->url('/editUser/'.$row['User']['id']); ?>"><i class="iconsweets-bag"></i></a>
					<a href="<?php echo $this->Html->url('/changeUserPassword/'.$row['User']['id']); ?>"><i class="iconsweets-abacus"></i></a>
					<a href="<?php echo $this->Html->url('/deleteUser/'.$row['User']['id']); ?>"><i class="iconsweets-trashcan"></i></a>
				</td>
			</tr>
			<?php }
						} else {
							echo "<tr><td colspan=8><br/><br/>No Data</td></tr>";
						} ?>
		</tbody>
	</table