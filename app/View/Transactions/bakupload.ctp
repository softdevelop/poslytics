<h4 class="widgettitle">Post link json transactions</h4>
<div class="widgetcontent">
	<?php echo $this->Form->create('Transaction', array('action' => 'upload','type'=>'file')); ?>
		<div class="par control-group">
			<label class="control-label" for="firstname">Link json</label>
			<div class="controls">
			<?php echo $this->Form->input("upload" ,array('label' => false,'div' => false,'type'=>'text','class'=>"input-large"))?>
			</div>
		</div>
		<p class="stdformbutton">
				<?php echo $this->Form->Submit(__('Post link json'), array('div'=>false, 'class'=>'btn btn-primary'));?>
		</p>
	<?php echo $this->Form->end(); ?>
</div><!--widgetcontent-->