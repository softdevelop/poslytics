<div id="title">
    <h2>Đăng nhập hệ thống</h2>
    <hr/>
</div>
<div id="content">
    <p class="error"><?php echo $this->Session->flash('auth');?></p>
    <?php echo $this->Form->create('User',array('action'=>'login','id'=>'loginform','name'=>'loginform'));?>
      <table>
        <tr>
          <td>&nbsp;</td>
          <td>Tên đăng nhập</td>
          <td><?php echo $this->Form->input('username',array('error'=>'Nhập tên đăng nhập','label'=>false,'div'=>'','required'=>'required', 'autofocus'=>'autofocus', 'title'=>'Tên đăng nhập'));?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Mật khẩu</td>
          <td><?php echo $this->Form->password('password',array('error'=>'Nhập mật khẩu','value'=>'','div'=>'','required'=>'required', 'autofocus'=>'autofocus', 'title'=>'Mật khẩu'));?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" id="button" value="Đăng nhập"></td>
        </tr>
      </table>
    <?php echo $this->Form->end();?>
</div><!--end #content-->
