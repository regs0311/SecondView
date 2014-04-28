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
 * beforeFilter method
 *
 * @return void
 */
 	public function beforeFilter() {
	 	parent::beforeFilter();
	 	$this->Auth->allow('view','search');
 	}

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->loadModel('User');
		// Display all your info
        $this->set('user', $this->User->findById($this->Auth->user('id')));
        $this->set('myphotos', count($this->Photo->findAllByUserId($this->Auth->user('id'))));
        
        $this->loadModel('Follower');
        $this->set('follows', count($this->Follower->query("SELECT id FROM followers WHERE follower_id = " . $this->Auth->user('id'))));
        $this->set('following', count($this->Follower->query("SELECT id FROM followers WHERE followed_id = " . $this->Auth->user('id'))));
        
        // Get users that you follow
        $listFollowing = $this->Follower->query("SELECT followed_id FROM followers WHERE follower_id = " . $this->Auth->user('id'));
        
        // Retrieve the ids of the followed users
        $following = array();
        foreach($listFollowing as $fol) {
	    	array_push($following, $fol['followers']['followed_id']); 
        }
        $this->Photo->recursive = 0;
        $this->set('photos', $this->Photo->findAllByUserId($following));
	}
	
/**
 * search method
 *
 * @return void
 */	
	public function search() {
		if($this->request->is('post')) {
			$terms = $this->request->data['Photo']['srch-word'];
			$array_terms = preg_split('/[\ \n\,]+/', $terms);
			$numterms = count($array_terms);
			$i = 0;
			$usersQuery = '';
			$photosQuery = '';
			foreach ($array_terms as $term) {
			    if ($i != 0) {
					$usersQuery = $usersQuery . " OR username LIKE '%" . $term . "%'";
					$photosQuery = $photosQuery . " OR description LIKE '%" . $term . "%'";  
			    } else {
				    $usersQuery = "username LIKE '%" . $term . "%'";
					$photosQuery = "description LIKE '%" . $term . "%'";
			    }
			    $i++;
			}
			$this->set('photos', $this->Photo->query("SELECT * FROM photos WHERE " . $photosQuery));
			$this->loadModel('User');
			$this->set('users', $this->User->query("SELECT * FROM users WHERE " . $usersQuery));
		}
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
