<?php
class Photo extends AppModel {
	var $name = 'Photo';
	var $displayField = 'id';
	
	var $validate = array(
	'album_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
     'foto1' => array(
			'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg'),
			'message' => 'Por favor indique una imágen válida.'
			)
		),	
     
	 'foto2' => array(
			'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg'),
			'message' => 'Por favor indique una imágen válida.'
			)
		),	
    	
	 'foto3' => array(
			'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg'),
			'message' => 'Por favor indique una imágen válida.'
			)
		),	
    	
    'foto4' => array(
			'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg'),
			'message' => 'Por favor indique una imágen válida.'
			)
		),	
    	
	'foto5' => array(
			'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg'),
			'message' => 'Por favor indique una imágen válida.'
			)
		),	
    	
		
    	
									
		
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Album' => array(
			'className' => 'Album',
			'foreignKey' => 'album_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
/*
	var $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'photo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
 */
}
?>