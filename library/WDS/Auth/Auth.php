<?php
namespace WDS\Auth;
class Auth{
	
	protected $_messageError = null;
	
	public function login($arrParam, $options = null){
		//1. Goi ket noi voi Zend Db
		$db = Zend_Registry::get('connectDB');

		//2.Khoi tao Zend Auth
		$auth = Zend_Auth::getInstance();
		
		//3 
		$authAdapter = new Zend_Auth_Adapter_DbTable($db);
		
		$authAdapter->setTableName('users')
					->setIdentityColumn('user_name')
					->setCredentialColumn('user_password');
		$select = $authAdapter->getDbSelect();
		$select->where('user_activity = 1');
		
		$username = $arrParam['user_name'];
		$password = md5($arrParam['password']);
		$authAdapter->setIdentity($username);
		$authAdapter->setCredential($password);
		
		//Lay ket qua truy van cua Zend_Auth
		$result = $auth->authenticate($authAdapter);
		
		$flag = false;
		if(!$result->isValid()){
				$error = $result->getMessages();
				$this->_messageError = current($error);
		}else{			
			$omitColumns = array('password');
			$data = $authAdapter->getResultRowObject(null,$omitColumns);	
			$auth->getStorage()->write($data);	
			$flag = true;
		}
		
		return $flag;
	}
	
	public function getError(){
		return $this->_messageError;
	}
	
	public function logout($arrParam = null,$options = null){
		$auth = Zend_Auth::getInstance();
		$auth->clearIdentity();
		
		$info = new WDS_System_Info();
		$info->destroyInfo();
	}
}