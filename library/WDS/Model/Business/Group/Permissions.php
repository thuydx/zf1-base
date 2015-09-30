<?php
class WDS_Model_Roles_Group extends Zend_Db_Table_Abstract{
	protected $_name = 'group_permissions';
	protected $_pimary = 'group_permission_id';
	
	public function checkAvailable($group_id, $role_id){
		$clause = 'role_id = ' . $role_id;
		$validate = new Zend_Validate_Db_NoRecordExists(array('table'=>'group_permissions',
															  'field'=>'group_id',
															  'exclude'=>$clause
		));
		if ($validate->isValid($group_id)) {
			return false;
		}else {
			return true;
		}
	}
	
	public function getItemByGroupId($group_id){
		$where = 'group_id = ' . $group_id;
		return $this->fetchAll($where)->toArray();
	}
	
	public function setPermission($arrParam){
		$groupId = $arrParam['id'];
		
		if (isset($arrParam['cid'])){					
			$cid = $arrParam['cid'];
			
			$items = $this->getItemByGroupId($groupId);
			$tmp = array();
			foreach ($items as $val) {
				$tmp[$val['role_id']] = $val['group_permision_id'];
			}
			
			foreach ($cid as $key=>$val) {
				if ($tmp[$val]) {
					unset($tmp[$val]);
				}else {
					$data = array('group_id'=>$groupId,
								  'role_id'=>$val
					);
					$this->insertItem($data);
				}
			}
			
			if (count($tmp) > 0){
				foreach ($tmp as $val) {
					$where = 'group_permision_id = ' . $val['group_permision_id'];
					$this->delete($where);
				}
			}
		}else {
			$this->deleteByGroupId($groupId);
		}
		return true;
	}
	
	public function deleteByGroupId($group_id){
		$where = 'group_id = ' . $group_id;
		return $this->delete($where);
	}
	
	public function insertItem($data){
		return $this->insert($data);
	}
}