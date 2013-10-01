<?php
    App::uses('AppController', 'Controller');
    /**
    * Banks Controller
    *
    * @property Bank $Bank
    */
    class BanksController extends AppController {

        var $paginate = array(
            'order' => array(
                'Bank.timestamp' => 'asc'
            )
        );
        public function beforeFilter()
        {
            parent::beforeFilter();
            //$this->Auth->deny('index','view','add','edit','delete');     
        }

        /**
        * index method
        *
        * @return void
        */
        public function index() {
            $this->Bank->recursive = 0;
            $this->set('banks', $this->paginate());
        }

        /**
        * view method
        *
        * @throws NotFoundException
        * @param string $id
        * @return void
        */
        public function view($id = null) {
            $this->Bank->id = $id;
            if (!$this->Bank->exists()) {
                throw new NotFoundException(__('Invalid bank'));
            }
            $this->set('bank', $this->Bank->read(null, $id));
        }

        /**
        * add method
        *
        * @return void
        */
        public function add() {
            if ($this->request->is('post')) {
			//debug($this->request->data);exit;
                $this->Bank->create();
                if ($this->Bank->save($this->request->data)) {
                    $this->Session->setFlash(__('The bank has been saved'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The bank could not be saved. Please, try again.'));
                }
            }
        }

        /**
        * edit method
        *
        * @throws NotFoundException
        * @param string $id
        * @return void
        */
        public function edit($id = null) {
            $this->Bank->id = $id;
            if (!$this->Bank->exists()) {
                throw new NotFoundException(__('Invalid bank'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->Bank->save($this->request->data)) {
                    $this->Session->setFlash(__('The bank has been saved'));
                    $this->redirect(array('controller'=>'admin','action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The bank could not be saved. Please, try again.'));
                }
            } else {
                $this->request->data = $this->Bank->read(null, $id);
            }
        }

        /**
        * delete method
        *
        * @throws MethodNotAllowedException
        * @throws NotFoundException
        * @param string $id
        * @return void
        */
        public function delete($id = null) {
            if (!$this->request->is('post')) {
                throw new MethodNotAllowedException();
            }
            $this->Bank->id = $id;
            if (!$this->Bank->exists()) {
                throw new NotFoundException(__('Invalid bank'));
            }
            if ($this->Bank->delete()) {
                $this->Session->setFlash(__('Bank deleted'));
                $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Bank was not deleted'));
            $this->redirect(array('action' => 'index'));
        }
    }
