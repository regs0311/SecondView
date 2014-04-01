<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
 */
class CommentsController extends AppController {

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Comment']['user_id'] = $this->Auth->user('id');
			$this->Comment->create();
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved.'));
				return $this->redirect(array('controller' => 'photos', 'action' => 'view', $this->request->data['Comment']['photo_id'] ));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		}
	}
	
	public function isAuthorized($user) {

        // The owner of a post can delete it
        if ($this->action === 'add') {
        	return true;
        }

    	return parent::isAuthorized($user);
    }
}
