<?php
/**
 * WDS GROUP
 *
 * @name        Debug.php
 * @category    WDS
 * @package     Appication   
 * @subpackage  Resource
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 8:35:23 PM - 2011
 *
 * LICENSE
 *
 * This source file is copyrighted by WDS GROUP, full details in LICENSE.txt.
 * It is also available through the Internet at this URL:
 * http://wds.vn/license/
 * If you did not receive a copy of the license and are unable to
 * obtain it through the Internet, please send an email
 * to license@wds.vn so we can send you a copy immediately.
 *
 */
class WDS_Application_Resource_Debug extends Zend_Application_Resource_ResourceAbstract
{
    /**
     * @var Zend_Controller_Front
     */
    protected $_front;

    /**
     * Defined by Zend_Application_Resource_Resource
     *
     * @return void
     */
    public function init()
    {
        $options = $this->getOptions();

        // Cache
        if ($this->getBootstrap()->hasPluginResource('Cache')) {
            $this->getBootstrap()->bootstrap('Cache');
            $cacheResource = $this->getBootstrap()->getPluginResource('Cache');
            foreach ($options['plugins'] as $key => $plugin) {
                if (empty($plugin)) {
                    $plugin = $key;
                }
                if (strtolower($plugin) == 'cache') {
                    $options['plugins']['Cache'] = array('backend' => $cacheResource->getCacheObject()->getBackend());
                }
            }
        }
        // Db
        if ($this->getBootstrap()->hasPluginResource('Db')) {
            $this->getBootstrap()->bootstrap('Db');
        }

        // MultiDb
        if ($this->getBootstrap()->hasPluginResource('Multidb')) {
            $this->getBootstrap()->bootstrap('Multidb');
            /* @var $multiDbResource Zend_Application_Resource_Multidb */
            $multiDbResource = $this->getBootstrap()->getPluginResource('Multidb');
            foreach ($options['plugins'] as $key => $plugin) {
                if (empty($plugin)) {
                    $plugin = $key;
                }               
                if (is_string($plugin) && strtolower($plugin) == 'database') {
                    $dbArray = array();
                    foreach ($multiDbResource->getOptions() as $dbKey => $dbOptions) {
                        $dbArray[] = $multiDbResource->getDb($dbKey);
                    }
                    $options['plugins']['Database'] = array('adapter' => $dbArray);
                }
            }
        }

        // Fix plugins
        $options['plugins'] = $this->_fixPluginsArray($options['plugins']);

        // Load plugin
        $this->getFrontController()->registerPlugin(
            new WDS_Controller_Plugin_Debug($options)
        );
    }

    /**
     * Some plugins need an array sent to the constructor
     * Fix the ones that don't
     *
     * @param array $plugins
     * @return array
     */
    private function _fixPluginsArray(array $plugins = array())
    {
        $needArray = array(
            'cache',
            'database',
            'file',
        );

        foreach ($plugins as $pluginKey => &$pluginValue) {
            if (in_array(strtolower($pluginKey), $needArray) && !is_array($pluginValue)) {
                $pluginValue = array();
            }
        }

        return $plugins;
    }

    /**
     * Retrieve front controller instance
     *
     * @return Zend_Controller_Front
     */
    public function getFrontController()
    {
        if (null === $this->_front) {
            $this->_front = Zend_Controller_Front::getInstance();
        }
        return $this->_front;
    }
}
