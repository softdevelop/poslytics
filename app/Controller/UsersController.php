<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public function beforeFilter() {
	parent::beforeFilter();
	//$this->Auth->deny('index','view','add','edit','delete');
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
	$this->User->recursive = 0;
	$this->set('users', $this->paginate());
    }

    public function login() {
	if ($this->request->isPost()) {
	    $this->User->set($this->data);
	    if ($this->User->LoginValidate()) {
		$email = $this->data['User']['email'];
		$password = $this->data['User']['password'];

		$user = $this->User->findByUsername($email);
		if (empty($user)) {
		    $user = $this->User->findByEmail($email);
		    if (empty($user)) {
			$this->Session->setFlash('Username or password is invalid', 'flash_error');
			return;
		    }
		}
		// check for inactive account
		if ($user['User']['id'] != 1 and $user['User']['active'] == 0) {
		    $this->Session->setFlash('Your account has not been activated. Please contact the system administrator!', 'flash_error');
		    return;
		}
		// check for verified account
		if ($user['User']['id'] != 1 and $user['User']['email_verified'] == 0) {
		    $this->Session->setFlash('Your account has not been confirmed. Please check email or contact the system administrator!', 'flash_error');
		    return;
		}
		if (empty($user['User']['salt'])) {
		    $hashed = md5($password);
		} else {
		    $hashed = $this->UserAuth->makePassword($password, $user['User']['salt']);
		}
		if ($user['User']['password'] === $hashed) {
		    if (empty($user['User']['salt'])) {
			$salt = $this->UserAuth->makeSalt();
			$user['User']['salt'] = $salt;
			$user['User']['password'] = $this->UserAuth->makePassword($password, $salt);
			$this->User->save($user, false);
		    }
		    $this->UserAuth->login($user);
		    $remember = (!empty($this->data['User']['remember']));
		    if ($remember) {
			$this->UserAuth->persist('2 weeks');
		    }
		    $OriginAfterLogin = $this->Session->read('Usermgmt.OriginAfterLogin');
		    $this->Session->delete('Usermgmt.OriginAfterLogin');
		    $redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : LOGIN_REDIRECT_URL;
		    //$this->redirect($redirect);
		    $this->redirect('/myprofile');
		} else {
		    $this->Session->setFlash('Username or password is invalid', 'flash_error');
		    return;
		}
	    }
	}
    }

    public function logout() {
	$this->redirect($this->Auth->logout());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
	$this->User->id = $id;
	if (!$this->User->exists()) {
	    throw new NotFoundException(__('Invalid user'));
	}
	$this->set('user', $this->User->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
	if ($this->request->is('post')) {
	    $this->User->create();
	    if ($this->User->save($this->request->data)) {
		$this->Session->setFlash(__('The user has been saved'));
		$this->redirect(array('action' => 'index'));
	    } else {
		$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
	    }
	}
	$userGroups = $this->User->UserGroup->find('list');
	$this->set(compact('userGroups'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
	$this->User->id = $id;
	if (!$this->User->exists()) {
	    throw new NotFoundException(__('Invalid user'));
	}
	if ($this->request->is('post') || $this->request->is('put')) {
	    if ($this->User->save($this->request->data)) {
		$this->Session->setFlash(__('The user has been saved'));
		$this->redirect(array('action' => 'index'));
	    } else {
		$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
	    }
	} else {
	    $this->request->data = $this->User->read(null, $id);
	}
	$userGroups = $this->User->UserGroup->find('list');
	$this->set(compact('userGroups'));
    }

    public function change_password() {

    }

    public function editMyprofile() {

    }
	public function viewUser($userId = null) {}
	public function myprofile() {}
	public function register() {}
	public function changePassword() {}
	public function changeUserPassword($userId = null) {}
	public function addUser() {}
	public function createList() {}
	public function editUser($userId = null) {}
	public function deleteUser($userId = null) {}
	public function dashboard() {}
	public function makeActiveInactive($userId = null, $active = 0) {}
	public function verifyEmail($userId = null) {}
	public function accessDenied() {}
	public function userVerification() {}
	public function forgotPassword() {}
	public function activatePassword() {}
	public function emailVerification() {}
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
	$this->User->id = $id;
	if (!$this->User->exists()) {
	    throw new NotFoundException(__('Invalid user'));
	}
	if ($this->User->delete()) {
	    $this->Session->setFlash(__('User deleted'));
	    $this->redirect(array('action' => 'index'));
	}
	$this->Session->setFlash(__('User was not deleted'));
	$this->redirect(array('action' => 'index'));
    }

}
