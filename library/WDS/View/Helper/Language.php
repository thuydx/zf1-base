<?php

/**
 * WDS Project - WDS
 * @name Language
 * @package WDS/View/Helper
 * @author Thuy Dinh Xuan
 * @version $1.0.1$
 * 11:51:07 PM - Aug 13, 2010
 * License http://wds.vn/license
 */
 
 

require_once('Zend/View/Helper/Abstract.php');

class WDS_View_Helper_Language extends \Zend_View_Helper_Abstract
{
    public function __construct()
    {
        $bootstrap = Zend_Controller_Front::getInstance()->getParam('bootstrap');
        $bootstrap->bootstrap('Translate');
    }

    public function language($string, $fromTranslationList = false, $type = 'language')
    {
        if ($fromTranslationList) {
            //return Extension_Locale::getTranslation($string, $type, Kbs::initLocale());
        } else {
            return $this->view->translate($string);
        }
    }
}