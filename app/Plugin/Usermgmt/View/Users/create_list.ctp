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
<div class="dashboard_02"><?php echo $this->element('dashboard_02');?></div>
<div class="umtop">
	<?php echo $this->Session->flash(); ?>
	<?php //echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('Tạo danh sách nhân viên'); ?></span>
				<span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home",true),"/") ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="umhr"></div>
			<div class="um_box_mid_content_mid" id="register">
				<div class="um_box_mid_content_mid_left">
                    <?php echo $this->Form->create('User', array('action' => 'createList')); ?>
                    <!--<form action="" method="post" enctype="multipart/form-data" name="form1">-->
                      <table width="700" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td>Tệp tin chứa danh sách</td>
                          <td>
                          <input name="txt_file" type="file" id="txt_file" size="50" required autofocus></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td style="font-style: italic;">Chọn tệp tin excel hoặc xml<br>
                            Cấu trúc sheet...</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>
                              <input type="submit" name="button" id="button" value="Tạo danh sách nhân viên" class="button2">
                              <input type="reset" name="button2" id="button2" value="Hủy bỏ" class="button2">
                          </td>
                        </tr>
                      </table>
                    <?php echo $this->Form->end(); ?>
					
				</div>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
	<div class="um_box_down"></div>
</div>