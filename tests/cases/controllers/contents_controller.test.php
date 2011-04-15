<?php
/* Contents Test cases generated on: 2011-04-12 19:43:14 : 1302651794*/
App::import('Controller', 'Contents');

class TestContentsController extends ContentsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ContentsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.content', 'app.user', 'app.role', 'app.album', 'app.comment', 'app.noticia', 'app.category', 'app.photo', 'app.poll', 'app.question');

	function startTest() {
		$this->Contents =& new TestContentsController();
		$this->Contents->constructClasses();
	}

	function endTest() {
		unset($this->Contents);
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