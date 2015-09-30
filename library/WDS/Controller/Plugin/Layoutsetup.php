<?php

/**
 * WDS GROUP
 *
 * @name        Layoutsetup.php
 * @category    WDS
 * @package     WDS/Controller
 * @subpackage  Plugin
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 2:19:15 PM - 2011
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

 
class WDS_Controller_Plugin_Layoutsetup
    extends \Zend_Controller_plugin_Abstract
{
    
    public function routeShutdown(Zend_Controller_Request_Abstract $request)
    {
        $module = $request->getModuleName();
        $bootstrap = \Zend_Controller_Front::getInstance()->getParam('bootstrap');
        $config     = \Zend_Controller_Front::getInstance()
                            ->getParam('bootstrap')->getOptions();                                                               
        $bootstrap->bootstrap('Layout');
        $layout = $bootstrap->getResource('Layout');   
        
        $layout->setLayoutPath($config[$module]['resources']['layout']['layoutPath'])
               ->setLayout($config[$module]['resources']['layout']['layout']);

    } 
       
/*
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $config     = Zend_Controller_Front::getInstance()
                            ->getParam('bootstrap')->getOptions();
        $moduleName = $request->getModuleName();
 
        if (isset($config[$moduleName]['resources']['layout']['layout'])) {
            $layoutScript = $config[$moduleName]['resources']['layout']['layout'];
            
            Zend_Layout::getMvcInstance()->setLayout($layoutScript);
        }
 
        if (isset($config[$moduleName]['resources']['layout']['layoutPath'])) {
            $layoutPath = $config[$moduleName]['resources']['layout']['layoutPath'];
            $moduleDir = Zend_Controller_Front::getInstance()->getModuleDirectory();
            Zend_Layout::getMvcInstance()->setLayoutPath(
                $moduleDir. DIRECTORY_SEPARATOR .$layoutPath
            );
        }
    }

*/
}