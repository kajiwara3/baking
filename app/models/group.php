 <?php
class Group extends AppModel {
	var $name = 'Group';
	var $displayField = 'name';
var $actsAs = array('Acl' => array('requester'));
// var $actsAs = array('Acl' => array('Aro'));
//	public $actsAs = array('Acl');
/*
	function parentNode() {
	    return null;
	}
*/
	function parentNode(){
	    if (!$this->id) {
	        return null;
	    }
	    $data = $this->read();
	    if (!$data['Group']['parent_id']){
	        return null;
	    } else {
	        return array('model' => 'Group', 'foreign_key' => $data['Group']['parent_id']);
	    }
	}
/*
	function save($data = null, $validate = true, $fieldList = array())
	{
	    if (parent::save($data, $validate, $fieldList)) {
	        App::import('Component', 'Acl');
	        $Aro = new Aro;
	        $conditions = array(
	                'model' => $this->name,
	                'foreign_key' => $data['Group']['parent_id'],
	        );
	        $parent_id = $Aro->field('id', $conditions);
	        $conditions = array(
	                'model' => $this->name,
	                'foreign_key' => $data['Group']['id'],
	        );
	        $Aro->id = $Aro->field('id', $conditions);
	        $Aro->saveField('parent_id', $parent_id);
	        $Aro->saveField('alias', $this->name . '::' . $data['Group']['id']);
	        return true;
	    }
	    return false;
	}
*/
}
