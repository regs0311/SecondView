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
		'src' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Select a photo',
			),
		),
	);
	
	
	public function isOwnedBy($photo, $user) {
    	return $this->field('id', array('id' => $photo, 'user_id' => $user)) === $photo;
    }
}
