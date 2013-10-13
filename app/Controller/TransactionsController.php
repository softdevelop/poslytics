<?php

App::uses('AppController', 'Controller');

/**
 * Transactions Controller
 *
 * @property Transaction $Transaction
 */
class TransactionsController extends AppController {

    var $paginate = array(
        'order' => array(
            'Transaction.timestamp' => 'asc'
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();
        //$this->UserAuth->allow('recivenibbs');
        //$this->Auth->deny('index','view','add','edit','delete');     
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('title_page', 'Total transactions');
        $this->Transaction->recursive = 0;
        $this->set('transactions', $this->Transaction->find('all'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function dashboard() {
        $this->set('title_page', 'Dashboard');
        $this->Transaction->recursive = 0;
        $this->set('transactions', $this->paginate());
    }

    /*
     * *Export json
     */

    public function upload_json() {// this will print json
        $this->layout = 'ajax'; //This will remove layout template
        $this->set('transactions', $this->Transaction->find('all'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function upload() {
        if ($this->request->is('post')) {
            $f = file_get_contents($this->request->data['Transaction']['upload']['tmp_name']);
            //Save in webroot/json
            $tmp_name = $this->request->data['Transaction']['upload']['tmp_name'];
            $name = $this->request->data['Transaction']['upload']['name'];
            move_uploaded_file($tmp_name, APP . WEBROOT_DIR . DS . 'json' . DS . $name);
            $pos = strpos($f, '{"transaction');
            if ($pos) {
                $rest = substr($f, $pos - 1);
                $ds = json_decode($rest);
                foreach ($ds as $d) {
                    for ($i = 0; $i < count($d); $i++) {
                        $this->Transaction->create();
                        $this->request->data['Transaction']['terminalid'] = $d[$i]->terminalid;
                        $this->request->data['Transaction']['merchantinfo'] = $d[$i]->merchantinfo;
                        $this->request->data['Transaction']['transtype'] = $d[$i]->transtype;
                        $dSplit = split(' ', $d[$i]->timestamp);
                        $format1 = strtotime($dSplit[0]);
                        $date = date("Y-m-d", $format1);
                        $date.= ' ' . $dSplit[1];
                        $this->request->data['Transaction']['timestamp'] = $date;
                        $this->request->data['Transaction']['pan'] = $d[$i]->pan;
                        $this->request->data['Transaction']['currencycode'] = $d[$i]->currencycode;
                        $this->request->data['Transaction']['countrycode'] = $d[$i]->countrycode;
                        $this->request->data['Transaction']['currencysymbol'] = $d[$i]->currencysymbol;
                        $this->request->data['Transaction']['amount'] = $d[$i]->amount;
                        $this->request->data['Transaction']['refno'] = $d[$i]->refno;
                        $this->request->data['Transaction']['refcode'] = $d[$i]->refcode;
                        $this->request->data['Transaction']['authid'] = $d[$i]->authid;
                        $this->request->data['Transaction']['transactionid'] = $d[$i]->transactionid;
                        $this->request->data['Transaction']['responsecode'] = $d[$i]->responsecode;
                        $this->request->data['Transaction']['responsemessage'] = $d[$i]->responsemessage;
                        $this->Transaction->save($this->request->data);
                    }
                }
                $this->Session->setFlash(__('The transaction has been uploaded'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('File upload is incorrect format'));
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    /*
      public function upload() {
      $this->set('title_page','Post link json transactions');
      if ($this->request->is('post')) {
      $f = file_get_contents($this->request->data['Transaction']['upload']);
      $ds = json_decode($f);
      foreach($ds as $d){
      $d = (array) $d;
      $d['Transaction'] = (array) $d['Transaction'];
      $this->Transaction->create();
      $this->request->data['Transaction']['terminalid'] = $d['Transaction']['terminalid'];
      $this->request->data['Transaction']['merchantinfo'] = $d['Transaction']['merchantinfo'];
      $this->request->data['Transaction']['transtype'] = $d['Transaction']['transtype'];
      $this->request->data['Transaction']['timestamp'] = $d['Transaction']['timestamp'];
      $this->request->data['Transaction']['pan'] = $d['Transaction']['pan'];
      $this->request->data['Transaction']['currencycode'] = $d['Transaction']['currencycode'];
      $this->request->data['Transaction']['countrycode'] = $d['Transaction']['countrycode'];
      $this->request->data['Transaction']['currencysymbol'] = $d['Transaction']['currencysymbol'];
      $this->request->data['Transaction']['amount'] = $d['Transaction'] ['amount'];
      $this->request->data['Transaction']['refno'] = $d['Transaction'] ['refno'];
      $this->request->data['Transaction']['refcode'] = $d['Transaction'] ['refcode'];
      $this->request->data['Transaction']['authid'] = $d['Transaction'] ['authid'];
      $this->request->data['Transaction']['transactionid'] = $d['Transaction']['transactionid'];
      $this->request->data['Transaction']['responsecode'] = $d['Transaction']['responsecode'];
      $this->request->data['Transaction']['responsemessage'] = $d['Transaction']['responsemessage'];
      $this->Transaction->save($this->request->data);
      }
      $this->Session->setFlash(__('The transaction has been uploaded'));
      $this->redirect(array('action' => 'index'));
      }
      }
     */

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Transaction->id = $id;
        if (!$this->Transaction->exists()) {
            throw new NotFoundException(__('Invalid transaction'));
        }
        $this->set('transaction', $this->Transaction->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->set('title_page', 'Add transactions');
        if ($this->request->is('post')) {
            //debug($this->request->data);exit;
            $this->Transaction->create();
            if ($this->Transaction->save($this->request->data)) {
                $this->Session->setFlash(__('The transaction has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The transaction could not be saved. Please, try again.'));
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
        $this->set('title_page', 'Edit transactions');
        $this->Transaction->id = $id;
        if (!$this->Transaction->exists()) {
            throw new NotFoundException(__('Invalid transaction'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Transaction->save($this->request->data)) {
                $this->Session->setFlash(__('The transaction has been saved'));
                $this->redirect(array('controller' => 'admin', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The transaction could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Transaction->read(null, $id);
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
        return false;
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Transaction->id = $id;
        if (!$this->Transaction->exists()) {
            throw new NotFoundException(__('Invalid transaction'));
        }
        if ($this->Transaction->delete()) {
            $this->Session->setFlash(__('Transaction deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Transaction was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function receivenibbs() {
        //$this->autoRender = false;//pr($this->request->data);exit;
        $this->request->data = $this->request->input('json_decode', true);
        if($this->request->is('xml')){
            $this->request->data = $this->request->input('Xml::build', array('return' => 'domdocument'));
        }
        if ($this->request->is('post')) {
            if (!is_array($this->request->data)) {
                $this->set('data', array('response' => array('status' => 'INVALID_JSON_DATA')));
                $this->set('_serialize', 'data');
            }
            elseif(isset($this->request->data['transaction'])) {
                array_walk_recursive($this->request->data['transaction'], "formatData");
                $data = $this->request->data['transaction'];
                $this->Transaction->set($data);
                if ($this->Transaction->validates()) {
                    $this->Transaction->create();
                    if($this->Transaction->saveAll($data, array('validate' => false))){
                        $this->set('data', array('response' => array('status' => 'REQUEST_RECEIVED')));
                        $this->set('_serialize', 'data');
                    }
                    else{
                        $this->set('data', array('response' => array('status' => 'REQUEST_FAILED')));
                        $this->set('_serialize', 'data');
                    }
                }
            }
            else{
                $this->set('data', array('response' => array('status' => 'INVALID_DATA_FORMAT')));
                $this->set('_serialize', 'data');
                return;
            }
        }
        else{
            $this->set('data', array('response' => array('status' => 'INVALID_REQUEST_TYPE')));
            $this->set('_serialize', 'data');
        }
    }
}

    function formatData(&$data, $key) {
        if($key == 'timestamp'){
            $data = strftime('%Y-%m-%d %H:%M:%S', strtotime($data));
        }
    }
