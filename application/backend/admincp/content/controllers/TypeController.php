<?php
/**
 * WDS GROUP
 *
 * @name        TypeController.php
 * @category    WDS
 * @package     Backend/Admincp
 * @subpackage  content
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 6:56:16 PM - 2011
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

class CmsContent_TypeController extends WDS_Controller_Action
{
    public function indexAction()
    {
        $form = new CmsContent_Form_Type();
        $this->view->abc = $form;
    }
}
