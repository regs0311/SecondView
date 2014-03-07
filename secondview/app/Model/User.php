<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule'    => 'notEmpty',
                'message' => 'A username is required',
            ),
            'alphanumeric' => array(
            	'rule'    => 'alphaNumeric',
            	'message' => 'Only letters and numbers allowed',
            	'last'    => false,
            ),
            'length' => array(
            	'rule'    => array('minLength', 4),
            	'message' => 'Minimum length of 4 characters',
            ),
            'unique' => array(
            	'rule'    => 'isUnique',
            	'message' => 'The username already exists',
            ),
        ),
        'name' => array(
            'required' => array(
                'rule'    => 'notEmpty',
                'message' => 'A name is required'
            )
        ),
        'email' => array(
        	'unique' => array(
        		'rule'	  => 'isUnique',
        		'message' => 'The email already exists'
        	)
        ),
        'password' => array(
            'required' => array(
                'rule'    => 'notEmpty',
                'message' => 'A password is required'
            ),
            'length' => array(
            	'rule'    => array('minLength', 5),
            	'message' => 'Minimum length of 5 characters',
            ),
        ),
        'country' => array(
            'required' => array(
                'rule'    => 'notEmpty',
                'message' => 'A country is required'
            )
        ),
        'gender' => array(
        	'required' => array(
        		'rule'    => 'notEmpty',
        		'message' => 'Gender is not selected'
        	),
        	'valid' => array(
        		'rule'    => array('inList', array('0', '1')),
        		'message' => "That's not a gender!"
        	)
        ),
        'dob' => array(
        	'required' => array(
        		'rule'    => 'notEmpty',
        		'message' => 'Select your date of birth'
        	),
        ),
    );
    
/**
 * beforeSave method
 *
 * @return boolean
 */
 	public function beforeSave($options = array()) {
	 	if (isset($this->data[$this->alias]['password'])) {
		 	$passwordHasher = new SimplePasswordHasher();
		 	$this->data[$this->alias]['password'] = $passwordHasher->hash(
		 		$this->data[$this->alias]['password']
		 	);
	 	}
	 	return true;
 	}
 	
 
}
