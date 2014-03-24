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
		'description' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'Please add a description',
			)
		),
		'picture' => array(
        	'required' => array(
        		'rule'    => 'fileSelected',
        		'message' => 'Select a profile picture',
        	),
        	'ext' => array(
        		'rule'    => array('extension',array('gif', 'jpeg', 'png', 'jpg')),
        		'message' => 'Please supply a valid image.',
        	),
        ),
	);
	
	public function fileSelected($file) {
    	if(is_array($file) && array_key_exists('picture', $file) && !empty($file['picture'])) {
        	// Seems like a file was set
        	return true;
        }

    	// No file set, doesn't validate!
    	return false;
    }
	
	public function isOwnedBy($photo, $user) {
    	return $this->field('id', array('id' => $photo, 'user_id' => $user)) === $photo;
    }
}
