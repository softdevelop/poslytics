<?php echo $this->Form->create('User'); ?>
<div class="widgetbox personal-information">
	<h4 class="widgettitle">Personal Information</h4>
	<div class="widgetcontent">
	<?php echo $this->Form->input("id" ,array('type' => 'hidden', 'label' => false,'div' => false))?>
		<p>
			<label>Group:</label>
			<?php echo $this->Form->input("user_group_id" ,array('type' => 'select', 'label' => false,'div' => false,'class'=>"input-xlarge", 'disabled' ))?>
		
		</p>
		<p>
			<label>Username:</label>
			<?php echo $this->Form->input("username" ,array('label' => false,'div' => false,'class'=>"input-xlarge",'disabled' ))?>
		</p>
		<p>
			<label>Fullname:</label>
			<?php echo $this->Form->input("last_name" ,array('label' => false,'div' => false,'class'=>"input-xlarge" ))?>
		</p>
		<p>
			<label>Email:</label>
			<?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"input-xlarge" ))?>
		</p>
	</div>
</div>
<p>
<?php echo $this->Form->Submit(__('Update Profile'), array('div'=>false, 'class'=>'btn btn-primary'));?>
</p>
<?php echo $this->Form->end(); ?>