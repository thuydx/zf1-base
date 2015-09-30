<?php

require_once('Zend/View/Helper/Abstract.php');

class WDS_View_Helper_Rurl extends \Zend_View_Helper_Abstract
{
    public function rurl($controller = null, $action = null, $module = null, 
        $params = array(), $routeName = 'default', $reset = true, $encode = true)
    {
        $arrayMain = array('module' => $module, 'controller' => $controller, 'action' => $action);
        $arrayWithParams = array_merge($arrayMain, $params);
        $url = $this->view->url($arrayWithParams, $routeName, $reset, $encode);
        return $url;
    }
}