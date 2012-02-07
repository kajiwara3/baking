<?php
/* Catalogs Test cases generated on: 2012-02-07 21:09:32 : 1328616572*/
App::import('Controller', 'Catalogs');

class TestCatalogsController extends CatalogsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CatalogsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.catalog');

	function startTest() {
		$this->Catalogs =& new TestCatalogsController();
		$this->Catalogs->constructClasses();
	}

	function endTest() {
		unset($this->Catalogs);
		ClassRegistry::flush();
	}

}
