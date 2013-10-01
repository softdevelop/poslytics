<div class="box-content">  
    <?php echo $this->Form->create('Menu'); ?>
    <table class="form">
        <tr>
            <td class="label">Chọn menu cha</td>
            <td><?php echo $this->Form->input('parent_id',array('label'=>false,'type'=>'select','options'=>$parentMenus,'empty'=>'--Là danh mục cha--')) ?> </td>
        </tr>
        <tr>
            <td class="label">Tên menu</td>
            <td><?php echo $this->Form->input('title',array('class'=>'max','label'=>false));?></td>
        </tr>
        <tr>
            <td class="label">Vị Trí</td>
            <td><?php echo $this->Form->input('position',array('label'=>false,'type'=>'select','options'=>array('Top'=>'Top','Left'=>'Left','Right'=>'Right'))) ; ?></td>
        </tr>
        <tr>
            <td class="label">Loại menu</td>
            <td style="position: relative;">
                <?php echo $this->Form->input('view',array('label'=>false,'readonly'=>true,'class'=>'w340 inputmenu TitleLink','style'=>'background:#EBEBE4','div'=>false)) ?> 
                <select name="loaimenu" id="loaimenu">
                    <?php
                        
                        if($this->request->data){
                        ?>
                        <option value="chon_baiviet" <?php if($this->request->data['Menu']['controller']=='posts' && $this->request->data['Menu']['action']=='view' ) echo 'selected="selected"'?> >Bài viết</option> 
                        <option value="chon_danhmuc" <?php if($this->request->data['Menu']['controller']=='posts' && $this->request->data['Menu']['action']=='blog' ) echo 'selected="selected"'?> >Danh mục </option>                        
                        <option value="chon_module" <?php if($this->request->data['Menu']['module']=='1') echo 'selected="selected"'?> >Module</option>
                        <option value="nhap_link" <?php if($this->request->data['Menu']['controller']=='' && $this->request->data['Menu']['action']=='' && $this->request->data['Menu']['link']!='') echo 'selected="selected"'?> >Đường dẫn tự nhập</option>
                        <?php
                        }
                        else{
                        ?>
                        <option value="chon_baiviet">Bài viết</option>
                        <option value="chon_danhmuc">Danh mục</option>
                        <option value="chon_module">Module</option>
                        <option value="nhap_link">Đường dẫn tự nhập</option>
                        <?php
                        }
                    ?>
                </select>
                <a href="#" class="addmenu" ></a>
            </td>
        </tr>
        <tr style="display:none">
            <td></td>
            <td>
                <?php echo $this->Form->hidden('controller',array('label'=>false,'class'=>'max')) ?>
                <?php echo $this->Form->hidden('action',array('label'=>false,'class'=>'max')) ?> 
                <?php echo $this->Form->hidden('ext',array('label'=>false,'class'=>'max')) ?>                
                <?php echo $this->Form->hidden('link',array('label'=>false,'class'=>'max')) ?>                
                <?php echo $this->Form->hidden('module') ?>
            </td>
        </tr>
        <tr>
            <td class="label">Bật tắt</td>
            <td><?php echo $this->Form->input('actived',array('label'=>false,'type'=>'checkbox')); ?></td>
        </tr>
        <tr>
            <td class="label">Trang Chủ</td>
            <td><?php echo $this->Form->input('published',array('label'=>false,'type'=>'checkbox')); ?></td>
        </tr>
        <tr>
            <td class="label">Thứ tự</td>
            <td><?php echo $this->Form->input('ordering',array('label'=>false)); ?></td>
        </tr>
        <tr>           
            <td class="label"> Thao tác</td>
            <td> <?php echo $this->Form->end('Submit',array('style'=>'width:100px;')); ?></td>
        </tr>
    </table> 
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $('.addmenu').click(function(){
                    //alert($("#loaimenu").val());        
                $.fancybox({            
                        'padding': 0,
                        'titleShow' : false ,
                        'autoScale' : false,
                        'width'     : 900,
                        'height'    : 520,
                        'transitionIn'  : 'elastic',
                        'transitionOut' : 'elastic',
                        'hideOnOverlayClick' : false,
                        'hideOnContentClick' : false,
                        'overlayShow' : true,
                        'opacity'     : false,
                        'type'        : 'ajax',
                        'href'        : base_url+'menus/'+$("#loaimenu").val()  
                });
            });

    });
</script>