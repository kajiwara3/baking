<?php
/* Sale Fixture generated on: 2012-02-07 21:02:39 : 1328616159 */
class SaleFixture extends CakeTestFixture {
	var $name = 'Sale';
	var $table = 'Sales';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'catalog_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'cate' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'catalog_id' => 1,
			'customer_id' => 1,
			'cate' => '2012-02-07 21:02:39'
		),
	);
}
