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
 * 9:32:33 PM - March 15, 2011
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

require_once 'Zend/Registry.php';
class WDS_Application_Resource_Locale 
	extends \Zend_Application_Resource_ResourceAbstract
{
    protected $_locale;

    /**
     * To init the Locale
     *
     * @return Zend_Locale $locale
     */
    public function init()
    {
        if (null === $this->_locale) {
//           	Zend_Session::start();
            $this->getBootstrap()->bootstrap('Session');
            $bisObj = new WDS\Model\Business\Locale();
            $localeCode = $bisObj->initLocale();
            Zend_Registry::set('Zend_Locale', $localeCode);
            $this->_locale = $localeCode;
        }
        return $this->_locale;
    }
}

?>