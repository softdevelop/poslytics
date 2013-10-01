<?php //echo h($user['User']['username']); ?>
<!-- Quản lý tài khoản Cá nhân -->
<!--<div class="list2">
    <span  class="umstyle6"><?php //echo $this->Html->image('z-icon1.png',array('alt'=>'sdc')) ?> Cá nhân</span>
</div>-->
<div class="list1 first1 <?php if($this->request->params['action']=='myprofile') echo "selected"; ?>">
    <span  class="umstyle6">
        <?php echo $this->Html->image('profile.png',array('alt'=>'sdc')) ?>  
        <?php echo $this->Html->link(__("Thông tin cá nhân",true),"/myprofile") ?>
    </span>
</div>
<div class="list1 last1 <?php if($this->request->params['controller']=='users' && $this->request->params['action']=='changePassword') echo "selected"; ?>">
    <span  class="umstyle6">
        <?php echo $this->Html->image('change_password.png',array('alt'=>'sdc')) ?>  
        <?php echo $this->Html->link(__("Đổi mật khẩu",true),"/changePassword") ?>
    </span>
</div>
<!--
<div class="list1 last1">
    <span  class="umstyle6">
        <?php echo $this->Html->link(__("Đăng xuất",true),"/logout") ?>
    </span>
</div>
-->
<!-- Kết thúc Cá nhân -->