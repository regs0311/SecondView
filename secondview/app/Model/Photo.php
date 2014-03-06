<?php
App::uses('AppModel', 'Model');
/**
 * Photo Model
 *
 */
class Photo extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id_user' => array(
			'numeric' => array(
				'rule'    => array('numeric'),
			),
		),
		'src' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Select a photo',
			),
		),
	);
}
