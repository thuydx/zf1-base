<?php 
/**
 * WDS GROUP
 *
 * @name        HtmlImage.php
 * @category    WDS
 * @package     Form/Element
 * @author	    Thuy Dinh Xuan
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $Id: 1.0.1 $
 *  9:21:28 PM - Oct 7, 2010
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
class WDS_Form_Element_HtmlImage extends Zend_Form_Element
{
	protected $_content;
	
	public function render(Zend_View_Interface $view = null)
    {
        if(null !== $view) {
            $this->setView($view);
        }
        return $this->_content;
    }
	
	public function setContent($content)
	{
		$this->_content = $content;
	}
	
	public function isValid($value, $context = null)
    {
    	return true;
    }
}