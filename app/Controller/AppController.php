<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {
    var $helpers = array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth');
    public $components = array('Session','RequestHandler', 'Usermgmt.UserAuth');
    public $uses = array('Menu'); 
    /*
    var $components = array(
        'Acl','Common',
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'admin', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login')
        ),
        'RequestHandler'
    );
    */
    public $cacheAction = array(
  'view' => array('callbacks' => true, 'duration' => 21600),
  'add' => array('callbacks' => true, 'duration' => 36000),
  'index'  => array('callbacks' => true, 'duration' => 48000)
);

    public function beforeFilter() {
        $this->userAuth();
        
        //$this->Auth->allow();
        $this->menuMain();
        $this->menuLeft(); 
        $this->online();      
    }
    
    private function userAuth(){
        $this->UserAuth->beforeFilter($this);
    }
        
    public function page_intro()
    {
        
    }
    public function menuMain()
    {
        $this->loadModel('Menu');
        $con = array('Menu.published'=>1,
                    'Menu.actived'=>1,
                    'Menu.position'=>'top',
                    );
        $menus = $this->Menu->find('all', array('conditions' => $con, 'order' => 'Menu.ordering ASC'));
        $this->set(compact('menus'));
    }
    
    public function menuLeft()
    {
        $this->loadModel('Menu');
        $con = array('Menu.published'=>1,
                    'Menu.actived'=>1,
                    'Menu.position'=>'left',
                    );
        $menusLeft = $this->Menu->find('all', array('conditions' => $con, 'order' => 'Menu.ordering ASC'));
        $this->set(compact('menusLeft'));
    }
    //Đếm số lượng online
    function online() {
        $online_session_id = $this->Session->id();
        if( empty($online_session_id)) return ;

        $this->loadModel('UserOnline');
        $user_online = $this->UserOnline->findByIpClient($online_session_id);
        $time_out = time() + 900 ;

        if(empty($user_online) || $user_online == false) {
            $user_online_new = $this->UserOnline->create();
            $user_online_new['ip_client'] = $online_session_id;
            $user_online_new['time_in'] = date('Y-m-d H:i:s',time());
            $user_online_new['time_out'] = $time_out;
            $this->UserOnline->deleteAll(array('UserOnline.time_out <=' => time()) , false  , false);
            $this->UserOnline->save($user_online_new);
        }
        else {
            $user_online['UserOnline']['time_out'] = $time_out;
            $this->UserOnline->save($user_online);
        }
    }
    
     
}
