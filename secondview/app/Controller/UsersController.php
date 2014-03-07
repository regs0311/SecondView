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
			 	return $this->redirect($this->Auth->redirect());
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
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
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
	    // All registered users can view other users
	    if (in_array($this->action, array('view', 'index', 'logout'))) {
	        return true;
	    }
	
	    // The owner of a post can edit and delete it
	    if ($this->action === 'edit') {
	        $userId = $this->request->params['pass'][0];
	        if ($userId === $user['id']) {
	            return true;
	        }
	    }
	
	    return false;
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 DONT NEED TO IMPLEMENT?
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
*/
}
