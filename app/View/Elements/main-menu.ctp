<?php $link_home = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>
<div id="menu"> 
<ul>
    <li>
        
        <span>
            <a name="index" href="<?php echo $this->Html->webroot('')?>">
                TRANG CHỦ
            </a>
        </span>
    </li> 
    <?php
        $link_actives = $this->params['pass'];
        if($link_actives)  
            $link_ext = $link_actives[0];
        $d=1;
        if(isset($menus)){
            foreach($menus as $menu) 
            {
                $select = '';
                if(isset($link_ext)){
                    if( ($this->params['controller']==$menu['Menu']['controller']) && ($this->params['action']==$menu['Menu']['action']) && ($link_ext ==$menu['Menu']['ext']) )
                        $select = 'class="selected"'; 
                    if ($link_ext== $menu['Menu']['title'])
                        $select = 'class="selected"';       
                }
                else{  
                    if( ($this->params['controller']==$menu['Menu']['controller']) && ($this->params['action']==$menu['Menu']['action']))
                    $select = 'class="selected"';    
                }
        ?>
            <li <?php echo $select?> <?php if($d==count($menus)) echo 'style="border-right:none"';?>>
                <?php
                    if($menu['Menu']['controller'] == '' && $menu['Menu']['action'] == ''){
                        //echo $this->Html->link($menu['Menu']['title'],$menu['Menu']['link']);  
                        //echo $this->Html->tag('a', $menu['Menu']['title'], array('href' => $menu['Menu']['link']));
                        echo '<a href="'.$menu['Menu']['link'].'">'.$menu['Menu']['title'].' </a>';
                                          
                    }
                    else{
                        if($menu['Menu']['module']==1){
                            echo $this->Html->link(
                                $this->Html->tag('span',$menu['Menu']['title'],array('class'=>'title-item')),
                                array(  
                                    'controller' => $menu['Menu']['controller'],    
                                    'action' => $menu['Menu']['action']  
                                    ),
                                array('escape' => false)
                            );
                        }
                        else if($menu['Menu']['ext']){
                            echo $this->Html->link(
                            $this->Html->tag('span',$menu['Menu']['title'],array('class'=>'title-item')),
                            array(  
                                'controller' => $menu['Menu']['controller'],    
                                'action' => $menu['Menu']['action'],    
                                'id' => $menu['Menu']['ext'],    
                                'slug' => $menu['Menu']['alias']),
                            array('escape' => false)
                            );    
                        }    
                        else{
                            echo $this->Html->link(
                            $this->Html->tag('span',$menu['Menu']['title'],array('class'=>'title-item')),
                            array(  
                                'controller' => $menu['Menu']['controller'],    
                                'action' => $menu['Menu']['action'], 
                                'slug' => $menu['Menu']['alias']   
                                ),
                            array('escape' => false)
                            );    
                        }    
                    }             
                    
                    $child_menus = $this->requestAction('/menus/get_child_menu/'.$menu['Menu']['id']);
                    if($child_menus){
                        $c_1 = 1;
                        echo '<ul>';
                        foreach($child_menus as $child_menu)
                            {                               
                                echo '<li ';
                                if($c_1 <count($child_menus)) echo ' class ="sep_bot_li"';
                                echo '>';
                                echo $this->Html->link(
                                    $child_menu['Menu']['title'],
                                    array(  
                                        'controller' => $child_menu['Menu']['controller'],    
                                        'action' => $child_menu['Menu']['action'],    
                                        'id' => $child_menu['Menu']['ext'],    
                                        'slug' => $child_menu['Menu']['alias']),
                                        array('class'=>'lv2','escape' => false)
                                    );
                                echo '</li>';
                                $c_1++;                                           
                            }
                        echo '</ul>';    
                    }                    
                ?> 
            </li>            
        <?php
            $d++;
        }    
        }
    ?>  
</ul>
</div>
<!--end #menu-->
