
<h4 class="widgettitle">Total Transactions</h4>
<div style="width: 100%; height: 61px;">
	<div style="float:right;margin-left:38px;">
	<label>Date Start</label>
	<span class="field"><input id="datepickerStart" type="text" name="date" class="input-small" /></span>
	</div>
	<div style="float:right;">
	<label>Date End</label>
	<span class="field"><input id="datepickerEnd" type="text" name="date" class="input-small" /></span>
	</div>
</div>
	<table class="table table-bordered table-infinite" id="dyntable2">
		<colgroup>
			<col class="con0" style="align: center; width: 4%" />
			<col class="con1" />
			<col class="con0" />
			<col class="con1" />
			<col class="con0" />
			<col class="con1" />
			<col class="con0" />
		</colgroup>
		<thead>
			<tr>
				<th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
				<th class="head0"><?php echo __('TerminalID');?></th>
				<th class="head1"><?php echo __('Location');?></th>
				<th class="head0"><?php echo __('MerchantInfo');?></th>
				<th class="head1"><?php echo __('Amount');?></th>
				<th class="head0"><?php echo __('Transtype');?></th>
				<th class="head0"><?php echo __('Timestamp');?></th>
				<th class="head0"><?php echo __('Response');?></th>
				<th class="head0"><?php echo __('Action');?></th>
			</tr>
		</thead>
		<tbody>
		<?php 			
     		if (!empty($transactions)) {
					foreach ($transactions as $row) {
		?>
			<tr class="gradeX">
				<td class="aligncenter"><span class="center">
                            <input type="checkbox" />
                          </span></td>
				<td><?php echo h($row['Transaction']['terminalid']);?></td>
				<td><?php echo h($row['Transaction']['countrycode']);?></td>
				<td><?php echo h($row['Transaction']['merchantinfo']);?></td>
				<td><?php echo h($row['Transaction']['amount']);?></td>
				<td><?php echo h($row['Transaction']['transtype']);?></td>
				<td><?php echo h($row['Transaction']['timestamp']);?></td>
				<td><?php if($row['Transaction']['responsemessage']=='Approved'){?>
					<a href="" class="btn btn-success btn-small"><span class="icon-thumbs-up icon-white"></span> Approve</a>
				<?php }else{?>
					 <a href="" class="btn btn-small"><span class="icon-thumbs-down"></span> Reject</a>
				<?php }?>
				</td>
				<td>
					<a href="<?php echo $this->Html->url('/view/'.$row['Transaction']['id']); ?>"><i class=" iconsweets-trashcan2"></i></a>
					<a href="<?php echo $this->Html->url('/edit/'.$row['Transaction']['id']); ?>"><i class="icon-edit"></i></a>
					<a href="<?php echo $this->Html->url('/delete/'.$row['Transaction']['id']); ?>"><i class="iconsweets-trashcan"></i></a>
				</td>
			</tr>
			<?php }
						} else {
							echo "<tr><td colspan=8><br/><br/>No Data</td></tr>";
						} ?>
		</tbody>
	</table>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery("#datepickerStart").datepicker();
	jQuery("#datepickerEnd").datepicker();
});
</script>	