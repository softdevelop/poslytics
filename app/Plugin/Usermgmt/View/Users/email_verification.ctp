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
<div class="umtop_02">
    <?php echo $this->Session->flash(); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Xác minh địa chỉ thư điện tử'); ?></span>
                <span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home",true),"/") ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>
            <div class="um_box_mid_content_mid" id="forgot">
                <div class="um_box_mid_content_mid_left">
                    <?php echo $this->Form->create('User', array('action' => 'emailVerification')); ?>
                    <div>
                        <div class="umstyle3"><?php echo __('Vui lòng nhập địa chỉ thư điện tử hoặc tên đăng nhập của bạn');?></div>
                        <div class="umstyle4" style="clear: both"><?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"umstyle5",'autofocus','required' ))?></div>
                        <div style="clear:both"></div>
                    </div>
                    <div>
                        <div class="umstyle3"></div>
                        <div class="umstyle4" style="clear: both"><?php echo $this->Form->Submit(__('Gửi thư'), array('div'=>false, 'class'=>'button2'));?></div>
                        <div style="clear:both"></div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
                <div style="clear:both"></div>
            </div>
        </div>
    </div>
    <div class="um_box_down"></div>
</div>
<script>
document.getElementById("UserEmail").focus();
</script>