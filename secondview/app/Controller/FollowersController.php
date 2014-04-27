<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
 */
class FollowersController extends AppController {

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Follower']['follower_id'] = $this->Auth->user('id');
			$this->Follower->create();
			if ($this->Follower->save($this->request->data)) {
				return $this->redirect(array('controller' => 'users', 'action' => 'view', $this->request->data['Follower']['followed_id'] ));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		}
	}
	
	function delete($id = null) {
    	$this->Follower->delete($id);
    	$this->redirect($this->referer());
    }
	
	public function isAuthorized($user) {

        if (in_array($this->action, array('add', 'delete'))) {
        	return true;
        }

    	return parent::isAuthorized($user);
    }
}
