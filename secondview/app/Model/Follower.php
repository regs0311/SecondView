<?php
App::uses('AppModel', 'Model');
/**
 * Photo Model
 *
 */
class Follower extends AppModel {

   
    var $belongsTo = array(
        'Followed' => array(
            'className' => 'User',
            'foreignKey' => 'followed_id'
        ),
        'Follower' => array(
            'className' => 'User',
            'foreignKey' => 'follower_id'
        )
    );
}
