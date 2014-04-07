<?php
App::uses('AppController', 'Controller');
/**
 * Photos Controller
 *
 * @property Photo $Photo
 * @property PaginatorComponent $Paginator
 */
class PhotosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->set('photos', $this->Photo->find('all'));
		$this->loadModel('User');
		// Display all your pictures in your profile
        $this->set('user', $this->User->findById($this->Auth->user('id')));
        $this->set('myphotos', $this->Photo->findAllByUserId($this->Auth->user('id')));

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Photo->exists($id)) {
			throw new NotFoundException(__('Invalid photo'));
		}
		$options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id), 'recursive' => 2);
		$this->set('photo', $this->Photo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Photo->create();
			$this->request->data['Photo']['user_id'] = $this->Auth->user('id');
			// Add photo
			$file = $this->data['Photo']['picture'];
			$random_name = substr(number_format(time() * rand(),0,'',''),0,10);
			$dir = 'img/users/' . $this->Auth->user('username') . '/';
			$ext = substr(strtolower(strrchr($file['name'], '.')), 1);
			$this->request->data['Photo']['src'] = 'users/' . $this->Auth->user('username') . '/' . $random_name .  '.' .$ext;
			
			if ($this->Photo->save($this->request->data)) {
				// Copy photo to server
				move_uploaded_file($file['tmp_name'], $dir . $random_name . '.' . $ext);
				return $this->redirect(array('action' => 'index',  "?" => array('param' => 's')));
			} else {
				return $this->redirect(array('action' => 'index',  "?" => array('param' => 'e')));
			}
		}
	}
	
	public function isAuthorized($user) {
    	// All registered users can view and add photos
    	if (in_array($this->action, array('view', 'add', 'index'))) {
        	return true;
        }

        // The owner of a post can delete it
        if ($this->action === 'delete') {
        	$photoId = $this->request->params['pass'][0];
        	if ($this->Post->isOwnedBy($postId, $user['id'])) {
            	return true;
            }
        }

    	return parent::isAuthorized($user);
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
*/
	public function delete($id = null) {
		$this->Photo->id = $id;
		if (!$this->Photo->exists()) {
			throw new NotFoundException(__('Invalid photo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Photo->delete()) {
			$this->Session->setFlash(__('The photo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The photo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
