<?php
class WDS_Model_Users_User extends Zend_Db_Table_Abstract{
	protected $_name = 'users';
	protected $_primary = 'user_id';
	
	public function saveItem($arrParam, $options = null){
		$row = $this->fetchNew();
		$row->username = $arrParam['username'];
		$row->password = md5($arrParam['password']);
		$row->fullname = $arrParam['fullname'];
		$row->email = $arrParam['email'];
		$row->phone = $arrParam['phone'];
		$row->address = $arrParam['address'];
		$row->time = time();
		
		if ($options['task'] == 'front-addnew'){
			return $row->save();
		}
		
		if ($options['task'] == 'admin-addnew'){
			$row->group_id = $arrParam['group_id'];
			return $row->save();
		}
		
		if ($options['task'] == 'admin-edit') {
			$row = $this->find($arrParam['id'])->current();
			$row->username = $arrParam['username'];
			
			if (!empty($arrParam['password'])){
				$row->password = md5($arrParam['password']);
			}
			
			$row->fullname = $arrParam['fullname'];
			$row->email = $arrParam['email'];
			$row->phone = $arrParam['phone'];
			$row->address = $arrParam['address'];
			$row->group_id = $arrParam['group_id'];
			return $row->save();
		}
	}
	
	public function getItemById($id){
		return $this->find($id)->current()->toArray();
	}
	
	public function fetchPaginatorAdapter($filters = array(), $sortField = null){
		$select = $this->select()
					   ->setIntegrityCheck(false)
					   ->from('users AS u')
		;
		  
		if (!empty($filters['name'])){
			$keywords = '%' . $filters['name'] . '%';
			switch ($filters['select']){
				case 'email':
					$select->where('u.user_email LIKE ?', $keywords);
					break;
				case 'username':
					$select->where('u.user_name LIKE ?', $keywords);
					break;
				default:
			}
		}
		
		if (null != $sortField) {
			$select->order($sortField);			
		}
					   
		$adapter = new Zend_Paginator_Adapter_DbTableSelect($select);
		return $adapter;
	}
}