<?php
/**
 * WDS GROUP
 *
 * @name        Type.php
 * @category    WDS
 * @package     Backend/Admincp
 * @subpackage  Content
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 6:59:58 PM - 2011
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

class CmsContent_Form_Type extends Zend_Form
{
    public function __construct($options = null) 
    { 
        parent::__construct($options);
        $this->setName('contact_us');
        
        $title = new Zend_Form_Element_Select('title');
        $title->setLabel('Title')
              ->setMultiOptions(array('mr'=>'Mr', 'mrs'=>'Mrs'))
              ->setRequired(true)->addValidator('NotEmpty', true);
        
        $firstName = new Zend_Form_Element_Text('firstName');
        $firstName->setLabel('First name')
                  ->setRequired(true)
                  ->addValidator('NotEmpty');

        $lastName = new Zend_Form_Element_Text('lastName');
        $lastName->setLabel('Last name')
                 ->setRequired(true)
                 ->addValidator('NotEmpty');
             
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email address')
              ->addFilter('StringToLower')
              ->setRequired(true)
              ->addValidator('NotEmpty', true)
              ->addValidator('EmailAddress'); 
              
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Contact us');
        
        $this->addElements(array($title, $firstName, 
            $lastName, $email, $submit));
        
    } 
}