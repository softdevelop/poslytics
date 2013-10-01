<?
if($_SERVER['HTTP_HOST']=='localhost'){
  $site = '/'.Configure::read('base.sitename').'/';  
}
else{
  $site = '/'    ;
}
?>
<script type="text/javascript" src="<?=$site?>acl/js/acl_permissions.js"></script> 
<table style="width: 100%;">
    <tr>
        <td style="width: 80%;height: 55px;"><div class="title-admin">Phân quyền thành viên</div></td>
        <td>
            <ul class="click"> 
                <li><?php echo $this->Html->link(__('Refresh Action', true), array('controller' => 'acl_actions', 'action'=>'generate', 'permissions' => 1),array('style'=>'width:80px;font-weight:bold')); ?></li>
                <li><?php echo $this->Html->link(__('Manager Actions', true), array('controller' => 'acl_actions', 'action'=>'index', 'permissions' => 1),array('style'=>'width:80px;font-weight:bold')); ?></li>
            </ul>
        </td>
    </tr> 
    <tr>
        <td colspan="2">  
        <div class="box-content">  
            <div class="acl_permissions index">

                <table cellpadding="0" cellspacing="0">
                <?php
                    $groupTitles = array_values($groups);
                    $groupIds   = array_keys($groups);

                    $tableHeaders = array(
                        __('Id', true),
                        __('Alias', true),
                    );
                    $tableHeaders = array_merge($tableHeaders, $groupTitles);
                    $tableHeaders =  $this->Html->tableHeaders($tableHeaders);
                    echo $tableHeaders;

                    $currentController = '';
                    foreach ($acos AS $id => $alias) {
                        $class = '';
                        if(substr($alias, 0, 1) == '_') {
                            $level = 1;
                            $class .= 'level-'.$level;
                            $oddOptions = array('class' => 'hidden controller-'.$currentController);
                            $evenOptions = array('class' => 'hidden controller-'.$currentController);
                            $alias = substr_replace($alias, '', 0, 1);
                        } else {
                            $level = 0;
                            $class .= ' controller expand';
                            $oddOptions = array();
                            $evenOptions = array();
                            $currentController = $alias;
                        }
                        
                        $row = array(
                            $id,
                            $this->Html->div($class, $alias),
                        );

                        foreach ($groups AS $groupId => $groupTitle) {
                            if ($level != 0) {
                                if ($groupId != 1) {
                                    if ($permissions[$id][$groupId] == 1) {
                                        $row[] = $this->Html->image('/img/icons/admin/tick.png', array('class' => 'permission-toggle', 'rel' => $id.'-'.$groupsAros[$groupId]));
                                    } else {
                                        $row[] = $this->Html->image('/img/icons/admin/cross.png', array('class' => 'permission-toggle', 'rel' => $id.'-'.$groupsAros[$groupId]));
                                    }
                                } else {
                                    $row[] = $this->Html->image('/img/icons/admin/tick_disabled.png', array('class' => 'permission-disabled'));
                                }
                            } else {
                                $row[] = '';
                            }
                        }

                        echo $this->Html->tableCells(array($row), $oddOptions, $evenOptions);
                    }

                    echo $tableHeaders;
                ?>
                </table>
            </div>      
        </div>
        </td>
    </tr>
</table>