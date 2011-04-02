<?php
/* Poll Test cases generated on: 2011-02-05 02:03:43 : 1296867823*/
App::import('Model', 'Poll');

class PollTestCase extends CakeTestCase {
	var $fixtures = array('app.poll', 'app.user', 'app.role', 'app.album', 'app.comment', 'app.new', 'app.photo', 'app.news', 'app.category', 'app.question');

	function startTest() {
		$this->Poll =& ClassRegistry::init('Poll');
	}

	function endTest() {
		unset($this->Poll);
		ClassRegistry::flush();
	}

}
?>