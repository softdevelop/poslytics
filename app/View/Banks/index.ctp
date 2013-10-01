<a href="<?php echo $this->Html->url('add');?>" class="btn btn-primary btn-rounded"> <i class="icon-transaction"></i>Add transaction</a>
<h4 class="widgettitle">Total Transactions</h4>
	<table id="dyntable" class="table table-bordered responsive">
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
				<th class="head0"><?php echo __('STT');?></th>
				<th class="head0"><?php echo __('TerminalID');?></th>
				<th class="head1"><?php echo __('Location');?></th>
				<th class="head0"><?php echo __('MerchantInfo');?></th>
				<th class="head1"><?php echo __('Amount');?></th>
				<th class="head0"><?php echo __('Transtype');?></th>
				<th class="head0"><?php echo __('Timestamp');?></th>
				<th class="head0"><?php echo __('Action');?></th>
			</tr>
		</thead>
		<tbody>
		<?php 		
     		if (!empty($transactions)) {
					$sl=0;
					foreach ($transactions as $row) {
						$sl++;
		?>
			<tr class="gradeX">
			  <td class="aligncenter"><span class="center">
				<input type="checkbox" />
			  </span></td>
				<td><?php echo $sl;?></td>
				<td><?php echo h($row['Transaction']['terminalid']);?></td>
				<td><?php echo h($row['Transaction']['countrycode']);?></td>
				<td><?php echo h($row['Transaction']['merchantinfo']);?></td>
				<td><?php echo h($row['Transaction']['amount']);?></td>
				<td><?php echo h($row['Transaction']['transtype']);?></td>
				<td><?php echo h($row['Transaction']['timestamp']);?></td>
				<td>
					<a href="<?php echo $this->Html->url('/view/'.$row['Transaction']['id']); ?>"><i class=" iconsweets-trashcan2"></i></a>
					<a href="<?php echo $this->Html->url('/edit/'.$row['Transaction']['id']); ?>"><i class="iconsweets-bag"></i></a>
					<a href="<?php echo $this->Html->url('/delete/'.$row['Transaction']['id']); ?>"><i class="iconsweets-trashcan"></i></a>
				</td>
			</tr>
			<?php }
						} else {
							echo "<tr><td colspan=8><br/><br/>No Data</td></tr>";
						} ?>
		</tbody>
	</table