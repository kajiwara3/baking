<?php
class Sale extends AppModel {
  var $name = 'Sale';
  var $useTable = 'sales';
  var $validate = array(
    'catalog_id' => array(
      'numeric' => array(
        'rule' => array('numeric'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'customer_id' => array(
      'numeric' => array(
        'rule' => array('numeric'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
  );
  //The Associations below have been created with all possible keys, those that are not needed can be removed

  var $belongsTo = array(
    'Catalog' => array(
      'className' => 'Catalog',
      'foreignKey' => 'catalog_id',
      'conditions' => '',
      'fields' => '',
      'order' => ''
    ),
    'Customer' => array(
      'className' => 'Customer',
      'foreignKey' => 'customer_id',
      'conditions' => '',
      'fields' => '',
      'order' => ''
    )
  );
}
