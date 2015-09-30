<?php
class WDS_Model_Users_Group extends Zend_Db_Table_Abstract{
	protected $_name = 'groups';
	protected $_primary = 'group_id';
	
	public function getItemById($id){
		return $this->find($id)->current()->toArray();
	}
	
	public function listItem(){
		return $this->fetchAll()->toArray();
	}
	
	public function fetchPaginatorAdapter($filters = array(), $sortField = null) {
		$select = $this->select();
		if (count($filters) > 0) {
			foreach ($filters as $field => $filter) {
				$select->where($field . ' =?', $filter);
			}
		}
		if (null != $sortField) {
			$select->order($sortField);			
		}
		
		$adapter = new Zend_Paginator_Adapter_DbTableSelect($select);
		return $adapter;
	}
	
	public function saveItem($arrParam, $options = null){
		if ($options['task'] == 'admin-addnew'){
			$row = $this->fetchNew();
			$row->group_title 			= $arrParam['group_title'];
			$row->group_description 	= $arrParam['group_description'];
			
			$id = $row->save();
			
			$tblRoleGroup = new WDS_Model_Roles_Group();
			$group_id = $arrParam['group_id'];
			if ($group_id > 0){
				$roles = $tblRoleGroup->getItemByGroupId($group_id);
				foreach ($roles as $val) {
					$data = array('group_id'=>$id,
								  'role_id'=>$val['role_id']
					);
					$tblRoleGroup->insertItem($data);
				}
			}
			return $id;
		}
		
		if ($options['task'] == 'admin-edit'){
			$row = $this->find($arrParam['id'])->current();
			$row->group_title 			= $arrParam['group_title'];
			$row->group_description 	= $arrParam['group_description'];
			return $row->save();
		}
	}
	
	public function deleteItem($arrParam, $options = null){
		$where = 'id = ' . $arrParam['id'];
		return $this->delete($where);
	}
}