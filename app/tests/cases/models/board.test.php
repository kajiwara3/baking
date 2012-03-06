<?php
App::import('Model', 'Board');

class TestBoard extends Board
{
    public $cacheSources = false;
    public $useDbconfig = 'test_suite';
}

class BoardTestCase extends CakeTestCase {
    public $Board = null;
    public $fixtures = array('app.board', 'app.personal');

    function startTest() {
        $this->Board = ClassRegistry::init('Board');
    }

    function endTest() {
        unset($this->Board);
        ClassRegistry::flush();
    }

    function testBoardInstance()
    {
        $this->assertTrue(is_a($this->board, 'Board'));
    }
}

