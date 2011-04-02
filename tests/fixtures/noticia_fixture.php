<?php
/* Noticia Fixture generated on: 2011-03-20 06:03:43 : 1300598743 */
class NoticiaFixture extends CakeTestFixture {
	var $name = 'Noticia';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'category_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'content' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'image' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'users_news' => array('column' => 'user_id', 'unique' => 0), 'news_categories' => array('column' => 'category_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'category_id' => 1,
			'user_id' => 1,
			'title' => 'Lorem ipsum dolor sit a',
			'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'image' => 'Lorem ipsum dolor sit a',
			'created' => '2011-03-20 06:25:43',
			'modified' => '2011-03-20 06:25:43'
		),
	);
}
?>