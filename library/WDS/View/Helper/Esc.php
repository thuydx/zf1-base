<?php

/**
 * WDS Project - WDS
 * @name Esc
 * @package WDS/View/Helper
 * @author Thuy Dinh Xuan
 * @version $1.0.1$
 * 11:49:43 PM - Aug 13, 2010
 * License http://wds.vn/license
 */
 
 
require_once('Zend/View/Helper/Abstract.php');

class WDS_View_Helper_Esc extends \Zend_View_Helper_Abstract
{
    public function esc($string) {
        return $this->view->escape($string);
    }
}