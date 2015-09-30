<?php

/**
 * WDS GROUP
 *
 * @name        Bootstrap.php
 * @category    WDS
 * @package     WDS/Application
 * @subpackage  Util
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 2:18:55 PM - 2011
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

 
class WDS_Application_Util_Bootstrap
{

/**
* Resource ArrayObject contains all bootstrap classes
*
* @return Zend_Application_Bootstrap_Bootstrap
*/
    public static function getBootstrap()
    {
        $front = Zend_Controller_Front::getInstance();
        return $front->getParam('bootstrap');
    }

    /**
* Get an item from the bootstrap container (Registry)
* @param string $item
* @return mixed
*/
    public static function getItem($item)
    {
        $bootstrap = self::getBootstrap();
        return $bootstrap->getContainer()->$item;
    }

    /**
* Get a resource
* @param string $resource
* @return mixed
*/
    public static function getResource($resource)
    {
        $bootstrap = self::getBootstrap();
        return $bootstrap->getResource($resource);
    }

    /**
* Get a bootstrap option
*
* @param string $option
* @return mixed
*/
    public static function getOption($option)
    {
        $bootstrap = self::getBootstrap();
        return $bootstrap->getOption($option);
    }
}