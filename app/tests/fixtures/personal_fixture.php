<?php
/* Sale Fixture generated on: 2012-02-07 21:02:39 : 1328616159 */
class SaleFixture extends CakeTestFixture {
    var $name = 'Personal';
    var $table = 'personals';

    var $fields = array(
        'id' => array(
            'type' => 'integer',
            'null' => false,
            'key' => 'primary'
        ),
        'name' => array(
            'type' => 'string',
            'length' => 255,
            'default' => null
        ),
        'password' => array(
            'type' => 'string',
            'length' => 255,
            'defult' => null
        ),
        'content' => array(
            'type' => 'text',
            'default' => null
        ),
    );

    var $record = array(
        array(
            'id' => 1,
            'name' => 'name',
            'password' => 'password',
            'content' => 'content'
        )
    );
}
