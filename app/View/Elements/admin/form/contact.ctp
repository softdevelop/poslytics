
<div>
    <?php echo $this->Form->create('Contact'); ?>
    <table class="form">
        <tr>
            <td class="label">Họ Tên</td>
            <td><?php echo $this->Form->input('fullname',array('class'=>'max','label'=>false));?></td>
        </tr>
        <tr>
            <td class="label">Điện thoại</td>
            <td><?php echo $this->Form->input('phone',array('class'=>'max','label'=>false));?></td>
        </tr>
        <tr>
            <td class="label">Email</td>
            <td><?php echo $this->Form->input('email',array('label'=>false,'class'=>'max')); ?></td>
        </tr>
        <tr>
            <td class="label">Địa Chỉ</td>
            <td><?php echo $this->Form->input('address',array('label'=>false,'class'=>'max')); ?></td>
        </tr>
        <tr>
            <td class="label">Chủ Đề</td>
            <td><?php echo $this->Form->input('topic',array('label'=>false,'class'=>'max')); ?></td>
        </tr>
        <tr>
            <td class="label">Nội Dung</td>
            <td><?php 
                echo $this->Form->input('content',array('label'=>false,'type'=> 'textarea','id'=>'content')); 
                echo $this->TvFck->create('content',array('toolbar'=>"user"),'content');
             ?></td>
        </tr>
        <tr>
            <td class="label">Ngày</td>
            <td><?php echo $this->Form->input('contact_date',array('label'=>false)); ?></td>
        </tr>
        <tr>
            <td class="label">Tình Trạng</td>
            <td><?php echo $this->Form->input('new',array('label'=>false)); 
                    
            ?></td>
        </tr>
        <tr>           
            <td class="label"> Thao tác</td>
            <td> <?php echo $this->Form->end('Submit',array('style'=>'width:100px;')); ?></td>
        </tr>
    </table> 
 </div>