<?php
App::uses('AppModel', 'Model');
/**
 * Subscription Model
 *
 */
class Subscription extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'is_following' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'being_followed' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'allowEmpty' => false,
				'required' => true,
			),
		),
	);
}
