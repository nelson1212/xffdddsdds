<?php
/* Roles Test cases generated on: 2011-02-05 02:06:20 : 1296867980*/
App::import('Controller', 'Roles');

class TestRolesController extends RolesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class RolesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.role', 'app.user', 'app.album', 'app.comment', 'app.new', 'app.photo', 'app.news', 'app.category', 'app.poll', 'app.question');

	function startTest() {
		$this->Roles =& new TestRolesController();
		$this->Roles->constructClasses();
	}

	function endTest() {
		unset($this->Roles);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

	function testAdminIndex() {

	}

	function testAdminView() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminDelete() {

	}

}
?>