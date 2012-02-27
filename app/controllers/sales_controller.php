<?php
class SalesController extends AppController {

  var $name = 'Sales';
  // $this->Session->write('name', 'value');
  // $this->Session->read('name');
  // $this->Session->delete('nme');
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
      $this->Sale->create();
      if ($this->Sale->save($this->data)) {
        $this->Session->setFlash(__('The sale has been saved', true));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The sale could not be saved. Please, try again.', true));
      }
    }
    $catalogs = $this->Sale->Catalog->find('list');
    $customers = $this->Sale->Customer->find('list');
    $this->set(compact('catalogs', 'customers'));
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
