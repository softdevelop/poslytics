
<script type="text/javascript">
    function openKCFinder_singleFile(div) {
        window.KCFinder = {
            callBack: function(url) {
                window.KCFinder = null;
                div.innerHTML = '<div style="margin:5px">Đang tải ảnh...</div>';
                var img = new Image();
                img.src = url;
                img.onload = function() {
                    div.innerHTML = '<img id="img" src="' + url + '" />';
                    base_url_str = url.replace('','');
                    base_url_str_thumb = url.replace('/images/','/thumbs_/images/'); 
                    $("#image").val(base_url_str);
                    $("#image_thumb").val(base_url_str_thumb);
                    var img = document.getElementById('img');
                    var o_w = img.offsetWidth;
                    var o_h = img.offsetHeight;
                    var f_w = div.offsetWidth;
                    var f_h = div.offsetHeight;
                    if ((o_w > f_w) || (o_h > f_h)) {
                        if ((f_w / f_h) > (o_w / o_h))
                            f_w = parseInt((o_w * f_h) / o_h);
                        else if ((f_w / f_h) < (o_w / o_h))
                            f_h = parseInt((o_h * f_w) / o_w);
                        //img.style.width = f_w + "px";
                        //img.style.height = f_h + "px";
                    } else {
                        // f_w = o_w;
                        // f_h = o_h;
                    }
                    //img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
                    //img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
                    img.style.visibility = "visible";
                }
            }
        };
        window.open(base_url+'app/webroot/js/ckeditor/kcfinder/browse.php?type=images&dir=images/tintuc',
            'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
            'directories=0, resizable=1, scrollbars=0, width=800, height=600'
        );
    }
</script>
<div class="box-content">
    <?php echo $this->Form->create('Config'); ?>
    <table class="form">
        <tr>
            <td colspan="2">        
                <?echo $this->Session->flash();?>                    
            </td>
        </tr>
        <tr>
            <td class="label">Tên website</td>
            <td><?php echo $this->Form->input('site_name',array('label'=>false,'class'=>'max'));?></td>
        </tr>
        <tr>
            <td class="label">Từ khoá</td>
            <td>
                <?php echo $this->Form->input('keywords',array('label'=>false,'class'=>'max')); ?>
            </td>
        </tr>
        <tr>
            <td class="label">Mô tả</td>
            <td>
                <?php echo $this->Form->input('description',array('label'=>false,'class'=>'max')); ?>
            </td>
        </tr>
        <tr>
            <td class="label">Thiết kế</td>
            <td><?php echo $this->Form->input('coder',array('label'=>false,'class'=>'max')); ?></td>
        </tr>
        <tr>
            <td class="label">Bản quyền</td>
            <td><?php echo $this->Form->input('copyright',array('label'=>false,'class'=>'max')); ?></td>
        </tr>
        <tr>
            <td class="label">Đóng cửa website</td>
            <td> 
                <?php echo $this->Form->input('locked',array('label'=>false));?>    
            </td>
        </tr>
        <tr>
            <td class="label">Đăng ký thành viên</td>
            <td><?php echo $this->Form->input('registred',array('label'=>false)); ?></td>
        </tr>
        <tr>
            <td class="label">Chữ chạy</td>
            <td>
                <?php 
                    echo $this->Form->input('text_marquee',array('label'=>false,'type'=> 'textarea','id'=>'text_marquee')); 
                    echo $this->TvFck->create('text_marquee',array('toolbar'=>"user"),'text_marquee'); 
                ?>
            </td>
        </tr>
        <tr>           
            <td class="label"> Thao tác</td>
            <td> <?php echo $this->Form->end('Submit',array('style'=>'width:100px;')); ?></td>
        </tr>
    </table> 
 </div>
