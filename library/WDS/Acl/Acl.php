<?php
namespace WDS\Acl;
class Acl{
	
	protected $_acl;
	
	protected $_role;
	
	public function __construct($aclInfo = null, $options = null){
		//echo '<br>' . __METHOD__;
		
		if(!empty($aclInfo)){
			$acl = new Zend_Acl();
			$this->_role = $aclInfo['role'];
			$acl->addRole(new Zend_Acl_Role($this->_role));
			
			$groupPrivileges = $aclInfo['privileges'];
			$acl->allow($this->_role,null, $groupPrivileges);
			$this->_acl = $acl;
		}
		
	}
	
	public function isAllowed($arrParam = null){
		$ns = new Zend_Session_Namespace('info');
		$nsInfo = $ns->getIterator();
		$privilege = $arrParam['module'] . '_' . $arrParam['controller'] . '_' . $arrParam['action']; 
		$flagAccess = false;
		if($this->_acl->isAllowed($this->_role, null, $privilege)){
			$flagAccess = true;
		}
		
		return $flagAccess;
		
	}
	
	public function createPrivilegeArray($options = null){
		$ns = new Zend_Session_Namespace('info');
		$nsInfo = $ns->getIterator();
		$info = $nsInfo['member'];
		$user_id = $info['user_id'];
				
		$db = Zend_Registry::get('connectDB');
		$select = $db->select()
					 ->from('user_permisions as p', array())
					 ->join('roles as r','r.role_id = p.role_id')
					 ->where('p.user_id = ?', $user_id);
					 
		$result = $db->fetchAll($select);	
		$arrPrivilages = array();		
		if(!empty($result)){
			foreach ($result as $key){
				$arrPrivilages[] = $key['module'] . '_' . $key['controller'] . '_' . $key['action'];
			}
		}		
	
		$ns->acl['privileges']  = $arrPrivilages; 
		
	}
	
	public function createRole($options = null){
		$ns = new Zend_Session_Namespace('info');
		$nsInfo = $ns->getIterator();
		$info = $nsInfo['member'];
		$user_name  = $info['user_name'];
		$ns->acl['role'] = $user_name;
		
	}
	
	
}