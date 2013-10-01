<?php
$m_root_1 = $this->requestAction('/menus/get_parent_menu_left/');
$id_selected = $this->requestAction(
    array('controller' => 'menus', 'action' => 'get_menu_selected'),
    array('return'=>true)
);

?>
<div id="title"><h2>DỊCH VỤ</h2></div>
<ul>

    <?php 
        foreach($m_root_1 as $m_1){
            if($m_1['ParentMenu']['id'] != null)
                continue;
     ?>
    <li onclick="javascript:sdmenu('menu<?php echo $m_1['Menu']['id'] ?>')"><a href="<?php echo $m_1['Menu']['link'];?>" id="menu3"><?=$m_1['Menu']['title'] ?></a>
        <!-- Kiem tra xem co menu con khong -->
        <?php
            $mChild = $m_1['ChildMenu'];
            if(isset($mChild) && $m_1['Menu']['id'] == $id_selected['Menu']['parent_id']){
                echo '<ul id="menu'.$m_1['Menu']['id'].'">';               
                    foreach($mChild as $m_2){
                        if($m_2['id'] == $id_selected['Menu']['id'])
                            echo '<li><a style="font-weight:bold;" href="'.$m_2['link'].'" >'.$m_2['title'].'</a></li>';
                        else
                            echo '<li><a href="'.$m_2['link'].'" >'.$m_2['title'].'</a></li>';
                    }
                echo '</ul>';                
            }else if(isset($mChild) && $m_1['Menu']['id'] != $id_selected){
                echo '<ul style="display: none;" id="menu'.$m_1['Menu']['id'].'">';               
                    foreach($mChild as $m_2){
                        echo '<li><a href="'.$m_2['link'].'" >'.$m_2['title'].'</a></li>';
                    }
                echo '</ul>';
            }
        ?>
        
    </li>
    <?php } ?>
    <!--<li>Gia công phần mềm</li>-->
</ul>
