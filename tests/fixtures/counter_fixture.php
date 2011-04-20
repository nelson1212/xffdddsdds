<?php
/* Counter Fixture generated on: 2011-04-16 13:29:14 : 1302974954 */
class CounterFixture extends CakeTestFixture {
	var $name = 'Counter';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'ip' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'num_votos' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'ip' => 'Lorem ipsum dolor sit a',
			'num_votos' => 1,
			'created' => '2011-04-16 13:29:14',
			'modified' => '2011-04-16 13:29:14'
		),
	);
}
?>