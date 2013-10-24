<?php echo $this->Form->create('User', array('action' => 'editUser')); ?>
<div class="widgetbox personal-information">
	<h4 class="widgettitle">Edit User</h4>
	<div class="widgetcontent">
		<p>
			<label>Group:</label>
			<?php echo $this->Form->input("user_group_id" ,array('type' => 'select', 'label' => false,'div' => false,'class'=>"input-xlarge" ))?>
		
		</p>
		<p>
			<label>Username:</label>
			<?php echo $this->Form->input("username" ,array('label' => false,'div' => false,'class'=>"input-xlarge"))?>
		</p>
		<p>
			<label>Fullname:</label>
			<?php echo $this->Form->input("last_name" ,array('label' => false,'div' => false,'class'=>"input-xlarge" ))?>
		</p>
		<p>
			<label>Email:</label>
			<?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"input-xlarge" ))?>
		</p>
		<p>
			<label>Freeze this user:</label>
			<?php echo $this->Form->input("active" ,array('type' => 'select', 'options' => array('1' => 'No', '0' => 'Yes'), 'default' => '1', 'label' => false,'div' => false,'class'=>"input-xlarge" ))?>
		
		</p>
	</div>
</div>
<p>
<?php echo $this->Form->Submit(__('Save Changes'), array('div'=>false, 'class'=>'btn btn-primary'));?>
</p>
<?php echo $this->Form->end(); ?>