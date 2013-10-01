<?php

/*
  This file is part of UserMgmt.

  Author: Chetan Varshney (http://ektasoftwares.com)

  UserMgmt is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  UserMgmt is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 */

App::uses('UserMgmtAppController', 'Usermgmt.Controller');

class UsersController extends UserMgmtAppController {

    /**
     * This controller uses following models
     *
     * @var array
     */
    public $uses = array('Usermgmt.User', 'Usermgmt.UserGroup', 'Usermgmt.LoginToken');

    /**
     * Called before the controller action.  You can use this method to configure and customize components
     * or perform logic that needs to happen before each controller action.
     *
     * @return void
     */
    public function beforeFilter() {
	parent::beforeFilter();
	$this->User->userAuth = $this->UserAuth;
    }

    /**
     * Used to display all users by Admin
     *
     * @access public
     * @return array
     */
    public function index() {
	$this->set('title_page','Total users');
	if ($this->request->isPost()) {
	    $this->User->unbindModel(array('hasMany' => array('LoginToken')));
	    $this->paginate = array(
		'limit' => 30,
		'conditions' => array('User.last_name LIKE' => '%' . $this->request->data['User']['fullname'] . '%'),
		'order' => 'User.last_name asc'
	    );
	    $this->set('users', $this->paginate('User'));
	} else {
	    $this->User->unbindModel(array('hasMany' => array('LoginToken')));
	    $this->paginate = array(
		'limit' => 30,
		'order' => 'User.last_name asc'
	    );
	    $this->set('users', $this->paginate('User'));
	}
    }

    /**
     * Used to display detail of user by Admin
     *
     * @access public
     * @param integer $userId user id of user
     * @return array
     */
    public function viewUser($userId = null) {
	$this->set('title_page','View users');
	$this->layout = 'home';
	if (!empty($userId)) {
	    $user = $this->User->read(null, $userId);
	    $this->set('user', $user);
	} else {
	    $this->redirect('/allUsers');
	}
    }

    /**
     * Used to display detail of user by user
     *
     * @access public
     * @return array
     */
    public function myprofile() {
	$this->layout = 'home';
	$userId = $this->UserAuth->getUserId();
	if($userId==null){ $this->redirect("/logout");}
	$user = $this->User->find('first',array('conditions'=>array('User.id'=>$userId)));
	if($user['User']['modified']!=$this->Session->read('UserAuth.User.modified')){
	 $this->redirect("/logout");
	}
	$this->set('user', $user);
    }

    public function login() {
	$this->layout = 'login';
	if ($this->Session->read('UserAuth')) {
	    $this->Session->setFlash(__('You are logged into the system with the login name %s', $this->Session->read('UserAuth.User.username')), 'flash_error');
	} else {
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
			$this->redirect('/');
		    } else {
			$this->Session->setFlash('Username or password is invalid', 'flash_error');
			return;
		    }
		}
	    }
	}
    }

    /**
     * Used to logged out from the site
     *
     * @access public
     * @return void
     */
    public function logout() {
	//$this->Session->destroy();
	//$this->Cookie->destroy();
	$this->UserAuth->logout();
	$this->Session->setFlash('You have logged out of the system!', 'flash_success');
	$this->redirect(LOGOUT_REDIRECT_URL);
    }

    /**
     * Used to register on the site
     *
     * @access public
     * @return void
     */
    public function register() {
	$userId = $this->UserAuth->getUserId();
	if ($userId) {
	    $this->redirect("/dashboard");
	}
	if (SITE_REGISTRATION) {
	    $userGroups = $this->UserGroup->getGroupsForRegistration();
	    $this->set('userGroups', $userGroups);
	    if ($this->request->isPost()) {
		if (USE_RECAPTCHA && !$this->RequestHandler->isAjax()) {
		    $this->request->data['User']['captcha'] = (isset($this->request->data['recaptcha_response_field'])) ? $this->request->data['recaptcha_response_field'] : "";
		}
		$this->User->set($this->data);
		if ($this->User->RegisterValidate()) {
		    if (!isset($this->data['User']['user_group_id'])) {
			$this->request->data['User']['user_group_id'] = DEFAULT_GROUP_ID;
		    } elseif (!$this->UserGroup->isAllowedForRegistration($this->data['User']['user_group_id'])) {
			$this->Session->setFlash('Please select correct register as');
			return;
		    }
		    $this->request->data['User']['active'] = 1;
		    if (!EMAIL_VERIFICATION) {
			$this->request->data['User']['email_verified'] = 1;
		    }
		    $ip = '';
		    if (isset($_SERVER['REMOTE_ADDR'])) {
			$ip = $_SERVER['REMOTE_ADDR'];
		    }
		    $this->request->data['User']['ip_address'] = $ip;
		    $salt = $this->UserAuth->makeSalt();
		    $this->request->data['User']['salt'] = $salt;
		    $this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
		    $this->User->save($this->request->data, false);
		    $userId = $this->User->getLastInsertID();
		    $user = $this->User->findById($userId);
		    if (SEND_REGISTRATION_MAIL && !EMAIL_VERIFICATION) {
			$this->User->sendRegistrationMail($user);
		    }
		    if (EMAIL_VERIFICATION) {
			$this->User->sendVerificationMail($user);
		    }
		    if (isset($this->request->data['User']['email_verified']) && $this->request->data['User']['email_verified']) {
			$this->UserAuth->login($user);
			$this->redirect('/');
		    } else {
			$this->Session->setFlash('Please check your mail and confirm your registration', 'flash_success');
			$this->redirect('/register');
		    }
		}
	    }
	} else {
	    $this->Session->setFlash('Sorry new registration is currently disabled, please try again later', 'flash_error');
	    $this->redirect('/login');
	}
    }

    /**
     * Used to change the password by user
     *
     * @access public
     * @return void
     */
    public function changePassword() {
	$this->set('title_page','Change password');
	$userId = $this->UserAuth->getUserId();
	$user = $this->User->find('first',array('conditions'=>array('User.id'=>$userId)));
	if($user['User']['modified']!=$this->Session->read('UserAuth.User.modified')){
		$this->redirect("/logout");
	}
	if ($this->request->isPost()) {
	    $this->User->set($this->data);
	    if ($this->User->RegisterValidate()) {
		$user = array();
		$user['User']['id'] = $userId;
		$salt = $this->UserAuth->makeSalt();
		$user['User']['salt'] = $salt;
		$user['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
		$this->User->save($user, false);
		$this->LoginToken->deleteAll(array('LoginToken.user_id' => $userId), false);
		$this->Session->setFlash('Change password successfully!', 'flash_success');
		$this->redirect('/changePassword');
	    }
	}
    }

    /**
     * Used to change the user password by Admin
     *
     * @access public
     * @param integer $userId user id of user
     * @return void
     */
    public function changeUserPassword($userId = null) {
	$this->set('title_page','Change users');
	if (!empty($userId)) {
	    $name = $this->User->getNameById($userId);
	    $this->set('name', $name);
	    if ($this->request->isPost()) {
		$this->User->set($this->data);
		if ($this->User->RegisterValidate()) {
		    $user = array();
		    $user['User']['id'] = $userId;
		    $salt = $this->UserAuth->makeSalt();
		    $user['User']['salt'] = $salt;
		    $user['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
		    $this->User->save($user, false);
		    $this->LoginToken->deleteAll(array('LoginToken.user_id' => $userId), false);
		    $this->Session->setFlash(__('The password for account% s staff successfully updated', $name), 'flash_success');
		    $this->redirect('/allUsers');
		}
	    }
	} else {
	    $this->redirect('/allUsers');
	}
    }

    /**
     * Used to add user on the site by Admin
     *
     * @access public
     * @return void
     */
    //------ Tạo tài khoản nhân viên ------------------
    public function addUser() {
	$this->set('title_page','Add users');
	$userGroups = $this->UserGroup->getGroups();
	$userId = $this->UserAuth->getUserId();
	$user = $this->User->find('first',array('conditions'=>array('User.id'=>$userId)));
	if($user['UserGroup']['id']==1){
		$userGroups = array('2'=>'Manage');}
	else{
		$userGroups = array('3'=>'User');
	}
	$this->set('userGroups', $userGroups);
	if ($this->request->isPost()) {
	    $this->User->set($this->data);
	    if ($this->User->RegisterValidate()) {
		if($user['UserGroup']['id']==1){
			$this->request->data['User']['user_group_id']=2;}
		else{
			$this->request->data['User']['user_group_id']=3;
		}
		$this->request->data['User']['email_verified'] = 1;
		$this->request->data['User']['active'] = 1;
		$salt = $this->UserAuth->makeSalt();
		$this->request->data['User']['salt'] = $salt;
		$this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
		$this->User->save($this->request->data, false);
		$this->Session->setFlash('Accounts staff have successfully created!', 'flash_success');
		$this->redirect('/allUsers');
	    }
	}
    }

    public function createList() {
	//echo 'đây rồi';
	//debug($this->request->data['txt_file']);
    }

    /**
     * Used to edit user on the site by Admin
     *
     * @access public
     * @param integer $userId user id of user
     * @return void
     */
    public function editUser($userId = null) {
	$this->set('title_page','Edit users');
	if (!empty($userId)) {
	    $userGroups = $this->UserGroup->getGroups();
	    $this->set('userGroups', $userGroups);
	    if ($this->request->isPut()) {
		$this->User->set($this->data);
		if ($this->User->RegisterValidate()) {
		    $this->User->save($this->request->data, false);
		    $this->Session->setFlash('User account information is updated successfully', 'flash_success');
		    $this->redirect('/allUsers');
		}
	    } else {
		$user = $this->User->read(null, $userId);
		$this->request->data = null;
		if (!empty($user)) {
		    $user['User']['password'] = '';
		    $this->request->data = $user;
		}
	    }
	} else {
	    $this->redirect('/allUsers');
	}
    }

    public function editMyprofile($userId = null) {
	$this->set('title_page','Edit profile');
	$userId = $this->Session->read('UserAuth.User.id');
	if (!empty($userId)) {
	    $userGroups = $this->UserGroup->getGroups();
	    $this->set('userGroups', $userGroups);
		
	    if ($this->request->isPut()) {
		$this->User->set($this->data);
		if ($this->User->RegisterValidate()) {
		    $this->User->save($this->request->data, false);
		    $this->Session->setFlash('Account information is updated successfully', 'flash_success');
		    $this->redirect('/myprofile');
		}
	    } else {
		$user = $this->User->read(null, $userId);
		$this->request->data = null;
		if (!empty($user)) {
		    $user['User']['password'] = '';
		    $this->request->data = $user;
		}
	    }
	} else {
	    $this->redirect('/myprofile');
	}
    }

    /**
     * Used to delete the user by Admin
     *
     * @access public
     * @param integer $userId user id of user
     * @return void
     */
    public function deleteUser($userId = null) {
	if (!empty($userId)) {
	    if ($this->request->isPost()) {
		if ($this->User->delete($userId, false)) {
		    $this->LoginToken->deleteAll(array('LoginToken.user_id' => $userId), false);
		    $this->Session->setFlash('Account canceled successful staff', 'flash_success');
		}
	    }
	    $this->redirect('/allUsers');
	} else {
	    $this->redirect('/allUsers');
	}
    }

    /**
     * Used to show dashboard of the user
     *
     * @access public
     * @return array
     */
    public function dashboard() {
	$userId = $this->UserAuth->getUserId();
	$user = $this->User->findById($userId);
	$this->set('user', $user);
    }

    /**
     * Used to activate or deactivate user by Admin
     *
     * @access public
     * @param integer $userId user id of user
     * @param integer $active active or inactive
     * @return void
     */
    public function makeActiveInactive($userId = null, $active = 0) {
	if (!empty($userId)) {
	    $user = array();
	    $user['User']['id'] = $userId;
	    $user['User']['active'] = ($active) ? 1 : 0;
	    $this->User->save($user, false);
	    if ($active) {
		$this->Session->setFlash('Employees account was activated successfully', 'flash_success');
	    } else {
		$this->Session->setFlash('Accounts staff have been disabled', 'flash_success');
	    }
	}
	$this->redirect('/allUsers');
    }

    /**
     * Used to verify email of user by Admin
     *
     * @access public
     * @param integer $userId user id of user
     * @return void
     */
    public function verifyEmail($userId = null) {
	if (!empty($userId)) {
	    $user = array();
	    $user['User']['id'] = $userId;
	    $user['User']['email_verified'] = 1;
	    $this->User->save($user, false);
	    $this->Session->setFlash('E-mail addresses are verified employee success', 'flash_success');
	}
	$this->redirect('/allUsers');
    }

    /**
     * Used to show access denied page if user want to view the page without permission
     *
     * @access public
     * @return void
     */
    public function accessDenied() {

    }

    /**
     * Used to verify user's email address
     *
     * @access public
     * @return void
     */
    public function userVerification() {
	if (isset($_GET['ident']) && isset($_GET['activate'])) {
	    $userId = $_GET['ident'];
	    $activateKey = $_GET['activate'];
	    $user = $this->User->read(null, $userId);
	    if (!empty($user)) {
		if (!$user['User']['email_verified']) {
		    $password = $user['User']['password'];
		    $theKey = $this->User->getActivationKey($password);
		    if ($activateKey == $theKey) {
			$user['User']['email_verified'] = 1;
			$this->User->save($user, false);
			if (SEND_REGISTRATION_MAIL && EMAIL_VERIFICATION) {
			    $this->User->sendRegistrationMail($user);
			}
			$this->Session->setFlash('Your account has been activated', 'flash_success');
		    }
		} else {
		    $this->Session->setFlash('Your account has been activated', 'flash_success');
		}
	    } else {
		$this->Session->setFlash('Sorry something went wrong, please click on the link again', 'flash_error');
	    }
	} else {
	    $this->Session->setFlash('Sorry something went wrong, please click on the link again', 'flash_error');
	}
	$this->redirect('/login');
    }

    /**
     * Used to send forgot password email to user
     *
     * @access public
     * @return void
     */
    public function forgotPassword() {
	if ($this->request->isPost()) {
	    $this->User->set($this->data);
	    if ($this->User->LoginValidate()) {
		$email = $this->data['User']['email'];
		$user = $this->User->findByUsername($email);
		if (empty($user)) {
		    $user = $this->User->findByEmail($email);
		    if (empty($user)) {
			$this->Session->setFlash('Username or email is not valid', 'flash_error');
			return;
		    }
		}
		// check for inactive account
		if ($user['User']['id'] != 1 and $user['User']['email_verified'] == 0) {
		    $this->Session->setFlash('Your account has not been activated. Please check before changing email password', 'flash_error');
		    return;
		}
		$this->User->forgotPassword($user);
		$this->Session->setFlash('Please check your email to reset password', 'flash_success');
		$this->redirect('/login');
	    }
	}
    }

    /**
     *  Used to reset password when user comes on the by clicking the password reset link from their email.
     *
     * @access public
     * @return void
     */
    public function activatePassword() {
	if ($this->request->isPost()) {
	    if (!empty($this->data['User']['ident']) && !empty($this->data['User']['activate'])) {
		$this->set('ident', $this->data['User']['ident']);
		$this->set('activate', $this->data['User']['activate']);
		$this->User->set($this->data);
		if ($this->User->RegisterValidate()) {
		    $userId = $this->data['User']['ident'];
		    $activateKey = $this->data['User']['activate'];
		    $user = $this->User->read(null, $userId);
		    if (!empty($user)) {
			$password = $user['User']['password'];
			$thekey = $this->User->getActivationKey($password);
			if ($thekey == $activateKey) {
			    $user['User']['password'] = $this->data['User']['password'];
			    $salt = $this->UserAuth->makeSalt();
			    $user['User']['salt'] = $salt;
			    $user['User']['password'] = $this->UserAuth->makePassword($user['User']['password'], $salt);
			    $this->User->save($user, false);
			    $this->Session->setFlash('Your password has been reset successfully');
			    $this->redirect('/login');
			} else {
			    $this->Session->setFlash('Something went wrong, please send password reset link again');
			}
		    } else {
			$this->Session->setFlash('Something went wrong, please click again on the link in email');
		    }
		}
	    } else {
		$this->Session->setFlash('Something went wrong, please click again on the link in email');
	    }
	} else {
	    if (isset($_GET['ident']) && isset($_GET['activate'])) {
		$this->set('ident', $_GET['ident']);
		$this->set('activate', $_GET['activate']);
	    }
	}
    }

    /**
     * Used to send email verification mail to user
     *
     * @access public
     * @return void
     */
    public function emailVerification() {
	if ($this->request->isPost()) {
	    $this->User->set($this->data);
	    if ($this->User->LoginValidate()) {
		$email = $this->data['User']['email'];
		$user = $this->User->findByUsername($email);
		if (empty($user)) {
		    $user = $this->User->findByEmail($email);
		    if (empty($user)) {
			$this->Session->setFlash('Email address or username is invalid');
			return;
		    }
		}
		if ($user['User']['email_verified'] == 0) {
		    $this->User->sendVerificationMail($user);
		    $this->Session->setFlash('Please check your e-mail address to verify you!');
		} else {
		    $this->Session->setFlash('Address your email has been verified');
		}
		$this->redirect('/login');
	    }
	}
    }

}

