<?php
/**
 * WDS GROUP
 *
 * @name        Registry.php
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
class WDS_Controller_Plugin_Debug_Plugin_Registry extends WDS_Controller_Plugin_Debug_Plugin implements WDS_Controller_Plugin_Debug_Plugin_Interface
{
    /**
     * Contains plugin identifier name
     *
     * @var string
     */
    protected $_identifier = 'registry';

    /**
     * Contains Zend_Registry
     *
     * @var Zend_Registry
     */
    protected $_registry;

    /**
     * Create WDS_Controller_Plugin_Debug_Plugin_Registry
     *
     * @return void
     */
    public function __construct()
    {
        // $this->_registry = Zend_Registry::getInstance();
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
        return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAH2SURBVDjLjZNLTxNRGIaJv6ZNWeBwkZFLQtGAC4l/wKULV+7YILeSYukEUhJoSASVuCI0hpAYDSUQCJBSoAaC0wbBUi4aWphpO52Zlpa+nnOqCAptJ3k3M3me73LOlAAoyZfDqQdOEvyO89/vRcGZ5HeWmySFYdWHVOQN0vE58jrLJMFJ82hewVU4+bMfqdPxP9VBn+A4D88wP59PwFqmsH7UgeTJEMlsTuIyI5uRsDfCMcmtAtoyhVmOu5kkHZuFsiNA3XuEi+QCdhxluL0D/SvpoO+vhIksiItNiPqqyXgfIL403gjfoTsIL70gQBdim3VQvz2FFnwOxf8E8kYF0rIVYqcRM70Vgf/Pe/ohwsutOJdcpBpP4Mek+jPEfbWQVzkG+7tNcNsqt68tkcLZTIzM6YZ21IbolgHq9j1o+z04nKhHRnlH2p6A32LCvFD55fIYr960VHgSSqCFVDJBEeugh+zw2jnpc0/5rthuRMBaioWBqrVrFylXOUpankIi0AjJY0DC3wD9oA9rAnc2bat+n++2UkH8XHaTZfGQlg3QdlsIbIVX4KSPAv+60L+SO/PECmJiI1lYM9SQBR7b3einfn6kEMwEIZd5Q48sQQt1Qv/xFqt2Tp5x3B8sBmYC71h926az6njdUR6hMy8O17wqFqb5Bd2o/0SFzIZrAAAAAElFTkSuQmCC';
    }

    /**
     * Gets menu tab for the Debugbar
     *
     * @return string
     */
    public function getTab()
    {
        return ' Registry';
    }

    /**
     * Gets content panel for the Debugbar
     *
     * @return string
     */
    public function getPanel()
    {
        $html = '<h4>Registry plugin deprecated in favour of Variable plugin</h4>';
        return $html;
    }

}