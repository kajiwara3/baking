<?php
App::import('Model', 'Personal');

class TestPersonal extends Board
{
    public $cacheSources = false;
    public $useDbconfig = 'test_suite';
}

class PersonalTestCase extends CakeTestCase {
    public $Personal = null;
    public $fixtures = array('app.board', 'app.personal');

    function startTest() {
        $this->Personal = ClassRegistry::init('Personal');
    }

    function endTest() {
        unset($this->Personal);
        ClassRegistry::flush();
    }

    function testBoardInstance()
    {
        $this->assertTrue(is_a($this->Personal, 'Personal'));
    }
}

