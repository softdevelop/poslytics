<div class="loginpanel">
    <div class="loginpanelinner">
	<?php echo $this->Session->flash(); ?>
	<?php if(!$this->Session->read('UserAuth')){?>
        <div class="logo animate0 bounceIn"><img src="/images/logo.png" alt="" /></div>
        <?php echo $this->Form->create('User', array('action' => 'login')); ?>
            <div class="inputwrapper login-alert">
                <div class="alert alert-error">Invalid username or password</div>
            </div>
            <div class="inputwrapper animate1 bounceIn">
				<?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'required'=>'required', 'autofocus'=>'autofocus','pattern'=>'[0-9a-zA-Z(?=.*\W+)]{4,32}',
'placeholder'=>'Enter any username'))?>
            </div>
            <div class="inputwrapper animate2 bounceIn">
				<?php echo $this->Form->input("password" ,array('label' => false,'div' => false,"type"=>"password",'required'=>'required', 'autofocus'=>'autofocus','pattern'=>'[0-9a-zA-Z(?=.*\W+)]{4,32}',
'placeholder'=>'Enter any password'))?>
            </div>
            <div class="inputwrapper animate3 bounceIn">
                <button name="submit">Sign In</button>
            </div>
            <div class="inputwrapper animate4 bounceIn">
                <label><input type="checkbox" class="remember" name="signin" /> Keep me sign in</label>
            </div>
            
          <?php echo $this->Form->end(); ?>
		<?php }?>
    </div><!--loginpanelinner-->
</div><!--loginpanel-->
<script>
document.getElementById("UserEmail").focus();
</script>