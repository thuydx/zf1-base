<?php

/**
 * WDS GROUP
 *
 * @name        IndexController.php
 * @category    Frontend
 * @package     Frontend/Front
 * @subpackage  Controllers
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 2:30:50 PM - 2011
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
use WDS\Model\Entity\Category;
class IndexController extends Zend_Controller_Action {


    public function init() {
        $this->em = Zend_Registry::get('em');
        $url = new Zend_Session_Namespace('currentRail');
        $url->__set('URL', $this->getRequest()->getRequestUri());
    }
	
    public function indexAction() {
        $params = $this->getRequest()->getParams();
        
//        Zend_Debug::dump($params); //die();
//        Zend_Debug::dump($_SESSION);// die();

            $qb = $this->em->createQueryBuilder()
                ->select('loc')
                ->from('\WDS\Model\Entity\Locale','loc');
        $query = $qb->getQuery();
        
        $data = $query->getResult();
        
        $this->view->data= $data;
        
         //Zend_Debug::dump(); die();
//        foreach ($data as $row) {
//            if ($row instanceof \WDS\Model\Entity\Category\Detail) {                
//                echo $row->get_general_url() . '<br />';
//            }
//        }
    }
}

