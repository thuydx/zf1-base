<?php
/**
 * WDS GROUP
 *
 * @name        Action.php
 * @category    Controller
 * @package     WDS/Controller
 * @author	    Thuy Dinh Xuan
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $Id: 0.1.0 $
 *  9:21:06 PM - Sep 27, 2010
 *
 * LICENSE
 *
 * This source file is copyrighted by WDS, full details in LICENSE.txt.
 * It is also available through the Internet at this URL:
 * http://wds.vn/license/
 * If you did not receive a copy of the license and are unable to
 * obtain it through the Internet, please send an email
 * to license@wds.vn so we can send you a copy immediately.
 *
 */

class WDS_Controller_Action extends \Zend_Controller_Action
{
	protected $_siteId;
	protected $_siteName;
	protected $_siteLogo;
	protected $_siteLogoWidth;
	protected $_siteLogoHeight;
	protected $_currentUserIsAdmin = null;
	protected $_currentUserId;
	protected $_currentUserUsername;
	
	
    public function init()
    {
        /**
         * This init for multiple site
         * user registed will be have a blog site
         */
/*            
		$params = $this->_request->getParams();
		if($params['module'] == 'manager'){
			if(isset($params['sitename'])){
				throw new Exception('Module does not exists', '404');
			}
		}
		if($params['module'] == 'front'){
			$this->view->currentModule = null;
		}else{
			$this->view->currentModule = $params['module'];
		}
		$this->view->baseUrl = $this->view->serverUrl();
		$session = new Zend_Session_Namespace('locale');
		$this->view->currentLocaleId = $session->localeId;
		if(isset($params['sitename'])){
			$this->view->headTitle($params['sitename']);
			$this->_siteName = $params['sitename'];
			$siteId =  $this->_getSiteId();
			$this->view->logo = $this->_getSiteLogo();
			$this->view->logoWidth = $this->_getSiteLogoWidth();
			$this->view->logoHeight = $this->_getSiteLogoHeight();
			$this->view->siteName = $this->_siteName;
			$this->view->siteId = $this->_getSiteId();
			if (isset($siteId))
			{
				if ($params['module'] == 'customer' || $params['module'] == 'admin')
					return;
				else	
					$this->_redirect('/customer/index');
			}	
			else
			{
				header('Location: http://' . DOMAIN . '/index/register');	
			}
				
		}else{
			$this->view->headTitle("");
		}
*/		
    }
	
    /**
     * Function for check autholizer
     */
/*    
	protected function _getScope(){
		//auth data must be object (id, username, scope)
		$auth = Zend_Auth::getInstance();
    	if($auth->hasIdentity()){
			$storage = Zend_Auth::getInstance()->getStorage();
			$storage = $storage->read();
			return $storage->scope; 
		}
	}
*/	
	/**
	 * Function for get BlogID for project multiple site
	 */
/*    
	protected function _getSiteId(){
    	if(!$this->_siteId){
    		$params = $this->_request->getParams();
    		$model = new WDS_Model_Business_Site();
			if(isset($params['sitename']))
				$this->_siteId = $model->findSiteId($params['sitename']);
			else
				$this->_siteId = '';
    	}
    	return $this->_siteId;
    }
	protected function _getSiteLogo(){
    	if(!$this->_siteLogo){
    		$params = $this->_request->getParams();
    		$model = new WDS_Model_Business_SiteProfile();
    		$profile = $model->findSiteProfile($this->_getSiteId());
    		$this->_siteLogo = $profile->getCompanyLogo();
    		$this->_siteLogoWidth = $profile->getCompanyLogoWidth();
    		$this->_siteLogoHeight = $profile->getCompanyLogoHeight();
    	}
    	return $this->_siteLogo;
    }
    
    protected function _getSiteLogoWidth(){
    	return $this->_siteLogoWidth;
    }
    
	protected function _getSiteLogoHeight(){
    	return $this->_siteLogoHeight;
    }
    
*/    
	protected function _findexts($filename) {
        if($filename == '')
        	return '';
		$filename = strtolower($filename) ;
        $exts = split("[/\\.]", $filename) ;
        $n = count($exts)-1;
        $exts = $exts[$n];
        return $exts;
    }
    
    protected function _uploadUniqueFile($elementName, $folder = null){
    	//change file name
		$upload = new Zend_File_Transfer_Adapter_Http();
		$dest = '';
		
		if($folder != null){
			if(!is_dir($folder)){
				mkdir($folder);
			}
			if(!file_exists($folder.DIRECTORY_SEPARATOR.'index.htm')){
				$fp = fopen($folder.DIRECTORY_SEPARATOR.'index.htm', 'w');
				fclose($fp);
			}
			$dest = $folder;
		}else{
			$dest = WEB_ROOT.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'upload';
		}
		$upload->setDestination($dest);
		$fileInfo = $upload->getFileInfo();
		if(is_array($fileInfo)){
			$fileName = array();
			$j = 1;
			foreach($fileInfo as $file => $info){
				if($info['name'] != ''){
					$ext = $this->_findexts($info['name']);
					$fileName1 = time().$j++. '.' . $ext;
					$target = $dest.DIRECTORY_SEPARATOR.$fileName1;
					$upload->addFilter('Rename', array(
			                'target' => $target,
			                'overwrite' => true));
					$upload->receive($file);
					array_push($fileName, array('origin'=> $info['name'], 'unique'=> $fileName1));
				}
			}
		}
		
		return $fileName;
    }

/*    
    protected function _identityRighScope($scope = 'customer'){
    	$auth = Zend_Auth::getInstance();
    	if($auth->hasIdentity()){
    		$value = $auth->getIdentity();
    		if($scope == $value->scope){
    			return true;
    		}else{
    			$auth->clearIdentity();
    		}
    		return false;
    	}else{
    		$auth->clearIdentity();
    	}
    	return false;
    }
    
    protected function _hasLoggedIn(){
    	$auth = Zend_Auth::getInstance();
    	return $auth->hasIdentity();
    }
*/    
	public function switchAction()
    {
        if ($this->getRequest()->isGet()) {
            if ($this->_hasParam('locale')) {
                $localeId = $this->_getParam('locale');
                $session = new Zend_Session_Namespace('locale');
                $session->localeId = $localeId;
            }
        }

        $sessionUrl = new Zend_Session_Namespace('currentRail');
        if (isset($sessionUrl->currentRail)) {
            $this->_redirect($sessionUrl->currentRail);
        } else {
            $this->_redirect('/');
        }
    }

/*    
    protected function _countSite(){
    	$model = new WDS_Model_Business_Site();
    	return $model->countAllSite();
    }
	
	protected function _getRecentComplaints(){
		$model = new WDS_Model_Business_Complaint();
		$condition = array();
		array_push($condition, array('c.site_id = ?', $this->_getSiteId()));
		array_push($condition, array('c.user_id = ?', $this->_getCurrentUser()));
		return $model->fetchCondition($condition, array('startdate DESC') ,5);
	}
	
	protected function _getCurrentUser(){
		if(!$this->_currentUserId){
			$auth = Zend_Auth::getInstance();
	    	if($auth->hasIdentity()){
				$storage = Zend_Auth::getInstance()->getStorage();
				$storage = $storage->read();
				$this->_currentUserId = $storage->id;
				$this->_currentUserUsername = $storage->username;
			}
		}
		return $this->_currentUserId;
	}
	
	protected function _currentUserIsAdmin(){
		if($this->_currentUserIsAdmin === null){
			$model = new WDS_Model_Business_User();
			$user = $model->find($this->_getCurrentUser());
			if($user){
				if($user->getIsAdmin() == 0){
					$this->_currentUserIsAdmin = false;
				}else{
					$this->_currentUserIsAdmin = true;
				}
			}else{
				$auth = Zend_Auth::getInstance();
	    		$auth->clearIdentity();
				$this->_redirect('/admin/index');
			}
		}
		return $this->_currentUserIsAdmin;
	}
	
	protected function _getRecentCustomers(){
		$model = new WDS_Model_Business_Customer();
		$condition = array();
		array_push($condition, array('c.site_id = ?', $this->_getSiteId()));
		return $model->fetchCondition($condition, array('customer_date_registered DESC') ,5);
	}
	
	protected function _decryptId($encrypt_id){
		$auth		= Zend_Auth::getInstance();
    	$user		= $auth->getStorage()->read()->username;
    	
		$tmp = base64_decode($encrypt_id);
		$tmp = str_replace($user, "", $tmp);
		return $tmp;
	}
	
	protected function _prepareConfigSubMenu(){
		return array(
                    array('key' => 'category', 'value' => 'Category'),
                    array('key' => 'categorytype', 'value' => 'Main_category'),
                    array('key' => 'complaintstatus', 'value' => 'Complaint_status'),
                    array('key' => 'locale', 'value' => 'Languages'),
                    array('key' => 'actionmanager', 'value' => 'Actions'),
					array('key' => 'functie', 'value' => 'Functions'),
					array('key' => 'department', 'value' => 'Departments'),
					array('key' => 'cause', 'value' => 'Causes'),
					array('key' => 'complaintabout', 'value' => 'ComplaintAbouts'),
					array('key' => 'cost', 'value' => 'Costs'),
					array('key' => 'permission', 'value' => 'Permissions'),
					array('key' => 'access', 'value' => 'Access Controls')
                );
	}
*/	
	protected function _prepareUploadFolder(){
		$folder = WEB_ROOT.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'upload'.DIRECTORY_SEPARATOR.$this->_siteName;
		if(!is_dir($folder)){
			mkdir($folder);
		}
		if(!file_exists($folder.DIRECTORY_SEPARATOR.'index.htm')){
			$fp = fopen($folder.DIRECTORY_SEPARATOR.'index.htm', 'w');
			fclose($fp);
		}
		return $folder;
	}
/*	
	protected function _prepareTranslator($filename){
		$session = new Zend_Session_Namespace('locale');
		$localeModel = new WDS_Model_Business_Locale();
		$locale = $localeModel->find($session->localeId)->getLocaleName();
		$translator = Zend_Registry::get('Zend_Translate');
		if(file_exists(LANG_PATH.DIRECTORY_SEPARATOR.$this->_siteName.DIRECTORY_SEPARATOR.$filename.'.'.$locale.'.ini')){
			$translator->getAdapter()->addTranslation(LANG_PATH.DIRECTORY_SEPARATOR.$this->_siteName.DIRECTORY_SEPARATOR.$filename.'.'.$locale.'.ini', $locale);
		}
	}
	
	protected function _prepareDefaultLocale(){
		$condition = array();
		array_push($condition, array('site_id = ?', $this->_getSiteId()));
		array_push($condition, array('`default` = ?', 1));
		$localeSiteModel = new WDS_Model_Business_LocaleSite();
		$locales = $localeSiteModel->fetchCondition($condition);
		return $locales[0]['locale_id'];
	}
	
	protected function _sendAnEmail($sender, $senderName, $receive = array(), $subject, $body){
    	$emailConfig = Zend_Registry::get('emailConfig');
    	$config = array('auth' => $emailConfig['author'],
                      'username' => $emailConfig['username'],
                      'password' => $emailConfig['password']);
    	$transport = new Zend_Mail_Transport_Smtp($emailConfig['server'], $config);
    	Zend_Mail::setDefaultTransport($transport);
		$mail = new Zend_Mail();
		$mail->setBodyHtml($body);
		$mail->setFrom($sender, $senderName);
		$mail->setSubject($subject);
		for($i=0;$i<count($receive); $i++){
			$mail->addTo($receive[$i]['email'], $receive[$i]['name']);
			$mail->send($transport);
		}
	}
	
	protected function _checkRight($resource, $privilege){
		$session = new Zend_Session_Namespace('myacl');
        $permAcl = $session->myAcl;
        $modelFunctie = new WDS_Model_Business_User();
        $functieName = $modelFunctie->getFuctieName($this->_getCurrentUser());
        $functieName = $functieName[0]['functie_name'];
		return $permAcl->isAllowed($functieName, $resource, $privilege);
	}    
*/
}