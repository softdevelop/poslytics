<?php
App::uses('AppController', 'Controller');
class AdminController extends AppController {
    
    var $names = 'Admin';
    var $uses = null;
    var $layout = 'admin/index';
    public function beforeFilter()
    {
        parent::beforeFilter();
        //$this->Auth->deny('index');     
    }
    public function index()
    {    
    }
}
?>
