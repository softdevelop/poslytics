<!-- Quản lý tài khoản Nhân viên -->
<!--<div class="list2">
    <span  class="umstyle6"><?php //echo $this->Html->image('z-icon3.png',array('alt'=>'sdc')) ?> Nhân viên</span>
</div>
<div class="list1 <?php //if($this->request->params['controller']=='users' && $this->request->params['action']=='createList') echo "selected"; ?>">
    <span  class="umstyle6">
        <?php //echo $this->Html->link(__("Tạo danh sách",true),"/createList") ?>
    </span>
</div>-->
<div class="list1 first1 <?php if($this->request->params['controller']=='users' && $this->request->params['action']=='index') echo "selected"; ?>">
    <span  class="umstyle6">
        <?php echo $this->Html->image('z-icon2.png',array('alt'=>'sdc')) ?>  
        <?php echo $this->Html->link(__("Danh sách nhân viên",true),"/allUsers") ?>
    </span>
</div>    
<div class="list1 <?php if($this->request->params['controller']=='users' && $this->request->params['action']=='addUser') echo "selected"; ?>">
    <span  class="umstyle6">
        <?php echo $this->Html->image('contact-new.png',array('alt'=>'sdc')) ?>  
        <?php echo $this->Html->link(__("Thêm nhân viên",true),"/addUser") ?>
    </span>
</div>
  <div class="list1 <?php if($this->request->params['controller']=='accounts' && $this->request->params['action']=='index') echo "selected"; ?>">
    <span  class="umstyle6">
        <?php echo $this->Html->image('text_list_bullets.png',array('alt'=>'sdc')) ?>  
        <?php echo $this->Html->link(__("Danh sách số tài khoản",true),"/accounts") ?>
    </span>
</div> 
<div class="list1 <?php if($this->request->params['controller']=='accounts' && $this->request->params['action']=='add') echo "selected"; ?>">
    <span  class="umstyle6">
        <?php echo $this->Html->image('money.png',array('alt'=>'sdc')) ?>  
        <?php echo $this->Html->link(__("Tạo số tài khoản",true),"/accounts/add") ?>
    </span>
</div>
<div class="list1 <?php if($this->request->params['controller']=='user_groups' && $this->request->params['action']=='index') echo "selected"; ?>">
    <span  class="umstyle6">
        <?php echo $this->Html->image('User_group.png',array('alt'=>'sdc')) ?>  
        <?php echo $this->Html->link(__("Danh mục nhóm",true),"/allGroups") ?>
    </span>
</div>
<div class="list1 <?php if($this->request->params['controller']=='user_groups' && $this->request->params['action']=='addGroup') echo "selected"; ?>">
    <span  class="umstyle6">
        <?php echo $this->Html->image('user-group-new.png',array('alt'=>'sdc')) ?>  
        <?php echo $this->Html->link(__("Tạo nhóm người dùng",true),"/addGroup") ?>
    </span>
</div>
<div class="list1 last1 <?php if($this->request->params['controller']=='user_group_permissions' && $this->request->params['action']=='index') echo "selected"; ?>">
    <span  class="umstyle6">
        <?php echo $this->Html->image('users-icons.png',array('alt'=>'sdc')) ?>
        <?php echo $this->Html->link(__("Phân quyền",true),"/permissions") ?>
    </span>
</div>
