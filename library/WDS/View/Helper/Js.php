<?php

/**
 * WDS Project - WDS
 * @name Js
 * @package WDS/View/Helper 
 * @author Thuy Dinh Xuan
 * @version $1.0.1$
 * 11:50:41 PM - Aug 13, 2010
 * License http://wds.vn/license
 */
 
 

class WDS_View_Helper_Js extends \Zend_View_Helper_Abstract
{
    protected $_container = array();

    /**
     * Check if value is valid
     *
     * @param  mixed $value
     * @return boolean
     */
    protected function _isValid($value)
    {
        return true;
    }

    public function js()
    {
        return $this;
    }

    /**
     * append()
     *
     * @param  array $value
     * @return void
     */
    public function append($value)
    {
        if (!$this->_isValid($value)) {
            require_once 'Zend/View/Exception.php';
            throw new Zend_View_Exception('append() expects a data token; please use one of the custom append*() methods');
        }

        array_push($this->_container, $value);
        return $this;
    }

    /**
     * prepend()
     *
     * @param  array $value
     * @return Zend_Layout_ViewHelper_HeadLink
     */
    public function prepend($value)
    {
        if (!$this->_isValid($value)) {
            require_once 'Zend/View/Exception.php';
            throw new Zend_View_Exception('prepend() expects a data token; please use one of the custom prepend*() methods');
        }

        array_unshift($this->_container, $value);
        return $this;
    }

    public function __toString()
    {
        $html = '';
        $front   = Zend_Controller_Front::getInstance();
        $request  = $front->getRequest();
        $module = $request->getModuleName();    

        $config     = Zend_Controller_Front::getInstance()
                            ->getParam('bootstrap')->getOptions();         
        
        
        if (!empty($this->_container)) {
            //$href = $this->view->pathJs . 'js.php?';
            $href = $config[$module]['templates']['pathJs'] . 'js.php?';
            $i = 0;
            foreach ($this->_container as $item) {
                $i++;
                $href .= "f$i=$item&amp;";
            }

            $html = '<script type="text/javascript" src="'.$href.'"></script>';
        }
        return $html;
    }
}