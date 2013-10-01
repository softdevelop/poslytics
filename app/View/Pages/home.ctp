<?php 
    if($categories){ 
        foreach($categories as $category){         
        ?>
        <div class="mini-box">
            <div class="icon-img">   
                <?php echo $this->Html->image($category['Category']['image'],array('alt'=>$category['Category']['name']))?>
            </div>
            <h2><?php if(count($category['Post'])>1)
                        echo $this->Html->link($category['Category']['name'], array(
                                'controller' => 'posts',
                                'action' => 'blog',
                                'id' => $category['Category']['id'],
                                'slug' => $category['Category']['alias']
                            ));
                    else  
                        echo $category['Category']['name'];
                ?>
            </h2>
            <div class="clear"></div>
            <div class="main-box">
                <?php
                    $posts = $this->RequestAction('posts/get_home_post/'. $category['Category']['id']);
                    $d=1;
                    if($posts){
                        foreach($posts as $post){
                            if($d==1){
                                if($post['actived']==1 && $post['published']==1){
                                    echo $this->Html->image($post['image'],array('alt'=>$post['title']));
                                    
                                    if(strtoupper($category['Category']['name']) == strtoupper('giới thiệu')){
                                       echo $this->Html->link('<p style="margin-bottom:2px; font-weight:bold;">'.$post['title'].'<p>',array(
                                                                                                                                        'controller' => 'posts',
                                                                                                                                        'action' => 'vechungtoi')
                                                                                                                                        ,array('escape'=>false)); 
                                        
                                    }else
                                        echo $this->Html->link('<p style="margin-bottom:2px; font-weight:bold;">'.$post['title'].'<p>', array(
                                                'controller' => 'posts',
                                                'action' => 'view',
                                                'id' => $post['id'],
                                                'slug' => $post['alias']
                                            ),
                                            array('escape'=>false)
                                        );
                                    
                                        $arrwords=explode(" ",$post['intro_text']);//trả $string về thành array các từ.
                                        $arrsubwords=array_slice($arrwords,0,25) ;//trả về array các từ muốn từ vị trí từ bắt đầu và số lượng các từ
                                        $result=implode(" ",$arrsubwords);//trả về n từ mong muốn
                                                                       
                                    echo '<div class="p-home"><p>'.$result.'...</p></div>';
                                }    
                                $d++;     
                            }                              
                        }
                    ?>
                    <div class="xemtiep"><?php
                        if(strtoupper($category['Category']['name']) == strtoupper('giới thiệu'))
                            echo $this->Html->link('XEM TIẾP',array('controller' => 'posts',
                                                                                    'action' => 'vechungtoi')); 
                        else
                            echo $this->Html->link('XEM TIẾP', array(
                                    'controller' => 'posts',
                                    'action' => 'view',
                                    'id' => $post['id'],
                                    'slug' => $post['alias']
                                ));                         
                        ?>

                    </div>
                    <?php    
                    }
                ?>                      

            </div>
        </div><!--end .mini-box-->
        <?php
        }
    }
?>
<script type="text/javascript">//slide
    $(window).load(function() {
            $('#slider').nivoSlider();
    });
</script>