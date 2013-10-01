<div class="clear"></div>
<div id="count-online">
<?php
    // Lấy thông tin từ Controller
    $tong = $this->requestAction('/user_onlines/tong_so_truy_cap');
    $soluong = $this->requestAction('/user_onlines/soluong');
    echo $this->Html->image('people.png',array('alt'=>'people'));
    echo '<p>Số lượt truy cập: ' . $tong['UserOnline']['id'].'</p>';
    echo '<div class="clear"></div>';
    echo $this->Html->image('person.png',array('alt'=>'person'));
    echo "<p>Đang truy cập: " . $soluong.'</p>';
?>
</div>