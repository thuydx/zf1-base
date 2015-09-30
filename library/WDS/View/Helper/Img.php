<?php
/**
 * WDS Project - WDS
 * @name Img
 * @package WDS/View/Helper
 * @author Thuy Dinh Xuan
 * @version $1.0.1$
 * 11:50:25 PM - Aug 13, 2010
 * License http://wds.vn/license
 */
 
 

require_once('Zend/View/Helper/Abstract.php');

class WDS_View_Helper_Img extends \Zend_View_Helper_Abstract
{
    public function img($src, $width, $height, $alt = '', $options = array())
    {
        $front   = Zend_Controller_Front::getInstance();
        $request  = $front->getRequest();
        $module = $request->getModuleName();    

        $config     = Zend_Controller_Front::getInstance()
                            ->getParam('bootstrap')->getOptions(); 
                
        if (empty($width) or empty($height) or empty($alt)) {
            throw new Zend_View_Exception('Width, height and alt attributes should be filled.');
        }
        
        $basepath = $this->view->serverUrl() . $config[$module]['templates']['pathImg'];

        $img = '<img src="' . $basepath . $src . '" width="' . $width . '" height="' . $height . '" alt="' . $alt . '" />';
        return $img;
    }
}