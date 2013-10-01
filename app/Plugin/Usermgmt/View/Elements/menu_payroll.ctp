<?php if($this->UserAuth->getGroupName()=='Admin') { ?>
    <!-- Quản lý Bảng lương -->
    <!--<div class="list2">
        <span  class="umstyle6"><?php echo $this->Html->image('z-icon2.png',array('alt'=>'sdc')) ?> Bảng lương</span>
    </div>-->    
    <div class="list1 first1 <?php if($this->request->params['action']=='allPayrolls') echo "selected"; ?>">
        <span  class="umstyle6">
            <?php echo $this->Html->image('list.png',array('alt'=>'sdc')) ?>
            <?php echo $this->Html->link(__("Danh mục bảng lương",true),"/payrolls/allPayrolls") ?>
        </span>
    </div>
    <div class="list1 <?php if($this->request->params['controller']=='payrolls' && $this->request->params['action']=='upload') echo "selected"; ?>">
        <span  class="umstyle6">
            <?php echo $this->Html->image('Upload-icon.png',array('alt'=>'sdc')) ?> 
            <?php echo $this->Html->link(__("Upload bảng lương",true),"/payrolls/upload") ?>
        </span>
    </div>  
    <div class="list1 last1 <?php if($this->request->params['controller']=='payrolls' && (($this->request->params['action']=='statistics')||($this->request->params['action']=='statistic_detail'))) echo "selected"; ?>">
        <span  class="umstyle6">
            <?php echo $this->Html->image('Report.png',array('alt'=>'sdc')) ?> 
            <?php echo $this->Html->link(__("Thống kê",true),"/payrolls/statistics") ?>
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
    
<?php   } else{?>    
    <!--<div class="list2">
        <span  class="umstyle6"><?php //echo $this->Html->image('z-icon2.png',array('alt'=>'sdc')) ?> Tra cứu thu nhập</span>
    </div>-->    
    <div class="list1 first1 <?php if($this->request->params['controller']=='payrolls' && $this->request->params['action']=='allPayrolls') echo "selected"; ?>">
        <span  class="umstyle6">
            <?php echo $this->Html->image('z-icon2.png',array('alt'=>'sdc')) ?>  
            <?php echo $this->Html->link(__("Danh mục bảng lương",true),"/payrolls/allPayrolls") ?>
        </span>
    </div> 
    <div class="list1 last1 <?php if($this->request->params['controller']=='payrolls' && $this->request->params['action']=='statistics') echo "selected"; ?>">
        <span  class="umstyle6">
            <?php echo $this->Html->image('Report.png',array('alt'=>'sdc')) ?>  
            <?php echo $this->Html->link(__("Thống kê",true),"/payrolls/statistics") ?>
        </span>
    </div> 
<?php }?>