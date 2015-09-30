<?php
class WDS_Controller_Plugin_Permission extends Zend_Controller_Plugin_Abstract{
	
	public function preDispatch(Zend_Controller_Request_Abstract $request){
		$ns = new Zend_Session_Namespace('info');
		$auth = Zend_Auth::getInstance();
		
		$flagPage = 'none';
		
		if ($auth->hasIdentity()){
			$info = new WDS_System_Info();
			$member_info = $info->getMemberInfo();

			$list_master = array(1,2,3);//lay danh sach user dac biet, doc tu file config
			
			//neu user ko co trong danh sach dac biet thi tien hanh phan quyen
			if (!in_array($member_info['user_id'], $list_master)){

				$aclInfo  = $info->getAclInfo();
				$acl = new WDS_System_Acl($aclInfo);
				$arrParam = $this->_request->getParams();
				if($acl->isAllowed($arrParam) == false){
					$flagPage = 'no-access';
				}
			}			
		}
		
		if ($flagPage != 'none'){	
			if($flagPage == 'no-access'){
				$this->_request->setModuleName('hrm');
				$this->_request->setControllerName('index');
				$this->_request->setActionName('no-access');
			}
		}
	}
}