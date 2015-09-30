<?php
class WDS_System_Info{

	//Ham khoi tao cua lop
	public function __construct(){
		$ns = new Zend_Session_Namespace('info');
		//$ns->setExpirationSeconds(1800);
	}
	
	//Tao thong cua nguoi dang nhap
	public function createInfo(){
		$auth = Zend_Auth::getInstance();
		$infoAuth = $auth->getIdentity();
		
		$this->setMemberInfo($infoAuth);
		$this->setAclInfo();
	}
	
	//Huy thong tin nguoi khi logout
	public function destroyInfo(){
		$ns = new Zend_Session_Namespace('info');
		$ns->unsetAll();
	}
	
	//Thiet lap thong tin cua User khi ho login
	public function setMemberInfo($infoAuth){
		$tblUser = new WDS_Model_Users_User();
		$result = $tblUser->getItemById($infoAuth->user_id);	
		
		$ns = new Zend_Session_Namespace('info');
		$ns->member = $result;
	}
	
	//Thiet lap thong phan quyen cua user
	public function setAclInfo(){
		$acl = new WDS_System_Acl();
		$acl = new \WDS\Acl\Acl();
		$acl->createPrivilegeArray();
		$acl->createRole();
	}
	
	//Lay thong phan quyen cua user
	public function getAclInfo($part = null){
		$ns = new Zend_Session_Namespace('info');
		$nsInfo = $ns->getIterator();
		
		if($part == null){
			$info = $nsInfo['acl'];
		}else{
			$info = $nsInfo['acl'];
			$info = $info[$part];
		}
		
		return $info;
	}
	
	//Lay thong tin cua user da su he thong
	public function getMemberInfo($part = null){
		$ns = new Zend_Session_Namespace('info');
		$nsInfo = $ns->getIterator();
		
		if($part == null){
			$info = $nsInfo['member'];
		}else{
			$info = $nsInfo['member'];
			$info = $info[$part];
		}
		
		return $info;
	}
	
	//Lay tat ca cac thong tin cua user da dang nhap
	public function getInfo(){
		$ns = new Zend_Session_Namespace('info');
		$info = $ns->getIterator();
		return $info;
	}
}