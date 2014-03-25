<?php
App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	
/**
 * beforeFilter method
 *
 * @return void
 */
 	public function beforeFilter() {
	 	parent::beforeFilter();
	 	$this->Auth->allow('add','logout');
 	}
 	
/**
 * login method
 *
 * @return void
 */
 	public function login() {
	 	if ($this->request->is('post')) {
		 	if ($this->Auth->login()) {
			 	return $this->redirect($this->Auth->redirectUrl());
			 	//return $this->redirect($this->Auth->redirect());
		 	}
		 	$this->Session->setFlash(__('Invalid username or password, try again'));
	 	}
 	}

/**
 * logout method
 *
 * @return redirect
 */
 	public function logout() {
	 	return $this->redirect($this->Auth->logout());
 	}
 
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			$file = $this->data['User']['picture'];
			$dir = 'img/users/' . $this->data['User']['username'];
			$ext = substr(strtolower(strrchr($file['name'], '.')), 1);
			$this->request->data['User']['profilepic'] = 'users/' . $this->data['User']['username'] . '/profilepic.' . $ext;
			if ($this->User->save($this->request->data)) {
				mkdir($dir, 0777, true);
				move_uploaded_file($file['tmp_name'], $dir . '/profilepic.' . $ext);
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}	
		}
	}

/**
 * changedescription method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function changedescription($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['User']['id'] = $this->Auth->user('id');
			if ($this->User->save($this->request->data)) {
								$this->Session->setFlash(__('Description changed'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}	
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}
	
/**
 * changepassword method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function changepassword($id = null) {
		$user = $this->User->findById($this->Auth->user('id'));
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if($user['User']['password'] == AuthComponent::password($this->request->data['User']['oldpassword'])) {
				$this->request->data['User']['id'] = $this->Auth->user('id');
				$this->request->data['User']['password'] = $this->request->data['User']['newpassword'];
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('Password changed'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			} else {
				$this->Session->setFlash(__('Wrong password'));
			}
				
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * changepp method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function changepp($id = null) {
		$user = $this->User->findById($id);
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('put')) {
			$this->request->data['User']['id'] = $this->Auth->user('id');
			$file = $this->request->data['User']['picture'];
			$dir = 'img/users/' . $user['User']['username'];
			$ext = substr(strtolower(strrchr($file['name'], '.')), 1);
			$this->request->data['User']['profilepic'] = 'users/' . $user['User']['username'] . '/profilepic.' . $ext;
			if ($this->User->save($this->request->data)) {
				// Delete old progile picture
				$nfile = new File('img/' . $user['User']['profilepic']);
				$nfile->delete();
				$nfile->close();	
				// Upload new one
				move_uploaded_file($file['tmp_name'], $dir . '/profilepic.' . $ext);
				$this->Session->setFlash(__('Profile picture changed'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}
	
/**
 * isAuthorized method
 *
 * @throws NotFoundException
 * @param string $user
 * @return boolean if the user is authorized to be there
 */	
	public function isAuthorized($user) {
	    // All registered users can do this
	    if (in_array($this->action, array('view', 'index', 'logout'))) {
	        return true;
	    }
	    
	    if (in_array($this->action, array('changedescription', 'changepassword', 'changepp'))) { 
	        $userId = $this->request->params['pass'][0];
	        if ($userId === $user['id']) {
	            return true;
	        }
	    }
	
	    return false;
	}
}
