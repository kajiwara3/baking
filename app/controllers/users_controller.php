<?php
class UsersController extends AppController {

    var $name = 'Users';
    var $components = array("Auth", 'Acl');
    function beforeFilter() {
//        $this->Auth->allow(array('add', 'index', 'delete'));
        $this->Auth->allow('logout');
        $this->Auth->authError = 'ログインしていません';
        $this->Auth->loginError = 'ログインに失敗しました';
    }
    function login() {
    }

    function logout() {
        $this->Auth->logout();
    }

    function index() {
        $this->User->recursive = 0;
        $user_id = $this->Auth->user('id');

        $this->set('users', $this->paginate());

        $username = $this->Auth->user('username');
        $user_id = $this->Auth->user('id');
        $group_id = $this->Auth->user('group_id');
        $action = $this->action;
        $action = $action == 'index' ? 'read' : $action;
        $action = $action == 'view' ? 'read' : $action;
        $action = $action == 'show2' ? 'read' : $action;
        $action = $action == 'add' ? 'create' : $action;
        $action = $action == 'edit' ? 'update' : $action;
        $action = $action == 'del' ? 'delete' : $action;
        //        if ($this->Acl->check($username, 'Users', $action)) {
        if ($this->Acl->check(array('model' => 'Group', 'foreign_key' => $group_id), 'Users', $action)) {
            $this->Session->setFlash($username . '：' . $action . '：アクセスできます。');
            return;
        } else {
            $this->Session->setFlash($username . '：' . $action . '：アクセスできません。');
        }
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid user', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('user', $this->User->read(null, $id));

        $username = $this->Auth->user('username');
        $group_id = $this->Auth->user('group_id');
        $action = $this->action;
        $action = $action == 'index' ? 'read' : $action;
        $action = $action == 'view' ? 'read' : $action;
        $action = $action == 'show2' ? 'read' : $action;
        $action = $action == 'add' ? 'create' : $action;
        $action = $action == 'edit' ? 'update' : $action;
        $action = $action == 'del' ? 'delete' : $action;
        if ($this->Acl->check(array('model' => 'Group', 'foreign_key' => $group_id), 'Users', $action)) {
            $this->Session->setFlash($username . '：' . $action . '：アクセスできます。');
            return;
        } else {
            $this->Session->setFlash($username . '：' . $action . '：アクセスできません。');
        }
    }

    function add() {
        if (!empty($this->data)) {
            $this->User->create();
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('The user has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
            }
        }

        $username = $this->Auth->user('username');
        $action = $this->action;
        $group_id = $this->Auth->user('group_id');
        $user_id = $this->Auth->user('id');

        $action = $action == 'index' ? 'read' : $action;
        $action = $action == 'view' ? 'read' : $action;
        $action = $action == 'show2' ? 'read' : $action;
        $action = $action == 'add' ? 'create' : $action;
        $action = $action == 'edit' ? 'update' : $action;
        $action = $action == 'del' ? 'delete' : $action;
        //        if ($this->Acl->check($username, 'Users', $action)) {
//        if ($this->Acl->check(array('model' => 'Group', 'foreign_key' => $group_id), 'Users', $action)) {
        if ($this->Acl->check(array('model' => 'Group', 'foreign_key' => $group_id), 'Users', $action)) {
            $this->Session->setFlash($username . '：' . $action . '：アクセスできます。');
            return;
        } else {
            $this->Session->setFlash($username . '：' . $action . '：アクセスできません。');
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid user', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('The user has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->User->read(null, $id);
        }

        $username = $this->Auth->user('username');
        $user_id = $this->Auth->user('id');
        $action = $this->action;
        $action = $action == 'index' ? 'read' : $action;
        $action = $action == 'view' ? 'read' : $action;
        $action = $action == 'show2' ? 'read' : $action;
        $action = $action == 'add' ? 'create' : $action;
        $action = $action == 'edit' ? 'update' : $action;
        $action = $action == 'del' ? 'delete' : $action;
//        if ($this->Acl->check('admin/seiji', 'Users', $action)) {
        if ($this->Acl->check(array('model' => 'User', 'foreign_key' => $user_id), 'Users', $action)) {
            $this->Session->setFlash($username . '：' . $action . '：アクセスできます。');
            return;
        } else {
            $this->Session->setFlash($username . '：' . $action . '：アクセスできません。');
        }
    }

    function delete($id = null) {
        $username = $this->Auth->user('username');
        $action = $this->action;

        if (!$id) {
            $this->Session->setFlash(__('Invalid id for user', true));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->delete($id)) {
            $this->Session->setFlash(__('User deleted', true));
            $this->redirect(array('action'=>'index'));
        }
        $this->Session->setFlash(__('User was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }
}
