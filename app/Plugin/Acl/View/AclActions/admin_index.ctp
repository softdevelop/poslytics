<?php
    $this->Html->script('/acl/js/acl_permissions.js', false);
    $this->Html->scriptBlock("$(document).ready(function(){ AclPermissions.documentReady(); });", array('inline' => false));
?>
<table style="width: 100%;">
    <tr>
        <td colspan="2">
        
        <?echo $this->Session->flash();?>                     
        </td>
    </tr> 
    <tr>
        <td style="width: 80%;height: 55px;"><div class="title-admin">Quản lý Action</div></td>
        <td>
            <ul class="click"> 
                <li><?php echo $this->Html->link(__('Phân quyền thành viên', true), array('controller' => 'acl_permissions', 'action'=>'index', 'permissions' => 1),array('style'=>'width:80px;font-weight:bold')); ?></li>
            </ul>
        </td>
    </tr>
    <tr>
        <td colspan="2">  
        <div class="box-content">  
            <div class="acos acl_permissions index">
                <table cellpadding="0" cellspacing="0">
                <?php
                    $tableHeaders =  $this->Html->tableHeaders(array(
                        __('Id', true),
                        __('Alias', true),
                        __('Actions', true),
                    ));
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

                        //$actions  = $this->Html->link(__('Edit', true), array('action' => 'edit', $id));
                        $actions  = '';
                        $actions .= ' ' . $this->Html->link(__('Delete', true), array(
                            'action' => 'delete',
                            $id,
                            'token' => $this->params['_Token']['key'],
                        ), null, __('Are you sure?', true));
                        $actions .= ' ' . $this->Html->link(__('Move up', true), array('action' => 'move', $id, 'up'));
                        $actions .= ' ' . $this->Html->link(__('Move down', true), array('action' => 'move', $id, 'down'));

                        $row = array(
                            $id,
                            $this->Html->div($class, $alias),
                            $actions,
                        );

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