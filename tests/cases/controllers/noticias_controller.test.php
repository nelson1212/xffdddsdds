<?php
/* Noticias Test cases generated on: 2011-03-20 06:03:18 : 1300599258*/
App::import('Controller', 'Noticias');

class TestNoticiasController extends NoticiasController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class NoticiasControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.noticia', 'app.category', 'app.user', 'app.role', 'app.album', 'app.comment', 'app.photo', 'app.poll', 'app.question');

	function startTest() {
		$this->Noticias =& new TestNoticiasController();
		$this->Noticias->constructClasses();
	}

	function endTest() {
		unset($this->Noticias);
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