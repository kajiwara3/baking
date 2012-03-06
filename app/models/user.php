<?php
class User extends AppModel {
/*
  var $name = 'User';
  var $useTable = 'Users';
  var $displayField = 'id';
  var $belongsTo = array('Group');
//  var $actsAs = array('Acl' => 'requester');
  var $actsAs = array('Acl' => array('Aro'));
*/
  var $validate = array(
    'username' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
  );
/*
  function parentNode($type)
  {
      if ($type == 'Aro') {
          if (!$this->id) {
              return null;
          }

          $data = $this->read();
          if (!$data['User']['group_id']){
              return null;
          } else {
              return array('model' => 'Group', 'foreign_key' => $data['User']['group_id']);
          }
      } else {
          return false;
      }
  }
*/

  var $name = 'User';
  var $belongsTo = array('Group');
  var $actsAs = array('Acl' => 'requester');

  function parentNode() {
      if (!$this->id && empty($this->data)) {
          return null;
      }
      $data = $this->data;
      if (empty($this->data)) {
          $data = $this->read();
      }
      if (!$data['User']['group_id']) {
          return null;
      } else {
          return array('Group' => array('id' => $data['User']['group_id']));
      }
  }
/*
  function save($data = null, $validate = true, $fieldList = array())
  {
      if (parent::save($data, $validate, $fieldList)) {
          App::import('Component', 'Acl');
          $Aro = new Aro;
          $conditions = array(
                  'model' => 'Group',
                  'foreign_key' => $data['User']['group_id'],
          );
          $parent_id = $Aro->field('id', $conditions);
          $conditions = array(
                  'model' => $this->name,
                  'foreign_key' => $data['User']['id'],
          );
          $Aro->id = $Aro->field('id', $conditions);
          $Aro->saveField('parent_id', $parent_id);
          $Aro->saveField('alias', $this->name . '.' . $data['User']['id']);
          return true;
      }
      return false;
  }
*/
/*
  function parentNode() {
  if (!$this->id && empty($this->data)) {
  return null;
  }
  $data = $this->data;
  var_dump($data);
  if (empty($this->data)) {
  $data = $this->read();
  }
  if (!$data['User']['group_id']) {
  return null;
  } else {
  return array('Group' => array('id' => $data['User']['group_id']));
  }
  }
*/
}
