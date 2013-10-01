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
<div class="dashboard_02"><?php echo $this->element('Usermgmt.dashboard_02');?></div>
<div class="umtop">
    <?php echo $this->Session->flash(); ?>
    <?php //echo $this->element('dashboard'); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Cập nhật thông tin cá nhân'); ?></span>
                <span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home",true),"/") ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>
            <div class="um_box_mid_content_mid" id="register">
                <div class="um_box_mid_content_mid_left">
                    <?php echo $this->Form->create('User'); ?>
                      <table>
                        <tr>
                          <td>Tên đăng nhập</td>
                          <td><?php echo $this->Form->input('username', array('id'=>'username', 'required'=>'required','autofocus'=>'autofocus', 'pattern'=>'[0-9a-zA-Z]{3,32}', 'readonly'=>'readonly', 'title'=>'Tên đăng nhập có độ dài từ 3 đến 32 ký tự', 'label'=>false, 'div'=>false));?></td>
                        </tr>
                        <tr>
                          <td>Mật khẩu</td>
                          <td>
                            <?php echo $this->Form->input('password', array('id'=>'password', 'value'=>'||||||||', 'readonly'=>'readonly', 'label'=>false, 'div'=>false));?>
                            <?php echo $this->Html->link('Đổi mật khẩu', array('controller'=>'users','action'=>'change_password'));?>
                          </td>
                        </tr>         
                        <tr>
                          <td>Họ và tên</td>
                          <td>
                              <?php echo $this->Form->input('surname', array('id'=>'surname', 'required', 'autofocus', 'pattern'=>'[a-zA-Z(?=.*\W+)]{1,50}', 'placeholder'=>'Họ', 'title'=>'Họ và tên đệm', 'label'=>false, 'div'=>false));?>
                              <?php echo $this->Form->input('firstname', array('id'=>'firstname', 'required', 'autofocus', 'pattern'=>'[a-zA-Z(?=.*\W+)]{1,25}', 'placeholder'=>'Tên', 'title'=>'Tên', 'label'=>false, 'div'=>false));?> 
                          </td>
                        </tr>
                        <tr>
                          <td>Ngày sinh</td>
                          <td>
                            <?php echo $this->Form->input('birthday',array('type'=>'date','label'=>false,'div'=>false,'dateFormat' => 'DMY','minYear' => date('Y') - 70,'maxYear' => date('Y'))); ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Giới tính</td>
                          <td>
                            <?php 
                                $gender = array('0'=>'Nam', '1'=>'Nữ');
                                echo $this->Form->input('gender', array('id'=>'gender', 'options'=>$gender, 'label'=>false, 'div'=>false));    
                            ?>        
                          </td>
                        </tr>
                        <tr>
                          <td>Số điện thoại</td>
                          <td><?php echo $this->Form->input('mobile', array('id'=>'mobile', 'autofocus', 'pattern'=>'[0-9+() ]{9,20}', 'title'=>'Số điện thoại chỉ chứa các chữ số, khoảng trắng và các ký tự (+)', 'label'=>false, 'div'=>false));?></td>
                        </tr>
                        <tr>
                          <td>Thư điện tử</td>
                          <td><?php echo $this->Form->input('email', array('type'=>'email', 'id'=>'email', 'autofocus', 'placeholder'=>'me@example.com', 'label'=>false, 'div'=>false));?></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>
                            <?php echo $this->Form->button('Lưu thay đổi', array('type'=>'submit', 'id'=>'submit', 'div'=>false)) ?>      
                            <?php echo $this->Form->button('Hủy bỏ', array('type'=>'reset', 'id'=>'reset', 'div'=>false)) ?>
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
<script>
document.getElementById("UserUserGroupId").focus();
</script>
<script>
    function DaysOfMonth(){
        var thang = $('#UserBirthdayMonth').val();
        var nam = $('#UserBirthdayYear').val();
                 
        //alert('Tháng: '+nam);
        var mon = parseInt(thang, 10) ;
        var yar = parseInt(nam, 10);
        switch (mon){
            case 2:
                if (!(yar%400)||(!(yar%4)&&(yar%100)))
                    return 29;
                else
                    return 28;
                break;
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                return 31;
                break;
            default:
                return 30;
        }
    }
    
    $("#UserBirthdayDay,#UserBirthdayMonth,#UserBirthdayYear").change(function()
    {
        if(($("#UserBirthdayMonth").val() == "-1")||($("#UserBirthdayYear").val() == "-1")) ;
        else if($("#UserBirthdayDay").val() > DaysOfMonth()) {
            $(document).ready(function(){
                $("#UserBirthdayDay").prepend('<option value="-1" selected="selected">Ngày:</option>');
                $("#UserBirthdayMonth").prepend('<option value="-1" selected="selected">Tháng:</option>');
                $("#UserBirthdayYear").prepend('<option value="-1" selected="selected">Năm:</option>');
            });            
            $("#UserBirthdayDay").val("-1");
        }
    });
    
    $("#IdForm").submit(function()
    {
       if(($("#UserBirthdayDay").val() == "-1") || ($("#UserBirthdayMonth").val() == "-1") || ($("#UserBirthdayYear").val() == "-1")) return false;
       else if($("#UserBirthdayDay").val() > DaysOfMonth()) {
           $("#UserBirthdayDay").val("-1");
           return false;
       }
       else return true;
    });
</script>
