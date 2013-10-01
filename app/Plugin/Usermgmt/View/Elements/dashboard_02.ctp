<?php //echo h($user['User']['username']); ?>
<!-- Quản lý tài khoản Cá nhân -->
<div class="list2">
    <span  class="umstyle6"><?php echo $this->Html->image('z-icon1.png',array('alt'=>'sdc')) ?> Cá nhân</span>
</div>
<div class="list1 <?php if($this->request->params['controller']=='users' && $this->request->params['action']=='myprofile') echo "selected"; ?>">
    <span  class="umstyle6">
        <?php echo $this->Html->link(__("Thông tin cá nhân",true),"/myprofile") ?>
    </span>
</div>
<div class="list1 last1 <?php if($this->request->params['controller']=='users' && $this->request->params['action']=='changePassword') echo "selected"; ?>">
    <span  class="umstyle6">
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
<?php if($this->UserAuth->getGroupName()=='Admin') { ?>
    <!-- Quản lý Bảng lương -->
    <div class="list2">
        <span  class="umstyle6"><?php echo $this->Html->image('z-icon2.png',array('alt'=>'sdc')) ?> Bảng lương</span>
    </div>    
    <div class="list1 <?php if($this->request->params['controller']=='payrolls' && $this->request->params['action']=='upload') echo "selected"; ?>">
        <span  class="umstyle6">
            <?php echo $this->Html->link(__("Upload bảng lương",true),"/payrolls/upload") ?>
        </span>
    </div>
    <div class="list1 last1 <?php if($this->request->params['controller']=='payrolls' && $this->request->params['action']=='allPayrolls') echo "selected"; ?>">
        <span  class="umstyle6">
            <?php echo $this->Html->link(__("Danh mục bảng lương",true),"/payrolls/allPayrolls") ?>
        </span>
    </div>
    <!-- 
    <div class="list1 last1 <?php //if($this->request->params['controller']=='payrolls' && $this->request->params['action']=='statistics') echo "selected"; ?>">
        <span  class="umstyle6">
            <?php //echo $this->Html->link(__("Thống kê",true),"/payrolls/statistics") ?>
        </span>
    </div>                   
    -->
    <!-- Kết thúc Quản lý Bảng lương --> 
    <!-- Quản lý tài khoản Nhân viên -->
    <div class="list2">
        <span  class="umstyle6"><?php echo $this->Html->image('z-icon3.png',array('alt'=>'sdc')) ?> Nhân viên</span>
    </div>
    <!--<div class="list1 <?php //if($this->request->params['controller']=='users' && $this->request->params['action']=='createList') echo "selected"; ?>">
        <span  class="umstyle6">
            <?php //echo $this->Html->link(__("Tạo danh sách",true),"/createList") ?>
        </span>
    </div>    
    <div class="list1 <?php //if($this->request->params['controller']=='users' && $this->request->params['action']=='addUser') echo "selected"; ?>">
        <span  class="umstyle6">
            <?php //echo $this->Html->link(__("Thêm nhân viên",true),"/addUser") ?>
        </span>
    </div>-->
    <div class="list1 <?php if($this->request->params['controller']=='users' && $this->request->params['action']=='index') echo "selected"; ?>">
        <span  class="umstyle6">
            <?php echo $this->Html->link(__("Danh sách nhân viên",true),"/allUsers") ?>
        </span>
    </div>
   <!--<div class="list1 <?php //if($this->request->params['controller']=='accounts' && $this->request->params['action']=='add') echo "selected"; ?>">
        <span  class="umstyle6">
            <?php //echo $this->Html->link(__("Tạo số tài khoản",true),"/accounts/add") ?>
        </span>
    </div>--> 
      <div class="list1 <?php if($this->request->params['controller']=='accounts' && $this->request->params['action']=='index') echo "selected"; ?>">
        <span  class="umstyle6">
            <?php echo $this->Html->link(__("Danh sách số tài khoản",true),"/accounts") ?>
        </span>
    </div> 
    <!--<div class="list1 <?php //if($this->request->params['controller']=='user_groups' && $this->request->params['action']=='addGroup') echo "selected"; ?>">
        <span  class="umstyle6">
            <?php //echo $this->Html->link(__("Tạo nhóm người dùng",true),"/addGroup") ?>
        </span>
    </div>-->
    <div class="list1 <?php if($this->request->params['controller']=='user_groups' && $this->request->params['action']=='index') echo "selected"; ?>">
        <span  class="umstyle6">
            <?php echo $this->Html->link(__("Danh mục nhóm",true),"/allGroups") ?>
        </span>
    </div>
    <!--
    <div class="list1 last1 <?php //if($this->request->params['controller']=='user_group_permissions' && $this->request->params['action']=='index') echo "selected"; ?>">
        <span  class="umstyle6">
            <?php //echo $this->Html->link(__("Phân quyền người dùng",true),"/permissions") ?>
        </span>
    </div>
    -->
<?php   } else{?>
    <div class="list2">
        <span  class="umstyle6"><?php echo $this->Html->image('z-icon2.png',array('alt'=>'sdc')) ?> Tra cứu thu nhập</span>
    </div>    
    <div class="list1 <?php if($this->request->params['controller']=='payrolls' && $this->request->params['action']=='allPayrolls') echo "selected"; ?>">
        <span  class="umstyle6">
            <?php echo $this->Html->link(__("Danh mục bảng lương",true),"/payrolls/allPayrolls") ?>
        </span>
    </div> 
    <div class="list1 last1 <?php if($this->request->params['controller']=='payrolls' && $this->request->params['action']=='statistics') echo "selected"; ?>">
        <span  class="umstyle6">
            <?php echo $this->Html->link(__("Thống kê",true),"/payrolls/statistics") ?>
        </span>
    </div>    
<?php }?>
