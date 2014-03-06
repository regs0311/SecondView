<?php
App::uses('AppModel', 'Model');
/**
 * Comment Model
 *
 */
class Comment extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id_user' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'id_photo' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'comment' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please add a comment',
			),
		),
	);
}
