<div id="title">
    <h2>Đổi mật khẩu</h2>
    <hr/>
</div>
<div id="content">
    <?php echo $this->Form->create('User'); ?>
      <table>
        <tr>
          <td>Mật khẩu hiện tại</td>
          <td><?php echo $this->Form->input('password',array('autofocus','required','name'=>'password','id'=>'password','title'=>'Nhập mật khẩu hiện tại','label'=>false,'autocomplete'=>'off'));?></td>
        </tr>
        <tr>
          <td>Mật khẩu mới</td>
          <td><?php echo $this->Form->input('password',array('pattern'=>'(?=^.{9,30}$)(?=.*\d)(?=.*\W+)((?=.*[A-Z])|(?=.*[a-z])).*$','autofocus','required','title'=>'Mật khẩu từ 9 đến 32 ký tự, chứa cả chữ cái, chữ số và ký tự đặc biệt','name'=>'passwordnew','id'=>'passwordnew','label'=>false));?></td>
        </tr>
        <tr>
          <td>Nhập lại mật khẩu mới</td>
          <td><?php echo $this->Form->input('password',array('autofocus','required','name'=>'passwordnew2','id'=>'passwordnew2','title'=>'Xác nhận lại mật khẩu mới','label'=>false,'onfocus'=>'validatePass(document.getElementById("passwordnew"), this);','oninput'=>'validatePass(document.getElementById("passwordnew"), this);'));?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
            <?php echo $this->Form->button('Lưu mật khẩu mới', array('type'=>'submit', 'id'=>'submit', 'div'=>false)) ?>      
            <?php echo $this->Form->button('Hủy bỏ', array('type'=>'reset', 'id'=>'reset', 'div'=>false)) ?>
          </td>
        </tr>
      </table>
    <?php echo $this->Form->end(); ?>
</div><!--end #content-->    
<script type="text/javascript">
    function validatePass(p1, p2) {
        if (p1.value != p2.value || p1.value == '' || p2.value == '') {
            p2.setCustomValidity('Mật khẩu xác nhận chưa trùng khớp');
        } else {
            p2.setCustomValidity('');
        }
    }
</script>
