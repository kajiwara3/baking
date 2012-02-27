<?php
class SalesController extends AppController {
    var $name = 'Sales';

    function index() {
        $this->Sale->recursive = 0;
        $this->set('sales', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid sale', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('sale', $this->Sale->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            // バリデーションを行ない、
            // add_confirmにリダイレクト
        }
        $catalogs = $this->Sale->Catalog->find('list');
        $customers = $this->Sale->Customer->find('list');
        $this->set(compact('catalogs', 'customers'));
    }

    function add_confirm() {
        // セッションに入力された値がある場合、確認画面を表示
        // 登録ボタンを押すと、値を保存してindexにリダイレクト
        // 戻るボタン対応も行う
/*
        if (!empty($this->data)) {
            $this->Sale->create();
            if ($this->Sale->save($this->data)) {
                $this->Session->setFlash(__('The sale has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The sale could not be saved. Please, try again.', true));
            }
        }
*/
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid sale', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Sale->save($this->data)) {
                $this->Session->setFlash(__('The sale has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The sale could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Sale->read(null, $id);
        }
        $catalogs = $this->Sale->Catalog->find('list');
        $customers = $this->Sale->Customer->find('list');
        $this->set(compact('catalogs', 'customers'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for sale', true));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Sale->delete($id)) {
            $this->Session->setFlash(__('Sale deleted', true));
            $this->redirect(array('action'=>'index'));
        }
        $this->Session->setFlash(__('Sale was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }
}
