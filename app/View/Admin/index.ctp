<table style="width: 50%; margin-left: 5px;">
    <tr>
        <td colspan="2">
        
        <?php echo $this->Session->flash();?>                    
        </td>
    </tr>
    <tr>
        <td colspan="2">   
        <div>
            <div id="cpanel">
                        <!--<div class="icon">
                            <a href="<?=$this->Html->webroot('products/index')?>">                                
                                <?=$this->Html->image('admin/icons/icon-48-category.png');?>
                                <span>Sản phẩm</span>
                            </a>
                        </div>-->
                        <div class="icon">
                            <a href="<?=$this->Html->webroot('posts/index')?>">
                                <?=$this->Html->image('admin/icons/icon-48-article.png');?>                                
                                <span>Tin tức</span>
                            </a>
                        </div>                                       
                        <div class="icon">
                            <a href="<?=$this->Html->webroot('users/index')?>">                            
                                <?=$this->Html->image('admin/icons/icon-48-user.png');?>                                
                                <span>Tài khoản</span>
                            </a>
                        </div>    
                         
                        <!--<div class="icon">
                            <a href="<?=$this->Html->webroot('contacts/index')?>">                            
                                <?=$this->Html->image('admin/icons/icon-48-contacts.png');?>
                                <span>Liên hệ</span>
                            </a>
                        </div> -->
                        <!--<div class="icon">
                            <a href="<?=$this->Html->webroot('modules/index')?>">                            
                                <?=$this->Html->image('admin/icons/icon-48-banner-categories.png');?>                                
                                <span>Module</span>
                            </a>
                        </div>--> 
                      
                        <div class="icon">                            
                            <a href="<?=$this->Html->webroot('configs/edit/1')?>">
                                <?=$this->Html->image('admin/icons/icon-48-config.png');?>                                
                                <span>Cấu hình</span>
                            </a>
                        </div> 
                    </div>         
        </div>  
        </td>
    </tr>
</table>