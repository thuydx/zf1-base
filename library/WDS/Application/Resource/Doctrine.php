<?php

/**
 * WDS GROUP
 *
 * @name        Components.php
 * @category    WDS
 * @package     WDS/Application
 * @subpackage  Resource
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $2.0$
 * 9:32:33 PM - May 5, 2011
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

// Zend Framework cannot deal with Resources using namespaces
//namespace WDS\Application\Resource;

use WDS\Application\Container;

class WDS_Application_Resource_Doctrine 
	extends \Zend_Application_Resource_ResourceAbstract
{
    /**
     * Initializes Doctrine Context.
     *
     * @return Core\Application\Container\DoctrineContainer
     */
    public function init()
    {
        $config = $this->getOptions();
        
        // Bootstrapping Doctrine autoloaders
        $this->registerAutoloaders($config);
        
        // Starting Doctrine container
        $container = new Container\DoctrineContainer($config);
        $em = $container->getEntityManager();
        // Add to Zend Registry
        \Zend_Registry::set('em', $em);

        return $container;
    }

    /**
     * Register Doctrine autoloaders
     *
     * @param array Doctrine global configuration
     */
    private function registerAutoloaders(array $config = array())
    {
        $autoloader = \Zend_Loader_Autoloader::getInstance();
        $doctrineIncludePath = isset($config['includePath'])
            ? $config['includePath'] : APPLICATION_PATH . '/../library/Doctrine';

        require_once $doctrineIncludePath . '/Common/ClassLoader.php';

        $symfonyAutoloader = new \Doctrine\Common\ClassLoader('Symfony');
        $autoloader->pushAutoloader(array($symfonyAutoloader, 'loadClass'), 'Symfony');
        
        $doctrineExtensionsAutoloader = new \Doctrine\Common\ClassLoader('DoctrineExtensions');
        $autoloader->pushAutoloader(array($doctrineExtensionsAutoloader, 'loadClass'), 'DoctrineExtensions');


        $doctrineAutoloader = new \Doctrine\Common\ClassLoader('Doctrine');
        $autoloader->pushAutoloader(array($doctrineAutoloader, 'loadClass'), 'Doctrine');
    }
}
