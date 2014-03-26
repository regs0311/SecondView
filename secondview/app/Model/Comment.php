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
		'comment' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please add a comment',
			),
		),
	);
	
	public $belongsTo = array('Photo', 'User');
}
