<div class="logo">
	<a href="<?php echo $this->Html->url('/');?>"><img src="/images/logo.png" alt="" /></a>
</div>
<div class="headerinner">
	<ul class="headmenu">
		<li class="odd">
			<a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->Html->url('/');?>">
				<span class="head-icon head-total-pos"></span>
				<span class="headmenu-label">Total POS</span>
			</a>
		</li>
		<li>
			<a class="dropdown-toggle" data-toggle="dropdown" data-target="<?php echo $this->Html->url('/');?>">
			<span class="head-icon head-active"></span>
			<span class="headmenu-label">Active POS</span>
			</a>
		</li>	
		<li class="odd">
			<a class="dropdown-toggle" data-toggle="dropdown" data-target="<?php echo $this->Html->url('/');?>">
			<span class="head-icon head-in-active"></span>
			<span class="headmenu-label">InActive POS</span>
			</a>
			
		</li>
		<li>
			<a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->Html->url('/transactions');?>">
			<span class="head-icon head-icon-cart"></span>
			<span class="headmenu-label">Total Trasaction</span>
			</a>
		</li>
		<li class="odd">
			<a class="dropdown-toggle" data-toggle="dropdown" data-target="<?php echo $this->Html->url('/');?>">
			<span class="head-icon head-bar"></span>
			<span class="headmenu-label">Total Money Spent</span>
			</a>
		</li>
		<li>
			<a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->Html->url('/allUsers');?>">
			<span class="head-icon head-users"></span>
			<span class="headmenu-label">Total Users</span>
			</a>
			
		</li>
		<li class="right">
			<div class="userloggedinfo">
				<img src="/images/photos/<?php
				if($this->Session->read('UserAuth.User.avatar') != '' && file_exists(ROOT.'/app/webroot/images/photos/'.$this->Session->read('UserAuth.User.UserAuth.User.avatar')))
					echo $this->Session->read('UserAuth.User.avatar');
				else echo 'thumb1.png';
				?>" alt="" />
				<div class="userinfo">
					<h5><?php echo $this->Session->read('UserAuth.User.last_name')?> <small>- <?php echo $this->Session->read('UserAuth.User.email')?></small></h5>
					<ul>
						<li><a href="<?php echo $this->Html->url('/editMyprofile');?>">Edit Profile</a></li>
						<li><a href="<?php echo $this->Html->url('/changePassword');?>">Change Password</a></li>
						<li><a href="<?php echo $this->Html->url('/logout');?>">Sign Out</a></li>
					</ul>
				</div>
			</div>
		</li>
	</ul><!--headmenu-->
</div>
