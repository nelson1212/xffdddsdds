<?php
/* User Test cases generated on: 2011-03-20 05:03:30 : 1300596630*/
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {
	var $fixtures = array('app.user', 'app.role', 'app.album', 'app.comment', 'app.new', 'app.photo', 'app.news', 'app.category', 'app.poll', 'app.question');

	function startTest() {
		$this->User =& ClassRegistry::init('User');
	}

	function endTest() {
		unset($this->User);
		ClassRegistry::flush();
	}

}
?>