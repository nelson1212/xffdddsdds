<?php
/* Role Test cases generated on: 2011-02-05 02:05:46 : 1296867946*/
App::import('Model', 'Role');

class RoleTestCase extends CakeTestCase {
	var $fixtures = array('app.role', 'app.user', 'app.album', 'app.comment', 'app.new', 'app.photo', 'app.news', 'app.category', 'app.poll', 'app.question');

	function startTest() {
		$this->Role =& ClassRegistry::init('Role');
	}

	function endTest() {
		unset($this->Role);
		ClassRegistry::flush();
	}

}
?>