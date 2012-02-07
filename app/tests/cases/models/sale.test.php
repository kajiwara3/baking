<?php
/* Sale Test cases generated on: 2012-02-07 21:02:39 : 1328616159*/
App::import('Model', 'Sale');

class SaleTestCase extends CakeTestCase {
	var $fixtures = array('app.sale', 'app.catalog', 'app.customer');

	function startTest() {
		$this->Sale =& ClassRegistry::init('Sale');
	}

	function endTest() {
		unset($this->Sale);
		ClassRegistry::flush();
	}

}
