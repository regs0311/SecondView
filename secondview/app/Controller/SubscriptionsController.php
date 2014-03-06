<?php
App::uses('AppController', 'Controller');
/**
 * Subscriptions Controller
 *
 * @property Subscription $Subscription
 * @property PaginatorComponent $Paginator
 */
class SubscriptionsController extends AppController {

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
		$this->Subscription->recursive = 0;
		$this->set('subscriptions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Subscription->exists($id)) {
			throw new NotFoundException(__('Invalid subscription'));
		}
		$options = array('conditions' => array('Subscription.' . $this->Subscription->primaryKey => $id));
		$this->set('subscription', $this->Subscription->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Subscription->create();
			if ($this->Subscription->save($this->request->data)) {
				$this->Session->setFlash(__('The subscription has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subscription could not be saved. Please, try again.'));
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
		if (!$this->Subscription->exists($id)) {
			throw new NotFoundException(__('Invalid subscription'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Subscription->save($this->request->data)) {
				$this->Session->setFlash(__('The subscription has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subscription could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Subscription.' . $this->Subscription->primaryKey => $id));
			$this->request->data = $this->Subscription->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Subscription->id = $id;
		if (!$this->Subscription->exists()) {
			throw new NotFoundException(__('Invalid subscription'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Subscription->delete()) {
			$this->Session->setFlash(__('The subscription has been deleted.'));
		} else {
			$this->Session->setFlash(__('The subscription could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
