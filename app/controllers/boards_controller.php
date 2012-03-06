<?php
/**
 *
 * Enter description here ...
 * @author seiji
 *
 */
class BoardsController extends AppController
{
    public $name = 'Boards';
    public $uses = array('Board', 'Personal');
//    public  $layout = 'hello';
    public $components = array('Auth', 'Acl');

    public $paginate = array(
        'page' => 1,
        'conditions' => array(),
            'fields' => array('id', 'title', 'content'),
            'sort' => 'id',
            'limit' => 5,
            'direction' => 'desc',
            'recursive' => 0
    );

    public function beforeFilter()
    {
//        $this->Auth->authError = 'あなたはログインしていません';
//        $this->Auth->authorize = 'controller';
/*
        $username = $this->Auth->user('username');
        $action = $this->action;
        $action = $action == 'index' ? 'read' : $action;
        $action = $action == 'show' ? 'read' : $action;
        $action = $action == 'show2' ? 'read' : $action;
        $action = $action == 'add' ? 'create' : $action;
        $action = $action == 'edit' ? 'update' : $action;
        $action = $action == 'del' ? 'delete' : $action;

        $user_id = $this->Auth->user('id');
        if ($this->Acl->check('User.' . $user_id, 'Boards', $action)) {
            $this->Session->setFlash($username . '：' . $action . '：アクセスできます。');
            return;
        } else {
            $this->Session->setFlash($username . '：' . $action . '：アクセスできません。');
        }
*/
    }

    private function makeARO()
    {
        $aro = new Aro();
        $groups = array(
            1 => array('alias' => 'admin'),
            2 => array('alias' => 'member'),
            3 => array('alias' => 'guest'),
        );
        foreach ($groups as $group) {
            $aro->create();
            $aro->save($group);
        }
    }

    private function makeChildARO()
    {
        $aro = new Aro();
        $groups = array(
            1 => array('alias' => 'seiji', 'parent_id' => 1),
            2 => array('alias' => 'akatsuka', 'parent_id' => 2),
            3 => array('alias' => 'kajiwara', 'parent_id' => 3),
        );
        foreach ($groups as $group) {
            $aro->create();
            $aro->save($group);
        }
    }

    private function makeACO()
    {
        $aco = new Aco();
        $groups = array(
            1 => array('alias' => 'board'),
            2 => array('alias' => 'personal'),
        );
        foreach ($groups as $group) {
            $aco->create();
            $aco->save($group);
        }
    }

    private function makePermission()
    {
        $this->Acl->allow('admin', 'board');
        $this->Acl->allow('member', 'board');

        $this->Acl->deny('member', 'board', 'create');
        $this->Acl->deny('member', 'board', 'delete');

        $this->Acl->deny('guest', 'board');
        $this->Acl->allow('guest', 'board', 'read');
    }

    public function isAuthorized()
    {
        $this->Session->setFlash(
            __('ログインしています：' . $this->Auth->user('username')), true);
        return true;
    }

    /**
     * 利用するテーブルの設定。
     */
    //    public $scaffold;
    /**
     * Enter description here ...
     */
    function index()
    {
//        $this->makeChildARO();
//        $this->makeACO();
//        $this->makePermission();
//        $action = $this->action;
//        $username = $this->Auth->user('username');
//        $this->Session->setFlash($username . '：' . $action . '：アクセスできます。');
        $data = $this->paginate();
        $this->set('data', $data);
    }

    public function show($param)
    {
        $data = $this->Board->find('all', array(
            'conditions' => array('Board.id' => $param),
        ));
        $this->set('data', $data);
    }

    public function show2($param)
    {
        $data = $this->Personal->find('all', array(
            'conditions' => array(
                'Personal.id' => $param,
            )
        ));
        $this->set('data', $data);
    }

    function add()
    {
        if (!empty($this->data)) {
            if ($this->Personal->checkNameAndPass($this->data) == 0) {
                $this->Personal->invalidate('name', '名前またはパスワードを確認ください。');
                $this->Personal->invalidate('password', '名前またはパスワードを確認ください。');
            } else {
                $res = $this->Personal->find(all, array(
                    'conditions' => array(
                        'Personal.name' => $this->data['Personal']['name'],
                        'Personal.password' => $this->data['Personal']['password'],
                    )
                ));
                $this->data['Board']['personal_id'] = $res[0]['Personal']['id'];
                $this->Board->save($this->data);
                if ($this->Board->validates()) {
                    $this->redirect('.');
                }
            }
        }
    }

    public function edit($param)
    {
        if (!empty($this->data)) {
            $this->set('data', $this->data);
            if ($this->personal->checkNameAndPass($this->data) == 0) {
                $this->Personal->invalidate('password', 'パスワードを確認ください');
            } else {
                $this->Board->save($this->data);
                $this->redirect('.');
            }
        } else {
            $this->Board->id = $param;
            $this->data = $this->Board->read();
            $this->data['Personal']['password'] = null;
            $this->set('data', $this->data);
        }
    }

    /**
     *
     * Enter description here ...
     */
    function addRecord()
    {
        if (!empty($this->data)) {
            $this->Board->save($this->data);
        }
        if ($this->Board->validates()) {
            $this->redirect('.');
        }
    }

    /**
     *
     * Enter description here ...
     */
    function delRecord()
    {
        if ($this->data['Board']['id'] != '') {
            $this->Board->delete($this->data['Board']['id']);
        }
        $this->redirect('.');
    }

}