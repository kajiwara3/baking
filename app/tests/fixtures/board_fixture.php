<?php
/* Sale Fixture generated on: 2012-02-07 21:02:39 : 1328616159 */
class SaleFixture extends CakeTestFixture {
    var $name = 'Board';
    var $table = 'Boards';

    var $fields = array(
        'id' => array(
            'type' => 'integer',
            'null' => false,
            'key' => 'primary'
        ),
        'personal_id' => array(
            'type' => 'integer',
            'null' => false,
            'default' => null
        ),
        'title' => array(
            'type' => 'string',
            'length' => 255,
            'defult' => null
        ),
        'content' => array(
            'type' => 'text',
            'default' => null
        ),
    );

}
