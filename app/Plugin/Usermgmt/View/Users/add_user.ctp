<?php echo $this->Form->create('User', array('action' => 'addUser')); ?>
<div class="widgetbox personal-information">
	<h4 class="widgettitle">Add User</h4>
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
			<label>Password:</label>
			<?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"input-xlarge",'required'=>'required','autofocus'=>'autofocus', 'pattern'=>'[0-9a-zA-Z(?=.*\W+)]{6,32}', 'title'=>'Password from 6 to 32 chars' ))?>
		</p>
		<p>
			<label>RePassword:</label>
			<?php echo $this->Form->input("cpassword" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"input-xlarge",'autofocus','required','title'=>'RePassword','onfocus'=>'validatePass(document.getElementById("UserPassword"), this);','oninput'=>'validatePass(document.getElementById("UserPassword"), this);' ))?>
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
<?php echo $this->Form->Submit(__('Add User'), array('div'=>false, 'class'=>'btn btn-primary'));?>
</p>
<?php echo $this->Form->end(); ?>
<script>
    document.getElementById("UserUserGroupId").focus();
</script>
<script type="text/javascript">
    function validatePass(p1, p2) {
        if (p1.value != p2.value || p1.value == '' || p2.value == '') {
            p2.setCustomValidity('Password confirmation not match');
        } else {
            p2.setCustomValidity('');
        }
    }
     $(document).ready(function(){
        $('#UserUserGroupId option:first-child').hide().attr('disabled','disabled').text('Select group');  
    })
</script>