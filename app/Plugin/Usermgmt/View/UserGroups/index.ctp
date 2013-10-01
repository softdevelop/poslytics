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
				<span class="umstyle1"><?php echo __('Danh mục nhóm'); ?></span>
                <div style="clear:both"></div>
				<span class="umstyle2"><?php echo $this->Html->link(__("Thêm mới",true),"/addGroup", array('class'=>'add2')) ?></span>
				
			</div>
			<div class="umhr"></div>
			<div class="um_box_mid_content_mid" id="index">
				<table cellspacing="0" cellpadding="0" width="100%" border="0" class="table22">
					<thead>
						<tr>
							<th><?php echo __('ID');?></th>
							<th><?php echo __('Tên nhóm');?></th>
							<th><?php echo __('Bí danh');?></th>
							<th  id='left_content'><?php echo __('Đăng ký');?></th>
							<th><?php echo __('Ngày khởi tạo');?></th>
							<th><?php echo __('Thao tác');?></th>
						</tr>
					</thead>
					<tbody>
				<?php   if(!empty($userGroups)) {
							foreach ($userGroups as $row) {
								echo "<tr>";
								echo "<td>".$row['UserGroup']['id']."</td>";
								echo "<td>".h($row['UserGroup']['name'])."</td>";
								echo "<td>".h($row['UserGroup']['alias_name'])."</td>";
								echo "<td id='left_content'>";
								if ($row['UserGroup']['allowRegistration']) {
									echo "Cho phép";
								} else {
									echo "Không cho phép";
								}
								echo"</td>";
								echo "<td>".date('d-m-Y',strtotime($row['UserGroup']['created']))."</td>";
								echo "<td>";
									echo "<span class='icon'><a href='".$this->Html->url('/editGroup/'.$row['UserGroup']['id'])."'><img src='".SITE_URL."usermgmt/img/edit.png' border='0' alt='Edit' title='Chỉnh sửa'></a></span>";
									if ($row['UserGroup']['id']!=1) {
										echo $this->Form->postLink($this->Html->image(SITE_URL.'usermgmt/img/101.png', array("alt" => __('Delete'), "title" => __('Xóa nhóm này'))), array('action' => 'deleteGroup', $row['UserGroup']['id']), array('escape' => false, 'confirm' => __('Bạn có chắc chắn muốn xóa nhóm này?')));
									}else{ echo '&nbsp;&nbsp;&nbsp;&nbsp;';}
								echo "</td>";
								echo "</tr>";
							}
						} else {
							echo "<tr><td colspan=6><br/><br/>No Data</td></tr>";
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="um_box_down"></div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.table22 tr:odd').addClass('trodd')
    })
</script>