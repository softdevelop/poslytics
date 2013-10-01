<?php echo $this->Form->create('User', array('action' => 'changePassword')); ?>
<div class="widgetbox personal-information">
	<h4 class="widgettitle">Change Password</h4>
	<div class="widgetcontent">
	<?php echo $this->Form->input("id" ,array('type' => 'hidden', 'label' => false,'div' => false))?>
		<p>
			<label>Old password:</label>
			<?php echo $this->Form->input("oldpassword" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"input-xlarge",'pattern'=>'[0-9a-zA-Z(?=.*\W+)]{6,32}','autofocus','required','title'=>'Input current password','autocomplete'=>'off' ))?>
		
		</p>
		<p>
			<label>New password:</label>
			<?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"input-xlarge",'pattern'=>'[0-9a-zA-Z(?=.*\W+)]{6,32}','autofocus','required','title'=>'Password fromt 6 to 32 chars' ))?>
		</p>
		<p>
			<label>Renew password:</label>
			<?php echo $this->Form->input("cpassword" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"input-xlarge",'autofocus','required','title'=>'Renew password','label'=>false,'onfocus'=>'validatePass(document.getElementById("UserPassword"), this);','oninput'=>'validatePass(document.getElementById("UserPasswords"), this);' ))?>
		</p>
	</div>
</div>
<p>
<?php echo $this->Form->Submit(__('Change Password'), array('div'=>false, 'class'=>'btn btn-primary'));?>
</p>
<?php echo $this->Form->end(); ?>
<script>
document.getElementById("UserPassword").focus();
</script>
<script type="text/javascript">
    function validatePass(p1, p2) {
        if (p1.value != p2.value || p1.value == '' || p2.value == '') {
            p2.setCustomValidity('Password confirmation not match');
        } else {
            p2.setCustomValidity('');
        }
    }
</script>