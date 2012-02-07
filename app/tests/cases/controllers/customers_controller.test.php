<?php
/* Customers Test cases generated on: 2012-02-07 21:10:30 : 1328616630*/
App::import('Controller', 'Customers');

class TestCustomersController extends CustomersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CustomersControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.customer');

	function startTest() {
		$this->Customers =& new TestCustomersController();
		$this->Customers->constructClasses();
	}

	function endTest() {
		unset($this->Customers);
		ClassRegistry::flush();
	}

}
