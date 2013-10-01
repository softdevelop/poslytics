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
                    base_url_str = url.replace(base_url+'app/webroot/img/','');
                    base_url_str_thumb = base_url_str.replace('images/','thumbs_/images/'); 
                    $("#image").val(base_url_str);
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
    <?php echo $this->Form->create('Category'); ?>
    <table class="form">
        <tr>
            <td class="label">Chọn danh mục cha</td>
            <td><?php echo $this->Form->input('parent_id',array('label'=>false,'type'=>'select','options'=>$parentCategories,'empty'=>'--Là danh mục cha--')) ?> </td>
        </tr>
        <tr>
            <td class="label">Tên danh mục</td>
            <td><?php echo $this->Form->input('name',array('class'=>'max','label'=>false));?></td>
        </tr>
        <tr>
            <td class="label">Image</td>
            <td> 
                <?php
                    if(isset($this->request->data['Category']['image']))
                        echo '<div class="img_news" onclick="openKCFinder_singleFile(this)">
                        <img src="'.$this->request->data['Category']['image'].'" id="img" style="visibility: visible;">
                        </div>';    
                    else
                        echo $this->Html->tag('div', 'Click để chọn hình.', array('class' => 'img_news','onclick'=>'openKCFinder_singleFile(this)'));
                    echo $this->Form->hidden('image',array('id'=>'image'));
                ?> 
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