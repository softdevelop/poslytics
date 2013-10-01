<h4 class="widgettitle">Upload Transactions</h4>
<div class="widgetcontent">
	<?php echo $this->Form->create('Transaction', array('action' => 'upload','type'=>'file')); ?>
		<div class="par">
			<label>File Upload</label>
			<div class="fileupload fileupload-new" data-provides="fileupload">
			<div class="input-append">
			<div class="uneditable-input span3">
				<i class="iconfa-file fileupload-exists"></i>
				<span class="fileupload-preview"></span>
			</div>
			<span class="btn btn-file"><span class="fileupload-new">Select file</span>
			<span class="fileupload-exists">Change</span>
			<input type="file" name = "data[Transaction][upload]"/></span>
			<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
			</div>
			</div>
		</div>	
		<p class="stdformbutton">
				<?php echo $this->Form->Submit(__('Add Transaction'), array('div'=>false, 'class'=>'btn btn-primary'));?>
		</p>
	<?php echo $this->Form->end(); ?>
</div><!--widgetcontent-->