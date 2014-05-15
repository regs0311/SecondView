<?php
App::uses('AppController', 'Controller');

class AboutController extends AppController {


	public function index() {
	
	}

 	public function isAuthorized() {
            return true;
	}


	public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('index');
        }
}
