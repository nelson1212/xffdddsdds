<?php
class Comment extends AppModel {
	var $name = 'Comment';
	var $displayField = 'id';
	var $validate = array(
		'comment' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Noticia' => array(
			'className' => 'Noticia',
			'foreignKey' => 'noticia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Album' => array(
			'className' => 'Album',
			'foreignKey' => 'album_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Photo' => array(
			'className' => 'Photo',
			'foreignKey' => 'photo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>