<ul id="menu">
<li class="node" style="background: none;"><a href="<?php echo $this->Html->webroot('admin')?>" class="">Bảng điều khiển</a></li>
<li class="node" style="background: none;"><?php echo $this->Html->link(__('Người dùng', true), array('plugin' => null, 'controller' => 'users', 'action' => 'index')); ?>
</li>
<li class="node" style="background: none;">
    <?php echo $this->Html->link(__('Liên hệ', true), array('plugin' => null, 'controller' => 'contacts', 'action' => 'index')); ?>
</li>
<li class="node" style="background: none;"><?php echo $this->Html->link(__('Quản lý Menu', true), array('plugin' => null, 'controller' => 'menus', 'action' => 'index')); ?>
</li>
<!--<li class="node" style="background: none;"><?php echo $this->Html->link(__('Quản lý Module', true), array('plugin' => null, 'controller' => 'modules', 'action' => 'index')); ?>
</li>-->
<li class="node" style="background: none;"><?php echo $this->Html->link(__('Cấu hình website', true), array('plugin' => null, 'controller' => 'configs', 'action' => 'edit',1)); ?>
</li>
</ul>
<div style="float: right;padding-top: 5px;"><?php echo date('H:i, d/m/Y',time() )?></div>
