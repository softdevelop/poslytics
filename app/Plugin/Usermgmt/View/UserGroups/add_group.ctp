<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<div class="dashboard_02"><?php echo $this->element('menu_staff');?></div>
<div class="umtop">
	<?php echo $this->Session->flash(); ?>
	<?php //echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('Tạo nhóm người dùng'); ?></span>
				<span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home",true),"/") ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="umhr"></div>
			<div class="um_box_mid_content_mid" id="addgroup"> 
				<?php echo $this->Form->create('UserGroup', array('action' => 'addGroup')); ?>
				<div>
					<div class="umstyle3"><?php echo __('Tên nhóm');?><font color='red'>*</font></div>
					<div class="umstyle4" ><?php echo $this->Form->input("name" ,array('label' => false,'div' => false,'class'=>"umstyle5", 'required', 'autofocus', 'pattern'=>'^[a-zA-Z][a-zA-Z0-9-_ \.]{1,32}$' ))?></div>
					<div class="umstyle7">Ví dụ: Giang Vien</div>
					<div style="clear:both"></div> 
				</div>
				<div>
					<div class="umstyle3"><?php echo __('Bí danh nhóm');?><font color='red'>*</font></div>
					<div class="umstyle4" ><?php echo $this->Form->input("alias_name" ,array('label' => false,'div' => false,'class'=>"umstyle5", 'required', 'autofocus', 'pattern'=>'^[a-zA-Z][a-zA-Z0-9-_\.]{1,32}$' ))?></div>
					<div class="umstyle7">Ví dụ: Giang_Vien (Không có ký tự trắng)</div>
					<div style="clear:both"></div>
				</div>
				<div>
				<?php   if (!isset($this->request->data['UserGroup']['allowRegistration'])) {
							$this->request->data['UserGroup']['allowRegistration']=true;
						}   ?>
					<div class="umstyle3"><?php echo __('Cho phép đăng ký');?></div>
					<div class="umstyle4">
                        <?php echo $this->Form->input("allowRegistration" ,array("type"=>"checkbox",'label' => false))?>
                        <?php //echo $this->Form->Button(__('Hủy bỏ'), array('type'=>'reset','div'=>false, 'class'=>'button2'));?>
                    </div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3"></div>
					<div class="umstyle4"><?php echo $this->Form->Submit(__('Tạo nhóm'), array('div'=>false, 'class'=>'button2'));?></div>
					<div style="clear:both"></div>
				</div>
				<div class="italic">Lưu ý: Sau khi tạo nhóm mới thành công, bạn nên phân quyền người dùng trong nhóm này!</div>
				<?php echo $this->Form->end(); ?> 
			</div>
		</div>
	</div>
	<div class="um_box_down"></div>
</div>
<script>
document.getElementById("UserUserGroupId").focus();
</script>