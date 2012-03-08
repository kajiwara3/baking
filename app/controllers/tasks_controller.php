<?php
class TasksController extends AppController {
    var $name = 'Tasks';
    public $uses = 'Task';
    // ajax呼び出しに必要
    var $components = array('RequestHandler');

    // とりあえずタスクの一覧表示
    function index() {
        $this->set('tasks', $this->Task->find('all'));
    }

    function __sanitize() {
        App::import('Sanitize');
        $this->data = Sanitize::clean($this->data,
                                array(
        															'connection' => 'default',
        															'odd_spaces' => false,
                                			'remove_html' => false,
                                			'encode' => false,
                                			'dollar' => false,
                                			'carriage' => false,
                                			'unicode' => false,
                                			'escape' => true,
                                			'backslash' => false
                                        ));
//        'remove_html' => true));
    }

    // ajaxで呼び出される関数
    function ajax_add() {
        // デバッグ情報出力を抑制
        Configure::write('debug', 0);
        // ajax用のレイアウトを使用
        $this->layout = "ajax";
        // ajaxによる呼び出し？
        if($this->RequestHandler->isAjax()) {
            // POST情報は$this->params['form']で取得
            $title = $this->params['form']['title'];
            // DBに突っ込みます
            $this->data['Task']['title'] = $title;
            $this->__sanitize($this->data);
            $this->Task->create();
            $this->Task->save($this->data);
            if (!$this->Task->validates()) {
                echo 'dame';
            }
            // 表示用のデータをviewに渡す
            $this->set('t', $title);
        }
    }
}
