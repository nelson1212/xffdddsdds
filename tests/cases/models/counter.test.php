<?php
/* Counter Test cases generated on: 2011-04-16 13:29:14 : 1302974954*/
App::import('Model', 'Counter');

class CounterTestCase extends CakeTestCase {
	var $fixtures = array('app.counter');

	function startTest() {
		$this->Counter =& ClassRegistry::init('Counter');
	}

	function endTest() {
		unset($this->Counter);
		ClassRegistry::flush();
	}

}
?>