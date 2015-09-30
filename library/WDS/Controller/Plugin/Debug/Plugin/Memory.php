<?php
/**
 * WDS GROUP
 *
 * @name        Memory.php
 * @category    WDS
 * @package     Controller/Plugin   
 * @subpackage  Debug/Plugin
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
class WDS_Controller_Plugin_Debug_Plugin_Memory 
    extends Zend_Controller_Plugin_Abstract 
    implements WDS_Controller_Plugin_Debug_Plugin_Interface
{
    /**
     * Contains plugin identifier name
     *
     * @var string
     */
    protected $_identifier = 'memory';
    
    protected $_logger;

    /**
     * Creating memory plugin
     * 
     * @return void
     */
    public function __construct()
    {
        Zend_Controller_Front::getInstance()->registerPlugin($this);
    }
    
    /**
     * Get the Debug logger
     *
     * @return Zend_Log
     */
    public function getLogger()
    {
        if (!$this->_logger) {
            $this->_logger = Zend_Controller_Front::getInstance()
                ->getPlugin('WDS_Controller_Plugin_Debug')->getPlugin('Log');
            $this->_logger->getLog()->addPriority('Memory', 8);
        }
        return $this->_logger;
    }

    /**
     * Gets identifier for this plugin
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->_identifier;
    }
    
    /**
     * Returns the base64 encoded icon
     *
     * @return string
     **/
    public function getIconData()
    {
        return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAGvSURBVDjLpZO7alZREEbXiSdqJJDKYJNCkPBXYq12prHwBezSCpaidnY+graCYO0DpLRTQcR3EFLl8p+9525xgkRIJJApB2bN+gZmqCouU+NZzVef9isyUYeIRD0RTz482xouBBBNHi5u4JlkgUfx+evhxQ2aJRrJ/oFjUWysXeG45cUBy+aoJ90Sj0LGFY6anw2o1y/mK2ZS5pQ50+2XiBbdCvPk+mpw2OM/Bo92IJMhgiGCox+JeNEksIC11eLwvAhlzuAO37+BG9y9x3FTuiWTzhH61QFvdg5AdAZIB3Mw50AKsaRJYlGsX0tymTzf2y1TR9WwbogYY3ZhxR26gBmocrxMuhZNE435FtmSx1tP8QgiHEvj45d3jNlONouAKrjjzWaDv4CkmmNu/Pz9CzVh++Yd2rIz5tTnwdZmAzNymXT9F5AtMFeaTogJYkJfdsaaGpyO4E62pJ0yUCtKQFxo0hAT1JU2CWNOJ5vvP4AIcKeao17c2ljFE8SKEkVdWWxu42GYK9KE4c3O20pzSpyyoCx4v/6ECkCTCqccKorNxR5uSXgQnmQkw2Xf+Q+0iqQ9Ap64TwAAAABJRU5ErkJggg==';
    }
    
    /**
     * Gets menu tab for the Debugbar
     *
     * @return string
     */
    public function getTab()
    {
        // if (function_exists('memory_get_peak_usage')) {
        //     return round(memory_get_peak_usage()/1024) . 'K of '.ini_get("memory_limit");
        // }
        //return 'MemUsage n.a.';
    }

    /**
     * Gets content panel for the Debugbar
     *
     * @return string
     */
    public function getPanel()
    {
        return '';
    }
    
    /**
     * Sets a memory mark identified with $name
     *
     * @param string $name
     * @deprecated Use WDS_Controller_Plugin_Debug_Plugin_Log 
     */
    public function mark($name) {
        $this->getLogger()->mark("$name");
        trigger_error("Debug Memory plugin is deprecated, use the Log plugin");
    }
}