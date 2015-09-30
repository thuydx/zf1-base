<?php

/**
 * WDS GROUP
 *
 * @name        Translate.php
 * @category    WDS
 * @package     WDS/Application
 * @subpackage  Resource
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 10:07:08 PM - Aug 13, 2010
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

class WDS_Application_Resource_Translate extends \Zend_Application_Resource_ResourceAbstract
{
    const DEFAULT_REGISTRY_KEY = 'Zend_Translate';
 
    /**
     * @var Zend_Translate
     */
    protected $_translate;
 
    /**
     * Defined by Zend_Application_Resource_Resource
     *
     * @return Zend_Translate
     */
    public function init()
    {
        

        /*
         * The translate settings for the application.ini should be loaded first
         * to set all necessary defaults, most importantly the adapter to use
         *
         * Since we can't know the load order of modules and/or application bootstrap
         * we set the application translate as dependecy if we are not the main Bootstrap
         */
        if ('Bootstrap' !== get_class($this->getBootstrap())) {
            $this->getBootstrap()->getApplication()->bootstrap('translate');
        }
        
        $bootstrap = $this->getBootstrap();
        //$bootstrap->bootstrap('router');
        $front = Zend_Controller_Front::getInstance();
//        $route = new Zend_Controller_Router_Route($route);
//        $route->
        //$route = $bootstrap->getResource('router');
        
        return $this->getTranslate();         
    }
 
    /**
     * Retrieve translate object
     *
     * @return Zend_Translate
     */
    public function getTranslate()
    {
        if (null === $this->_translate) {
            $options = $this->getOptions();
            if (!isset($options['data'])) {
                throw new Zend_Application_Resource_Exception(
                    'No translation source data provided in the ini file for: '
                    . get_class($this->getBootstrap()).'.'
                );
            }
     
            $adapter = isset($options['adapter']) ? $options['adapter'] : Zend_Translate::AN_ARRAY;
            $this->getBootstrap()->bootstrap('Locale');
            $locale = $this->getBootstrap()->getResource('Locale');
            //$locale = isset($options['locale']) ? $options['locale'] : null;
            $data = '';
            if (isset($options['data']['directory'])) {
                $data = $options['data']['directory'] . $locale . $options['data']['fileExt'];
            }        

            $translateOptions = isset($options['options']) ? $options['options'] : array();
                
            $key = ( isset ($options['registry_key']) && !is_numeric($options['registry_key']))
                 ? $options['registry_key']
                 : self::DEFAULT_REGISTRY_KEY;

            // If no translate object was set in the registry we create it.
            if (!Zend_Registry::isRegistered($key)) {
                $this->_createTranslation($adapter, $data, $locale, $translateOptions);
     
            // if there is, we should add a translation source to the existing translate object
            } elseif (Zend_Registry::isRegistered($key)) {
                $this->_translate = Zend_Registry::get($key);
                $this->_addTranslation($data, $locale, $translateOptions);
            }
     
            Zend_Registry::set($key, $this->_translate);            
        }
 
        return $this->_translate;
    }
 
    protected function _createTranslation($adapter, $data, $locale, $options)
    {
        $this->_translate = new Zend_Translate(
            $adapter, $data, $locale, $options
        );
    }
 
    protected function _addTranslation($data, $locale, $options)
    {
        $this->_translate->addTranslation(
            $data, $locale, $options
        );
    }
    
}