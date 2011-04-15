<?php
/* Content Test cases generated on: 2011-04-12 19:42:48 : 1302651768*/
App::import('Model', 'Content');

class ContentTestCase extends CakeTestCase {
	var $fixtures = array('app.content', 'app.user', 'app.role', 'app.album', 'app.comment', 'app.noticia', 'app.category', 'app.photo', 'app.poll', 'app.question');

	function startTest() {
		$this->Content =& ClassRegistry::init('Content');
	}

	function endTest() {
		unset($this->Content);
		ClassRegistry::flush();
	}

}
?>