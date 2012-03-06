<?php
class Task extends AppModel {
  public $name = 'Task';
 /*
  var $useTable = 'Users';
  var $displayField = 'id';
  var $belongsTo = array('Group');
//  var $actsAs = array('Acl' => 'requester');
  var $actsAs = array('Acl' => array('Aro'));
*/
  var $validate = array(
    'title' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        // 'required' => true,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
  );
}
