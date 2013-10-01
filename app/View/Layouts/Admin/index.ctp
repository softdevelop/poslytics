<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <link rel="shortcut icon" href="<?=Configure::read('base.img')?>favicon.ico" />
        <?php 
            echo $this->Html->charset();            
        ?>
        <script type="text/javascript">
            var base_url='<?php echo $this->Html->webroot('/');?>';
        </script>
        <title>
            <?php __('Administrator:'); ?>
            <?php echo $title_for_layout; ?>
        </title>
        <?php
            echo $this->Html->css(array(
                'admin/admin',
                'admin/menu',
                'admin/tabui',
                'templates/jquery/fancybox/fancybox',                             
            ));
            echo $this->Html->script(array(
                'jquery/jquery.min',
                'jquery/admin_functions',
                'jquery/admin/app',
                'jquery/admin/menu',
                'jquery/admin/tabui',
                'jquery/price_format',
                'ckeditor/ckeditor',
                'jquery/jquery.fancybox',
            ));
            echo $scripts_for_layout;
        ?>
    </head>

    <body>
        <div id="wrapper">
        <ul id="topbar">
            <li>
                <a class="button white fl" title="Site" href="<?=$this->Html->webroot('/admin')?>"><span class="icon_single preview"></span></a>
            </li>
            <li class="s_1"></li>
            <li class="logo"><a>Logged in as <?php echo $this->Session->read('Auth.User.username')?></a> </li>
            <li class="s_1"></li>
            <li class="fr">
                <a class="button red fl" title="logout" href="<?=$this->Html->webroot('/users/logout')?>"><span class="icon_text logout"></span>Thoát</a>
            </li>   
            <li class="s_1 fr"></li>
            <li class="fr">
                <a class="button white fl" title="website" target="_blank" href="<?=$this->Html->webroot('');?>">Đến website</a>
            </li>      
        </ul>
        <div class="menubar">
        <?php echo $this->element('admin/menu');?>
        </div>
        <div id="admincontent">        
        <table style="width: 100%;" class="table_full">
            <tbody>
                <tr>
                    <td valign="top" style="display: none;" class="colum_left_small">
                        <span class="lage" onclick="clickHide(2)">&nbsp;</span>
                    </td>
                    <td valign="top" class="colum_left_lage">
                        <div style="padding-right:20px; padding-left:4px; width:200px">
                            <div class="divclose">
                                <div class="small" onclick="clickHide(1);">&nbsp;</div>
                            </div>
                            <div id="menu-left">
                                <?php echo $this->element('admin/menu_left')?>                    
                            </div>
                        </div>
                    </td>
                    <td id="load_ajax" bgcolor="#F2F2F2" style="width: 100%;">
                        <div class="box-content">
                            <?php echo $content_for_layout;?>
                        </div>               
                    </td>
                </tr>
            </tbody>
        </table>
        <script type="text/javascript">
            // Ẩn. Hiển thị Menu trái
            function clickHide(type){
                if (type == 1){
                    $('td.colum_left_lage').css('display','none');
                    $('td.colum_left_small').css('display','table-cell');
                    
                    //nv_setCookie( 'colum_left_lage', '0', 86400000);
                }
                else {
                    if (type == 2){
                        $('td.colum_left_small').css('display','none');
                        $('td.colum_left_lage').css('display','table-cell');
                        
                        //nv_setCookie( 'colum_left_lage', '1', 86400000);
                    }
                }
            }
        </script>
                
            
        </div>
        
    </div>
    
        <div class="container_16" id="footer">Phát triển bởi Trần Nguyễn Việt Hùng. Mobile: 0935 888 256 . Yahoo: hiphop_1987_hiphop</div>

</body>
</html>
