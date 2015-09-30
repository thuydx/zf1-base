<?php

/**
 * WDS GROUP
 *
 * @name        LanguageController.php
 * @category    Frontend
 * @package     Frontend/Front
 * @subpackage  Controllers
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 2:44:52 PM - 2011
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

 
class LanguageController extends Zend_Controller_Action
{
    
    public function init() {
        $this->em = Zend_Registry::get('em');
    }
    
    /**
     * Hàm này để điều khiển sự chuyển đổi ngôn ngữ
     * 
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
        
        $localeObj = new \WDS\Model\Business\Locale();
        $localeResult = $localeObj->findLocale($localeId);
        $localeShortCode = substr($localeResult, 0,2);
        $sessionUrl = new Zend_Session_Namespace('currentRail');
        $uri = $sessionUrl->URL;
        $uriArr = explode('/', $uri);
        $shortCode = array_shift($uriArr);
        $currentUrl = implode('/', $uriArr);
        
        $shortCode = array_shift($uriArr);
        if (strlen($shortCode) == 2) {
            $this->_redirect(substr($localeResult,0,2) .'/'. implode('/', $uriArr));
        } else {
            $this->_redirect(substr($localeResult,0,2).'/'.$currentUrl);
        }
        if (isset($sessionUrl->currentRail)) {
			$this->_redirect($sessionUrl->currentRail);
		} else {
            $this->_redirect('/');
		}
    }



}

